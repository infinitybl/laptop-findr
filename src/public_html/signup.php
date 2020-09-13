<?php include ('../private/server_for_register.php') ?>

<!DOCTYPE html>
  <html lang="en">
    <head>
      <meta charset="UTF-8" />
      <meta
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"
        name="viewport"
      />
      <meta content="ie=edge" http-equiv="X-UA-Compatible" />
      <title>LaptopFindr -- Sign Up</title>
      <link
        href="https://fonts.googleapis.com/css?family=Roboto&display=swap"
        rel="stylesheet"
      />
      <link
        href="https://fonts.googleapis.com/css?family=Oleo+Script+Swash+Caps&display=swap"
        rel="stylesheet"
      />

      <link href="styles.css" rel="stylesheet" />
      <link href="menu.css" rel="stylesheet" />
      <link rel="stylesheet" href="login.css">
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
              <!-- <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Sign In</label> -->
              <input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">Sign Up</label>
              <div class="login-form">
              <!-- <div class="sign-in-htm">
                  <div class="group">
                    <label for="user" class="label">Username</label>
                    <input id="user" type="text" class="input" required>
                  </div>
                  <div class="group">
                    <label for="pass" class="label">Password</label>
                    <input id="pass" type="password" class="input" data-type="password" required>
                  </div>
                  <div class="group">
                    <input id="check" type="checkbox" class="check" checked>
                    <label for="check"><span class="icon"></span> Keep me Signed in</label>
                  </div>
                  <div class="group">
                    <input type="submit" class="button" value="Sign In">
                  </div>
                  <div class="hr"></div>
                  <div class="foot-lnk">
                    <a href="#forgot">Forgot Password?</a>
                  </div>
                </div> -->
                <div class="sign-up-html">

                  <form action="signup.php" method="post">
                  <?php include ('errors.php') ?>

                  <div class="group">
                    <label for="user" class="label">Username</label>
                    <input id="user" type="text" name="username" class="input" value="<?php repopulate('username') ?>" required>
                  </div>
                  <div class="group">
                    <label for="pass" class="label">Password</label>
                    <input id="pass1" type="password" name="password_1" class="input" data-type="password" value="<?php repopulate('password_1') ?>" required>
                  </div>
                  <div class="group">
                    <label for="pass" class="label">Repeat Password</label>
                    <input id="pass2" type="password" name="password_2" class="input" data-type="password" value="<?php repopulate('password_2') ?>" required>
                  </div>
                  <div class="group">
                    <label for="pass" class="label">Email Address</label>
                    <input id="pass3" type="text" name="email" class="input" value="<?php repopulate('email') ?>" required>
                  </div>
                  <div class="group">
                    <input type="submit" class="button" name="Register_user" value="Sign Up">
                  </div>
                  <div class="hr"></div>
                  <div class="foot-lnk">
                    <a href="login.php">Already Member? Sign In</a>
                  </div>           
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </header>
    </body>
  </html>
