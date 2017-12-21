<?php

$servername = 'localhost';
$username = 'root';
$password = '';
$db = 'maxtron';

$conn= new mysqli($servername, $username, $password, $db);

if(!$conn){
	echo "Could not connect to the database: ". mysql_error();
}
