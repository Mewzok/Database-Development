-- create user
create user 'froguser'@'localhost' identified by 'frogPassword1!';

-- grant appropriate privileges
grant select, insert, update, delete, index, alter, create, drop
on frogstore.*
to 'froguser'@'localhost';
