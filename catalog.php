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
    <section class="catalog">
        <div class="container">
            <div class="breadcrumbs">
                <a href="index.php">Главная</a> 
                <span>&gt;</span>
                <span class="current">Каталог</span>
            </div>

            <div class="sort">
                <h1 class="sort-title">ОБУВЬ</h1>
                <button class="sort-btn">Дата поступления (сначала новые)</button>
            </div>

            <div class="catalog-wrapper">
                <!-- Фильтр товаров -->
                <aside class="filter">
                    <h2 class="filter-title">Бренды</h2>
                    <ul class="filter-list">
                        <li><input type="checkbox"> adidas Originals 7</li>
                        <li><input type="checkbox"> ASICS 4</li>
                        <li><input type="checkbox"> Carhartt WIP 1</li>
                        <li><input type="checkbox"> Converse 25</li>
                        <li><input type="checkbox"> Diadora 4</li>
                        <li><input type="checkbox"> Hijack Sandals 6</li>
                        <li><a href="#">еще 12</a></li>
                    </ul>

                    <h2 class="filter-title">Пол</h2>
                    <select class="filter-select">
                        <option value="">Все</option>
                        <option value="men">Мужская</option>
                        <option value="women">Женская</option>
                    </select>

                    <h2 class="filter-title">Цвета</h2>
                    <select class="filter-select">
                        <option value="">Любой</option>
                        <option value="black">Черный</option>
                        <option value="white">Белый</option>
                        <option value="gray">Серый</option>
                    </select>

                    <h2 class="filter-title">Цена</h2>
                    <div class="price-filter">
                        <input type="text" placeholder="От">
                        <input type="text" placeholder="До">
                    </div>

                    <h2 class="filter-title">Размер EUR</h2>
                    <div class="size-grid">
                        <button>38</button> <button>39</button> <button>40</button>
                        <button>41</button> <button>42</button> <button>43</button>
                        <button>44</button> <button>45</button> <button>46</button>
                    </div>
                </aside>

                <!-- Каталог товаров -->
                <section class="catalog-products">
                    <div class="product-grid">
                        <?php foreach ($products as $product): ?>
                            <div class="product-card">
                                <?php if (!empty($product["label"])): ?>
                                    <span class="label"><?= htmlspecialchars($product["label"]) ?></span>
                                <?php endif; ?>
                                <img src="<?= htmlspecialchars($product["image"]) ?>" alt="<?= htmlspecialchars($product["name"]) ?>">
                                <p class="price"><?= number_format($product["price"], 2, '.', ' ') ?> руб.</p>
                                <div class="product-name">
                                    <p><?= htmlspecialchars($product["description"]) ?></p>
                                </div>
                                <div class="details-container">
                                    <a href="#" class="details-link">Подробнее</a>
                                    <button class="cart-btn"><img src="./img/white-cart-icon.svg"></button>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </section>
            </div>
        </div>
    </section>
    <?php include './templates/footer.php'; ?>
</body>
</html>
