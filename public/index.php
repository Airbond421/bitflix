<?php

use bitflix\repository\Movie;

require_once __DIR__ . '/../boot.php';

/**
 * @var array $navMenu
 * @var array $errorMassage
 */

try
{
	$filter = [];
	if (isset($_GET['title']))
	{
		$filter['title'] = $_GET['title'];
	}
	if (isset($_GET['genreKey']))
	{
		$filter['genreKey'] = $_GET['genreKey'];
	}

	$countOfMovies = countMovies($filter);

	if (isset($_GET['p']) && is_numeric($_GET['p']) && ((int)$_GET['p'] > 0))
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

	$movies = new Movie();

	echo view('layout', [
		'navMenu' => getNavMenu(),
		'content' => view('pages/index', [
			'movies' => $movies->getList($filter, $page),
			'countOfMovies' => $countOfMovies,
			'page' => $page,
		]),
	]);

}
catch (ErrorException $e)
{
	echo view('layout', [
		'navMenu' => getNavMenu(),
		'content' => view('components/error', [
			'errorMessage' => getErrorMassage('moviesNotFound'),
		]),
	]);
}
catch (Exception $e)
{
	echo view('layout', [
		'navMenu' => [],
		'content' => view('components/error', [
			'errorMessage' => getErrorMassage('moviesNotFound'),
		]),
	]);
}




