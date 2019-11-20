<?php

//upload.php
$base_url = 'http://localhost/turkwizard/public';
if (isset($_POST["image"])) {
    $data = $_POST["image"];

    $image_array_1 = explode(";", $data);

    $image_array_2 = explode(",", $image_array_1[1]);

    $data = base64_decode($image_array_2[1]);


    //$imageName = ((isset($_GET['title'])) ? $_GET['title'] . time() : time()) . '.jpg';
    $imageName = $_GET['fileid'] . '.jpg';
    $folder = $_GET['title'];
    if (!file_exists("storage/uploads/feeds/gallery/$folder/")) {
        mkdir("storage/uploads/feeds/gallery/$folder/", 0777, true);
    }
    file_put_contents("storage/uploads/feeds/gallery/$folder/" . $imageName, $data);

    echo "<img src='" . $base_url . "/storage/uploads/feeds/gallery/$folder/" . $imageName . "?r=" . rand(1, 9999) . "' class='img-thumbnail' />";
}