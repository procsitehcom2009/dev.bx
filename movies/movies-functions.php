<?php

function printMovies(array $movies): void
{
    foreach ($movies as $movie)
    {
        printMessage(formatMovie($movie));
    }
}

function formatMovie(array $movie): string
{
    return "{$movie['title']} ({$movie['release_year']}), {$movie['age_restriction']}+. Rating - {$movie['rating']}";
}

function restrictionsMoviesAge(int $age, array $movies): array
{
    $restrictionsMovies = [];
    foreach ($movies as $movie)
    {
        if ($age >= $movie["age_restriction"])
        {
            $restrictionsMovies[] = $movie;
        }
    }
    return $restrictionsMovies;
}