<?php
include('user.php');
ob_start();
session_start();

//set timezone
date_default_timezone_set('Europe/London');

$host_name = 'eu-cdbr-west-02.cleardb.net';
$user_name = 'bf469b03cd1968';
$password = '1e363d9d';
$database = 'heroku_9333fea582beece';


//$host_name = 'db721794461.db.1and1.com';
//$database = 'db721794461';
//$user_name = 'dbo721794461';
//$password = '9on2e1U4lH06K73v';

$dbh = null;
try {
    $dbh = new PDO("mysql:host=$host_name; dbname=$database;", $user_name, $password);
} catch (PDOException $e) {
    echo "Fehler!: " . $e->getMessage() . "<br/>";
    die();
}

if ($dbh==null){
    throw new Exception("database connection error");
}

$user = new User($dbh);
?>
