create table user1(
	user1_id		varchar(8),
	passwd			varchar(32),
	primary key(user1_id)
);

create table classroom
	(building		varchar(15),
	 room_number		varchar(7),
	 capacity		numeric(4,0),
	 primary key (building, room_number)
	);


create table department
	(dept_name		varchar(20), 
	 building		varchar(15), 
	 budget		        numeric(12,2) check (budget > 0),
	 primary key (dept_name)
	);


create table course
	(course_id		varchar(8), 
	 course_name	varchar(50), 
	 dept_name		varchar(20),
	 credits		numeric(2,0) check (credits > 0),
	 primary key (course_id),
	 foreign key (dept_name) references department(dept_name) on delete set null
	);

create table professor(
	ID			varchar(8), 
	name			varchar(20) not null, 
	dept_name		varchar(20), 
	salary			numeric(8,2) check (salary > 29000),
	primary key (ID),
	foreign key (ID) references user1(user1_id)  on delete cascade,
	foreign key (dept_name) references department(dept_name) on delete set null
	);

	create table section(
	 course_id		varchar(8), 
     sec_id			varchar(8),
	 semester		varchar(6) check (semester in ('Fall', 'Winter', 'Spring', 'Summer')), 
	 year			numeric(4,0) check (year > 1701 and year < 2100), 
	 building		varchar(15),
	 room_number		varchar(7),
	 time_slot_id		varchar(4),
	 primary key (course_id, sec_id, semester, year),
	 foreign key (course_id) references course(course_id) on delete cascade,
	 foreign key (building, room_number) references classroom(building, room_number) on delete set null
	);

create table teaches
	(ID			varchar(8), 
	 course_id		varchar(8),
	 sec_id			varchar(8), 
	 semester		varchar(6),
	 year			numeric(4,0),
	 primary key (ID, course_id, sec_id, semester, year),
	 foreign key (course_id,sec_id, semester, year) references section(course_id,sec_id, semester, year) on delete cascade,
	 foreign key (ID) references professor(ID) on delete cascade
	);

	create table student(
	ID			varchar(8), 
	name			varchar(20) not null, 
	dept_name		varchar(20), 
	tot_cred		numeric(3,0) check (tot_cred >= 0),
	bill			decimal(8,2),
	primary key(ID),
	foreign key (ID) references user1(user1_id)  on delete cascade,
	foreign key (dept_name) references department(dept_name) on delete set null
);

create table takes(
	 ID			varchar(8), 
	 course_id		varchar(8),
	 sec_id			varchar(8), 
	 semester		varchar(6),
	 year			numeric(4,0),
	 grade		        varchar(2),
	 primary key (ID, course_id, sec_id, semester, year),
	 foreign key (ID) references student(ID) on delete cascade,
	 foreign key (course_id,sec_id, semester, year) references section(course_id,sec_id, semester, year) on delete cascade

	);

	create table official(
	name			varchar(20) not null, 
	s_ID			varchar(8),
	ID			varchar(8), 
	dept_name		varchar(20), 
	salary			numeric(8,2) check (salary > 29000),
	primary key (ID),
	foreign key (s_ID) references student (ID) on delete set null,
	foreign key (ID) references user1(user1_id) on delete cascade,
	foreign key (dept_name) references department(dept_name) on delete set null
	);



	create table time_slot
	(time_slot_id		varchar(4),
	 day			varchar(1),
	 start_hr		numeric(2) check (start_hr >= 0 and start_hr < 24),
	 start_min		numeric(2) check (start_min >= 0 and start_min < 60),
	 end_hr			numeric(2) check (end_hr >= 0 and end_hr < 24),
	 end_min		numeric(2) check (end_min >= 0 and end_min < 60),
	 primary key (time_slot_id, day, start_hr, start_min)
	);

	
create table prereq
	(course_id		varchar(8), 
	 prereq_id		varchar(8),
	 primary key (course_id, prereq_id),
	 foreign key (course_id) references course(course_id) on delete cascade,
	 foreign key (prereq_id) references course(course_id)
	);

	
create table administrator(
	ID			varchar(8), 
	name			varchar(20) not null, 
	primary key(ID),
	foreign key (ID) references user1(user1_id)  on delete cascade

);


create table aid(
	s_ID varchar(8),
	uni_grant decimal(8,2),
	tap decimal(8,2),
	perkins decimal(8,2),
	parent decimal(8,2),
	primary key(s_ID), 
	foreign key (s_ID) references student (ID) on delete cascade
);

