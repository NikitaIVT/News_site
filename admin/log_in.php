<?php
    session_start();
    require_once 'connect.php';

    $login = $_POST['login'];
    $password = md5($_POST['password']);

    $check_user = mysqli_query($connect, "SELECT * FROM `admin` WHERE `username` = '$login' AND `password` = '$password'");
    if (mysqli_num_rows($check_user) > 0) {
    	$user = mysqli_fetch_assoc($check_user);
    	$_SESSION['user'] = [
    		"login" => $user['login']
    	];
    	header('Location: admin.php');
    } else {
    	$_SESSION['message'] = 'Ошибка: неверный логин или пароль';
    	header('Location: index.php');
    }
?>
