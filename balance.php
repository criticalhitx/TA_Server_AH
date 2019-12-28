<?php
require "init.php";
// Masi pake saldo orang lain. jgn lupa diubah dari android.
$user_name = $_POST["user_name"];
$sql_query = "select saldo from mytableta WHERE username ='$user_name';";

$result = mysqli_query($con,$sql_query);

if(mysqli_num_rows($result) > 0 )
{
	$row = mysqli_fetch_assoc($result);
	$saldoku = $row["saldo"];
	echo $saldoku;
}
else
{
	echo "Try Again..".mysqli_connect_error();;
}

?>