<?php
require('config.php');

$name = $_POST['name'];
$pass = $_POST['password'];
$refer = $_POST['refer'];

if ($name == '' || $pass == '')
{
  // No login information
  header('Location: login.php?refer='. urlencode($_POST['refer']));
}

else
{

  if($name == 'eric' && $pass == 12345)
  {
    header('Location: admin.php');
  }
  // Authenticate user
  else
  {
  $con = new mysqli($servername, $username, $password, $dbname);
  $query = "SELECT name FROM member_basic WHERE name = '$name' AND password ='$pass'";
  $result=$con->query($query) OR die('Error sql');
  if($result -> num_rows > 0)
    {
      header('Location:member_page.php');
    }
  else
    {
        // Not authenticated
        echo "no result";
    }
  }
}
?>
