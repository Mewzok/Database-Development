CREATE USER 'bookorama'@'localhost' IDENTIFIED BY 'bookorama123';
GRANT SELECT, INSERT, UPDATE, DELETE ON books.* TO 'bookorama'@'localhost';