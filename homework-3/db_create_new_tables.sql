CREATE TABLE language
(
	ID   varchar(20)  not null,
	NAME varchar(500) not null,
	PRIMARY KEY (ID)
);

CREATE TABLE movie_title
(
	MOVIE_ID    int          not null,
	LANGUAGE_ID varchar(20)  not null,
	TITLE       varchar(500) not null,
	PRIMARY KEY (MOVIE_ID, LANGUAGE_ID),
	FOREIGN KEY FK_MA_MOVIE (MOVIE_ID)
		REFERENCES movie (ID)
		ON UPDATE RESTRICT
		ON DELETE RESTRICT,
	FOREIGN KEY FK_MA_LANGUAGE (LANGUAGE_ID)
		REFERENCES language (ID)
		ON UPDATE RESTRICT
		ON DELETE RESTRICT
);