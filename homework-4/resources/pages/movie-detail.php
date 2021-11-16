<?php
/** @var array $movie */
?>
<div class="movie-detail">
	<div class="movie-detail-header">
        <div class="movie-detail-header-left">
            <div class="movie-detail-header-title"><?=$movie['TITLE']?> (<?= $movie['RELEASE_DATE'] ?>)</div>
            <div class="movie-detail-header-original-title"><?=$movie['ORIGINAL_TITLE']?></div>
            <div class="movie-detail-header-age-restriction">
                <div class="movie-detail-header-age-restriction-text">
                    <?=$movie['AGE_RESTRICTION']?>+
                </div>
            </div>
        </div>
        <div class="movie-detail-header-like" id="favorite_like" onclick="favorite_like_call('favorite_like')" style="background-image: url(./img/icon-like.svg)"></div>
		<div class="movie-detail-header-wrapper"></div>
	</div>
	<div class="movie-detail-body">
		<div class="movie-detail-body-img" style="background-image: url(data/images/<?= $movie['ID'] ?>.jpg)"></div>
		<span class="movie-detail-body-description">
			<div class="movie-detail-body-description-rating">
                <div class="movie-detail-body-description-rating-square">
                    <? for ((int)$i=1;$i<11;$i++):?>
                        <? if ($i<round($movie['RATING'])){?>
                        <div class="movie-detail-body-description-rating-square-count-paint"></div>
                            <?} else {?>
                            <div class="movie-detail-body-description-rating-square-count"></div>
                    <?}?>
                    <? endfor;?>
                </div>
                <div class="movie-detail-body-description-rating-ellipse">
                    <div class="movie-detail-body-description-rating-ellipse-text"><?=$movie['RATING']?></div>
                </div>
            </div>
			<div class="movie-detail-body-description-about">
                <span class="movie-detail-body-description-about-title">О фильме</span>
             <table class="movie-detail-body-description-about-table">
                 <tr>
                     <td><span class="movie-detail-body-description-about-name">Год производства:</span></td>
                     <td><span class="movie-detail-body-description-about-value"><?=$movie['RELEASE_DATE']?></span></td>
                 </tr>
                 <tr>
                     <td><span class="movie-detail-body-description-about-name">Режисер:</span></td>
                     <td><span class="movie-detail-body-description-about-value"><?=$movie['DIRECTOR_NAME']?></span></td>
                 </tr>
                 <tr>
                     <td><span class="movie-detail-body-description-about-name">В главных ролях:</span></td>
                     <td><span class="movie-detail-body-description-about-value"><?= print_r('Актеры') ;?></span></td>
                 </tr>
             </table>
                <span class="movie-detail-body-description-about-title">Описание</span><br>
                <span class="movie-detail-body-description-text"><?=$movie['DESCRIPTION']?></span>
            </div>

		</div>
	</div>
</div>
