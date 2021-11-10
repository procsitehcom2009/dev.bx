<?php
/** @var array $movie */
//print_r($movie);
?>
<div class="movie-detail">
	<div class="movie-detail-header">
		<div class="movie-detail-header-title"><?=$movie[0]['title']?> (<?= $movie[0]['release-date'] ?>)</div>
		<div class="movie-detail-header-original-title"><?=$movie[0]['original-title']?></div>
		<div class="movie-detail-header-age-restriction">
			<div class="movie-detail-header-age-restriction-text">
				<?=$movie[0]['age-restriction']?>+
			</div>
		</div>
		<div class="movie-detail-header-wrapper"></div>
	</div>
	<div class="movie-detail-body">
		<div class="movie-detail-body-img" style="background-image: url(data/images/<?= $movie[0]['id'] ?>.jpg)"></div>
		<div class="movie-detail-body-description">
			<div class="movie-detail-body-description-rating"></div>
			<div class="movie-detail-body-description-about"></div>
			<div class="movie-detail-body-description-text">
				Описание<br>
				<?=$movie[0]['description']?>
			</div>
		</div>
	</div>
</div>
