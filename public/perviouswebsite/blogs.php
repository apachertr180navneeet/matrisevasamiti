<?php 
$page_title = "Our Blogs - Matri Seva Samiti";
include 'includes/header.php'; 
?>

<main>
    <section class="page-hero">
        <div class="container">
            <h1>Our <span class="highlight">Blogs</span></h1>
            <p>Latest updates and stories from our community work</p>
        </div>
    </section>

    <section class="blogs-section">
        <div class="container">
            <div class="blogs-grid">
                <article class="blog-card">
                    <img src="images/blog1.jpg" alt="Youth Empowerment" class="blog-image">
                    <div class="blog-content">
                        <div class="blog-meta">
                            <span class="blog-date"><i class="fas fa-calendar"></i> March 15, 2025-26</span>
                            <span class="blog-category">Skill Development</span>
                        </div>
                        <h3>Empowering Rural Youth: Skill Development Initiative In Prayagraj</h3>
                        <p>Our recent skill development program in Prayagraj has successfully trained over 150 rural youths in various vocational skills, opening new employment opportunities...</p>
                        <a href="blog-detail.php?id=1" class="read-more">Read More <i class="fas fa-arrow-right"></i></a>
                    </div>
                </article>
                
                <article class="blog-card">
                    <img src="images/blog2.jpg" alt="Skill Development" class="blog-image">
                    <div class="blog-content">
                        <div class="blog-meta">
                            <span class="blog-date"><i class="fas fa-calendar"></i> March 10, 2025-26</span>
                            <span class="blog-category">Training Programs</span>
                        </div>
                        <h3>Stitching A Brighter Future: Skill Development In Bhadohi With Local Partners</h3>
                        <p>Partnership with local organizations has enabled us to provide comprehensive tailoring and stitching training to women in rural areas of Bhadohi...</p>
                        <a href="blog-detail.php?id=2" class="read-more">Read More <i class="fas fa-arrow-right"></i></a>
                    </div>
                </article>
                
                <article class="blog-card">
                    <img src="images/blog3.jpg" alt="Food Safety" class="blog-image">
                    <div class="blog-content">
                        <div class="blog-meta">
                            <span class="blog-date"><i class="fas fa-calendar"></i> March 5, 2025-26</span>
                            <span class="blog-category">Health Awareness</span>
                        </div>
                        <h3>Preventing Food Poisoning: A Shared Responsibility For A Healthier Tomorrow</h3>
                        <p>Our health awareness campaign focuses on educating rural communities about food safety practices and preventing common health issues...</p>
                        <a href="blog-detail.php?id=3" class="read-more">Read More <i class="fas fa-arrow-right"></i></a>
                    </div>
                </article>
                
                <article class="blog-card">
                    <img src="images/project1.jpeg" alt="Women Empowerment" class="blog-image">
                    <div class="blog-content">
                        <div class="blog-meta">
                            <span class="blog-date"><i class="fas fa-calendar"></i> February 28, 2025-26</span>
                            <span class="blog-category">Women Empowerment</span>
                        </div>
                        <h3>Women's Self-Help Groups: Building Financial Independence</h3>
                        <p>Formation of women's self-help groups has been instrumental in creating sustainable income sources for rural women across multiple villages...</p>
                        <a href="blog-detail.php?id=4" class="read-more">Read More <i class="fas fa-arrow-right"></i></a>
                    </div>
                </article>
                
                <article class="blog-card">
                    <img src="images/project3.jpg" alt="Healthcare" class="blog-image">
                    <div class="blog-content">
                        <div class="blog-meta">
                            <span class="blog-date"><i class="fas fa-calendar"></i> February 22, 2025-26</span>
                            <span class="blog-category">Healthcare</span>
                        </div>
                        <h3>Rural Healthcare Initiative: Making Quality Healthcare Accessible</h3>
                        <p>Our ongoing healthcare program brings medical awareness and basic health services to remote villages, focusing on preventive care...</p>
                        <a href="blog-detail.php?id=5" class="read-more">Read More <i class="fas fa-arrow-right"></i></a>
                    </div>
                </article>
                
                <article class="blog-card">
                    <img src="images/project1.jpeg" alt="Education" class="blog-image">
                    <div class="blog-content">
                        <div class="blog-meta">
                            <span class="blog-date"><i class="fas fa-calendar"></i> February 15, 2025-26</span>
                            <span class="blog-category">Education</span>
                        </div>
                        <h3>Digital Literacy: Bridging The Technology Gap In Rural Areas</h3>
                        <p>Preparing for our upcoming digital literacy program that will introduce computer skills and internet awareness to rural students...</p>
                        <a href="blog-detail.php?id=6" class="read-more">Read More <i class="fas fa-arrow-right"></i></a>
                    </div>
                </article>
            </div>
            
            <div class="pagination">
                <a href="#" class="page-link active">1</a>
                <a href="#" class="page-link">2</a>
                <a href="#" class="page-link">3</a>
                <a href="#" class="page-link">Next <i class="fas fa-arrow-right"></i></a>
            </div>
        </div>
    </section>
</main>

<style>
.page-hero {
    background: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7)), url('images/herobanner2.jpeg') center/cover;
    padding: 150px 0 100px;
    text-align: center;
    color: white;
}

.page-hero h1 {
    font-size: 48px;
    margin-bottom: 20px;
}

.blogs-section {
    padding: 80px 0;
}

.blogs-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
    gap: 30px;
    margin-bottom: 60px;
}

.blog-card {
    background: white;
    border-radius: 20px;
    overflow: hidden;
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    transition: all 0.3s ease;
}

.blog-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 20px 50px rgba(0,0,0,0.15);
}

.blog-image {
    width: 100%;
    height: 250px;
    object-fit: cover;
}

.blog-content {
    padding: 30px;
}

.blog-meta {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 20px;
    font-size: 14px;
}

.blog-date {
    color: #999;
    display: flex;
    align-items: center;
    gap: 5px;
}

.blog-category {
    background: #f47a20;
    color: white;
    padding: 5px 15px;
    border-radius: 20px;
    font-size: 12px;
    font-weight: 600;
}

.blog-content h3 {
    font-size: 20px;
    font-weight: 600;
    margin-bottom: 15px;
    line-height: 1.4;
    color: #333;
}

.blog-content p {
    font-size: 16px;
    line-height: 1.6;
    color: #666;
    margin-bottom: 20px;
}

.read-more {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    color: #f47a20;
    text-decoration: none;
    font-weight: 600;
    transition: all 0.3s ease;
}

.read-more:hover {
    gap: 15px;
}

.pagination {
    display: flex;
    justify-content: center;
    gap: 10px;
    margin-top: 40px;
}

.page-link {
    padding: 10px 20px;
    background: white;
    color: #666;
    text-decoration: none;
    border: 1px solid #ddd;
    border-radius: 50px;
    transition: all 0.3s ease;
}

.page-link.active,
.page-link:hover {
    background: #f47a20;
    color: white;
    border-color: #f47a20;
}

@media (max-width: 768px) {
    .page-hero h1 {
        font-size: 36px;
    }
    
    .blogs-grid {
        grid-template-columns: 1fr;
        gap: 20px;
    }
    
    .blog-content {
        padding: 20px;
    }
    
    .blog-meta {
        flex-direction: column;
        align-items: flex-start;
        gap: 10px;
    }
    
    .pagination {
        flex-wrap: wrap;
    }
}
</style>

<?php include 'includes/footer.php'; ?> 