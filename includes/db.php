<?php
include 'config.php';

$db = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
}
