<section id="hero" class="d-flex align-items-center">
    <div class="container">
      <h1>Welcome to Princeton-Plainsboro Teaching Hospital</h1>
      <h2>"Omnes te moriturum amant"<br>
―Hospital motto</h2>

    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= Why Us Section ======= -->
    <section id="why-us" class="why-us">
      <div class="container">

        <div class="row">
          <div class="col-lg-4 d-flex align-items-stretch">
            <div class="content">
              <h3>Why Choose Princeton-Plainsboro Teaching Hospital?</h3>
              <p>
              The hospital appears to be a non-profit entity, essentially run as a charity with no shareholders. It is a teaching hospital, which means it is affiliated with a university medical school (although it has never been revealed which one, and Princeton University has no medical school) and is responsible for training medical students, interns, residents and fellows.
              </p>
            </div>
          </div>
          <div class="col-lg-8 d-flex align-items-stretch">
            <div class="icon-boxes d-flex flex-column justify-content-center">
              <div class="row">
                <div class="col-xl-4 d-flex align-items-stretch">
                  <div class="icon-box mt-4 mt-xl-0">
                    <i class="bx bx-receipt"></i>
                    <h4>Board of Directors</h4>
                    <p>The hospital's highest authority is the Board of Directors, which is primarily made up of department heads, together with important donors. Generally, the Chairman of the Board is one of the donors rather than one of the doctors. The current chairman of the board is Sanford Wells, the owner of a large corporation. The board generally does not involve itself in the day-to-day running of the hospital. Its chief duty appears to be to approve the hiring of chief administrative officers and approving contracts for major expenses, such as those with the hospital's insurers. </p>
                  </div>
                </div>
                <div class="col-xl-4 d-flex align-items-stretch">
                  <div class="icon-box mt-4 mt-xl-0">
                    <i class="bx bx-cube-alt"></i>
                    <h4>The hospital's Dean</h4>
                    <p>Doctor Lisa Cuddy was the Hospital's Dean of Medicine and head administrator. She is responsible for all the day-to-day functions of the hospital, including supervising the department heads, overseeing medical training, disciplining students, making personnel decisions about non-tenured staff, determining who may have hospital privileges, and meeting the hospital's ongoing regulatory requirements. She reports directly to the Board but she later resigned after her former boyfriend, Gregory House crashed his car into her living-room. </p>
                  </div>
                </div>
                <div class="col-xl-4 d-flex align-items-stretch">
                  <div class="icon-box mt-4 mt-xl-0">
                    <i class="bx bx-images"></i>
                    <h4>Head Nurse</h4>
                    <p>Each department of the hospital has a department head, who is responsible for personnel decisions within the department and ensuring interns, residents and fellows are properly supervised during their medical training.

                    Princeton-Plainsboro's Head Nurse is Brenda Previn who is responsible for allocation of patient rooms and diagnostic facilities.

</p>
                  </div>
                </div>
              </div>
            </div><!-- End .content-->
          </div>
        </div>

      </div>
    </section><!-- End Why Us Section -->


    <!-- ======= Counts Section ======= -->
    <section id="counts" class="counts">
      <div class="container">

        <div class="row">

          <div class="col-lg-3 col-md-6">
            <div class="count-box">
              <i class="icofont-doctor-alt"></i>
              <span data-toggle="counter-up">16</span>
              <p>Doctors</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 mt-5 mt-md-0">
            <div class="count-box">
              <i class="icofont-patient-bed"></i>
              <span data-toggle="counter-up">7</span>
              <p>Departments</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
            <div class="count-box">
              <i class="icofont-laboratory"></i>
              <span data-toggle="counter-up">8</span>
              <p>Research Labs</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
            <div class="count-box">
              <i class="icofont-award"></i>
              <span data-toggle="counter-up">150</span>
              <p>Awards</p>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Counts Section -->


    

