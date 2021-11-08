<?php

/** @var array $config */
require_once "./config/app.php";
require_once "./lib/template-functions.php";
require_once "./lib/helper-functions.php";
require_once "./lib/movies-functions.php";
/** @var array $movies */
/** @var array $genres */
require_once "./data/movies.php";

$favoritesListPage = renderTemplate("./resources/pages/favorites-list.php", [
	'movies' => ''
]);

renderLayout($favoritesListPage, [
	'config' => $config,
	'genres' => $genres,
	'currentPage' => getFileName(__FILE__),
]);

