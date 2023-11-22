<?php

/**
 * @var array $movies
 * @var int $page
 */

$firstMovieIdOnPage = getFirstMovieIdOnPage($page);
$lastMovieIdOnPage = getLastMovieIdOnPage($movies, $page);
$lastPage = ceil(count($movies) / NUMBER_OF_MOVIES_PER_PAGE);
?>

<?php
if (empty($movies))
{
	?>
	<div class="error"><p>Фильмы не найдены :С</p></div><?php
}
else
{
	?>
	<div class="main_content">
		<?php
		for ($i = $firstMovieIdOnPage; $i < $lastMovieIdOnPage; $i++)
		{
			echo view('components/movie-card', ['movie' => $movies[$i]]);
		}
		?>
	</div>
	<footer>
		<?php
		echo view('components/page-footer', [
			'page' => $page,
			'lastPage' => $lastPage,
		]) ?>
	</footer>
	<?php
}
?>


