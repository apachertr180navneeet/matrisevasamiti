<?php 
$page_title = "NGO News - Matri Seva Samiti";
include 'includes/header.php'; 
?>

<main>
    <!-- Hero Section -->
    <section class="page-hero">
        <div class="container">
            <h1>NGO <span class="highlight">News</span></h1>
            <p>Stay updated with our latest initiatives, achievements, and community impact stories</p>
        </div>
    </section>

    <!-- News Section -->
    <section class="news-section">
        <div class="container">
            <div class="news-grid">
                <!-- Featured News -->
                <article class="news-card featured">
                    <div class="news-image">
                        <img src="images/skill-development-news.jpg" alt="Skill Development Program Launch">
                        <div class="news-badge">Featured</div>
                    </div>
                    <div class="news-content">
                        <div class="news-meta">
                            <span class="news-date"><i class="fas fa-calendar"></i> December 15, 2025-26</span>
                            <span class="news-category">Programs</span>
                        </div>
                        <h2>New Skill Development Center Inaugurated in Jhunsi</h2>
                        <p>Matri Seva Samiti <small class="hindi-text">मिलकर करें प्रयास, खुशहाल हो समाज ।</small> proudly announces the opening of our latest skill development center, equipped with modern facilities for computer training, tailoring, and handicrafts. This initiative aims to empower 200+ rural youth with employable skills.</p>
                        <a href="#" class="read-more-btn">Read More <i class="fas fa-arrow-right"></i></a>
                    </div>
                </article>

                <!-- Regular News Articles -->
                <article class="news-card">
                    <div class="news-image">
                        <img src="images/healthcare-camp-news.jpg" alt="Healthcare Camp">
                    </div>
                    <div class="news-content">
                        <div class="news-meta">
                            <span class="news-date"><i class="fas fa-calendar"></i> December 10, 2025-26</span>
                            <span class="news-category">Healthcare</span>
                        </div>
                        <h3>Free Health Camp Serves 500+ Villagers</h3>
                        <p>Our recent health camp in collaboration with local medical practitioners provided free consultations, medicines, and health awareness sessions to over 500 villagers.</p>
                        <a href="#" class="read-more-btn">Read More <i class="fas fa-arrow-right"></i></a>
                    </div>
                </article>

                <article class="news-card">
                    <div class="news-image">
                        <img src="images/education-initiative-news.jpg" alt="Education Initiative">
                    </div>
                    <div class="news-content">
                        <div class="news-meta">
                            <span class="news-date"><i class="fas fa-calendar"></i> December 5, 2025-26</span>
                            <span class="news-category">Education</span>
                        </div>
                        <h3>Digital Library Project Reaches 10 Villages</h3>
                        <p>Our digital library initiative has successfully established learning centers in 10 villages, providing access to educational resources and online learning platforms for rural students.</p>
                        <a href="#" class="read-more-btn">Read More <i class="fas fa-arrow-right"></i></a>
                    </div>
                </article>

                <article class="news-card">
                    <div class="news-image">
                        <img src="images/women-empowerment-news.jpg" alt="Women Empowerment">
                    </div>
                    <div class="news-content">
                        <div class="news-meta">
                            <span class="news-date"><i class="fas fa-calendar"></i> November 28, 2025-26</span>
                            <span class="news-category">Women Empowerment</span>
                        </div>
                        <h3>Women's Self-Help Groups Generate ₹2 Lakh Revenue</h3>
                        <p>The self-help groups formed under our women empowerment program have collectively generated over ₹2 lakh in revenue through various income-generating activities.</p>
                        <a href="#" class="read-more-btn">Read More <i class="fas fa-arrow-right"></i></a>
                    </div>
                </article>

                <article class="news-card">
                    <div class="news-image">
                        <img src="images/community-development-news.jpg" alt="Community Development">
                    </div>
                    <div class="news-content">
                        <div class="news-meta">
                            <span class="news-date"><i class="fas fa-calendar"></i> November 20, 2025-26</span>
                            <span class="news-category">Community</span>
                        </div>
                        <h3>Water Conservation Project Benefits 1000+ Families</h3>
                        <p>Our rainwater harvesting and water conservation project has successfully provided clean drinking water access to over 1000 families across 5 villages in Prayagraj district.</p>
                        <a href="#" class="read-more-btn">Read More <i class="fas fa-arrow-right"></i></a>
                    </div>
                </article>

                <article class="news-card">
                    <div class="news-image">
                        <img src="images/rural-development-news.jpg" alt="Rural Development">
                    </div>
                    <div class="news-content">
                        <div class="news-meta">
                            <span class="news-date"><i class="fas fa-calendar"></i> November 15, 2025-26</span>
                            <span class="news-category">Development</span>
                        </div>
                        <h3>Solar Power Initiative Lights Up Remote Villages</h3>
                        <p>In partnership with renewable energy providers, we have installed solar power systems in 3 remote villages, bringing electricity to 150+ households for the first time.</p>
                        <a href="#" class="read-more-btn">Read More <i class="fas fa-arrow-right"></i></a>
                    </div>
                </article>
            </div>

            <!-- Pagination (Hidden as there is only 1 page of news currently) -->
            <!--
            <div class="pagination">
                <a href="#" class="page-link active">1</a>
                <a href="#" class="page-link">2</a>
                <a href="#" class="page-link">3</a>
                <a href="#" class="page-link">Next <i class="fas fa-chevron-right"></i></a>
            </div>
            -->
        </div>
    </section>

    <!-- Newsletter Subscription -->
    <section class="newsletter-section">
        <div class="container">
            <div class="newsletter-content">
                <h2>Stay Updated with Our News</h2>
                <p>Subscribe to our newsletter to receive latest updates about our programs and community impact stories.</p>
                <form class="newsletter-form" action="#" method="POST">
                    <div class="form-group">
                        <input type="email" name="email" placeholder="Enter your email address" required>
                        <button type="submit" class="btn btn-primary">Subscribe</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</main>

