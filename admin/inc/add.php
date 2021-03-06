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
    $news_name = 'news_' . time();


    $sql = "INSERT INTO news (header, image, text_preview, text, category, date, news_name) VALUES ('$header', '$image', '$text_preview', '$text', '$category', '$date', '$news_name')";
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    echo "Connected successfully";
    if (mysqli_query($conn, $sql)) {
	    echo "New record created successfully";
	} else {
	    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
    copy('../../news/template/template.html', '../../news/' . $news_name .'.html');

    //creation html news
    $html_news = '
<!DOCTYPE html>
<html>
<head>
    <title>Road</title>
    <meta charset="utf-8">
    <link rel="stylesheet/less" type="text/css" href="../css/style.less">
    <script src="//cdn.jsdelivr.net/npm/less@3.13" ></script>
</head>
<body>
<div id="header">
    <div id="header_content">
        <div id="logo_wrap">
            <a href="../index.html"><img id="logo" title="Home page" src="content/logo.png"></a>
        </div>
        <div id="nav_btn" onclick="open_short_menu()">
            <div id="nav_btn_block">
                <ul id="nav_btn_menu">
                    <li><a href="../index.html">Новости</a></li>
                    <li>Спорт</li>
                    <li>Путешествия</li>
                </ul>
            </div>
        </div>
        <div id="menu_wrap">
            <nav id="menu_header">
                <ul id="navigation">
                    <li><a href="index.html">Новости</a></li>
                    <li>Спорт</li>
                    <li>Путешествия</li>
                </ul>
            </nav>
        </div>
    </div>
</div>
<div id="news_content"> <!-- Начало макета -->
    <h1 id="news_content_header">' . $header . '</h1>
    <div id="news_content_body">
        <div id="post_image"><img class="news_small_previews" src="' . '../' . $image . '"></div>
        <h3 class="news_text_preview">' . $text_preview . '</h3>
        <p class="news_text">' . $text . '</p>
    </div>
</div> <!-- Конец макета -->
<!-- <div id="right_side_bar">
    <h3 id="news_header">Must see</h3>
    <div class="news_small_previews">
    </div>
</div> -->
<div id="footer">
    <div id="footer_logo">
        <img src="content/logo.png">
        <small>Cвежие новости</small>
    </div>
    <div id="footer_social_networks">
        <h4>Мы в соцсетях</h4>
        <ul>
            <li><a id="footer_VK" target="_blank" href="http://vk.com/"><img class="social_networks_logos" title="Мы в ВК" src="content/vk-com.png"></a></li>
        </ul>
    </div>
</div>
<script type="text/javascript">
    function open_short_menu() {
        if (document.getElementById("nav_btn_block").style.display == "block") {
            document.getElementById("nav_btn_block").style.display = "none";
        } else {
            document.getElementById("nav_btn_block").style.display = "block";
        }
    }
</script>
</body>
</html>';

    $fp = fopen('../../news/' . $news_name .'.html', "w");
    fwrite($fp, $html_news);
    fclose($fp);

	mysqli_close($conn);
	header('Location: ../admin.php');
?>
