<?php
/**
 * Created by PhpStorm.
 * User: Yuriy
 * Date: 06.05.2015
 * Time: 16:53
 */
require "func.php";

$db = new mysqli('localhost', 'root', '', 'shp');
$url = "./img";
$uploadDir = __DIR__ . DIRECTORY_SEPARATOR . "img" . DIRECTORY_SEPARATOR;

$title = (isset($_POST['title'])) ? substr($_POST['title'], 0, 20) : "";
if (!empty($_FILES)) {
    if (uploadImage($uploadDir, $db, $url, $title)) {
        $message = "Success! File uploaded.";
    }
    else {
        $message = "Failed to upload.";
    }

}

$list = getImagesUrl($db);
?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Gallery</title>
    <link type="text/css" rel="stylesheet" href="./style.css">
</head>
<body>
<div id="container">
    <h1>GALLERY</h1>
    <p><?php echo $message; ?></p>
      <form action="./index.php" method="post" enctype="multipart/form-data">
            <input type="file" name="image" accept="image/jpeg, image/png, image/gif"
                   title="jpg, png, gif" required>
            <br><br>
            Title:
            <input type="text" name="title">
            &nbsp;
            <input type="submit" value="upload">
        </form>
    <p>
    <?php foreach ($list as $img) {
                echo "<div class='block'>";
                echo "<div class='inner'><img src='".$img['url']."'></div><div class='title'>". $img['title']."</div></div>";
          } ?>
    </p>
</div>
</body>
</html>




