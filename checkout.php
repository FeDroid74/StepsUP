<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Оформление заказа | StepsUP</title>
    <link rel="stylesheet" href="/src/css/style.css">
</head>
<body>
<div class="wrapper">
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/templates/header.php'; ?>

    <main class="checkout-page">
        <div class="checkout-layout">
            <section class="checkout-form">
                <h2>Оформите заказ</h2>
                <form action="/server/place_order.php" method="POST">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" placeholder="you@example.com" required>

                    <label for="fullname">ФИО</label>
                    <input type="text" id="fullname" name="fullname" placeholder="Иванов Иван Иванович" required>

                    <label for="phone">Телефон</label>
                    <input type="tel" id="phone" name="phone" placeholder="+7 900 000 00 00" required>

                    <label for="city">Город</label>
                    <input type="text" id="city" name="city" placeholder="г. Москва" required>

                    <label>
                        <input type="checkbox" name="international"> За границу
                    </label>

                    <p>Выберите способ доставки</p>
                    <label><input type="radio" name="delivery" value="pickup" checked> Забрать из магазина — Бесплатно</label>
                    <label><input type="radio" name="delivery" value="courier"> Курьер Sneakerhead — 1–3 дня (500 ₽)</label>
                    <label><input type="radio" name="delivery" value="boxberry"> ПВЗ Boxberry — 3–6 дней (350 ₽)</label>

                    <label for="comment">Комментарий к заказу</label>
                    <textarea name="comment" id="comment" rows="4" placeholder="Комментарий к заказу..."></textarea>

                    <label>
                        <input type="checkbox" required> Нажимая «Заказать» вы даёте согласие на обработку данных
                    </label>

                    <button type="submit" class="order-btn">Оформить заказ</button>
                </form>
            </section>

            <aside class="checkout-summary">
                <h2>В корзине 1 товар</h2>

                <div class="price-breakdown">
                    <p>Стоимость товаров <span>15 000 ₽</span></p>
                    <p>Доставка <span>0 ₽</span></p>
                    <p class="total">Итого <span>15 000 ₽</span></p>
                </div>

                <div class="cart-item">
                    <img src="/img/adidas.png" alt="Товар">
                    <div>
                        <p class="cart-price">15 000 ₽</p>
                        <p>Кроссовки adidas Originals SL 72 RS</p>
                        <div class="cart-options">
                            <select>
                                <option>41 1/3 EUR</option>
                                <option>42 EUR</option>
                            </select>
                            <input type="number" value="1" min="1">
                        </div>
                    </div>
                </div>
            </aside>
        </div>
    </main>

    <?php include $_SERVER['DOCUMENT_ROOT'] . '/templates/footer.php'; ?>
</div>
</body>
</html>