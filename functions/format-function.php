<?php

function formatArrayToString(array $array): string
{
	$string = '';
	foreach ($array as $value)
	{
		$string .= $value . ', ';
	}

	return substr($string, 0, -2);
}

function formatTimeToString(int $time): string
{
	$hours = intdiv($time, 60);
	$minutes = $time % 60;
	if ($minutes < 10)
	{
		$minutes = '0' . $minutes;
	}

	return $time . ' мин. / ' . $hours . ':' . $minutes;
}