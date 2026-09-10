<?php 
$page_title = "Donate - Support Matri Seva Samiti";
include 'includes/header.php'; 
?>

<main>
    <!-- Hero Section -->
    <section class="page-hero">
        <div class="container">
            <h1>Transform Lives Through <span class="highlight">Your Generosity</span></h1>
            <p>Join us in empowering rural communities across India. Every contribution creates lasting change.</p>
            <div class="hero-buttons">
                <a href="#donate-now" class="btn btn-primary">Donate Now</a>
                <a href="#learn-more" class="btn btn-secondary">Learn More</a>
            </div>
        </div>
    </section>

    <!-- Quick Donation Section -->
    <section class="quick-donation" id="donate-now">
        <div class="container">
            <h2 class="section-title">Choose Your <span class="highlight">Contribution</span></h2>
            <div class="donation-amounts-grid">
                <div class="amount-option" data-amount="500">
                    <div class="amount">₹500</div>
                    <div class="impact">Training materials for 1 person</div>
                </div>
                <div class="amount-option" data-amount="1000">
                    <div class="amount">₹1,000</div>
                    <div class="impact">Skill development workshop</div>
                </div>
                <div class="amount-option" data-amount="2500">
                    <div class="amount">₹2,500</div>
                    <div class="impact">Healthcare support for 5 families</div>
                </div>
                <div class="amount-option" data-amount="5000">
                    <div class="amount">₹5,000</div>
                    <div class="impact">Complete training program</div>
                </div>
                <div class="amount-option" data-amount="10000">
                    <div class="amount">₹10,000</div>
                    <div class="impact">Empower an entire village</div>
                </div>
                <div class="amount-option custom">
                    <div class="amount">Custom</div>
                    <div class="impact">Choose your amount</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Main Donation Section -->
    <section class="donation-section" id="learn-more">
        <div class="container">
            <div class="donation-grid">
                <div class="donation-info">
                    <h2>Why Your Support Matters</h2>
                    <p>Since 1995, Matri Seva Samiti <small class="hindi-text">मिलकर करें प्रयास, खुशहाल हो समाज ।</small> has been transforming rural communities. Your donation directly impacts lives through:</p>
                    
                    <div class="impact-areas">
                        <div class="impact-item">
                            <div class="impact-icon">
                                <i class="fas fa-graduation-cap"></i>
                            </div>
                            <div class="impact-content">
                                <h4>Skill Development</h4>
                                <p>Empowering youth with employable skills in technology, handicrafts, and vocational training.</p>
                            </div>
                        </div>
                        <div class="impact-item">
                            <div class="impact-icon">
                                <i class="fas fa-heartbeat"></i>
                            </div>
                            <div class="impact-content">
                                <h4>Healthcare Access</h4>
                                <p>Providing medical camps, health awareness, and essential healthcare services to remote villages.</p>
                            </div>
                        </div>
                        <div class="impact-item">
                            <div class="impact-icon">
                                <i class="fas fa-female"></i>
                            </div>
                            <div class="impact-content">
                                <h4>Women Empowerment</h4>
                                <p>Supporting women through self-help groups, microfinance, and entrepreneurship programs.</p>
                            </div>
                        </div>
                        <div class="impact-item">
                            <div class="impact-icon">
                                <i class="fas fa-leaf"></i>
                            </div>
                            <div class="impact-content">
                                <h4>Sustainable Development</h4>
                                <p>Implementing eco-friendly projects like solar power, water conservation, and organic farming.</p>
                            </div>
                        </div>
                    </div>

                    <div class="trust-indicators">
                        <h3>Transparency & Trust</h3>
                        <div class="trust-badges">
                            <div class="trust-badge">
                                <i class="fas fa-certificate"></i>
                                <span>Registered NGO</span>
                            </div>
                            <div class="trust-badge">
                                <i class="fas fa-shield-alt"></i>
                                <span>Secure Donations</span>
                            </div>
                            <div class="trust-badge">
                                <i class="fas fa-chart-pie"></i>
                                <span>98% Fund Utilization</span>
                            </div>
                            <div class="trust-badge">
                                <i class="fas fa-file-alt"></i>
                                <span>Annual Reports</span>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="donation-methods">
                    <div class="donation-card">
                        <h2><i class="fas fa-heart"></i> Secure Donation Methods</h2>
                        
                        <!-- Bank Transfer -->
                        <div class="payment-section">
                            <h3><i class="fas fa-university"></i> Bank Transfer</h3>
                            <div class="bank-details">
                                <div class="bank-info">
                                    <div class="info-row">
                                        <span class="label">Account Name:</span>
                                        <span class="value">Matri Seva Samiti <small class="hindi-text">मिलकर करें प्रयास, खुशहाल हो समाज ।</small></span>
                                    </div>
                                    <div class="info-row">
                                        <span class="label">Account Number:</span>
                                        <span class="value">
                                            <strong id="account-number">50200072951175</strong>
                                            <button class="copy-btn-small" onclick="copyText('account-number', this)" title="Copy Account Number">
                                                <i class="fas fa-copy"></i>
                                            </button>
                                        </span>
                                    </div>
                                    <div class="info-row">
                                        <span class="label">Bank Name:</span>
                                        <span class="value">HDFC Bank Ltd.</span>
                                    </div>
                                    <div class="info-row">
                                        <span class="label">NEFT IFSC Code:</span>
                                        <span class="value">
                                            <strong id="ifsc-code">HDFC0002434</strong>
                                            <button class="copy-btn-small" onclick="copyText('ifsc-code', this)" title="Copy IFSC Code">
                                                <i class="fas fa-copy"></i>
                                            </button>
                                        </span>
                                    </div>
                                    <div class="info-row">
                                        <span class="label">Branch Address:</span>
                                        <span class="value">House No 1/1, Awas Vikas Jhusi, Scheme No 3, Dist-Allahabad, Allahabad-211019, Uttar Pradesh</span>
                                    </div>
                                    <div class="bank-note">
                                        <i class="fas fa-check-circle"></i>
                                        <span>All donations are eligible for tax exemption under Section 80G</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- UPI Payment -->
                        <div class="payment-section">
                            <h3><i class="fas fa-mobile-alt"></i> UPI Payment</h3>
                            <div class="upi-section">
                                <div class="upi-id">
                                    <span class="label">UPI ID:</span>
                                    <span class="value">9415451910@ybl</span>
                                    <button class="copy-btn" onclick="copyUPI()">
                                        <i class="fas fa-copy"></i>
                                    </button>
                                </div>
                                <div class="qr-code">
                                    <img src="images/scanner.jpeg" alt="QR Code for Payment" class="qr-image">
                                    <p>Scan to Pay</p>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Online Payment -->
                        <div class="payment-section" id="online-payment">
                            <h3><i class="fas fa-credit-card"></i> Online Payment</h3>
                            <div class="online-options">
                                <form action="ccavRequestHandler" method="POST" id="ccavenue-form">
                                    <div class="form-group" style="text-align: left; margin-bottom: 15px;">
                                        <label for="amount" style="display: block; margin-bottom: 5px; font-weight: 600;">Donation Amount (₹) *</label>
                                        <input type="number" id="amount" name="amount" required min="1" value="500" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 8px;">
                                    </div>
                                    <div class="form-group" style="text-align: left; margin-bottom: 15px;">
                                        <label for="billing_name" style="display: block; margin-bottom: 5px; font-weight: 600;">Full Name *</label>
                                        <input type="text" id="billing_name" name="billing_name" required style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 8px;">
                                    </div>
                                    <div class="form-group" style="text-align: left; margin-bottom: 15px;">
                                        <label for="billing_email" style="display: block; margin-bottom: 5px; font-weight: 600;">Email Address *</label>
                                        <input type="email" id="billing_email" name="billing_email" required style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 8px;">
                                    </div>
                                    <div class="form-group" style="text-align: left; margin-bottom: 20px;">
                                        <label for="billing_tel" style="display: block; margin-bottom: 5px; font-weight: 600;">Phone Number *</label>
                                        <input type="tel" id="billing_tel" name="billing_tel" required style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 8px;">
                                    </div>
                                    <button type="submit" class="payment-btn">
                                        <i class="fas fa-credit-card"></i>
                                        Donate Now with CCAvenue
                                    </button>
                                </form>
                                <p class="payment-note" style="margin-top: 15px;">Powered by CCAvenue Secure Payment Gateway</p>
                            </div>
                        </div>

                        <!-- Contact for Donations -->
                        <div class="donation-contact">
                            <h3><i class="fas fa-headset"></i> Need Assistance?</h3>
                            <div class="contact-grid">
                                <div class="contact-item">
                                    <i class="fas fa-phone"></i>
                                    <div>
                                        <strong>Call Us</strong>
                                        <p>+91 9415451910<br>+91 9838291910</p>
                                    </div>
                                </div>
                                <div class="contact-item">
                                    <i class="fas fa-envelope"></i>
                                    <div>
                                        <strong>Email Us</strong>
                                        <p>matrisevasamiti1910@gmail.com</p>
                                    </div>
                                </div>
                            </div>
                            <div class="office-hours">
                                <i class="fas fa-clock"></i>
                                <span>Office Hours: Mon-Sat, 9:00 AM - 6:00 PM</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Impact Statistics -->
    <section class="impact-section">
        <div class="container">
            <h2 class="section-title">Our <span class="highlight">Impact</span> So Far</h2>
            <div class="impact-stats">
                <div class="stat-card">
                    <div class="stat-icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <div class="stat-number">1,000+</div>
                    <div class="stat-label">Lives Transformed</div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon">
                        <i class="fas fa-project-diagram"></i>
                    </div>
                    <div class="stat-number">50+</div>
                    <div class="stat-label">Projects Completed</div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon">
                        <i class="fas fa-map-marker-alt"></i>
                    </div>
                    <div class="stat-number">15+</div>
                    <div class="stat-label">Villages Reached</div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon">
                        <i class="fas fa-calendar-alt"></i>
                    </div>
                    <div class="stat-number">29+</div>
                    <div class="stat-label">Years of Service</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonial Section -->
    <section class="testimonial-section">
        <div class="container">
            <h2 class="section-title">What Our <span class="highlight">Beneficiaries</span> Say</h2>
            <div class="testimonial-grid">
                <div class="testimonial-card">
                    <div class="testimonial-content">
                        <p>"The skill training program changed my life. I now run my own tailoring business and support my family."</p>
                    </div>
                    <div class="testimonial-author">
                        <strong>Sunita Devi</strong>
                        <span>Jhunsi Village</span>
                    </div>
                </div>
                <div class="testimonial-card">
                    <div class="testimonial-content">
                        <p>"Thanks to the healthcare camp, we received free treatment and learned about preventive care."</p>
                    </div>
                    <div class="testimonial-author">
                        <strong>Ram Prasad</strong>
                        <span>Prayagraj District</span>
                    </div>
                </div>
                <div class="testimonial-card">
                    <div class="testimonial-content">
                        <p>"The digital library project brought technology to our village. Our children can now access online education."</p>
                    </div>
                    <div class="testimonial-author">
                        <strong>Meera Sharma</strong>
                        <span>Village Teacher</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<style>
