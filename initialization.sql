create table `users`
( 
    `userid` char(50) not null primary key,
    `email` char(100) not null,
    `pswd` char(100) not null,
    `identity` char(30) not null,
    `name` char(50) null,
    `phone` char(30) null
);

create table `booking`
( 
    `bookid` int not null primary key,
    `doctorid` char(50) not null,
    `patientid` char(50) not null,
    `slot` char(20) not null
);

create table `leave`
( 
    `doctorid` char(50) not null primary key,
    `start_date` char(20) not null,
    `start_time` char(20) not null,
    `end_date` char(20) not null,
    `end_time` char(20) not null

);

insert into `users` values
("taochen", "taoc0620@gmail.com", "61a69d9a0ceb009a9319789a5e34d21a", "dentist", "Tao Chen", '88945536'),
("chentao", "taoc0002@e.ntu.edu.sg", "1a39c9667bf80945d4c23d1e1f4060f3", "dentist", 'Chen Tao', '88115246'),
("justin", "justin@gmail.com", "4ed4a2b8f73669324d21ab3634aff2ff", "patient", 'Chuang Feng-Chia', '88936834');

insert into `booking` values
(1, "chentao", "justin", "2022-10-15 10:30"),
(2, "taochen", "justin", "2022-11-19 11:00"),
(3, "chentao", "justin", "2022-11-22 17:00");

insert into `leave` values
("taochen", "2022-12-01", "10:00", "2022-12-02", "20:00");


-- Passwords for users
-- taochen
-- taoc0002
-- justin8888