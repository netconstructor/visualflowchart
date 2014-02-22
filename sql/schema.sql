create database pulseflow;
use pulseflow;

create table process_groups(
id int(11) unsigned auto_increment primary key,
group_name varchar(50) not null,
description varchar(500),
enabled varchar(1) default 'Y');

create table processes (
id int(11) unsigned auto_increment primary key,
process_group int(11) unsigned not null,
process_name varchar(50) not null,
description varchar(500),
enabled varchar(1) default 'Y',
foreign key(process_group) references process_groups(id) on delete cascade);

create table step_types(
id int(11) unsigned auto_increment primary key,
step_type_name varchar(50) not null);

create table process_steps(
id int(11) unsigned auto_increment primary key,
process_id int(11) unsigned not null,
step_name varchar(50) not null,
step_type int(11) unsigned not null,
controller varchar(100) not null,
method varchar(100) not null,
foreign key(process_id) references processes(id) on delete cascade,
foreign key(step_type) references step_types(id) on delete restrict);

create table actions(
id int(11) unsigned auto_increment primary key,
process_id int(11) unsigned not null,
from_step int(11) unsigned not null,
to_step int(11) unsigned not null,
label varchar(50) not null,
controller varchar(100) not null,
method varchar(100) not null,
`type` varchar(10) default 'POST',
foreign key(process_id) references processes(id) on delete cascade,
foreign key(from_step) references process_steps(id) on delete restrict,
foreign key(to_step) references process_steps(id) on delete restrict);

create table step_positions(
id int(11) unsigned auto_increment primary key,
process_id int(11) unsigned not null,
step_id int(11) unsigned not null,
foreign key(process_id) references processes(id) on delete cascade,
foreign key(step_id) references process_steps(id) on delete restrict);