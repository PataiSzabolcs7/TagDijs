<?php
//$azon=$_POST["azon"];
//$nev=$_POST["nev"];	
//$szulev =$_post["szulev"];
//$irszam=$_POST["irszam"];	
//$orsz=$_POST["orsz"];
$azon=2005;
$nev="Szabi";	
$szulev =2010;
$irszam=4035;	
$orsz="H";
require_once './databaseconnect.php';
$sql = "UPDATE `ugyfel` SET `nev`='$nev',`szulev`='$szulev',`irszam`='$irszam',`orsz`='$orsz' WHERE `azon`=".$azon;
$stmt = $connection->prepare($sql);
if ($stmt->execute()) {
    http_response_code(201);
    echo 'Sikeresen frissítve';
} else {
    http_response_code(404);
    echo 'Nem sikerült frissíteni';
}