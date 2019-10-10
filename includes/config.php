<?php

//database credentials
define('DB_HOST', 'localhost');
define('DB_NAME', 'blog2');
define('DB_USER', 'my_user');
define('DB_PASS', 'my_passworld');

$db = new PDO('mysql:dbname='.DB_NAME.';host='.DB_HOST, DB_USER, DB_PASS);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

require_once 'functions.php';
