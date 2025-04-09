<?php
require 'db.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id = $_POST["id"] ?? '';
    $name = $_POST["name"] ?? '';
    $description = $_POST["description"] ?? '';
    $price = $_POST["price"] ?? 0;
    $brand = $_POST["brand"] ?? '';
    $category = $_POST["category"] ?? '';
    $gender = $_POST["gender"] ?? 1;
    $size = $_POST["size"] ?? 36;
    $stock = $_POST["stock"] ?? 0;
    $orderStatus = $_POST["order_status"] ?? 'Ожидает';
    $paymentStatus = $_POST["payment_status"] ?? 'Не оплачен';
    $existingImage = $_POST["existing_image"] ?? '';

    // Временный вывод для отладки
    error_log("POST данные: " . print_r($_POST, true));
    error_log("FILES данные: " . print_r($_FILES, true));

    // Обработка загрузки нового изображения
    $image = $existingImage; // По умолчанию используем существующее изображение
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = 'img/'; // Изменяем путь на img (в корне сайта)
        
        // Проверяем и создаем директорию с правильными правами
        if (!file_exists($uploadDir)) {
            mkdir($uploadDir, 0755, true);
        }
        
        // Генерируем уникальное имя файла
        $fileName = uniqid() . '_' . basename($_FILES['image']['name']);
        $targetPath = $uploadDir . $fileName;
        
        // Перемещаем файл и проверяем успешность
        if (move_uploaded_file($_FILES['image']['tmp_name'], $targetPath)) {
            $image = '/img/' . $fileName; // Путь в базе остается /img/
            // Удаление старого изображения, если оно существует
            if ($existingImage && file_exists($_SERVER['DOCUMENT_ROOT'] . $existingImage)) {
                if (unlink($_SERVER['DOCUMENT_ROOT'] . $existingImage)) {
                    error_log("Старое изображение удалено: " . $existingImage);
                } else {
                    error_log("Ошибка удаления старого изображения: " . $existingImage);
                }
            }
        } else {
            error_log("Ошибка перемещения файла: " . $_FILES['image']['tmp_name'] . " -> " . $targetPath);
        }
    } else {
        if (isset($_FILES['image'])) {
            error_log("Ошибка загрузки файла: " . $_FILES['image']['error']);
        }
    }

    // Обновление товара в базе данных
    try {
        $stmt = $pdo->prepare("
            UPDATE products 
            SET name = ?, description = ?, price = ?, brand = ?, category = ?, gender = ?, size = ?, image = ?, stock = ?, order_status = ?, payment_status = ?
            WHERE id = ?
        ");
        $stmt->execute([
            $name, $description, $price, $brand, $category, $gender, $size, $image, $stock, $orderStatus, $paymentStatus, $id
        ]);

        error_log("Товар с ID $id успешно обновлен. Путь к изображению: $image");
        header("Location: ../admin.php?tab=products");
        exit;
    } catch (PDOException $e) {
        error_log("Ошибка базы данных: " . $e->getMessage());
        die("Ошибка при обновлении товара: " . $e->getMessage());
    }
} else {
    error_log("Некорректный метод запроса: " . $_SERVER["REQUEST_METHOD"]);
    header("Location: ../admin.php?tab=products");
    exit;
}
?>