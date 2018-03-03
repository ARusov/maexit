<?php
	$DB_SERVER = 'localhost';
	$DB_USERNAME = 'root';
	$DB_PASSWORD = '';
	$DB_DATABASE = 'maexit';

	// Create connection
	$conn = new mysqli($DB_SERVER, $DB_USERNAME, $DB_PASSWORD, $DB_DATABASE);

	// Check connection
	if ($conn->connect_error) {
		die("Verbindung zur Datenbank nicht möglich!");
	}
?>
