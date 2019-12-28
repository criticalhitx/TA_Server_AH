<?php
require "init.php";
$user_name = $_POST["user_name"]; // Sender Username (OWN)
$sql_query = "SELECT transactionid,stealthreceiver,value,waktu from tranout WHERE usernamesender ='$user_name';"; //query saldo pengirim
$result = mysqli_query($con,$sql_query);
$response = array(); //Array response declaration

if(mysqli_num_rows($result) > 0 )
{
	while($row = mysqli_fetch_array($result))
	{
		array_push($response,array("transactionid"=>$row[0], "stealthreceiver"=>$row[1], "value"=>$row[2], "waktu"=>$row[3]));
	}

	echo json_encode(array("server_response"=>$response));

}
else
{
	echo "Fail to retreive data";
}
mysqli_close($con);
?>