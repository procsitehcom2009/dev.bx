<?php
require_once "./lib/template-functions.php";
require_once "./lib/helper-functions.php";
require_once "./lib/movies-functions.php";
/** @var array $movies */
require_once "./data/movies.php";

$moviesListPage = renderTemplate("./resources/pages/movies-list.php", [
	'movies' => cutDescriptionMovies($movies,150),
]);

$config = [];
renderLayout($moviesListPage, [
	'config' => $config,
	'currentPage' => getFileName(__FILE__),
]);