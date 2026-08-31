    <!-- ==========================================================================
         FOOTER SECTION
         ========================================================================== -->
    <footer class="main-footer">
        <div class="container">
            <div class="footer-top-grid">
                <!-- Column 1: About & Mission -->
                <div class="footer-col footer-about">
                    <div style="display: flex; align-items: center; gap: 12px; margin-bottom: 18px;">
                        <img src="logo/Logo.png" alt="Matri Seva Samiti" style="height: 48px; width: auto;">
                        <h3 style="margin-bottom: 0; padding-bottom: 0;">Matri Seva Samiti</h3>
                    </div>
                    <p>
                        Established in 1995, Matri Seva Samiti is a dedicated non-profit organization transforming rural India through quality education, healthcare camps, women empowerment, and skill development initiatives.
                    </p>
                    <div class="footer-credentials">
                        <span class="cred-pill"><i class="fas fa-shield-alt"></i> 80G Certified</span>
                        <span class="cred-pill"><i class="fas fa-file-invoice"></i> 12A Registered</span>
                        <span class="cred-pill"><i class="fas fa-handshake"></i> CSR-1 Compliant</span>
                        <span class="cred-pill"><i class="fas fa-check-circle"></i> NGO Darpan</span>
                    </div>
                </div>

                <!-- Column 2: Quick Links -->
                <div class="footer-col">
                    <h3>Explore</h3>
                    <ul class="footer-links">
                        <li><a href="about.php"><i class="fas fa-angle-right"></i> About Us & Story</a></li>
                        <li><a href="programs.php"><i class="fas fa-angle-right"></i> Core Programs</a></li>
                        <li><a href="projects.php"><i class="fas fa-angle-right"></i> Ongoing Projects</a></li>
                        <li><a href="impact.php"><i class="fas fa-angle-right"></i> Our Impact & Reach</a></li>
                        <li><a href="certificate.php"><i class="fas fa-angle-right"></i> Legal Documents</a></li>
                        <li><a href="gallery.php"><i class="fas fa-angle-right"></i> Photo & Video Gallery</a></li>
                        <li><a href="ngo-news.php"><i class="fas fa-angle-right"></i> News & Press Releases</a></li>
                    </ul>
                </div>

                <!-- Column 3: Get Involved -->
                <div class="footer-col">
                    <h3>Get Involved</h3>
                    <ul class="footer-links">
                        <li><a href="donate.php"><i class="fas fa-angle-right"></i> Donate with 80G Benefit</a></li>
                        <li><a href="volunteer.php"><i class="fas fa-angle-right"></i> Become a Volunteer</a></li>
                        <li><a href="grants.php"><i class="fas fa-angle-right"></i> CSR & Grant Partnerships</a></li>
                        <li><a href="career.php"><i class="fas fa-angle-right"></i> Careers & Internships</a></li>
                        <li><a href="faq.php"><i class="fas fa-angle-right"></i> Frequently Asked Questions</a></li>
                        <li><a href="media.php"><i class="fas fa-angle-right"></i> Media Coverage</a></li>
                    </ul>
                </div>

                <!-- Column 4: Contact & Reach Us -->
                <div class="footer-col">
                    <h3>Contact Us</h3>
                    <ul class="footer-contact-list">
                        <li>
                            <i class="fas fa-map-marker-alt"></i>
                            <span>Head Office: Prayagraj (Allahabad), Uttar Pradesh, India - 211019</span>
                        </li>
                        <li>
                            <i class="fas fa-phone-alt"></i>
                            <a href="tel:+919415451910" style="color: rgba(255,255,255,0.85);">+91-9415451910</a>
                        </li>
                        <li>
                            <i class="fas fa-envelope"></i>
                            <a href="mailto:matrisevasamiti1910@gmail.com" style="color: rgba(255,255,255,0.85);">matrisevasamiti1910@gmail.com</a>
                        </li>
                    </ul>

                    <div class="footer-social-links">
                        <a href="<?php echo defined('FACEBOOK_URL') ? FACEBOOK_URL : 'https://facebook.com'; ?>" target="_blank" class="footer-social-btn" title="Facebook"><i class="fab fa-facebook-f"></i></a>
                        <a href="<?php echo defined('TWITTER_URL') ? TWITTER_URL : 'https://twitter.com'; ?>" target="_blank" class="footer-social-btn" title="Twitter"><i class="fab fa-twitter"></i></a>
                        <a href="<?php echo defined('INSTAGRAM_URL') ? INSTAGRAM_URL : 'https://instagram.com'; ?>" target="_blank" class="footer-social-btn" title="Instagram"><i class="fab fa-instagram"></i></a>
                        <a href="<?php echo defined('LINKEDIN_URL') ? LINKEDIN_URL : 'https://linkedin.com'; ?>" target="_blank" class="footer-social-btn" title="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                        <a href="<?php echo defined('YOUTUBE_URL') ? YOUTUBE_URL : 'https://youtube.com'; ?>" target="_blank" class="footer-social-btn" title="YouTube"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
            </div>

            <!-- Footer Bottom Bar -->
            <div class="footer-bottom">
                <p>© <?php echo date('Y'); ?> Matri Seva Samiti. All rights reserved. Registered under Societies Registration Act, 1860.</p>
                <div class="footer-bottom-links">
                    <a href="privacy.php">Privacy Policy</a>
                    <a href="terms.php">Terms & Conditions</a>
                    <a href="disclaimer.php">Disclaimer</a>
                    <a href="contact.php">Support</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Floating Action Group -->
    <div class="floating-action-group">
        <a href="donate.php" class="floating-btn float-donate" title="Donate Now">
            <i class="fas fa-hand-holding-heart"></i>
        </a>
        <button id="floatTopBtn" class="floating-btn float-top" title="Scroll to top">
            <i class="fas fa-arrow-up"></i>
        </button>
    </div>

    <!-- Scripts -->
    <script src="assets/js/main.js"></script>
</body>
</html>