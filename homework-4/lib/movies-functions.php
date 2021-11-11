<?php

function cutDescriptionMovies(string $description, int $count):string
{
    return mb_strimwidth($description, 0, $count, '...');
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

function getMovieById(array $movies, int $movieId):array
{
	$selectMovie = [];
	foreach ($movies as $movie){
		if (in_array($movieId,$movie,true)){
			$selectMovie[] = $movie;
		}
	}
	return $selectMovie;
}