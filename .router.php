<?php
$request = $_SERVER["REQUEST_URI"];

if (preg_match('#^/product/(.+)$#', $request, $matches)) {
    $_GET['sku'] = $matches[1];
    include 'product.php';
    exit;
}

if ($request === '/' || $request === '/index.php') {
    include 'index.php';
    exit;
}

// Прочие реальные файлы (css, js, img) — пусть обрабатываются как есть
$file = $_SERVER['DOCUMENT_ROOT'] . $request;
if (file_exists($file)) {
    return false;
}

// Всё остальное — 404
include '404.php';