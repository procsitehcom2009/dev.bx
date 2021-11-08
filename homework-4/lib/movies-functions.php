<?php

function cutDescriptionMovies(array $movies, int $count):array
{
	for ($i=0;$i<count($movies);$i++){
		$movies[$i]['description']= mb_strimwidth($movies[$i]['description'], 0, $count, '...');
	}
	return $movies;
}

function getMoviesByGenre(array $movies, string $nameGenre): array
{
	$filterMovies = [];
	foreach ($movies as $movie){
		if (in_array($nameGenre,$movie['genres'],true)){
			$filterMovies[]=$movie;
		}
	}
	return $filterMovies;
}