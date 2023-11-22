<?php

require_once __DIR__ . '/../boot.php';

/**
 * @var array $movies
 * @var array $navMenu
 */

$filteredMovies = [];

if (isset($_GET['genreKey']))
{
	if (isset($genres[$_GET['genreKey']]))
	{
		$genre = $genres[$_GET['genreKey']];
		$filteredMovies = getMoviesByGenre($movies, $genre);
	}
}
elseif (isset($_GET['title']))
{
	$filteredMovies = getMoviesByTitle($movies, $_GET['title']);
}
else
{
	$filteredMovies = $movies;
}

if (isset($_GET['p']) & is_numeric($_GET['p']) & ($_GET['p'] > 0))
{
	$page = (int)($_GET['p']);
}
else
{
	$page = 1;
}

echo view('layout', [
	'navMenu' => $navMenu,
	'content' => view('pages/index', [
		'page' => $page,
		'movies' => $filteredMovies,
	]),
]);
