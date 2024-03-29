<?php
/**
 * @var array $movie
 */
?>
<div class="movie_cards">
	<div class="background_movie_card">
		<a class="details_btn_movie_card" href="/detail.php?movieId=<?= $movie['id'] ?>"><p>ПОДРОБНЕЕ</p>
		</a>
	</div>
	<div class="movie_card">
		<img src="/img/movie/<?= $movie['id'] ?>.jpg" alt="">
		<div class="movie_name">
			<h1><?= $movie['title'] ?></h1>
			<h2><?= $movie['original-title'] ?></h2>
		</div>
		<div class="description">
			<p><?= $movie['description'] ?></p>
		</div>
		<div class="movie_info">
			<div class="movie_info_time">
				<img src="/img/icons/clock.svg" alt="">
				<p><?= formatTimeToString($movie['duration']) ?></p>
			</div>
			<p class="movie_info_genre">
				<?= implode(', ', (array)$movie['genres']) ?>
			</p>
		</div>
	</div>
</div>