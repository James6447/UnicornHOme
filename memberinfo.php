<?php
require('config.php');

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

<!doctype html>
<head>
<link rel="stylesheet" href="css/member.css">
<script src="css/member.js"></script>
</head>
<body>
  <form action="member_page.php">
    <input type="submit" value="Back">
  </form>


  <section>
  <!--for demo wrap-->
  <h1>MEMBER DETAILS</h1>
  <div class="tbl-header">
    <table cellpadding="0" cellspacing="0" border="0">
      <thead>
        <tr>
          <td>Name</td>
          <td>Birthday</td>
          <td>Contect</td>
          <td>Room</td>
          <td>Email</td>
        </tr>
      </thead>
    </table>
  </div>

  <div class="tbl-content">
    <table cellpadding="0" cellspacing="0" border="0">
<?php
$sql = "SELECT * FROM member_basic";
$result = $conn->query($sql);
if ($result->num_rows > 0)
    {
      while($row = $result->fetch_assoc())
       {
         ?>
             <tbody>
               <tr>
                 <td><?php echo $row["name"]?></td>
                 <td><?php echo $row["born"]?></td>
                 <td><?php echo $row["phone"]?></td>
                 <td><?php echo $row["room"]?></td>
                 <td><?php echo $row["email"]?></td>
               </tr>
             </tbody>

<?php       }
    }
else {
    echo "No Result";
  }

$conn->close();
?>

      </table>
    </div>
  </section>

</body>
<footer>
<div class="made-with-love">
<a href='HomePage.php'><img src='../photo/logo.png' width="30" height="30" ></a>
  Made with
  <i>♥</i> by
  <a target="_blank" href="https://www.facebook.com/liewyeejames">JamesLiew</a>
  <p>CopyRight:&copy; 2018 UNICORN COMPANY All Right Reserved.</p>
</div>
</footer>
