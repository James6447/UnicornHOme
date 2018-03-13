<?php
require('config.php');
?>
<!doctype html>
<head>
  <title>Amount</title>
</head>
<body>

  <form name='update' method='POST' action="update_done.php">

    Member Name:<br>
    <?php
    $con=new mysqli($servername,$username,$password,$dbname);
    $sql = "SELECT name FROM member_basic";
    $result=$con->query($sql) OR die('Error sql');
    ?>
    <select name="name" id="select" >
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

    Rent:<br>
    <input type="text" name="rent" ><br>

    Untities:<br>
    <input type="text" name="rent1" ><br>

    Statut:<br>
    <input type="radio" name="ispay" value="done">✔<br>
    <input type="radio" name="ispay" value="yet" >✘<br>

    <input type="submit" value="Update">
  </form>

  <form name='update' action="admin.php">
  <input type="submit" value="Back">
  </form>

</body>
