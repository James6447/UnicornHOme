<?php
ob_start();
session_start();
require('config.php');
$con = new mysqli($servername, $username, $password, $dbname);
mysqli_set_charset($con,'utf8');
?>
<!doctype html>
<header>
<meta charset="utf-8"/>
<link rel="stylesheet" href="css/memberpage.css">
</header>
<body>
<div class="commad">
<h1>Leave a Command</h1>
  <p><?php echo $_SESSION['name'] ?></p>
  <form action="actioncommand.php" method="POST">
    <textarea name="text"  placeholder="Leave Your Comment Here"></textarea><br/>
    <input type="submit" name="submit" value="SEND" onclick="getData()">
  </form>
</div>
</body>
