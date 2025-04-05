<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Страница не найдена</title>
    <link rel="stylesheet" href="/src/css/style.css">
    <link rel="stylesheet" href="/src/css/404.css">
</head>
<body>
    <div class="wrapper">
        <?php include $_SERVER['DOCUMENT_ROOT'] . '/templates/header.php'; ?>

        <main class="content">
            <h1 class="nf-title">404</h1>
            <p class="nf-text">К сожалению, страница не найдена</p>
            <a class="nf-link" href="/index.php">🡧 Вернуться на главную</a>
        </main>

        <?php include $_SERVER['DOCUMENT_ROOT'] . '/templates/footer.php'; ?>
    </div>
</body>
</html>