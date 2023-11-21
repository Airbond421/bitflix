<?php

/** @var array $genres */

$navMenu = [];

$navMenu[] = ['url' => '/', 'text' => 'ГЛАВНАЯ'];

foreach ($genres as $genre)
{
	$navMenu[] = ['url' => '/?genreKey=' . key($genres), 'text' => $genre];
}

$navMenu[] = ['url' => '/favorite.php', 'text' => 'ИЗБРАННОЕ'];
