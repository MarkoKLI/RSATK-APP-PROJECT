


<div class="container">

<!-- BEGIN INVOICE -->
<div class="col-xs-12">
    <div class="grid invoice">
        <div class="grid-body">
            <div class="invoice-title">
                <div class="row">
                    <div class="col-xs-12">
                     <h1 class="text-info">PPTHospital</h1>
                    </div>
                </div>
                <br>
                <div>
                    <div class="col-xs-12">
                        <h3>Medical diagnosis<br>
            </h3>
            <div class="Doctoredit">
          <div class="button" style="float:right;">
            <a href="#" class="btn btn-outline-success btn-sm">Edit Report</a>
          </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-xs-6">
                    
                        <strong>Doctor</strong><br>
                        Name:<br>
                        Surname:<br>
                    
                </div>
                <div class="col-sm-4"class="text-center" >
                        <strong>Date for repotr</strong><br>
                        Data:<br>
                        Time:<br>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-6">
                        <strong>Patient</strong><br>
                        Name<br>
                        Surname<br>
                </div>
                
            </div>
            <div class="row">
                <div class="col-md-12">
                    <h3>Name of diagnose</h3>
                </div>									
            </div>
             <div class="row">
      <div class="col mb-3">
        <div class="form-group">
     
          <textarea class="form-control" rows="5" placeholder="Write diagnose"></textarea>
        </div>
      </div>
   </div> 
   <div class="col-xs-6">
                    
                        <strong>Preliminary diagnoses</strong><br>
                        1.<br>
                        2.<br>
                        3.<br>
                        4.<br>
                        5.<br>
                </div>
        </div>

</div>
<!-- END INVOICE -->
</div>
                   <form action="/action_page.php">
<input type="file" id="myFile" name="filename">
<input type="submit">
</form>
</div>

<?php
      
    if($_COOKIE['userType']=='PATIENT') {
      ?>
      <script type="text/javascript">$('.Doctoredit').hide()</script>
      <?php
    } 

      ?>  