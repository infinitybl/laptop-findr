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

else echo "Connected successfully";

//Get variables from POST
$userName = htmlspecialchars($_SESSION['username']);
$model = htmlspecialchars($_POST['model']);

//REMOVE favourite laptops for user in database
$remove_query = $conn->prepare("DELETE FROM favourites WHERE username = ? AND modelid = ?;");
$remove_query->bind_param("ss", $userName, $model);
$remove_query->execute();

?>
