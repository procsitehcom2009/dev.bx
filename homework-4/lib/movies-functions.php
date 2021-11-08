<?php

function cutDescriptionMovies(array $movies, int $count):array
{
	for ($i=0;$i<count($movies);$i++){
		$movies[$i]['description']= mb_strimwidth($movies[$i]['description'], 0, $count, '...');
	}
	return $movies;
}