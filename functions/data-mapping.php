<?php

function mappingMovie(array $movie, array $row): array
{
	$keys = array_keys($movie);
	foreach ($keys as $key)
	{
		if ($movie[$key] === $row[$key])
		{
			continue;
		}
		if (!is_array($movie[$key]))
		{
			$movie[$key] = (array)$movie[$key];
		}
		if (!in_array($row[$key], $movie[$key], true))
		{
			$movie[$key][] = $row[$key];
		}
	}

	return $movie;
}