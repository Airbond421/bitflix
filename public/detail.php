<?php

require_once __DIR__ . '/../boot.php';

/**
 * @var array $navMenu
 * @var array $errorMassage
 */


try
{
	$filter['id'] = $_GET['movieId'];
	$movie = new \bitflix\repository\Movie();

	echo view('layout', [
		'navMenu' => getNavMenu(),
		'content' => view('pages/detail', [
			'movie' => $movie->getList($filter)[$filter['id']],
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
catch (Exception $e)
{
	echo view('layout', [
		'navMenu' => [],
		'content' => view('components/error', [
			'errorMessage' => getErrorMassage($e->getMessage()),
		]),
	]);
}

