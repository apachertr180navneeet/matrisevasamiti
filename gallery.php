<?php 
$page_title = "Photo & Video Gallery - Matri Seva Samiti";
include 'includes/header.php'; 
?>

<main>
    <!-- Page Hero -->
    <section class="page-hero">
        <img src="images/galleryherobg.png" alt="Gallery Background" class="page-hero-bg">
        <div class="container">
            <div class="breadcrumb">
                <a href="index.php">Home</a> <span>/</span> <span>Gallery</span>
            </div>
            <h1>Our Moments of <span class="highlight">Impact</span></h1>
            <p>Visual highlights of our grassroots field activities, training workshops, medical camps, and community gatherings.</p>
        </div>
    </section>

    <!-- Gallery Section -->
    <section style="padding: 75px 0; background: var(--bg-slate);">
        <div class="container">
            <div class="section-header text-center">
                <span class="section-tag"><i class="fas fa-camera"></i> Field Photographs</span>
                <h2>Capturing Real <span class="text-underline-gold">Smiles</span></h2>
                <p>Browse through photographs of our programs in education, women empowerment, and healthcare.</p>
            </div>

            <!-- Filter Tabs -->
            <div class="gallery-filter-tabs">
                <button class="gallery-tab-btn active" onclick="filterProjects('all', event)">All Photos</button>
                <button class="gallery-tab-btn" onclick="filterProjects('education', event)">Education</button>
                <button class="gallery-tab-btn" onclick="filterProjects('health', event)">Health Camps</button>
                <button class="gallery-tab-btn" onclick="filterProjects('women', event)">Women SHGs</button>
                <button class="gallery-tab-btn" onclick="filterProjects('events', event)">Community Events</button>
            </div>

            <!-- Gallery Grid -->
            <div class="gallery-modern-grid">
                <!-- Image 1 -->
                <div class="gallery-card" data-category="education" onclick="openModal('galleryModal', 'images/student1.jpeg', 'Youth Skill & Digital Training Workshop')">
                    <img src="images/student1.jpeg" alt="Skill Training" loading="lazy">
                    <div class="gallery-card-overlay">
                        <i class="fas fa-search-plus"></i>
                        <h4>Youth Skill Training</h4>
                    </div>
                </div>

                <!-- Image 2 -->
                <div class="gallery-card" data-category="health" onclick="openModal('galleryModal', 'images/healthimage.png', 'Rural Medical Consultation & Eye Camp')">
                    <img src="images/healthimage.png" alt="Health Camp" loading="lazy">
                    <div class="gallery-card-overlay">
                        <i class="fas fa-search-plus"></i>
                        <h4>Rural Health Camp</h4>
                    </div>
                </div>

                <!-- Image 3 -->
                <div class="gallery-card" data-category="women" onclick="openModal('galleryModal', 'images/womenimpormentimage.png', 'Women Self Help Group Mobilization')">
                    <img src="images/womenimpormentimage.png" alt="Women Empowerment" loading="lazy">
                    <div class="gallery-card-overlay">
                        <i class="fas fa-search-plus"></i>
                        <h4>Women Self Help Groups</h4>
                    </div>
                </div>

                <!-- Image 4 -->
                <div class="gallery-card" data-category="education" onclick="openModal('galleryModal', 'images/Educationimage.png', 'Free Remedial Learning for Children')">
                    <img src="images/Educationimage.png" alt="Child Education" loading="lazy">
                    <div class="gallery-card-overlay">
                        <i class="fas fa-search-plus"></i>
                        <h4>Child Education Center</h4>
                    </div>
                </div>

                <!-- Image 5 -->
                <div class="gallery-card" data-category="events" onclick="openModal('galleryModal', 'images/community-work.jpg', 'Grassroots Community Meeting & Awareness')">
                    <img src="images/community-work.jpg" alt="Community Work" loading="lazy">
                    <div class="gallery-card-overlay">
                        <i class="fas fa-search-plus"></i>
                        <h4>Community Gathering</h4>
                    </div>
                </div>

                <!-- Image 6 -->
                <div class="gallery-card" data-category="women" onclick="openModal('galleryModal', 'images/student2.jpeg', 'Tailoring & Garment Making Workshop')">
                    <img src="images/student2.jpeg" alt="Tailoring Workshop" loading="lazy">
                    <div class="gallery-card-overlay">
                        <i class="fas fa-search-plus"></i>
                        <h4>Tailoring Workshop</h4>
                    </div>
                </div>

                <!-- Image 7 -->
                <div class="gallery-card" data-category="events" onclick="openModal('images/about-us.jpg', 'images/about-us.jpg', 'Field Volunteers & Leadership')">
                    <img src="images/about-us.jpg" alt="Volunteers Field" loading="lazy">
                    <div class="gallery-card-overlay">
                        <i class="fas fa-search-plus"></i>
                        <h4>Grassroots Volunteers</h4>
                    </div>
                </div>

                <!-- Image 8 -->
                <div class="gallery-card" data-category="education" onclick="openModal('galleryModal', 'images/student3.jpeg', 'Digital Literacy Classroom')">
                    <img src="images/student3.jpeg" alt="Digital Classroom" loading="lazy">
                    <div class="gallery-card-overlay">
                        <i class="fas fa-search-plus"></i>
                        <h4>Digital Classroom</h4>
                    </div>
                </div>

                <!-- Image 9 -->
                <div class="gallery-card" data-category="health" onclick="openModal('galleryModal', 'images/project3.jpg', 'Health Checkup and Medicine Distribution')">
                    <img src="images/project3.jpg" alt="Medicine Distribution" loading="lazy">
                    <div class="gallery-card-overlay">
                        <i class="fas fa-search-plus"></i>
                        <h4>Health Checkup Camp</h4>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Lightbox Modal -->
    <div class="custom-modal" id="galleryModal">
        <div class="modal-dialog" style="max-width: 800px; padding: 20px;">
            <button class="modal-close-btn" onclick="closeModal('galleryModal')"><i class="fas fa-times"></i></button>
            <h4 class="modal-title" style="margin-bottom: 15px; color: var(--forest-900);">Photo Preview</h4>
            <div style="max-height: 70vh; display: flex; align-items: center; justify-content: center; background: #000; border-radius: 8px; overflow: hidden;">
                <img src="" alt="Gallery Full Preview" class="modal-image" style="max-width: 100%; max-height: 70vh; object-fit: contain;">
            </div>
        </div>
    </div>
</main>

<?php include 'includes/footer.php'; ?>