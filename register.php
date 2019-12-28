<?php
require "init.php";

define('TIMEZONE', 'Asia/Jakarta');
date_default_timezone_set(TIMEZONE);

$firstname = $_POST["firstname"];
$lastname = $_POST["lastname"];
$user_name = $_POST["user_name"];
$user_pass = $_POST["user_pass"];
$email = $_POST["email"];
$pubkey = $_POST["p_key"];

/*$firstname = "Saw";
$lastname = "Saw";
$user_name = "Saw";
$user_pass = "Saw";
$email = "Saw";
$pubkey = "abcdefghijklmnopqrstuvwxyzabcdefghijklmnopqrstuvwxyz123456789012";*/


$sql_query = "INSERT INTO MyTableTA (firstname, lastname, username, password, email, publickey, saldo)
VALUES ('$firstname', '$lastname', '$user_name', '$user_pass', '$email', '$pubkey',10.252)";

if(mysqli_query($con,$sql_query))
{
	echo "Berhasil";
}
else
{
	echo "Register Gagal!".mysqli_error($con);
}

?>