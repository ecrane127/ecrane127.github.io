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

$fname = $_POST['fname'];
$fname = ucfirst($fname);
$sname = $_POST['sname'];
$sname = ucfirst($sname);
$email = $_POST['email'];
$birthday = $_POST['birthday'];
$choice = $_POST['choice'];
$sql = "INSERT INTO users (fname, sname, email, birthday, status) VALUES ('$fname','$sname', '$email', '$birthday', '$choice')";
if ($conn->query($sql)===TRUE) {
    echo "success";
} else {
    echo "error:".$sql. "<br>". $conn->error;
}

$conn->close();
header("Location: /HTML/logins/userpass.html");
exit();

?>