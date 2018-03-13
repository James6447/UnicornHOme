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
  <form action="member_page.php">
    <input type="submit" value="Back">
  </form>
  <table width="700" border="1">
    <tr>
      <td>Name</td>
      <td>Birthday</td>
      <td>Contect</td>
      <td>Room</td>
      <td>Email</td>
    </tr>
</head>
<body>

<?php
$sql = "SELECT * FROM member_basic";
$result = $conn->query($sql);
if ($result->num_rows > 0)
    {
      while($row = $result->fetch_assoc())
       {
         ?>
           <tr>
             <td><?php echo $row["name"]?></td>
             <td><?php echo $row["born"]?></td>
             <td><?php echo $row["phone"]?></td>
             <td><?php echo $row["room"]?></td>
             <td><?php echo $row["email"]?></td>
           </tr>
<?php       }
    }
else {
    echo "No Result";
  }

$conn->close();
?>
</table>
</body>
