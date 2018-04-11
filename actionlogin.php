<?php
ob_start();
session_start();

require('config.php');
$name = $_POST['name'];
$pass = $_POST['password'];
$refer = $_POST['refer'];


if(isset($_SESSION['login']))
{

  header('Location:login.php');
    //echo 'You are already signed in, you can <a href="logout.php">logout</a> if you want.';
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
  $query = "SELECT * FROM users WHERE name = '$name' AND password ='$pass'";
  $result=$con->query($query) OR die('Error sql');
  if($result -> num_rows > 0)
    {
      $_SESSION['login']=true;
      $row = $result->fetch_assoc();
      $_SESSION['name']  = $row['name'];
      $_SESSION['user_id'] = $row['id'];
      header('Location:member_page.php');
}

  else
    {
        // Not authenticated
      header('Location:login.php');
    }
  }
}
?>
