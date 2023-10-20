<?php
ini_set('display_errors', 1);
ini_set ('display_startup_errors', 1);
error_reporting(E_ALL);

$sn="sql104.infinityfree.com";
$un="if0_35149844";
$pw="nj2VBtSdDxrdC7";
$db="if0_35149844_database";

$conn = new mysqli($sn, $un, $pw, $db);

if ($conn->connect_error){
    die ("Connection failed:").$conn->connect_error;
}

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "INSERT INTO logins (username, password) VALUES ('$password','$username')";
if ($conn->query($sql)===TRUE) {
    echo "success";
} else {
    echo "error:".$sql. "<br>". $conn->error;
}

$conn->close();
header("Location: /index.html");
exit();

?>