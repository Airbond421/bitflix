<?php

use bitflix\models\Movie;

/**
 * @var Movie $movie
 */

?>

<?php
?>
<div class="detail_content">
	<div class="movie_header">
		<div class="movie_name">
			<h1><?= $movie->getTitle() ?> (<?= $movie->getReleaseDate() ?>)</h1>
			<div class="eng_name_age">
				<h2><?= $movie->getOriginalTitle() ?></h2>
				<p><?= $movie->getAgeRestriction() ?>+</p>
			</div>
		</div>
		<a href="#">
			<img src="/img/icons/favorite.svg" alt="">
		</a>
	</div>

	<div class="img_description">
		<img class="movie_detail_poster" src="/img/movie/<?= $movie->getId() ?>.jpg" alt="">
		<div class="description">
			<div class="rating">
				<?php
				for ($i = 1; $i <= 10; $i++)
				{
					if ($i - $movie->getRating() <= 0)
					{
						?><span class="active"></span><?php
					}
					else
					{
						?><span></span><?php
					}
				}
				?>
				<p><?= $movie->getRating() ?></p>
			</div>

			<h1>О фильме</h1>
			<div class="movie_info">
				<h2>Год производства:</h2>
				<p><?= $movie->getReleaseDate() ?></p>
				<h2>Режиссер:</h2>
				<p><?= $movie->getDirector() ?></p>
				<h2>В главных ролях:</h2>
				<p><?= implode(', ', $movie->getCast()) ?></p>
			</div>
			<h1>Описание</h1>
			<p><?= $movie->getDescription() ?></p>
		</div>
	</div>

</div>
<?php
?>


