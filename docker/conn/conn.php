<?php

// throw when db error occurs, instead of returning false.
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

// Get database connection parameters from environment variables, with defaults for local development.
$db_host = getenv('DB_HOST') ?: 'db';
$db_name = getenv('DB_NAME') ?: 'testwsqlnew';
$db_user = getenv('DB_USER') ?: 'capstone';
$db_password = getenv('DB_PASSWORD');

if ($db_password === false || $db_password === '') {
    throw new RuntimeException('DB_PASSWORD is not configured.');
}

// Create new mysqli connection.
$conn = new mysqli($db_host, $db_user, $db_password, $db_name);

// Set the character set to utf8mb4 to support a wide range of characters.
$conn->set_charset('utf8mb4');