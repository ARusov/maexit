<?php
//$DB_SERVER = 'eu-cdbr-west-02.cleardb.net';
//$DB_USERNAME = 'bf469b03cd1968';
//$DB_PASSWORD = '1e363d9d';
//$DB_DATABASE = 'heroku_9333fea582beece';


$DB_SERVER = 'localhost:8889';
$DB_USERNAME = 'root';
$DB_PASSWORD = 'root';
$DB_DATABASE = 'maexit';

// Create connection
$conn = new mysqli($DB_SERVER, $DB_USERNAME, $DB_PASSWORD, $DB_DATABASE);


// Check connection
if ($conn->connect_error) {
    die("Verbindung zur Datenbank nicht möglich!");
}
?>


<!--mysql://bf469b03cd1968:1e363d9d@eu-cdbr-west-02.cleardb.net/heroku_9333fea582beece?reconnect=true-->