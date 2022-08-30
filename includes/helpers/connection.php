<?php

$servername = "localhost";
$username = "extra";
$password = "Qwerty12!@";
    

// Create connection
$conn = mysqli_connect($servername, $username, $password,"amu_maternal");

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
