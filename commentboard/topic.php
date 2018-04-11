<!doctype html>
<header>
<script src="../js/command.js"></script>

</header>
<body id="refresh">
<?php

$id=$_GET['id'];

$p=$_GET['p'];
require('../config.php');
if($p == ''){
  $p=1;
  }
$number=3;//每次要顯示幾筆資料
$start=($p-1)*$number;
$con = new mysqli($servername, $username, $password, $dbname);


$query1 ="SELECT topics.topic_subject, topics.topic_date, topics.topic_id, topics.topic_like, users.name
              FROM topics
              INNER JOIN users
              ON topics.topic_by=users.id
              where topics.topic_cat=$id
              order by topic_date DESC
              limit $start,$number
              ";

$query2 ="SELECT*FROM topics WHERE topic_cat=$id";

$result1 = $con->query($query1);
$result2 = $con->query($query2);
$total=mysqli_num_rows($result2);//總共有幾筆資料
$pages=ceil($total/$number);


if ($result1-> num_rows >0)
      {
        while($row = $result1->fetch_assoc())
         {
          echo '<div class="board" >';
          echo '<h3>'.$row['name'].'&nbsp since &nbsp'.$row['topic_date'].'</h3>';
          echo '<p>'.$row['topic_subject'] .'</p>';
          echo '<tr>';
          echo '<td><a onclick="chnstatus(this)" href="actionlike.php?id='.$row['topic_id'].'">like</a>'.$row['topic_like'].'</td>';
          echo '</tr>';
          echo '</div>';
         }
      }
    ?>

<p align="center">
  <?php
  for($i=1;$i<=$pages;$i++){?>
    <span onclick="getData('topic.php?id=1&p=<?php echo $i ?>');"><?php echo $i?></span>
<?php  }
  ?>
</p>
<p align="center"><?php echo $p?>pages/Total<?php echo $pages?>pages</p>
</body>
