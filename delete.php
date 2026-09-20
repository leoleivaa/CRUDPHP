<?php

session_start();
require_once __DIR__ . '/config/database.php';
require_once __DIR__ . '/src/Product.php';
require_once __DIR__ . '/includes/layout.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: /index.php');
    exit;
}

$id = (int) ($_POST['id'] ?? 0);

$database = new Database();
$product = new Product($database->getConnection());

if ($id > 0 && $product->getById($id) !== false) {
    $product->delete($id);
    setFlash('success', 'Producto eliminado correctamente.');
} else {
    setFlash('error', 'Producto no encontrado.');
}

header('Location: /index.php');
exit;
