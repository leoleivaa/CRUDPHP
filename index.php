<?php

session_start();
require_once __DIR__ . '/config/database.php';
require_once __DIR__ . '/src/Product.php';
require_once __DIR__ . '/includes/layout.php';

$database = new Database();
$product = new Product($database->getConnection());
$products = $product->getAll();

renderHeader('Listado de productos');
flashMessage();
?>

<div class="actions-bar">
    <a href="/create.php" class="btn btn-primary">+ Nuevo producto</a>
</div>

<table class="data-table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Precio</th>
            <th>Stock</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php if (empty($products)): ?>
            <tr>
                <td colspan="6" class="empty">No hay productos registrados.</td>
            </tr>
        <?php else: ?>
            <?php foreach ($products as $row): ?>
                <tr>
                    <td><?= (int) $row['id'] ?></td>
                    <td><?= htmlspecialchars($row['name']) ?></td>
                    <td><?= htmlspecialchars($row['description']) ?></td>
                    <td>$<?= number_format((float) $row['price'], 2) ?></td>
                    <td><?= (int) $row['stock'] ?></td>
                    <td class="row-actions">
                        <a href="/edit.php?id=<?= (int) $row['id'] ?>" class="btn btn-small">Editar</a>
                        <form action="/delete.php" method="post" onsubmit="return confirm('¿Eliminar este producto?');">
                            <input type="hidden" name="id" value="<?= (int) $row['id'] ?>">
                            <button type="submit" class="btn btn-small btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
    </tbody>
</table>

<?php renderFooter(); ?>
