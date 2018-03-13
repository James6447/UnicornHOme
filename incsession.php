<?php
require('config.php');

// Check for a cookie, if none go to login page
if (!isset($_COOKIE['session_id']))
{
    header('Location: signup.php?refer='. urlencode(getenv('REQUEST_URI')));
}

// Try to find a match in the database
$guid = $_COOKIE['session_id'];
$conn = new mysqli($servername, $username, $password, $dbname);
$sql = "SELECT member_basic FROM Name WHERE guid = '$guid'";
$result = mysql_query($qsql, $con);

if (!mysql_num_rows($result))
{
    // No match for guid
header('Location: login.php?refer='. urlencode(getenv('REQUEST_URI')));
}
?>
