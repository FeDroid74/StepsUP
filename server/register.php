<?php
require 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = trim($_POST["first_name"]);
    $last_name = trim($_POST["last_name"]);
    $email = trim($_POST["email"]);
    $phone = trim($_POST["phone"]);
    $password = trim($_POST["password"]);

    // Валидация email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Некорректный email.";
        exit;
    }

    // Валидация номера телефона (проверяем формат +7 (XXX) XXX-XX-XX)
    if (!preg_match('/^\+7 \(\d{3}\) \d{3}-\d{2}-\d{2}$/', $phone)) {
        echo "Некорректный формат номера телефона.";
        exit;
    }

    // Проверяем, существует ли уже пользователь с таким email
    $stmt = $pdo->prepare("SELECT id FROM users WHERE email = ?");
    $stmt->execute([$email]);

    if ($stmt->fetch()) {
        echo "Пользователь с таким email уже зарегистрирован.";
        exit;
    }

    // Добавляем пользователя в базу
    $stmt = $pdo->prepare("INSERT INTO users (first_name, last_name, email, phone, password) VALUES (?, ?, ?, ?, ?)");
    if ($stmt->execute([$first_name, $last_name, $email, $phone, $password])) {
        echo "Регистрация прошла успешно";
    } else {
        echo "Ошибка при регистрации.";
    }
}
?>