<?php require_once "config.php"; ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>My Website</title>
    </head>
    <body>
        <h1>Welcome to My Website</h1>

        <a href="index.php">Home</a>
        <a href="index.php?page=page1.php">Page 1</a>
        <a href="index.php?page=page2.php">Page 2</a>

        <?php

        if (isset($_GET['page'])){ // mengecek apakah var page ada dalam input ?
            include $_GET['page'];
	    //echo '<br>';
	    // print_r($_GET['page']);
	    //echo '<br>';
	    //print_r($_SERVER['QUERY_STRING']);
	    //echo '<br>';
	    //print_r($_SERVER);
	    //include $_GET['page'] . ".php"; // /etc/passwd gak bisa, vuln ke php wrapper > php://filter/convert.base64.encode/resource='config' < remove the php
	    //include "pages/" . $_GET['page']; // msh vuln ke ../../../etc/passwd, tapi tidak vuln terhadap php wrapper karna /pages/php://input < invalid
	    //include "pages/" . $_GET['page'] . ".php"; // paling secure: tambahkan prefix seperti pages/, dan kasih hanya extensi php saja yg valid
        }
        else{
            echo "<p>This is The front page.</p>";
        }
        ?>
    </body>
</html>
