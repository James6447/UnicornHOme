<!doctype html>
<header>

</header>
<body>
<?php
require('../config.php');
$con = new mysqli($servername, $username, $password, $dbname);
mysqli_set_charset($con,'utf8');
?>
<a href="create.php">New Category</a>
<table width="600" border="1.5"   border-color="rgba(255,255,255,0.3)">
<tr>
  <td>Category</td>
  <td>Last Topic</td>
</tr>
  <?php
  $query = "SELECT categories.cat_name,categories.cat_description,categories.cat_date,topics.topic_id,topics.topic_cat,categories.cat_id
            From topics
            INNER JOIN categories
            ON categories.cat_id=topics.topic_cat
            WHERE cat_id = $i
            ORDER BY topic_id DESC";

  $result = $con->query($query);
  //show comment board
  if ($result-> num_rows >0)
      {

          while($row = $result->fetch_assoc())
           {
             do {?>
               <tr>
                 <td><h3><a href="category_info.php?id=<?php echo $row["cat_id"] ?>"><?php echo $row["cat_name"]?></a></h3>
                   <?php echo $row["cat_description"]?><br/>
                   <small><?php echo $row["cat_date"] ?></small>
                  </td>
              <?php
            } while ( $row['cat_id'] != $row['cat_id'-1]);
             {?>
               <td><a href="topic.php?id=<?php echo $row["cat_id"].'">'.echo $row['']   </a></td>
             </tr>

  <?php
        }
      }
    }
  ?>
  </table>
</body>
