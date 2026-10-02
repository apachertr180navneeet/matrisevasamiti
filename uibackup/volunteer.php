<?php 
$page_title = "Volunteer With Us - Matri Seva Samiti";
include 'includes/header.php'; 

$selectedRole = isset($_GET['role']) ? htmlspecialchars($_GET['role']) : '';
?>

<main>
    <!-- BREADCRUMBS -->
    <section class="ul-breadcrumb ul-section-spacing">
        <div class="ul-container">
            <h2 class="ul-breadcrumb-title">Become a Volunteer</h2>
            <ul class="ul-breadcrumb-nav">
                <li><a href="index.php">Home</a></li>
                <li><span class="separator"><i class="flaticon-right"></i></span></li>
                <li>Volunteer</li>
            </ul>
        </div>
    </section>

    <!-- VOLUNTEER BENEFITS & ROLES -->
    <section class="ul-section-spacing">
        <div class="ul-container">
            <div class="ul-section-heading text-center">
                <div>
                    <span class="ul-section-sub-title">Make a Difference</span>
                    <h2 class="ul-section-title">Join 450+ Dedicated Changemakers</h2>
                    <p class="ul-section-descr">Whether you can give 2 hours a week or lead on-ground weekend campaigns, your skills and compassion matter.</p>
                </div>
            </div>

            <div class="row row-cols-lg-3 row-cols-md-2 row-cols-1 gy-4 mb-5">
                <div class="col">
                    <div class="card h-100 p-4 border-0 shadow-sm rounded-4 text-center">
                        <div class="mx-auto mb-3 p-3 rounded-circle d-inline-flex align-items-center justify-content-center" style="width:70px; height:70px; background: rgba(235, 83, 16, 0.1); color: var(--ul-primary); font-size: 28px;">
                            <i class="flaticon-love"></i>
                        </div>
                        <h4 class="mb-2 text-dark">Field Leadership</h4>
                        <p class="text-muted" style="font-size: 14px;">Lead village health camps, teaching sessions, ration distribution, and student mentorship directly.</p>
                    </div>
                </div>

                <div class="col">
                    <div class="card h-100 p-4 border-0 shadow-sm rounded-4 text-center">
                        <div class="mx-auto mb-3 p-3 rounded-circle d-inline-flex align-items-center justify-content-center" style="width:70px; height:70px; background: rgba(235, 83, 16, 0.1); color: var(--ul-primary); font-size: 28px;">
                            <i class="flaticon-price-tag"></i>
                        </div>
                        <h4 class="mb-2 text-dark">Official Experience Certificate</h4>
                        <p class="text-muted" style="font-size: 14px;">Receive an official verified Certificate of Volunteering acknowledging your social leadership and hours.</p>
                    </div>
                </div>

                <div class="col">
                    <div class="card h-100 p-4 border-0 shadow-sm rounded-4 text-center">
                        <div class="mx-auto mb-3 p-3 rounded-circle d-inline-flex align-items-center justify-content-center" style="width:70px; height:70px; background: rgba(235, 83, 16, 0.1); color: var(--ul-primary); font-size: 28px;">
                            <i class="flaticon-account"></i>
                        </div>
                        <h4 class="mb-2 text-dark">Virtual &amp; Hybrid Roles</h4>
                        <p class="text-muted" style="font-size: 14px;">Contribute remotely in digital awareness, social media, translations, fundraising, and curriculum design.</p>
                    </div>
                </div>
            </div>

            <!-- APPLICATION FORM -->
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="card p-4 p-md-5 border-0 shadow-sm rounded-4" style="background: #ffffff;">
                        <span class="ul-section-sub-title text-center d-block">Get Involved</span>
                        <h2 class="ul-section-title text-center mb-4">Volunteer Application Form</h2>

                        <form action="process-volunteer.php" method="POST">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label font-semibold">Full Name *</label>
                                    <input type="text" name="name" class="form-control form-control-lg" placeholder="e.g. Rahul Sharma" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label font-semibold">Email Address *</label>
                                    <input type="email" name="email" class="form-control form-control-lg" placeholder="rahul@example.com" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label font-semibold">Mobile Number *</label>
                                    <input type="tel" name="phone" class="form-control form-control-lg" placeholder="+91 98765 43210" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label font-semibold">City / Location *</label>
                                    <input type="text" name="city" class="form-control form-control-lg" placeholder="e.g. New Delhi / Prayagraj" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label font-semibold">Preferred Area of Contribution</label>
                                    <select name="interest" class="form-select form-select-lg">
                                        <option value="education" <?php echo $selectedRole == 'education' ? 'selected' : ''; ?>>Teaching &amp; Child Education</option>
                                        <option value="healthcare" <?php echo $selectedRole == 'healthcare' ? 'selected' : ''; ?>>Medical Camps &amp; First Aid</option>
                                        <option value="women" <?php echo $selectedRole == 'women' ? 'selected' : ''; ?>>Women Skill Training &amp; SHGs</option>
                                        <option value="digital" <?php echo $selectedRole == 'digital' ? 'selected' : ''; ?>>Content, Design &amp; Social Media</option>
                                        <option value="events" <?php echo $selectedRole == 'events' ? 'selected' : ''; ?>>Event &amp; Campaign Coordination</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label font-semibold">Time Availability</label>
                                    <select name="availability" class="form-select form-select-lg">
                                        <option value="weekends">Weekends Only (2-4 hrs/week)</option>
                                        <option value="weekdays">Weekdays (Flexible)</option>
                                        <option value="fulltime">Full Time Internship (1-3 months)</option>
                                        <option value="virtual">Remote / Online Only</option>
                                    </select>
                                </div>
                                <div class="col-12">
                                    <label class="form-label font-semibold">Brief Introduction &amp; Skills</label>
                                    <textarea name="message" rows="4" class="form-control" placeholder="Share a few words about your background, interests, and how you wish to support..."></textarea>
                                </div>
                                <div class="col-12 mt-4">
                                    <button type="submit" class="ul-btn w-100 justify-content-center py-3 fs-5">
                                        <i class="flaticon-fast-forward-double-right-arrows-symbol"></i> Submit Volunteer Application
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<?php include 'includes/footer.php'; ?>
