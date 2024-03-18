<?php

//-- osszes ugyfel adatai JSON-ben
$sql = '';
if (count($kereSzoveg) > 1) {
    if (is_int(intval($kereSzoveg[1]))) {
        $sql = 'SELECT * FROM ugyfel WHERE azon=' . $kereSzoveg[1];
        var_dump($sql);
    } else {
        http_response_code(404);
        echo 'Nem létező ügyfél';
    }
} else {
    $sql = 'SELECT * FROM ugyfel WHERE 1';
}
require_once './databaseconnect.php';
$result = $connection->query($sql);
if ($result->num_rows > 0) {
    $ugyfelek = array();
    while ($row = $result->fetch_assoc()) {
        $ugyfelek[] = $row;
    }
    http_response_code(200);
    echo json_encode($ugyfelek);
} else {
    http_response_code(404);
    echo 'Nincs egy ügyfél sem';
}