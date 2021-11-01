<?php
$Value = $_COOKIE["User"];
setcookie("User", $Value , time()-3600);
echo "Reset success";
header("Location:Start.php");
?>