<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$sn = "sql104.infinityfree.com";
$un = "if0_35149844";
$pw = "nj2VBtSdDxrdC7";
$db = "if0_35149844_database";

$conn = new mysqli($sn, $un, $pw, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$points = $_POST['points'];
$id = $_POST['id'];

$getPoints = "SELECT points FROM users where id=$id";
$result = $conn->query($getPoints);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $currentPoints = intval($row['points']);
    $newPoints = $currentPoints + intval($points);
}

$sql = "UPDATE users SET points = $newPoints WHERE id = '$id'";
if ($conn->query($sql)===TRUE) {
    echo "success";
} else {
    echo "error:".$sql. "<br>". $conn->error;
}

$conn->close();
echo "Script executed";
header("Location: ./mainq.html");
exit();
?>