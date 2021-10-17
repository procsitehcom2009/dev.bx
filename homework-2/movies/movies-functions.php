<?php

function printMovies(array $movies): void
{
	$serialNumber = (int) 0;
    foreach ($movies as $movie)
    {
        printMessage(formatMovie($movie,++$serialNumber));
    }
}

function formatMovie(array $movie, int $serialNumber): string
{
    return "{$serialNumber}. {$movie['title']} ({$movie['release_year']}), {$movie['age_restriction']}+. Rating - {$movie['rating']}";
}

function filterAvailableMovies(int $age, array $movies): array
{
    $availableMovies = [];
    foreach ($movies as $movie)
    {
        if ($age >= $movie["age_restriction"])
        {
            $availableMovies[] = $movie;
        }
    }
    return $availableMovies;
}