<!-- ======= Departments Section ======= -->
<section id="departments" class="departments">
      <div class="container">

        <div class="section-title">
          <h2>Departments</h2>
          <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
        </div>

        <div class="row">
          <!-- Department header Section -->
          <div class="col-lg-3">
            <ul class="nav nav-tabs flex-column">
              <?php                 
                foreach ($departments as $key => $department):
              ?>
              <li class="nav-item">
                <a class="nav-link <?php if ($key == 0) { echo "active show"; }?>" 
                    data-toggle="tab" 
                    href="#tab-<?php echo $department["id"]; ?>">
                  <?php 
                    echo $department["title"];
                  ?>
                </a>
              </li>
              <?php 
                endforeach; 
              ?>
            </ul>
          </div>
          <!-- End of Department header Section -->

          <!-- Department Body Section -->        
          <div class="col-lg-9 mt-4 mt-lg-0">
            <div class="tab-content">
              <?php                 
                foreach ($departments as $key => $department):
              ?>
              <div class="tab-pane <?php if ($key == 0) { echo "active show"; }?>" 
                    id="tab-<?php echo $department["id"]; ?>">
                <div class="row">
                  <div class="col-lg-8 details order-2 order-lg-1">
                    <h3>
                      <?php 
                        echo $department["title"];
                      ?>
                    </h3>
                    <p class="font-italic">
                      <?php 
                        echo $department["description"];
                      ?>
                    </p>
                    <!-- Doctor-in-Department section -->  
                    <div class="row">
                      <?php 
                        foreach ($doctors as $doctor):
                          if ($doctor["specialtyId"] == $department["id"]):
                      ?>
                            <section id="doctors" class="doctors">

      <div class="container">

        <div class="section-title">
          <h2>Doctors</h2>
         
        </div>

        <div class="row">
                      <div class="col-lg-6">
                        <div class="member d-flex align-items-start">
                          <div class="pic"><img src="assets/img/doctors/doctors-1.jpg" class="img-fluid" alt=""></div>
                          <div class="member-info">
                            <h4>
                            <a href="<?php echo $location . "?action=show_profile";?>"><?php echo $doctor["name"] . ' ' . $doctor["surname"];?></a> 
                            </h4>
                            <span>
                              <?php 
                                echo $department["title"];
                              ?>
                            </span>
                            <p>Explicabo voluptatem mollitia et repellat qui dolorum quasi</p>

                          </div>
                        </div>
                          </div>
                        </div>
      </div>
                            </section>
                      <?php 
                          endif;
                        endforeach;
                      ?>
                    </div>
                    <!-- End of Doctor-in-Department section -->
                  </div>
                </div>
              </div>
              <?php 
                endforeach; 
              ?>
            </div>
          </div>
          <!-- End of Department Body Section -->
        </div>
      </div>
    </section>
    <!-- End Departments Section -->

    

    <!-- ======= Frequently Asked Questions Section ======= -->
    <section id="faq" class="faq section-bg">
      <div class="container">

        <div class="section-title">
          <h2>Frequently Asked Questions</h2>
          <p>Read these frequently asked questions to learn more about the Emergency Department at Valley Hospital Medical Center.</p>
        </div>

        <div class="faq-list">
          <ul>
            <li data-aos="fade-up">
              <i class="bx bx-help-circle icon-help"></i> <a data-toggle="collapse" class="collapse" href="#faq-list-1">What procedures will I have in the Emergency Department?<i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-1" class="collapse show" data-parent=".faq-list">
                <p>
                Treatments and procedures may include lab work, radiological studies, CAT scans, ultrasound, EKG for cardiac review, medication administration and physician evaluations.


                </p>
              </div>
            </li>

            <li data-aos="fade-up" data-aos-delay="100">
              <i class="bx bx-help-circle icon-help"></i> <a data-toggle="collapse" href="#faq-list-2" class="collapsed">When will I be able to eat?

 <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-2" class="collapse" data-parent=".faq-list">
                <p>
                Patients are able to eat after all their tests are completed and the physician has evaluated the results. On average, it is within three to four hours. However, it is sometimes necessary for patients to remain "NPO" (nothing by mouth) until further tests and/or studies are completed.


                </p>
              </div>
            </li>

            <li data-aos="fade-up" data-aos-delay="200">
              <i class="bx bx-help-circle icon-help"></i> <a data-toggle="collapse" href="#faq-list-3" class="collapsed">When will I receive my pain medication?
 <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-3" class="collapse" data-parent=".faq-list">
                <p>
                Because pain medication can mask important clues to your medical condition, it may not be given until tests are completed and the physician has evaluated the results. However, treatment for pain is important so please let your nurse or physician know when you are experiencing pain or if there is no relief from the medication that was prescribed. You will be asked to rate your pain throughout your stay in our department and, if admitted, on our medical floors.


                </p>
              </div>
            </li>

            <li data-aos="fade-up" data-aos-delay="300">
              <i class="bx bx-help-circle icon-help"></i> <a data-toggle="collapse" href="#faq-list-4" class="collapsed">How is the Emergency Department staffed?
 <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-4" class="collapse" data-parent=".faq-list">
                <p>
                The department is staffed with emergency medicine physicians and nurses, physician assistants, technicians, CNAs and unit coordinators along with specialists from the laboratory, cardiology, respiratory and radiology departments.


                </p>
              </div>
            </li>

            <li data-aos="fade-up" data-aos-delay="400">
              <i class="bx bx-help-circle icon-help"></i> <a data-toggle="collapse" href="#faq-list-5" class="collapsed">Will I be allowed to have visitors during my treatment?
 <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-5" class="collapse" data-parent=".faq-list">
                <p>
                Yes, usually, but the number of visitors in the emergency treatment area is kept to a minimum. Occasionally, visitors will be asked to remain in the ED lobby until your loved one is placed into the room and settled into their environment. Usually, two visitors per patient are allowed in most areas of the department.


                </p>
              </div>
            </li>

          </ul>
        </div>

      </div>
    </section><!-- End Frequently Asked Questions Section -->

    

    <!-- ======= Gallery Section ======= -->
    <section id="gallery" class="gallery">
      <div class="container">

        <div class="section-title">
          <h2>Gallery</h2>
          <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
        </div>
      </div>

      <div class="container-fluid">
        <div class="row no-gutters">

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="assets/img/gallery/gallery-1.jpg" class="venobox" data-gall="gallery-item">
                <img src="assets/img/gallery/gallery-1.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="assets/img/gallery/gallery-2.jpg" class="venobox" data-gall="gallery-item">
                <img src="assets/img/gallery/gallery-2.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="assets/img/gallery/gallery-3.jpg" class="venobox" data-gall="gallery-item">
                <img src="assets/img/gallery/gallery-3.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="assets/img/gallery/gallery-4.jpg" class="venobox" data-gall="gallery-item">
                <img src="assets/img/gallery/gallery-4.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="assets/img/gallery/gallery-5.jpg" class="venobox" data-gall="gallery-item">
                <img src="assets/img/gallery/gallery-5.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="assets/img/gallery/gallery-6.jpg" class="venobox" data-gall="gallery-item">
                <img src="assets/img/gallery/gallery-6.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="assets/img/gallery/gallery-7.jpg" class="venobox" data-gall="gallery-item">
                <img src="assets/img/gallery/gallery-7.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="assets/img/gallery/gallery-8.jpg" class="venobox" data-gall="gallery-item">
                <img src="assets/img/gallery/gallery-8.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Gallery Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container">

        <div class="section-title">
          <h2>Contact</h2>
        </div>
          
      </div>

      <div>
        <iframe style="border:0; width: 100%; height: 350px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3016.408432214814!2d-74.57814088462956!3d40.88485477931336!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c30aa37cfb738f%3A0x6ed925aa4ed14f41!2s400%20W%20Blackwell%20St%2C%20Dover%2C%20NJ%2007801%2C%20USA!5e0!3m2!1sen!2sbg!4v1612560703904!5m2!1sen!2sbg" frameborder="0" allowfullscreen></iframe>
      </div>

      <div class="container">
        <div class="row mt-5">

          <div class="col-lg-4">
            <div class="info">
              <div class="address">
                <i class="icofont-google-map"></i>
                <h4>Location:</h4>
                <p>400 West Blackwell Street
Dover, NJ 07801</p>
              </div>

              <div class="email">
                <i class="icofont-envelope"></i>
                <h4>Email:</h4>
                <p>princeton.plainsboro@hospital.com</p>
              </div>

              <div class="phone">
                <i class="icofont-phone"></i>
                <h4>Call:</h4>
                <p>+1 5589 55488 55s</p>
              </div>

            </div>

          </div>

          <div class="col-lg-8 mt-5 mt-lg-0">

            <form action="forms/contact.php" method="post" role="form" class="php-email-form">
              <div class="form-row">
                <div class="col-md-6 form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                  <div class="validate"></div>
                </div>
                <div class="col-md-6 form-group">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                  <div class="validate"></div>
                </div>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                <div class="validate"></div>
              </div>
              <div class="form-group">
                <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
                <div class="validate"></div>
              </div>
              <div class="mb-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
              </div>
              <div class="text-center"><button type="submit">Send Message</button></div>
            </form>

          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->