<?php

function getErrorMassage(string $errorKey): string
{
	switch ($errorKey)
	{
		case 'Undefined array key "movieId"':
		case 'movieNotFound':
			return 'Фильм не найден';
		case 'moviesNotFound':
			return 'Фильмы не найдены';
		case 'pageIsNotWorking':
			return 'Эта страница пока не доступна';
	}
	throw new ErrorException($errorKey);
}