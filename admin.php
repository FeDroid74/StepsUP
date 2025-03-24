<?php
require './server/products.php';
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>StepsUP</title>
    <link rel="stylesheet" href="./src/css/style.css">
</head>
<body>
    <?php include './templates/header.php'; ?>
    <section class="admin-catalog">
        <div class="breadcrumbs">
            <a href="#">Главная</a> > <a href="#">Панель администратора</a> > <span>Каталог товаров</span>
        </div>

        <div class="admin-table-wrapper">
            <table class="admin-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Изображение</th>
                        <th>Артикул</th>
                        <th>Название</th>
                        <th>Описание</th>
                        <th>Цена</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td><img src="./img/adidas.png" alt="Товар" class="product-thumb"></td>
                        <td>H03471</td>
                        <td>Adidas / Кеды мужские / GRAY</td>
                        <td>...</td>
                        <td>9645</td>
                        <td><a href="#" class="admin-edit">Редактировать</a></td>
                        <td><a href="#" class="admin-delete">Удалить</a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>
    <?php include './templates/footer.php'; ?>
</body>
</html>