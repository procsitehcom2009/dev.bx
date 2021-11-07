<?php
/** @var array $menu */
/** @var string $content */
?>
<!doctype html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
		  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Document</title>
	<link rel="stylesheet" href="/resources/css/reset.css">
	<link rel="stylesheet" href="/resources/css/style.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">
	<!--
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans+Condensed:wght@300&display=swap" rel="stylesheet">
	-->
</head>
<body>
<div class="wrapper">
	<div class="sidebar">
		<ul class="menu">
			<?
			print_r($menu); ?>
		</ul>
	</div>
	<div class="container">
		<div class="header"></div>
		<div class="content">
			<div class="movie-list">
				<?= $content ?>
			</div>
		</div>
	</div>
</div>
</body>
</html>