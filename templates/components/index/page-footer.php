<?php

/**
 * @var int $page
 * @var int $lastPage
 */
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
if ($lastPage <= NUMBER_OF_PAGES_IN_THE_FOOTER)
{
	for ($i = 1; $i <= $lastPage; $i++)
	{
		if ($i === $page)
		{
			?><p class="active"> <?= $i ?> </p><?php
		}
		else
		{
			?><a href='/?<?= http_build_query(array_merge($_GET, ['p' => $i])) ?>'><p> <?= $i ?> </p></a><?php
		}
	}
}
else
{
	if ($page - floor(NUMBER_OF_PAGES_IN_THE_FOOTER / 2) < 1)
	{
		$firstNumberOfPage = 1;
	}
	elseif ($page + floor(NUMBER_OF_PAGES_IN_THE_FOOTER / 2) > $lastPage)
	{
		$firstNumberOfPage = $lastPage - NUMBER_OF_PAGES_IN_THE_FOOTER + 1;
	}
	else
	{
		$firstNumberOfPage = $page - floor(NUMBER_OF_PAGES_IN_THE_FOOTER / 2);
	}

	for ($i = $firstNumberOfPage; $i < $firstNumberOfPage + NUMBER_OF_PAGES_IN_THE_FOOTER; $i++)
	{
		if ((int)$i === $page)
		{
			?><p class="active"> <?= $i ?> </p><?php
		}
		else
		{
			?><a href='/?<?= http_build_query(array_merge($_GET, ['p' => $i])) ?>'><p> <?= $i ?> </p></a><?php
		}
	}
}

if ($page >= $lastPage)
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
	<a href='/?<?= http_build_query(array_merge($_GET, ['p' => $lastPage])) ?>'><p> >> </p></a>
	<?php
}

