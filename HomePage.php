<?php
session_start();
$file=fopen("Home_browsing.txt","r");
$num=fgets($file);
fclose($file);
if ($_SESSION['come']!='v')
  {
    $num++;
    $file=fopen("Home_browsing.txt","w");
    fwrite($file,$num);
    fclose($file);
    $_SESSION['come']='v';
  }//update browsing num
?>
<!doctype html>
<html>
<head>
<title>Unicorn House</title>
<meta charset="utf-8"/>
</head>
<body>

<aside>
  <h1>UnicornHome</h1>
  <p style="font-size:1rem;"><a href="login.php">Sign In </a></p>

</adide>

<h2>Unicorn</h2>
  <p><a href="#Introduction">What Can We Do</a></p>
  <p><a href="financetable.php">Commend Board</a></p>
  <p><a href="#Introduction">About Us</a></p>

</body>
<footer>
  <p><a href='HomePage.php'><img src='../photo/unicorn_logocowboy.jpg' width="100" height="100" ></a></p>
  <p>CopyRight:&copy; 2018 UNICORN COMPANY All Right Reserved.</p>
  <a href="https://www.facebook.com/liewyeejames"><img src="../photo/fb.png" width="50" height="50"></a>
  <a href="https://www.facebook.com/liewyeejames"<img src="fb.png" width="10" height="10">
  <a href="https://www.facebook.com/liewyeejames"<img src="fb.png" width="55" height="55">
</footer>
