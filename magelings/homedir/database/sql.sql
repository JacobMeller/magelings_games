DROP SCHEMA IF EXISTS finalproject;
CREATE SCHEMA finalproject;
USE finalproject;

CREATE TABLE customer
(
	fname varchar(20),
	lname varchar(20),
	cid integer,
	credits float,
	PRIMARY KEY(cid)
);

CREATE TABLE game
(
	gameID integer,
	name varchar(25),
	PRIMARY KEY(gameID)
);

CREATE TABLE matcheses
(
	gameDate date,
	matchesID integer,
	cid1 integer,
	cid2 integer,
	result varchar(5),
	gameID integer,
	FOREIGN KEY(cid1) REFERENCES customer(cid),
	FOREIGN KEY(cid2) REFERENCES customer(cid),
	FOREIGN KEY(gameID) REFERENCES game(gameID),
	PRIMARY KEY(matchesID)
);

CREATE TABLE brand
(
	bid integer,
	brandName varchar(25),
	gameID integer,
	FOREIGN KEY(gameID) REFERENCES game(gameID),
	PRIMARY KEY(bid)
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
	FOREIGN KEY(bid) REFERENCES	brand(bid),
	PRIMARY KEY(pid)
);

CREATE TABLE buys
(
	pid integer,
	time datetime,
	cid integer,
	amount float,
	paymentMethod varchar(15),
	FOREIGN KEY(pid) REFERENCES inventory(pid),
	FOREIGN KEY(cid) REFERENCES customer(cid),
	PRIMARY KEY(pid, time, cid)
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
	type varchar(20),
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
	type varchar(20),
	seriesID integer,
	year datetime,
	FOREIGN KEY(pid) REFERENCES inventory(pid),
	FOREIGN KEY(seriesID) REFERENCES figureSeries(seriesID),
	PRIMARY KEY(pid)
);

CREATE TABLE other
(
	pid integer,
	type varchar(20),
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
