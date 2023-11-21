<?php
/**
 * @var array $movies
 * @var int $page
 */

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
		$index = 15 * ($page - 1);
		$lastPage = ceil(count($movies) / 15);
		for ($i = $index; $i < $index + 15; $i++)
		{

			if ($i >= count($movies))
			{
				break;
			}
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


