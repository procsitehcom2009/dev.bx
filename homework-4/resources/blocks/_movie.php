<?php
/** @var array $movie */
?>
<div class="movie-list--item">
	<div class="movie-list--item-overlay">
		<a href="./movie.php?movieId=<?=$movie['id']?>" class="movie-list--item-more">Подробнее</a>
	</div>
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
			<?= $movie['duration']?> мин. / <?=floor($movie['duration']/60)?>:<?=($movie['duration']%60)?>
		</div>
		<div class="movie-list--item-info">
			<?=implode(', ',$movie['genres']) ?>
		</div>
	</div>
</div>
