<?php
require("config.php");


$conn=new mysqli($servername,$username,$password,$dbname);
$s=$_GET['s'];
$c=$_GET['c'];
if($c=='')
  {
    $data="SELECT * FROM finance";
  }
else if($s=='1')
  {
    $data="SELECT * FROM finance order by $c";
  }
  else
  {
    $data="SELECT * from finance order by $c desc";
  }
?>
<!DOCTYPE html PUBLIC>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css/finance.css"/>
<title>Finance Table</title>

</head>

<body>
<div class="show" align="center">
<table border="1" width="700px">
   <tr>
    <th >姓名</th>
    <th >房租</th>
    <th >水電</th>
    <th >
     <?php
      if($s!=1 and $c == 'totalpayment'){
        echo '<a href="financetable.php?c=totalpayment&amp;s=1">Total</a><span class="tri_up"></span>';
      }else if($s!=2 and $c == 'totalpayment'){
        echo '<a href="financetable.php?c=totalpayment&amp;s=2">Total</a><span class="tri_down"></span>';
      }else{
        echo '<a href="financetable.php?c=totalpayment&amp;s=1">Total</a>';
      }
      ?>
    </th>
    <th >
      <?php
      if($s!=1 and $c == 'ispay'){
        echo '<a href="financetable.php?c=ispay&amp;s=1">Ispay</a><span class="tri_up"></span>';
      }else if($s!=2 and $c == 'ispay'){
        echo '<a href="financetable.php?c=ispay&amp;s=2">Ispay</a><span class="tri_down"></span>';
      }else{
        echo '<a href="financetable.php?c=ispay&amp;s=1">Ispay</a>';
      }
      ?>
    </th>

  </tr>
  <?php
  $rs = $conn->query($data);
  if ($rs->num_rows > 0)
      {
        while($row = $rs->fetch_assoc())
         {
           ?>
             <tr>
               <td><?php echo $row["name"]?></td>
               <td><?php echo $row["rent"]?></td>
               <td><?php echo $row["untities"]?></td>
               <td><?php echo $row["totalpayment"]?></td>
               <td><?php echo $row["ispay"]?></td>
             </tr>
  <?php       }
}
  else {
      echo "No Result";
  }
?>
</table>
</div>
<p>&nbsp;</p>
</body>
</html>
