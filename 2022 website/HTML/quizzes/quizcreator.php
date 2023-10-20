<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$sn = "sql104.infinityfree.com";
$un = "if0_35149844";
$pw = "nj2VBtSdDxrdC7";
$db = "if0_35149844_quizzes";

$conn = new mysqli($sn, $un, $pw, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$name = $_POST['name'];
$subject = $_POST["subject"];
$subject = strtoupper($subject);
$tableName = preg_replace("/[^a-zA-Z0-9]+/", "", $subject.$name);

$sql = "CREATE TABLE IF NOT EXISTS $tableName (
    id INT AUTO_INCREMENT PRIMARY KEY,
    question VARCHAR(255) NOT NULL,
    answer VARCHAR(255) NOT NULL
)";

if ($conn->query($sql) === FALSE) {
    die("Error creating table: " . $conn->error);
}


for ($i = 1; isset($_POST["question$i"]); $i++) {
    $question = $_POST["question$i"];
    $answer = $_POST["answer$i"];

    $sql = "INSERT INTO $tableName (question, answer) VALUES ('$question', '$answer')";

    if ($conn->query($sql) !== TRUE) {
        echo "ERROR: " . $sql . "<br>" . $conn->error;
    } 
}

$conn->close();
echo "Script executed";
header("Location: ./mainq.html");
exit();
?>