/* Hero Section */
.page-hero {
    background: linear-gradient(135deg, rgba(244, 122, 32, 0.5), rgba(212, 106, 16, 0.5)), 
                url('images/donateherobg.png') center center / cover no-repeat;
    padding: 150px 0 100px;
    text-align: center;
    color: white;
}

.page-hero h1 {
    font-size: 52px;
    font-weight: 700;
    margin-bottom: 20px;
    line-height: 1.2;
    color: white;
}

.page-hero .highlight {
    color: white !important;
}

.page-hero p {
    font-size: 20px;
    margin-bottom: 40px;
    opacity: 0.95;
    max-width: 600px;
    margin-left: auto;
    margin-right: auto;
}

.hero-buttons {
    display: flex;
    gap: 20px;
    justify-content: center;
    flex-wrap: wrap;
}

.btn {
    padding: 15px 35px;
    border-radius: 50px;
    text-decoration: none;
    font-weight: 600;
    font-size: 16px;
    transition: all 0.3s ease;
    display: inline-flex;
    align-items: center;
    gap: 10px;
}

.btn-primary {
    background: white;
    color: #f47a20;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
}

.btn-primary:hover {
    background: #f0f0f0;
    transform: translateY(-3px);
    box-shadow: 0 15px 40px rgba(0, 0, 0, 0.3);
}

