<?php
/**
 * @var array $content
 * @var array $genres
 */

?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title> Bitflix </title>
	<link rel="shortcut icon" href="/img/icons/logo.svg"/>
	<link rel="stylesheet" href="/css/reset.css">
	<link rel="stylesheet" href="/css/style.css">
</head>
S
<body class="body">

<div class="header">
	<form action="/" method="get" class="search_form">
		<input type="text" name="title" class="search_text" placeholder="Поиск по каталогу...">
		<button type="submit" class="search_submit">ИСКАТЬ</button>
	</form>
	<a href="/add-movie.php" class="add_movie_btn">ДОБАВИТЬ ФИЛЬМ</a>
</div>

<div class="nav">
	<img class="nav_logo" src="/img/icons/logo.svg" alt="">
	<ul class="nav_component">
		<li><a href="/">ГЛАВНАЯ</a></li>
		<?php
		foreach ($genres as $key => $genre)
		{
			?>
			<li><a href="/?genreKey=<?= $key ?>"><?= $genre ?></a></li>
			<?php
		}
		?>
		<li><a href="/favorite.php">ИЗБРАННОЕ</a></li>
	</ul>
</div>

<div class="content">
	<?= $content ?>
</div>

</body>
</html>