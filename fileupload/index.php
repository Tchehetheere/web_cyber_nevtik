<?php

$whitelist_type = array('image/jpeg', 'image/png', 'image/jpg'); // whitelist extensi apasaja yg boleh diupload - akan masuk ke var global $_FILES['image']['type']

if (isset($_POST['submit'])) {

    $target_dir = 'uploads/';
    $target_path = $target_dir . basename($_FILES['image']['name']);
    //$target_path = $target_dir . basename($_FILES['image']['name']) . ".jpg"; //ini paling secure, karena nama file diubah saat masuk script ini, ini bisa dibanyakin opsinya pake array
    $uploadOk = false;

	if ( !in_array($_FILES['image']['type'], $whitelist_type)){ // cek ada apa aja extensi/content-type yg ada di whitelist
		
		print_r($_FILES['image']['type']);
		echo '<br>';
		die('you can not upload !image');
		}

	$ext = pathinfo($target_path, PATHINFO_EXTENSION); // cek apakah filenya benar-benar ber-extensi php
	
	if ( $ext == 'php' || $ext == 'pht'){
		die('The file that you are trying to upload is a php script | this might be a hacking attempt');
		}
		
	// ini masih juga bisa di exploit/bypass, karena script php tdk hanya berjalan pada extensi .php, tapi ada juga pht, phtml, dll
	
	// bisa dilihat di /etc/apache2/mods-available/php*.*.conf
	// <FilesMatch ".+\.ph(?:ar|p|tml)$"> (file valid sbg script php)biasanya isinya beda2 tergantung versi php
	// file yg valid sbg script php = php, php3, php4, php,7, pht, phtml
	
	// cara terakhir yg paling gampang dan simple adalah mengubah konfigurasi di apache2 nya
	// supaya tidak mengeksekusi sesatu yang ada di folder uploads nya
	
	// caranya buat file htaccess di folder uploads/ nya (karena khusus buat folder itu)
	/* isi:
	 * php_flag engine Off < jika ada file script apapun maka tdk akan di eksek
	 * 
	 * */
    if (move_uploaded_file($_FILES['image']['tmp_name'], $target_path)){
        $uploadOk = true;
    } else {
        print_r($_FILES['image']);
        die("Upload gagal!");
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Upload Gambar</title>	
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />
</head>
<body>
    
    <?php
    
    if ($uploadOk){
        echo "<p>Upload Berhasil:</p>";
        echo "<img src='{$target_path}'>";
        echo '<br>';
        print_r($_FILES['image']['type']);
    }
    
    ?>

    <form action="" method="post" enctype="multipart/form-data">
        <p>Masukan Gambar:</p>
        <input type="file" name="image" accept="image/*"/>
        <br/>
        <br/>
        <input type="submit" name="submit"/>
    </form>
    
</body>

</html>
