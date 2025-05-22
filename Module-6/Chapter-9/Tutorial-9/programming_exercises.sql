-- exercise 2
create database toystore;

-- exercise 3
create user 'milo' identified by 'P@$$w0rd!';

-- exercise 4
revoke select on toystore.toys from 'milo';

-- exercise 5
grant all privileges on *.* to 'fred' with grant option;