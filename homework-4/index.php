<?php
declare(strict_types=1);
error_reporting(-1);
/** @var array $config */
require_once "./config/app.php";
require_once "./lib/template-functions.php";
require_once "./lib/helper-functions.php";
require_once "./lib/movies-functions.php";
require_once "./lib/helper-db.php";
/** @var array $movies */
/** @var array $genres */

$database = connectionDB($config['db']);
$genres = getGenres($database);

if (isset($_GET['codeGenre'])&&(issetGenreCode($_GET['codeGenre'],$genres)==true)){
    $codeGenre = $_GET['codeGenre'];
    $movies = getMoviesByGenre($database, $genres, $codeGenre);
} else {
    $codeGenre = "";
    $movies = getMoviesByGenre($database, $genres);
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