<?php

$config = array(
	'title' => "Школьный меридиан",
	'subtitle' => "Медиа-центр",
	'tab_name' => "Школьный меридиан",
	'footer_text' => 'Школа №4 города Белогорск',
	'day_word' => '<a href="https://стопкоронавирус.рф" target="_blank" class="day_word">#stayhome</a>', // Фраза дня
	'notesOnPage' => '2',

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