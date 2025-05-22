UPDATE Books
SET Price = Price * 1.1;

UPDATE Customers
SET Address = '250 Olsens Road'
WHERE CustomerID = 4;

ALTER TABLE Customers
MODIFY Name CHAR(70) NOT NULL;

ALTER TABLE Orders
ADD Tax FLOAT(6,2) AFTER Amount;

ALTER TABLE Orders
DROP Tax;