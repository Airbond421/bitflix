<?php

require_once __DIR__ . '/../boot.php';

/**
 * @var array $navMenu
 * @var array $errorMassage
 */

if (isset($_POST))
{
	// addMovie();
	var_dump($_POST);
}

echo view('layout', [
	'navMenu' => getNavMenu(),
	'content' => view('pages/add-movie'),
]);
