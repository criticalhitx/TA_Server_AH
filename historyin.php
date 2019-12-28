<?php
require "init.php";
$user_name = $_POST["user_name"]; // receiver Username (OWN)
$sql_query = "SELECT transactionid,value,waktu from tranin WHERE username ='$user_name';"; //query saldo pengirim
$result = mysqli_query($con,$sql_query);
$response = array(); //Array response declaration

if(mysqli_num_rows($result) > 0 )
{
	while($row = mysqli_fetch_array($result))
	{
		array_push($response,array("transactionid"=>$row[0], "value"=>$row[1], "waktu"=>$row[2]));
	}

	echo json_encode(array("server_response"=>$response));


}
else
{
	echo "Fail to retreive data";
}
mysqli_close($con);
?>