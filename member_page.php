<?php
require('config.php');
$name=$_GET['name'];
$con = new mysqli($servername, $username, $password, $dbname);
?>

<!doctype html>
<html>
<head>
<title>Unicorn House</title>
<meta charset="utf-8"/>
</head>
<body>
<aside>

<?php

if($name == '')
{}
else{
  ?>
  <table width="700" border="1">
    <tr>
      <td>Name</td>
      <td>Rent</td>
      <td>Untities</td>
      <td>Payment Should Pay</td>
      <td>Clear</td>
    </tr>

<?php } ?>
<?php

$query = "SELECT * FROM finance WHERE name = '$name' ";
$result = $con->query($query);
//show user payment
if ($result-> num_rows >0)
    {
      while($row = $result->fetch_assoc())
       {
         if($row["ispay"]=="yet")
         {
         ?>
           <tr>
             <td><?php echo $row["name"]?></td>
             <td><?php echo $row["rent"]?></td>
             <td><?php echo $row["untities"]?></td>
             <td><?php echo $row["totalpayment"]?></td>
             <td><?php echo $row["ispay"]?></td>
           </tr>

<?php
     }
     else {break;}
    }
  }
?>
</table>

<form action="member_page.php" method="GET">
    Member Name:<br>
    <?php
    $sql = "SELECT name FROM finance";
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
//update user own payment
      ?>
      </select>
    <input type="submit" name="submit">
</form>
<form action="actionpayment.php" method="POST">
  <input type="hidden" name="name" value="<?php echo htmlspecialchars($name); ?>">
  <input type="checkbox" name="tick" Value="1">
  <input type="submit" name="submit">
</form>


</adide>

<h2>Unicorn</h2>
  <p><a href="HomePage.php">HOME</a></p>
  <p><a href="memberinfo.php">SHOW HOME MEMBER INFO</a></p>
  <p><a href="financetable.php">CHECK PAYMENT HISTORY</a></p>

</body>
<footer>
  <p><a href='HomePage.php'><img src='../photo/unicorn_logocowboy.jpg' width="100" height="100" ></a></p>
  <p>CopyRight:&copy;2018 UNICORN COMPANY All Right Reserved.</p>
  <a href="https://www.facebook.com/liewyeejames"><img src="../photo/fb.png" width="50" height="50"></a>
  <a href="https://www.facebook.com/liewyeejames"><img src="fb.png" width="10" height="10"></a>
  <a href="https://www.facebook.com/liewyeejames"><img src="fb.png" width="55" height="55"></a>
</footer>
