    <!-- ==========================================================================
         CLEAN MINIMAL FOOTER (AS IN REFERENCE)
         ========================================================================== -->
    <footer class="minimal-footer">
        <div class="container">
            <div class="footer-main-grid">
                <!-- Col 1: About & Branding -->
                <div class="footer-col">
                    <div style="display: flex; align-items: center; gap: 10px; margin-bottom: 16px;">
                        <img src="logo/Logo.png" alt="Matri Seva Samiti Logo" style="height: 40px; width: auto;">
                        <h4 style="margin-bottom: 0; font-size: 1.25rem;">Matri Seva Samiti</h4>
                    </div>
                    <p>
                        Dedicated to grassroots rural development, education, healthcare, and women empowerment across India since 1995.
                    </p>
                    <div style="display: flex; gap: 10px; margin-top: 18px;">
                        <a href="<?php echo defined('FACEBOOK_URL') ? FACEBOOK_URL : '#'; ?>" target="_blank" class="top-social-link" style="background: var(--forest-light); color: var(--forest-700);"><i class="fab fa-facebook-f"></i></a>
                        <a href="<?php echo defined('TWITTER_URL') ? TWITTER_URL : '#'; ?>" target="_blank" class="top-social-link" style="background: var(--forest-light); color: var(--forest-700);"><i class="fab fa-twitter"></i></a>
                        <a href="<?php echo defined('INSTAGRAM_URL') ? INSTAGRAM_URL : '#'; ?>" target="_blank" class="top-social-link" style="background: var(--forest-light); color: var(--forest-700);"><i class="fab fa-instagram"></i></a>
                        <a href="<?php echo defined('LINKEDIN_URL') ? LINKEDIN_URL : '#'; ?>" target="_blank" class="top-social-link" style="background: var(--forest-light); color: var(--forest-700);"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>

                <!-- Col 2: Useful Links -->
                <div class="footer-col">
                    <h4>Quick Links</h4>
                    <ul>
                        <li><a href="about.php">About Us</a></li>
                        <li><a href="programs.php">Our Services</a></li>
                        <li><a href="projects.php">Explore Projects</a></li>
                        <li><a href="impact.php">Our Impact</a></li>
                        <li><a href="certificate.php">Statutory Documents</a></li>
                        <li><a href="contact.php">Contact Us</a></li>
                    </ul>
                </div>

                <!-- Col 3: Get In Touch -->
                <div class="footer-col">
                    <h4>Get In Touch</h4>
                    <div class="footer-contact-item">
                        <i class="fas fa-map-marker-alt"></i>
                        <span>Prayagraj (Allahabad), Uttar Pradesh, India - 211019</span>
                    </div>
                    <div class="footer-contact-item">
                        <i class="fas fa-envelope"></i>
                        <a href="mailto:matrisevasamiti1910@gmail.com" style="color: var(--text-muted);">matrisevasamiti1910@gmail.com</a>
                    </div>
                    <div class="footer-contact-item">
                        <i class="fas fa-phone-alt"></i>
                        <a href="tel:+919415451910" style="color: var(--text-muted);">+91-9415451910</a>
                    </div>
                </div>

                <!-- Col 4: Newsletter -->
                <div class="footer-col">
                    <h4>Join A Newsletter</h4>
                    <p style="font-size: 0.88rem;">Stay informed on our community progress and upcoming health camps.</p>
                    <form class="footer-newsletter-form" onsubmit="event.preventDefault(); alert('Thank you for subscribing to Matri Seva Samiti newsletter!');">
                        <input type="email" placeholder="Your Email" class="footer-newsletter-input" required>
                        <button type="submit" class="btn btn-gold btn-sm" style="width: 100%; font-weight: 700;">
                            SUBSCRIBE
                        </button>
                    </form>
                </div>
            </div>

            <!-- Bottom Copyright -->
            <div class="footer-copyright-strip">
                <p>© <?php echo date('Y'); ?> Matri Seva Samiti. All rights reserved. | <a href="privacy.php" style="color: var(--text-muted);">Privacy</a> • <a href="terms.php" style="color: var(--text-muted);">Terms</a> • <a href="disclaimer.php" style="color: var(--text-muted);">Disclaimer</a></p>
            </div>
        </div>
    </footer>

    <!-- Floating Action Group -->
    <div class="floating-action-group">
        <a href="donate.php" class="floating-btn float-donate" style="background: var(--gold-primary); color: var(--forest-900);" title="Donate Now">
            <i class="fas fa-hand-holding-heart"></i>
        </a>
        <button id="floatTopBtn" class="floating-btn float-top" style="background: var(--forest-800);" title="Scroll to top">
            <i class="fas fa-arrow-up"></i>
        </button>
    </div>

    <!-- Scripts -->
    <script src="assets/js/main.js"></script>
</body>
</html>