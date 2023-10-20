<html>
  <head>
    <title>GibJohn choose quiz</title>
    <link href="/style.css" rel="stylesheet">
  </head>
  <body>
    <div class='topnav'>
        <a href="/index.html">Home</a>
        <a href="/HTML/messages/message.html">Message a tutor</a>
        <a id='active' href='./mainq.html'>Quizzes</a>    
        <a href='/HTML/logins/newuser.html'>Sign up</a>            
    </div>
    <div class='centre'>
        <h1 class='darkblue'>Find quiz</h1>
        <form action='./quizshow.php' method='POST'>
            <label for="subject">Choose a subject</label><br>
            <select id="subject" name="subject">
                <option value="English">English</option>
                <option value="Maths">Maths</option>
                <option value="Science">Science</option>
                <option value="Geography">Geography</option>
                <option value="History">History</option>
                <option value="MFL">MFL</option>
                <option value="Other">Other</option>
                <option value="JustForFun">Just for fun</option>
            </select><br><br>
            <button type='submit'>Go!</button>
        </form>
    </div>
    <?php
    

    ?>
  </body>
</html>