.btn-secondary {
    background: transparent;
    color: white;
    border: 2px solid white;
}

.btn-secondary:hover {
    background: white;
    color: #f47a20;
}

/* Quick Donation Section */
.quick-donation {
    padding: 80px 0;
    background: #f8f9fa;
}

.donation-amounts-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 20px;
    margin-top: 50px;
}

.amount-option {
    background: white;
    padding: 30px 20px;
    border-radius: 20px;
    text-align: center;
    cursor: pointer;
    transition: all 0.3s ease;
    border: 3px solid transparent;
    box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
}

.amount-option:hover {
    transform: translateY(-5px);
    border-color: #f47a20;
    box-shadow: 0 15px 40px rgba(244, 122, 32, 0.2);
}

.amount-option .amount {
    font-size: 28px;
    font-weight: 700;
    color: #f47a20;
    margin-bottom: 10px;
}

.amount-option .impact {
    font-size: 14px;
    color: #666;
    line-height: 1.4;
}

.amount-option.custom {
    background: linear-gradient(135deg, #f47a20, #d46a10);
    color: white;
}

.amount-option.custom .amount,
.amount-option.custom .impact {
    color: white;
}

/* Main Donation Section */
.donation-section {
    padding: 80px 0;
    background: white;
}

.donation-grid {
    display: grid;
    grid-template-columns: 1.2fr 1fr;
    gap: 60px;
    align-items: start;
}

.donation-info h2 {
    font-size: 36px;
    color: #333;
    margin-bottom: 20px;
}

.donation-info p {
    font-size: 18px;
    line-height: 1.6;
    color: #666;
    margin-bottom: 40px;
}

/* Impact Areas */
.impact-areas {
    margin-bottom: 50px;
}

.impact-item {
    display: flex;
    gap: 20px;
    margin-bottom: 30px;
    padding: 20px;
    background: #f8f9fa;
    border-radius: 15px;
    transition: all 0.3s ease;
}

.impact-item:hover {
    background: white;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    transform: translateX(10px);
}

.impact-icon {
    width: 60px;
    height: 60px;
    background: linear-gradient(135deg, #f47a20, #d46a10);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 24px;
    flex-shrink: 0;
}

.impact-content h4 {
    font-size: 20px;
    color: #333;
    margin-bottom: 8px;
}

.impact-content p {
    font-size: 16px;
    color: #666;
    line-height: 1.5;
    margin: 0;
}

/* Trust Indicators */
.trust-indicators {
    background: white;
    padding: 30px;
    border-radius: 20px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
}

.trust-indicators h3 {
    font-size: 24px;
    color: #333;
    margin-bottom: 20px;
    text-align: center;
}

.trust-badges {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(120px, 1fr));
    gap: 15px;
}

.trust-badge {
    text-align: center;
    padding: 15px 10px;
    background: #f8f9fa;
    border-radius: 10px;
    transition: all 0.3s ease;
}

.trust-badge:hover {
    background: #f47a20;
    color: white;
}

.trust-badge i {
    font-size: 24px;
    color: #f47a20;
    margin-bottom: 8px;
    display: block;
}

.trust-badge:hover i {
    color: white;
}

.trust-badge span {
    font-size: 12px;
    font-weight: 600;
}

/* Donation Methods */
.donation-methods {
    position: sticky;
    top: 100px;
}

.donation-card {
    background: white;
    border-radius: 25px;
    padding: 40px;
    box-shadow: 0 20px 60px rgba(0, 0, 0, 0.1);
    border: 2px solid #f0f0f0;
}

.donation-card h2 {
    font-size: 28px;
    color: #333;
    margin-bottom: 30px;
    text-align: center;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
}

.donation-card h2 i {
    color: #f47a20;
}

.payment-section {
    margin-bottom: 35px;
    padding-bottom: 35px;
    border-bottom: 1px solid #f0f0f0;
}

.payment-section:last-child {
    border-bottom: none;
    margin-bottom: 0;
}

.payment-section h3 {
    font-size: 20px;
    color: #333;
    margin-bottom: 20px;
    display: flex;
    align-items: center;
    gap: 10px;
}

.payment-section h3 i {
    color: #f47a20;
}

/* Bank Details */
.bank-details {
    background: #f8f9fa;
    border-radius: 15px;
    padding: 25px;
}

.info-row {
    display: flex;
    justify-content: space-between;
    margin-bottom: 15px;
    padding-bottom: 10px;
    border-bottom: 1px solid #e0e0e0;
    flex-wrap: wrap;
}

.info-row:last-child {
    border-bottom: none;
    margin-bottom: 0;
}

.info-row .label {
    font-weight: 600;
    color: #333;
    flex: 0 0 140px;
}

.info-row .value {
    color: #666;
    text-align: right;
    flex: 1;
    word-break: break-word;
}

.info-row .value strong {
    color: #f47a20;
    font-size: 16px;
    font-family: monospace;
    letter-spacing: 0.5px;
}

.bank-note {
    background: #e3f2fd;
    padding: 15px;
    border-radius: 10px;
    margin-top: 20px;
    display: flex;
    align-items: center;
    gap: 10px;
}

.bank-note i {
    color: #1976d2;
    font-size: 16px;
}

.bank-note span {
    font-size: 14px;
    color: #1976d2;
}

/* UPI Section */
.upi-section {
    background: #f8f9fa;
    border-radius: 15px;
    padding: 25px;
}

.upi-id {
    display: flex;
    align-items: center;
    gap: 15px;
    margin-bottom: 20px;
    padding: 15px;
    background: white;
    border-radius: 10px;
}

.upi-id .label {
    font-weight: 600;
    color: #333;
}

.upi-id .value {
    flex: 1;
    color: #f47a20;
    font-weight: 600;
    font-family: monospace;
}

.copy-btn {
    background: #f47a20;
    color: white;
    border: none;
    padding: 8px 12px;
    border-radius: 8px;
    cursor: pointer;
    transition: all 0.3s ease;
}

.copy-btn:hover {
    background: #d46a10;
}

.copy-btn-small {
    background: #f47a20;
    color: white;
    border: none;
    padding: 4px 8px;
    border-radius: 5px;
    cursor: pointer;
    transition: all 0.3s ease;
    font-size: 12px;
    margin-left: 8px;
}

.copy-btn-small:hover {
    background: #d46a10;
    transform: scale(1.05);
}

.qr-code {
    text-align: center;
    padding: 20px;
    background: white;
    border-radius: 15px;
    border: 2px solid #f47a20;
    box-shadow: 0 5px 15px rgba(244, 122, 32, 0.1);
}

.qr-image {
    width: 200px;
    height: 200px;
    object-fit: contain;
    border-radius: 10px;
    margin-bottom: 15px;
    box-shadow: 0 3px 10px rgba(0, 0, 0, 0.1);
}

.qr-code p {
    color: #333;
    margin: 0;
    font-weight: 600;
    font-size: 16px;
}

/* Online Payment */
.online-options {
    text-align: center;
}

.payment-btn {
    width: 100%;
    padding: 15px 20px;
    background: linear-gradient(135deg, #f47a20, #d46a10);
    color: white;
    border: none;
    border-radius: 15px;
    font-size: 16px;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
    margin-bottom: 10px;
}

.payment-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 15px 30px rgba(244, 122, 32, 0.3);
}

.payment-note {
    font-size: 12px;
    color: #999;
    margin: 0;
}

/* Donation Contact */
.donation-contact {
    background: #f8f9fa;
    border-radius: 15px;
    padding: 25px;
}

.donation-contact h3 {
    font-size: 20px;
    color: #333;
    margin-bottom: 20px;
    display: flex;
    align-items: center;
    gap: 10px;
}

.contact-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 20px;
    margin-bottom: 20px;
}

