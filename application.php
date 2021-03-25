<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet"
   href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
      <!-- Basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- Mobile Metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <!-- Site Metas -->
      <title>LIFEJACKET</title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
      <meta name="keywords" content="">
      <meta name="remarksiption" content="">
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
      <style type="text/css">
   input {
       height: 39px;
       font-size: 14px;
       color: #333;
       padding: 0px 10px;
       border: 1px solid #d2d7e0;
       border-radius: 3px;
       width: 300px;
       -moz-border-radius: 3px;
       -webkit-border-radius: 3px;
   }
   .mainBoard{
       width: 800px;
       margin: -100px auto 0px;
   }
   
   body{
      font-size : 20px;
      color : black;
   }
   .navbar-brand{
      font-size: 30px;
   }
   button{
      border: transparent;
      text-decoration: underline;
      
   }
   </style>
</head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<body class="body">
<?php
header("Content-Type: text/html; charset=UTF-8");
$con = new mysqli("localhost", "root", "1234", "lifejacket"); // conect to database
mysqli_query($con, 'SER NAMES uft8');
session_start();
$appID = $_GET['x'];
$cookie_name = $appID; // cookie name is appID
$cookie_value = "1"; // default cookie value
setcookie($cookie_name, $cookie_value, time() + (86400), "/"); // maintain cookie
$sql = "select * from application where appID='$appID'";
$res = $con->query($sql);
$row = mysqli_fetch_array($res);
if ($res->num_rows != 1) {
    echo "<script>alert('Undefined way'); location.href='viewapp.php';</script>";
    exit();
}
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
                                    <a class="nav-link color-grey-hover" href="#.html">MYPAGE</a>
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
                            <a class="nav-link color-grey-hover" href="#.html">MYPAGE</a>
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
               <!-- section -->
               <section class="main_full banner_section_top">
        <div class="container-fluid">
          <div class="row">
             <div class="full">
                  <div class="slider_banner">
                    <img class="img-responsive" src="images/day-planner-828611.jpg" alt="#" />
                      <div class="slide_cont">
                        <div class="slider_cont_inner">
                        <div class="mainBoard" style="padding-bottom: 50px;">
                        <div class="mainBoard" style="padding-bottom: 50px;">
                        <div class="mainBoard" style="padding-bottom: 50px;">
      <table class="table table-hover">
          <tr style="text-align: center">Application</tr>
              
         <colgroup>
            <col width="30%">
         </colgroup>
         <tr>
            <td>
               Username
            </td>
            <td>
               <?php $username=str_replace(">","&gt;",str_replace("<","&lt;",$row['username'])); echo $username; ?>
            </td>
         </tr>
         <tr>
            <td>
               Application Date
            </td>
            <td>
               <?php echo $row['appDate']; ?>
            </td>
         </tr>
         <tr>
            <td>
               Status
            </td>
            <td>
               <?php echo $row['status']; ?>
            </td>
         </tr>

         <tr>
            <td style="text-align: center;" colspan="2">
               Remarks
            </td>
         </tr>
      </table>
      <textarea rows="7" cols="75" id="remarks"readonly="readonly"><?php  echo str_replace("＆","&",$row['remarks']); ?></textarea>
      <?php
    if (isset($_SESSION['username'])) { ?>
    <!-- Modal -->
<div class="modal fade" id="applicationmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Manage application</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="editapp.php?x=<?php echo $row['appID'];?>" method="POST">
      <div class="modal-body">
            
                <div class="form-group">
                    <label>Status</label>
                    <input type="text" name="status" class="form-control" placeholer=<?php echo $row['status']; ?>>
                </div>

                <div class="form-group">
                    <label>Remarks</label>
                    <input type="text" name="remarks" class="form-control" placeholer=<?php echo $row['remarks']; ?>>
                </div>
            
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" name="savedata"class="btn btn-primary">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>
    <div class="container">
        <div class="jumborton">
        <div class="d-grid gap-2">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#applicationmodal">
                    Manage
                    </button>
        
            </div>
        </div>
    </div>
   </div>
                        </div>
                      </div>
                  </div>
                </div>
          </div>
        </div>
      </section>
      <?php } ?>









      <!-- end section -->
      <script src="js/jquery.min.js"></script>
      <script src="js/tether.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <script src="js/parallax.js"></script>
      <script src="js/animate.js"></script>
      <script src="js/ekko-lightbox.js"></script>
      <script src="js/custom.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>


  </body>
</html>