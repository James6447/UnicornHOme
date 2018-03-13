<?php
require('config.php');
?>
<!doctype html>
<head>
  <title></title>
</head>
<body>

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
    <input type="text" name="phone" ><br>

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
    <input type="text" name="email" ><br>
    <input type="submit" value="Update">
  </form>

  <form name='update' action="HomePage.php">
  <input type="submit" value="Back">
  </form>
</body>
