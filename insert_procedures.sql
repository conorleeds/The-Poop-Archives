DROP PROCEDURE IF EXISTS newBuilding;
DELIMITER |
CREATE PROCEDURE newBuilding(
	name varchar(30)
)
begin
	insert into building 
	VALUES(0, name);
end |
DELIMITER ;

DROP PROCEDURE IF EXISTS newBathroom;
DELIMITER |
CREATE PROCEDURE newBathroom(
	name varchar(30),
	location int,
	TP_PLY INT,
	NUM_STALLS INT
)
begin
	insert into BATHROOM 
	VALUES(0, name, location, TP_PLY, NUM_STALLS);
end |
DELIMITER ;

DROP PROCEDURE IF EXISTS newRating;
DELIMITER |
CREATE PROCEDURE newRating(
	BR_ID int,
	Rating int,
	cleanliness int,
	Traffic int,
	WOWFactor int,
	Arch_Lay int,
	Review varchar(139)
)
begin
	insert into Users values (0);
	insert into Ratings 
	VALUES(BR_ID, LAST_INSERT_ID(),rating, Cleanliness, Traffic, WOWFactor, Arch_Lay, Review);
end |
DELIMITER ;


call newBathroom("conor's", 1, 15, 3);
insert into Users values (0);
call newRating(1,2,3,4,5,6,"THis is a test of the emergancy pooping services");
call newBuilding("building 3");