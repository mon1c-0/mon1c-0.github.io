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
	$article_id = $_GET['id'];

	$article = mysqli_query($connection, "SELECT * FROM `article` WHERE id = " . (int) $article_id);
	if(mysqli_num_rows($article)<=0){
		include('includes/404.php');
	}
while( $art = mysqli_fetch_assoc($article) )
	{
?>
	<div class="article">

		<div class="article__header"><h2 class="article__title"><?php echo $art['title']; ?></h2></div>

		<div class="article__content">

			<div class="preview__base"><img src="<?php echo $art['preview']; ?>" class="preview"></div>

			<?php echo $art['text']; ?>

			<div class="clearFix"></div>
			<hr style="margin-top: 45px;">
		</div>
	</div>

<?php }; ?>

<nav class="pagination">
	<div class="pagination__fastlinkBase">
	<a class="paghref pagination__gomain" href="/">На главную</a>
	</div>
</nav>

<script type="text/javascript" src="/orphus/orphus.js"></script>
<a href="//orphus.ru" id="orphus" target="_blank"><img alt="Система Orphus" src="/orphus/orphus.gif" border="0" width="128" height="128" class="orphus" /></a>

<footer><hr class="footer__hr"><h3 class="footer__text"><?php echo $config['footer_text']; ?></h3></footer>

</div>




</body>
<!-- particles -->
<script src="js/particles.js"></script>
<script src="js/app.js"></script>

</html>