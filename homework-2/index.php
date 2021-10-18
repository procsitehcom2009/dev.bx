<?php
/** @var array $movies */
require "./movies/movies.php";
require "./movies/movies-functions.php";
require "functions.php";

$age = readline("Введите ваш возраст:");
$validatedAge = validateAge($age);
($validatedAge >= 0) ? printMovies(filterAvailableMovies($validatedAge, $movies)) : print_r("Введите корректный возраст");