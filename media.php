<?php 
$page_title = "Press & Media Coverage - Matri Seva Samiti";
include 'includes/header.php'; 
?>

<main>
    <!-- BREADCRUMBS -->
    <section class="ul-breadcrumb ul-section-spacing">
        <div class="ul-container">
            <h2 class="ul-breadcrumb-title">Press &amp; Media Coverage</h2>
            <ul class="ul-breadcrumb-nav">
                <li><a href="index.php">Home</a></li>
                <li><span class="separator"><i class="flaticon-right"></i></span></li>
                <li>Media</li>
            </ul>
        </div>
    </section>

    <!-- MEDIA COVERAGE GRID -->
    <section class="ul-section-spacing">
        <div class="ul-container">
            <div class="ul-section-heading text-center">
                <div>
                    <span class="ul-section-sub-title">In The News</span>
                    <h2 class="ul-section-title">Media Publications &amp; Broadcasts</h2>
                    <p class="ul-section-descr">National and regional news coverage highlighting Matri Seva Samiti's community development programs.</p>
                </div>
            </div>

            <div class="row row-cols-lg-3 row-cols-md-2 row-cols-1 gy-4">
                <!-- Media 1 -->
                <div class="col">
                    <div class="card border-0 shadow-sm rounded-4 overflow-hidden h-100">
                        <img src="images/education-initiative-news.jpg" alt="Dainik Jagran Coverage" class="img-fluid" style="height:220px; object-fit:cover;">
                        <div class="p-4 d-flex flex-column flex-grow-1">
                            <span class="badge bg-primary text-white mb-2 align-self-start">Dainik Jagran</span>
                            <h5 class="text-dark mb-2">"MSS Empowers Rural Youths with Digital Smart Learning"</h5>
                            <p class="text-muted small">Special feature on the inauguration of digital smart classrooms in Prayagraj clusters.</p>
                            <span class="text-muted mt-auto" style="font-size:12px;"><i class="flaticon-calendar me-1"></i> Prayagraj Edition</span>
                        </div>
                    </div>
                </div>

                <!-- Media 2 -->
                <div class="col">
                    <div class="card border-0 shadow-sm rounded-4 overflow-hidden h-100">
                        <img src="images/healthcare-camp-news.jpg" alt="Amar Ujala Feature" class="img-fluid" style="height:220px; object-fit:cover;">
                        <div class="p-4 d-flex flex-column flex-grow-1">
                            <span class="badge bg-danger text-white mb-2 align-self-start">Amar Ujala</span>
                            <h5 class="text-dark mb-2">"Mega Health &amp; Eye Camp Serves 500+ Villagers"</h5>
                            <p class="text-muted small">Front-page coverage on the free health checkups and medicine distribution by Matri Seva Samiti.</p>
                            <span class="text-muted mt-auto" style="font-size:12px;"><i class="flaticon-calendar me-1"></i> Regional Coverage</span>
                        </div>
                    </div>
                </div>

                <!-- Media 3 -->
                <div class="col">
                    <div class="card border-0 shadow-sm rounded-4 overflow-hidden h-100">
                        <img src="images/women-empowerment-news.jpg" alt="The Hindu Social Impact" class="img-fluid" style="height:220px; object-fit:cover;">
                        <div class="p-4 d-flex flex-column flex-grow-1">
                            <span class="badge bg-dark text-white mb-2 align-self-start">The Hindu</span>
                            <h5 class="text-dark mb-2">"Grassroots Women Micro-Enterprises: The MSS Blueprint"</h5>
                            <p class="text-muted small">Editorial highlighting the sustained livelihood models created through vocational self-help clusters.</p>
                            <span class="text-muted mt-auto" style="font-size:12px;"><i class="flaticon-calendar me-1"></i> Published: May 2026</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<?php include 'includes/footer.php'; ?>
