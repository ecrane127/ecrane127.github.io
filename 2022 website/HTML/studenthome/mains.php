<!DOCTYPE html
<html>

<head>
    <link href="/style.css" rel="stylesheet">
    <title>GibJohn Student</title>
</head>

<body>
    <div class='topnav'>
        <a class='active' href="/mains.html">Home</a>
        <a href="/HTML/messages/message.html">Message a tutor</a>
        <a href='/HTML/quizzes/mainq.html'>Quizzes</a>
        <a href='/index.html'>Profile</a>
    </div>
    <div class='centre'>
        <h1 class='darkblue'>Welcome back!</h1>
        <div class='leaderboard'>
            <?php
            $sn = "sql104.infinityfree.com";
            $un = "if0_35149844";
            $pw = "nj2VBtSdDxrdC7";
            $db = "if0_35149844_database";

            $conn = new mysqli($sn, $un, $pw, $db);

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "SELECT fname, points FROM users ORDER BY points DESC";
            $result = $conn->query($sql);

            echo "<ol>";
            while ($row = $result->fetch_assoc()) {
                echo "<li>{$row['fname']} - {$row['points']} points</li>";
            }
            echo "</ol>";

            $conn->close();
            ?>
        </div>
    </div>
</body>

</html>