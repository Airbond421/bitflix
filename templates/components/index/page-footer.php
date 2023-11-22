<?php

/**
 * @var int $page
 * @var int $lastPage
 */

if ($page > 1)
{
	?>
	<a href='/?<?= http_build_query(array_merge($_GET, ['p' => 1])) ?>'><p> << </p></a>
	<a href='/?<?= http_build_query(array_merge($_GET, ['p' => $page - 1])) ?>'><p> < </p></a>
	<?php
}
?>
	<p><?= $page ?></p>
<?php
if ($page < $lastPage)
{
	?>
	<a href='/?<?= http_build_query(array_merge($_GET, ['p' => $page + 1])) ?>'><p> > </p></a>
	<a href='/?<?= http_build_query(array_merge($_GET, ['p' => $lastPage])) ?>'><p> >> </p></a>
	<?php
}







