
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
        <a href='./mainq.html'>Quizzes</a>
        <a href='/HTML/logins/newuser.html'>Sign up</a>
    </div>

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

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['quizName'])) {
            $quizName = $_POST['quizName'];

            $sql = "SELECT * FROM $quizName";
            $result = $conn->query($sql);

            if ($result) {
                $questionNumber = 0;
                $points = 0;

                while ($row = $result->fetch_assoc()) {
                    $questionId = $row['id'];
                    $question = $row['question'];
                    $userAnswer = strtolower($_POST["userAnswer"][$questionNumber]);
                    $correctAnswer = strtolower($row['answer']);

                    if ($userAnswer === $correctAnswer) {
                        $questionNumber++;
                        echo "<p class=centre> $questionNumber) Correct!<br> Question: $question <br> Your answer: $userAnswer<br></p>";
                        echo "<br>";
                        $points++;
                    } else {
                        $questionNumber++;
                        echo "<p class=centre> $questionNumber) Incorrect.<br> Question: $question <br> Your answer: $userAnswer <br> Correct answer: $correctAnswer<br></p>";
                        echo "<br>";
                    }

                    
                }
                if ($result->num_rows == $points) {
                    echo ("<h2 class='centre darkblue'> Full marks! Well done! </h2>");
                }
                elseif ($points == 0) {
                    echo ("<h2 class='centre darkblue'> Nice try, keep practicing! </h2>");
                }
                else {
                    echo ("<h2 class='centre darkblue'> So close, keep going! </h2>");
                }
                echo ("<h2 class='centre darkblue'> You earned $points points! </h2>");

            } else {
                echo "Error executing SQL query: " . $conn->error;
            }
        } else {
            echo "Quiz name not provided.";
        }
    } else {
        echo "Invalid request method.";
    }

    $conn->close();
    ?>
    <div class='container'>
        <button>
            <a href='./mainq.html'>Continue without saving</a>
        </button>
    </div>    
    <p class='centre'>To save points, enter your id number</p>
    <form class='centre' action='./savepoints.php' method='POST'>
        <input type='text' name='id' id='id'>
        <input type='hidden' name='points' value='<?php echo $points; ?>'>
        <button type='submit'>Save</button>
    </form>
</body>
</html>