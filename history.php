<?php
$link = mysqli_connect("localhost","root");
mysqli_select_db($link,"meme");
mysqli_query($link,"set names utf-8");
$data = mysqli_query($link,"SELECT * FROM history");
$dataarr = array();
while($row = mysqli_fetch_array($data)){
    array_push($dataarr, $row);
}
mysqli_close($link);
echo json_encode($dataarr);
?>