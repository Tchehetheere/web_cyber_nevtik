<?php

if (isset($_POST['submit'])) {

    $target_dir = 'uploads/';
    $target_path = $target_dir . basename($_FILES['image']['name']);
    $uploadOk = false;
    $imageFileType = strtolower(pathinfo($target_path,PATHINFO_EXTENSION));

    // Check if file already exists
    if (file_exists($target_path)) {
        echo "File already exists.";
        $uploadOk = false;
    }

    // Check file size
    if ($_FILES["image"]["size"] > 500000) {
        echo "File is too large.";
        $uploadOk = false;
    }

    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        echo "Only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = false;
    }

    // Check if $uploadOk is set to 0 by an error
    if (!$uploadOk) {
        echo "File upload failed.";
    } else {
        if (move_uploaded_file($_FILES['image']['tmp_name'], $target_path)){
            $uploadOk = true;
            echo "<p>Upload Berhasil:</p>";
            echo "<img src='{$target_path}'>";
        } else {
            echo "File upload failed.";
        }
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
    
    <form action="" method="post" enctype="multipart/form-data">
        <p>Masukan Gambar:</p>
        <input type="file" name="image" accept="image/*"/>
        <br/>
        <br/>
        <input type="submit" name="submit" />
    </form>
</body>
</html>
