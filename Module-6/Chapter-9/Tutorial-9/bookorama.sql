CREATE TABLE Customers
( CustomerID INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
NAME CHAR(50) NOT NULL,
Address CHAR(100) not null,
City CHAR(30) not null
);

CREATE TABLE Orders
( OrderID INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
CustomerID INT UNSIGNED NOT NULL,
Amount FLOAT(6,2),
Date DATE NOT NULL,
FOREIGN KEY (CustomerID) REFERENCES Customers(CustomerID)
);

CREATE TABLE Books
( ISBN CHAR(13) NOT NULL PRIMARY KEY,
Author CHAR(50),
TITLE CHAR(100),
Price FLOAT(4,2)
);

CREATE TABLE Order_Items
( OrderID INT UNSIGNED NOT NULL,
ISBN CHAR(13) NOT NULL,
Quantity TINYINT UNSIGNED,

PRIMARY KEY (OrderID, ISBN),
FOREIGN KEY (OrderID) REFERENCES Orders(OrderID),
FOREIGN KEY (ISBN) REFERENCES Books(ISBN)
);

CREATE TABLE Book_Reviews
(
    ISBN CHAR(13) NOT NULL PRIMARY KEY,
    Review TEXT,

    FOREIGN KEY (ISBN) REFERENCES Books(ISBN)
);