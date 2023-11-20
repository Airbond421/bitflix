<?php

require_once __DIR__ . '/../boot.php';

/**
 * @var array $movies
 * @var array $genres
 */

echo view('layout', [
	'genres' => $genres,
	'content' => view('pages/add-movie', []),
]);
