create database studentinfo;
use studentinfo;

create table users(
    id int PRIMARY KEY,
    username varchar(255),
    email varchar(255)
);