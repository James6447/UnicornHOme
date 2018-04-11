<?php
ob_start();
session_start();
require('../config.php');
$dislike=$_GET['disid'];
$like=$_GET['likeid'];
$by=$_GET['by'];
$userid=$_SESSION['user_id'];

$con = new mysqli($servername, $username, $password, $dbname);
if ($_GET['disid'] == '')
{
      $query = "UPDATE topics
                SET topic_like=topic_like+1
                WHERE topic_id=$like";

      $query1 = "INSERT INTO topics_likes (like_by , like_topic)
                   VALUES ($userid , $like)";

      if (($con->query($query) === TRUE) && ($con->query($query1) ===TRUE))
      {
            $message="Thanks For Like";
      }
      else{
        echo $query.'<br/>'. $con->error;
        echo $query1.'<br/>'.$con->error;
      }
}

else
{
  $query2 = "DELETE FROM topics_likes WHERE like_topic=$dislike";

  $query3 = "UPDATE topics
            SET topic_like=topic_like-1
            WHERE topic_id=$dislike";

  if (($con->query($query2) === TRUE) && ($con->query($query3) === TRUE))
  {
    $message="SO BAD";
  }
  else {
    echo $query2."<br/>".$con->error;
    echo $query3."<br/>".$con->error;
  }

}

  echo "<script>alert('".$message."')</script>";
  header('Refresh:0.1; url='. $_SERVER["HTTP_REFERER"]);
   exit;
 ?>
