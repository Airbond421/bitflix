<?php

require_once __DIR__ . '/../boot.php';

/**
 * @var array $navMenu
 * @var array $errorMassage
 */

echo view('layout', [
	'navMenu' => getNavMenu(),
	'content' => view('components/error', [
		'errorMessage' => getErrorMassage('pageIsNotWorking'),
	]),
]);
