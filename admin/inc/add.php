<?php
	session_start();
	if ($_SESSION['user']) {
	}	else {
		header('Location: ../index.php');
	}

	$header = $_POST['header'];
    $text_preview = $_POST['text_preview'];
    $text = $_POST['text'];
    $category = $_POST['category'];
    
    date_default_timezone_set('Asia/Novosibirsk');
    $date = date('Y-m-d');

    $image = 'news/content/previews/' . time() . $_FILES['image']['name'];
    if (move_uploaded_file($_FILES['image']['tmp_name'], '../../' . $image)) {
    }	else {
    	header('Location: ../admin.php');
    }
    $conn = mysqli_connect('localhost', 'root', '', 'news_database');

    $sql = "INSERT INTO news (header, image, text_preview, text, category, date) VALUES ('$header', '$image', '$text_preview', '$text', '$category', '$date')";
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    echo "Connected successfully";
    if (mysqli_query($conn, $sql)) {
	    echo "New record created successfully";
	} else {
	    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
	mysqli_close($conn);
	header('Location: ../admin.php');
?>
