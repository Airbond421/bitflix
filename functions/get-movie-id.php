<?php

function getFirstMovieIdOnPage(int $page): int
{
	return NUMBER_OF_MOVIES_PER_PAGE * ($page - 1);
}

function getLastMovieIdOnPage(array $movies, int $page): int
{
	$firstMovieIdOnPage = getFirstMovieIdOnPage($page);
	if ($firstMovieIdOnPage + NUMBER_OF_MOVIES_PER_PAGE > count($movies))
	{
		$lastMovieIdOnPage = count($movies);
	}
	else
	{
		$lastMovieIdOnPage = $firstMovieIdOnPage + NUMBER_OF_MOVIES_PER_PAGE;
	}

	return $lastMovieIdOnPage;
}