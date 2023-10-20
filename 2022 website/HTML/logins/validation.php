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

$sql = "SELECT * FROM logins WHERE username='$username' AND password='$password'";
$result = $conn->query($sql);

if ($result->num_rows>0){
    echo 'Login successful';
    $conn->close();
    header("Location: /mains.html");
    exit();
} else{
    echo 'Invalid credentials'
    $conn->close();
    header("Location: /index.html");
    exit();
}

?>