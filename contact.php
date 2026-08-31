<?php 
$page_title = "Contact Us - Matri Seva Samiti";
include 'includes/header.php'; 
?>

<main>
    <!-- BREADCRUMBS -->
    <section class="ul-breadcrumb ul-section-spacing">
        <div class="ul-container">
            <h2 class="ul-breadcrumb-title">Contact Us</h2>
            <ul class="ul-breadcrumb-nav">
                <li><a href="index.php">Home</a></li>
                <li><span class="separator"><i class="flaticon-right"></i></span></li>
                <li>Contact Us</li>
            </ul>
        </div>
    </section>

    <!-- CONTACT INFOS SECTION -->
    <div class="ul-contact-infos">
        <div class="ul-section-spacing ul-container">
            <div class="row row-cols-md-3 row-cols-1 gy-4">
                <!-- Phone -->
                <div class="col">
                    <div class="ul-contact-info h-100">
                        <div class="icon"><i class="flaticon-phone-call"></i></div>
                        <div class="txt">
                            <span class="title">Helpline Number</span>
                            <a href="tel:+919876543210">+91 98765 43210</a>
                        </div>
                    </div>
                </div>

                <!-- Email -->
                <div class="col">
                    <div class="ul-contact-info h-100">
                        <div class="icon"><i class="flaticon-comment"></i></div>
                        <div class="txt">
                            <span class="title">Email Address</span>
                            <a href="mailto:contact@matrisevasamiti.org">contact@matrisevasamiti.org</a>
                        </div>
                    </div>
                </div>

                <!-- Location -->
                <div class="col">
                    <div class="ul-contact-info h-100">
                        <div class="icon"><i class="flaticon-location"></i></div>
                        <div class="txt">
                            <span class="title">Registered Office</span>
                            <span class="descr">Plot No. 12, Seva Marg, New Delhi 110001</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- MAP SECTION -->
    <div class="ul-contact-map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3502.269472658931!2d77.21852087549887!3d28.621714475670832!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390cfd37b027d109%3A0xf67026e6f9822a10!2sConnaught%20Place%2C%20New%20Delhi!5e0!3m2!1sen!2sin!4v1700000000000!5m2!1sen!2sin" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" style="width:100%; height:400px; border:0;"></iframe>
    </div>

    <!-- CONTACT FORM SECTION -->
    <section class="ul-inner-contact ul-section-spacing">
        <div class="ul-section-heading justify-content-center text-center">
            <div>
                <span class="ul-section-sub-title">Write To Us</span>
                <h2 class="ul-section-title">Feel Free To Get In Touch Anytime</h2>
            </div>
        </div>

        <div class="ul-inner-contact-container">
            <form action="process-contact.php" method="POST" class="ul-contact-form ul-form">
                <div class="row row-cols-md-2 row-cols-1 gy-3">
                    <div class="col">
                        <div class="form-group">
                            <input type="text" name="name" id="ul-contact-name" placeholder="Your Name *" required>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <input type="email" name="email" id="ul-contact-email" placeholder="Email Address *" required>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <input type="text" name="subject" id="ul-contact-subject" placeholder="Subject / Inquiry Topic">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <textarea name="message" id="ul-contact-msg" placeholder="Write Your Message Here..." rows="5" required></textarea>
                        </div>
                    </div>
                    <div class="col-12 text-center mt-4">
                        <button type="submit" class="ul-btn"><i class="flaticon-fast-forward-double-right-arrows-symbol"></i> Send Message</button>
                    </div>
                </div>
            </form>
        </div>
    </section>
</main>

<?php include 'includes/footer.php'; ?>