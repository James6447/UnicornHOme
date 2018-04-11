<!doctype html>
<?php
session_start();
require('../config.php');

$id=$_GET['id'];
$userid=$_SESSION['user_id'];
//what pages now
$p=$_GET['p'];
if($p == ''){
  $p=1;
  }

$number=3;//每次要顯示幾筆資料
$start=($p-1)*$number;
$con = new mysqli($servername, $username, $password, $dbname);
?>

<header>
  <title>POST</title>
  <link rel="stylesheet" href="../css/memberpage.css">
  <script src="../js/command.js"></script>
</header>
<body id="refresh" >
<?php
$query = "SELECT * FROM categories WHERE cat_id=$id ";
$result = $con->query($query);

//show categories topic
if ($result-> num_rows >0)
    {
      while($row = $result->fetch_assoc())
       {
          echo '<h1>'.$row['cat_name'] .'</h1>';
          echo '<p>'.$row['cat_description'] .'</p>';
       }
    }
else{
   echo "no result";
  }

//show camment column
$query1 ="SELECT topics.topic_subject, topics.topic_id, topics.topic_like, topics.topic_by, topics.topic_date,topics_likes.like_topic,topics_likes.like_by,users.name
          FROM topics
          left join topics_likes
          ON topics.topic_id=topics_likes.like_topic
          INNER JOIN users
          ON topics.topic_by=users.id
          where topics.topic_cat=$id
          order by topic_date DESC
          limit $start,$number
          ";

$query2 ="SELECT * FROM topics_likes WHERE like_by=$userid";
//判斷幾頁
$query3 ="SELECT*FROM topics WHERE topic_cat=$id";

$result1 = $con->query($query1);
$result2 = $con->query($query2);
$result3 = $con->query($query3);

$total=mysqli_num_rows($result3);//總共有幾筆資料
$pages=ceil($total/$number);


if ($result1-> num_rows >0)
      {
        while( $row = $result1->fetch_assoc())
         {
          echo '<div class="board" >';
          echo '<tr>';
          echo '<h3>'.$row['name'].'&nbsp write at &nbsp'.$row['topic_date'].'</h3>';

          if($row['like_by'] == $userid)
            {
              echo '<p>'.$row['topic_subject'] .'</p>';
              echo '<td><a onclick="chnstatys_d(this)" href="actionlike.php?disid='.$row['topic_id'].'">dislike</a>'.$row['topic_like'].'</td>';
              echo '</tr>';
              echo '</div>';
            }
          else{
              echo '<p>'.$row['topic_subject'] .'</p>';
              echo '<td><a onclick="chnstatus_l(this)" href="actionlike.php?likeid='.$row['topic_id'].'">like</a>'.$row['topic_like'].'</td>';
              echo '</tr>';
              echo '</div>';
          }
          }


         }
    ?>

<p align="center">
  <?php
  for($i=1;$i<=$pages;$i++){?>
    <span onclick="getData('category_info.php?id=<?php echo $id?>&p=<?php echo $i ?>');"><?php echo $i?></span>
<?php  }
  ?>
</p>
<p align="center"><?php echo $p?>pages/Total<?php echo $pages?>pages</p>


<h1>Leave a Comment</h1>
  <p><?php echo $_SESSION['name'] ?></p>
  <form action="actioncommand.php" method="POST">
    <input type="hidden" name="id" value="<?php echo $id ?>">
    <textarea name="text"  placeholder="Leave Your Comment Here"></textarea><br/>
    <input type="submit" name="submit" value="SEND" >
  </form>
  <form action="category.php">
    <input type="submit"  value="back">
</form>

</body>
