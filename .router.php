<?php
// .router.php

$uri = urldecode(
    parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)
);

$path = __DIR__ . $uri;

if ($uri !== '/' && file_exists($path) && !is_dir($path)) {
    return false; // Отдаёт файл напрямую (например .css, .js, .php и т.д.)
}

// Если файл с расширением .php существует — подключаем
if (preg_match('/\.php$/', $uri) && file_exists(__DIR__ . $uri)) {
    include __DIR__ . $uri;
    return true;
}

// Если путь не заканчивается на .php, но есть файл .php с таким именем
$phpPath = $path . '.php';
if (file_exists($phpPath)) {
    include $phpPath;
    return true;
}

// Фолбэк — если ничего не найдено, пробуем index.php или 404
include __DIR__ . '/404-page.php';