<?php
$namember=$_POST['name'];
$roomnum=$_POST['room'];
?>

<!doctype html>
<body>
<?php
if($_POST['name'] & $_POST['room']){
  echo $_POST['name'];
  echo $_POST['room'];}
  else {
    echo "Nothing";
  }
?>
</body>
