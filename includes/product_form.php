<?php
/**
 * @var array $data
 * @var array $errors
 * @var string $formAction
 * @var string $submitLabel
 */
?>
<form action="<?= htmlspecialchars($formAction) ?>" method="post" class="product-form" novalidate>
    <div class="field">
        <label for="name">Nombre</label>
        <input type="text" id="name" name="name" value="<?= htmlspecialchars($data['name'] ?? '') ?>" required>
        <?php if (!empty($errors['name'])): ?>
            <span class="field-error"><?= htmlspecialchars($errors['name']) ?></span>
        <?php endif; ?>
    </div>

    <div class="field">
        <label for="description">Descripción</label>
        <textarea id="description" name="description" rows="4"><?= htmlspecialchars($data['description'] ?? '') ?></textarea>
    </div>

    <div class="field">
        <label for="price">Precio</label>
        <input type="number" id="price" name="price" step="0.01" min="0" value="<?= htmlspecialchars($data['price'] ?? '0') ?>" required>
        <?php if (!empty($errors['price'])): ?>
            <span class="field-error"><?= htmlspecialchars($errors['price']) ?></span>
        <?php endif; ?>
    </div>

    <div class="field">
        <label for="stock">Stock</label>
        <input type="number" id="stock" name="stock" min="0" value="<?= htmlspecialchars($data['stock'] ?? '0') ?>" required>
        <?php if (!empty($errors['stock'])): ?>
            <span class="field-error"><?= htmlspecialchars($errors['stock']) ?></span>
        <?php endif; ?>
    </div>

    <div class="form-actions">
        <button type="submit" class="btn btn-primary"><?= htmlspecialchars($submitLabel) ?></button>
        <a href="/index.php" class="btn">Cancelar</a>
    </div>
</form>
