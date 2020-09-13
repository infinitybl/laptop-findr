<?php
include 'config.php';

// this will start the session
if(!isset($_SESSION)) { 
	session_start(); 
} 

$servername = $config['DB_HOST'];
$username = $config['DB_USERNAME'];
$database = $config['DB_DATABASE'];
$passwordD = $config['DB_PASSWORD'];
$errors = array();

// connect to the database
// Create connection
$conn = new mysqli($servername, $username,$passwordD, $database);
$select_query=$conn->prepare("SELECT * FROM user WHERE username=? AND password=?");


// Check connection
if (!$conn) {
    exit("Exiting");
    die("Connection failed: " . mysqli_connect_error());
}
else
// checks if the form is submitted
if(isset($_POST['login_user'])){
// checks if the username and password is entered 
if(empty($_POST['username'])){array_push($errors,"Username is required");}
else
if(empty($_POST['password_1'])){array_push($errors,"Password is required");}

// if the username and password are entered that is there is no error
if(count($errors)==0){
    
    // gets the username
    $usernameI=  htmlspecialchars($_POST['username']);
    $usernameI=stripslashes($usernameI);
    $usernameI=strip_tags($usernameI);
        
    // gets the password and encrypt is
    $password_1= htmlspecialchars($_POST['password_1']);
    $password_1=trim($password_1," ");
    $password_1=stripslashes($password_1);
    $password_1=strip_tags($password_1);
    $password_1=md5($password_1);

    // binds the parameters to the prepared statements
    $select_query->bind_param("ss",$usernameI,$password_1);
    
    // this will execute the prepared statement
    if($select_query->execute()){
        
        // this will check for the users' data in the database
        $result= $select_query->get_result();
        $row3 = $result->fetch_assoc();
        $a1=$row3['username'];
        $a2=$row3['email'];

        // if the users data is found then it logs him in
        if(!empty($a1)){
            $_SESSION['username']= htmlspecialchars($_POST['username']);
            $_SESSION['success']="Logged in successfully";
            header('location: find-a-laptop.php');
        }
        else
            array_push($errors,"Wrong username/password. Please try again ");
    }

}
}

 ?>