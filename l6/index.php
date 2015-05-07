<?php
/**
 * Created by PhpStorm.
 * User: Yuriy
 * Date: 06.05.2015
 * Time: 16:53
 */
require "func.php";

$url = "./img";
$uploadDir = __DIR__ . DIRECTORY_SEPARATOR . "img" . DIRECTORY_SEPARATOR;

if (!empty($_FILES)) {
    if (uploadImage($uploadDir)) {
        $message = " - Success! File uploaded.";
    }
    else {
        $message = " - Failed to upload.";
    }

}

$list = getImagesList($url);
?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>ImageShack</title>
    <link type="text/css" rel="stylesheet" href="./style.css">
</head>
<body>
<div id="container">
    <p><a href="./form.html">Upload images</a> <?php echo $message; ?></p>
    <?php foreach ($list as $img) {
              echo $img;
          } ?>
</div>
</body>
</html>




