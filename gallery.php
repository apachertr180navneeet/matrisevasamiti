<?php 
$page_title = "Photo Gallery - Matri Seva Samiti";
include 'includes/header.php'; 
?>

<main>
    <!-- BREADCRUMBS -->
    <section class="ul-breadcrumb ul-section-spacing">
        <div class="ul-container">
            <h2 class="ul-breadcrumb-title">Impact Gallery</h2>
            <ul class="ul-breadcrumb-nav">
                <li><a href="index.php">Home</a></li>
                <li><span class="separator"><i class="flaticon-right"></i></span></li>
                <li>Gallery</li>
            </ul>
        </div>
    </section>

    <!-- GALLERY GRID SECTION -->
    <section class="ul-section-spacing">
        <div class="ul-container">
            <div class="ul-section-heading text-center">
                <div>
                    <span class="ul-section-sub-title">Moments of Joy</span>
                    <h2 class="ul-section-title">Capturing Our Grassroots Impact</h2>
                    <p class="ul-section-descr">Glimpses of education camps, women skill workshops, relief distribution, and medical health initiatives across rural India.</p>
                </div>
            </div>

            <div class="row row-cols-lg-3 row-cols-md-2 row-cols-1 g-4">
                <!-- Gallery 1 -->
                <div class="col">
                    <div class="card border-0 shadow-sm rounded-4 overflow-hidden position-relative group">
                        <img src="assets/img/gallery-item-1.png" alt="Education Drive" class="img-fluid w-100" style="height: 280px; object-fit: cover;">
                        <a href="assets/img/gallery-item-1.png" data-fslightbox="gallery" class="position-absolute top-50 start-50 translate-middle p-3 rounded-circle text-white" style="background: rgba(235, 83, 16, 0.9);">
                            <i class="flaticon-instagram fs-4"></i>
                        </a>
                    </div>
                </div>

                <!-- Gallery 2 -->
                <div class="col">
                    <div class="card border-0 shadow-sm rounded-4 overflow-hidden position-relative group">
                        <img src="assets/img/gallery-item-2.png" alt="Medical Camp" class="img-fluid w-100" style="height: 280px; object-fit: cover;">
                        <a href="assets/img/gallery-item-2.png" data-fslightbox="gallery" class="position-absolute top-50 start-50 translate-middle p-3 rounded-circle text-white" style="background: rgba(235, 83, 16, 0.9);">
                            <i class="flaticon-instagram fs-4"></i>
                        </a>
                    </div>
                </div>

                <!-- Gallery 3 -->
                <div class="col">
                    <div class="card border-0 shadow-sm rounded-4 overflow-hidden position-relative group">
                        <img src="assets/img/gallery-item-3.png" alt="Women Tailoring" class="img-fluid w-100" style="height: 280px; object-fit: cover;">
                        <a href="assets/img/gallery-item-3.png" data-fslightbox="gallery" class="position-absolute top-50 start-50 translate-middle p-3 rounded-circle text-white" style="background: rgba(235, 83, 16, 0.9);">
                            <i class="flaticon-instagram fs-4"></i>
                        </a>
                    </div>
                </div>

                <!-- Gallery 4 -->
                <div class="col">
                    <div class="card border-0 shadow-sm rounded-4 overflow-hidden position-relative group">
                        <img src="assets/img/gallery-item-4.png" alt="Ration Distribution" class="img-fluid w-100" style="height: 280px; object-fit: cover;">
                        <a href="assets/img/gallery-item-4.png" data-fslightbox="gallery" class="position-absolute top-50 start-50 translate-middle p-3 rounded-circle text-white" style="background: rgba(235, 83, 16, 0.9);">
                            <i class="flaticon-instagram fs-4"></i>
                        </a>
                    </div>
                </div>

                <!-- Gallery 5 -->
                <div class="col">
                    <div class="card border-0 shadow-sm rounded-4 overflow-hidden position-relative group">
                        <img src="assets/img/gallery-item-5.png" alt="Tree Plantation" class="img-fluid w-100" style="height: 280px; object-fit: cover;">
                        <a href="assets/img/gallery-item-5.png" data-fslightbox="gallery" class="position-absolute top-50 start-50 translate-middle p-3 rounded-circle text-white" style="background: rgba(235, 83, 16, 0.9);">
                            <i class="flaticon-instagram fs-4"></i>
                        </a>
                    </div>
                </div>

                <!-- Gallery 6 -->
                <div class="col">
                    <div class="card border-0 shadow-sm rounded-4 overflow-hidden position-relative group">
                        <img src="assets/img/gallery-item-6.png" alt="Volunteer Meet" class="img-fluid w-100" style="height: 280px; object-fit: cover;">
                        <a href="assets/img/gallery-item-6.png" data-fslightbox="gallery" class="position-absolute top-50 start-50 translate-middle p-3 rounded-circle text-white" style="background: rgba(235, 83, 16, 0.9);">
                            <i class="flaticon-instagram fs-4"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<?php include 'includes/footer.php'; ?>