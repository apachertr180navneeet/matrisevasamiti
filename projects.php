<?php 
$page_title = "Our Projects - Matri Seva Samiti | Grassroots Initiatives";
include 'includes/header.php'; 
?>

<main>
    <!-- Page Hero -->
    <section class="page-hero">
        <img src="images/projectherobg.png" alt="Projects Background" class="page-hero-bg">
        <div class="container">
            <div class="breadcrumb">
                <a href="index.php">Home</a> <span>/</span> <span>Projects</span>
            </div>
            <h1>Our <span class="highlight">Projects</span></h1>
            <p>Real grassroots development initiatives transforming communities through tangible actions.</p>
        </div>
    </section>

    <!-- Projects Section -->
    <section style="padding: 75px 0; background: var(--bg-slate);">
        <div class="container">
            <!-- Filter Tabs -->
            <div class="gallery-filter-tabs">
                <button class="gallery-tab-btn active" onclick="filterProjects('all', event)">All Projects</button>
                <button class="gallery-tab-btn" onclick="filterProjects('completed', event)">Completed</button>
                <button class="gallery-tab-btn" onclick="filterProjects('ongoing', event)">Ongoing</button>
                <button class="gallery-tab-btn" onclick="filterProjects('upcoming', event)">Upcoming</button>
            </div>

            <!-- Projects Grid -->
            <div class="projects-grid">
                <!-- Project 1 -->
                <div class="project-card" data-category="completed">
                    <div class="project-thumb-wrap">
                        <img src="images/project1.jpeg" alt="Rural Youth Skill Training">
                        <span class="project-status-tag status-completed">Completed</span>
                    </div>
                    <div class="project-body">
                        <div class="project-category">Skill Development</div>
                        <h3>Empowering Rural Youth Through Skill Training</h3>
                        <p>Comprehensive vocational and technical training program providing market-relevant certifications and placement assistance to economically weaker village youth.</p>
                        <div class="project-meta-strip">
                            <span><i class="fas fa-map-marker-alt"></i> Prayagraj, UP</span>
                            <span><i class="fas fa-user-friends"></i> 150 Beneficiaries</span>
                        </div>
                    </div>
                </div>

                <!-- Project 2 -->
                <div class="project-card" data-category="completed">
                    <div class="project-thumb-wrap">
                        <img src="images/project2.jpg" alt="Documentation Executive Training">
                        <span class="project-status-tag status-completed">Completed</span>
                    </div>
                    <div class="project-body">
                        <div class="project-category">Digital & Office Skills</div>
                        <h3>Documentation Executive Training Program</h3>
                        <p>Specialized administration, spreadsheet, and computerized record-keeping workshop preparing rural trainees for modern back-office jobs.</p>
                        <div class="project-meta-strip">
                            <span><i class="fas fa-map-marker-alt"></i> Bhadohi, UP</span>
                            <span><i class="fas fa-user-friends"></i> 75 Beneficiaries</span>
                        </div>
                    </div>
                </div>

                <!-- Project 3 -->
                <div class="project-card" data-category="ongoing">
                    <div class="project-thumb-wrap">
                        <img src="images/project3.jpg" alt="Rural Health Camp">
                        <span class="project-status-tag status-ongoing">Ongoing</span>
                    </div>
                    <div class="project-body">
                        <div class="project-category">Public Health</div>
                        <h3>Rural Healthcare & Preventive Hygiene Camp</h3>
                        <p>Weekly mobile clinics and medical screening camps delivering free diagnostics, general doctor consultations, and essential medicines to underserved hamlets.</p>
                        <div class="project-meta-strip">
                            <span><i class="fas fa-map-marker-alt"></i> Prayagraj Districts</span>
                            <span><i class="fas fa-user-friends"></i> 500+ Villagers</span>
                        </div>
                    </div>
                </div>

                <!-- Project 4 -->
                <div class="project-card" data-category="ongoing">
                    <div class="project-thumb-wrap">
                        <img src="images/student2.jpeg" alt="Women Self Help Groups">
                        <span class="project-status-tag status-ongoing">Ongoing</span>
                    </div>
                    <div class="project-body">
                        <div class="project-category">Women Empowerment</div>
                        <h3>Women's Self-Help Group Tailoring Enterprise</h3>
                        <p>Establishment of micro-sewing clusters and collective marketing for rural women artisans to produce uniform garments and cloth bags.</p>
                        <div class="project-meta-strip">
                            <span><i class="fas fa-map-marker-alt"></i> Multiple Villages</span>
                            <span><i class="fas fa-user-friends"></i> 200+ Women</span>
                        </div>
                    </div>
                </div>

                <!-- Project 5 -->
                <div class="project-card" data-category="upcoming">
                    <div class="project-thumb-wrap">
                        <img src="images/student1.jpeg" alt="Digital Literacy in Rural Schools">
                        <span class="project-status-tag status-upcoming">Upcoming</span>
                    </div>
                    <div class="project-body">
                        <div class="project-category">Education</div>
                        <h3>Digital Literacy Labs in Rural Government Schools</h3>
                        <p>Equipping rural schools with solar-powered computer stations, interactive smart screens, and digital learning content for rural pupils.</p>
                        <div class="project-meta-strip">
                            <span><i class="fas fa-map-marker-alt"></i> 10 Rural Schools</span>
                            <span><i class="fas fa-user-friends"></i> 300+ Students</span>
                        </div>
                    </div>
                </div>

                <!-- Project 6 -->
                <div class="project-card" data-category="upcoming">
                    <div class="project-thumb-wrap">
                        <img src="images/agriculture1.jpg" alt="Sustainable Agriculture Training">
                        <span class="project-status-tag status-upcoming">Upcoming</span>
                    </div>
                    <div class="project-body">
                        <div class="project-category">Environment & Farming</div>
                        <h3>Sustainable Organic Agriculture Training</h3>
                        <p>Hands-on capacity building for small farmers on organic vermicomposting, bio-pesticides, drip irrigation, and direct consumer market access.</p>
                        <div class="project-meta-strip">
                            <span><i class="fas fa-map-marker-alt"></i> Eastern UP</span>
                            <span><i class="fas fa-user-friends"></i> 100+ Farmers</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Bottom CTA -->
    <section class="cta-banner-section">
        <div class="container">
            <div class="cta-banner-content">
                <h2>Have a Project in Mind or Want to Support One?</h2>
                <p>Collaborate with us to implement impactful developmental projects under your CSR initiatives.</p>
                <div class="cta-banner-buttons">
                    <a href="donate.php" class="btn btn-primary btn-lg"><i class="fas fa-heart"></i> Fund a Project</a>
                    <a href="contact.php" class="btn btn-outline btn-lg"><i class="fas fa-handshake"></i> Propose Partnership</a>
                </div>
            </div>
        </div>
    </section>
</main>

<?php include 'includes/footer.php'; ?>