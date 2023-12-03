<?php

function getNavMenu(): array
{
	$genres = getGenres();

	$navMenu = [];

	$navMenu[] = ['url' => '/', 'text' => 'ГЛАВНАЯ'];

	foreach ($genres as $index => $genre)
	{
		$navMenu[] = ['url' => '/?genreKey=' . $index, 'text' => $genre];
	}

	$navMenu[] = ['url' => '/favorite.php', 'text' => 'ИЗБРАННОЕ'];

	return $navMenu;
}
