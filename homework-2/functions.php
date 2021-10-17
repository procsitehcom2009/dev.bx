<?php

function printMessage(string $message): void
{
    echo $message . "\n";
}

function validateAge(string $age, array $movies): void
{
    if (is_numeric($age))
    {
        $validateAge = (int) $age;
        ($validateAge>=0) ? printMovies(filterAvailableMovies($validateAge,$movies)) : print_r("Возраст не может быть отрицательным");
    }
    else
    {
        printMessage("Возраст должен состоять только из цифр");
    }
}