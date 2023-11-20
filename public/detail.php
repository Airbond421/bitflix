<?php

require_once __DIR__ . '/../boot.php';

/**
 * @var array $movies
 * @var array $genres
 */

$movie = [];

if (isset($_GET['movieId']))
{
	$movie = getMovieById($movies, $_GET['movieId']);
}

echo view('layout', [
	'genres' => $genres,
	'content' => view('pages/detail', [
		'movie' => $movie,
	]),
]);