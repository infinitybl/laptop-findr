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

// // Check connection
if (!$conn)
{
    exit("Exiting");
    die("Connection failed: " . mysqli_connect_error());
}

else

if (isset($_POST['update']))
{

    if (empty($_POST['username']))
    {
        array_push($errors, "Username is required");
    }
    else

    if (empty($_POST['password1']) || empty($_POST['password1']))
    {
        array_push($errors, "Password is required");
    }
    elseif ($_POST['password1'] != $_POST['password2'])
    {
        array_push($errors, "Passwords don't match");
    }
    $username =  htmlspecialchars($_POST['username']);

    $result = mysqli_query($conn, "SELECT * FROM user WHERE username='$username' LIMIT 1");
    if (!mysqli_num_rows($result))
    {
        array_push($errors, "No user found");
    }

    if (!count($errors))
    {

        $rows = mysqli_num_rows($result);
        $usernameI = htmlspecialchars($_POST['username']);
        $pass1 =  htmlspecialchars($_POST['password1']);
        $pass1 = md5($pass1);
        $emailI =  htmlspecialchars($_POST['email']);

        if ($rows == 1)
        {
            $update_query = $conn->prepare("UPDATE user SET password = ? WHERE username = ?");
            $update_query->bind_param("ss", $pass1, $usernameI);
            $update_query->execute();
            session_destroy();
            header('location: login.php');
        }
    }
}

?>
