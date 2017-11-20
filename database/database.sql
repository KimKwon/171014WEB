create database SMASH;

use SMASH;

create table user_info(
	user_id varchar(30) primary key not null,
	user_pw varchar(20) not null,
	user_email varchar(300) not null
);

create table room(
	room_no integer not null,
	room_date varchar(20) not null,
	room_check varchar(10) not null
);
alter table room add primary key(room_no, room_date);

create table reservation(
	id varchar(30) not null,
	reserve_date varchar(20) not null,
	reserve_room_no integer not null,
	purpose varchar(300),
	population integer not null,
	constraint fk_room foreign key(reserve_room_no) references room(room_no) on delete cascade
);

alter table reservation add primary key(reserve_date, reserve_room_no);

alter table reservation add foreign key(reserve_date) references user_info(user_id);
