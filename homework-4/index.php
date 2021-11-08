<?php
/** @var array $config */
require_once "./config/app.php";
require_once "./lib/template-functions.php";
require_once "./lib/helper-functions.php";
require_once "./lib/movies-functions.php";
/** @var array $movies */
/** @var array $genres */
require_once "./data/movies.php";

$codeGenre = $_GET['codeGenre'];

if (isset($codeGenre)&&isset($genres[$codeGenre])){
	$movies = getMoviesByGenre($movies,$genres[$codeGenre]);
}

$moviesListPage = renderTemplate("./resources/pages/movies-list.php", [
	'movies' => cutDescriptionMovies($movies,150),
]);

renderLayout($moviesListPage, [
	'config' => $config,
	'genres' => $genres,
	'currentPage' => getFileName(__FILE__),
]);