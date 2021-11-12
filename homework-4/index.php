<?php
declare(strict_types=1);
error_reporting(-1);
/** @var array $config */
require_once "./config/app.php";
require_once "./lib/template-functions.php";
require_once "./lib/helper-functions.php";
require_once "./lib/movies-functions.php";
/** @var array $movies */
/** @var array $genres */
require_once "./data/movies.php";

if (isset($_GET['codeGenre'])&&isset($genres[$_GET['codeGenre']])){
    $codeGenre = $_GET['codeGenre'];
    $movies = getMoviesByGenre($movies,$genres[$codeGenre]);
} else {
    $codeGenre = "";
}


$moviesListPage = renderTemplate("./resources/pages/movies-list.php", [
	'movies' => $movies,
]);

renderLayout($moviesListPage, [
	'config' => $config,
	'genres' => $genres,
    'currentGenre'=> $codeGenre,
	'currentPage' => getFileName(__FILE__),
]);