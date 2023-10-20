<!DOCTYPE html>
<html>
  <head>
    <title>GibJohn choose quiz</title>
    <link href="/style.css" rel="stylesheet">
  </head>
  <body>
          <div class='topnav'>
                <a href="/index.html">Home</a>
                <a href="/HTML/messages/message.html">Message a tutor</a>
                <a href='/mainq.html'>Quizzes</a>    
                <a href='/HTML/logins/newuser.html'>Sign up</a>            
        </div>
  </body>
</html>

<?php
$sn = "sql104.infinityfree.com";
$un = "if0_35149844";
$pw = "nj2VBtSdDxrdC7";
$db = "if0_35149844_quizzes";

$conn = new mysqli($sn, $un, $pw, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if (isset($_GET['quiz'])) {
    $quizName = $_GET['quiz'];
    $showName = preg_replace('/[^a-z]/', '', $quizName);


    $sql = "SELECT * FROM $quizName";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<h1 class='centre darkblue'>Quiz name: $showName</h1>";
        echo "<form class='centre' method='post' action='validateanswers.php'>";
       
        while ($row = $result->fetch_assoc()) {
            $question = $row['question'];
            $questionId = $row['id'];

            echo "<p>$question</p>";
            echo "<input type='hidden' name='correctAnswer[]' value='{$row['answer']}'>";
            echo "<input type='text' name='userAnswer[]' required><br>";
        }
       
        echo "<input type='hidden' name='quizName' value='$quizName'><br>";
        echo "<button type='submit'>Submit</button>";
        echo "</form>";
    } else {
        echo "No questions available for $quizName.";
    }
} else {
    echo "Invalid quiz selection.";
}

$conn->close();
?>
