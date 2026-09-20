<?php

function renderHeader(string $title): void
{
    ?>
    <!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?= htmlspecialchars($title) ?></title>
        <link rel="stylesheet" href="/assets/style.css">
    </head>
    <body>
        <header class="topbar">
            <h1><a href="/index.php">CRUD PHP - Productos</a></h1>
        </header>
        <main class="container">
    <?php
}

function renderFooter(): void
{
    ?>
        </main>
    </body>
    </html>
    <?php
}

function flashMessage(): void
{
    if (!empty($_SESSION['flash'])) {
        $type = $_SESSION['flash']['type'] ?? 'info';
        $text = $_SESSION['flash']['text'] ?? '';
        echo '<div class="flash flash-' . htmlspecialchars($type) . '">' . htmlspecialchars($text) . '</div>';
        unset($_SESSION['flash']);
    }
}

function setFlash(string $type, string $text): void
{
    $_SESSION['flash'] = ['type' => $type, 'text' => $text];
}
