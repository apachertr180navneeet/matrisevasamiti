<?php 
$page_title = "Contact Us - Matri Seva Samiti | Prayagraj, UP";
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
            <h1>Get In Touch <span class="highlight">With Us</span></h1>
            <p>We are always eager to connect with supporters, volunteers, donors, and partners. Reach out to our team today.</p>
        </div>
    </section>

    <!-- Contact Details & Form Section -->
    <section style="padding: 80px 0; background: var(--bg-slate);">
        <div class="container">
            <div class="contact-layout">
                <!-- Left: Contact Details & Info Cards -->
                <div class="contact-info-panel">
                    <div class="section-header" style="margin-bottom: 20px;">
                        <span class="section-tag"><i class="fas fa-id-card"></i> Direct Reach</span>
                        <h2>Let's Start a <span class="text-underline-gold">Conversation</span></h2>
                        <p>Have questions about donations, volunteering, or projects? Our dedicated staff will respond within 24 hours.</p>
                    </div>

                    <!-- Address Card -->
                    <div class="contact-card-box">
                        <div class="c-icon"><i class="fas fa-map-marker-alt"></i></div>
                        <div>
                            <h4>Head Office Address</h4>
                            <p>Prayagraj (Allahabad), Uttar Pradesh, India - 211019</p>
                        </div>
                    </div>

                    <!-- Phone Card -->
                    <div class="contact-card-box">
                        <div class="c-icon"><i class="fas fa-phone-alt"></i></div>
                        <div>
                            <h4>Phone Numbers</h4>
                            <p><a href="tel:+919415451910">+91-9415451910</a></p>
                            <p style="font-size: 0.82rem; color: var(--text-light);">Mon - Sat: 9:30 AM to 6:30 PM</p>
                        </div>
                    </div>

                    <!-- Email Card -->
                    <div class="contact-card-box">
                        <div class="c-icon"><i class="fas fa-envelope"></i></div>
                        <div>
                            <h4>Email Inquiries</h4>
                            <p><a href="mailto:matrisevasamiti1910@gmail.com">matrisevasamiti1910@gmail.com</a></p>
                            <p style="font-size: 0.82rem; color: var(--text-light);">General, CSR & Tax Receipts</p>
                        </div>
                    </div>

                    <!-- 80G Tax Exemption Card -->
                    <div class="contact-card-box" style="background: var(--gold-light); border-color: var(--gold-primary);">
                        <div class="c-icon" style="background: var(--gold-primary); color: var(--forest-900);"><i class="fas fa-certificate"></i></div>
                        <div>
                            <h4 style="color: var(--forest-900);">80G Tax Exemption</h4>
                            <p style="color: var(--forest-800); font-weight: 500;">All Indian donations qualify for 50% income tax deduction under Section 80G.</p>
                        </div>
                    </div>
                </div>

                <!-- Right: Interactive Contact Form -->
                <div class="contact-form-panel">
                    <h3>Send Us a <span class="text-underline-gold">Message</span></h3>
                    <p>Fill out the form below and we will get back to you promptly:</p>

                    <form class="ajax-form" action="process-contact.php" method="POST">
                        <div class="donation-form-grid">
                            <div class="form-group">
                                <label for="contact_name">Your Full Name *</label>
                                <input type="text" id="contact_name" name="name" class="form-control" placeholder="e.g. Ramesh Verma" required>
                            </div>

                            <div class="form-group">
                                <label for="contact_email">Email Address *</label>
                                <input type="email" id="contact_email" name="email" class="form-control" placeholder="ramesh@example.com" required>
                            </div>

                            <div class="form-group">
                                <label for="contact_phone">Phone Number *</label>
                                <input type="tel" id="contact_phone" name="phone" class="form-control" placeholder="+91 9876543210" required>
                            </div>

                            <div class="form-group">
                                <label for="contact_subject">Subject / Purpose *</label>
                                <select id="contact_subject" name="subject" class="form-control" required>
                                    <option value="">-- Select Purpose --</option>
                                    <option value="donation">Donation & 80G Receipt</option>
                                    <option value="volunteer">Volunteer Application</option>
                                    <option value="csr">CSR / Institutional Funding</option>
                                    <option value="media">Media / Press Inquiry</option>
                                    <option value="other">General Query</option>
                                </select>
                            </div>

                            <div class="form-group full-width">
                                <label for="contact_message">Your Message *</label>
                                <textarea id="contact_message" name="message" class="form-control" rows="5" placeholder="How can we assist you?" required></textarea>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-gold btn-lg" style="width: 100%; margin-top: 10px;">
                            <i class="fas fa-paper-plane"></i> Send Message
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Embedded Google Map -->
    <section style="background: var(--bg-white);">
        <div style="width: 100%; height: 420px; border-top: 1px solid var(--border-light);">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d115335.25301886111!2d81.73152643888358!3d25.435801124673663!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x398534c9b20bd4f7%3A0xa972e29c10b4dacf!2sPrayagraj%2C%20Uttar%20Pradesh!5e0!3m2!1sen!2sin!4v1703212030737!5m2!1sen!2sin" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </section>
</main>

<?php include 'includes/footer.php'; ?>