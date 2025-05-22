-- select
SELECT *
FROM Frogs
WHERE Color = 'GREEN';

SELECT *
FROM Customers
WHERE City = '1 City';

SELECT *
FROM Orders
WHERE CustomerID = 1;

SELECT *
FROM Orders
WHERE Amount > 5000;

-- join
SELECT Orders.OrderID, Customers.Name, Orders.Amount, Orders.Date
FROM Orders
JOIN Customers ON Orders.CustomerID = Customers.CustomerID;

SELECT Order_Items.OrderID, Frogs.Name, Order_Items.Quantity
FROM Order_Items
JOIN Frogs ON Order_Items.FrogID = Frogs.FrogID;

SELECT Customers.Name, Orders.OrderID, Orders.Amount
FROM Customers
LEFT JOIN Orders ON Customers.CustomerID = Orders.CustomerID;

SELECT Customers.Name
FROM Customers
JOIN Orders ON Customers.CustomerID = Orders.CustomerID
JOIN Order_Items ON Orders.OrderID = Order_Items.OrderID
JOIN Frogs ON Order_Items.FrogID = Frogs.FrogID
WHERE Frogs.Name = 'Two Frog';