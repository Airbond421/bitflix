<?php

function getMoviesByIds(array $movieIds): array
{
	$connection = getDbConnection();

	$movieIds = implode(',', $movieIds);

	$sql = "
		SELECT m.id as id, title, original_title as 'originalTitle', description, duration,
			g.name as 'genres', a.NAME as 'cast', d.NAME as 'director',
			age_restriction as 'ageRestriction', release_date as 'releaseDate', rating
		FROM movie m
			INNER JOIN movie_genre mg ON m.ID = mg.MOVIE_ID
			INNER JOIN genre g ON mg.GENRE_ID = g.ID
			INNER JOIN movie_actor ma ON m.ID = ma.MOVIE_ID
			INNER JOIN actor a ON ma.ACTOR_ID = a.ID
			INNER JOIN director d ON m.DIRECTOR_ID = d.ID
		WHERE m.id IN ({$movieIds})
		ORDER BY id;";

	$result = mysqli_query($connection, $sql);

	if (!$result)
	{
		throw new Exception(mysqli_error($connection));
	}

	$movies = [];

	while ($row = mysqli_fetch_assoc($result))
	{
		if (!isset($movies[$row['id']]))
		{
			$movies[$row['id']] = new Movie($row);

			continue;
		}
		$movies[$row['id']] = mappingMovie($movies[$row['id']], $row);
	}

	return $movies;
}

function getMovieIds(int $page, array $filter): array
{
	$connection = getDbConnection();

	$limit = option('NUMBER_OF_MOVIES_PER_PAGE');
	$offset = $limit * ($page - 1);

	if (isset($filter['genreKey']))
	{
		$genre = mysqli_real_escape_string($connection, (string)$filter['genreKey']);
		$sql = "
			SELECT m.id
			FROM movie m
				INNER JOIN movie_genre mg ON m.ID = mg.MOVIE_ID
				INNER JOIN genre g ON mg.GENRE_ID = g.ID
			WHERE CODE ='{$genre}'
			ORDER BY id
			LIMIT {$limit} OFFSET {$offset}";
	}
	elseif (isset($filter['title']))
	{
		$title = mysqli_real_escape_string($connection, (string)$filter['title']);
		$sql = "
			SELECT id
			FROM movie
			WHERE TITLE LIKE '%{$title}%' OR ORIGINAL_TITLE LIKE '%{$title}%'
			ORDER BY id
			LIMIT {$limit} OFFSET {$offset}";
	}
	else
	{
		$sql = "
			SELECT id
			FROM movie
			ORDER BY id
			LIMIT {$limit} OFFSET {$offset}";
	}

	$result = mysqli_query($connection, $sql);

	if (!$result)
	{
		throw new Exception(mysqli_error($connection));
	}

	$movieIds = [];

	while ($row = mysqli_fetch_assoc($result))
	{
		$movieIds[] = $row['id'];
	}

	return $movieIds;
}