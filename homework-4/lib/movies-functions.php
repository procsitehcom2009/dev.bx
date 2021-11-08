<?php

function cutDescriptionMovies(array $movies, int $count):array
{
	foreach ($movies as $movie){
		$movie['description'] = mb_strimwidth($movie['description'], 0, $count, '...');
	}
	return $movies;
}