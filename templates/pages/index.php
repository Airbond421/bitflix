<?php

/**
 * @var array $movies
 * @var int $page
 * @var int $countOfMovies
 */

$countOfPage = (int)ceil($countOfMovies / option('NUMBER_OF_MOVIES_PER_PAGE'));

?>

<div class="main_content">
	<?php
	foreach ($movies as $movie)
	{
		echo view('components/index/movie-card', ['movie' => $movie]);
	}
	?>
</div>
<footer class="pagination">
	<?= view('components/index/pagination', [
		'page' => $page,
		'countOfPage' => $countOfPage,
	]) ?>
</footer>


