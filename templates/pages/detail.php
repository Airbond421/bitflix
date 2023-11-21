<?php
/**
 * @var array $movie
 */

?>

<?php
if (empty($movie))
{
	?>
	<div class="error"><p>Фильм не найден :С</p></div><?php
}
else
{
	?>
	<div class="detail_content">
		<div class="movie_header">
			<div class="movie_name">
				<h1><?= $movie['title'] ?> (<?= $movie['release-date'] ?>)</h1>
				<div class="eng_name_age">
					<h2><?= $movie['original-title'] ?></h2>
					<p><?= $movie['age-restriction'] ?>+</p>
				</div>
			</div>
			<a href="#">
				<img src="/img/icons/favorite.svg" alt="">
			</a>
		</div>

		<div class="img_description">
			<img class="movie_detail_poster" src="/img/movie/<?= $movie['id'] ?>.jpg" alt="">
			<div class="description">
				<div class="rating">
					<?php
					for ($i = 1; $i <= 10; $i++)
					{
						if ($i - $movie['rating'] <= 0)
						{
							?><span class="active"></span><?php
						}
						else
						{
							?><span></span><?php
						}
					}
					?>
					<p><?= $movie['rating'] ?></p>
				</div>

				<h1>О фильме</h1>
				<div class="movie_info">
					<h2>Год производства:</h2>
					<p><?= $movie['release-date'] ?></p>
					<h2>Режиссер:</h2>
					<p><?= $movie['director'] ?></p>
					<h2>В главных ролях:</h2>
					<p><?= implode(', ', $movie['cast']) ?></p>
				</div>
				<h1>Описание</h1>
				<p><?= $movie['description'] ?></p>
			</div>
		</div>

	</div>
	<?php
}
?>