<style>
.page-hero {
    background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)),
                url('images/newsherobg.png') center center / cover no-repeat;
    padding: 150px 0 100px;
    text-align: center;
    color: white;
}

.page-hero h1 {
    font-size: 48px;
    font-weight: 700;
    margin-bottom: 20px;
}

.page-hero p {
    font-size: 18px;
    opacity: 0.9;
    max-width: 600px;
    margin: 0 auto;
}

.news-section {
    padding: 80px 0;
}

.news-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
    gap: 30px;
}

.news-card {
    background: white;
    border-radius: 20px;
    overflow: hidden;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.news-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
}

.news-card.featured {
    grid-column: span 2;
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 0;
}

.news-image {
    position: relative;
    height: 250px;
    overflow: hidden;
}

.featured .news-image {
    height: 100%;
}

.news-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.3s ease;
}

.news-card:hover .news-image img {
    transform: scale(1.05);
}

.news-badge {
    position: absolute;
    top: 15px;
    left: 15px;
    background: #f47a20;
    color: white;
    padding: 5px 15px;
    border-radius: 20px;
    font-size: 12px;
    font-weight: 600;
    text-transform: uppercase;
}

.news-content {
    padding: 25px;
}

.featured .news-content {
    padding: 40px;
    display: flex;
    flex-direction: column;
    justify-content: center;
}

.news-meta {
    display: flex;
    gap: 15px;
    margin-bottom: 15px;
    font-size: 14px;
    color: #666;
}

.news-date i {
    margin-right: 5px;
    color: #f47a20;
}

.news-category {
    background: #f0f0f0;
    padding: 3px 10px;
    border-radius: 15px;
    font-weight: 500;
}

.news-card h2 {
    font-size: 28px;
    color: #333;
    margin-bottom: 15px;
    line-height: 1.3;
}

.news-card h3 {
    font-size: 20px;
    color: #333;
    margin-bottom: 12px;
    line-height: 1.4;
}

.news-card p {
    color: #666;
    line-height: 1.6;
    margin-bottom: 20px;
}

.read-more-btn {
    color: #f47a20;
    text-decoration: none;
    font-weight: 600;
    transition: color 0.3s ease;
}

.read-more-btn:hover {
    color: #d46a10;
}

.read-more-btn i {
    margin-left: 5px;
    transition: transform 0.3s ease;
}

.read-more-btn:hover i {
    transform: translateX(3px);
}

.pagination {
    display: flex;
    justify-content: center;
    gap: 10px;
    margin-top: 50px;
}

.page-link {
    padding: 10px 15px;
    border: 2px solid #ddd;
    color: #666;
    text-decoration: none;
    border-radius: 10px;
    transition: all 0.3s ease;
}

.page-link:hover,
.page-link.active {
    background: #f47a20;
    color: white;
    border-color: #f47a20;
}

.newsletter-section {
    background: #f8f9fa;
    padding: 80px 0;
    text-align: center;
}

.newsletter-content h2 {
    font-size: 36px;
    color: #333;
    margin-bottom: 15px;
}

.newsletter-content p {
    font-size: 18px;
    color: #666;
    margin-bottom: 40px;
    max-width: 600px;
    margin-left: auto;
    margin-right: auto;
}

.newsletter-form .form-group {
    display: flex;
    max-width: 500px;
    margin: 0 auto;
    gap: 15px;
}

.newsletter-form input {
    flex: 1;
    padding: 15px 20px;
    border: 2px solid #ddd;
    border-radius: 50px;
    font-size: 16px;
    outline: none;
    transition: border-color 0.3s ease;
}

.newsletter-form input:focus {
    border-color: #f47a20;
}

.newsletter-form .btn {
    padding: 15px 30px;
    background: #f47a20;
    color: white;
    border: none;
    border-radius: 50px;
    font-weight: 600;
    cursor: pointer;
    transition: background 0.3s ease;
    white-space: nowrap;
}

.newsletter-form .btn:hover {
    background: #d46a10;
}

/* Responsive */
@media (max-width: 768px) {
    .page-hero h1 {
        font-size: 36px;
    }
    
    .news-grid {
        grid-template-columns: 1fr;
        gap: 20px;
    }
    
    .news-card.featured {
        grid-column: span 1;
        display: block;
    }
    
    .featured .news-image {
        height: 250px;
    }
    
    .newsletter-form .form-group {
        flex-direction: column;
        gap: 15px;
    }
    
    .newsletter-form input,
    .newsletter-form .btn {
        width: 100%;
    }
}
</style>

<?php include 'includes/footer.php'; ?> 