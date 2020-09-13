<?php include ('../private/sendEmail.php') ?>

<!DOCTYPE html>
<html lang="en">
<link href="style.css">
<head>
  <meta charset="UTF-8" />
  <meta content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0" name="viewport"th
  />
  <meta content="ie=edge" http-equiv="X-UA-Compatible" />
  <title>LaptopFindr -- Home</title>
  <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css?family=Oleo+Script+Swash+Caps&display=swap" rel="stylesheet" />

  <!-- TinyMCE script tag -->
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
  <script type="text/javascript">
  tinymce.init({
    selector: 'textarea#mytextarea',
    toolbar: true,
    menubar: true,
    placeholder: 'What would you like to tell us?',
    resize: true
});
  </script>

  <link href="styles.css" rel="stylesheet" />
  <link href="menu.css" rel="stylesheet" />
  <link rel="stylesheet" href="contact-us.css">
</head>

<body>
  <div class="menu-wrap" style="z-index: 10;">
    <input type="checkbox" class="toggler" />
      <div class="hamburger"><div></div></div>
      <div class="menu">
        <div>
          <div>
            <ul>
              <li><a href="index.php">Home</a></li>
              <li><a href="login.php">Login</a></li>
              <li><a href="find-a-laptop.php">Find A Laptop</a></li>
              <li><a href="contact-us.php">Contact Us</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <header class="showcase">
      <div class="container showcase-inner">
        <div class="login-wrap">
          <div class="login-html">
  <h2>CONTACT US</h2>
  <form action="contact-us.php" method="post">
      <?php
$Msg = "";
if (isset($_GET['error']))
{
    $Msg = " Please Fill in the Blanks ";
    echo $Msg;
}

if (isset($_GET['success']))
{
    $Msg = " Your Message Has Been Sent ";
    echo $Msg;
}

?>


  <p type="Name:" ><input placeholder="Write your name here.." name="Name"></input></p>
  <p type="Email:" ><input placeholder="Let us know how to contact you back.." name="email"></input></p>
  <p type="Message:">
  <br>
  </p>

    <div style="z-index: -1;"><textarea id="mytextarea" rows="10" cols="50" name="text"></textarea></div>
    <button type="submit" name="submit">Send Message</button>
  </form>
          </div>
        </div>
      </div>
    </header>
  </body>
</html>
