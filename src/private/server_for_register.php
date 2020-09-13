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
    // exit("Exiting");
    // die("Connection failed: " . mysqli_connect_error());

}

else
// prepares the insert query
$insert_query = $conn->prepare("INSERT INTO user (username,email,password) VALUES(?,?,?);");
// checks if submit button is clicked
if (isset($_POST['Register_user']))
{

    // checks if the username is entered
    if (isset($_POST['username'])) $username =  htmlspecialchars($_POST['username']);

    // checks if the email is entered
    if (isset($_POST['email'])) $email =  htmlspecialchars($_POST['email']);

    // checks if both the passwords are entered
    if (isset($_POST['password_1'])) $password_1 =  htmlspecialchars($_POST['password_1']);

    if (isset($_POST['password_2'])) $password_2 =  htmlspecialchars($_POST['password_2']);

    // form validation
    if (empty($username))
    {
        array_push($errors, "Username is required");
    }
    if (empty($email))
    {
        array_push($errors, "Email is required");
    }
    if (empty($password_1))
    {
        array_push($errors, "Password is required");
    }
    if ($password_1 != $password_2)
    {
        array_push($errors, "Passwords don't match");
    }

    // checks if the user with the same username or email exists
    $result = mysqli_query($conn, "SELECT * FROM user WHERE username='$username' OR email='$email' LIMIT 1;");
    $get_results = mysqli_fetch_assoc($result);

    if ($get_results)
    {
        // checks if the username already exists or not
        if ($get_results['username'] == $username)
        {
            array_push($errors, "Username already exists, use a different username");
            $_SESSION['error'] = 'Username already exists, use a different username <br/>';
        }

        // checks if the email already exists or not
        elseif ($get_results['email'] == $email)
        {
            array_push($errors, "Email already exists, use a different username");
            $_SESSION['error'] = 'Email already in use, use a different email <br/>';
        }
    }
    // if everything's fine and no errors are there
    if (count($errors) == 0)
    {
        // validates the username
        $username = stripslashes($username);
        $username = strip_tags($username);

        // validates the email
        $email = trim($email, " ");
        $email = stripslashes($email);
        $email = strip_tags($email);

        //validates the password
        $password_1 = trim($password_1, " ");
        $password_1 = stripslashes($password_1);
        $password_1 = strip_tags($password_1);

        $password_1 = md5($password_1);

        // binds the parameters to the query
        $insert_query->bind_param("sss", $username, $email, $password_1);

        // executes the query
        if ($insert_query->execute())
        {
            //if everything is fine then take the user to login.php page
            $_SESSION['username'] = $username;
            $_SESSION['success'] = "You are now logged in";

            header('location: find-a-laptop.php');

        }

    }

}
?>
