CREATE DATABASE IF NOT EXISTS moto_shop;
USE moto_shop;
DROP TABLE IF EXISTS order_items; DROP TABLE IF EXISTS orders; DROP TABLE IF EXISTS products; DROP TABLE IF EXISTS users;
CREATE TABLE users (id INT AUTO_INCREMENT PRIMARY KEY, name VARCHAR(150) NOT NULL, email VARCHAR(150) NOT NULL UNIQUE, password VARCHAR(255) NOT NULL, role ENUM('user','admin') NOT NULL DEFAULT 'user', created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP);
CREATE TABLE products (id INT AUTO_INCREMENT PRIMARY KEY, name VARCHAR(150) NOT NULL, category ENUM('motorcycle','spare_part') NOT NULL, brand VARCHAR(100) NOT NULL, price DECIMAL(10,2) NOT NULL, stock INT NOT NULL DEFAULT 0, image VARCHAR(255) DEFAULT 'assets/images/placeholder.jpg', description TEXT, created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP);
CREATE TABLE orders (id INT AUTO_INCREMENT PRIMARY KEY, user_id INT NULL, customer_name VARCHAR(150) NOT NULL, email VARCHAR(150) NOT NULL, phone VARCHAR(50) NOT NULL, address TEXT NOT NULL, total DECIMAL(10,2) NOT NULL, created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP, FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE SET NULL);
CREATE TABLE order_items (id INT AUTO_INCREMENT PRIMARY KEY, order_id INT NOT NULL, product_id INT NOT NULL, quantity INT NOT NULL, price DECIMAL(10,2) NOT NULL, FOREIGN KEY (order_id) REFERENCES orders(id) ON DELETE CASCADE, FOREIGN KEY (product_id) REFERENCES products(id));
INSERT INTO users (name,email,password,role) VALUES ('Admin','admin@motomarket.com','$2y$10$rJWMU82xRVgpz0vdBfrxWuWhr3UNwfH2PfxOVFGLYi71EcDB3Vd8W','admin');
INSERT INTO products (name,category,brand,price,stock,image,description) VALUES
('Yamaha R3','motorcycle','Yamaha',5800,4,'assets/images/bike1.jpg','Sport motorcycle with reliable performance.'),
('Honda CBR500R','motorcycle','Honda',7200,3,'assets/images/bike2.jpg','Comfortable sport bike for city and highway rides.'),
('Kawasaki Ninja 400','motorcycle','Kawasaki',6500,2,'assets/images/bike3.jpg','Fast, stylish, lightweight sport motorcycle.'),
('Engine Oil 10W-40','spare_part','Motul',22,40,'assets/images/oil.jpg','Premium motorcycle engine oil.'),
('Brake Pads Set','spare_part','Brembo',35,25,'assets/images/brakes.jpg','Durable front brake pads.'),
('Sport Helmet','spare_part','AGV',120,15,'assets/images/helmet.jpg','Protective full-face helmet for daily riding.');
