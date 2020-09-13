<?php
include 'config.php';

if (!isset($_SESSION))
{
    session_start();
}

$servername = $config['DB_HOST'];
$username = $config['DB_USERNAME'];
$database = $config['DB_DATABASE'];
$passwordD = $config['DB_PASSWORD'];
$errors = array();

// connect to the database
// Create connection
$conn = new mysqli($servername, $username, $passwordD, $database);

// Check connection
if (!$conn)
{
    echo "Not connected";
    // exit("Exiting");
    // die("Connection failed: " . mysqli_connect_error());
    
}

//Get variables from POST
$userName = htmlspecialchars($_SESSION['username']);

//INSERT favourite laptops for user in database
$get_query = $conn->prepare("SELECT * FROM favourites WHERE username = ?;");
$get_query->bind_param("s", $userName);
$get_query->execute();

$result = $get_query->get_result();
//$count = mysql_num_rows($result);
$response = array();
$i = 0;

while ($row = mysqli_fetch_assoc($result))
{
    $response[$i] = $row["modelid"];
    $i++;
}

$response["num"] = $i;

echo json_encode($response);
/*
if ($count >= 1)
{
	echo json_encode($response);
}
else
{
	echo "No favourite laptops";
}
*/
//now echo it as an json object



?>
