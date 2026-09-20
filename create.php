<?php

session_start();
require_once __DIR__ . '/config/database.php';
require_once __DIR__ . '/src/Product.php';
require_once __DIR__ . '/includes/layout.php';
require_once __DIR__ . '/includes/validate_product.php';

$database = new Database();
$product = new Product($database->getConnection());

$data = ['name' => '', 'description' => '', 'price' => '0', 'stock' => '0'];
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
        $product->create($data);
        setFlash('success', 'Producto creado correctamente.');
        header('Location: /index.php');
        exit;
    }
}

renderHeader('Nuevo producto');
?>

<h2>Nuevo producto</h2>
<?php
$formAction = '/create.php';
$submitLabel = 'Guardar producto';
require __DIR__ . '/includes/product_form.php';
renderFooter();
