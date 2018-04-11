<?php
ob_start();
session_start();
require('../config.php');

$text=$_POST['text'];
$id=$_POST['id'];
$userid=$_SESSION['user_id'];

if($text == ''){
  $message="Cant Leave A Blank Message";
}
else{
  $con = new mysqli($servername, $username, $password, $dbname);
  $query = "INSERT INTO topics ( topic_subject, topic_date,topic_cat, topic_by)
            VALUES ('$text',now(), $id, $userid)";

  if ($con->query($query) == TRUE){
  $message="Thanks For Command";
  }
  else{
    echo $query.'<br/>'. $con->error;
  }
}

  echo "<script>alert('".$message."')</script>";
  header('Refresh:0.1; url='. $_SERVER["HTTP_REFERER"]);
   exit;
 ?>
