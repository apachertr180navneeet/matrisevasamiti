<?php 
session_start();
$page_title = "Certificates - Matri Seva Samiti";
include 'includes/header.php'; 
?>

<style>
    /* Certificate Page Styles */
    .certificate-hero {
        background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)),
                    url('images/documentherobg.png') center/cover;
        padding: 120px 0 80px;
        text-align: center;
        color: white;
        position: relative;
        border-bottom: 4px solid #f47a20;
    }
    
    .certificate-hero h1 {
        font-size: 48px;
        font-weight: 700;
        margin-bottom: 20px;
        animation: fadeInUp 0.8s ease;
    }
    
    .certificate-hero p {
        font-size: 20px;
        max-width: 600px;
        margin: 0 auto;
        opacity: 0.9;
        animation: fadeInUp 0.8s ease 0.2s both;
    }
    
    /* Certificate Gallery Section */
    .certificate-section {
        padding: 80px 0;
        background: #f8f9fa;
    }
    
    .certificate-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 20px;
    }
    
    .section-header {
        text-align: center;
        margin-bottom: 60px;
    }
    
    .section-header h2 {
        font-size: 36px;
        color: #2c3e50;
        margin-bottom: 20px;
        position: relative;
        display: inline-block;
    }
    
    .section-header h2:after {
        content: '';
        position: absolute;
        bottom: -10px;
        left: 50%;
        transform: translateX(-50%);
        width: 80px;
        height: 3px;
        background: linear-gradient(135deg, #f47a20, #f39c12);
        border-radius: 2px;
    }
    
    .section-header p {
        font-size: 18px;
        color: #666;
        max-width: 600px;
        margin: 0 auto;
        line-height: 1.6;
    }
    
    /* Certificate Grid */
    .certificate-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
        gap: 30px;
        margin-top: 40px;
    }
    
    .certificate-card {
        background: white;
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
        position: relative;
        cursor: pointer;
    }
    
    .certificate-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
    }
    
    .certificate-preview {
        position: relative;
        height: 250px;
        overflow: hidden;
        background: #f8f9fa;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    
    .certificate-preview img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.3s ease;
    }
    
    .certificate-card:hover .certificate-preview img {
        transform: scale(1.05);
    }
    
    .certificate-preview .pdf-icon {
        font-size: 80px;
        color: #e74c3c;
        opacity: 0.8;
    }
    
    .certificate-overlay {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(135deg, rgba(244, 122, 32, 0.9), rgba(243, 156, 18, 0.9));
        opacity: 0;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        color: white;
    }
    
    .certificate-card:hover .certificate-overlay {
        opacity: 1;
    }
    
    .certificate-overlay i {
        font-size: 48px;
        margin-bottom: 10px;
    }
    
    .certificate-overlay span {
        font-size: 16px;
        font-weight: 600;
    }
    
    .certificate-info {
        padding: 25px;
    }
    
    .certificate-title {
        font-size: 18px;
        font-weight: 600;
        color: #2c3e50;
        margin-bottom: 10px;
        line-height: 1.4;
    }
    
    .certificate-meta {
        display: flex;
        align-items: center;
        gap: 15px;
        margin-bottom: 15px;
        font-size: 14px;
        color: #666;
    }
    
    .certificate-meta i {
        color: #f47a20;
    }
    
    .certificate-actions {
        display: flex;
        gap: 10px;
    }
    
    .btn-certificate {
        flex: 1;
        padding: 10px 20px;
        border: none;
        border-radius: 8px;
        font-weight: 600;
        text-decoration: none;
        text-align: center;
        transition: all 0.3s ease;
        cursor: pointer;
        font-size: 14px;
    }
    
    .btn-view {
        background: linear-gradient(135deg, #f47a20, #f39c12);
        color: white;
    }
    
    .btn-view:hover {
        background: linear-gradient(135deg, #e55a2b, #d68910);
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(244, 122, 32, 0.3);
    }
    
    .btn-download {
        background: #2c3e50;
        color: white;
    }
    
    .btn-download:hover {
        background: #1a252f;
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(44, 62, 80, 0.3);
    }
    
    /* Certificate Types */
    .certificate-types {
        display: flex;
        justify-content: center;
        gap: 20px;
        margin-bottom: 40px;
        flex-wrap: wrap;
    }
    
    .type-filter {
        padding: 12px 24px;
        background: white;
        border: 2px solid #e0e0e0;
        border-radius: 25px;
        color: #666;
        text-decoration: none;
        transition: all 0.3s ease;
        font-weight: 500;
    }
    
    .type-filter:hover,
    .type-filter.active {
        background: linear-gradient(135deg, #f47a20, #f39c12);
        color: white;
        border-color: #f47a20;
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(244, 122, 32, 0.3);
    }
    
    /* Modal Styles */
    .certificate-modal {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.9);
        z-index: 1000;
        padding: 20px;
    }
    
    .modal-content {
        position: relative;
        max-width: 90%;
        max-height: 90%;
        margin: 2% auto;
        background: white;
        border-radius: 10px;
        overflow: hidden;
    }
    
    .modal-header {
        padding: 20px;
        background: linear-gradient(135deg, #f47a20, #f39c12);
        color: white;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    
    .modal-close {
        background: none;
        border: none;
        color: white;
        font-size: 24px;
        cursor: pointer;
        padding: 5px;
    }
    
    .modal-body {
        padding: 0;
        text-align: center;
    }
    
    .modal-body iframe,
    .modal-body img {
        width: 100%;
        height: 70vh;
        border: none;
    }
    
    /* Responsive */
    @media (max-width: 768px) {
        .certificate-hero h1 {
            font-size: 36px;
        }
        
        .certificate-hero p {
            font-size: 16px;
        }
        
        .certificate-grid {
            grid-template-columns: 1fr;
            gap: 20px;
        }
        
        .certificate-types {
            gap: 10px;
        }
        
        .type-filter {
            padding: 8px 16px;
            font-size: 14px;
        }
        
        .modal-content {
            max-width: 95%;
            margin: 5% auto;
        }
        
        .modal-body iframe,
        .modal-body img {
            height: 50vh;
        }
    }
    
    /* Animation */
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
    
    .certificate-card {
        animation: fadeInUp 0.6s ease forwards;
    }
    
    .certificate-card:nth-child(2) { animation-delay: 0.1s; }
    .certificate-card:nth-child(3) { animation-delay: 0.2s; }
    .certificate-card:nth-child(4) { animation-delay: 0.3s; }
    .certificate-card:nth-child(5) { animation-delay: 0.4s; }
    .certificate-card:nth-child(6) { animation-delay: 0.5s; }
</style>

<!-- Certificate Hero Section -->
<section class="certificate-hero">
    <div class="certificate-container">
        <h1>Our Certificates & Registrations</h1>
        <p>Official documents that validate our commitment to transparency and legal compliance in serving the community</p>
    </div>
</section>

<!-- Certificate Gallery Section -->
<section class="certificate-section">
    <div class="certificate-container">
        <div class="section-header">
            <h2>Official Documents</h2>
            <p>Browse through our official certificates, registrations, and approvals that establish our credibility as a trusted NGO</p>
        </div>
        
        <!-- Certificate Types Filter -->
        <div class="certificate-types">
            <a href="#" class="type-filter active" data-type="all">All Documents</a>
            <a href="#" class="type-filter" data-type="registration">Registration</a>
            <a href="#" class="type-filter" data-type="approval">Approvals</a>
            <a href="#" class="type-filter" data-type="tax">Tax Documents</a>
        </div>
        
        <!-- Certificate Grid -->
        <div class="certificate-grid" id="certificateGrid">
            <?php
            $certificateDir = '/www/wwwroot/matrisevasamiti.ngo/assets/certificates/';
            $certificateWebPath = 'assets/certificates/';
            
            // Define certificate information
            $certificates = [
                'AA090722075773U_RC22072022.pdf' => [
                    'title' => 'GST Certificate',
                    'type' => 'registration',
                    'date' => '22 July 2022',
                    'description' => 'Official registration certificate from regulatory authorities'
                ],
                'Approval Letter for form CSR1 - 2023-08-08T153427.735.PDF' => [
                    'title' => 'CSR-1 Approval Letter',
                    'type' => 'approval',
                    'date' => '08 August 2023',
                    'description' => 'Corporate Social Responsibility approval documentation'
                ],
                'Matri Seva Samiti.pdf' => [
                    'title' => 'Organization Charter',
                    'type' => 'registration',
                    'date' => 'Foundation Document',
                    'description' => 'Founding charter and organizational constitution'
                ],
                'NGO Darpan.pdf' => [
                    'title' => 'NGO Darpan Registration',
                    'type' => 'registration',
                    'date' => 'Government Portal',
                    'description' => 'Registration on Government NGO Darpan portal'
                ],
                'pancard.jpeg' => [
                    'title' => 'PAN Card',
                    'type' => 'tax',
                    'date' => 'Tax Document',
                    'description' => 'Permanent Account Number for tax purposes'
                ],
                'Udyam Registration Certificate.pdf' => [
                    'title' => 'Udyam Registration',
                    'type' => 'registration',
                    'date' => 'MSME Registration',
                    'description' => 'Micro, Small and Medium Enterprises registration'
                ]
            ];
            
            if (is_dir($certificateDir)) {
                $files = scandir($certificateDir);
                foreach ($files as $file) {
                    if ($file != '.' && $file != '..') {
                        $filePath = $certificateWebPath . $file;
                        $fileExtension = strtolower(pathinfo($file, PATHINFO_EXTENSION));
                        
                        // Get certificate info
                        $certInfo = isset($certificates[$file]) ? $certificates[$file] : [
                            'title' => pathinfo($file, PATHINFO_FILENAME),
                            'type' => 'registration',
                            'date' => 'Official Document',
                            'description' => 'Official certificate or document'
                        ];
                        
                        echo '<div class="certificate-card" data-type="' . $certInfo['type'] . '">';
                        echo '<div class="certificate-preview">';
                        
                        if ($fileExtension === 'pdf') {
                            echo '<i class="fas fa-file-pdf pdf-icon"></i>';
                        } else {
                            echo '<img src="' . $filePath . '" alt="' . $certInfo['title'] . '">';
                        }
                        
                        echo '<div class="certificate-overlay">';
                        echo '<i class="fas fa-eye"></i>';
                        echo '<span>View Certificate</span>';
                        echo '</div>';
                        echo '</div>';
                        
                        echo '<div class="certificate-info">';
                        echo '<h3 class="certificate-title">' . $certInfo['title'] . '</h3>';
                        echo '<div class="certificate-meta">';
                        echo '<span><i class="fas fa-calendar"></i> ' . $certInfo['date'] . '</span>';
                        echo '<span><i class="fas fa-file-alt"></i> ' . strtoupper($fileExtension) . '</span>';
                        echo '</div>';
                        echo '<p style="color: #666; font-size: 14px; margin-bottom: 15px;">' . $certInfo['description'] . '</p>';
                        echo '<div class="certificate-actions">';
                        echo '<a href="#" class="btn-certificate btn-view" onclick="openCertificate(\'' . $filePath . '\', \'' . $certInfo['title'] . '\', \'' . $fileExtension . '\')">View</a>';
                        echo '<a href="' . $filePath . '" class="btn-certificate btn-download" download target="_blank">Download</a>';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                    }
                }
            }
            ?>
        </div>
    </div>
</section>

<!-- Certificate Modal -->
<div id="certificateModal" class="certificate-modal">
    <div class="modal-content">
        <div class="modal-header">
            <h3 id="modalTitle">Certificate</h3>
            <button class="modal-close" onclick="closeCertificate()">&times;</button>
        </div>
        <div class="modal-body" id="modalBody">
            <!-- Certificate content will be loaded here -->
        </div>
    </div>
</div>

<script>
// Certificate filtering
document.addEventListener('DOMContentLoaded', function() {
    const filterButtons = document.querySelectorAll('.type-filter');
    const certificateCards = document.querySelectorAll('.certificate-card');
    
    filterButtons.forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            
            // Update active button
            filterButtons.forEach(btn => btn.classList.remove('active'));
            this.classList.add('active');
            
            const filterType = this.getAttribute('data-type');
            
            // Filter certificates
            certificateCards.forEach(card => {
                if (filterType === 'all' || card.getAttribute('data-type') === filterType) {
                    card.style.display = 'block';
                    card.style.animation = 'fadeInUp 0.6s ease forwards';
                } else {
                    card.style.display = 'none';
                }
            });
        });
    });
});

// Certificate modal functions
function openCertificate(filePath, title, extension) {
    const modal = document.getElementById('certificateModal');
    const modalTitle = document.getElementById('modalTitle');
    const modalBody = document.getElementById('modalBody');
    
    modalTitle.textContent = title;
    
    if (extension === 'pdf') {
        modalBody.innerHTML = '<iframe src="' + filePath + '" frameborder="0"></iframe>';
    } else {
        modalBody.innerHTML = '<img src="' + filePath + '" alt="' + title + '">';
    }
    
    modal.style.display = 'block';
    document.body.style.overflow = 'hidden';
}

function closeCertificate() {
    const modal = document.getElementById('certificateModal');
    modal.style.display = 'none';
    document.body.style.overflow = 'auto';
}

// Close modal when clicking outside
document.getElementById('certificateModal').addEventListener('click', function(e) {
    if (e.target === this) {
        closeCertificate();
    }
});

// Close modal with Escape key
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        closeCertificate();
    }
});
</script>

<?php include 'includes/footer.php'; ?>
