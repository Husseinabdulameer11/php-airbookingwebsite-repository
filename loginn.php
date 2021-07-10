<?php 
$connection= new mysqli("localhost","root","","database_name");
?>
<html>
<!--
https://www.sitepoint.com/community/t/login-form-code/66257 //an example of a login system 
-->
<head></head>
<body>
<form action="/"method="post">
<input type="text"name="username"placeholder="username">
<input type="password"placeholder="password"name="password">
<button type="submit" name="submit_btn">Submit</button>
</form>
<?php
session_start();
if(isset( $_SESSION['user_id'] ))
{
 $message = 'Users is already logged in';
}
?>

</body>
</html>


