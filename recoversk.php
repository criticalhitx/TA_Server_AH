<?php
require "init.php";
$user_name = $_POST["user_name"];
$user_pass = $_POST["user_pass"];
$public_key = $_POST["public_key"]; // retrieved from server

// Kode di bawah cek apabila secretkey ada
$sql_query = "select publickey from mytableta;";

$result = mysqli_query($con,$sql_query);
if(mysqli_num_rows($result) > 0 )
{
	$found = false;
	while(($row = mysqli_fetch_assoc($result))&&($found==false))
	{
		$realPubKeyServer = $row["publickey"];
		$res = hash('sha256', $realPubKeyServer);
		if ($res==$public_key)
		{
			$found = true;
		}
	}

	if($found==true)
	{
		$sql_push = "UPDATE mytableta SET username='$user_name', password='$user_pass' WHERE publickey='$realPubKeyServer';";
		if(mysqli_query($con,$sql_push))
		{
			echo "Sama";
		}
	}
	else
	{
		echo "Ga Ketemu";
	}

}
else
{
	echo "Beda";
}

?>