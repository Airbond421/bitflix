<?php

function filterMoviesByGenre(array $movies, string $genre): array
{
	$filteredMovies = [];

	foreach ($movies as $movie)
	{
		if (in_array($genre, $movie['genres'], true))
		{
			$filteredMovies[] = $movie;
		}
	}

	return $filteredMovies;
}

function searchMoviesByTitle(array $movies, string $title): array
{
	$filteredMovies = [];
	$title = trim($title);
	foreach ($movies as $movie)
	{
		if (is_int(mb_strripos($movie['title'], $title)))
		{
			$filteredMovies[] = $movie;
		}
		elseif (is_int(mb_strripos($movie['original-title'], $title)))
		{
			$filteredMovies[] = $movie;
		}
	}

	return $filteredMovies;
}

function getMovieById(array $movies, int $movieId): array
{
	$index = array_search((int)$movieId, array_column($movies, 'id'), true);

	if ($index === false)
	{
		throw new ErrorException('movieNotFound');
	}

	return $movies[$index];
}

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