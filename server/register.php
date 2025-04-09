<?php
session_start();
require 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $full_name = trim($_POST["full_name"]);
    $email = trim($_POST["email"]);
    $phone = trim($_POST["phone"]);
    $password = trim($_POST["password"]);

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Некорректный email.";
        exit;
    }

    if (!preg_match('/^\+7 \(\d{3}\) \d{3}-\d{2}-\d{2}$/', $phone)) {
        echo "Некорректный формат номера телефона.";
        exit;
    }

    // Проверка на уникальность email
    $stmt = $pdo->prepare("SELECT id FROM users WHERE email = ?");
    $stmt->execute([$email]);

    if ($stmt->fetch()) {
        echo "Пользователь с таким email уже зарегистрирован.";
        exit;
    }

    // Добавление нового пользователя
    $stmt = $pdo->prepare("INSERT INTO users (full_name, email, phone, password) VALUES (?, ?, ?, ?)");
    if ($stmt->execute([$full_name, $email, $phone, $password])) {
        $userId = $pdo->lastInsertId();

        // Получаем роль и сохраняем сессию
        $stmt = $pdo->prepare("SELECT id, role FROM users WHERE id = ?");
        $stmt->execute([$userId]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        $_SESSION['user_id'] = $user['id'];
        $_SESSION['role'] = $user['role'];

        // Возвращаем путь для редиректа
        if ($user['role'] == 1) {
            echo "/admin.php";
        } else {
            echo "/account.php";
        }
    } else {
        echo "Ошибка при регистрации.";
    }
}
?>