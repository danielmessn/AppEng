<?php
/* Database credentials.*/
const DB_SERVER = 'localhost';
const DB_USERNAME = 'root';
const DB_PASSWORD = '';
const DB_NAME = 'soccermanager';
 
/* Attempt to connect to MySQL database */
$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
// Check connection
if (!is_null($conn->connect_error))
{
   echo 'Connection failed<br>';
   echo 'Error number: ' . $conn->connect_errno . '<br>';
   echo 'Error message: ' . $conn->connect_error . '<br>';
   die();
}

?>