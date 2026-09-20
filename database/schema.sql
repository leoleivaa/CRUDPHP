CREATE DATABASE IF NOT EXISTS crudphp CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

USE crudphp;

-- Forces the session charset regardless of the connecting client's default
-- (e.g. some `mysql` CLI builds default to latin1), otherwise the accented
-- characters below get mangled on insert.
SET NAMES utf8mb4;

CREATE TABLE IF NOT EXISTS products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(150) NOT NULL,
    description TEXT,
    price DECIMAL(10, 2) NOT NULL DEFAULT 0,
    stock INT NOT NULL DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO products (name, description, price, stock) VALUES
    ('Teclado mecánico', 'Teclado mecánico retroiluminado con switches rojos', 45.99, 20),
    ('Mouse inalámbrico', 'Mouse ergonómico con sensor óptico de alta precisión', 19.50, 35),
    ('Monitor 24 pulgadas', 'Monitor Full HD IPS con puerto HDMI y VGA', 129.00, 10);
