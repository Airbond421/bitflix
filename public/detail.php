<?php

require_once __DIR__ . '/../boot.php';

/**
 * @var array $movies
 * @var array $navMenu
 */

$movie = [];

if (isset($_GET['movieId']) & isset($movies[$_GET['movieId']]))
{
	$movie = getMovieById($movies, $_GET['movieId']);
}

echo view('layout', [
	'navMenu' => $navMenu,
	'content' => view('pages/detail', [
		'movie' => $movie,
	]),
]);