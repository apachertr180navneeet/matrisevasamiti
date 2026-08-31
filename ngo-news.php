<?php 
$page_title = "NGO News & Press Updates - Matri Seva Samiti";
include 'includes/header.php'; 
?>

<main>
    <!-- Page Hero -->
    <section class="page-hero">
        <img src="images/newsherobg.png" alt="News Background" class="page-hero-bg">
        <div class="container">
            <div class="breadcrumb">
                <a href="index.php">Home</a> <span>/</span> <span>News & Updates</span>
            </div>
            <h1>Latest News & <span class="highlight">Stories</span></h1>
            <p>Stay updated with our latest field projects, achievements, press coverage, and community milestones.</p>
        </div>
    </section>

    <!-- News Grid Section -->
    <section style="padding: 75px 0; background: var(--bg-slate);">
        <div class="container">
            <div class="section-header text-center">
                <span class="section-tag"><i class="fas fa-newspaper"></i> In The Field</span>
                <h2>Recent News & <span class="text-underline-gold">Press Releases</span></h2>
                <p>Read about our grassroots interventions and community achievements across Uttar Pradesh.</p>
            </div>

            <div class="projects-grid">
                <!-- News 1 -->
                <article class="project-card">
                    <div class="project-thumb-wrap">
                        <img src="images/skill-development-news.jpg" alt="Skill Development Center Launch">
                        <span class="project-status-tag status-ongoing">Featured</span>
                    </div>
                    <div class="project-body">
                        <div class="project-category">Youth Skills • Prayagraj</div>
                        <h3>New Youth Skill Development & Computer Center Inaugurated</h3>
                        <p>Matri Seva Samiti has opened a state-of-the-art vocational center in Jhunsi, equipped with modern computers and sewing machines to train 200+ rural youth annually.</p>
                        <div class="project-meta-strip">
                            <span><i class="fas fa-calendar-alt"></i> August 2025</span>
                            <span><i class="fas fa-tag"></i> Program Launch</span>
                        </div>
                    </div>
                </article>

                <!-- News 2 -->
                <article class="project-card">
                    <div class="project-thumb-wrap">
                        <img src="images/healthcare-camp-news.jpg" alt="Free Health Camp">
                        <span class="project-status-tag status-completed">Health</span>
                    </div>
                    <div class="project-body">
                        <div class="project-category">Public Health • Bhadohi</div>
                        <h3>Free Multi-Specialty Health Camp Reaches 500+ Villagers</h3>
                        <p>In partnership with certified medical practitioners, our mobile healthcare team delivered free consultations, eye screenings, and free medicines in rural villages.</p>
                        <div class="project-meta-strip">
                            <span><i class="fas fa-calendar-alt"></i> July 2025</span>
                            <span><i class="fas fa-tag"></i> Health Camp</span>
                        </div>
                    </div>
                </article>

                <!-- News 3 -->
                <article class="project-card">
                    <div class="project-thumb-wrap">
                        <img src="images/women-empowerment-news.jpg" alt="Women Self Help Groups">
                        <span class="project-status-tag status-completed">Empowerment</span>
                    </div>
                    <div class="project-body">
                        <div class="project-category">Women Welfare • Rural UP</div>
                        <h3>15 New Women Self-Help Groups Established</h3>
                        <p>Mobilized over 180 rural women with micro-finance credit linkages and sewing enterprise training, enabling them to start home-based garment manufacturing.</p>
                        <div class="project-meta-strip">
                            <span><i class="fas fa-calendar-alt"></i> June 2025</span>
                            <span><i class="fas fa-tag"></i> Livelihoods</span>
                        </div>
                    </div>
                </article>

                <!-- News 4 -->
                <article class="project-card">
                    <div class="project-thumb-wrap">
                        <img src="images/education-initiative-news.jpg" alt="Education Initiative">
                        <span class="project-status-tag status-completed">Education</span>
                    </div>
                    <div class="project-body">
                        <div class="project-category">Child Education • Prayagraj</div>
                        <h3>Stationery & Learning Kits Distributed to 300+ Students</h3>
                        <p>Annual back-to-school drive providing school bags, notebooks, and learning aids to underprivileged students from marginal farming families.</p>
                        <div class="project-meta-strip">
                            <span><i class="fas fa-calendar-alt"></i> May 2025</span>
                            <span><i class="fas fa-tag"></i> Education</span>
                        </div>
                    </div>
                </article>

                <!-- News 5 -->
                <article class="project-card">
                    <div class="project-thumb-wrap">
                        <img src="images/rural-development-news.jpg" alt="Organic Farming Drive">
                        <span class="project-status-tag status-completed">Agriculture</span>
                    </div>
                    <div class="project-body">
                        <div class="project-category">Environment • Eastern UP</div>
                        <h3>Sustainable Organic Agriculture Workshop Conducted</h3>
                        <p>Over 100 marginal farmers attended training on bio-fertilizer preparation, vermicomposting, and water-conserving drip irrigation techniques.</p>
                        <div class="project-meta-strip">
                            <span><i class="fas fa-calendar-alt"></i> April 2025</span>
                            <span><i class="fas fa-tag"></i> Farming</span>
                        </div>
                    </div>
                </article>

                <!-- News 6 -->
                <article class="project-card">
                    <div class="project-thumb-wrap">
                        <img src="images/blog1.jpg" alt="Tree Plantation">
                        <span class="project-status-tag status-completed">Environment</span>
                    </div>
                    <div class="project-body">
                        <div class="project-category">Green Mission • Prayagraj</div>
                        <h3>Mass Tree Plantation Drive Along Village Roads</h3>
                        <p>Volunteers and local school children joined hands to plant over 1,500 shade and fruit-bearing trees to improve rural green cover and soil quality.</p>
                        <div class="project-meta-strip">
                            <span><i class="fas fa-calendar-alt"></i> March 2025</span>
                            <span><i class="fas fa-tag"></i> Environment</span>
                        </div>
                    </div>
                </article>
            </div>
        </div>
    </section>

    <!-- Bottom CTA -->
    <section class="cta-banner-section">
        <div class="container">
            <div class="cta-banner-content">
                <h2>Want to Cover Our Story or Feature Our Work?</h2>
                <p>We welcome journalists, researchers, and media houses to visit our grassroots centers and cover our community initiatives.</p>
                <div class="cta-banner-buttons">
                    <a href="media.php" class="btn btn-gold btn-lg"><i class="fas fa-bullhorn"></i> Media & Press Kit</a>
                    <a href="contact.php" class="btn btn-outline-white btn-lg"><i class="fas fa-envelope"></i> Contact Media Relations</a>
                </div>
            </div>
        </div>
    </section>
</main>

<?php include 'includes/footer.php'; ?>