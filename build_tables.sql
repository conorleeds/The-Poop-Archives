CREATE TABLE building(
	ID int not null auto_increment,
	name varchar(30),
	PRIMARY KEY (ID)
)ENGINE=Innodb;

CREATE TABLE BATHROOM(
	ID int not null auto_increment,
	name varchar(30),
	location int,
	TP_PLY INT,
	NUM_STALLS INT,
	PRIMARY KEY (ID),
	FOREIGN KEY (location) references building(ID) on delete cascade
	
)ENGINE=Innodb;

CREATE TABLE User(
	ID int primary key not null auto_increment 
)ENGINE=Innodb;

CREATE TABLE Ratings(
	Bathroom_ID int not null,
	User_ID int not null,
	Rating int,
	Cleanliness int,
	Traffic int,
	WOWFactor int,
	Arch_Lay int,
	Review int,
	primary key(Bathroom_ID, User_ID),
	foreign key(Bathroom_ID) references BATHROOM(ID),
	foreign key(User_ID) references User(ID)
)ENGINE=Innodb;


