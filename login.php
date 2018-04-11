<?php
ob_start();
session_start();
?>
<html>
<head><title>Login</title>

<meta charset="utf-8"/>
<link rel="stylesheet" href="css/main.css">
<link rel="stylesheet" href="css/form.css">
 

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

<div class="login">
<h1>Login</h1>

<form action="actionlogin.php" method="POST">
User Name:<br />
<input type="text" name="name" placeholder="Username">
<br />
Password:<br />
<input type="password" name="password" placeholder="Password">
<br />
<button type="submit" name="submit" class="btn btn-primary btn-block btn-large" value="Login">Log Me In.</button>
<input type="hidden" name="refer" value="<?php echo (isset($_GET['refer'])) ? $_GET['refer'] : 'index.php'; ?>">
</form>
<p>
  <?php if(isset($_SESSION['login'])){
  echo "You are already signed in";
}?>

</p>
<p>Didn't Have Acc?<a href='signup.php'>Click Me</p>

</div>
</body>
<div class="blank"></div>
<footer>
  <div class="made-with-love">
  <a href='HomePage.php'><img src='../photo/logo.png' width="30" height="30" ></a>
    Made with
    <i>♥</i> by
    <a target="_blank" href="https://www.facebook.com/liewyeejames">JamesLiew</a><br>
    CopyRight:&copy; 2018 UNICORN COMPANY All Right Reserved.
  </div>
</footer>
</html>
