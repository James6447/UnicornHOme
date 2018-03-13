<?php
require('config.php');
$con = new mysqli($servername, $username, $password, $dbname);
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

$tick=$_POST['tick'];
$name=$_POST['name'];

if($tick == '1')
{
  $query = "UPDATE finance SET ispay='done' WHERE name='$name'";
  if($con->query($query)===TRUE)
    {echo 'Location:member_page';}
  else
    { echo "Error: " . $query . "<br>" . $con->error;}

}
else
{
  header('Location: ' . $_SERVER['HTTP_REFERER']);
}
?>
