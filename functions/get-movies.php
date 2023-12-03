<?php

function getMovies(int $page, array $filter = null): array
{
	$connection = getDbConnection();

	$limit = option('NUMBER_OF_MOVIES_PER_PAGE');
	$offset = $limit * ($page - 1);

	if (isset($filter['genreKey']))
	{
		$genre = mysqli_real_escape_string($connection, (string)$filter['genreKey']);
		$sql = "
		SELECT m.id AS 'id', title, original_title AS 'original-title', description, duration, g.name AS 'genres'
		FROM (SELECT m.id, title, original_title, description, duration
		      FROM movie m
		      INNER JOIN bitflix.movie_genre mg ON m.ID = mg.MOVIE_ID
		      INNER JOIN bitflix.genre g ON mg.GENRE_ID = g.ID
		      WHERE CODE ='{$genre}'
		      LIMIT {$limit} OFFSET {$offset}) AS m
		INNER JOIN bitflix.movie_genre mg ON m.id = mg.MOVIE_ID
		INNER JOIN bitflix.genre g ON mg.GENRE_ID = g.ID
		ORDER BY id;";
	}
	elseif (isset($filter['title']))
	{
		$title = mysqli_real_escape_string($connection, (string)$filter['title']);
		$sql = "
		SELECT m.id AS 'id', title, original_title AS 'original-title', description, duration, g.name AS 'genres'
		FROM (SELECT id, title, original_title, description, duration
		      FROM movie
		      WHERE TITLE LIKE '%{$title}%' OR ORIGINAL_TITLE LIKE '%{$title}%'
		      LIMIT {$limit} OFFSET {$offset}) AS m
		INNER JOIN bitflix.movie_genre mg ON m.id = mg.MOVIE_ID
		INNER JOIN bitflix.genre g ON mg.GENRE_ID = g.ID
		ORDER BY id;";
	}
	else
	{
		$sql = "
		SELECT m.id AS 'id', title, original_title AS 'original-title', description, duration, g.name AS 'genres'
		FROM (SELECT id, title, original_title, description, duration
		      FROM movie m
		      LIMIT {$limit} OFFSET {$offset}) AS m
		INNER JOIN bitflix.movie_genre mg ON m.id = mg.MOVIE_ID
		INNER JOIN bitflix.genre g ON mg.GENRE_ID = g.ID
		ORDER BY id;";
	}

	$result = mysqli_query($connection, $sql);

	if (!$result)
	{
		throw new Exception(mysqli_error($connection));
	}

	$movies = [];

	while ($row = mysqli_fetch_assoc($result))
	{
		$row['genres'] = (array)$row['genres'];

		if (!$movies)
		{
			$movies[] = $row;
			continue;
		}

		if (in_array($row['id'], array_column($movies, 'id'), true))
		{
			$index = array_search($row['id'], array_column($movies, 'id'), true);
			$movies[$index]['genres'] = array_merge($movies[$index]['genres'], $row['genres']);
		}
		else
		{
			$movies[] = $row;
		}
	}

	return $movies;
}

function getMovieById(int $movieId): array
{
	$connection = getDbConnection();

	$sql = "
		SELECT movie.id as id, title, original_title as 'original-title', description, duration,
		g.name as 'genres', a.NAME as 'cast', d.NAME as 'director',
		age_restriction as 'age-restriction', release_date as 'release-date', rating
		FROM movie
			INNER JOIN bitflix.movie_genre mg ON movie.ID = mg.MOVIE_ID
			INNER JOIN bitflix.genre g ON mg.GENRE_ID = g.ID
			INNER JOIN bitflix.movie_actor ma ON movie.ID = ma.MOVIE_ID
			INNER JOIN bitflix.actor a ON ma.ACTOR_ID = a.ID
			INNER JOIN bitflix.director d ON movie.DIRECTOR_ID = d.ID
		WHERE movie.id = {$movieId};"
	;

	$result = mysqli_query($connection, $sql);
	if (!$result)
	{
		throw new Exception(mysqli_error($connection));
	}

	$movie = [];
	while ($row = mysqli_fetch_assoc($result))
	{
		if (!$movie)
		{
			$movie = $row;
			$movie['genres'] = (array)$movie['genres'];
			$movie['cast'] = (array)$movie['cast'];
			continue;
		}
		if (!in_array($row['genres'], $movie['genres'], true))
		{
			$movie['genres'][] = $row['genres'];
		}
		if (!in_array($row['cast'], $movie['cast'], true))
		{
			$movie['cast'][] = $row['cast'];
		}
	}

	if (!$movie)
	{
		throw new ErrorException('movieNotFound');
	}

	return $movie;
}