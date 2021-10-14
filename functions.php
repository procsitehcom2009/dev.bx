<?php

function printMessage(string $message): void
{
    echo $message . "\n";
}

function validateAge(int $age, array $movies): void
{
    if (is_numeric($age))
    {
        printMovies(restrictionsMoviesAge($age,$movies));
    }
    else
    {
        printMessage("Введите корректный возраст");
    }
}