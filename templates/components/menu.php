<?php

/** @var array $navMenu */

?>


<img class="nav_logo" src="/img/icons/logo.svg" alt="">
<ul class="nav_component">
	<?php
	foreach ($navMenu as $component)
	{
		?>
		<li><a href="<?= $component['url'] ?>"> <?= $component['text'] ?> </a></li>
		<?php
	}
	?>
</ul>



