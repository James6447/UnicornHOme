<?php
ob_start();
session_start();
require('config.php');
$name=$_SESSION['name'];
$con = new mysqli($servername, $username, $password, $dbname);
mysqli_set_charset($con,'utf8');
?>
<!doctype html>
<html>
<head>
<title>Unicorn House</title>
<meta charset="utf-8"/>
<link rel="stylesheet" href="css/memberpage.css">
<script src="js/command.js"></script>

  <div id="bg"></div>
  <div class="container">
  <section>
    <nav>
      <div></div>
      <ul>
        <li data-xcoord="0px"><a href="HomePage.php">Home</a></li>
        <li data-xcoord="160px">About</li>
        <li data-xcoord="320px">Contact</li>
        <li data-xcoord="480px"><a href="logout.php">Log out</a></li>
      </ul>
    </nav>
  </section>
</div>
</head>

<body >

<div class="content-area clear">
  <div class="main-area">
    <h2><?php echo $_SESSION['name']?></h2>
      <p><a href="HomePage.php">HOME</a></p>
      <p><a href="memberinfo.php">SHOW HOME MEMBER INFO</a></p>
      <p><a href="financetable.php">CHECK PAYMENT HISTORY</a></p>
  </div>

<aside class="sidebar">
    <?php
    if($name == '')
    {}
    else{
    ?>
    <table width="600" border="1.5"   border-color="rgba(255,255,255,0.3)">
    <tr>
      <td>Name</td>
      <td>Rent</td>
      <td>Untities</td>
      <td>Total Payment</td>
      <td>Guest</td>
      <td>Host</td>
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
               ?>
                 <tr>
                   <td><?php echo $row["name"]?></td>
                   <td><?php echo $row["rent"]?></td>
                   <td><?php echo $row["untities"]?></td>
                   <td><?php echo $row["totalpayment"]?></td>
                   <td><?php echo $row["user"]?></td>
                   <td><?php echo $row["admin"]?></td>
                   <td><?php echo $row["ispay"]?></td>
                 </tr>
      <?php
          }
        }
      ?>
      </table>

      <form action="actionpayment.php" method="POST">
        Payment:<br>
        <input type="hidden" name="name" value="<?php echo htmlspecialchars($name); ?>">
        <input type="checkbox" name="tick" Value="1">
        <input type="submit" name="submit" value="SUBMIT">
      </form>

      <div class="form-row">
        <div class="row">
              <ul>
                  <li>Please click <strong>Click Me</strong> to check your payment.</li>
                  <li>Please click the <strong>TICK</strong> and <strong>Submit</strong> if you have to pay .</li>
                  <li>AND NO CHEATING <strong>FOOL</strong>.</li>

              </ul>
        </div>
      </div>
</aside>
</div>
<div class="command-board">
  <h2>Comment Board</h2>
  <div id="refresh" class="cat">
    <iframe id='category' src="commentboard/category.php"  style="width:90%; height: 825px; overflow:hidden;"  TITLE="留言" marginwidth=0 marginheight=0 hspace=0 vspace=0 frameborder=0 scrolling="no" allowTransparency="true"></iframe>
  </div>
  </div>
</body>
<?php include('footer.php'); ?>
