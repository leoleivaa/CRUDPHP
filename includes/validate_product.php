<?php

function validateProduct(array $input): array
{
    $errors = [];

    if (trim($input['name'] ?? '') === '') {
        $errors['name'] = 'El nombre es obligatorio.';
    }

    if (!is_numeric($input['price'] ?? null) || (float) $input['price'] < 0) {
        $errors['price'] = 'El precio debe ser un número mayor o igual a 0.';
    }

    if (!is_numeric($input['stock'] ?? null) || (int) $input['stock'] < 0) {
        $errors['stock'] = 'El stock debe ser un número entero mayor o igual a 0.';
    }

    return $errors;
}
