<?php
include('user.php');
ob_start();
session_start();

//set timezone
date_default_timezone_set('Europe/London');

//database credentials
//define('DBHOST','localhost');
//define('DBUSER','root');
//define('DBPASS','');
//define('DBNAME','maexit');

//$host_name = 'localhost';
//$database = 'maexit';
//$user_name = 'root';
//$password = '';

$host_name = 'db721794461.db.1and1.com';
$database = 'db721794461';
$user_name = 'dbo721794461';
$password = '9on2e1U4lH06K73v';

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
//$location = "http://localhost/maexit";
$location = "http://maexit.net";
?>
