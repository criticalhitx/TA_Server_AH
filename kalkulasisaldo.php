<?php
require "init.php";
$user_name = "po";
$total_saldo = 0;

$sql_query = "select firstname,saldo from mytableta where username like '$user_name';";

if ($result = $con->query($sql_query)) {

    /* fetch associative array */
    while ($row = $result->fetch_assoc()) {
        printf ("%s (%s)<br>", $row["firstname"], $row["saldo"]);
		$total_saldo += $row["saldo"];
    }
	echo "Total Saldo adalah = 失礼します ".$total_saldo;

    /* free result set */
    $result->free();
}
?>