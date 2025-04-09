<?php
require 'db.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
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

    // Временный вывод для отладки
    error_log("POST данные: " . print_r($_POST, true));
    error_log("FILES данные: " . print_r($_FILES, true));

    // Обработка загрузки изображения
    $image = ''; // По умолчанию пустая строка
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = $_SERVER['DOCUMENT_ROOT'] . '/img/'; // Абсолютный путь к корневой папке img
        
        // Проверяем и создаем директорию с правильными правами
        if (!file_exists($uploadDir)) {
            mkdir($uploadDir, 0755, true);
        }
        
        // Генерируем уникальное имя файла
        $fileName = uniqid() . '_' . basename($_FILES['image']['name']);
        $targetPath = $uploadDir . $fileName;
        
        // Перемещаем файл и проверяем успешность
        if (move_uploaded_file($_FILES['image']['tmp_name'], $targetPath)) {
            $image = '/img/' . $fileName; // Путь в базе относительно корня сайта
        } else {
            error_log("Ошибка перемещения файла: " . $_FILES['image']['tmp_name'] . " -> " . $targetPath);
        }
    } else {
        if (isset($_FILES['image'])) {
            error_log("Ошибка загрузки файла: " . $_FILES['image']['error']);
        }
    }

    // Вставка товара в базу данных
    try {
        $stmt = $pdo->prepare("
            INSERT INTO products (name, description, price, brand, category, gender, size, image, stock, order_status, payment_status)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
        ");
        $stmt->execute([
            $name, $description, $price, $brand, $category, $gender, $size, $image, $stock, $orderStatus, $paymentStatus
        ]);

        // Генерация SKU
        $lastId = $pdo->lastInsertId();
        $generatedSku = 'SKU' . str_pad($lastId, 4, '0', STR_PAD_LEFT);

        $stmt = $pdo->prepare("UPDATE products SET sku = ? WHERE id = ?");
        $stmt->execute([$generatedSku, $lastId]);

        error_log("Товар с ID $lastId успешно добавлен. Путь к изображению: $image");
        header("Location: ../admin.php?tab=products");
        exit;
    } catch (PDOException $e) {
        error_log("Ошибка базы данных: " . $e->getMessage());
        die("Ошибка при добавлении товара: " . $e->getMessage());
    }
} else {
    error_log("Некорректный метод запроса: " . $_SERVER["REQUEST_METHOD"]);
    header("Location: ../admin.php?tab=products");
    exit;
}
?>