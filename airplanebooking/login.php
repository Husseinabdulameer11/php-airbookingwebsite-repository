<!DOCTYPE html>
<html lang="en">
<head>
    <!--linje 22:    $query    = "SELECT * FROM `users` WHERE username='$username'
                     AND password='" . md5($password) . "'"; kryptert passord-->
    <meta charset="utf-8"/>
    <title>Login</title>
    <link rel="stylesheet" href="style.css"/>
</head>
<body>
<h1>Airplane booking website<h1>
<?php
    require('db.php');
    session_start();
    // When form submitted, check and create user session.
    if (isset($_POST['username'])) {
        $username = stripslashes($_REQUEST['username']);    // removes backslashes
        $username = mysqli_real_escape_string($connection, $username);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($connection, $password);
        // Check user is exist in the database
        $query    = "SELECT * FROM `users` WHERE username='$username'
                     AND password='" . md5($password) . "'";
        $result = mysqli_query($connection, $query) or die(mysql_error());
        $rows = mysqli_num_rows($result);
        if ($rows == 1) {
            $_SESSION['username'] = $username;
            // Redirect to user dashboard page
            header("Location: index.php");
        } else {
            echo "<div class='form'>
                  <h3>Incorrect Username/password.</h3><br/>
                  <p class='link'>Click here to <a href='login.php'>Login</a> again.</p>
                  </div>";
        }
    } else {
?>
<div class="white_box">
    <form class="form" method="post" name="login">
        <h2 class="login-title">Login</h2>
        <input type="text" class="login-input" name="username" placeholder="Username" autofocus="true" required />
        <input type="password" class="login-input" name="password" placeholder="Password" required />
        <input type="submit" value="Login" name="submit" class="login-button"/>
        <p class="link"><a href="registration.php">New Registration</a></p>
  </form>
  </div>
<?php
    }
?>
</body>
</html>