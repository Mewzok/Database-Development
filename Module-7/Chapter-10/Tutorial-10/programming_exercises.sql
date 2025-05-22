-- exercise 1
INSERT INTO PRODUCTS VALUES
(NULL, 'prod1', '$9.99');

-- exercise 2
mysql -h server01 -u tom -p P@$$w0rd! < insert.sql

-- exercise 3
SELECT name, city
FROM Customers;

-- exercise 4
SELECT *
FROM Orders
WHERE CustomerID > 300;

-- exercise 5
SELECT *
FROM Orders
WHERE CustomerID IN (400, 500);