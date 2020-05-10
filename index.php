<?php
	require('includes/config.php'); 
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
	<meta name="theme-color" content="#ffffff">
	<!--- ---->
	<link rel="stylesheet" type="text/css" href="css/media.css">
	<title><?php echo $config['tab_name']; ?></title>
</head>
<body>

<!-- particles.js container 
<div id="particles-js"><canvas class="particles-js-canvas-el" style="width: 100%; height: 100%;"></div>
-->

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
$articles = mysqli_query($connection, "SELECT * FROM `article` ORDER BY `id` DESC LIMIT 5");

while( $art = mysqli_fetch_assoc($articles) ) 
	{
?>

	<div class="article">
		
		<div class="article__header"><h2 class="article__title"><?php echo $art['title']; ?></h2></div>

		<div class="article__content">

			<div class="preview__base"><img src="<?php echo $art['preview']; ?>" class="preview"></div>

			<?php echo mb_substr(strip_tags($art['text']), 0, 2000) ?> ...



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
<?php
	};
	include('includes/404.php');
?>

	</div>

<nav class="pagination">
	<h3 class="pagination__title">Переход по страницам</h3>
	<h4 class="pagination__title">Вы сейчас на [1] странице</h4>

	<div class="pagination__fastlinkBase">

	<a class="pagination__previous pagination__arrow" href="#">&#8592;</a>
	<a class="pagination__fastlink paghref" href="#">1</a>
	<a class="pagination__fastlink paghref" href="#">2</a>
	<a class="pagination__fastlink paghref" href="#">3</a>
	<a class="pagination__fastlink paghref" href="#">4</a>
	<a class="pagination__fastlink paghref" href="#">5</a>				
	<a class="pagination__next pagination__arrow" href="#">&#8594;</a>

	</div>

</nav>	


<footer><hr class="footer__hr"><h3 class="footer__text"><?php echo $config['footer_text']; ?></h3></footer>

</div>




</body>

<!-- particles -->
<script src="js/particles.js"></script>
<script src="js/app.js"></script>
</html>