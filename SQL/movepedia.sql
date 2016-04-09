create database moviepedia;

use moviepedia;

create table movie (
id int not null AUTO_INCREMENT,
name varchar(200) not null,
genreId int not null,
publisherId int not null,
launchYear datetime not null,
plot text null,
blillboard MEDIUMBLOB,
CONSTRAINT PK_MOVIE PRIMARY KEY (id))ENGINE=INNODB DEFAULT CHARSET UTF8;



create table publisher
(
id int not null AUTO_INCREMENT,
name varchar(200) not null,
description text null,
logo MEDIUMBLOB,
CONSTRAINT PK_PUBLISHER PRIMARY KEY (id))ENGINE=INNODB DEFAULT CHARSET UTF8;

create table genre
(
id int not null AUTO_INCREMENT,
name varchar(200) not null,
description text null,
CONSTRAINT PK_GENRE PRIMARY KEY (id))ENGINE=INNODB DEFAULT CHARSET UTF8;

create table access
(
id int not null AUTO_INCREMENT,
ipAddress varchar(100) not null,
timestamp datetime not null,
pageUrl varchar(255) not null,
CONSTRAINT PK_ACCESS PRIMARY KEY (id))ENGINE=INNODB DEFAULT CHARSET UTF8;

create table remoteCollector
(
id int not null AUTO_INCREMENT,
path varchar(200) not null,
timestamp datetime not null,
originalFileName varchar(200) null,
remoteHost varchar(200) null,
CONSTRAINT PK_REMOTECOLLECTOR PRIMARY KEY (id))ENGINE=INNODB DEFAULT CHARSET UTF8;