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
            <div class="shoes-category">
                <div class="shoe-card">
                    <span class="label">Новинка</span>
                    <img src="./img/reebok-flexagon.png" alt="Кроссовки Reebok">
                    <p class="price">3849.00 руб.</p>
                    <div class="shoes-name">
                        <p>Reebok / Кроссовки REEBOK FLEXAGON FOR CDGRY7/BLACK/SEATEA</p>
                    </div>
                    <div class="details-container">
                        <a href="#" class="details-link">Подробнее</a>
                    </div>
                </div>
                <div class="shoe-card">
                    <span class="label">Хит продаж</span>
                    <img src="./img/reebok-royal.png" alt="Кеды Reebok">
                    <p class="price">2924.00 руб.</p>
                    <div class="shoes-name">
                        <p>Reebok / Кроссовки REEBOK ROYAL TECHQU ARMYGR/STUCCO/WHITE</p>
                    </div>
                    <div class="details-container">
                        <a href="#" class="details-link">Подробнее</a>
                    </div>
                </div>
                <div class="shoe-card">
                    <span class="label">Хит продаж</span>
                    <img src="./img/rebook.png" alt="Кеды Reebok">
                    <p class="price">2799.00 руб.</p>
                    <div class="shoes-name">
                        <p>Reebok / Кеды мужские серые / ЛЕТО</p>
                    </div>
                    <div class="details-container">
                        <a href="#" class="details-link">Подробнее</a>
                    </div>
                </div>
                <div class="shoe-card">
                    <span class="label">Новинка</span>
                    <img src="./img/adidas.png" alt="Кеды Adidas">
                    <p class="price">9645.00 руб.</p>
                    <div class="shoes-name">
                        <p>adidas / Кеды мужские / GRAY</p>
                    </div>
                    <div class="details-container">
                        <a href="#" class="details-link">Подробнее</a>
                    </div>
                </div>
            </div>

            <!-- Женская обувь -->
            <h2>Женская обувь →</h2>
            <div class="shoes-category">
                <div class="shoe-card">
                    <span class="label">Новинка</span>
                    <img src="./img/reebok-flexagon-black.png" alt="Кроссовки Reebok">
                    <p class="price">1350.00 руб.</p>
                    <div class="shoes-name">
                        <p>Reebok / Кроссовки FLEXAGON FOR BLACK/TCRGY8/WHITE</p>
                    </div>
                    <div class="details-container">
                        <a href="#" class="details-link">Подробнее</a>
                    </div>
                </div>
                <div class="shoe-card">
                    <span class="label">Новинка</span>
                    <img src="./img/reebok-royal-black.png" alt="Кроссовки Reebok">
                    <p class="price">3899.00 руб.</p>
                    <div class="shoes-name">
                        <p>Reebok / ROYAL PERVAD BLACK</p>
                    </div>
                    <div class="details-container">
                        <a href="#" class="details-link">Подробнее</a>
                    </div>
                </div>
                <div class="shoe-card">
                    <span class="label recommended">Рекомендуем</span>
                    <img src="./img/taccardi.png" alt="Кеды T.TACCARDI">
                    <p class="price">1119.00 руб.</p>
                    <div class="shoes-name">
                        <p>T.TACCARDI / Кеды / POSPNK/BLUBLA</p>
                    </div>
                    <div class="details-container">
                        <a href="#" class="details-link">Подробнее</a>
                    </div>
                </div>
                <div class="shoe-card">
                    <span class="label hit">Хит продаж</span>
                    <span class="label">Новинка</span>
                    <img src="./img/taccardi-pink.png" alt="Слипоны T.TACCARDI">
                    <p class="price">889.00 руб.</p>
                    <div class="shoes-name">
                        <p>T.TACCARDI / Слипоны женские Blue/Hard</p>
                    </div>
                    <div class="details-container">
                        <a href="#" class="details-link">Подробнее</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php include './templates/footer.php'; ?>
</body>
<?php include './templates/scripts.php'; ?>
</html>
