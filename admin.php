<?php
session_start();

// Проверка авторизации и роли
if (!isset($_SESSION["user_id"]) || $_SESSION["user_role"] != 1) {
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
    <title>StepsUP - Админ панель</title>
    <link rel="stylesheet" href="./src/css/style.css">
    <link rel="stylesheet" href="./src/css/edit-modal.css">
    <link rel="stylesheet" href="./src/css/admin.css">
</head>
<body>
<div class="wrapper">
    <?php include './templates/header.php'; ?>
    <main class="content">
        <section class="admin-catalog">
            <div class="breadcrumbs">
                <a href="#">Главная</a> > <a href="#">Панель администратора</a> > <span>Каталог товаров</span>
            </div>

            <div class="admin-table-wrapper">
                <table class="admin-table">
                    <thead>
                        <tr>
                            <th>Изображение</th>
                            <th>Название</th>
                            <th>Описание</th>
                            <th>Цена</th>
                            <th>Наличие</th>
                            <th>Категория</th>
                            <th>Статус заказа</th>
                            <th>Статус оплаты</th>
                            <th></th>
                            <th>
                                <div class="admin-button">
                                    <button class="admin-add">+</button>
                                </div>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($products as $product): ?>
                        <tr>
                            <td><img src="<?= $product['image'] ?>" alt="Товар" class="product-thumb"></td>
                            <td><?= htmlspecialchars($product['name']) ?></td>
                            <td><?= htmlspecialchars(mb_strimwidth($product['description'], 0, 60, '...')) ?></td>
                            <td><?= number_format($product['price'], 2, '.', ' ') ?> руб.</td>
                            <td><?= $product['stock'] ?></td>
                            <td><?= $product['category'] == 1 ? 'Мужская' : 'Женская' ?></td>
                            <td><?= $product['order_status'] ?></td>
                            <td><?= $product['payment_status'] ?></td>
                            <td>
                                <button class="admin-edit"
                                    data-id="<?= $product['id'] ?>"
                                    data-sku="<?= $product['id'] ?>"
                                    data-name="<?= htmlspecialchars($product['name']) ?>"
                                    data-description="<?= htmlspecialchars($product['description']) ?>"
                                    data-price="<?= $product['price'] ?>"
                                    data-stock="<?= $product['stock'] ?>"
                                    data-category="<?= $product['category'] ?>"
                                    data-image="<?= $product['image'] ?>"
                                    data-orderstatus="<?= $product['order_status'] ?>"
                                    data-paymentstatus="<?= $product['payment_status'] ?>">
                                    ✎
                                </button>
                            </td>
                            <td>
                                <form action="./server/delete_product.php" method="POST" onsubmit="return confirm('Удалить товар?');">
                                    <input type="hidden" name="id" value="<?= $product['id'] ?>">
                                    <button type="submit" class="admin-delete">✖</button>
                                </form>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </section>
    </main>
    <?php include './templates/footer.php'; ?>
</div>
</body>
<?php include './templates/product-modal.php'; ?>
</html>