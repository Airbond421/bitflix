<?php

/**
 * @var int $page
 * @var int $lastPage
 */

if ($page > 1)
{
	?>
	<a href='/?p=1'> <p><<</p></a>
	<a href='/?p=<?=($page-1)?>'><p><</p></a>
	<?php
}
?>
<p><?=$page?></p>
<?php
if ($page < $lastPage)
{
	?>
	<a href='/?p=<?=($page+1)?>'> <p>></p> </a>
	<a href='/?p=<?=($lastPage)?>'> <p>>></p> </a>
	<?php
}







