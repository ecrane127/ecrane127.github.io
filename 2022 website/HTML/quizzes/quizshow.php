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
        <h1 class='centre darkblue'>Choose a quiz!</h1>

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

        $subject = $_POST['subject'];
        $subject = strtoupper($subject);
        $length = strlen($subject);

        $sql = "SHOW TABLES LIKE '$subject%'";
        $result = $conn->query($sql);


        if ($result->num_rows>0) {
            echo "<ul>";
            while ($row = $result->fetch_assoc()) {
                $quizName = reset($row);
                $showName = substr($quizName, $length);
                echo "<li class='centre'><a href='quizanswer.php? quiz=$quizName'>$showName</a></i>";
                                
            }
            echo "<ul>";
        } else {
            echo "<p class='centre'> No quizzes available.</p>";
            echo "<div class='container'>";
            echo "<button><a href='./create.html'>Click here to create some!</a></button>";
            echo "</div>";
        }
        ?>
        
  </body>
</html>