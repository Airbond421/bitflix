<?php
/**
 * @var Movie $movie
 */
?>
<div class="movie_cards">
	<div class="background_movie_card">
		<a class="details_btn_movie_card" href="/detail.php?movieId=<?= $movie->getId() ?>"><p>ПОДРОБНЕЕ</p>
		</a>
	</div>
	<div class="movie_card">
		<img src="/img/movie/<?= $movie->getId() ?>.jpg" alt="">
		<div class="movie_name">
			<h1><?= $movie->getTitle() ?></h1>
			<h2><?= $movie->getOriginalTitle() ?></h2>
		</div>
		<div class="description">
			<p><?= $movie->getDescription()?></p>
		</div>
		<div class="movie_info">
			<div class="movie_info_time">
				<img src="/img/icons/clock.svg" alt="">
				<p><?= formatTimeToString($movie->getDuration()) ?></p>
			</div>
			<p class="movie_info_genre">
				<?= implode(', ', $movie->getGenres()) ?>
			</p>
		</div>
	</div>
</div>