drop database if exists db;
create database db default character set utf8 collate utf8_general_ci;
drop user if exists 'staff'@'localhost';
create user 'staff'@'localhost' identified by 'password';
grant all on db.* to 'staff'@'localhost';
use db;

create table customer (
	id int auto_increment primary key, 
	login varchar(100) not null unique, 
	password varchar(100) not null
);

create table img (
	id int auto_increment primary key, 
	customer_id int not null, 
    name varchar(100) not null,
	foreign key(customer_id) references customer(id)
);

create table exe (
	id int not null primary key, 
	customer_id int not null, 
	foreign key(customer_id) references customer(id)
);

create table exe_detail (
	exe_id int not null, 
	img_id int not null, 
	num int not null,
	primary key(exe_id, img_id), 
	foreign key(exe_id) references exe(id), 
	foreign key(img_id) references img(id)
);
