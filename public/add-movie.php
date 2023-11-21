<?php

require_once __DIR__ . '/../boot.php';

/**
 * @var array $movies
 * @var array $navMenu
 */

echo view('layout', [
	'navMenu' => $navMenu,
	'content' => view('pages/add-movie', []),
]);
