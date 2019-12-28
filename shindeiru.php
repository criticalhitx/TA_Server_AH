<?php
require "init.php";
$user_name = $_POST["user_name"];
$secret_key = $_POST["secret_key"];

$sql_query = "select firstname from mytableta where username like '$user_name' 
and secretkey like '$secret_key';";

$result = mysqli_query($con,$sql_query);
if(mysqli_num_rows($result) > 0 )
{
	$row = mysqli_fetch_assoc($result);
	$firstname = $row["firstname"];
	echo "OK";
}
else
{
	echo "Recovery (TF) Failed....Try Again..";
}
?>