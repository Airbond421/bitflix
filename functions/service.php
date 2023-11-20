<?php

function view(string $path, array $variables = []): string
{
	if (!preg_match('/^[0-9a-zA-Z\/_-]+$/', $path))
	{
		throw new Exception('Invalid template path');
	}

	$absolutePath = ROOT . "/templates/$path.php";

	if (!file_exists($absolutePath))
	{
		throw new Exception('Invalid not found');
	}

	extract($variables);

	ob_start();

	require $absolutePath;

	return ob_get_clean();
}