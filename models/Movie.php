<?php

namespace bitflix\models;
class Movie
{
	private int $id;
	private string $title;
	private string $originalTitle;
	private string $description;
	private int $duration;
	private int $ageRestriction;
	private int $releaseDate;
	private float $rating;
	private string $director;
	private array $cast;
	private array $genres;

	public function __construct(int    $id,
								string $title,
								string $originalTitle,
								string $description,
								int    $duration,
								int    $ageRestriction,
								int    $releaseDate,
								float  $rating,
								string $director,
								array  $cast,
								array  $genres
	)
	{
		$this->id = $id;
		$this->title = $title;
		$this->originalTitle = $originalTitle;
		$this->description = $description;
		$this->duration = $duration;
		$this->ageRestriction = $ageRestriction;
		$this->releaseDate = $releaseDate;
		$this->rating = $rating;
		$this->director = $director;
		$this->cast = $cast;
		$this->genres = $genres;
	}

	public function addGenre(string $genre): void
	{
		$this->genres[] = $genre;
	}

	public function addCast(string $cast): void
	{
		$this->cast[] = $cast;
	}

	public function getId(): int
	{
		return $this->id;
	}

	public function getTitle(): string
	{
		return $this->title;
	}

	public function getOriginalTitle(): string
	{
		return $this->originalTitle;
	}

	public function getDescription(): string
	{
		return $this->description;
	}

	public function getDuration(): int
	{
		return $this->duration;
	}

	public function getAgeRestriction(): int
	{
		return $this->ageRestriction;
	}

	public function getReleaseDate(): int
	{
		return $this->releaseDate;
	}

	public function getRating(): float
	{
		return $this->rating;
	}

	public function getDirector(): string
	{
		return $this->director;
	}

	public function getCast(): array
	{
		return $this->cast;
	}

	public function getGenres(): array
	{
		return $this->genres;
	}

}
