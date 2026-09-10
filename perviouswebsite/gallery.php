<?php 
$page_title = 'Gallery - Matri Seva Samiti';
include 'includes/header.php'; 
?>

<style>
    /* Gallery Page Styles */
    .gallery-hero {
        background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)),
                    url('images/galleryherobg.png') center center / cover no-repeat;
        padding: 100px 0 60px;
        text-align: center;
        color: white;
        position: relative;
        overflow: hidden;
        border-bottom: 4px solid #f47a20;
    }
    

    
    .gallery-hero h1 {
        font-size: 48px;
        font-weight: 700;
        margin-bottom: 20px;
        animation: fadeInUp 0.8s ease;
    }
    
    .gallery-hero p {
        font-size: 20px;
        max-width: 600px;
        margin: 0 auto;
        opacity: 0.9;
        animation: fadeInUp 0.8s ease 0.2s both;
    }
    
    /* Gallery Grid */
    .gallery-section {
        padding: 60px 0;
        background: #f8f9fa;
    }
    
    .gallery-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 20px;
    }
    
    .gallery-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
        gap: 20px;
        margin-top: 40px;
    }
    
    .gallery-item {
        position: relative;
        overflow: hidden;
        border-radius: 10px;
        box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        cursor: pointer;
        background: white;
    }
    
    .gallery-item:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 15px rgba(0,0,0,0.2);
    }
    
    .gallery-item img {
        width: 100%;
        height: 250px;
        object-fit: cover;
        transition: transform 0.3s ease, opacity 0.3s ease;
        opacity: 0;
    }
    
    .gallery-item img.loaded {
        opacity: 1;
    }
    
    .gallery-item::before {
        content: '';
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 40px;
        height: 40px;
        border: 3px solid #f3f3f3;
        border-top: 3px solid #f47a20;
        border-radius: 50%;
        animation: spin 1s linear infinite;
        z-index: 1;
    }
    
    .gallery-item.loaded::before {
        display: none;
    }
    
    @keyframes spin {
        0% { transform: translate(-50%, -50%) rotate(0deg); }
        100% { transform: translate(-50%, -50%) rotate(360deg); }
    }
    
    .gallery-item:hover img {
        transform: scale(1.05);
    }
    
    .gallery-item-overlay {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(244, 122, 32, 0.8);
        display: flex;
        align-items: center;
        justify-content: center;
        opacity: 0;
        transition: opacity 0.3s ease;
    }
    
    .gallery-item:hover .gallery-item-overlay {
        opacity: 1;
    }
    
    .gallery-item-overlay i {
        font-size: 40px;
        color: white;
    }
    
    /* Lightbox Styles */
    .lightbox {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(0,0,0,0.95);
        z-index: 9999;
        padding: 20px;
        overflow: auto;
    }
    
    .lightbox.active {
        display: flex;
        align-items: center;
        justify-content: center;
    }
    
    .lightbox-content {
        position: relative;
        max-width: 90%;
        max-height: 90vh;
        animation: zoomIn 0.3s ease;
    }
    
    .lightbox img {
        width: 100%;
        height: auto;
        max-height: 90vh;
        object-fit: contain;
        border-radius: 10px;
    }
    
    .lightbox-close {
        position: absolute;
        top: -40px;
        right: 0;
        font-size: 40px;
        color: white;
        cursor: pointer;
        transition: color 0.3s ease;
        background: none;
        border: none;
        padding: 0;
    }
    
    .lightbox-close:hover {
        color: #f47a20;
    }
    
    .lightbox-nav {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        font-size: 40px;
        color: white;
        cursor: pointer;
        background: rgba(0,0,0,0.5);
        border: none;
        padding: 10px 15px;
        border-radius: 5px;
        transition: all 0.3s ease;
    }
    
    .lightbox-nav:hover {
        background: rgba(255,107,53,0.8);
    }
    
    .lightbox-prev {
        left: 20px;
    }
    
    .lightbox-next {
        right: 20px;
    }
    
    /* Animations */
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    @keyframes zoomIn {
        from {
            opacity: 0;
            transform: scale(0.8);
        }
        to {
            opacity: 1;
            transform: scale(1);
        }
    }
    
    /* Responsive */
    @media (max-width: 768px) {
        .gallery-hero h1 {
            font-size: 36px;
        }
        
        .gallery-hero p {
            font-size: 16px;
        }
        
        .gallery-grid {
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 15px;
        }
        
        .gallery-item img {
            height: 200px;
        }
        
        .lightbox-nav {
            font-size: 30px;
            padding: 5px 10px;
        }
        
        .lightbox-close {
            font-size: 30px;
            top: -30px;
        }
    }
    
    @media (max-width: 480px) {
        .gallery-grid {
            grid-template-columns: 1fr;
        }
    }
</style>

