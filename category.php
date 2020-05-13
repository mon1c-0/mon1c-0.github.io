<?php
	require('includes/config.php');
	$paginationEnabled = true;
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width">
	<link rel="stylesheet" type="text/css" href="css/style.css">

	<!-- Favicons -->
	<link rel="apple-touch-icon" sizes="180x180" href="favicon/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="favicon/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="favicon/favicon-16x16.png">
	<link rel="manifest" href="favicon/site.webmanifest">
	<link rel="mask-icon" href="favicon/safari-pinned-tab.svg" color="#5bbad5">
	<link rel="shortcut icon" href="favicon/favicon.ico">
	<meta name="msapplication-TileColor" content="#da532c">
	<meta name="msapplication-config" content="/favicon/browserconfig.xml">
	<meta http-equiv="content-type" content="text/html; charset=utf-8">
	<meta name="keywords" content="школа №4, МОАУ СОШ №4, школа, Белогорск, Афанасьева, МАОУ &quot;Школа №4 города Белогорск&quot; ">
	<meta name="rights" content="МАОУ &quot;Школа №4 города Белогорск&quot;">
	<meta name="description" content="Сайт Медиа-центра Школьный Меридиан (Школа №4 города Белогорск)">
	<meta name="theme-color" content="#ffffff">
	<!--- ---->
	<link rel="stylesheet" type="text/css" href="css/media.css">
	<title><?php echo $config['tab_name']; ?></title>
</head>
<body>

<!-- particles.js container -->
<div id="particles-js"><canvas class="particles-js-canvas-el" style="width: 100%; height: 100%;"></div>


<!-- Up button -->

<span class="upButton"><a class="upButton__link" href="#wrapper">Наверх</a></span>

<!--------------->


<div class="wrapper" id="wrapper">

<?php
include('includes/header.php');
?>


<?php
include('includes/sidebar.php');
?>

<div class="clearBoth"></div> <!-- for sidebar on mobile devices -->

<div class="article__block">

<?php
	if(isset($_GET['cat_id'])) {
	$cat_id = $_GET['cat_id'];
	}else{
	$cat_id=1;
	}
	if(isset($_GET['page'])) {
	$page = $_GET['page'];
	}else{
	$page=1;
	}

	$notesonpage = $config['notesOnPage'];

	$from = ($page - 1) * $notesonpage;

	$result = mysqli_query($connection, "SELECT COUNT(*) as count FROM `article`");
	$count = mysqli_fetch_assoc($result)['count'];
	$pagesCount = ceil($count / $notesonpage);

	$articles = mysqli_query($connection, "SELECT * FROM `article` WHERE category_id = " . (int) $cat_id . " ORDER BY `id` DESC LIMIT $from, $notesonpage");
	if(mysqli_num_rows($articles)<=0){
		include('includes/404.php');
		$paginationEnabled = false;
	}
while( $art = mysqli_fetch_assoc($articles) )
	{
?>
<script type="text/javascript" src="/orphus/orphus.js"></script>
<a href="//orphus.ru" id="orphus" target="_blank"><img alt="Система Orphus" src="/orphus/orphus.gif" border="0" width="128" height="128" class="orphus" /></a>
	<div class="article">

		<div class="article__header"><h2 class="article__title"><?php echo $art['title']; ?></h2></div>

		<div class="article__content">

			<div class="preview__base"><img src="<?php echo $art['preview']; ?>" class="preview"></div>

			<?php echo mb_substr(strip_tags($art['text']), 0, 500) ?> ...

		<div class="article__footer">
					<div class="continue__reading">
						<a class="continue__reading-link" href="/article.php?id=<?php echo $art['id']; ?>">Читать</a>
					</div>
				<h4 class="article__views">
					<img class="flexible-img view_icon" src="static/system/views.png"></div><h4 class="article__views-count"><?php echo $art['views']; ?></h4>
				</h4>
				<div class="clearFix"></div>
			<hr>
		</div>
	</div>
<?php
	};
?>

