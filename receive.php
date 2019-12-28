<?php
require "init.php";
$user_name = $_POST["user_name"];
$r = $_POST["r"];

$getPub = "select publickey from mytableta where username like '$user_name';";
$result = mysqli_query($con,$getPub);

if(mysqli_num_rows($result) > 0 )
{
	$row = mysqli_fetch_assoc($result);
	$pubKey = $row["publickey"];
	$str = $r.$pubKey; 
	$sthServer  = hash('sha256', $str); //Stealth Address Calculated by Server
	
	$sql_query = "UPDATE mytableta SET stealthkey='$sthServer' WHERE username='$user_name';";
	
	if(mysqli_query($con,$sql_query))
	{
		$sql_query2 = "select username,stealthkey from mytableta where username like '$user_name';";
		$result = mysqli_query($con,$sql_query2);
		if(mysqli_num_rows($result) > 0 )
		{
				echo "Success Updating Stealth Address!";
		}
		else
		{
			echo "Server Error!";
		}

	}
	else
	{
		echo "Connection Failed!";
	}

}
else
{
	echo "Account Not Found";
}


?>