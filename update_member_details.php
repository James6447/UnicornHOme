<?php
require('config.php');
?>
<!doctype html>
<head>
  <title>Details</title>
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
  <form name='update' method='POST' action="update_done.php">

    Member Name:<br>
    <?php
    $con=new mysqli($servername,$username,$password,$dbname);
    $sql = "SELECT name FROM member_basic";
    $result=$con->query($sql) OR die('Error sql');
    ?>
    <select name="name" id="select"  >
      <?php

      if ($result->num_rows > 0)
          {
            while($row = $result->fetch_assoc())
             {

                $i =  htmlspecialchars($row['name']);
                echo "<option value='$i'>$row[name]</option>";

               }

          }
      else
        {
          echo "<a href='signup.php'>Add a Member</a>";
        }
      ?>

    </select><br>

    Phone Number:<br>
    <input type="text" name="phone" placeholder="Num To Change"><br>

    Room Number:<br>
    <select name="room" id="select">
      <?php
      for ($n=1;$n<=3;$n++)
      {
        echo "<option value=$n>$n</option>";
      }
      ?>
    </select><br>

    Email:<br>
    <input type="text" name="email" placeholder="Email To Chnage" ><br>
    <input type="submit" value="Update" class="btn btn-primary btn-block btn-large">
  </form>

  <form name='update' action="admin.php">
  <input type="submit" value="Back" class="btn btn-primary btn-block btn-large">
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
