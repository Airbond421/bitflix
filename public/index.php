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

echo view('layout', [
	'navMenu' => $navMenu,
	'content' => view('pages/index', [
		'movies' => $filteredMovies,
	]),
]);
