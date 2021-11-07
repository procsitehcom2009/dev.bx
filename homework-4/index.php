<?php
require_once "./lib/template-functions.php";
require_once "./lib/helper-functions.php";
/** @var array $movies */
require_once "./data/movies.php";


$moviesListPage = renderTemplate($_SERVER['DOCUMENT_ROOT']."/resources/pages/movies-list.php", [
	'movies' => $movies
]);

$config = [];
renderLayout($moviesListPage, [
	'config' => $config,
	'currentPage' => getFileName(__FILE__),
]);