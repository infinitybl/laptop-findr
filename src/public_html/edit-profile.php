<?php include ('../private/editBackend.php') ?>

<!DOCTYPE html>
<html lang="en">


<?php
if (!isset($_SESSION))
{
    session_start();
}
// if(!isset($_SESSION('username'))){
//     header('location: login.php');
// }

?>

<head>
    <meta charset="UTF-8" />
    <meta content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"
        name="viewport" />
    <meta content="ie=edge" http-equiv="X-UA-Compatible" />
    <title>LaptopFindr -- Profile Page</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Oleo+Script+Swash+Caps&display=swap" rel="stylesheet" />

  <!-- our custom CSS files -->

  <link href="styles.css" rel="stylesheet" />
  <link href="menu.css" rel="stylesheet" />
  <link rel="stylesheet" href="find-a-laptop.css">
  <link href="edit-profile.css" rel="stylesheet" />

</head>

<!-- body -->

<body>
    <a id="logout-btn" href="destroySession.php" 
    class="btn">Logout</a>
    <a id="profile-btn" href="edit-profile.php" class="btn"> <?php echo $_SESSION['username'] ?></a>
    <div class="menu-wrap">
        <input type="checkbox" class="toggler" />
        <div class="hamburger">
            <div></div>
        </div>
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
                <div class="login-html rounded">
                   <div id="sc-edprofile">
            <h1>Profile Page</h1>
            <div class="sc-container">
              
              <form action="edit-profile.php" method="post">
              
              <p class="error-text"><?php include ('errors.php') ?></p>
              
              <label for="username">Username:</label>
              <input type="text" placeholder="Your username" id="username" value="<?php echo $_SESSION["username"] ?>" name="username" required />
              
              <!--<p>Email Address:</p>
              <input type="text" placeholder="johndoe123@gmail.com" name="email" value=""/>-->
              
              <label for="password1">New Password:</label>
              <input type="password" placeholder="Type in your new pasword" id="password1" name="password1" value="<?php repopulate('password1') ?>" required />
              
              <label for="password2">Confirm New Password:</label>
              <input type="password" placeholder="Rewrite your new password" id="password2" name="password2" value="<?php repopulate('password2') ?>" required />
              <input type="submit" name="update" value="Update" />
                <input id="form-clear-btn" type="button" name="clear" value="Clear" />
               </form>

            </div>
    <div class="filter-menus">
      <h2 class="favourite-laptops-heading" style="color: grey; text-decoration: underline;">Favourite Laptops</h2>

        <!-- Slider main container -->
        <!-- <div class="created-by-ravi"> -->
        <div class="card-catolog" scrollspy id="swiper-section">
            <!-- Additional required wrapper -->
            <!-- <div class="swiper-wrapper"> -->
            <!-- Slides -->
            <div class="laptop-card-holder rounded"></div>
        
        </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </header>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
    
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>
    
  <script src="edit-profile.js" type="text/javascript"></script>
</body>

</html>

<!--CODE UNDER THIS COMMENT IS FROM BEFORE-->
<!-- 
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0" name="viewport"
  />
  <meta content="ie=edge" http-equiv="X-UA-Compatible" />
  <title>LaptopFindr -- Edit Profile</title>
  <link href="https://fonts.googleapis.com/css?family=Roboto
  display=swap" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css?family=Oleo+Script+Swash+Caps&display=swap" rel="stylesheet" />


  <link href="menu.css" rel="stylesheet" />
   <link href="edit-profile-style.css" rel="stylesheet" />
    
  <meta name="viewport" content="width=divice-width,initial-scale=1.0">
</head>

<body>
    <div class="menu-wrap">
        <input type="checkbox" class="toggler" />
            <div class="hamburger"><div></div></div>
            <div class="menu">
            <div>
          <div>
            <ul>
              <li><a href="index.html">Home</a></li>
              <li><a href="login.html">Login</a></li>
              <li><a href="find-a-laptop.html">Find A Laptop</a></li>
              <li><a href="contact-us.html">Contact Us</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>    
    
    <header class="showcase">

    <div id="sc-edprofile">
  <h1>Edit Your Form</h1>
  <div class="sc-container">
      <p>Username:</p>
    <input type="text" placeholder="JohnDoe123" />
      <p>Email Address:</p>
    <input type="text" placeholder="johndoe123@gmail.com" />
      <p>New Password:</p>
    <input type="password" placeholder="Type in your new pasword" />
      <p>Confirm new password:</p>
    <input type="text" placeholder="Rewrite your new password" />
    <input type="submit" value="Update" />
      <input type="reset" value="Cancel" />
            </div>
        </div>
      
    </header>
</body>

</html> -->
