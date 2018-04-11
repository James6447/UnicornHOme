<!doctype html>
<header>
  <link rel="stylesheet" href="css/memberpage.css">
</header>
<body>
<?php
require('config.php');
$con = new mysqli($servername, $username, $password, $dbname);
mysqli_set_charset($con,'utf8');
$query = "SELECT * FROM command";
$result = $con->query($query);
if($result -> num_rows > 0)
  {
    while ($row = $result->fetch_assoc())
    {?>
      <div class="board">
      <h3><?php echo $row['name'].'&nbsp since &nbsp'.$row['comment_date'] ?></h3>
      <p><?php echo $row['comment_text'] ?></p>
      <tr>
        <td><span onclick="like()">like</span></td>
        <td><?php echo $row['comment_like']?></td>
      </tr>

    </div>
    <?php }
  }
?>
</body>
