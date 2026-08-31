<?php 
$page_title = "Frequently Asked Questions (FAQ) - Matri Seva Samiti";
include 'includes/header.php'; 
?>

<main>
    <!-- Page Hero -->
    <section class="page-hero">
        <img src="images/faqherobg.png" alt="FAQ Background" class="page-hero-bg">
        <div class="container">
            <div class="breadcrumb">
                <a href="index.php">Home</a> <span>/</span> <span>FAQ</span>
            </div>
            <h1>Frequently Asked <span class="highlight">Questions</span></h1>
            <p>Everything you need to know about our legal status, 80G tax exemptions, donations, volunteering, and CSR partnerships.</p>
        </div>
    </section>

    <!-- FAQ Accordion Section -->
    <section style="padding: 80px 0; background: var(--bg-slate);">
        <div class="container">
            <div class="section-header text-center">
                <span class="section-tag"><i class="fas fa-question-circle"></i> Clear Answers</span>
                <h2>Frequently Asked <span class="text-underline-gold">Queries</span></h2>
                <p>Click on any question below to expand the detailed answer:</p>
            </div>

            <div class="faq-container">
                <!-- FAQ 1 -->
                <div class="faq-item active">
                    <div class="faq-header">
                        <span>1. Is Matri Seva Samiti a registered NGO in India?</span>
                        <i class="fas fa-chevron-down faq-icon"></i>
                    </div>
                    <div class="faq-content" style="max-height: 300px;">
                        <div class="faq-body">
                            Yes. Matri Seva Samiti was founded in April 1995 and is formally registered under the <strong>Societies Registration Act, 1860 (Act 21 of 1860)</strong> in Uttar Pradesh. We also hold verified registrations on NITI Aayog NGO Darpan, MSME Udyam, and the Ministry of Corporate Affairs (CSR-1).
                        </div>
                    </div>
                </div>

                <!-- FAQ 2 -->
                <div class="faq-item">
                    <div class="faq-header">
                        <span>2. Are donations eligible for 80G Tax Exemption?</span>
                        <i class="fas fa-chevron-down faq-icon"></i>
                    </div>
                    <div class="faq-content">
                        <div class="faq-body">
                            Yes. All donations made to Matri Seva Samiti are eligible for a <strong>50% tax exemption under Section 80G</strong> of the Indian Income Tax Act. We provide an official 80G Tax Exemption Receipt and Form 10BE certificate for all PAN-registered donations.
                        </div>
                    </div>
                </div>

                <!-- FAQ 3 -->
                <div class="faq-item">
                    <div class="faq-header">
                        <span>3. How will my donation money be used?</span>
                        <i class="fas fa-chevron-down faq-icon"></i>
                    </div>
                    <div class="faq-content">
                        <div class="faq-body">
                            Your contributions directly fund our four core thematic pillars: free remedial education for rural children, women tailoring and micro-enterprise clusters, free medical and eye health camps, and youth vocational skills training. Over 85% of every rupee goes directly toward field execution.
                        </div>
                    </div>
                </div>

                <!-- FAQ 4 -->
                <div class="faq-item">
                    <div class="faq-header">
                        <span>4. How can I receive my 80G Tax Exemption Receipt?</span>
                        <i class="fas fa-chevron-down faq-icon"></i>
                    </div>
                    <div class="faq-content">
                        <div class="faq-body">
                            After completing your payment via UPI, Net Banking, or Card, simply email your transaction screenshot, Donor Full Name, and PAN card number to <strong>matrisevasamiti1910@gmail.com</strong>. Our accounts team will issue your digitally stamped 80G receipt within 48 business hours.
                        </div>
                    </div>
                </div>

                <!-- FAQ 5 -->
                <div class="faq-item">
                    <div class="faq-header">
                        <span>5. Is Matri Seva Samiti eligible for Corporate CSR funding?</span>
                        <i class="fas fa-chevron-down faq-icon"></i>
                    </div>
                    <div class="faq-content">
                        <div class="faq-body">
                            Yes. We hold MCA registration Form CSR-1 (Registration No. <strong>CSR00057390</strong>). We actively partner with corporates and PSUs for Schedule VII aligned development initiatives, providing audited utilization certificates and progress reports.
                        </div>
                    </div>
                </div>

                <!-- FAQ 6 -->
                <div class="faq-item">
                    <div class="faq-header">
                        <span>6. Can I volunteer with Matri Seva Samiti remotely?</span>
                        <i class="fas fa-chevron-down faq-icon"></i>
                    </div>
                    <div class="faq-content">
                        <div class="faq-body">
                            Yes! We offer both on-ground volunteering in Uttar Pradesh (teaching, healthcare camps, organizing SHGs) and remote virtual volunteering (social media storytelling, graphic design, content writing, grant research, and translation).
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Bottom CTA -->
    <section class="cta-banner-section">
        <div class="container">
            <div class="cta-banner-content">
                <h2>Still Have Questions?</h2>
                <p>Our team is happy to help you with any questions regarding donations, audits, or programs.</p>
                <div class="cta-banner-buttons">
                    <a href="contact.php" class="btn btn-gold btn-lg"><i class="fas fa-envelope"></i> Contact Us</a>
                    <a href="certificate.php" class="btn btn-outline-white btn-lg"><i class="fas fa-file-alt"></i> View Legal Documents</a>
                </div>
            </div>
        </div>
    </section>
</main>

<?php include 'includes/footer.php'; ?>
