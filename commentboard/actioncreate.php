<?php
require('../config.php');
$con = new mysqli($servername, $username, $password, $dbname);

$cat_name = $_POST['cat_name'];
$description = $_POST['cat_description'];

//the form has been posted, so save it
$query = "INSERT INTO categories (cat_name, cat_description)
          VALUES('$cat_name','$description')";
$result=$con->query($query);
if(!$result)
  {
        //something went wrong, display the error
    echo "Error:" . $query . '<br/>' . $con->error;
  }
    else
    {
        echo 'New category successfully added.';
    }
?>
