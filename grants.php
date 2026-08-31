<?php 
$page_title = "Grants & CSR Funding - Matri Seva Samiti | Partner With Us";
include 'includes/header.php'; 
?>

<main>
    <!-- Page Hero -->
    <section class="page-hero">
        <img src="images/grantherobg.png" alt="Grants Background" class="page-hero-bg">
        <div class="container">
            <div class="breadcrumb">
                <a href="index.php">Home</a> <span>/</span> <span>Grants & CSR</span>
            </div>
            <h1>CSR Partnerships & <span class="highlight">Grants</span></h1>
            <p>Collaborate with a certified, audited, and grassroots-driven NGO to achieve your Corporate Social Responsibility goals.</p>
        </div>
    </section>

    <!-- CSR Overview & Compliance Highlights -->
    <section style="padding: 75px 0; background: var(--bg-white);">
        <div class="container">
            <div class="section-header">
                <div class="section-tag"><i class="fas fa-handshake"></i> Corporate Social Responsibility</div>
                <h2>Why Partner With Matri Seva Samiti?</h2>
                <p>We provide full statutory compliance, milestone-based reporting, audited utilization certificates, and authentic grassroots execution.</p>
            </div>

            <div class="focus-grid">
                <div class="focus-card">
                    <div class="focus-icon-circle"><i class="fas fa-file-contract"></i></div>
                    <h3>CSR-1 Certified</h3>
                    <p>Formally registered with the Ministry of Corporate Affairs (MCA Reg: CSR00057390) for executing CSR projects under Schedule VII of the Companies Act, 2013.</p>
                </div>

                <div class="focus-card">
                    <div class="focus-icon-circle"><i class="fas fa-percentage"></i></div>
                    <h3>80G & 12A Tax Benefits</h3>
                    <p>All contributions are eligible for 50% tax deductions under Section 80G. We hold permanent 12A tax exemption registration with the Income Tax Department.</p>
                </div>

                <div class="focus-card">
                    <div class="focus-icon-circle"><i class="fas fa-clipboard-check"></i></div>
                    <h3>Audited & Transparent</h3>
                    <p>Annual financial statements audited by certified Chartered Accountants. Transparent fund tracking with dedicated project accounting and utilization reports.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Priority CSR Projects for Corporate Funding -->
    <section style="padding: 75px 0; background: var(--bg-slate-soft);">
        <div class="container">
            <div class="section-header">
                <div class="section-tag"><i class="fas fa-bullseye"></i> High-Impact Opportunities</div>
                <h2>Featured CSR Project Proposals</h2>
                <p>Select from our structured, ready-to-deploy developmental programs or co-create a tailored initiative in your target geography.</p>
            </div>

            <div class="projects-grid">
                <!-- Proposal 1 -->
                <div class="project-card">
                    <div class="project-body">
                        <div class="project-category">Education & Technology</div>
                        <h3>Digital Literacy & STEM Labs in Rural Schools</h3>
                        <p>Establishing solar-powered smart computer centers and digital library access for 500+ rural pupils across 5 government schools.</p>
                        <div style="background: var(--bg-slate); padding: 12px; border-radius: 6px; margin: 15px 0; font-size: 0.85rem;">
                            <strong>Estimated Budget:</strong> ₹5,00,000 - ₹10,00,000<br>
                            <strong>Timeline:</strong> 12 Months | <strong>Impact:</strong> 500+ Students
                        </div>
                        <a href="#csr-form" class="btn btn-primary btn-sm">Express Interest</a>
                    </div>
                </div>

                <!-- Proposal 2 -->
                <div class="project-card">
                    <div class="project-body">
                        <div class="project-category">Healthcare & Hygiene</div>
                        <h3>Mobile Healthcare Clinic for Remote Villages</h3>
                        <p>Deploying a mobile medical van with diagnostic kits, essential medicines, and certified healthcare staff covering 15 underserved villages weekly.</p>
                        <div style="background: var(--bg-slate); padding: 12px; border-radius: 6px; margin: 15px 0; font-size: 0.85rem;">
                            <strong>Estimated Budget:</strong> ₹8,00,000 - ₹15,00,000<br>
                            <strong>Timeline:</strong> 12 Months | <strong>Impact:</strong> 3,000+ Villagers
                        </div>
                        <a href="#csr-form" class="btn btn-primary btn-sm">Express Interest</a>
                    </div>
                </div>

                <!-- Proposal 3 -->
                <div class="project-card">
                    <div class="project-body">
                        <div class="project-category">Women Livelihood</div>
                        <h3>Women Self-Help Group Tailoring & Micro-Enterprise Hub</h3>
                        <p>Providing 50 sewing machines, advanced garment design training, and market aggregation for 100 rural women to generate ₹8,000+ monthly income.</p>
                        <div style="background: var(--bg-slate); padding: 12px; border-radius: 6px; margin: 15px 0; font-size: 0.85rem;">
                            <strong>Estimated Budget:</strong> ₹4,00,000 - ₹7,50,000<br>
                            <strong>Timeline:</strong> 6 Months | <strong>Impact:</strong> 100 Women
                        </div>
                        <a href="#csr-form" class="btn btn-primary btn-sm">Express Interest</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CSR Partnership Submission Form -->
    <section id="csr-form" style="padding: 80px 0; background: var(--bg-white);">
        <div class="container" style="max-width: 900px;">
            <div class="contact-form-panel">
                <div class="section-header" style="margin-bottom: 30px;">
                    <div class="section-tag"><i class="fas fa-envelope-open-text"></i> Connect With Us</div>
                    <h2>Request a Detailed CSR Pitch Proposal</h2>
                    <p>Submit your organization's focus areas and our CSR partnership team will share customized program decks and budget sheets.</p>
                </div>

                <form class="ajax-form" action="process-contact.php" method="POST">
                    <div class="donation-form-grid">
                        <div class="form-group">
                            <label for="company_name">Company / Foundation Name *</label>
                            <input type="text" id="company_name" name="company_name" class="form-control" placeholder="e.g. Tata Motors / ABC Foundation" required>
                        </div>

                        <div class="form-group">
                            <label for="contact_person">Contact Person Name *</label>
                            <input type="text" id="contact_person" name="contact_person" class="form-control" placeholder="e.g. Priya Nair (CSR Head)" required>
                        </div>

                        <div class="form-group">
                            <label for="csr_email">Official Email Address *</label>
                            <input type="email" id="csr_email" name="email" class="form-control" placeholder="csr@company.com" required>
                        </div>

                        <div class="form-group">
                            <label for="csr_phone">Contact Phone Number *</label>
                            <input type="tel" id="csr_phone" name="phone" class="form-control" placeholder="+91 9876543210" required>
                        </div>

                        <div class="form-group full-width">
                            <label for="csr_focus">Preferred CSR Focus Area *</label>
                            <select id="csr_focus" name="focus_area" class="form-control" required>
                                <option value="">-- Select Thematic Sector --</option>
                                <option value="education">Rural Child Education & Digital Literacy</option>
                                <option value="health">Mobile Healthcare & Preventive Eye Clinics</option>
                                <option value="women">Women Self-Help Groups & Garment Enterprises</option>
                                <option value="skills">Youth Vocational Training & Job Placement</option>
                                <option value="environment">Clean Water, Sanitation & Tree Plantation</option>
                                <option value="other">Custom Thematic Program</option>
                            </select>
                        </div>

                        <div class="form-group full-width">
                            <label for="csr_message">Project Scope or Inquiries</label>
                            <textarea id="csr_message" name="message" class="form-control" rows="4" placeholder="Tell us about your CSR mandate, target geographies, or funding guidelines..."></textarea>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary btn-lg" style="width: 100%; margin-top: 10px;">
                        <i class="fas fa-paper-plane"></i> Submit CSR Inquiry
                    </button>
                </form>
            </div>
        </div>
    </section>
</main>

<?php include 'includes/footer.php'; ?>