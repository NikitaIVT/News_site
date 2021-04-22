<?php
	session_start();
	if ($_SESSION['user']) {
	}	else {
		header('Location: ../index.php');
	}

	$id = $_POST['id'];
   
    $conn = mysqli_connect('localhost', 'root', '', 'news_database');
    $result = mysqli_query($conn, "SELECT news_name, image FROM news WHERE id='$id'");
    $del = mysqli_fetch_row($result);
    $sql = "DELETE FROM news WHERE id='$id'";

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    echo "Connected successfully";

    if (mysqli_query($conn, $sql)) {
	    echo "Record deleted successfully";
	} else {
	    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}

	mysqli_close($conn);
	unlink('../../news/' . $del[0] . '.html');
	unlink('../../' . $del[1]);
    header('Location: ../admin.php');
?>