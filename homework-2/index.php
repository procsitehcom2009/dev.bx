<?php
/** @var array $movies */
require "./movies/movies.php";
require "./movies/movies-functions.php";
require "functions.php";

$age = readline("Введите ваш возраст:");
$validatedAge = validateAge($age);
($validateAge >= 0) ? printMovies(filterAvailableMovies($validateAge, $movies)) : print_r("Введите корректный возраст");