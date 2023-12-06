<?php

require_once __DIR__ . '/../boot.php';

/**
 * @var array $movies
 * @var array $navMenu
 * @var array $errorMassage
 */

try
{
	$movie = getFullInfoAboutMovieById((int)$_GET['movieId']);

	echo view('layout', [
		'navMenu' => getNavMenu(),
		'content' => view('pages/detail', [
			'movie' => $movie,
		]),
	]);
}
catch (ErrorException $e)
{
	echo view('layout', [
		'navMenu' => getNavMenu(),
		'content' => view('components/error', [
			'errorMessage' => getErrorMassage($e->getMessage()),
		]),
	]);
}