.contact-item {
    display: flex;
    align-items: center;
    gap: 15px;
    padding: 15px;
    background: white;
    border-radius: 10px;
}

.contact-item i {
    color: #f47a20;
    font-size: 20px;
    width: 30px;
    text-align: center;
}

.contact-item strong {
    display: block;
    font-size: 14px;
    color: #333;
    margin-bottom: 5px;
}

.contact-item p {
    font-size: 13px;
    color: #666;
    margin: 0;
    line-height: 1.3;
}

.office-hours {
    display: flex;
    align-items: center;
    gap: 10px;
    justify-content: center;
    padding: 10px;
    background: white;
    border-radius: 10px;
    font-size: 14px;
    color: #666;
}

.office-hours i {
    color: #f47a20;
}

/* Impact Section */
.impact-section {
    background: #f8f9fa;
    padding: 80px 0;
}

.impact-stats {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 30px;
    margin-top: 50px;
}

.stat-card {
    background: white;
    padding: 40px 30px;
    border-radius: 20px;
    text-align: center;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease;
    border: 3px solid transparent;
}

.stat-card:hover {
    transform: translateY(-10px);
    border-color: #f47a20;
}

.stat-icon {
    width: 70px;
    height: 70px;
    background: linear-gradient(135deg, #f47a20, #d46a10);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 20px;
    color: white;
    font-size: 28px;
}

.stat-number {
    font-size: 42px;
    font-weight: 800;
    color: #f47a20;
    margin-bottom: 10px;
}

.stat-label {
    font-size: 16px;
    color: #666;
    font-weight: 600;
}

/* Testimonial Section */
.testimonial-section {
    padding: 80px 0;
    background: white;
}

.testimonial-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 30px;
    margin-top: 50px;
}

