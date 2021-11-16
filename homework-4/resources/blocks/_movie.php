<?php
/** @var array $movie */
?>
<div class="movie-list--item">
	<div class="movie-list--item-overlay">
		<a href="./movie.php?movieId=<?=$movie['ID']?>" class="movie-list--item-more">Подробнее</a>
	</div>
	<div class="movie-list--item-image" style="background-image: url(data/images/<?= $movie['ID'] ?>.jpg)"></div>
	<div class="movie-list--item-head">
		<div class="movie-list--item-title"><?= $movie['TITLE'] ?> (<?= $movie['RELEASE_DATE'] ?>)</div>
		<div class="movie-list--item-subtitle"><?= $movie['ORIGINAL_TITLE'] ?></div>
		<div class="movie-list--item-wrapper"></div>
	</div>
	<div class="movie-list--item-description">
		<?= cutDescriptionMovies($movie['DESCRIPTION'],150) ?>
	</div>
	<div class="movie-list--item-bottom">
		<div class="movie-list--item-time">
			<div class="movie-list--item-time--icon" style="background-image: url(./img/icon-clock.svg)"></div>
			<div class="movie-list--item-time--text"><?= $movie['DURATION']?> мин. / <?=floor($movie['DURATION']/60)?>:<?=($movie['DURATION']%60)?></div>
		</div>
		<div class="movie-list--item-info">
			<?=$movie['GENRES'] ?>
		</div>
	</div>
</div>
