create database SMASH;

use SMASH;

create table user_info(
	user_id varchar(30) primary key not null,
	user_pw varchar(20) not null,
	user_email varchar(300) not null
);

create table room(
	room_no integer not null,
	room_check varchar(10) not null
);
alter table room add primary key(room_no);

create table reservation(
	id varchar(30) not null,
	reserve_date integer not null,
	reserve_room_no integer not null,
	purpose varchar(300),
	population integer not null,
	constraint fk_room foreign key(reserve_room_no) references room(room_no) on delete cascade
);

alter table reservation add primary key(reserve_date, reserve_room_no);

alter table reservation add foreign key(id) references user_info(user_id);
insert into user_info values('A', 'asd123', 'A@naver.com');
insert into user_info values('B', 's2d4f5e', 'B@naver.com');
insert into user_info values('C', '2', 'C@naver.com');
insert into room values(1, '2017-10-10 11:10:00', 'FALSE');
insert into room values(2, '2010-01-01 01:01:00', 'TRUE');
insert into room values(3, '2017-10-10 13:00:00', 'FALSE');
insert into reservation values('A', '2017-10-10 11:10:00', 1,'test', 6);
insert into reservation values('B', '2010-01-01 01:01:00', 2,'tesdst', 3);