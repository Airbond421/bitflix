<?php

use bitflix\models\Movie;

function mappingMovie(Movie $movie, array $row): Movie
{
	if (!in_array($row['cast'], $movie->getCast(), true))
	{
		$movie->addCast($row['cast']);
	}
	if (!in_array($row['genres'], $movie->getGenres(), true))
	{
		$movie->addGenre($row['genres']);
	}

	return $movie;
}