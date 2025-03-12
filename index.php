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
    <section class="category-section">
        <div class="container">
            <div class="main-image">
                <img src="./img/main-sneakers.jpg" alt="Основное изображение кроссовок">
            </div>
            <div class="sneakers-categories">
                <div class="category-item">
                    <div class="image-wrapper"><img src="./img/mens-sneakers.jpg" alt="Мужские кроссовки"></div>
                    <div class="overlay">Мужские кроссовки</div>
                </div>
                <div class="category-item">
                    <div class="image-wrapper"><img src="./img/brand-collections.jpg" alt="Брендовые коллекции"></div>
                    <div class="overlay">Брендовые коллекции</div>
                </div>
                <div class="category-item">
                    <div class="image-wrapper"><img src="./img/sale.jpg" alt="Распродажа"></div>
                    <div class="overlay">Распродажа</div>
                </div>
            </div>
        </div>
    </section>
    <section class="shoes-section">
        <div class="container">
            <!-- Фильтр выбора категории -->
            <div class="filter-buttons">
                <button class="active">Рекомендуем</button>
                <button>Популярные</button>
                <button>Новинки</button>
            </div>

            <!-- Мужская обувь -->
            <h2>Мужская обувь →</h2>
            <div class="product-category">
                <?php
                foreach ($products as $product) {
                    if ($product["category"] === "men") { ?>
                        <div class="product-card">
                            <?php if (!empty($product["label"])) { ?>
                                <span class="label"><?= htmlspecialchars($product["label"]) ?></span>
                            <?php } ?>
                            <img src="<?= htmlspecialchars($product["image"]) ?>" alt="<?= htmlspecialchars($product["name"]) ?>">
                            <p class="price"><?= number_format($product["price"], 2, '.', ' ') ?> руб.</p>
                            <div class="product-name">
                                <p><?= htmlspecialchars($product["description"]) ?></p>
                            </div>
                            <div class="details-container">
                                <a href="#" class="details-link">Подробнее</a>
                            </div>
                        </div>
                    <?php }
                } ?>
            </div>

            <h2>Женская обувь →</h2>
            <div class="product-category">
                <?php
                foreach ($products as $product) {
                    if ($product["category"] === "women") { ?>
                        <div class="product-card">
                            <?php if (!empty($product["label"])) { ?>
                                <span class="label"><?= htmlspecialchars($product["label"]) ?></span>
                            <?php } ?>
                            <img src="<?= htmlspecialchars($product["image"]) ?>" alt="<?= htmlspecialchars($product["name"]) ?>">
                            <p class="price"><?= number_format($product["price"], 2, '.', ' ') ?> руб.</p>
                            <div class="product-name">
                                <p><?= htmlspecialchars($product["description"]) ?></p>
                            </div>
                            <div class="details-container">
                                <a href="#" class="details-link">Подробнее</a>
                            </div>
                        </div>
                    <?php }
                } ?>
            </div>
        </div>
    </section>
    <?php include './templates/footer.php'; ?>
</body>
<?php include './templates/scripts.php'; ?>
</html>
