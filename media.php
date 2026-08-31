<?php
$page_title = "Media Coverage & Press Mentions - Matri Seva Samiti";
include 'includes/header.php';
?>

<main>
    <!-- Page Hero -->
    <section class="page-hero">
        <img src="images/MediaCoverageherobg.png" alt="Media Background" class="page-hero-bg">
        <div class="container">
            <div class="breadcrumb">
                <a href="index.php">Home</a> <span>/</span> <span>Media</span>
            </div>
            <h1>Media & <span class="highlight">Press Coverage</span></h1>
            <p>Highlights of Matri Seva Samiti's community impact featured in newspapers, digital portals, and television.</p>
        </div>
    </section>

    <!-- Media Coverage Grid -->
    <section style="padding: 75px 0; background: var(--bg-slate);">
        <div class="container">
            <div class="section-header">
                <div class="section-tag"><i class="fas fa-bullhorn"></i> In The Headlines</div>
                <h2>Press Clippings & Featured Articles</h2>
                <p>Read about our grassroots interventions reported by local and national news outlets.</p>
            </div>

            <div class="projects-grid">
                <!-- Media Item 1 -->
                <div class="project-card">
                    <div class="project-thumb-wrap">
                        <img src="images/skill-development-news.jpg" alt="Press Coverage Youth Skill">
                        <span class="project-status-tag status-completed">Print Media</span>
                    </div>
                    <div class="project-body">
                        <div class="project-category">Dainik Jagran / Amar Ujala</div>
                        <h3>"Rural Youth Find New Hope Through Skill Centers"</h3>
                        <p>Special feature on how our Jhunsi skill center is helping rural school dropouts secure computerized documentation jobs.</p>
                        <div class="project-meta-strip">
                            <span><i class="fas fa-calendar-alt"></i> August 2025</span>
                            <span><i class="fas fa-newspaper"></i> Newspaper Feature</span>
                        </div>
                    </div>
                </div>

                <!-- Media Item 2 -->
                <div class="project-card">
                    <div class="project-thumb-wrap">
                        <img src="images/healthcare-camp-news.jpg" alt="Health Camp Media">
                        <span class="project-status-tag status-completed">Health Journal</span>
                    </div>
                    <div class="project-body">
                        <div class="project-category">Community Health Digest</div>
                        <h3>"Matri Seva Samiti Brings Lifesaving Care to Remote Villages"</h3>
                        <p>Coverage on our weekly mobile health camps delivering free eye care, diagnostic checks, and maternal care to 500+ villagers.</p>
                        <div class="project-meta-strip">
                            <span><i class="fas fa-calendar-alt"></i> July 2025</span>
                            <span><i class="fas fa-newspaper"></i> Health Feature</span>
                        </div>
                    </div>
                </div>

                <!-- Media Item 3 -->
                <div class="project-card">
                    <div class="project-thumb-wrap">
                        <img src="images/women-empowerment-news.jpg" alt="Women Self Help Groups Press">
                        <span class="project-status-tag status-completed">Social Impact</span>
                    </div>
                    <div class="project-body">
                        <div class="project-category">State Development Portal</div>
                        <h3>"Village Women Turn Entrepreneurs with Micro-Sewing Clusters"</h3>
                        <p>Report on rural women transforming their household incomes through our tailoring training and self-help group micro-credit.</p>
                        <div class="project-meta-strip">
                            <span><i class="fas fa-calendar-alt"></i> June 2025</span>
                            <span><i class="fas fa-newspaper"></i> State Press</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Media Kit Download CTA -->
    <section class="cta-banner-section">
        <div class="container">
            <div class="cta-banner-content">
                <h2>Media Inquiries & Press Kit</h2>
                <p>Journalists and media representatives can download our official media kit, logo vector assets, and organizational factsheet.</p>
                <div class="cta-banner-buttons">
                    <a href="contact.php" class="btn btn-primary btn-lg"><i class="fas fa-envelope"></i> Contact Press Team</a>
                    <a href="about.php" class="btn btn-outline btn-lg"><i class="fas fa-info-circle"></i> About Organization</a>
                </div>
            </div>
        </div>
    </section>
</main>

<?php include 'includes/footer.php'; ?>
