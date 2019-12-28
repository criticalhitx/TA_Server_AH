<?php
define('TIMEZONE', 'Asia/Jakarta');
date_default_timezone_set(TIMEZONE);

require "init.php";
$user_name = $_POST["user_name"];
$stealth_key =$_POST["stealth_key"];
$transfer = $_POST["transfer"];
$sql_query = "SELECT saldo from mytableta WHERE username ='$user_name';"; //query saldo pengirim
$result = mysqli_query($con,$sql_query);

if(mysqli_num_rows($result) > 0 )
{
	$row = mysqli_fetch_assoc($result);
	$saldoLamaSender = $row["saldo"];
	$saldoBaruSender = (float)$saldoLamaSender - (float)$transfer;
	// Push saldo pengirim
	$sql_push = " UPDATE mytableta SET saldo=$saldoBaruSender WHERE username='$user_name';";
		if(mysqli_query($con,$sql_push)) // cek push saldo pengirim berhasil atau tidak
		{	
			$sql_query2 = "SELECT saldo,username from mytableta WHERE stealthkey ='$stealth_key';";//query saldo penerima
			$result2 = mysqli_query($con,$sql_query2);
			if(mysqli_num_rows($result2) > 0 )
			{
				$row2 = mysqli_fetch_assoc($result2);
				$usernamePenerima = $row2["username"];
				$saldoLamaPenerima = $row2["saldo"];
				$saldoBaruPenerima = (float)$saldoLamaPenerima + (float)$transfer;
				$sql_push2 = "UPDATE mytableta SET saldo=$saldoBaruPenerima WHERE stealthkey='$stealth_key';"; // Update saldo penerima
					if(mysqli_query($con,$sql_push2))
					{
						echo "Pengiriman Berhasil!!";
						$randNum = rand(1,99999999);
						$ID = strval($randNum);
						$date = date("Y-m-d H:i:s");
						$sql_push3 = "INSERT INTO tranout (transactionid, usernamesender, stealthreceiver, value, waktu) VALUES ('$ID', '$user_name', '$stealth_key', '$transfer', '$date')"; //Update transaksi out
						if(mysqli_query($con,$sql_push3))
						{
							echo "Update to tranOut Berhasil";
							$sql_push4 = "INSERT INTO tranin (transactionid, username, value, waktu) VALUES ('$ID', '$usernamePenerima', '$transfer', '$date')";//update transaksi in
							if(mysqli_query($con,$sql_push4))
							{
								echo "Update tranIn Berhasil!";
							}
							else
							{
								echo "Update In Fail";
							}
						}
						else
						{
							echo "Update In Gagal!".mysqli_error($con);
						}
					}
					else
					{
						echo "Data Insertion Penerima Error .. ".mysqli_error($con);
					}
				
			}
			else
			{
				echo "Address Not Found";
			}
		}
		else
		{
			echo "Data Insertion Pengirim Error .. ".mysqli_error($con);
		}
	
}
else
{
	echo "Try Again..".mysqli_connect_error();;
}

?>