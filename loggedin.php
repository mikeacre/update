<?
session_start();
error_reporting(E_ALL);
$servername = 'localhost';
$username = 'sparksql';
$password = 'Strike4Spark1@';
$dbname = 'sparkdb1';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

if($_GET['query']=="checkuser")
{	
	$checkid = $_GET['id'];
	$sql = "SELECT * FROM user_info WHERE facebook_id='".$checkid."'";
	$result = $conn->query($sql) or  die(mysql_error());
	$doesexist = $result->fetch_assoc();
	if(!$doesexist)
		echo 'false';
	else
		echo 'true';	
}
elseif($_GET['query']=="createuser")
{
		
	$sql = "INSERT INTO user_info (facebook_id, first_name, last_name, email) VALUES ('".$_GET[id]."','".$_GET[firstname]."','".$_GET[lastname]."','".$_GET[email]."')";
	if ($conn->query($sql) === TRUE) {
		echo "true";
	} else {
		echo "false";
	}

}
elseif($_GET['query']=="deleteuser")
{
	$sql = "DELETE FROM user_info WHERE facebook_id='".$_SESSION['facebook_id']."'";
	if ($conn->query($sql) === TRUE) {
		echo "true";
	} else {
		echo "false";
	}
}

$conn->close();
?>