 <?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "myDB";


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$date = date("Y-m-d H:i:s");
// sql to create table
$sql = "CREATE TABLE tranout (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  transactionid VARCHAR(8) NOT NULL,
  stealthreceiver VARCHAR(64) NOT NULL,
  username VARCHAR(13) NOT NULL,
  value FLOAT(8, 4),
  waktu VARCHAR(30) NOT NULL
)
";

if ($conn->query($sql) === TRUE) {
    echo "Table created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
?> 