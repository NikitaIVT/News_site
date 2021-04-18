<?php
	session_start();
	if ($_SESSION['user']) {
	}	else {
		header('Location: ../index.php');
	}

	$id = $_POST['id'];
   
    $conn = mysqli_connect('localhost', 'root', '', 'news_database');
    $sql = "DELETE FROM news WHERE id='$id'";

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