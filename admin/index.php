<?php
	session_start();
	if ($_SESSION['user']) {
		header('Location: admin.php');
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Admin Dashboard</title>
	<link rel="stylesheet" type="text/css" href="admin.css">
</head>
<body>
	<form class="index_form" action="log_in.php" method="post">
		<label>Логин</label>
		<input autocomplete="off" type="text" name="login" placeholder="Введите логин" name="">
		<label>Пароль</label>
		<input autocomplete="off" type="password" name="password" placeholder="Введите пароль" name="">
		<button type="submit">Войти</button>
		<?php
            if ($_SESSION['message']) {
                echo '<p class="msg"> ' . $_SESSION['message'] . ' </p>';
            }
            unset($_SESSION['message']);
        ?>
	</form>
</body>
</html>