<?php
   if(!isset($_SESSION)) { 
    session_start(); 
   } 
   
   if(!isset($_SESSION['username'])){
       header('location: login.php');
   }
   ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- bootstrap css -->
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
         integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
      <!-- links for slider -->
      <!-- <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
         <link rel="stylesheet" href="/resources/demos/style.css">
         <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
         <script src="https://code.jquery.com/i/1.12.1/jquery-ui.js"></script>
          -->
      <!-- for the search bar -->
      <script src="https://kit.fontawesome.com/b0d2d0e28d.js" crossorigin="anonymous"></script>
      <!-- 
         <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
             integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"> -->
      <!-- <link rel="stylesheet" href="https://unpkg.com/swiper/css/swiper.css">
         <link rel="stylesheet" href="https://unpkg.com/swiper/css/swiper.min.css">
         
         <script src="https://unpkg.com/swiper/js/swiper.js"></script>
         <script src="https://unpkg.com/swiper/js/swiper.min.js"></script>
         
         <link rel="stylesheet" href="path/to/swiper.min.css"> -->
      <!-- started here -->
      <!-- <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
         <link rel="stylesheet" href="/resources/demos/style.css">
         <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
         <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> -->
      <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
         <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
         <script src="https://kit.fontawesome.com/b0d2d0e28d.js" crossorigin="anonymous"></script> -->
      <!-- <a href="#" class="btn btn-info btn-lg">
         <span class="glyphicon glyphicon-user"  style="position: static;">   </span>  
         </a> -->
      <meta charset="UTF-8" />
      <meta content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"
         name="viewport" />
      <meta content="ie=edge" http-equiv="X-UA-Compatible" />
      <title>LaptopFindr -- Find a Laptop</title>
      <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet" />
      <link href="https://fonts.googleapis.com/css?family=Oleo+Script+Swash+Caps&display=swap" rel="stylesheet" />
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
      <!-- our custom CSS files -->
      <link href="styles.css" rel="stylesheet" />
      <link href="menu.css" rel="stylesheet" />
      <link rel="stylesheet" href="find-a-laptop.css" />
      <!-- materialize css -->
      <!-- Compiled and minified CSS -->
      <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css"> -->
   </head>
   <!-- body -->
   <body>
      <a id="logout-btn" href="destroySession.php" class="btn">Logout</a>
      <a id="profile-btn" href="edit-profile.php" class="btn"> <?php echo $_SESSION['username']?></a>
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
               <div class="container my-5 z-depth-1">
                  <!--Section: Content-->
                  <section class="dark-grey-text">
                     <div class="row pr-lg-5">
                        <div class="col-md-7 mb-4">
                           <div class="view">
                              <img src="https://mdbootstrap.com/img/Photos/Others/project4.jpg"
                                 class="img-fluid animated bounceInLeft" alt="Sample project image" />
                           </div>
                        </div>
                        <div class="col-md-5 d-flex align-items-center animated bounceInRight">
                           <div class="greeting-text">
                              <!-- PHP code for later -->
                              <!-- <?php if(isset($_SESSION['username'])):?>
                                 <h3>Welcome <strong><?php echo $_SESSION['username'];?></strong></h3>
                                 
                                 <?php endif ?> -->
                              <h3 class="font-weight-bold mb-4">Welcome to LaptopFindr</h3>
                              <p>Here at LaptopFindr, we scower the web to find you ideal laptops. Use the
                                 search bar
                                 below to get started!
                              </p>
                              <!-- <input class="form-control mr-sm-2 laptop-search-bar" type="search"
                                 placeholder="Search by keyword(s) here..." aria-label="Search">-->
                              <!-- <br /> -->
                           </div>
                           <div class="search-box">
                              <input class="form-contro l mr-sm-2 search-txt laptop-search-bar" type="search"
                                 placeholder="Ex. Acer, Dell" aria-label="Search">
                              <a class="search-btn laptop-search-btn" href="#swiper-section">
                              <i class="fas fa-search"></i>
                              </a>
                           </div>
                        </div>
                     </div>
                  </section>
               </div>
               <div class="lower-div">
                  <div class="options">
                     <div class="list-group">
                        <h5>Display Size (Inches)</h5>
                        <input type="text" class="dsize-range-slider" id="amount" readonly
                           style="border:0; color:white; font-weight:bold; background-color:transparent;">
                        </input>
                        <div id="slider-range"></div>
                     </div>
                     <br />
                     <!-- <div class="list-group">
                        <h5 class="brand-dropdown-text">Minimum Storage (GB)</h5>
                        <div class="btn-group brand-dropdown">
                            <button type="button" class="btn btn-secondary dropdown-toggle"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Minimum Storage (GB)
                            </button>
                            <div class="dropdown-menu dropdown-menu-right">
                                <button class="dropdown-item" type="button">100 GB</button>
                                <button class="dropdown-item" type="button">300GB</button>
                                <button class="dropdown-item" type="button">500GB</button>
                                <button class="dropdown-item" type="button">1000 GB</button>
                                <button class="dropdown-item" type="button">2000 GB</button>
                            </div>
                        </div>
                        </div>
                        
                        <div class="list-group">
                        <h5 class="ram-dropdown-text">RAM</h5>
                        <div class="btn-group">
                            <button type="button" class="btn btn-secondary dropdown-toggle"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                RAM
                            </button>
                            <div class="dropdown-menu dropdown-menu-right">
                                <button class="dropdown-item" type="button">2GB</button>
                                <button class="dropdown-item" type="button">4GB</button>
                                <button class="dropdown-item" type="button">6GB</button>
                                <button class="dropdown-item" type="button">8GB</button>
                                <button class="dropdown-item" type="button">12GB</button>
                                <button class="dropdown-item" type="button">16GB</button>
                                <button class="dropdown-item" type="button">24GB</button>
                                <button class="dropdown-item" type="button">32GB</button>
                            </div>
                        </div>
                        </div> -->
                     <!--<div class="list-group">
                        <h5>Min Battery Life</h5>
                        <div class="btn-group">
                            <button type="button" class="btn btn-secondary dropdown-toggle"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                HDD
                            </button>
                            <div class="dropdown-menu dropdown-menu-right">
                                <button class="dropdown-item" type="button">2GB</button>
                        
                            </div>
                        </div>-->
                     <div class="input-group mb-3">
                        <div class="input-group-prepend">
                           <label class="input-group-text" for="inputGroupSelect01">Processor</label>
                        </div>
                        <select class="custom-select" id="cpuInputGroupSelect">
                           <option selected>Choose...</option>
                           <option value="1">Intel</option>
                           <option value="2">Intel i3</option>
                           <option value="3">Intel i5</option>
                           <option value="4">Intel i7</option>
                           <option value="5">AMD</option>
                           <option value="6">AMD Ryzen 3</option>
                           <option value="7">AMD Ryzen 5</option>
                           <option value="8">AMD Ryzen 7</option>
                        </select>
                     </div>
                     <div class="input-group mb-3">
                        <div class="input-group-prepend">
                           <label class="input-group-text" for="inputGroupSelect01">Display</label>
                        </div>
                        <select class="custom-select" id="dTypeInputGroupSelect">
                           <option selected>Choose...</option>
                           <option value="1">IPS</option>
                           <option value="2">TN</option>
                           <option value="3">OLED</option>
                        </select>
                     </div>
                     <div class="input-group mb-3">
                        <div class="input-group-prepend">
                           <label class="input-group-text" for="inputGroupSelect01">Graphics</label>
                        </div>
                        <select class="custom-select" id="gpuInputGroupSelect">
                           <option selected>Choose...</option>
                           <option value="1">Intel</option>
                           <option value="2">Nvidia</option>
                           <option value="3">ATI</option>
                        </select>
                     </div>
                     <div class="input-group mb-3">
                        <div class="input-group-prepend">
                           <label class="input-group-text" for="inputGroupSelect01">Operating System</label>
                        </div>
                        <select class="custom-select" id="osInputGroupSelect">
                           <option selected>Choose...</option>
                           <option value="1">Windows</option>
                           <option value="2">Mac OS</option>
                           <option value="3">Linux</option>
                        </select>
                     </div>
                     <div class="input-group mb-3">
                        <div class="input-group-prepend">
                           <label class="input-group-text" for="inputGroupSelect01">Minimum RAM(GB)</label>
                        </div>
                        <select class="custom-select" id="minRamInputGroupSelect">
                           <option selected>Choose...</option>
                           <option value="1">4</option>
                           <option value="2">6</option>
                           <option value="3">8</option>
                           <option value="4">12</option>
                           <option value="5">16</option>
                           <option value="6">20</option>
                           <option value="7">24</option>
                           <option value="8">32</option>
                        </select>
                     </div>
                     <div class="input-group mb-3">
                        <div class="input-group-prepend">
                           <label class="input-group-text" for="inputGroupSelect01">Minimum Disk
                           Space(GB)</label>
                        </div>
                        <select class="custom-select" id="minHDDInputGroupSelect">
                           <option selected>Choose...</option>
                           <option value="1">120</option>
                           <option value="2">240</option>
                           <option value="3">320</option>
                           <option value="4">500</option>
                           <option value="5">1000</option>
                        </select>
                     </div>
                     <div class="input-group mb-3">
                        <div class="input-group-prepend">
                           <label class="input-group-text" for="inputGroupSelect01">Storage Type</label>
                        </div>
                        <select class="custom-select" id="sTypeInputGroupSelect">
                           <option selected>Choose...</option>
                           <option value="1">SSD</option>
                           <option value="2">HDD</option>
                           <option value="3">SSHD</option>
                           <option value="4">EMMC</option>
                        </select>
                     </div>
                  </div>
                  <!--Section: Content-->
                  <!-- <nav class="navbar navbar-dark bg-dark justify-content-between rounded">
                     <a class="navbar-brand font-weight-bold font-italic">Welcome to LaptopFindr</a>
                     <form class="form-inline">
                       <input class="form-control mr-sm-2" type="search" placeholder="Search by keyword(s) here..." aria-label="Search">
                       <button class="btn btn-sm btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                     </form>
                     </nav>
                     <br/>
                     <div class="message-to-user">
                     <h4>Filter through the best laptops using the search bar above! Any pique your interest? Save it!</h4>
                     </div> -->
                  <br />
                  <!-- Slider main container -->
                  <!-- <div class="created-by-ravi"> -->
                  <div class="card-catolog scrollspy" id="swiper-section">
                     <!-- Additional required wrapper -->
                     <!-- <div class="swiper-wrapper"> -->
                     <!-- Slides -->
                     <div class="laptop-card-holder rounded">
                        <!--<div class="card border-light mb-3" style="width: 18rem;">
                           <img src="https://noteb.com/res/img/models/949_2.jpg" class="card-img-top laptop-picture" alt="...">
                           <div class="card-body">
                               <h5 class="card-title">Brand</h5>
                               <p class="card-text">Brand Item</p>
                           </div>
                           <ul class="list-group list-group-flush text-dark">
                               <li class="list-group-item text-dark">Brand</li>
                               <li class="list-group-item text-dark">RAM</li>
                               <li class="list-group-item text-dark">Disk</li>
                               <li class="list-group-item text-dark">Screen</li>
                               <li class="list-group-item text-dark">Processor</li>
                               <li class="list-group-item text-dark">OS</li>
                               <li class="list-group-item text-dark">Video Card</li>
                               <li class="list-group-item text-dark">Battery</li>
                           
                           </ul>
                           <div class="card-body text-dark">
                               <a href="#" modelID= "503" class="btn add-favourite-btn">Add to Favourites</a>
                           </div>
                           </div>
                           </div> -->
                        <!-- </div> -->
                        <!-- If we need pagination
                           <div class="swiper-pagination"></div> -->
                        <!-- If we need navigation buttons -->
                        <!-- <div class="swiper-button-prev"></div>
                           <div class="swiper-button-next"></div>
                           
                            If we need scrollbar
                           <div class="swiper-scrollbar"></div> -->
                     </div>
                     <!-- </div> -->
                     <br />
                     <!-- <div class="laptop-card">
                        <img class="laptop-picture" src="#" width="200" height="180">
                        <h3 class="laptop-name">name</h3>
                        <h3 class="laptop-price">price</h3>
                        <h3 class="laptop-ram">RAM</h3>
                        <h3 class="laptop-disk">disk</h3>
                        <h3 class="laptop-screen">screen</h3>
                        <h3 class="laptop-processor">processor</h3>
                        <h3 class="laptop-os">os</h3>
                        <h3 class="laptop-video-card">video card</h3>
                        <h3 class="laptop-battery-life">battery-life</h3>
                        
                        </div> -->
                  </div>
               </div>
            </div>
         </div>
      </header>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
      <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
      <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
      <!-- bootstrap js scripts -->
      <!-- <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
         integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
         crossorigin="anonymous"></script> -->
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
         integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
         crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
         integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
         crossorigin="anonymous"></script>
      <script src="find-a-laptop.js" type="text/javascript"></script>
      <!-- Compiled and minified JavaScript for materialize-->
      <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
         <script>
             $(document).ready(function () {
                 $('.scrollspy').scrollSpy();
             });
         </script> -->
   </body>
</html>