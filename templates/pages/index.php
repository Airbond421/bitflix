<?php

/**
 * @var array $movies
 * @var int $page
 */

$firstMovieIdOnPage = getFirstMovieIdOnPage($page);
$lastMovieIdOnPage = getLastMovieIdOnPage($movies, $page);
$numberOfPage = getNumberOfPage($movies);
?>

<div class="main_content">
	<?php
	for ($movieIndexOnPage = $firstMovieIdOnPage; $movieIndexOnPage < $lastMovieIdOnPage; $movieIndexOnPage++)
	{
		echo view('components/index/movie-card', ['movie' => $movies[$movieIndexOnPage]]);
	}
	?>
</div>
<footer class="pagination">
	<?= view('components/index/pagination', [
		'page' => $page,
		'numberOfPage' => $numberOfPage,
	]) ?>
</footer>


