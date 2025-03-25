<?php
require 'db.php';

try {
    $stmt = $pdo->query("SELECT * FROM products ORDER BY created_at DESC");
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Расшифровка категории (если нужно вернуть строку: men/women)
    foreach ($products as &$product) {
        $product["category"] = $product["category"] == 1 ? "men" : "women";
    }

} catch (PDOException $e) {
    echo "Ошибка загрузки товаров: " . $e->getMessage();
    $products = [];
}
?>