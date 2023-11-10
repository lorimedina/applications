<?php 
$contentID = $_GET['contentid'];

$db_server = "localhost";
$db_user = "root";
$db_password = "";
$db_name = "applogin";
$db_port = "3333";
$con = "";
$conn = mysqli_connect($db_server,$db_user,$db_password,$db_name,$db_port); 
$sql = "DELETE FROM USERCONTENT WHERE CONTENTID = $contentID";
$results=mysqli_query($conn,$sql);
header("Location: http://localhost/application/Home.php");
exit();






?>
