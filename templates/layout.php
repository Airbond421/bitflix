<?php
/**
 * @var array $content
 * @var array $navMenu
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

<header class="header">
	<form action="/" method="get" class="search_form">
		<input type="text" name="title" class="search_text" placeholder="Поиск по каталогу...">
		<button type="submit" class="search_submit">ИСКАТЬ</button>
	</form>
	<a href="/add-movie.php" class="add_movie_btn">ДОБАВИТЬ ФИЛЬМ</a>
</header>

<nav class="nav">
	<?php
	echo view('components/menu', ['navMenu' => $navMenu]) ?>
</nav>

<main class="content">
	<?= $content ?>
</main>

</body>
</html>