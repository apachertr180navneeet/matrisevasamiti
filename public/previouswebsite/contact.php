<?php 
session_start();
$page_title = "Contact Us - Matri Seva Samiti";
include 'includes/header.php'; 
?>

<style>
    /* Contact Page Styles */
    .contact-hero {
        background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)),
                    url('images/contactherobg.png') center center / cover no-repeat;
        padding: 120px 0 80px;
        text-align: center;
        color: white;
        position: relative;
        border-bottom: 4px solid #f47a20;
    }
    
    .contact-hero h1 {
        font-size: 48px;
        font-weight: 700;
        margin-bottom: 20px;
        animation: fadeInUp 0.8s ease;
    }
    
    .contact-hero p {
        font-size: 20px;
        max-width: 600px;
        margin: 0 auto;
        opacity: 0.9;
        animation: fadeInUp 0.8s ease 0.2s both;
    }
    
    /* Contact Info Section */
    .contact-info-section {
        padding: 80px 0;
        background: #f8f9fa;
    }
    
    .contact-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 20px;
    }
    
    .contact-cards {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 30px;
        margin-bottom: 60px;
    }
    
    .contact-card {
        background: white;
        padding: 40px 30px;
        border-radius: 20px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        text-align: center;
        transition: all 0.3s ease;
        border: 2px solid transparent;
    }
    
    .contact-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 40px rgba(0,0,0,0.15);
        border-color: #f47a20;
    }
    
    .contact-card-icon {
        width: 70px;
        height: 70px;
        background: linear-gradient(135deg, #f47a20, #d46a10);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 25px;
        font-size: 30px;
        color: white;
    }
    
    .contact-card h3 {
        font-size: 24px;
        color: #333;
        margin-bottom: 15px;
    }
    
    .contact-card p {
        color: #666;
        line-height: 1.6;
        margin: 0;
    }
    
    .contact-card a {
        color: #f47a20;
        text-decoration: none;
        font-weight: 600;
        transition: color 0.3s ease;
    }
    
    .contact-card a:hover {
        color: #d46a10;
    }
    
    /* Section Title */
    .section-title {
        font-size: 42px;
        text-align: center;
        margin-bottom: 20px;
        color: #333;
        font-weight: 700;
    }
    
    .section-title .highlight {
        color: #f47a20;
    }
    
    /* Office Locations */
    .offices-section {
        padding: 80px 0;
        background: white;
    }
    
    .offices-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
        gap: 40px;
        margin-top: 50px;
    }
    
    .office-card {
        padding: 40px;
        background: #f8f9fa;
        border-radius: 20px;
        position: relative;
        overflow: hidden;
        transition: all 0.3s ease;
    }
    
    .office-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 5px;
        background: linear-gradient(90deg, #f47a20, #d46a10);
    }
    
    .office-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 35px rgba(0,0,0,0.1);
    }
    
    .office-type {
        display: inline-block;
        background: #f47a20;
        color: white;
        padding: 5px 15px;
        border-radius: 20px;
        font-size: 14px;
        font-weight: 600;
        margin-bottom: 20px;
    }
    
    .office-card h3 {
        font-size: 22px;
        color: #333;
        margin-bottom: 20px;
    }
    
    .office-details {
        display: flex;
        flex-direction: column;
        gap: 15px;
    }
    
    .office-detail {
        display: flex;
        align-items: flex-start;
        gap: 15px;
    }
    
    .office-detail i {
        color: #f47a20;
        font-size: 20px;
        width: 25px;
        flex-shrink: 0;
        margin-top: 2px;
    }
    
    .office-detail p {
        color: #666;
        line-height: 1.6;
        margin: 0;
    }
    
    /* Contact Form Section */
    .contact-form-section {
        padding: 80px 0;
        background: linear-gradient(135deg, #f8f9fa 0%, white 100%);
    }
    
    .form-container {
        max-width: 800px;
        margin: 0 auto;
        background: white;
        padding: 50px;
        border-radius: 30px;
        box-shadow: 0 20px 60px rgba(0,0,0,0.1);
    }
    
    .form-header {
        text-align: center;
        margin-bottom: 40px;
    }
    
    .form-header h2 {
        font-size: 36px;
        color: #333;
        margin-bottom: 15px;
    }
    
    .form-header p {
        color: #666;
        font-size: 18px;
    }
    
    .contact-form {
        display: grid;
        gap: 25px;
    }
    
    .form-row {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 25px;
    }
    
    .form-group {
        position: relative;
    }
    
    .form-group label {
        display: block;
        margin-bottom: 8px;
        color: #333;
        font-weight: 600;
        font-size: 14px;
    }
    
    .form-group input,
    .form-group textarea,
    .form-group select {
        width: 100%;
        padding: 15px 20px;
        border: 2px solid #e0e0e0;
        border-radius: 10px;
        font-size: 16px;
        transition: all 0.3s ease;
        background: #f8f9fa;
        font-family: 'Poppins', sans-serif;
    }
    
    .form-group input:focus,
    .form-group textarea:focus,
    .form-group select:focus {
        outline: none;
        border-color: #f47a20;
        background: white;
        box-shadow: 0 0 0 4px rgba(244, 122, 32, 0.1);
    }
    
    .form-group textarea {
        resize: vertical;
        min-height: 120px;
    }
    
    .submit-btn {
        background: linear-gradient(135deg, #f47a20, #d46a10);
        color: white;
        padding: 18px 50px;
        border: none;
        border-radius: 50px;
        font-size: 18px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        gap: 10px;
        justify-self: center;
        margin-top: 20px;
    }
    
    .submit-btn:hover {
        transform: translateY(-3px);
        box-shadow: 0 15px 30px rgba(244, 122, 32, 0.3);
    }
    
    /* Map Section */
    .map-section {
        padding: 0;
        height: 400px;
        position: relative;
        background: #f0f0f0;
    }
    
    .map-container {
        width: 100%;
        height: 100%;
    }
    
    .map-overlay {
        position: absolute;
        bottom: 40px;
        left: 50%;
        transform: translateX(-50%);
        background: white;
        padding: 20px 40px;
        border-radius: 50px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.2);
        display: flex;
        align-items: center;
        gap: 15px;
    }
    
    .map-overlay i {
        color: #f47a20;
        font-size: 24px;
    }
    
    .map-overlay span {
        font-weight: 600;
        color: #333;
    }
    
    /* Working Hours */
    .working-hours {
        background: #f47a20;
        color: white;
        padding: 20px 40px;
        text-align: center;
    }
    
    .working-hours-content {
        max-width: 800px;
        margin: 0 auto;
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 30px;
    }
    
    .hours-item {
        display: flex;
        align-items: center;
        gap: 10px;
    }
    
    .hours-item i {
        font-size: 20px;
    }
    
    /* Animations */
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    /* Responsive */
    @media (max-width: 768px) {
        .contact-hero h1 {
            font-size: 36px;
        }
        
        .contact-hero p {
            font-size: 16px;
        }
        
        .form-container {
            padding: 30px 20px;
        }
        
        .form-row {
            grid-template-columns: 1fr;
        }
        
        .offices-grid {
            grid-template-columns: 1fr;
        }
        
        .working-hours-content {
            flex-direction: column;
            text-align: center;
        }
        
        .map-overlay {
            bottom: 20px;
            padding: 15px 25px;
            font-size: 14px;
        }
    }
    
    /* Success/Error Messages */
    .alert {
        padding: 15px 20px;
        border-radius: 10px;
        margin-bottom: 20px;
        display: flex;
        align-items: center;
        gap: 10px;
    }
    
    .alert-success {
        background: #d4edda;
        color: #155724;
        border: 1px solid #c3e6cb;
    }
    
    .alert-error {
        background: #f8d7da;
        color: #721c24;
        border: 1px solid #f5c6cb;
    }
</style>

<main>
    <!-- Contact Hero Section -->
    <section class="contact-hero">
        <div class="container">
            <h1>Contact Us</h1>
            <p>Get in touch with us for any inquiries, collaboration opportunities, or to learn more about our initiatives</p>
        </div>
    </section>

    <!-- Contact Info Cards -->
    <section class="contact-info-section">
        <div class="contact-container">
            <div class="contact-cards">
                <div class="contact-card">
                    <div class="contact-card-icon">
                        <i class="fas fa-phone-alt"></i>
                    </div>
                    <h3>Call Us</h3>
                    <p>
                        <a href="tel:+919415451910">+91 9415451910</a><br>
                        <a href="tel:+919838291910">+91 9838291910</a>
                    </p>
                </div>
                
                <div class="contact-card">
                    <div class="contact-card-icon">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <h3>Email Us</h3>
                    <p>
                        <a href="mailto:matrisevasamiti1910@gmail.com">matrisevasamiti1910@gmail.com</a>
                    </p>
                </div>
                
                <div class="contact-card">
                    <div class="contact-card-icon">
                        <i class="fas fa-clock"></i>
                    </div>
                    <h3>Working Hours</h3>
                    <p>
                        Monday - Saturday<br>
                        9:00 AM - 6:00 PM
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Office Locations -->
    <section class="offices-section">
        <div class="contact-container">
            <h2 class="section-title">Our <span class="highlight">Offices</span></h2>
            <div class="offices-grid">
                <div class="office-card">
                    <span class="office-type">Main Office</span>
                    <h3>Jhunsi, Prayagraj</h3>
                    <div class="office-details">
                        <div class="office-detail">
                            <i class="fas fa-map-marker-alt"></i>
                            <p>01 Naika Chhatnag Road, Near Ram Shiv Colony, Jhunsi, Prayagraj, Uttar Pradesh - 211019</p>
                        </div>
                        <div class="office-detail">
                            <i class="fas fa-phone"></i>
                            <p>+91 9415451910</p>
                        </div>
                        <div class="office-detail">
                            <i class="fas fa-envelope"></i>
                            <p>matrisevasamiti1910@gmail.com</p>
                        </div>
                    </div>
                </div>
                
                <div class="office-card">
                    <span class="office-type">Branch Office</span>
                    <h3>Ustapur, Prayagraj</h3>
                    <div class="office-details">
                        <div class="office-detail">
                            <i class="fas fa-map-marker-alt"></i>
                            <p>Ustapur Pathshala Road, Bhajnanand Ashram Near, Pani Tanki, Jhunsi, Prayagraj, Uttar Pradesh - 211019</p>
                        </div>
                        <div class="office-detail">
                            <i class="fas fa-phone"></i>
                            <p>+91 9838291910</p>
                        </div>
                        <div class="office-detail">
                            <i class="fas fa-envelope"></i>
                            <p>matrisevasamiti1910@gmail.com</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Form -->
    <section class="contact-form-section">
        <div class="contact-container">
            <div class="form-container">
                <div class="form-header">
                    <h2>Send us a Message</h2>
                    <p>We'd love to hear from you. Fill out the form below and we'll get back to you as soon as possible.</p>
                </div>
                
                <?php
                // Display success/error messages if any
                if(isset($_SESSION['contact_success'])) {
                    echo '<div class="alert alert-success"><i class="fas fa-check-circle"></i> ' . $_SESSION['contact_success'] . '</div>';
                    unset($_SESSION['contact_success']);
                }
                if(isset($_SESSION['contact_error'])) {
                    echo '<div class="alert alert-error"><i class="fas fa-exclamation-circle"></i> ' . $_SESSION['contact_error'] . '</div>';
                    unset($_SESSION['contact_error']);
                }
                ?>
                
                <form class="contact-form" action="process-contact.php" method="POST">
                    <div class="form-row">
                        <div class="form-group">
                            <label for="name">Full Name *</label>
                            <input type="text" id="name" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email Address *</label>
                            <input type="email" id="email" name="email" required>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="phone">Phone Number</label>
                            <input type="tel" id="phone" name="phone">
                        </div>
                        <div class="form-group">
                            <label for="subject">Subject *</label>
                            <select id="subject" name="subject" required>
                                <option value="">Select a subject</option>
                                <option value="General Inquiry">General Inquiry</option>
                                <option value="Volunteer">Volunteer Opportunities</option>
                                <option value="Donation">Donation Related</option>
                                <option value="Partnership">Partnership/Collaboration</option>
                                <option value="Media">Media Inquiry</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="message">Message *</label>
                        <textarea id="message" name="message" required placeholder="Type your message here..."></textarea>
                    </div>
                    
                    <button type="submit" class="submit-btn">
                        <span>Send Message</span>
                        <i class="fas fa-paper-plane"></i>
                    </button>
                </form>
            </div>
        </div>
    </section>

    <!-- Map Section -->
    <section class="map-section">
        <div class="map-container">
            <iframe 
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d28821.877560984726!2d81.8889263!3d25.4690899!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x399acb4f2f9b0c7f%3A0x5d1b1f5d1f5d1f5d!2sJhunsi%2C%20Prayagraj%2C%20Uttar%20Pradesh%20211019!5e0!3m2!1sen!2sin!4v1640000000000" 
                width="100%" 
                height="100%" 
                style="border:0;" 
                allowfullscreen="" 
                loading="lazy" 
                referrerpolicy="no-referrer-when-downgrade">
            </iframe>
        </div>
        <div class="map-overlay">
            <i class="fas fa-map-marked-alt"></i>
            <span>Find us in Jhunsi, Prayagraj</span>
        </div>
    </section>

    <!-- Working Hours Bar -->
    <section class="working-hours">
        <div class="working-hours-content">
            <div class="hours-item">
                <i class="fas fa-calendar-alt"></i>
                <span>Monday - Saturday</span>
            </div>
            <div class="hours-item">
                <i class="fas fa-clock"></i>
                <span>9:00 AM - 6:00 PM</span>
            </div>
            <div class="hours-item">
                <i class="fas fa-phone-volume"></i>
                <span>Emergency: +91 9415451910</span>
            </div>
        </div>
    </section>
</main>

<script>
// Form validation and enhancement
document.addEventListener('DOMContentLoaded', function() {
    const form = document.querySelector('.contact-form');
    
    if (form) {
        form.addEventListener('submit', function(e) {
            const submitBtn = form.querySelector('.submit-btn');
            submitBtn.innerHTML = '<span>Sending...</span> <i class="fas fa-spinner fa-spin"></i>';
            submitBtn.disabled = true;
        });
    }
    
    // Smooth scroll for internal links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });
});
</script>

<?php include 'includes/footer.php'; ?> 