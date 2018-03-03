<?php
	$DB_SERVER = 'db694319993.db.1and1.com';
	$DB_USERNAME = 'dbo694319993';
	$DB_PASSWORD = 'c13Izt6j90r587fb';
	$DB_DATABASE = 'db694319993';

	// Create connection
	$conn = new mysqli($DB_SERVER, $DB_USERNAME, $DB_PASSWORD, $DB_DATABASE);

	// Check connection
	if ($conn->connect_error) {
		die("Verbindung zur Datenbank nicht möglich!");
	}
?>
