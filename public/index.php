<?php

require_once __DIR__ . '/../boot.php';

/**
 * @var array $movies
 * @var array $genres
 */

if (isset($_GET['genreKey']))
{
	$genre = $genres[$_GET['genreKey']];
	if (isset($genre))
	{
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
	'genres' => $genres,
	'content' => view('pages/index', [
		'movies' => $filteredMovies,
	]),
]);
