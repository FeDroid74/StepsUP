<?php
session_start();
?>

<?php if (isset($_SESSION['user_name'])): ?>
<script>
    console.log("Авторизован как: <?= htmlspecialchars($_SESSION['user_name']) ?>");
</script>
<?php endif; ?>

<script>
    window.currentUser = {
        isLoggedIn: <?= isset($_SESSION['user_id']) ? 'true' : 'false' ?>,
        role: <?= isset($_SESSION['user_role']) ? (int)$_SESSION['user_role'] : 'null' ?>
    };
</script>

<header>
    <div class="container">
        <nav class="header-main">
            <div class="header-nav">
                <ul>
                    <li><a href="about.php">О нас</a></li>
                    <li><a href="services.php">Услуги</a></li>
                    <li><a href="contacts.php">Контакты</a></li>
                </ul>
            </div>
            <div class="logo"><a href="index.php"><img src="/img/logo.svg" alt="logo"></a></div>
            <div class="header-icons">
                <ul>
                    <li><a href="#"><img src="/img/search-icon.svg" alt="Поиск"></a></li>
                    <li>
                        <a href="#" class="open-login-modal"><img src="/img/account-icon.svg" alt="Личный кабинет"></a>
                    </li>
                    <li><a href="#"><img src="/img/liked-icon.svg" alt="Понравившиеся товары"></a></li>
                    <li><a href="#"><img src="/img/cart-icon.svg" alt="Корзина"></a></li>

                    <?php if (isset($_SESSION['user_id'])): ?>
                        <li>
                            <form id="logout-form" action="/server/logout.php" method="POST" style="display:inline;">
                                <button type="submit" class="logout-button" style="background:none;border:none;cursor:pointer;">
                                    <img class="logout" src="/img/log-out.svg" alt="Выход" title="Выйти">
                                </button>
                            </form>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </nav>

        <nav class="header-categories">
            <ul>
                <li><a href="#">Новинки</a></li>
                <li><a href="#">Бренды</a></li>
                <li><a href="#">Мужские</a></li>
                <li><a href="#">Женские</a></li>
                <li><a href="#">Детские</a></li>
                <li><a href="#">Распродажа</a></li>
            </ul>
        </nav>
    </div>
</header>

<?php include 'register-modal.php'; ?>
<?php include 'login-modal.php'; ?>
<?php include './templates/scripts.php'; ?>