.testimonial-card {
    background: #f8f9fa;
    padding: 30px;
    border-radius: 20px;
    position: relative;
    transition: all 0.3s ease;
}

.testimonial-card:hover {
    background: white;
    box-shadow: 0 20px 50px rgba(0, 0, 0, 0.1);
    transform: translateY(-5px);
}

.testimonial-content {
    margin-bottom: 20px;
}

.testimonial-content p {
    font-size: 16px;
    color: #666;
    line-height: 1.6;
    font-style: italic;
    margin: 0;
}

.testimonial-author strong {
    color: #333;
    font-size: 16px;
}

.testimonial-author span {
    color: #999;
    font-size: 14px;
    display: block;
    margin-top: 5px;
}

/* Responsive Design */
@media (max-width: 768px) {
    .page-hero h1 {
        font-size: 36px;
    }
    
    .hero-buttons {
        flex-direction: column;
        align-items: center;
    }
    
    .donation-grid {
        grid-template-columns: 1fr;
        gap: 40px;
    }
    
    .donation-amounts-grid {
        grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
    }
    
    .donation-card {
        padding: 30px 20px;
    }
    
    .contact-grid {
        grid-template-columns: 1fr;
    }
    
    .trust-badges {
        grid-template-columns: repeat(2, 1fr);
    }
    
    .impact-stats {
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    }
    
    .testimonial-grid {
        grid-template-columns: 1fr;
    }
    
    .qr-image {
        width: 150px;
        height: 150px;
    }
    
    .qr-code {
        padding: 15px;
    }
}
</style>

