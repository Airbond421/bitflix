<?php

require_once __DIR__ . '/../boot.php';

/**
 * @var array $movies
 * @var array $navMenu
 * @var array $errorMassage
 */

$filteredMovies = $movies;

if (isset($_GET['genreKey']))
{
	if (isset($genres[$_GET['genreKey']]))
	{
		$genre = $genres[$_GET['genreKey']];
		$filteredMovies = filterMoviesByGenre($filteredMovies, $genre);
	}
	else
	{
		$filteredMovies = [];
	}
}

if (isset($_GET['title']))
{
	$filteredMovies = searchMoviesByTitle($filteredMovies, $_GET['title']);
}

if (isset($_GET['p']) && is_numeric($_GET['p']) && ($_GET['p'] > 0))
{
	$page = (int)$_GET['p'];
	if ($page>getNumberOfPage($movies))
	{
		$page = getNumberOfPage($movies);
	}
}
else
{
	$page = 1;
}

if ($filteredMovies)
{
	echo view('layout', [
		'navMenu' => $navMenu,
		'content' => view('pages/index', [
			'page' => $page,
			'movies' => $filteredMovies,
		]),
	]);
}
else
{
	echo view('layout', [
		'navMenu' => $navMenu,
		'content' => view('components/error', [
			'errorMessage' => getErrorMassage('moviesNotFound'),
		]),
	]);
}


