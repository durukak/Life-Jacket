<!DOCTYPE html>
<html lang="en">
   <!-- Basic -->
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <!-- Mobile Metas -->
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <!-- Site Metas -->
   <title>LIFEJACKET</title>
   <meta name="keywords" content="">
   <meta name="description" content="">
   <meta name="author" content="">
   <!-- site icon -->
   <link rel="icon" href="images/fevicon.png" type="image/png" />
   <!-- Bootstrap core CSS -->
   <link href="css/bootstrap.css" rel="stylesheet">
   <!-- FontAwesome Icons core CSS -->
   <link href="css/font-awesome.min.css" rel="stylesheet">
   <!-- Custom animate styles for this template -->
   <link href="css/animate.css" rel="stylesheet">
   <!-- Custom styles for this template -->
   <link href="style.css" rel="stylesheet">
   <!-- Responsive styles for this template -->
   <link href="css/responsive.css" rel="stylesheet">
   <!-- Colors for this template -->
   <link href="css/colors.css" rel="stylesheet">
   <!-- light box gallery -->
   <link href="css/ekko-lightbox.css" rel="stylesheet">

   </head>
   <body id="home_page" class="home_page">
      <?php
header("Content-Type: text/html; charset=UTF-8");
session_start();
?>
<?php
if ((! isset($_SESSION['username'])) && (! isset($_SESSION['name'])) && (! isset($_SESSION['phone']))) {
    ?>
      <!-- header -->
      <header class="header">

        <div class="header_top_section">
           <div class="container">
              <div class="row">
               <div class="col-lg-3">
                  <div class="full">
                     <div class="logo">
                        <a href="lifejacket.php"><img src="images/logo.png" alt="#" /></a>
                     </div>
                  </div>
               </div>
               <div class="col-lg-9 site_information">
                  <div class="full">
                     <div class="main_menu">
                        <nav class="navbar navbar-inverse navbar-toggleable-md">
                           <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#cloapediamenu" aria-controls="cloapediamenu" aria-expanded="false" aria-label="Toggle navigation">
                           <span class="float-left">Menu</span>
                           <span class="float-right"><i class="fa fa-bars"></i> <i class="fa fa-close"></i></span>
                           </button>
                           <div class="collapse navbar-collapse justify-content-md-center" id="cloapediamenu">
                              <ul class="navbar-nav">
                                 <li class="nav-item active">
                                    <a class="nav-link" href="lifejacket.php">HOME</a>
                                 </li>
                                 <li class="nav-item">
                                    <a class="nav-link color-aqua-hover" href="#">ABOUT</a>
                                 </li>
                                 <li class="nav-item">
                                    <a class="nav-link color-aqua-hover" href="trips.php">TRIP</a>
                                 </li>
                                 <li class="nav-item">
                                    <a class="nav-link color-grey-hover" href="search.php">MEMBER</a>
                                 </li>
                                 <li class="nav-item">
                                    <a class="nav-link color-grey-hover" href="mypage.html">MYPAGE</a>
                                 </li>
                                 <li class="nav-item">
                                    <a class="nav-link color-grey-hover" href="login.html">LOGIN</a>
                                 </li>
                              </ul>
                           </div>
                        </nav>
                     </div>
                  </div>
               </div>
            </div>
           </div>
        </div>

      </header>
       <?php } else {?>
        <!-- header -->
      <header class="header">

<div class="header_top_section">
   <div class="container">
      <div class="row">
       <div class="col-lg-3">
          <div class="full">
             <div class="logo">
                <a href="lifejacket.php"><img src="images/logo.png" alt="#" /></a>
             </div>
          </div>
       </div>
       <div class="col-lg-9 site_information">
          <div class="full">
             <div class="main_menu">
                <nav class="navbar navbar-inverse navbar-toggleable-md">
                   <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#cloapediamenu" aria-controls="cloapediamenu" aria-expanded="false" aria-label="Toggle navigation">
                   <span class="float-left">Menu</span>
                   <span class="float-right"><i class="fa fa-bars"></i> <i class="fa fa-close"></i></span>
                   </button>
                   <div class="collapse navbar-collapse justify-content-md-center" id="cloapediamenu">
                      <ul class="navbar-nav">
                         <li class="nav-item active">
                            <a class="nav-link" href="lifejacket.php">LIFEJACKET</a>
                         </li>
                         <li class="nav-item">
                            <a class="nav-link color-aqua-hover" href="#">ABOUT</a>
                         </li>
                         <li class="nav-item">
                            <a class="nav-link color-aqua-hover" href="trips.php">TRIP</a>
                         </li>
                         <li class="nav-item">
                            <a class="nav-link color-grey-hover" href="search.php">MEMBER</a>
                         </li>
                         <li class="nav-item">
                            <a class="nav-link color-grey-hover" href="mypage.html">MYPAGE</a>
                         </li>
                         <li class="nav-item">
                            <a class="nav-link color-grey-hover" href="logout.php">LOGOUT</a>
                         </li>
                      </ul>
                   </div>
                </nav>
             </div>
          </div>
       </div>
    </div>
   </div>
</div>

</header>
<?php } ?> 
      <!-- end header -->
      
      <!-- section -->
      <section class="main_full banner_section_top">
        <div class="container-fluid">
          <div class="row">
             <div class="full">
                  <div class="slider_banner">
                    <img class="img-responsive" src="images/slider_img.jpg" alt="#" />
                      <div class="slide_cont">
                        <div class="slider_cont_inner">
                        
                        
                        </div>
                      </div>
                  </div>
                </div>
          </div>
        </div>
      </section>
      <!-- end section -->
    


      <!-- section -->
      <section class="layout_padding section">
         <div class="container">
            <div class="row">
               <div class="col-lg-12 text_align_center">
                  <div class="full heading_s1">
                     <h2>ABOUT</h2>
                  </div>
                  <div class="full">
                     <p class="large">LIFE JACKET is an NGO that aims to help people who are facing crises arising  from natural disasters such as flood and earthquakes</p>
                  </div>
               </div>
            </div>
            <div class="row">

              <div class="col-md-4 text_align_center">
                 <div class="cours">
                   <img class="img-responsive" src="images/cour1.jpg" alt="#" />
                 </div>
                 <h3>Goal</h3>
                 <p>The LIFE JACKET is a way to help CRS continue to contribute to society. Allow users to communicate each other and provide management system for each trip</p>
              </div>  

              <div class="col-md-4 text_align_center">
                 <div class="cours">
                   <img class="img-responsive" src="images/cour2.jpg" alt="#" />
                 </div>
                 <h3>Philosophy</h3>
                 <p>We believe that the local communities in Asia know best what their most pressing needs are and how to address them.</p>
              </div> 

              <div class="col-md-4 text_align_center">
                 <div class="cours">
                   <img class="img-responsive" src="images/cour3.jpg" alt="#" />
                 </div>
                 <h3>Contact</h3>
                 <p>durukak123@gmail.com<br><br>No. 15, Jalan Sri Semantan 1, Off, Jalan Semantan, Bukit Damansara, 50490 Kuala Lumpur, Malaysia</p>
              </div> 

            </div>

         </div>
      </section>
      <!-- end section -->




    
      <!-- section -->
      <section class="section blue_pattern_bg" style="background-color: #3b3bff;">
         <div class="container">
            <div class="row">
               <div class="col-md-6">
                  <div class="full">
                     <h4>Subscribe Now to Our Newsletter !</h4>
                     <p>Subscribe to our newsletter to keep up-to-date on all things, from our latest projects to our new big ideas.</p>
                  </div>
               </div>
               <div class="col-md-6">
                 <div class="form_subribe">
                    <form>
                       <input type="email" name="email" placeholder="Enter Your Email" />
                       <button>Subscribe</button>
                    </form>
                 </div>
               </div>
            </div>
         </div>
      </section>
      <!-- end section -->
      <!-- Core JavaScript
         ================================================== -->
      <script src="js/jquery.min.js"></script>
      <script src="js/tether.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <script src="js/parallax.js"></script>
      <script src="js/animate.js"></script>
      <script src="js/ekko-lightbox.js"></script>
      <script src="js/custom.js"></script>
   </body>
</html>
