<?php
	$connect =mysqli_connect('localhost', 'root', '', 'news_database');
	if (!$connect) {
		die('Ошибка подключения к базе данных.');
	}
?>