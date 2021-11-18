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

$database = getDBConnection($config['db']);
$genres = getGenres($database);

if ((!isset($_GET['searchName'])&&(!isset($_GET['codeGenre']))))
{
    $codeGenre = "";
    $movies = getMoviesByGenre($database, $genres);
}

if (isset($_GET['searchName']))
{
    $codeGenre = "";
    $searchName = $_GET['searchName'];
    $searchName = trim($searchName);
    $searchName = stripslashes($searchName);
    $searchName = htmlspecialchars($searchName);
    $movies = searchMoviesByName($database,$genres,$searchName);
}

if (isset($_GET['codeGenre'])&&(issetGenreCode($_GET['codeGenre'],$genres)==true)){
    $codeGenre = $_GET['codeGenre'];
    $movies = getMoviesByGenre($database, $genres, $codeGenre);
}

if (!empty($movies))
{
    $moviesListPage = renderTemplate("./resources/pages/movies-list.php", [
        'movies' => $movies,
    ]);
} else
{
    $moviesListPage = renderTemplate("./resources/pages/not-found.php", [
        'searchName' => $searchName,
    ]);
}


renderLayout($moviesListPage, [
	'config' => $config,
	'genres' => $genres,
    'currentGenre'=> $codeGenre,
	'currentPage' => getFileName(__FILE__),
]);