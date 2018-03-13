<html>
<head><title>Signin</title>
</head>
<body>

<form action="actionsignin.php" method="POST">
Name:<br />
<input type="text" name="name">
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
Room:<br />
<select name="room" id="select">
  <?php
    for ($r=1; $r<=5 ;$r++)
    {
       echo "<option value=$r>$r</option>";
    }
   ?>
</select>
<br/>
Phone:<br />
<input type="text" name="phone">
<br />
Email:<br />
<input type="text" name="email">
<br />
Password:<br />
<input type="password" name="password">
<br />
Comfirm Password:<br/>
<input type="password" name="cpassword">
<br/>
<input type="submit" name="submit" value="Signin">
</form>
</body>
</html>