<script>
function copyUPI() {
    const upiId = "9415451910@ybl";
    navigator.clipboard.writeText(upiId).then(function() {
        const btn = document.querySelector('.copy-btn');
        const originalText = btn.innerHTML;
        btn.innerHTML = '<i class="fas fa-check"></i>';
        btn.style.background = '#4CAF50';
        setTimeout(() => {
            btn.innerHTML = originalText;
            btn.style.background = '#f47a20';
        }, 2000);
    });
}

function copyText(elementId, btn) {
    const text = document.getElementById(elementId).textContent;
    navigator.clipboard.writeText(text).then(function() {
        const originalText = btn.innerHTML;
        btn.innerHTML = '<i class="fas fa-check"></i>';
        btn.style.background = '#4CAF50';
        setTimeout(() => {
            btn.innerHTML = originalText;
            btn.style.background = '#f47a20';
        }, 2000);
    }).catch(function(err) {
        console.error('Failed to copy: ', err);
    });
}

// Amount selection functionality
document.addEventListener('DOMContentLoaded', function() {
    const amountOptions = document.querySelectorAll('.amount-option');
    
    amountOptions.forEach(option => {
        option.addEventListener('click', function() {
            // Remove active class from all options
            amountOptions.forEach(opt => opt.classList.remove('active'));
            // Add active class to clicked option
            this.classList.add('active');
            
            if (this.classList.contains('custom')) {
                // Handle custom amount
                const customAmount = prompt('Enter your donation amount (₹):');
                if (customAmount && !isNaN(customAmount)) {
                    this.querySelector('.amount').textContent = '₹' + parseInt(customAmount).toLocaleString();
                    const amountInput = document.getElementById('amount');
                    if (amountInput) amountInput.value = parseInt(customAmount);
                    window.location.hash = '#online-payment';
                }
            } else {
                const amount = this.getAttribute('data-amount');
                if (amount) {
                    const amountInput = document.getElementById('amount');
                    if (amountInput) amountInput.value = amount;
                    window.location.hash = '#online-payment';
                }
            }
        });
    });
});
</script>

<?php include 'includes/footer.php'; ?> 