<?php
	if($paginationEnabled==true) {

?>

<nav class="pagination">
	<h3 class="pagination__title">Переход по страницам</h3>
	<h4 class="pagination__title">Вы сейчас на [<?php echo $page; ?>] странице</h4>
<?php
	};
	if($paginationEnabled==true) {

?>
	<div class="pagination__fastlinkBase">
<?php

	if($page<5){
		$paginNext = $page+1;
		$paginBack = 1;
			if($page>=2) {
				$paginBack = $page-1;
			}
			if($page==5) {
				$paginNext = $page;
			}
		$pagin1 = 1;
		$pagin2 = 2;
		$pagin3 = 3;
		$pagin4 = 4;
		$pagin5 = 5;
	};
	if($page>=5){
		$pagin1 = $page-2;
		$pagin2 = $page-1;
		$pagin3 = $page;
		if($pagesCount<=$page+2) {
			$pagin4='';
			$pagin5='';
		}
		$pagin4 = $page+1;
		$pagin5 = $page+2;
	}

	switch ($page) {
		case 1:
			$pagin1 = 1;
			$pagin2 = 2;
			$pagin3 = 3;
			$pagin4 = 4;
			$pagin5 = 5;
			break;
		case 2:
			$pagin1 = 1;
			$pagin2 = 2;
			$pagin3 = 3;
			$pagin4 = 4;
			$pagin5 = 5;
			break;
		case 3:
			$pagin1 = 1;
			$pagin2 = 2;
			$pagin3 = 3;
			$pagin4 = 4;
			$pagin5 = 5;
			break;
		case 4:
			$pagin1 = 1;
			$pagin2 = 2;
			$pagin3 = 3;
			$pagin4 = 4;
			$pagin5 = 5;
			break;
		case 5:
			$pagin1 = 1;
			$pagin2 = 2;
			$pagin3 = 3;
			$pagin4 = 4;
			$pagin5 = 5;
			break;

		case $pagesCount:
			$pagin1 = $page-1;
			$pagin2 = $page;
			$pagin3 = '';
			$pagin4 = '';
			$pagin5 = '';
			break;
		case $pagesCount-1:
			$pagin1 = $page-1;
			$pagin2 = $page;
			$pagin3 = $page+1;
			$pagin4 = '';
			$pagin5 = '';
			break;
		case $pagesCount-2:
			$pagin1 = $page-1;
			$pagin2 = $page;
			$pagin3 = $page+1;
			$pagin4 = $page + 2;
			$pagin5 = '';
			break;
		case $pagesCount-3:
			$pagin1 = $page-2;
			$pagin2 = $page-1;
			$pagin3 = $page;
			$pagin4 = $page + 1;
			$pagin5 = $page + 2;
			break;

		default:
			$pagin1 = $page-2;
			$pagin2 = $page-1;
			$pagin3 = $page;
			$pagin4 = $page + 1;
			$pagin5 = $page + 2;
			break;
		}


?>
	<a class="pagination__previous pagination__arrow" href="?cat_id=<?php echo $cat_id; ?>&page=<?php echo $paginBack; ?>">&#8592;</a>

	<a class="pagination__fastlink paghref" href="?cat_id=<?php echo $cat_id; ?>&page=<?php echo $pagin1; ?>"><?php echo $pagin1; ?></a>
	<a class="pagination__fastlink paghref" href="?cat_id=<?php echo $cat_id; ?>&page=<?php echo $pagin2; ?>"><?php echo $pagin2; ?></a>
	<a class="pagination__fastlink paghref" href="?cat_id=<?php echo $cat_id; ?>&page=<?php echo $pagin3; ?>"><?php echo $pagin3; ?></a>
	<a class="pagination__fastlink paghref" href="?cat_id=<?php echo $cat_id; ?>&page=<?php echo $pagin4; ?>"><?php echo $pagin4; ?></a>
	<a class="pagination__fastlink paghref" href="?cat_id=<?php echo $cat_id; ?>&page=<?php echo $pagin5; ?>"><?php echo $pagin5; ?></a>

	<a class="pagination__next pagination__arrow" href="#">&#8594;</a>


<?php
	};
?>	<br><br>
	<a class="paghref pagination__gomain" href="/">На главную</a>
	</div>

</nav>
<footer><hr class="footer__hr"><h3 class="footer__text"><?php echo $config['footer_text']; ?></h3></footer>

</div>




</body>
<!-- particles -->
<script src="js/particles.js"></script>
<script src="js/app.js"></script>

</html>