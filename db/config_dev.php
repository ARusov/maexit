<?php
	$DB_SERVER = 'db721794461.db.1and1.com';
	$DB_USERNAME = 'dbo721794461';
	$DB_PASSWORD = '9on2e1U4lH06K73v';
	$DB_DATABASE = 'db721794461';

	// Create connection
	$conn = new mysqli($DB_SERVER, $DB_USERNAME, $DB_PASSWORD, $DB_DATABASE);

	// Check connection
	if ($conn->connect_error) {
		die("Verbindung zur Datenbank nicht möglich!");
	}
?>
