<!DOCTYPE html>
<!--
fogadja az url kéréseket és megválaszolja azokat
GET http://localhost/tagdijbackend/index.php?ugyfel -> minden ugyfel
GET http://localhost/tagdijbackend/index.php?ugyfel/{id} -> adott id ugyfel
POST http://localhost/tagdijbackend/index.php?ugyfel -> létrehoz ugyfel
PUT http://localhost/tagdijbackend/index.php?ugyfel/{id} -> adott id ugyfel
DELETE http://localhost/tagdijbackend/index.php?ugyfel/{id} -> adott id ugyfel
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Tagdíj backend</title>
    </head>
    <body>
        <pre>
            <?php
//        var_dump($_SERVER['REQUEST_METHOD']);
//        var_dump(QUERY_STRING);
            $kereSzoveg = explode('/', $_SERVER['QUERY_STRING']);
            if ($kereSzoveg[0]=== "ugyfel") {
                require_once 'ugyfel/index.php';
            } else {
                http_response_code(404);
                echo 'Nincs ilyen API';
            }
            ?>
        </pre>
    </body>
</html>
