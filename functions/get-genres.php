<?php

function getGenres(): array
{
	$connection = getDbConnection();

	$limit = option('MAX_NUMBER_OF_GENRES_IN_THE_NAV');
	$sql = "SELECT code, name AS genre FROM genre LIMIT {$limit};";

	$result = mysqli_query($connection, $sql);

	if (!$result)
	{
		throw new Exception(mysqli_error($connection));
	}

	$genres = [];

	while ($row = mysqli_fetch_assoc($result))
	{
		$genres[$row['code']] = $row['genre'];
	}

	return $genres;
}
