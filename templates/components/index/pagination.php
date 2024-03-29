<?php

/**
 * @var int $page
 * @var int $countOfPage
 */


$pageNumber = getPageNumbersInFooter($page, $countOfPage);

if ($page <= 1)
{
	?>
	<p> << </p>
	<p> < </p>
	<?php
}
else
{
	?>
	<a href='/?<?= http_build_query(array_merge($_GET, ['p' => 1])) ?>'><p> << </p></a>
	<a href='/?<?= http_build_query(array_merge($_GET, ['p' => $page - 1])) ?>'><p> < </p></a>
	<?php
}

for ($number = $pageNumber['first']; $number <= $pageNumber['last']; $number++)
{
	if ((int)$number === $page)
	{
		?><p class="active"> <?= $number ?> </p><?php
	}
	else
	{
		?><a href='/?<?= http_build_query(array_merge($_GET, ['p' => $number])) ?>'><p> <?= $number ?> </p></a><?php
	}
}

if ($page >= $countOfPage)
{
	?>
	<p> > </p>
	<p> >> </p>
	<?php
}
else
{
	?>
	<a href='/?<?= http_build_query(array_merge($_GET, ['p' => $page + 1])) ?>'><p> > </p></a>
	<a href='/?<?= http_build_query(array_merge($_GET, ['p' => $countOfPage])) ?>'><p> >> </p></a>
	<?php
}

