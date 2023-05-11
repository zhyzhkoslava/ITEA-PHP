CREATE TABLE Categories (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(100) NOT NULL,
description VARCHAR(255) NOT NULL,
is_active BOOLEAN,
timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE Products (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
category_id INT(6) UNSIGNED NOT NULL,
name VARCHAR(255) NOT NULL,
is_active BOOLEAN,
timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
FOREIGN KEY (category_id)  REFERENCES Categories(id) ON DELETE CASCADE
);

INSERT INTO Categories(name, description, is_active) VALUES ('Phone', 'Phone Description', true);
INSERT INTO Categories(name, description, is_active) VALUES ('PC', 'PC Description', true);
INSERT INTO Categories(name, description, is_active) VALUES ('Electronic', 'Electronic Description', false);

INSERT INTO Products(category_id, name, is_active) VALUES (1, 'Iphone', true);
INSERT INTO Products(category_id, name, is_active) VALUES (1, 'Samsung', false);
INSERT INTO Products(category_id, name, is_active) VALUES (2, 'Apple', true);
INSERT INTO Products(category_id, name, is_active) VALUES (2, 'Xiaomi', false);

SELECT * from Categories;
SELECT * from Products;
SELECT * from Categories where is_active = true order by id;
SELECT * from Products where is_active = false order by id;
SELECT * from Products P
    LEFT JOIN Categories C on C.id = P.category_id;
SELECT C.name, C.description, COUNT(P.category_id) as COUNT_CAGTEGORIES
FROM Categories C
JOIN Products P on C.id = P.category_id
GROUP BY C.id;