<main>
    <!-- Gallery Hero Section -->
    <section class="gallery-hero">
        <div class="container">
            <h1>Our Gallery</h1>
            <p>Capturing moments of hope, change, and community impact through our initiatives</p>
        </div>
    </section>

    <!-- Gallery Grid Section -->
    <section class="gallery-section">
        <div class="gallery-container">
            <?php
            // Get all images from the gallery directory
            $gallery_path = 'images/gallery/';
            $images = glob($gallery_path . '*.{jpg,jpeg,png,gif,mp4,JPG,JPEG,PNG,GIF,MP4}', GLOB_BRACE);
            
            // Sort images by modification time (newest first)
            usort($images, function($a, $b) {
                return filemtime($b) - filemtime($a);
            });
            
            $total_images = count($images);
            ?>
            
            <div style="text-align: center; margin-bottom: 30px;">
                <h2 style="color: #333; font-size: 24px; margin-bottom: 10px;">Photo Gallery</h2>
                <p style="color: #666; font-size: 16px;">Showing <?php echo $total_images; ?> images from our activities and events</p>
            </div>
            
            <div class="gallery-grid">
                <?php
                // Display each file
                foreach($images as $index => $image) {
                    $image_url = str_replace('\\', '/', $image);
                    $ext = strtolower(pathinfo($image_url, PATHINFO_EXTENSION));
                    $isVideo = in_array($ext, ['mp4']);
                    ?>
                    <div class="gallery-item" onclick="openLightbox(<?php echo $index; ?>)">
                        <?php if($isVideo): ?>
                            <video src="<?php echo htmlspecialchars($image_url); ?>" style="width: 100%; height: 250px; object-fit: cover; opacity: 1;" muted loop preload="metadata"></video>
                            <div class="gallery-item-overlay">
                                <i class="fas fa-play-circle"></i>
                            </div>
                        <?php else: ?>
                            <img src="<?php echo htmlspecialchars($image_url); ?>" alt="Gallery Item <?php echo $index + 1; ?>" loading="lazy">
                            <div class="gallery-item-overlay">
                                <i class="fas fa-search-plus"></i>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>

    <!-- Lightbox -->
    <div class="lightbox" id="lightbox">
        <button class="lightbox-close" onclick="closeLightbox()">&times;</button>
        <button class="lightbox-nav lightbox-prev" onclick="changeImage(-1)">&#10094;</button>
        <button class="lightbox-nav lightbox-next" onclick="changeImage(1)">&#10095;</button>
        <div class="lightbox-content" id="lightbox-content">
            <!-- Dynamically populated -->
        </div>
    </div>
</main>

<script>
    // Gallery images array
    const galleryImages = [
        <?php
        foreach($images as $index => $image) {
            $image_url = str_replace('\\', '/', $image);
            echo '"' . htmlspecialchars($image_url) . '"';
            if($index < count($images) - 1) echo ',';
        }
        ?>
    ];
    
    let currentImageIndex = 0;
    const lightbox = document.getElementById('lightbox');
    const lightboxContent = document.getElementById('lightbox-content');
    
    function updateLightboxContent() {
        const fileUrl = galleryImages[currentImageIndex];
        const ext = fileUrl.split('.').pop().toLowerCase();
        
        if (ext === 'mp4') {
            lightboxContent.innerHTML = `<video src="${fileUrl}" controls autoplay style="width: 100%; max-height: 90vh; border-radius: 10px; outline: none;"></video>`;
        } else {
            lightboxContent.innerHTML = `<img src="${fileUrl}" alt="Gallery Item" style="width: 100%; height: auto; max-height: 90vh; object-fit: contain; border-radius: 10px;">`;
        }
    }
    
    // Open lightbox
    function openLightbox(index) {
        currentImageIndex = index;
        updateLightboxContent();
        lightbox.classList.add('active');
        document.body.style.overflow = 'hidden';
    }
    
    // Close lightbox
    function closeLightbox() {
        lightbox.classList.remove('active');
        document.body.style.overflow = 'auto';
        lightboxContent.innerHTML = ''; // Stop video playback
    }
    
    // Change image
    function changeImage(direction) {
        currentImageIndex += direction;
        
        if (currentImageIndex < 0) {
            currentImageIndex = galleryImages.length - 1;
        } else if (currentImageIndex >= galleryImages.length) {
            currentImageIndex = 0;
        }
        
        updateLightboxContent();
    }
    
    // Keyboard navigation
    document.addEventListener('keydown', function(e) {
        if (lightbox.classList.contains('active')) {
            if (e.key === 'Escape') {
                closeLightbox();
            } else if (e.key === 'ArrowLeft') {
                changeImage(-1);
            } else if (e.key === 'ArrowRight') {
                changeImage(1);
            }
        }
    });
    
    // Close lightbox when clicking outside
    lightbox.addEventListener('click', function(e) {
        if (e.target === lightbox) {
            closeLightbox();
        }
    });
    
    // Handle image loading
    document.addEventListener('DOMContentLoaded', function() {
        const galleryItems = document.querySelectorAll('.gallery-item');
        
        galleryItems.forEach(function(item) {
            const img = item.querySelector('img');
            const video = item.querySelector('video');
            
            if (img) {
                // When image loads, add loaded class
                img.addEventListener('load', function() {
                    img.classList.add('loaded');
                    item.classList.add('loaded');
                });
                
                // If image is already cached and loaded
                if (img.complete) {
                    img.classList.add('loaded');
                    item.classList.add('loaded');
                }
            } else if (video) {
                // Videos don't need the same loading spinner logic right now
                item.classList.add('loaded');
                
                // Add hover play functionality
                item.addEventListener('mouseenter', () => video.play().catch(e => {}));
                item.addEventListener('mouseleave', () => { video.pause(); video.currentTime = 0; });
            }
        });
    });
</script>

<?php include 'includes/footer.php'; ?> 