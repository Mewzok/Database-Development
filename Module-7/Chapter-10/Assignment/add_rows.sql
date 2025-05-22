-- insert frogs
INSERT INTO Frogs VALUES
(NULL, 'One Frog', 'GREEN', 4, 4.99);

INSERT INTO Frogs VALUES
(NULL, 'Two Frog', 'RED', 4, 12.99);

INSERT INTO Frogs VALUES
(NULL, 'Three Frog', 'BLUE', 1, 0.99);

INSERT INTO Frogs VALUES
(NULL, 'Jeffrey', 'RED', 5, 151999.99);

INSERT INTO Frogs VALUES
(NULL, 'Five Frog', 'GREEN', 4, 8.99);

-- insert customers
INSERT INTO Customers VALUES
(NULL, 'C1', '123 Address', '1 City');

INSERT INTO Customers VALUES
(NULL, 'C2', '456 Address', '2 City');

INSERT INTO Customers VALUES
(NULL, 'C3', '789 Address', '1 City');

INSERT INTO Customers VALUES
(NULL, 'C2', '101 Address', '4 City');

INSERT INTO Customers VALUES
(NULL, 'C5', '456 Address', '5 City');

-- insert orders
INSERT INTO Orders VALUES
(NULL, 2, 24.99, '2025-05-22');

INSERT INTO Orders VALUES
(NULL, 1, 19.99, '2021-02-23');

INSERT INTO Orders VALUES
(NULL, 5, 21.99, '2024-11-06');

INSERT INTO Orders VALUES
(NULL, 4, 9999.99, '2025-01-01');

INSERT INTO Orders VALUES
(NULL, 1, 59.99, '1963-04-17');

-- insert order items
INSERT INTO Order_Items VALUES
(3, 2, 1);

INSERT INTO Order_Items VALUES
(2, 3, 1);

INSERT INTO Order_Items VALUES
(1, 2, 3);

INSERT INTO Order_Items VALUES
(4, 4, 27);

INSERT INTO Order_Items VALUES
(5, 1, 2);
