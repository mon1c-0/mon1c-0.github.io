<?php
$categories = mysqli_query($connection, "SELECT * FROM `article_categories`");
?>

<header id="header">
	<div class="header__title">	
		<h1 class="title"><?php echo $config['title']; ?></h1><h4 class="subtitle"><?php echo $config['subtitle']; ?></h4><div class="day_word"><?php echo $config['day_word']; ?></div>
	</div>

	<nav class="subheader">
	<?php 
		while( $cat = mysqli_fetch_assoc($categories) )
		{
	?>
		<a class="subheader__category" href="/category.php?cat_id=<?php echo $cat['id']; ?>"><?php echo $cat['title']; ?></a>

<?php   };
?>
	</nav>

</header>