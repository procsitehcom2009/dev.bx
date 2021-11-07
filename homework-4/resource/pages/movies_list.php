<?php
/** @var array $movies */
?>
<div class="movie-list">
	<?php
	foreach ($movies as $movie): ?>
		<?= renderTemplate($_SERVER['DOCUMENT_ROOT']."/resources/blocks/_movie.php", ['movie' => $movie]) ?>
	<?php
	endforeach; ?>
</div>