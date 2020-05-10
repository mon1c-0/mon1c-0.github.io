<?php 

$config = array(
	'title' => "Школьный меридиан",
	'subtitle' => "Медиа-центр",
	'tab_name' => "Школьный меридиан",
	'footer_text' => 'Школа №4 города Белогорск',
	'day_word' => '', // Фраза дня

	'db' => array(
		'server' => 'localhost',
		'username' => 'root',
		'password' => 'root',
		'name' => 'mediacenter',	
	)
);


$connection = mysqli_connect(
	$config['db']['server'],
	$config['db']['username'],
	$config['db']['password'],
	$config['db']['name'],
);


?>