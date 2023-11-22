<?php

require_once __DIR__ . '/../boot.php';

/**
 * @var array $navMenu
 * @var array $errorMassage
 */

echo view('layout', [
	'navMenu' => $navMenu,
	'content' => view('components/error', [
		'errorMessage' => $errorMassage['pageIsNotWorking'],
	]),
]);
