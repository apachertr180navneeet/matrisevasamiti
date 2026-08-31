<?php 
$page_title = "Join as a Volunteer - Matri Seva Samiti | Make an Impact";
include 'includes/header.php'; 

$selectedRole = isset($_GET['role']) ? htmlspecialchars($_GET['role']) : '';
?>

<main>
    <!-- Page Hero -->
    <section class="page-hero">
        <img src="images/volunteerherobg.png" alt="Volunteer Background" class="page-hero-bg">
        <div class="container">
            <div class="breadcrumb">
                <a href="index">Home</a> <span>/</span> <span>Volunteer</span>
            </div>
            <h1>Become a Change <span class="highlight">Maker</span></h1>
            <p>Share your skills, time, and empathy to empower rural children, women, and families across India.</p>
        </div>
    </section>

    <!-- Why Volunteer & Open Roles -->
    <section style="padding: 75px 0; background: var(--bg-white);">
        <div class="container">
            <div class="section-header text-center">
                <span class="section-tag"><i class="fas fa-hands-helping"></i> Volunteer Program</span>
                <h2>Why Volunteer With <span class="text-underline-gold">Matri Seva Samiti?</span></h2>
                <p>Join an established grassroots organization with over 30 years of authentic community presence.</p>
            </div>

            <div class="vm-cards-grid">
                <div class="vm-card">
                    <div class="vm-card-icon"><i class="fas fa-seedling"></i></div>
                    <h3>Direct Field Impact</h3>
                    <p>Work directly on ground in rural centers teaching students, conducting medical triage, or training women entrepreneurs.</p>
                </div>

                <div class="vm-card">
                    <div class="vm-card-icon"><i class="fas fa-award"></i></div>
                    <h3>Certificate of Experience</h3>
                    <p>Receive an official Certificate of Volunteering from Matri Seva Samiti acknowledging your contributions and social leadership.</p>
                </div>

                <div class="vm-card">
                    <div class="vm-card-icon"><i class="fas fa-laptop"></i></div>
                    <h3>Flexible Modes</h3>
                    <p>Choose between on-ground field volunteering in Prayagraj/UP or remote digital volunteering in content, social media, and translation.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Volunteer Application Form -->
    <section style="padding: 80px 0; background: var(--bg-slate);">
        <div class="container" style="max-width: 850px;">
            <div class="contact-form-panel">
                <div class="section-header text-center" style="margin-bottom: 25px;">
                    <span class="section-tag"><i class="fas fa-user-plus"></i> Application Form</span>
                    <h2>Apply to <span class="text-underline-gold">Volunteer</span></h2>
                    <p>Tell us about your background and how you would like to contribute:</p>
                </div>

                <form class="ajax-form" action="process-volunteer.php" method="POST">
                    <div class="donation-form-grid">
                        <div class="form-group">
                            <label for="vol_name">Full Name *</label>
                            <input type="text" id="vol_name" name="name" class="form-control" placeholder="e.g. Anjali Gupta" required>
                        </div>

                        <div class="form-group">
                            <label for="vol_email">Email Address *</label>
                            <input type="email" id="vol_email" name="email" class="form-control" placeholder="anjali@example.com" required>
                        </div>

                        <div class="form-group">
                            <label for="vol_phone">Mobile Number *</label>
                            <input type="tel" id="vol_phone" name="phone" class="form-control" placeholder="+91 9876543210" required>
                        </div>

                        <div class="form-group">
                            <label for="vol_city">Current City / Location *</label>
                            <input type="text" id="vol_city" name="city" class="form-control" placeholder="e.g. Prayagraj / Lucknow / Delhi" required>
                        </div>

                        <div class="form-group">
                            <label for="vol_role">Preferred Volunteer Role *</label>
                            <select id="vol_role" name="role" class="form-control" required>
                                <option value="">-- Select Volunteering Area --</option>
                                <option value="education" <?php echo $selectedRole == 'education' ? 'selected' : ''; ?>>Teaching & Child Remedial Education</option>
                                <option value="health" <?php echo $selectedRole == 'health' ? 'selected' : ''; ?>>Doctor / Nurse / Healthcare Assistant</option>
                                <option value="women" <?php echo $selectedRole == 'women' ? 'selected' : ''; ?>>Women Self-Help & Tailoring Mentor</option>
                                <option value="trainer" <?php echo $selectedRole == 'trainer' ? 'selected' : ''; ?>>Digital & Computer Skills Trainer</option>
                                <option value="social_media">Social Media & Content Creator</option>
                                <option value="fundraising">Fundraising & Donor Outreach</option>
                                <option value="other">Other Field Work</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="vol_time">Availability *</label>
                            <select id="vol_time" name="availability" class="form-control" required>
                                <option value="weekends">Weekends Only (2-4 hrs/week)</option>
                                <option value="weekdays">Weekdays (Part-Time)</option>
                                <option value="fulltime">Full-Time Field Volunteer (1-3 months)</option>
                                <option value="virtual">Remote / Virtual Volunteer</option>
                            </select>
                        </div>

                        <div class="form-group full-width">
                            <label for="vol_experience">Skills, Experience & Why You Want to Join</label>
                            <textarea id="vol_experience" name="experience" class="form-control" rows="4" placeholder="Briefly describe your background, educational qualification, and motivation to volunteer with us..."></textarea>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-gold btn-lg" style="width: 100%; margin-top: 10px;">
                        <i class="fas fa-check-circle"></i> Submit Volunteer Application
                    </button>
                </form>
            </div>
        </div>
    </section>
</main>

<?php include 'includes/footer.php'; ?>
