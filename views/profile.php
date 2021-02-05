<header class="header">
    <div class="container">
      <div class="teacher-name" style="padding-top:20px;">

        <div class="row" style="margin-top:0px;">
        <div class="col-md-9">
          <h2 style="font-size:38px"><strong>AHM Kamal</strong></h2>
        </div>
        <div class="col-md-3">
          <div class="button" style="float:right;">
            <a href="#" class="btn btn-outline-success btn-sm">Edit Profile</a>
          </div>
        </div>
        </div>
      </div>

      <div class="row" style="margin-top:20px;">
        <div class="col-md-3"> <!-- Image -->
          <a href="#"> <img class="rounded-circle" src="images/kamal.jpg" alt="Kamal" style="width:200px;height:200px"></a>
        </div>

        <div class="doctorprofile">
        <div class="col-md-6"> <!-- Rank & Qualifications -->
          <h5 style="color:#3AAA64"> Doctor, <small>Dept. of CSE,  Nazrul Islam University</small></h5>
          <p id="educationDoctor">PhD (On study at BUET), M.Sc. in research on ICT(UPC, Spain), M.Sc. in research on ICT(UCL, Belgium).</p>
          <p id="adressDoctor">Address: Gloucester St., New Jersey, USA</p>
        </div>
        </div>
  <div class="patientprofile">
        <div class="col-md-6">
        <h5 style="color:#3AAA64"> Patient, <small>Dept. of CSE,  Nazrul Islam University</small></h5>
          <p id="adressPatient">Address: Gloucester St., New Jersey, USA</p>
        </div>
  </div>
        <div class="col-md-3 text-center"> <!-- Phone & Social -->
          <span class="number" style="font-size:18px">Phone:<strong>+8801732226402</strong></span>
          <div class="button" style="padding-top:18px">
            <a href="mailto:ahmkctg@yahoo.com" class="btn btn-outline-success btn-block">Send Email</a>
          </div>
          <div class="social-icons" style="padding-top:18px">
            <a href="#">
            <span class="fa-stack fa-lg">
              <i class="fa fa-circle fa-stack-2x" style="color:#3AAA64"></i>
              <i class="fa fa-linkedin fa-stack-1x fa-inverse"></i>
            </span></a>
            <a href="#">
            <span class="fa-stack fa-lg">
              <i class="fa fa-circle fa-stack-2x" style="color:#3AAA64"></i>
              <i class="fa fa-google-plus fa-stack-1x fa-inverse"></i>
            </span></a>
            <a href="#">
            <span class="fa-stack fa-lg">
              <i class="fa fa-circle fa-stack-2x" style="color:#3AAA64"></i>
              <i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
            </span></a>
            <a href="#">
            <span class="fa-stack fa-lg">
              <i class="fa fa-circle fa-stack-2x" style="color:#3AAA64"></i>
              <i class="fa fa-slideshare fa-stack-1x fa-inverse"></i>
            </span></a>

          </div>
        </div>
      </div>
    </div>
  </header>
  <div class="doctorBio">
  <div class="card card-block text-xs-left">
            <h2 class="card-title" style="color:#009688"><i class="fa fa-user fa-fw"></i>Biography</h2>
            <div style="height: 15px"></div>
              <p id="bioDoctor">AHM Kamal got B.Sc. and M.Sc. on Computer Science and Engineering from SUST, Bagladesh in 2004 and 2005 respectively. After graduation he served as a Lecturer at the Department of Computer Science and Engineering (CSE) in Institute of Science, Trade and Technology, Bangladesh. In 2009, he joined in a Public University, Jessore University of Science and Technology, as a Lecture at the CSE Department. He then promoted as an Assistant Professor by 2012. In 2015, Mr. Subrata changed his professional place and recruited as an Assistant Professor at the Department of Computer Science and Engineering in Jatiya Kabi Kazi Nazrul Islam University, Bangladesh and serving to date.</p>
          </div>
  </div>
  <div class="PatientInformation">
  <div class="card card-block text-xs-left">
            <h2 class="card-title" style="color:#009688"><i class="fa fa-user fa-fw"></i>Biography</h2>
            <div style="height: 15px"></div>
              <p id="PatientInfo">HISTORY OF DIAGNOSES, ALERGIES, SPECIAL INFORMATION, ETC.</p>
          </div>
  </div>

  <?php
      
    if($_COOKIE['userType']=='PATIENT') {
      ?>
      <script type="text/javascript">$('.doctorBio').hide()</script>
      <script type="text/javascript">$('.doctorprofile').hide()</script>
      <?php
    } else if($_COOKIE['userType']=='DOCTOR') {
      ?>
      <script type="text/javascript">$('.PatientInformation').hide()</script>
      <script type="text/javascript">$('.patientprofile').hide()</script>
      <?php                                     
    }

      ?>    