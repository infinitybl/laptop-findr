<?php

if (!isset($_SESSION))
{
    session_start();
}
$name = "";
$email = "";
$text = "";
$subject = "";

if (isset($_POST['submit']))
{
    if (!empty($_POST['Name']))
    {
        if (!empty($_POST['email']))
        {

            $name = test_input($_POST["Name"]);
            if (!preg_match("/^[a-zA-Z ]*$/", $name))
            {
                $nameErr = "Only letters and white space allowed";
                header('location:contact-us.php?error');
            }

            $subject = "Email from Group 1";

            $email = test_input($_POST["email"]);
            if (filter_var($email, FILTER_VALIDATE_EMAIL))
            {
                $emailErr = "Invalid email format";
            }

            $to = "het141200@gmail.com";
            $text = $_POST['text'];
            $text = strip_tags($text);
            $text = str_replace("\n.", "\n..", $text);

            if (mail($to, $subject, $text))
            {
                header('location:contact-us.php?success');
            }

        }
        else
        {
            header('location:contact-us.php?error');
        }
    }
    else
    {
        header('location:contact-us.php?error');
    }

}

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
