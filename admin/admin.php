<?php
	session_start();
	require_once 'connect.php';
	if (!$_SESSION['user']) {
		header('Location: index.php');
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Admin</title>
	<link rel="stylesheet" type="text/css" href="admin.css">
</head>
<body>
	<div class="admin_window" id="add_news" >
		<label>Добавить новость</label>
		<form action="inc/add.php" method="post" enctype="multipart/form-data">
			<label>Заголовок</label>
			<input autocomplete="off" type="text" name="header">
			<label>Картинка</label>
			<input type="file" name="image">
			<label>Превью текста</label>
			<input type="text" name="text_preview">
			<label>Текст</label>
			<textarea name="text" cols="50"></textarea>
			<label>Категория</label>
			<input placeholder="news/sport/travel" autocomplete="off" type="text" name="category">
			<button type="submit">Добавить</button>
		</form>
	</div>
	<div class="admin_window" id="del_news">
		<label>Удалить новость</label>
		<form action="inc/del.php" method="post">
			<label>Идентификатор новости</label>
			<input autocomplete="off" type="text" name="id">
			<button type="submit">Удалить</button>
		</form>
	</div>
	<div class="admin_window" id="logout">
		<label>Удалить новость</label> <br>
		<a href="inc/log_out.php">Выйти из профиля</a>
	</div>
</body>
</html>