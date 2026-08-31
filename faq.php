<?php
$page_title = "FAQ - Matri Seva Samiti | Frequently Asked Questions";
include 'includes/header.php';
?>

<main>
    <!-- Page Hero -->
    <section class="page-hero">
        <div class="container">
            <div class="breadcrumb">
                <a href="index.php">Home</a> <span>/</span> <span>FAQ</span>
            </div>
            <h1>Frequently Asked <span class="highlight">Questions</span></h1>
            <p>Find instant answers to common queries regarding donations, 80G tax receipts, volunteering, and CSR collaborations.</p>
        </div>
    </section>

    <!-- FAQ Accordion Section -->
    <section style="padding: 75px 0; background: var(--bg-slate);">
        <div class="container faq-container">
            <div class="section-header">
                <div class="section-tag"><i class="fas fa-question-circle"></i> Quick Answers</div>
                <h2>Common Queries & Assistance</h2>
                <p>Click on any question below to expand the detailed answer.</p>
            </div>

            <!-- Q1 -->
            <div class="faq-item active">
                <div class="faq-header">
                    <span>1. Are donations to Matri Seva Samiti tax-exempt under Section 80G?</span>
                    <i class="fas fa-chevron-down faq-icon"></i>
                </div>
                <div class="faq-content" style="max-height: 200px;">
                    <div class="faq-body">
                        Yes. Matri Seva Samiti is registered under Section 80G of the Income Tax Act, 1961 (URN: AA090722075773U). Donors are entitled to claim a 50% deduction on their taxable income for donations made to our NGO. An official 80G tax receipt is issued for all contributions.
                    </div>
                </div>
            </div>

            <!-- Q2 -->
            <div class="faq-item">
                <div class="faq-header">
                    <span>2. How do I receive my 80G donation receipt?</span>
                    <i class="fas fa-chevron-down faq-icon"></i>
                </div>
                <div class="faq-content">
                    <div class="faq-body">
                        Once your donation is processed, your official 80G receipt and donation certificate will be automatically emailed to you within 24 to 48 hours. Please ensure you provide your valid PAN number and mailing address while donating.
                    </div>
                </div>
            </div>

            <!-- Q3 -->
            <div class="faq-item">
                <div class="faq-header">
                    <span>3. Is Matri Seva Samiti eligible for Corporate Social Responsibility (CSR) funds?</span>
                    <i class="fas fa-chevron-down faq-icon"></i>
                </div>
                <div class="faq-content">
                    <div class="faq-body">
                        Yes. Matri Seva Samiti has received formal approval for Form CSR-1 from the Ministry of Corporate Affairs (Reg No: CSR00057390). We are fully compliant to execute CSR initiatives under Schedule VII of the Companies Act, 2013.
                    </div>
                </div>
            </div>

            <!-- Q4 -->
            <div class="faq-item">
                <div class="faq-header">
                    <span>4. Can I volunteer if I don't reside in Prayagraj or Uttar Pradesh?</span>
                    <i class="fas fa-chevron-down faq-icon"></i>
                </div>
                <div class="faq-content">
                    <div class="faq-body">
                        Absolutely! We offer remote digital volunteering opportunities including graphic design, social media content creation, fundraising campaigns, translation, and virtual mentorship for youth. You can submit an application via our <a href="volunteer.php" class="highlight">Volunteer Portal</a>.
                    </div>
                </div>
            </div>

            <!-- Q5 -->
            <div class="faq-item">
                <div class="faq-header">
                    <span>5. How does Matri Seva Samiti ensure transparency and fund utilization?</span>
                    <i class="fas fa-chevron-down faq-icon"></i>
                </div>
                <div class="faq-content">
                    <div class="faq-body">
                        We maintain strict financial governance. Over 92% of all received funds directly finance on-the-ground beneficiary programs. Our accounts are audited annually by certified Chartered Accountants, and statutory filings are submitted to the Income Tax Department and NITI Aayog NGO Darpan.
                    </div>
                </div>
            </div>

            <!-- Q6 -->
            <div class="faq-item">
                <div class="faq-header">
                    <span>6. Can I visit your field centers or health camps?</span>
                    <i class="fas fa-chevron-down faq-icon"></i>
                </div>
                <div class="faq-content">
                    <div class="faq-body">
                        Yes, we warmly welcome donors, volunteers, and CSR representatives to visit our learning centers, women SHG hubs, and rural health clinics. Please email us at <a href="mailto:matrisevasamiti1910@gmail.com" class="highlight">matrisevasamiti1910@gmail.com</a> to schedule a guided field visit.
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Still have questions CTA -->
    <section class="cta-banner-section">
        <div class="container">
            <div class="cta-banner-content">
                <h2>Still Have a Question?</h2>
                <p>Our support team is always available to assist you with any questions or custom requirements.</p>
                <div class="cta-banner-buttons">
                    <a href="contact.php" class="btn btn-primary btn-lg"><i class="fas fa-envelope"></i> Contact Our Team</a>
                    <a href="tel:+919415451910" class="btn btn-outline btn-lg"><i class="fas fa-phone-alt"></i> Call +91-9415451910</a>
                </div>
            </div>
        </div>
    </section>
</main>

<?php include 'includes/footer.php'; ?>
