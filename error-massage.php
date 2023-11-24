<?php

function getErrorMassage(string $errorKey): string
{
	switch ($errorKey) {
		case 'movieNotFound':
			return 'Фильм не найден';
		case 'moviesNotFound':
			return 'Фильмы не найдены';
		case 'pageIsNotWorking':
			return 'Эта страница пока не доступна';
	}
	throw new ErrorException('Not found error massage');
};