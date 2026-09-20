# CRUDPHP

CRUD de productos en PHP puro con MySQL (PDO), sin frameworks.

## Requisitos

- PHP 8.0 o superior
- MySQL / MariaDB
- Extensión `pdo_mysql` habilitada

## Instalación

1. Clona el repositorio.
2. Crea la base de datos ejecutando el script SQL:
   ```bash
   mysql -u root -p < database/schema.sql
   ```
3. Ajusta las credenciales de conexión en `config/database.php` si es necesario.
4. Levanta el servidor embebido de PHP desde la raíz del proyecto:
   ```bash
   php -S localhost:8000
   ```
5. Abre `http://localhost:8000` en el navegador.

## Estructura del proyecto

```
CRUDPHP/
├── assets/
│   └── style.css          # Estilos de la aplicación
├── config/
│   └── database.php       # Conexión PDO a MySQL
├── database/
│   └── schema.sql         # Script de creación de la BD y datos de ejemplo
├── includes/
│   ├── layout.php         # Header/footer y helpers de mensajes flash
│   ├── product_form.php   # Formulario reutilizable (crear/editar)
│   └── validate_product.php
├── src/
│   └── Product.php        # Modelo con operaciones CRUD (PDO + prepared statements)
├── index.php               # Listado de productos (Read)
├── create.php               # Alta de producto (Create)
├── edit.php                 # Edición de producto (Update)
├── delete.php                # Baja de producto (Delete)
└── README.md
```

## Funcionalidades

- **Crear**: formulario para registrar nuevos productos.
- **Leer**: listado de todos los productos en una tabla.
- **Actualizar**: edición de los datos de un producto existente.
- **Eliminar**: baja de un producto con confirmación.
- Validación de datos en servidor y mensajes flash de éxito/error.
- Consultas parametrizadas con PDO para prevenir inyección SQL.
