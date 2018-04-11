<?php
   session_start();
   unset($_SESSION["login"]);
   unset($_SESSION["name"]);
   header('Location:HomePage.php');
?>
