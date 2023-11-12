@include('include.header')
<main id="main">

  <!-- ======= Featured Section ======= -->
  <section id="breadcrumbs" class="breadcrumbs" style="margin-top: 10px;">
    <div class="container">


      <h2 style="color: #0D47A1;">Contact Us</h2>

    </div>
  </section><!-- End Breadcrumbs -->

  <section id="contact" class="contact">
    <div class="container">

      <div class="row">
        <div class="col-lg-6 zoom">
          <div class="info-box mb-4">
            <i class="bx bx-map"></i>
            <h3>Universidad Francisco de Paula Santander Ocaña</h3>
            <p>Sede el Algodonal Vía Acolsure, Ocaña-Norte de Santander-Colombia</p>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 zoom">
          <div class="info-box  mb-4">
            <i class="bx bx-envelope"></i>
            <h3>Email Us</h3>
            <p>encuentrointit@ufpso.edu.co</p>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 zoom">
          <div class="info-box  mb-4">
            <i class="bx bx-phone-call"></i>
            <h3>Phone</h3>
            <p>(+57) (7) 5690088 Ext. 202</p>
          </div>
        </div>

      </div>

      <div class="row">



        <div class="col-lg-12">
          <form action="forms/contact.php" method="post" role="form" class="php-email-form">
            <div class="form-row">
              <div class="col form-group">
                <input type="text" name="name" class="form-control input" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                <div class="validate"></div>
              </div>
              <div class="col form-group">
                <input type="email" class="form-control input" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                <div class="validate"></div>
              </div>
            </div>
            <div class="form-group">
              <input type="text" class="form-control input" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
              <div class="validate"></div>
            </div>
            <div class="form-group">
              <textarea class="form-control input" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
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
@include('include.footer2')