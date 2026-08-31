<?php
$page_title = "Careers & Internships - Matri Seva Samiti | Join Our Team";
include 'includes/header.php';
?>

<main>
    <!-- Page Hero -->
    <section class="page-hero">
        <img src="images/carrerherobg.png" alt="Careers Background" class="page-hero-bg">
        <div class="container">
            <div class="breadcrumb">
                <a href="index.php">Home</a> <span>/</span> <span>Careers</span>
            </div>
            <h1>Work With <span class="highlight">Purpose</span></h1>
            <p>Build a rewarding career in the developmental sector and empower grassroots communities.</p>
        </div>
    </section>

    <!-- Open Positions Grid -->
    <section style="padding: 75px 0; background: var(--bg-slate);">
        <div class="container">
            <div class="section-header">
                <div class="section-tag"><i class="fas fa-briefcase"></i> Current Openings</div>
                <h2>Explore Opportunities at MSS</h2>
                <p>We are seeking motivated individuals passionate about rural empowerment, education, and health.</p>
            </div>

            <div class="projects-grid">
                <!-- Job 1 -->
                <div class="project-card">
                    <div class="project-body">
                        <span class="badge badge-orange" style="align-self: flex-start; margin-bottom: 12px;">Full Time</span>
                        <h3>Field Project Coordinator</h3>
                        <p>Coordinate rural community health camps, supervise learning centers, and liaise with local panchayats in Prayagraj & Bhadohi districts.</p>
                        <div style="font-size: 0.85rem; color: var(--text-muted); margin: 12px 0;">
                            <div><i class="fas fa-map-marker-alt"></i> Prayagraj, UP</div>
                            <div><i class="fas fa-graduation-cap"></i> MSW / Graduate in Social Sciences</div>
                        </div>
                        <a href="#apply-now" class="btn btn-primary btn-sm" style="margin-top: auto;">Apply for Position</a>
                    </div>
                </div>

                <!-- Job 2 -->
                <div class="project-card">
                    <div class="project-body">
                        <span class="badge badge-orange" style="align-self: flex-start; margin-bottom: 12px;">Full Time</span>
                        <h3>Vocational & Computer Trainer</h3>
                        <p>Deliver NSDC-aligned digital literacy, office suite, and basic computing training to batches of rural youth at our Jhunsi skill center.</p>
                        <div style="font-size: 0.85rem; color: var(--text-muted); margin: 12px 0;">
                            <div><i class="fas fa-map-marker-alt"></i> Jhunsi, Prayagraj</div>
                            <div><i class="fas fa-graduation-cap"></i> BCA / PGDCA / Diploma in IT</div>
                        </div>
                        <a href="#apply-now" class="btn btn-primary btn-sm" style="margin-top: auto;">Apply for Position</a>
                    </div>
                </div>

                <!-- Job 3 -->
                <div class="project-card">
                    <div class="project-body">
                        <span class="badge badge-green" style="align-self: flex-start; margin-bottom: 12px;">Internship</span>
                        <h3>Social Work & Community Intern</h3>
                        <p>2-month summer/winter internship for university students to conduct baseline surveys, documentation, and impact analysis in rural clusters.</p>
                        <div style="font-size: 0.85rem; color: var(--text-muted); margin: 12px 0;">
                            <div><i class="fas fa-map-marker-alt"></i> Prayagraj / Hybrid</div>
                            <div><i class="fas fa-certificate"></i> Certificate + Stipend provided</div>
                        </div>
                        <a href="#apply-now" class="btn btn-primary btn-sm" style="margin-top: auto;">Apply for Internship</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Application Form -->
    <section id="apply-now" style="padding: 75px 0; background: var(--bg-white);">
        <div class="container" style="max-width: 900px;">
            <div class="contact-form-panel">
                <div class="section-header" style="margin-bottom: 30px;">
                    <div class="section-tag"><i class="fas fa-file-alt"></i> Job Application</div>
                    <h2>Submit Your Resume</h2>
                    <p>Interested in joining our team? Fill in the details below or email your resume directly to <strong>matrisevasamiti1910@gmail.com</strong>.</p>
                </div>

                <form class="ajax-form" action="process-contact.php" method="POST">
                    <div class="donation-form-grid">
                        <div class="form-group">
                            <label for="job_name">Full Name *</label>
                            <input type="text" id="job_name" name="name" class="form-control" placeholder="e.g. Vikas Singh" required>
                        </div>

                        <div class="form-group">
                            <label for="job_email">Email Address *</label>
                            <input type="email" id="job_email" name="email" class="form-control" placeholder="vikas@example.com" required>
                        </div>

                        <div class="form-group">
                            <label for="job_phone">Phone Number *</label>
                            <input type="tel" id="job_phone" name="phone" class="form-control" placeholder="+91 9876543210" required>
                        </div>

                        <div class="form-group">
                            <label for="job_position">Position Applying For *</label>
                            <select id="job_position" name="position" class="form-control" required>
                                <option value="">-- Select Opening --</option>
                                <option value="field_coordinator">Field Project Coordinator</option>
                                <option value="computer_trainer">Vocational & Computer Trainer</option>
                                <option value="internship">Social Work & Community Intern</option>
                                <option value="other">General Spontaneous Application</option>
                            </select>
                        </div>

                        <div class="form-group full-width">
                            <label for="job_cover">Cover Letter / Experience Summary</label>
                            <textarea id="job_cover" name="message" class="form-control" rows="4" placeholder="Briefly introduce your qualifications, past work experience, and why you wish to work with Matri Seva Samiti..."></textarea>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary btn-lg" style="width: 100%; margin-top: 10px;">
                        <i class="fas fa-paper-plane"></i> Submit Application
                    </button>
                </form>
            </div>
        </div>
    </section>
</main>

<?php include 'includes/footer.php'; ?>
