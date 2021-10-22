INSERT INTO language (ID, NAME)
VALUES ("ru", "Русский язык"),
	   ("en", "Английский язык"),
	   ("de", "Немецикя язык");

INSERT INTO movie_title (MOVIE_ID, LANGUAGE_ID, TITLE)
SELECT ID, "ru", TITLE
FROM movie;

ALTER TABLE movie
	DROP COLUMN TITLE;