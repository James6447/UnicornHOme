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
<title>Finance Table</title>
<link rel="stylesheet" href="css/member.css">
</head>

<body>

<section>
  <h1>FINANCE INFOM</h1>

<div class="tbl-header">
<table cellpadding="0" cellspacing="0" border="0">
  <thead>
   <tr>
    <td >姓名</td>
    <td >房租</td>
    <td >水電</td>
    <td >
     <?php
      if($s!=1 and $c == 'totalpayment'){
        echo '<a href="financetable.php?c=totalpayment&amp;s=1">Total</a><span class="tri_up"></span>';
      }else if($s!=2 and $c == 'totalpayment'){
        echo '<a href="financetable.php?c=totalpayment&amp;s=2">Total</a><span class="tri_down"></span>';
      }else{
        echo '<a href="financetable.php?c=totalpayment&amp;s=1">Total</a>';
      }
      ?>
    </td>
    <td >
      <?php
      if($s!=1 and $c == 'ispay'){
        echo '<a  href="financetable.php?c=ispay&amp;s=1">Ispay</a><span class="tri_up"></span>';
      }else if($s!=2 and $c == 'ispay'){
        echo '<a href="financetable.php?c=ispay&amp;s=2">Ispay</a><span class="tri_down"></span>';
      }else{
        echo '<a href="financetable.php?c=ispay&amp;s=1">Ispay</a>';
      }
      ?>
    </td>

  </tr>
</thead>
</table>
</div>
<div class="tbl-content">
  <table cellpadding="0" cellspacing="0" border="0">
    <thead>
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
    </thead>
  </table>
</div>
</section>

</body>

<footer>
<div class="made-with-love">
<a href='HomePage.php'><img src='../photo/logo.png' width="30" height="30" ></a>
  Made with
  <i>♥</i> by
  <a target="_blank" href="https://www.facebook.com/liewyeejames">JamesLiew</a>
  <p>CopyRight:&copy; 2018 UNICORN COMPANY All Right Reserved.</p>
</div>
</footer>

</html>
