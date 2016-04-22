DROP SCHEMA IF EXISTS finalproject;
CREATE SCHEMA finalproject;
USE finalproject;

CREATE TABLE users
(
	fname varchar(20),
	lname varchar(20),
	usid varchar(15),
	email varchar(30),
	sha varchar(20),
	hash varchar(20),
	role bool,
	PRIMARY KEY(usid)
);

CREATE TABLE game
(
	gameID integer,
	name varchar(25),
	PRIMARY KEY(gameID)
);

CREATE TABLE reserveRoom
(
	rrid integer,
	reservationdate datetime,
	eventinfo varchar(100),
	usid varchar(15) ,
	PRIMARY KEY (usid, rrid),
	FOREIGN KEY (usid) REFERENCES users (usid)
);


CREATE TABLE gameRentalInventory
(
        bgid integer,
        name varchar(25),
        quantity integer,
        filepath varchar(50),
        rentalfee float,
        description varchar(100),
        PRIMARY KEY (bgid)
);


CREATE TABLE reserveBoardGame
(
	rbid integer,
	pickupdate date,
	duration integer,
	usid varchar(15),
	bgid integer,
	request varchar(50), 
	PRIMARY KEY (usid, bgid, pickupdate),
	FOREIGN KEY (bgid) REFERENCES gameRentalInventory (bgid),
	FOREIGN KEY (usid) REFERENCES users (usid) 
);

CREATE TABLE brand
(
	bid integer,
	brandName varchar(25),
	gameID integer,
	FOREIGN KEY(gameID) REFERENCES game(gameID),
	PRIMARY KEY(bid)
);

CREATE TABLE reserveBoardGame_hist
(
	rbid integer,
	pickupdate date,
	returndate date,
	duration integer,
	usid varchar(15),
	bgid integer,
	request varchar(50), 
	PRIMARY KEY (usid, bgid, pickupdate),
	FOREIGN KEY(bgid) REFERENCES gameRentalInventory(bgid),
	FOREIGN KEY(usid) REFERENCES users (usid) 
);

CREATE TABLE inventory
(
	pid integer,
	productName varchar(25),
	barcode varchar(30),
	quantity integer,
	unitPrice float,
	bid integer,
	location varchar(15),
	wholesalePrice float,
	FOREIGN KEY(bid) REFERENCES brand(bid),
	PRIMARY KEY(pid)
);

#update?
CREATE TABLE preorder
(
	pid integer,
	pickuptime datetime,
	usid varchar(15),
	quantity int,
	FOREIGN KEY(pid) REFERENCES inventory(pid),
	FOREIGN KEY(usid) REFERENCES users (usid),
	PRIMARY KEY(pid, pickuptime, usid)
);

CREATE TABLE stocking
(
	stockDate datetime,
	quantity integer,
	pid integer,
	FOREIGN KEY(pid) REFERENCES inventory(pid),
	PRIMARY KEY(stockDate, pid)
);

CREATE TABLE cardSeries
(
	seriesID integer,
	name varchar(25),
	gameID integer,
	FOREIGN KEY(gameID) REFERENCES game(gameID),
	PRIMARY KEY(seriesID, gameID)
);

CREATE TABLE card
(
	pid integer,
	cardtype varchar(20),
	gameID integer,
	releaseDate datetime,
	seriesID integer,
	FOREIGN KEY(pid) REFERENCES inventory(pid),
	FOREIGN KEY(gameID) REFERENCES game(gameID),
	FOREIGN KEY(seriesID) REFERENCES cardSeries(seriesID),
	PRIMARY KEY(pid)
);

CREATE TABLE figureSeries
(
	seriesID integer,
	name varchar(25),
	PRIMARY KEY(seriesID)
);

CREATE TABLE figure
(
	pid integer,
	figtype varchar(20),
	seriesID integer,
	year datetime,
	FOREIGN KEY(pid) REFERENCES inventory(pid),
	FOREIGN KEY(seriesID) REFERENCES figureSeries(seriesID),
	PRIMARY KEY(pid)
);

CREATE TABLE other
(
	pid integer,
	othertype varchar(20),
	notes varchar(50),
	FOREIGN KEY(pid) REFERENCES inventory(pid),
	PRIMARY KEY(pid)
);

CREATE TABLE box
(
	pid integer,
	packCount integer,
	FOREIGN KEY(pid) REFERENCES card(pid),
	PRIMARY KEY(pid)
);

CREATE TABLE pack
(
	pid integer,
	cardCount integer,
	FOREIGN KEY(pid) REFERENCES card(pid),
	PRIMARY KEY(pid)
);

CREATE TABLE single
(
	pid integer,
	rarity varchar(10),
	cardType varchar(20),
	cond varchar(15),
	FOREIGN KEY(pid) REFERENCES inventory(pid),
	PRIMARY KEY(pid)
);

CREATE TABLE loginLog(
	lid integer,
	usid varchar(15),
	ip varchar(20),
	time datetime,
	PRIMARY KEY (lid),
	FOREIGN KEY(usid) REFERENCES users (usid)
);
