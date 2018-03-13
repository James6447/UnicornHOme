<?php
require('config.php');

$name = $_POST['name'];
$born = $_POST['year'].'-'.$_POST['month'].'-'.$_POST['day'];
$room = $_POST['room'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$pass = $_POST['password'];
$cpass = $_POST['cpassword'];
$refer = $_POST['refer'];

if ($name == '' || $pass == '' || $phone=='' || $email=='' || $pass!==$cpass)
{
    // No login information
    header('Location: signup.php?refer='. urlencode($_POST['refer']));
}
else
{
    $con=new mysqli($servername,$username,$password,$dbname);
    $query = "SELECT * FROM member_basic WHERE name = '$name' ";
    $result=$con->query($query) OR die('Error sql');

    if($result -> num_rows > 0)
      {
        header('Location: signup.php?refer='. urlencode($_POST['refer']));
      }

    else
      {

        $query1 = "INSERT INTO member_basic (name, born, phone, room, email,password)
        VALUES('$name','$born','$phone','$room','$email','$pass')";

        $query2 = "INSERT INTO finance (name)
        VALUES('$name')";

        if($con->query($query1) === TRUE && $con->query($query2) === TRUE)
        {
          header('Location: login.php');
        }
        else
        {
          echo "Error:" . $query1 . '<br/>' . $con->error;
        }
      }
}
