<?php

function getMoviesByGenre(array $movies, string $genre): array
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

function getMoviesByTitle(array $movies, string $title): array
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

function getMovieById(array $movies, string $movieId): array
{
	if (!is_numeric($movieId))
	{
		throw new ErrorException('movieNotFound');
	}

	$index = array_search((int)$movieId, array_column($movies, 'id'), true);

	if ($index === false)
	{
		throw new ErrorException('movieNotFound');
	}

	return $movies[$index];
}