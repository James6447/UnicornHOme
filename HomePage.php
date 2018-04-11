<?php
ob_start();
session_start();
if (isset($_SESSION['login']))
{
  header('Location:member_page.php');
}

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
<link rel="stylesheet" href="css/main.css">
<script src="js/member.js"></script>

  <div id="bg"></div>
  <div class="container">
  <section>
    <nav>
      <div></div>
      <ul>
        <li data-xcoord="0px"><a href="HomePage.php">Home</li>
        <li data-xcoord="160px">About</li>
        <li data-xcoord="320px">Contact</li>
        <li data-xcoord="480px"><a href="login.php">Log in</a></li>
      </ul>
    </nav>
  </section>
</div>
</head>
<body>

<h1>Unicorn</h1>
  <p><a href="#Introduction">What Can We Do</a></p>
  <p><a href="financetable.php">Commend Board</a></p>
  <p><a href="#Introduction">About Us</a></p>

</body>

<?php include('footer.php')?>
