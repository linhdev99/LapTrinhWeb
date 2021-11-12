<?php
$filename = 'example.sql';
$mysql_host = 'localhost';
$mysql_username = 'username';
$mysql_password = 'password';
$sql = file_get_contents($filename);

$conn = new mysqli($mysql_host, $mysql_username, $mysql_password);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
echo "<br/>";
$conn->multi_query($sql);
echo "Successfully";
