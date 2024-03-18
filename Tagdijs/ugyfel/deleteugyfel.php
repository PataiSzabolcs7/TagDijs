<?php
//$azon=$_POST["azon"];
//$nev=$_POST["nev"];	
//$szulev =$_post["szulev"];
//$irszam=$_POST["irszam"];	
//$orsz=$_POST["orsz"];
$azon=2005;
require_once './databaseconnect.php';
$sql = "DELETE FROM `ugyfel` WHERE `azon`=".$azon;
$stmt = $connection->prepare($sql);
if ($stmt->execute()) {
    http_response_code(201);
    echo 'Sikeresen törölve';
} else {
    http_response_code(404);
    echo 'Nem sikerült törölni';
}