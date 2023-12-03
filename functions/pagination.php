<?php

function countMovies(array $filter): int
{
	$connection = getDbConnection();

	if (isset($filter['genreKey']))
	{
		$genre = mysqli_real_escape_string($connection, (string)$filter['genreKey']);
		$sql = "SELECT COUNT(*) FROM movie
                inner join bitflix.movie_genre mg on movie.ID = mg.MOVIE_ID
                inner join bitflix.genre g on mg.GENRE_ID = g.ID
                where g.CODE = '{$genre}';";
	}
	elseif (isset($filter['title']))
	{
		$title = mysqli_real_escape_string($connection, (string)$filter['title']);
		$sql = "SELECT COUNT(*) FROM movie 
                where TITLE like '%{$title}%' or ORIGINAL_TITLE like '%{$title}%';";
	}
	else
	{
		$sql = "SELECT COUNT(*) FROM movie;";
	}

	$result = mysqli_query($connection, $sql);

	if (!$result)
	{
		throw new Exception(mysqli_error($connection));
	}

	$row = mysqli_fetch_row($result);

	return (int)$row[0];
}

function countPages(int $countOfMovies): int
{
	return (int)ceil($countOfMovies / option('NUMBER_OF_MOVIES_PER_PAGE'));
}

function getPageNumbersInFooter(int $page, int $numberOfPage): array
{
	$numberOfPagesInTheFooter = option('NUMBER_OF_PAGES_IN_THE_FOOTER');
	if ($numberOfPage <= $numberOfPagesInTheFooter)
	{
		$firstPageNumber = 1;
		$lastPageNumber = $numberOfPage;
	}
	else
	{
		if ($page - floor($numberOfPagesInTheFooter / 2) < 1)
		{
			$firstPageNumber = 1;
		}
		elseif ($page + floor($numberOfPagesInTheFooter / 2) > $numberOfPage)
		{
			$firstPageNumber = $numberOfPage - $numberOfPagesInTheFooter + 1;
		}
		else
		{
			$firstPageNumber = $page - floor($numberOfPagesInTheFooter / 2);
		}
		$lastPageNumber = $firstPageNumber + $numberOfPagesInTheFooter;
	}

	return ['first' => $firstPageNumber, 'last' => $lastPageNumber];
}