<?php 
$page_title = "Media & Press Kit - Matri Seva Samiti";
include 'includes/header.php'; 
?>

<main>
    <!-- Page Hero -->
    <section class="page-hero">
        <img src="images/mediaherobg.png" alt="Media Background" class="page-hero-bg">
        <div class="container">
            <div class="breadcrumb">
                <a href="index.php">Home</a> <span>/</span> <span>Media</span>
            </div>
            <h1>Media & <span class="highlight">Press Kit</span></h1>
            <p>Download official brand assets, logos, high-resolution photographs, and press releases for editorial coverage.</p>
        </div>
    </section>

    <!-- Media Assets Section -->
    <section style="padding: 75px 0; background: var(--bg-slate);">
        <div class="container">
            <div class="section-header text-center">
                <span class="section-tag"><i class="fas fa-bullhorn"></i> Press & Publications</span>
                <h2>Official Brand <span class="text-underline-gold">Resources</span></h2>
                <p>Media houses, journalists, and event partners can download verified organizational materials below.</p>
            </div>

            <div class="projects-grid">
                <!-- Asset 1: Official Logo Pack -->
                <div class="project-card">
                    <div class="cert-preview-wrap">
                        <img src="logo/Logo.png" alt="Matri Seva Samiti Logo" style="max-height: 120px; width: auto;">
                    </div>
                    <div class="project-body">
                        <div class="project-category">Brand Identity</div>
                        <h3>Official Logo Pack (PNG & SVG)</h3>
                        <p>High-resolution transparent logos in full color, white monochrome, and standard emblem formats for print and digital publishing.</p>
                        <a href="logo/Logo.png" download class="btn btn-gold btn-sm"><i class="fas fa-download"></i> Download Logo</a>
                    </div>
                </div>

                <!-- Asset 2: Organization Profile / Deck -->
                <div class="project-card">
                    <div class="cert-preview-wrap">
                        <i class="fas fa-file-powerpoint" style="font-size: 4rem; color: var(--gold-dark);"></i>
                    </div>
                    <div class="project-body">
                        <div class="project-category">Corporate Presentation</div>
                        <h3>Comprehensive Profile Deck (2025-26)</h3>
                        <p>Detailed institutional deck covering founding history, thematic programs, audited impact data, and executive board profiles.</p>
                        <a href="assets/certificates/Matri Seva Samiti.pdf" download class="btn btn-gold btn-sm"><i class="fas fa-download"></i> Download Profile</a>
                    </div>
                </div>

                <!-- Asset 3: High-Res Photo Assets -->
                <div class="project-card">
                    <div class="cert-preview-wrap">
                        <i class="fas fa-images" style="font-size: 4rem; color: var(--forest-700);"></i>
                    </div>
                    <div class="project-body">
                        <div class="project-category">Field Media</div>
                        <h3>High-Resolution Field Photographs</h3>
                        <p>Curated photo gallery of classroom teaching, women tailoring clusters, health camps, and rural community meetings for editorial use.</p>
                        <a href="gallery.php" class="btn btn-gold btn-sm"><i class="fas fa-external-link-alt"></i> Browse Gallery</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Media Inquiry Callout -->
    <section class="cta-banner-section">
        <div class="container">
            <div class="cta-banner-content">
                <h2>Media & Interview Inquiries</h2>
                <p>For press interviews with our Founder/President or to arrange ground visit permissions in Prayagraj, reach our communications desk.</p>
                <div class="cta-banner-buttons">
                    <a href="mailto:matrisevasamiti1910@gmail.com" class="btn btn-gold btn-lg"><i class="fas fa-envelope"></i> Email Media Desk</a>
                    <a href="tel:+919415451910" class="btn btn-outline-white btn-lg"><i class="fas fa-phone-alt"></i> Call +91-9415451910</a>
                </div>
            </div>
        </div>
    </section>
</main>

<?php include 'includes/footer.php'; ?>
