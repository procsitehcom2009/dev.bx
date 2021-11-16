<?php

function cutDescriptionMovies(string $description, int $count): string
{
    return mb_strimwidth($description, 0, $count, '...');
}

function getGenres($database): array
{
    $query = "SELECT * FROM genre";

    $result = mysqli_query($database, $query);
    if (!$result) {
        trigger_error($database->error, E_USER_ERROR);
    }

    $genres = mysqli_fetch_all($result, MYSQLI_ASSOC);

    foreach ($genres as $genre) {
        $formatGenres [$genre['ID']] = array('CODE' => $genre['CODE'], 'NAME' => $genre['NAME']);
    }

    return $formatGenres;
}

function issetGenreCode(string $code, array $genres): bool
{
    foreach ($genres as $genre) {
        if (in_array($code, $genre)) {
            return true;
        }
    }
    return false;
}

function getMoviesByGenre($database, array $genres, string $codeGenre = null): array
{
    if (!$codeGenre == null) {
        $query = "SELECT m.ID as ID,
       m.TITLE,
       m.ORIGINAL_TITLE,
       m.DESCRIPTION,
       m.DURATION,
       m.AGE_RESTRICTION,
       m.RELEASE_DATE,
       m.RATING,
       d.NAME as DIRECTOR_NAME,
       GROUP_CONCAT(mg.GENRE_ID) as GENRES
FROM movie m INNER JOIN director d on m.DIRECTOR_ID = d.ID
INNER JOIN movie_genre mg on m.ID = mg.MOVIE_ID
INNER JOIN genre g on mg.GENRE_ID = g.ID
WHERE mg.MOVIE_ID=m.ID and g.CODE='{$codeGenre}'
GROUP BY m.ID;";
    } else {
        $query = "SELECT m.ID as ID,
       m.TITLE,
       m.ORIGINAL_TITLE,
       m.DESCRIPTION,
       m.DURATION,
       m.AGE_RESTRICTION,
       m.RELEASE_DATE,
       m.RATING,
       d.NAME as DIRECTOR_NAME,
       GROUP_CONCAT(mg.GENRE_ID) as GENRES
FROM movie m INNER JOIN director d on m.DIRECTOR_ID = d.ID
INNER JOIN movie_genre mg on m.ID = mg.MOVIE_ID
WHERE mg.MOVIE_ID=m.ID
GROUP BY m.ID;";
    }

    $result = mysqli_query($database, $query);
    if (!$result) {
        trigger_error($database->error, E_USER_ERROR);
    }

    $movies = mysqli_fetch_all($result, MYSQLI_ASSOC);

    for ($count = 0; $count<count($movies);$count++) {
        $movies[$count]['GENRES'] = getNameGenreById($movies[$count]['GENRES'],$genres);
    }

    return $movies;
}

function getNameGenreById(string $movieGenres, array $genres): string
{
    $movieGenres = explode(",",$movieGenres);
    for ($count=0;$count<count($movieGenres);$count++){
        $formatMovieGenres [] = $genres[$movieGenres[$count]]['NAME'];
    }
    return implode(',',$formatMovieGenres);
}

function getMovieById($database, int $movieId): array
{
    $query = "SELECT m.ID as ID,
       m.TITLE,
       m.ORIGINAL_TITLE,
       m.DESCRIPTION,
       m.DURATION,
       m.AGE_RESTRICTION,
       m.RELEASE_DATE,
       m.RATING,
       d.NAME as DIRECTOR_NAME,
       GROUP_CONCAT(mg.GENRE_ID) as GENRES
FROM movie m INNER JOIN director d on m.DIRECTOR_ID = d.ID
INNER JOIN movie_genre mg on m.ID = mg.MOVIE_ID
WHERE mg.MOVIE_ID=m.ID and m.ID={$movieId}
GROUP BY m.ID;";

    $result = mysqli_query($database, $query);
    if (!$result) {
        trigger_error($database->error, E_USER_ERROR);
    }

    $movie = mysqli_fetch_assoc($result);

    return $movie;
}