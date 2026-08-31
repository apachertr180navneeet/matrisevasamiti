<?php 
$page_title = "Contact Us - Matri Seva Samiti | Get in Touch";
include 'includes/header.php'; 
?>

<main>
    <!-- Page Hero -->
    <section class="page-hero">
        <img src="images/contactherobg.png" alt="Contact Background" class="page-hero-bg">
        <div class="container">
            <div class="breadcrumb">
                <a href="index.php">Home</a> <span>/</span> <span>Contact Us</span>
            </div>
            <h1>Get in <span class="highlight">Touch</span></h1>
            <p>Have questions, want to partner, or interested in volunteering? We are here to assist you.</p>
        </div>
    </section>

    <!-- Contact Details & Form Section -->
    <section style="padding: 75px 0; background: var(--bg-slate);">
        <div class="container">
            <div class="contact-layout">
                <!-- Left: Contact Information Cards -->
                <div class="contact-info-panel">
                    <div class="contact-card-box">
                        <div class="c-icon"><i class="fas fa-map-marker-alt"></i></div>
                        <div>
                            <h4>Registered Head Office</h4>
                            <p>Prayagraj (Allahabad), Uttar Pradesh, India - 211019</p>
                        </div>
                    </div>

                    <div class="contact-card-box">
                        <div class="c-icon"><i class="fas fa-phone-alt"></i></div>
                        <div>
                            <h4>Call Us Directly</h4>
                            <p><a href="tel:+919415451910">+91-9415451910</a></p>
                            <p style="font-size: 0.82rem; color: var(--text-light);">Available Mon - Sat, 9:30 AM - 6:30 PM</p>
                        </div>
                    </div>

                    <div class="contact-card-box">
                        <div class="c-icon"><i class="fas fa-envelope"></i></div>
                        <div>
                            <h4>Email Communications</h4>
                            <p><a href="mailto:matrisevasamiti1910@gmail.com">matrisevasamiti1910@gmail.com</a></p>
                            <p style="font-size: 0.82rem; color: var(--text-light);">We respond to all inquiries within 24 hours</p>
                        </div>
                    </div>

                    <div class="contact-card-box">
                        <div class="c-icon"><i class="fas fa-clock"></i></div>
                        <div>
                            <h4>Working Hours</h4>
                            <p>Monday – Saturday: 9:30 AM – 6:30 PM</p>
                            <p>Sunday: Field Operations & Camps</p>
                        </div>
                    </div>
                </div>

                <!-- Right: Interactive Contact Form -->
                <div class="contact-form-panel">
                    <h3>Send Us a Message</h3>
                    <p>Fill out the form below and a representative will connect with you promptly.</p>

                    <form class="ajax-form" action="process-contact.php" method="POST">
                        <div class="donation-form-grid">
                            <div class="form-group">
                                <label for="c_name">Your Full Name *</label>
                                <input type="text" id="c_name" name="name" class="form-control" placeholder="e.g. Amit Kumar" required>
                            </div>

                            <div class="form-group">
                                <label for="c_email">Email Address *</label>
                                <input type="email" id="c_email" name="email" class="form-control" placeholder="name@example.com" required>
                            </div>

                            <div class="form-group">
                                <label for="c_phone">Phone Number *</label>
                                <input type="tel" id="c_phone" name="phone" class="form-control" placeholder="+91 9876543210" required>
                            </div>

                            <div class="form-group">
                                <label for="c_subject">Inquiry Subject *</label>
                                <select id="c_subject" name="subject" class="form-control" required>
                                    <option value="">-- Select Subject --</option>
                                    <option value="donation">Donation & 80G Receipt</option>
                                    <option value="volunteer">Volunteer & Internship</option>
                                    <option value="csr">CSR Grant & Corporate Partnership</option>
                                    <option value="general">General Inquiries</option>
                                </select>
                            </div>

                            <div class="form-group full-width">
                                <label for="c_message">Your Message *</label>
                                <textarea id="c_message" name="message" class="form-control" rows="5" placeholder="How can we help you?" required></textarea>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary btn-lg" style="width: 100%; margin-top: 10px;">
                            <i class="fas fa-paper-plane"></i> Send Message
                        </button>
                    </form>
                </div>
            </div>

            <!-- Google Map -->
            <div style="border-radius: var(--radius-lg); overflow: hidden; box-shadow: var(--shadow-md); border: 1px solid var(--border-light); margin-top: 50px;">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d115291.68884968822!2d81.77884144335938!3d25.435801099999995!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x398534c9b20bd4f7%3A0x4ca14833a827473e!2sPrayagraj%2C%20Uttar%20Pradesh!5e0!3m2!1sen!2sin!4v1703212030737!5m2!1sen!2sin" width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </section>
</main>

<?php include 'includes/footer.php'; ?>