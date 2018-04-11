<html>
<head><title>Signin</title>
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
<form action="actionsignin.php" method="POST">
    Name:<br />
    <input type="text" name="name" placeholder="Username">
    <br />
    Birth Day:<br />
      <select name="year" id="select">
      <?php
        for ($y=1980; $y<=date("Y") ;$y++)
        {
           echo "<option value=$y>$y</option>";
        }
       ?>
     </select>
     <select name="month" id="select">
    <?php
        for ($m=1; $m<=12; $m++)
        {
          echo "<option value=$m>$m</option>";
        }
    ?>
      </select>
      <select name="day" id="select">
    <?php
        for ($d=1; $d<=31; $d++)
        {
          echo "<option value=$d>$d</option>";
        }
    ?>
      </select>
    <br />
    Room:
    <br />
      <select name="room" id="select">
      <?php
        for ($r=1; $r<=5 ;$r++)
        {
           echo "<option value=$r>$r</option>";
        }
       ?>
     </select>
    <br/>
    Phone:
    <br/>
    <input type="text" name="phone" placeholder="Contact Num">
    <br />
    Email:
    <br/>
    <input type="text" name="email" placeholder="Email Address">
    <br/>
    Password:
    <br/>
    <input type="password" name="password" placeholder="Password">
    <br/>
    Comfirm Password:
    <br/>
    <input type="password" name="cpassword" placeholder="Comfirm Password" >
    <br/>
    <button type="submit" name="submit" class="btn btn-primary btn-block btn-large">Sign In</button>
</form>
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
