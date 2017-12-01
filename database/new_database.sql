create database SMASH;

use SMASH;

create table user_info(
	user_id varchar(30) primary key not null,
	user_pw varchar(20) not null,
	user_email varchar(300) not null
);

create table reservation(
	id varchar(30) not null,
	reserve_date date,
	reserve_time integer,
	reserve_room_no integer not null,
	purpose varchar(300),
	population integer not null
);

alter table reservation add primary key(reserve_date, reserve_room_no);

alter table reservation add foreign key(id) references user_info(user_id);
