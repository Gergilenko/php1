<?php
/**
 * Created by PhpStorm.
 * User: Yuriy
 * Date: 06.05.2015
 * Time: 16:54
 */

function getImagesList($dir) {
    $list = glob($dir."/*.{png,jpg,gif}", GLOB_BRACE);

    foreach($list as $key => &$img) {
        if (is_dir($img)) {
            unset($list[$key]);
            continue;
        }
        $img = "<div class='block'><img src='".$img."'></div>\n";
    }
    unset($img);

    return $list;
}


function uploadImage($uploadDir) {

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

    if (is_uploaded_file($_FILES['image']['tmp_name'])) {
        $uploaded = move_uploaded_file($_FILES['image']['tmp_name'], $newName);
    }

    return $uploaded;
}