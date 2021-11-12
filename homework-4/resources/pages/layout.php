<?php
/** @var array $menu */
/** @var string $content */
/** @var array $config */
/** @var array $genres */
?>
<!doctype html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
		  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Document</title>
	<link rel="stylesheet" href="./resources/css/reset.css">
	<link rel="stylesheet" href="./resources/css/style.css">
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
		<div class="logo" style="background-image: url(./img/logo.svg)"></div>
		<ul class="menu">
			<li class="menu-item">
				<a href="<?= key($config['menu']) ?>.php"><?= current($config['menu']) ?></a>
			</li>
			<?next($config['menu']);?>
			<?
			foreach ($genres as $code => $name): ?>
				<li class="menu-item">
					<a href="index.php?codeGenre=<?= $code ?>"><?= $name ?></a>
				</li>
			<?php
			endforeach; ?>
			<li class="menu-item">
				<a href="<?= key($config['menu']) ?>.php"><?= current($config['menu'])  ?></a>
			</li>
		</ul>
	</div>
	<div class="container">
		<div class="header">
			<div class="header-main">
				<div class="header-main-search">
					<div class="header-main-search-string">
						<div class="header-main-search-string-icon" style="	background: url(./img/logo-search.png)"></div>
						<input class="header-main-search-string-input" type="text" placeholder="Поиск по каталогу...">
					</div>
					<div class="header-main-search-btn">
						<a  href="#">Искать</a>
					</div>
				</div>
				<div class="header-main-movie-add">
					<a  href="movie-add.php">Добавить фильм</a>
				</div>
			</div>
		</div>
		<div class="content">
				<?= $content ?>
		</div>
	</div>
</div>
</body>
</html>