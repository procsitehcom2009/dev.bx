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

function searchMoviesByName($database,array $genres, string $searchName):array
{
    $query = generateSqlQueryMovies(['searchName'=>$searchName]);

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
	$query = generateSqlQueryMovies(['codeGenre'=>$codeGenre]);

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
    $query = generateSqlQueryMovies(['movieId'=>$movieId]);

    $result = mysqli_query($database, $query);
    if (!$result) {
        trigger_error($database->error, E_USER_ERROR);
    }

    $movie = mysqli_fetch_all($result,MYSQLI_ASSOC);

	for ($count=0;$count<count($movie);$count++)
	{
		$movie[$count]['CAST']=getNameCastById(getCastsById($database,$movie[$count]['CAST']));
	}

    return $movie;
}

function getCastsById($database,string $casts): array
{
	$query = "SELECT ID,NAME FROM actor WHERE ID IN ({$casts});";

	$result = mysqli_query($database, $query);
	if (!$result) {
		trigger_error($database->error, E_USER_ERROR);
	}

	$selectedCasts = mysqli_fetch_all($result, MYSQLI_ASSOC);

	return $selectedCasts;
}

function getNameCastById(array $casts):string
{
	for ($count=0;$count<count($casts);$count++){
		$nameCasts [] = $casts[$count]['NAME'];
	}
	return implode(",",$nameCasts);
}

function generateSqlQueryMovies(array $SqlData = []): string
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
       (SELECT GROUP_CONCAT(GENRE_ID) FROM movie_genre mg WHERE mg.MOVIE_ID=m.ID) as GENRES,
       (SELECT GROUP_CONCAT(ACTOR_ID) FROM movie_actor ma WHERE ma.MOVIE_ID=m.ID) as CAST
FROM movie m INNER JOIN director d on m.DIRECTOR_ID = d.ID";
	if (isset($SqlData['codeGenre']))
	{
		$query .=" INNER JOIN movie_genre g on m.ID = g.MOVIE_ID WHERE g.GENRE_ID=(SELECT DISTINCT ID FROM genre WHERE genre.CODE='{$SqlData['codeGenre']}')";
	}
	if (isset($SqlData['movieId'])){
		$query .=" WHERE m.ID={$SqlData['movieId']}";
	}
    if (isset($SqlData['searchName']))
    {
        $query .=" WHERE m.TITLE LIKE '%{$SqlData['searchName']}%'";
    }
	$query .=" GROUP BY m.ID;";
	return $query;
}