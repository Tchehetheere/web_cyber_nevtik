<!DOCTYPE html>
<html>
<head>
	<title>Landing Page</title>

	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<div class="content">
	<header>
		<h1 class="judul">Landing Page</h1>
		<h3 class="deskripsi">Halaman Depan</h3>
	</header>

	<div class="menu">
		<ul>
			<li><a href="index.php?page=home">HOME</a></li>
			<li><a href="index.php?page=tentang">TENTANG</a></li>
			<li><a href="index.php?page=upload">UPLOAD</a></li>
		</ul>
	</div>

	<div class="badan">


	<?php 
	if(isset($_GET['page'])){
		$page = $_GET['page'];

		switch ($page) {
			case 'home':
				include "home.php";
				break;
			case 'tentang':
				include "tentang.php";
				break;
			case 'upload':
				include "upload.php";
				break;			
			#default:
				#header("HTTP/1.0 404 Not Found");
				#echo "<center><h3>Maaf. Halaman tidak di temukan !</h3></center>";
				#break;
		}
	}else{
		include "home.php";
	}

	 ?>

	</div>
</div>
</body>
</html>
