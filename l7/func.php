<?php
/**
 * Created by PhpStorm.
 * User: Yuriy
 * Date: 06.05.2015
 * Time: 16:54
 */

function getImagesUrl($db) {
    $result_set = $db->query("SELECT title, url FROM images");
    $list = [];
    while($row = $result_set->fetch_assoc()) {
        $list[] = ['title' => $row['title'], 'url' => $row['url']];
    }
    $result_set->close();

    return $list;
}


function uploadImage($uploadDir, $db, $url, $title) {

    $whiteList = [".jpg", ".png", ".gif"];

    foreach ($whiteList as $item) {
        if(preg_match("/$item\$/i", $_FILES['image']['name'])) {
            $good_name = true;
            break;
        }
        else $good_name = false;
    }
    if (!$good_name) {
        return $good_name;
    }

    $newName = $uploadDir . basename($_FILES['image']['name']);
    $url .= "/" . basename($_FILES['image']['name']);

    if (is_uploaded_file($_FILES['image']['tmp_name'])) {
        $uploaded = move_uploaded_file($_FILES['image']['tmp_name'], $newName);
    }

    if ($uploaded) {
        $uploaded  = $db->query("INSERT INTO images (title, url) VALUES ('" . $title . "', '" . $url . "')");
    }

    return $uploaded;
}