<?php

require_once __DIR__ . '/../boot.php';

/**
 * @var array $movies
 * @var array $navMenu
 * @var array $errorMassage
 */

$isMovieId = isset($_GET['movieId']) && is_numeric($_GET['movieId']);

if (isset($_GET['movieId']))
{
	try
	{
		$movie = getMovieById($movies, $_GET['movieId']);
		echo view('layout', [
			'navMenu' => $navMenu,
			'content' => view('pages/detail', [
				'movie' => $movie,
			]),
		]);
	}
	catch (ErrorException $e)
	{
		echo view('layout', [
			'navMenu' => $navMenu,
			'content' => view('components/error', [
				'errorMessage' => $errorMassage[$e->getMessage()],
			]),
		]);
	}
}
