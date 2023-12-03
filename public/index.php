<?php

require_once __DIR__ . '/../boot.php';

/**
 * @var array $navMenu
 * @var array $errorMassage
 */

$countOfMovies = countMovies($_GET);

if (isset($_GET['p']) && is_numeric($_GET['p']) && ($_GET['p'] > 0))
{
	$page = (int)$_GET['p'];
	if ($page > countPages($countOfMovies))
	{
		$page = countPages($countOfMovies);
	}
}
else
{
	$page = 1;
}

$movies = getMovies($page, $_GET);

if ($movies)
{
	echo view('layout', [
		'navMenu' => getNavMenu(),
		'content' => view('pages/index', [
			'countOfMovies' => $countOfMovies,
			'page' => $page,
			'movies' => $movies,
		]),
	]);
}
else
{
	echo view('layout', [
		'navMenu' => getNavMenu(),
		'content' => view('components/error', [
			'errorMessage' => getErrorMassage('moviesNotFound'),
		]),
	]);
}


