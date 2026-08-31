<?php
$page_title = "Volunteer & Internship - Matri Seva Samiti | Join Our Mission";
include 'includes/header.php';
?>

<main>
    <!-- Page Hero -->
    <section class="page-hero">
        <img src="images/volunteerherobg.png" alt="Volunteer Background" class="page-hero-bg">
        <div class="container">
            <div class="breadcrumb">
                <a href="index.php">Home</a> <span>/</span> <span>Volunteer</span>
            </div>
            <h1>Join Hands as a <span class="highlight">Volunteer</span></h1>
            <p>Share your skills, time, and empathy to create positive change on the ground.</p>
        </div>
    </section>

    <!-- Why Volunteer Section -->
    <section style="padding: 75px 0; background: var(--bg-white);">
        <div class="container">
            <div class="section-header">
                <div class="section-tag"><i class="fas fa-hands-helping"></i> Make a Real Difference</div>
                <h2>Why Volunteer With Us?</h2>
                <p>Volunteering with Matri Seva Samiti offers direct grassroots exposure, leadership development, and tangible community impact.</p>
            </div>

            <div class="focus-grid">
                <div class="focus-card">
                    <div class="focus-icon-circle"><i class="fas fa-certificate"></i></div>
                    <h3>Certificate of Service</h3>
                    <p>Receive an official volunteer service certificate and letter of recommendation recognizing your developmental contributions.</p>
                </div>

                <div class="focus-card">
                    <div class="focus-icon-circle"><i class="fas fa-users"></i></div>
                    <h3>Direct Grassroots Exposure</h3>
                    <p>Work directly with village communities, school children, rural women, and marginal farmers to understand grassroots challenges.</p>
                </div>

                <div class="focus-card">
                    <div class="focus-icon-circle"><i class="fas fa-laptop-code"></i></div>
                    <h3>Flexible Opportunities</h3>
                    <p>Options for on-ground field participation or remote digital volunteering (content, fundraising, social media, tutoring).</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Volunteer Application Form -->
    <section style="padding: 75px 0; background: var(--bg-slate);">
        <div class="container" style="max-width: 900px;">
            <div class="contact-form-panel">
                <div class="section-header" style="margin-bottom: 30px;">
                    <div class="section-tag"><i class="fas fa-user-plus"></i> Application Form</div>
                    <h2>Volunteer Registration</h2>
                    <p>Tell us about your interests and availability, and our team will get in touch with you.</p>
                </div>

                <form class="ajax-form" action="process-volunteer.php" method="POST">
                    <div class="donation-form-grid">
                        <div class="form-group">
                            <label for="v_name">Full Name *</label>
                            <input type="text" id="v_name" name="name" class="form-control" placeholder="e.g. Ananya Roy" required>
                        </div>

                        <div class="form-group">
                            <label for="v_email">Email Address *</label>
                            <input type="email" id="v_email" name="email" class="form-control" placeholder="ananya@example.com" required>
                        </div>

                        <div class="form-group">
                            <label for="v_phone">Mobile Number (WhatsApp) *</label>
                            <input type="tel" id="v_phone" name="phone" class="form-control" placeholder="+91 9876543210" required>
                        </div>

                        <div class="form-group">
                            <label for="v_city">City & State *</label>
                            <input type="text" id="v_city" name="city" class="form-control" placeholder="e.g. Prayagraj, UP" required>
                        </div>

                        <div class="form-group">
                            <label for="v_role">Area of Interest *</label>
                            <select id="v_role" name="role" class="form-control" required>
                                <option value="">-- Select Field of Interest --</option>
                                <option value="education">Teaching / Child Remedial Tutoring</option>
                                <option value="health">Medical Camps / Healthcare Support</option>
                                <option value="women">Women Empowerment & SHG Mentorship</option>
                                <option value="skills">Digital Skills & Computer Training</option>
                                <option value="digital">Social Media / Content / Graphic Design</option>
                                <option value="event">Event Coordination & Logistics</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="v_availability">Weekly Availability *</label>
                            <select id="v_availability" name="availability" class="form-control" required>
                                <option value="weekends">Weekends Only (Saturdays / Sundays)</option>
                                <option value="part_time">Part-Time (5 - 10 hours/week)</option>
                                <option value="full_time">Full-Time Internship (1 - 3 months)</option>
                                <option value="remote">Remote / Online Volunteering</option>
                            </select>
                        </div>

                        <div class="form-group full-width">
                            <label for="v_bio">Brief Bio / Prior Experience</label>
                            <textarea id="v_bio" name="bio" class="form-control" rows="4" placeholder="Tell us a little about your background, skills, and why you want to volunteer with Matri Seva Samiti..."></textarea>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary btn-lg" style="width: 100%; margin-top: 10px;">
                        <i class="fas fa-paper-plane"></i> Submit Volunteer Application
                    </button>
                </form>
            </div>
        </div>
    </section>
</main>

<?php include 'includes/footer.php'; ?>
