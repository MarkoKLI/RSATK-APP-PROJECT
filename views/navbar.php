<!-- ======= Top Bar ======= -->
<div id="topbar" class="d-none d-lg-flex align-items-center fixed-top">
    <div class="container d-flex">
      <div class="contact-info mr-auto">
        <i class="icofont-envelope"></i> <a href="mailto:contact@example.com">princeton.plainsboro@hospital.com</a>
        <i class="icofont-phone"></i> +1 5589 55488 55s
        <i class="icofont-google-map"></i> 400 West Blackwell Street
Dover, NJ 07801
      </div>
      <div class="social-links">
        <a href="#" class="twitter"><i class="icofont-twitter"></i></a>
        <a href="#" class="facebook"><i class="icofont-facebook"></i></a>
        <a href="#" class="instagram"><i class="icofont-instagram"></i></a>
        <a href="#" class="skype"><i class="icofont-skype"></i></a>
        <a href="#" class="linkedin"><i class="icofont-linkedin"></i></i></a>
      </div>
    </div>
  </div>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <h1 class="logo mr-auto"><a href="index.php">Princeton Health</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo mr-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li class="active"><a href="index.php">Home</a></li>
          <li><a href="<?php echo $location . "#about"; ?>">About</a></li>
          <li><a href="<?php echo $location . "#departments"; ?>">Departments</a></li>
          <li><a href="<?php echo $location . "?action=show_profile"; ?>">Profile</a></li>
          <li><a href="<?php echo $location . "?action=show_login"; ?>">Log in</a> </li>
          <li><a href="<?php echo $location . "#contact"; ?>">Contact</a></li>

        </ul>
      </nav><!-- .nav-menu -->
      <div class="ShowForPatient">
      <a href="<?php echo $location . "?action=appointments"; ?>" class="appointment-btn scrollto">Make an Appointment</a></div>
      <div class="ShowForDoctor">
      <a href="<?php echo $location . "?action=show_patients"; ?>" class="appointment-btn scrollto">Patients</a></div>

      <?php
      
    if($_COOKIE['userType']=='PATIENT') {
      ?>
      <script type="text/javascript">$('.ShowForDoctor').hide()</script>
      <?php
    } else if($_COOKIE['userType']=='DOCTOR') {
      ?>
      <script type="text/javascript">$('.ShowForPatient').hide()</script>
      <?php                                     
    }else {
      ?>
      <script type="text/javascript">$('.ShowForPatient').hide()</script>
      <script type="text/javascript">$('.ShowForDoctor').hide()</script>
      <?php 
    }

      ?>    

    </div>
  </header><!-- End Header -->



  