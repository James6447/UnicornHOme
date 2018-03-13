<?php
require('config.php');

$conn=new mysqli($servername,$username,$password,$dbname);
$name=$_POST['name'];
$phone=$_POST['phone'];
$room=$_POST['room'];
$email=$_POST['email'];
$rent=$_POST['rent'];
$rent1=$_POST['rent1'];
$total=$_POST['rent']+$_POST['rent1'];
$ispay=$_POST['ispay'];

if ($phone =='')
{
  $sql="UPDATE finance SET rent='$rent', untities='$rent1' ,totalpayment='$total' ,ispay='$ispay' WHERE name='$name'";

  if($conn->query($sql)===TRUE)
    { header('Location:update_payment_amount.php');}
  else
    { echo "Error: " . $sql . "<br>" . $conn->error;}

}
// update finance details(after return)
else
{
  $sql="UPDATE member_basic SET phone='$phone',room='$room' ,email='$email' WHERE name='$name'";
  if($conn->query($sql)===TRUE)
    { header('Location:admin.php');}
  else
    { echo "Error: " . $sql . "<br>" . $conn->error;}
}

// update member details
  $conn->close();
?>
