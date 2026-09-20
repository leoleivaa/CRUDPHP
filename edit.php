<?php

session_start();
require_once __DIR__ . '/config/database.php';
require_once __DIR__ . '/src/Product.php';
require_once __DIR__ . '/includes/layout.php';
require_once __DIR__ . '/includes/validate_product.php';

$database = new Database();
$product = new Product($database->getConnection());

$id = (int) ($_GET['id'] ?? $_POST['id'] ?? 0);
$existing = $product->getById($id);

if ($existing === false) {
    setFlash('error', 'Producto no encontrado.');
    header('Location: /index.php');
    exit;
}

$data = $existing;
$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = [
        'name' => $_POST['name'] ?? '',
        'description' => $_POST['description'] ?? '',
        'price' => $_POST['price'] ?? '0',
        'stock' => $_POST['stock'] ?? '0',
    ];

    $errors = validateProduct($data);

    if (empty($errors)) {
        $product->update($id, $data);
        setFlash('success', 'Producto actualizado correctamente.');
        header('Location: /index.php');
        exit;
    }
}

renderHeader('Editar producto');
?>

<h2>Editar producto #<?= $id ?></h2>
<?php
$formAction = '/edit.php?id=' . $id;
$submitLabel = 'Actualizar producto';
require __DIR__ . '/includes/product_form.php';
renderFooter();
