SET SQL_MODE = "";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE DATABASE IF NOT EXISTS fashion;
USE fashion;

CREATE TABLE admin_user (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE users (
    u_id INT AUTO_INCREMENT PRIMARY KEY,
    u_name VARCHAR(255) NOT NULL,
    profile_pic VARCHAR(2000) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    phone VARCHAR(15) NOT NULL,
    status TINYINT(1) DEFAULT 1, 
    state VARCHAR(100) NOT NULL,
    address VARCHAR(255) NOT NULL,
    district VARCHAR(100) NOT NULL,
    landmark VARCHAR(255),
    flat_no VARCHAR(100),
    pin_code VARCHAR(10) NOT NULL,
    added_on TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE categories (
    categories_id INT AUTO_INCREMENT PRIMARY KEY,
    category_name VARCHAR(100) NOT NULL,
    status TINYINT(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


CREATE TABLE brands (
    id INT AUTO_INCREMENT PRIMARY KEY,
    brand_name VARCHAR(255) NOT NULL,
    brand_slug VARCHAR(255) NOT NULL UNIQUE,
    brand_image VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


CREATE TABLE products (
    p_id INT AUTO_INCREMENT PRIMARY KEY,
    categories_id INT NOT NULL,
    p_name VARCHAR(255) NOT NULL,
    category_name VARCHAR(100) NOT NULL,
    brand_name VARCHAR(255) NOT NULL,
    mrp DECIMAL(10,2) NOT NULL,
    p_price DECIMAL(10,2) NOT NULL,
    qty INT NOT NULL,
    p_image VARCHAR(255),
    short_desc TEXT,
    description TEXT,
    meta_title VARCHAR(255),
    meta_desc TEXT,
    meta_keyword VARCHAR(255),
    status TINYINT(1) DEFAULT 1,
    FOREIGN KEY (categories_id) REFERENCES categories(categories_id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


CREATE TABLE cart (
    id INT AUTO_INCREMENT PRIMARY KEY,
    u_id INT NOT NULL,
    p_id INT NOT NULL,
    product_name VARCHAR(255) NOT NULL,
    product_image VARCHAR(255) NOT NULL,
    product_price DECIMAL(10,2) NOT NULL,
    product_quantity INT NOT NULL DEFAULT 1,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (u_id) REFERENCES users(u_id) ON DELETE CASCADE,
    FOREIGN KEY (p_id) REFERENCES products(p_id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE orders (
    order_id INT AUTO_INCREMENT PRIMARY KEY,
    u_id INT NOT NULL,
    p_id INT NOT NULL,
    name VARCHAR(255) NOT NULL,
    number VARCHAR(10) NOT NULL,
    email VARCHAR(255) NOT NULL,
    method VARCHAR(255) NOT NULL,
    flat VARCHAR(255) NOT NULL,
    street VARCHAR(255) NOT NULL,
    city VARCHAR(100) NOT NULL,
    state VARCHAR(100) NOT NULL,
    country VARCHAR(100) NOT NULL,
    pin_code VARCHAR(20) NOT NULL,
    quantity INT NOT NULL,
    total_price DECIMAL(10,2) NOT NULL,
    total_products VARCHAR(255) NOT NULL,
    order_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (u_id) REFERENCES users(u_id) ON DELETE CASCADE,
    FOREIGN KEY (p_id) REFERENCES products(p_id) ON DELETE CASCADE
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


CREATE TABLE `contact_us` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NOT NULL,
  `email` VARCHAR(75) NOT NULL,
  `mobile` VARCHAR(15) NOT NULL,
  `comment` TEXT NOT NULL,
  `added_on` DATETIME NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



INSERT INTO admin_user (username, password)  
VALUES ('amal', '1234');


INSERT INTO brands (brand_name, brand_slug, brand_image) VALUES
('adidas', 'new', 'brand_uploads/download (1).jpeg'),
('zara', 'neww', 'brand_uploads/Zara.jpg'),
('nike', 'letest', 'brand_uploads/nike.jpg');

INSERT INTO categories (category_name, status) VALUES
('men dress', 1),
('women Dress', 1),
('sharee', 1);



INSERT INTO products (categories_id, p_name, category_name, brand_name, mrp, p_price, qty, p_image, short_desc, description, meta_title, meta_desc, meta_keyword, status) VALUES
(2, 'lahenga', 'women Dress', 'Select brand Name', 6999.00, 5499.00, 50, 'item1.jpg', 'ghbhfgb n', 'fgbfgb ngf', 'fgbgb', 'gfbfg', 'fgbfgb', 1),
(2, 'kurti', 'women Dress', 'zara', 7999.00, 5899.00, 50, 'item2.jpg', 'fdvfv', 'vfc c', 'fdcvfsdcfv', 'fdcvdf', 'fdcvdf', 1),
(2, 'Denim Jeans', 'women Dress', 'nike', 12999.00, 9999.00, 50, 'item3.jpg', 'fcbcbc cb', 'cvc cb', 'cvcbc', 'cvcvc', 'cvcvcbcv', 1),
(2, 'lahenga', 'women Dress', 'zara', 8999.00, 7999.00, 50, 'item4.jpg', 'bvnf v', 'bv n f', 'vbvcx', 'bcvvc', 'bcvcvcb', 1),
(2, 'dress', 'women Dress', 'zara', 70000.00, 60000.00, 50, 'item5.jpg', 'cbv cvb', 'cvb cvb', 'cvb cvb', 'vcb cvb', 'bcvcbvcb', 1),
(2, 'Denim Jeans', 'women Dress', 'nike', 12999.00, 9999.00, 50, 'item6.jpg', 'fcbcbc cb', 'cvc cb', 'cvcbc', 'cvcvc', 'cvcvcbcv', 1),
(2, 'Denim Jeans', 'women Dress', 'nike', 12999.00, 9999.00, 50, 'item7.jpg', 'fcbcbc cb', 'cvc cb', 'cvcbc', 'cvcvc', 'cvcvcbcv', 1),
(2, 'Denim Jeans', 'women Dress', 'nike', 12999.00, 9999.00, 50, 'item8.jpg', 'fcbcbc cb', 'cvc cb', 'cvcbc', 'cvcvc', 'cvcvcbcv', 1),

(3, 'Sreenidhi', 'sharee', 'zara', 25999.00, 22999.00, 5, 'sharee1.jpeg', 'Sreenidhi Sarees offers a stunning collection of traditional sarees.', '', 'gbfg', 'fgbfg', 'fgbhfb', 1),
(3, 'Sreehan', 'sharee', 'zara', 50000.00, 42999.00, 20, 'sharee2.jpeg', 'vb gbcvn', 'fgbhfgbfg', 'fgbf', 'fgbfd', 'fgbfgd', 1),
(3, 'Sreeram', 'sharee', 'zara', 4999.00, 4500.00, 5, 'sharee3.jpeg', 'gbv gv gvb', 'fvbfdbfb fcv fvb', 'fvd', 'fdv', 'fdv', 1),
(3, 'Sreeram', 'sharee', 'zara', 4999.00, 3999.00, 25, 'sharee4.jpeg', 'xzfcvdfc', 'fvdsvq', 'fdvfdv', 'fdvfdv', 'fdvfdv', 1),

(3, 'Sreekar.', 'sharee', 'zara', 9999.00, 8999.00, 5, 'sharee5.jpeg', 'Sreahan Sarees offers a beautiful collection of traditional sarees.', '', 'fgbn', 'fgbfg', 'fdvdv', 1),
(3, 'Sreekar.', 'sharee', 'zara', 9999.00, 8999.00, 5, 'sharee6.jpeg', 'Sreahan Sarees offers a beautiful collection of traditional sarees.', '', 'fgbn', 'fgbfg', 'fdvdv', 1),
(3, 'Sreekar.', 'sharee', 'zara', 9999.00, 8999.00, 5, 'sharee7.jpeg', 'Sreahan Sarees offers a beautiful collection of traditional sarees.', '', 'fgbn', 'fgbfg', 'fdvdv', 1),
(3, 'Sreekar.', 'sharee', 'zara', 9999.00, 8999.00, 5, 'sharee8.jpeg', 'Sreahan Sarees offers a beautiful collection of traditional sarees.', '', 'fgbn', 'fgbfg', 'fdvdv', 1);



INSERT INTO products (categories_id, p_name, category_name, brand_name, mrp, p_price, qty, p_image, short_desc, description, meta_title, meta_desc, meta_keyword, status) VALUES
(1, 'dress', 'men dress', 'adidas', 4500.00, 3500.00, 5, 'men_item1.jpeg', 'bhgbh', 'fgbfgb', 'fgbfgb', 'fgbfgb', 'fgbbg', 1),
(1, 'Suit', 'men dress', 'nike', 4500.00, 3500.00, 10, 'men_item2.jpeg', 'Could yo', 'hnhgf', 'fdvfdv', 'vcvvdv', 'vfdvfd', 1),
(1, 'Blazer', 'men dress', 'adidas', 4500.00, 3999.00, 10, 'men_item3.jpeg', 'hbnt', 'fbvfg', 'bfv fg', 'gb ngf', 'gb ngf', 1),
(1, 'Jeans', 'men dress', 'adidas', 8999.00, 6999.00, 20, 'men_item4.jpeg', 'dsacvsdc', 'dsacdsac', 'sadcxdsac', 'sacxsda', 'sacxsda', 1),
(1, 'Jeans', 'men dress', 'adidas', 8999.00, 6999.00, 20, 'men_item5.jpeg', 'dsacvsdc', 'dsacdsac', 'sadcxdsac', 'sacxsda', 'sacxsda', 1),
(1, 'Blazer', 'men dress', 'adidas', 4500.00, 3999.00, 10, 'men_item6.jpeg', 'hbnt', 'fbvfg', 'bfv fg', 'gb ngf', 'gb ngf', 1),
(1, 'Blazer', 'men dress', 'adidas', 4500.00, 3999.00, 10, 'men_item7.jpeg', 'hbnt', 'fbvfg', 'bfv fg', 'gb ngf', 'gb ngf', 1),
(1, 'Jeans', 'men dress', 'adidas', 8999.00, 6999.00, 20, 'men_item8.jpeg', 'dsacvsdc', 'dsacdsac', 'sadcxdsac', 'sacxsda', 'sacxsda', 1);


