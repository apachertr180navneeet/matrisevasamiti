<?php include 'includes/header.php'; ?>

<main>
    <!-- 1. Hero Section -->
    <section class="hero-new">
        <div class="hero-slider">
            <img src="images/herobg.png" alt="Hero Background 1" class="hero-slide active">
            <img src="images/herobg1.png" alt="Hero Background 2" class="hero-slide">
            <img src="images/herobg2.png" alt="Hero Background 3" class="hero-slide">
        </div>
        <div class="hero-overlay"></div>
        <div class="hero-content-new">
            <h1>MATRI SEVA SAMITI</h1>
            <p>"मिलकर करें प्रयास, खुशहाल हो समाज"</p>
            <div class="hero-buttons">
                <a href="projects.php" class="btn-primary">Explore Our Work</a>
                <a href="donate.php" class="btn-secondary">Donate Now</a>
            </div>
        </div>
    </section>

    <!-- Simple Slider Script -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const slides = document.querySelectorAll('.hero-slide');
            let currentSlide = 0;
            if (slides.length > 0) {
                setInterval(() => {
                    slides[currentSlide].classList.remove('active');
                    currentSlide = (currentSlide + 1) % slides.length;
                    slides[currentSlide].classList.add('active');
                }, 5000); // Change image every 5 seconds
            }
        });
    </script>

    <!-- 2. Quick Impact -->
    <section class="container">
        <div class="quick-impact">
            <div class="impact-grid">
                <div class="impact-item">
                    <h3>5+</h3>
                    <p>Years of Service</p>
                </div>
                <div class="impact-item">
                    <h3>50+</h3>
                    <p>Projects Completed</p>
                </div>
                <div class="impact-item">
                    <h3>15,000+</h3>
                    <p>Beneficiaries</p>
                </div>
                <div class="impact-item">
                    <h3>120+</h3>
                    <p>Volunteers</p>
                </div>
            </div>
        </div>
    </section>

    <!-- 3. About Us -->
    <section class="about-section-new">
        <div class="container about-container">
            <h2>About Us</h2>
            <p>
                Established in April 1995, Matri Seva Samiti is a non-profit organization dedicated to uplifting rural and marginalized communities across India. Inspired by the vision of a self-reliant nation, we work tirelessly in the fields of education, health, women empowerment, and skill development to bring lasting change.
            </p>
            <a href="about.php" class="btn-primary">Read More</a>
        </div>
    </section>

    <!-- 4. Our Focus Areas -->
    <section class="focus-areas">
        <div class="container">
            <div class="section-header">
                <h2>Our Focus Areas</h2>
            </div>
            <div class="focus-grid">
                <div class="focus-card">
                    <i class="fas fa-book-open focus-icon"></i>
                    <h3>Education</h3>
                </div>
                <div class="focus-card">
                    <i class="fas fa-heartbeat focus-icon"></i>
                    <h3>Health</h3>
                </div>
                <div class="focus-card">
                    <i class="fas fa-female focus-icon"></i>
                    <h3>Women Empowerment</h3>
                </div>
                <div class="focus-card">
                    <i class="fas fa-leaf focus-icon"></i>
                    <h3>Environment</h3>
                </div>
                <div class="focus-card">
                    <i class="fas fa-tools focus-icon"></i>
                    <h3>Skill Development</h3>
                </div>
                <div class="focus-card">
                    <i class="fas fa-child focus-icon"></i>
                    <h3>Child Protection</h3>
                </div>
            </div>
        </div>
    </section>

    <!-- 5. Featured Projects -->
    <section class="featured-projects">
        <div class="container">
            <div class="section-header">
                <h2>Featured Projects</h2>
            </div>
            <div class="projects-grid-new">
                <div class="project-card-new">
                    <img src="images/student1.jpeg" alt="Project 1" class="project-img">
                    <div class="project-info">
                        <h3>Skill Development For Rural Youth</h3>
                        <div class="project-meta">
                            Objective: <span>Empowerment through skills</span><br>
                            Beneficiaries: <span>200+ Youths</span>
                        </div>
                        <a href="projects.php" class="btn-secondary" style="color: var(--navy-blue); border-color: var(--navy-blue);">Read More</a>
                    </div>
                </div>
                <div class="project-card-new">
                    <img src="images/project3.jpg" alt="Project 2" class="project-img">
                    <div class="project-info">
                        <h3>Rural Healthcare Initiative</h3>
                        <div class="project-meta">
                            Objective: <span>Accessible medical care</span><br>
                            Beneficiaries: <span>1000+ Villagers</span>
                        </div>
                        <a href="projects.php" class="btn-secondary" style="color: var(--navy-blue); border-color: var(--navy-blue);">Read More</a>
                    </div>
                </div>
                <div class="project-card-new">
                    <img src="images/student2.jpeg" alt="Project 3" class="project-img">
                    <div class="project-info">
                        <h3>Women Self-Help Groups</h3>
                        <div class="project-meta">
                            Objective: <span>Financial independence</span><br>
                            Beneficiaries: <span>500+ Women</span>
                        </div>
                        <a href="projects.php" class="btn-secondary" style="color: var(--navy-blue); border-color: var(--navy-blue);">Read More</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 6. Our Impact -->
    <section class="impact-map">
        <div class="container">
            <div class="section-header">
                <h2>Our Impact Across India</h2>
            </div>
            <div class="map-container">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14532292.052739343!2d70.4705030282436!3d22.569562725039234!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30635ff06b92b791%3A0xd78c4fa1854213a6!2sIndia!5e0!3m2!1sen!2sin!4v1703212030737!5m2!1sen!2sin" width="100%" height="450" style="border:0; border-radius: 15px; box-shadow: 0 5px 15px rgba(0,0,0,0.1);" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </section>

    <!-- 7. Success Stories -->
    <section class="success-stories">
        <div class="container">
            <div class="section-header">
                <h2>Success Stories</h2>
            </div>
            <div class="story-grid">
                <div class="story-card">
                    <p class="story-text">
                        "Thanks to the skill development program by Matri Seva Samiti, I now run my own tailoring shop and support my family. My life has completely changed for the better."
                    </p>
                    <div class="story-author">
                        <img src="images/student1.jpeg" alt="Rani Devi" style="width:60px; height:60px; border-radius:50%; object-fit: cover;">
                        <div class="author-info">
                            <h4>Rani Devi</h4>
                            <p>Prayagraj, UP</p>
                        </div>
                    </div>
                </div>
                <div class="story-card">
                    <p class="story-text">
                        "The free health camp helped diagnose my mother's illness early. The medicines and care provided by the NGO volunteers were a lifesaver for us."
                    </p>
                    <div class="story-author">
                        <img src="images/student2.jpeg" alt="Ramesh Kumar" style="width:60px; height:60px; border-radius:50%; object-fit: cover;">
                        <div class="author-info">
                            <h4>Ramesh Kumar</h4>
                            <p>Rural Beneficiary</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 8. Gallery -->
    <section class="gallery-preview">
        <div class="container">
            <div class="section-header">
                <h2>Moments of Change</h2>
            </div>
            <div class="gallery-grid">
                <div class="gallery-item"><img src="images/student1.jpeg" alt="Gallery"></div>
                <div class="gallery-item"><img src="images/student2.jpeg" alt="Gallery"></div>
                <div class="gallery-item"><img src="images/student3.jpeg" alt="Gallery"></div>
                <div class="gallery-item"><img src="images/project1.jpeg" alt="Gallery"></div>
            </div>
            <div style="text-align: center; margin-top: 40px;">
                <a href="gallery.php" class="btn-primary">View Full Gallery</a>
            </div>
        </div>
    </section>

    <!-- 9. Our Partners & 10. Recognition -->
    <section class="partners-recognition">
        <div class="container">
            <div class="section-header">
                <h2>Our Registrations & Certifications</h2>
            </div>
            <div class="logos-flex">
                <div class="logo-item">
                    <h4>NGO Darpan</h4>
                </div>
                <div class="logo-item">
                    <h4>12A Registered</h4>
                </div>
                <div class="logo-item">
                    <h4>80G Registered</h4>
                </div>
                <div class="logo-item">
                    <h4>CSR-1 Approved</h4>
                </div>
                <div class="logo-item">
                    <h4>ISO Certified</h4>
                </div>
            </div>
        </div>
    </section>

    <!-- 11. Latest News -->
    <section class="featured-projects" style="background-color: var(--white);">
        <div class="container">
            <div class="section-header">
                <h2>Latest News & Updates</h2>
            </div>
            <div class="projects-grid-new">
                <div class="project-card-new" style="padding: 20px;">
                    <h3 style="color: var(--navy-blue);">New Health Camp in Bhadohi</h3>
                    <p style="color: var(--gray-text); margin: 10px 0;">We recently organized a free health checkup camp serving over 500 residents.</p>
                    <a href="ngo-news.php" style="color: var(--orange); font-weight: 600; text-decoration: none;">Read Full Story &rarr;</a>
                </div>
                <div class="project-card-new" style="padding: 20px;">
                    <h3 style="color: var(--navy-blue);">Skill Training Graduation</h3>
                    <p style="color: var(--gray-text); margin: 10px 0;">150 youths successfully completed our computer literacy program.</p>
                    <a href="ngo-news.php" style="color: var(--orange); font-weight: 600; text-decoration: none;">Read Full Story &rarr;</a>
                </div>
                <div class="project-card-new" style="padding: 20px;">
                    <h3 style="color: var(--navy-blue);">Tree Plantation Drive</h3>
                    <p style="color: var(--gray-text); margin: 10px 0;">Celebrating World Environment Day by planting 1000+ saplings.</p>
                    <a href="ngo-news.php" style="color: var(--orange); font-weight: 600; text-decoration: none;">Read Full Story &rarr;</a>
                </div>
            </div>
        </div>
    </section>

    <!-- 12. Donate Section -->
    <section class="donate-section-new">
        <div class="container donate-container">
            <div class="donate-info">
                <h2>Support Our Cause</h2>
                <p>Your contribution helps us expand our reach and make a tangible difference in the lives of those who need it most. Every donation, big or small, counts.</p>
                <div class="bank-details" style="margin-top: 30px; line-height: 1.6; font-size: 15px;">
                    <p><span style="color: var(--white); font-weight: 600;">Account Name:</span> Matri Seva Samiti</p>
                    <p><span style="color: var(--white); font-weight: 600;">Account No:</span> 50200072951175</p>
                    <p><span style="color: var(--white); font-weight: 600;">Bank Name:</span> HDFC Bank Ltd.</p>
                    <p><span style="color: var(--white); font-weight: 600;">IFSC Code:</span> HDFC0002434</p>
                    <p><span style="color: var(--white); font-weight: 600;">Branch:</span> House No 1/1, Awas Vikas Jhusi, Allahabad-211019, UP</p>
                </div>
                <br>
                <a href="donate.php" class="btn-primary" style="background-color: var(--white); color: var(--navy-blue); border-color: var(--white);">Donate via Card/NetBanking</a>
            </div>
            <div class="payment-methods">
                <h3 style="text-align: center; margin-bottom: 20px; color: var(--navy-blue);">Scan to Donate via UPI</h3>
                <div class="qr-code">
                    <img src="images/scanner.jpeg" alt="QR Code for Payment" style="width: 200px; height: 200px; border: 2px solid var(--orange); border-radius: 10px; margin: 0 auto; display: block; object-fit: contain; background: white;">
                </div>
                <p style="text-align: center; font-weight: 600;">UPI ID: 9415451910@ybl</p>
            </div>
        </div>
    </section>

    <!-- 13. Contact Section -->
    <section class="contact-section-new">
        <div class="container">
            <div class="section-header">
                <h2>Get In Touch</h2>
            </div>
            <div class="contact-grid">
                <div class="contact-details">
                    <div class="contact-item">
                        <div class="contact-icon"><i class="fas fa-map-marker-alt"></i></div>
                        <div>
                            <h4>Address</h4>
                            <p>01 NAIKA CHHATNAG ROAD NEAR RAM SHIV COLONY JHUNSI PRAYAGRAJ UP 211019</p>
                        </div>
                    </div>
                    <div class="contact-item">
                        <div class="contact-icon"><i class="fas fa-envelope"></i></div>
                        <div>
                            <h4>Email Us</h4>
                            <p>matrisevasamiti1910@gmail.com</p>
                        </div>
                    </div>
                    <div class="contact-item">
                        <div class="contact-icon"><i class="fas fa-phone"></i></div>
                        <div>
                            <h4>Call Us</h4>
                            <p>+91 9415451910</p>
                        </div>
                    </div>
                    <div class="contact-item">
                        <div class="contact-icon"><i class="fab fa-whatsapp"></i></div>
                        <div>
                            <h4>WhatsApp</h4>
                            <p>+91 9838291910</p>
                        </div>
                    </div>
                </div>
                <div class="map-embed">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d115291.68341775799!2d81.7925691060933!3d25.44111326493202!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x398534c9b20bd49f%3A0xa2237856ad4041a!2sPrayagraj%2C%20Uttar%20Pradesh!5e0!3m2!1sen!2sin!4v1700000000000!5m2!1sen!2sin" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </section>

</main>

<?php include 'includes/footer.php'; ?>