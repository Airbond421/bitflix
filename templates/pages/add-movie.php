<?php

?>

<form class = "add_movie" method="post">
	<div class="field">
		<label for = "title">Название фильма:</label>
		<input type = "text" name = "title" placeholder="Какое название фильма?">
	</div>
	<div class="field">
		<label for = "originalTitle">Оригинальное название фильма:</label>
		<input type = "text" name = "originalTitle" placeholder="Какое оригинальное название фильма?">
	</div>
	<div class="field">
		<label for = "description">Описание:</label>
		<input type = "text" name = "description" placeholder="Напишите описание фильма">
	</div>
	<div class="field">
		<label for = "duration">Продолжительность фильма:</label>
		<input type = "text" name = "duration" placeholder="Какая продолжительность фильма?">
	</div>
	<div class="field">
		<label for = "ageRestriction">Возрастной рейтинг:</label>
		<input type = "text" name = "ageRestriction" placeholder="Какой возрастной рейтинг у фильма?">
	</div>
	<div class="field">
		<label for = "releaseDate">Год производства:</label>
		<input type = "text" name = "releaseDate" placeholder="В каком году вышел фильм?">
	</div>
	<div class="field">
		<label for = "rating">Рейтинг:</label>
		<input type = "text" name = "rating" placeholder="Какой рейтинг фильма?">
	</div>
	<div class="field">
		<label for = "director">Режиссер:</label>
		<input type = "text" name = "director" placeholder="Как зовут режиссера?">
	</div>
	<div class="field">
		<label for = "cast">Актеры:</label>
		<input type = "text" name = "cast" placeholder="Как зовут актера?">
	</div>
	<div class="field">
		<label for = "genres">Жанры:</label>
		<input type = "text" name = "genres" placeholder="Какой жанр?">
	</div>
	<div class="add_movie_button">
		<button type = "submit">ДОБАВИТЬ ФИЛЬМ</button>
	</div>
</form>