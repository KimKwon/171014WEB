create database SMASH;

use SMASH;

create table user_info(
	user_id varchar(30) primary key not null,
	user_pw varchar(20) not null,
	user_email varchar(300) not null,
	student_id numeric(10),
	department varchar(10)
);

create table reservation(
	id varchar(30) not null,
	reserve_date date,
	reserve_time integer,
	reserve_room_no integer not null,
	reserve_period integer not null,
	purpose varchar(300),
	population integer not null
);

alter table reservation add primary key(reserve_date, reserve_room_no);

alter table reservation add foreign key(id) references user_info(user_id);

insert into user_info values('A', 'asd123', 'A@naver.com');
-- insert into user_info values('B', 's2d4f5e', 'B@naver.com');
-- insert into user_info values('C', '2', 'C@naver.com');
insert into reservation values('A','17/12/15', 12, 1, 3, 'Study', 6);
-- insert into reservation values('A','17/12/15', 19, 1, 2, 'Study', 5);
-- insert into reservation values('B','17/12/13', 15, 2, 3, 'Study', 6);
