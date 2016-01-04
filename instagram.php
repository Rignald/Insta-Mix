<?php
//hier wordt gecontroleerd of er een Tag is verzonden. zo niet dan neemt hij een standaard waarde
$tag = isset($_GET['Tag']) ? $_GET['Tag'] : "Tokyo";
$tag = str_replace(" ","_",$tag);

$clientId = "fd443415c3324e0798975597ca85fc55";
$jsonData = "https://api.instagram.com/v1/tags/" . $tag . "/media/recent?client_id=" . $clientId . "&callback=?";

$phpData = file_get_contents($jsonData);
$jsonDecodeData = json_decode($phpData);

//set the header to tell the client some json is coming its way
header("Content-Type: application/json");
echo json_encode($jsonDecodeData);

exit;