<?php
/** @var array $movie */
?>
<div class="movie-list--item">
	<div class="movie-list--item-image" style="background-image: url(data/images/<?= $movie['id'] ?>.jpg)"></div>
	<div class="movie-list--item-head">
		<div class="movie-list--item-title"><?= $movie['title'] ?> (<?= $movie['release-date'] ?>)</div>
		<div class="movie-list--item-subtitle"><?= $movie['original-title'] ?></div>
		<div class="movie-list--item-wrapper"></div>
	</div>
	<div class="movie-list--item-description">
		<?= $movie['description'] ?>
	</div>
	<div class="movie-list--item-bottom">
		<div class="movie-list--item-time">
			<div class="movie-list--item-time--icon"></div>
			163 мин. / 02:43
		</div>
		<div class="movie-list--item-info">
			<?
			foreach ($movie['genres'] as $genre)
			{
				echo $genre . ",";
			}
			?>
		</div>
	</div>
</div>
