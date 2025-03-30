<?php
session_start();

// Проверка авторизации и роли
if (!isset($_SESSION["user_id"]) || $_SESSION["user_role"] != 0) {
    header("Location: index.php");
    exit;
}

require './server/products.php';
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Личный кабинет</title>
    <link rel="stylesheet" href="./src/css/style.css">
</head>
<body>
    <div class="wrapper">
        <?php include './templates/header.php'; ?>
        <main class="content">
            <section class="user-account">
                <div class="account-container">
                    <div class="account-sidebar">
                        <p class="account-name"><?= htmlspecialchars($_SESSION["user_name"]) ?></p>
                        <ul class="account-menu">
                            <li class="active">
                                <a href="#"><img src="./img/orders-icon.svg" alt="Мои заказы"><p>Мои заказы</p></a>
                            </li>
                            <li>
                                <a href="#"><img src="./img/profile-icon.svg" alt="Личные данные"><p>Личные данные</p></a>
                            </li>
                            <li>
                                <a href="./server/logout.php"><img src="./img/logout-icon.svg" alt="Выход"><p>Выход</p></a>
                            </li>
                        </ul>
                    </div>

                    <div class="account-content">
                        <h1 class="account-title">Текущие заказы не найдены</h1>
                    </div>
                </div>
            </section>
        </main>
        <?php include './templates/footer.php'; ?>
    </div>
</body>
</html>