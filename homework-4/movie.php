<?php
/** @var array $config */
require_once "./config/app.php";
require_once "./lib/template-functions.php";
require_once "./lib/helper-functions.php";
require_once "./lib/movies-functions.php";
/** @var array $movies */
/** @var array $genres */
require_once "./data/movies.php";

$movieId = $_GET['movieId'];

if (!isset($movieId)||(!is_numeric($movieId))){
	header("Location: index.php");
}

$moviePage = renderTemplate("./resources/pages/movie-detail.php", [
	'movie' => getMovieById($movies,(int)$movieId),
]);

renderLayout($moviePage, [
	'config' => $config,
	'genres' => $genres,
	'currentPage' => getFileName(__FILE__),
]);