<aside>
	<?php 
	$popular = mysqli_query($connection, "SELECT * FROM `article` ORDER BY `views` DESC LIMIT 5");


	?>

	<h2 class="sidebar__title">Популярное</h2>

	<div class="aside__mainblock">
<?php

	while($pop = mysqli_fetch_assoc($popular))
	{
		?>

		<a href="/article.php?id=<?php $pop['id']; ?>" class="sidebar__link"><?php echo $pop['title'];?></a>
		<?php
	};	
?>
	</div>	

<hr class="sidebar__hr">


	<?php 
	$recent = mysqli_query($connection, "SELECT * FROM `article` ORDER BY `pubdate` DESC LIMIT 5");
	?>


	<h2 class="sidebar__title">Свежее</h2>

	<div class="aside__mainblock">
<?php		
	while($rec = mysqli_fetch_assoc($recent))
		{
		?>

		<a href="/article.php?id=<?php $rec['id']; ?>" class="sidebar__link"><?php echo $rec['title'];?></a>
		
		<?php
		};	
?>	

	</div>	

<hr class="sidebar__hr">

	<h2 class="sidebar__title">Полезные ссылки</h2>
	<div class="aside__mainblock">
	<?php

	$links = mysqli_query($connection, "SELECT * FROM `sidebar_link` ORDER BY `id` DESC");

	while($lnk = mysqli_fetch_assoc($links))
		{
		?>
		
		<a href="<?php echo $lnk['link']; ?>" class="sidebar__link"><?php echo $lnk['text'];?></a>
		<?php
	};	
?>
	</div>	
<hr class="sidebar__hr">

<div class="sidebar__bannerblock">

		<?php

	$banners = mysqli_query($connection, "SELECT * FROM `banners` ORDER BY `id` DESC");

	while($bnrs = mysqli_fetch_assoc($banners))
		{
		?>
		
		<a href="<?php echo $bnrs['link']; ?>" class="sidebar__banner-link"><img class="sidebar__banner-img flexible-img" src="<?php echo $bnrs['image']; ?>"></img></a>

		<?php
	};	
?>

	

</div>

</aside>