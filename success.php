<?php
require_once 'functions/function.php';

require 'includes/config.php';
session_start();
getmodule("header");
$crt= $_SESSION['certno'];
$category = $_SESSION['category'];

switch($category){
  case 1:
    $link = 'CSR/CSR Certificate _';
    $result = $link.$crt.'.jpg';
    break;
  case 2:
    $link = 'BrainFreeze/BrainFreezer Participation ';
    $result = $link.$crt.'.pdf';
    break;
	case 3:
    $link = 'Mini Convention/MiniConvention Participation ';
    $result = $link.$crt.'.pdf';
    break;
	case 4:
    $link = 'CSRVolunteer/CSR Volunteer ';
    $result = $link.$crt.'.pdf';
    break;
	case 5:
	 $link='Hackathon1/Hackathon Participation ';
	 $result = $link.$crt.'.pdf';
	 break;

}
?>
  <body class="fw-section next-to-footer padding-top-3x "
  style="background-image: url(img/home/contacts-bg.jpg); background-size: cover;">
    <div class="container">
      <h1 class="block-title text-center">UPES-CSI<small>we create, share and innovate.</small></h1>
  		  <br>
  		  <br>
  	  <center><h4><a class="text-center" target="_blank" href="uploads/<?php echo $result;?>">Get Certificate</a></center></h4>
      <br>
  	  <h5 class="text-center"> Congratulations! Your certificate is authentic.</h5>
    </div><!-- .container -->
  </body><!-- .fw-section.next-to-footer -->
