<?php
require './server/products.php';
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Каталог обуви</title>
    <link rel="stylesheet" href="./src/css/style.css">
</head>
<body>
    <?php include './templates/header.php'; ?>
    <section class="user-account">
        <div class="account-container">
            <div class="account-sidebar">
                <p class="account-name">Имя Фамилия</p>
                <ul class="account-menu">
                    <li class="active">
                        <a href="#"><img src="./img/orders-icon.svg" alt="Мои заказы"><p>Мои заказы</p></a>
                    </li>
                    <li>
                        <a href="#"><img src="./img/profile-icon.svg" alt="Личные данные"><p>Личные данные</p></a>
                    </li>
                    <li>
                        <a href="#"><img src="./img/logout-icon.svg" alt="Выход"><p>Выход</p></a>
                    </li>
                </ul>
            </div>
            
            <div class="account-content">
                <h1 class="account-title">Текущие заказы не найдены</h1>
            </div>
        </div>
    </section>
    <?php include './templates/footer.php'; ?>
</body>
</html>