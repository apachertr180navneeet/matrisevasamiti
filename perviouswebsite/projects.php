<?php 
$page_title = "Our Projects - Matri Seva Samiti";
include 'includes/header.php'; 
?>

<main>
    <section class="page-hero">
        <div class="container">
            <h1>Our <span class="highlight">Projects</span></h1>
            <p>Transforming lives through sustainable development initiatives</p>
        </div>
    </section>

    <section class="projects-section">
        <div class="container">
            <div class="project-tabs">
                <button class="tab-btn active" onclick="showProjects('all')">All Projects</button>
                <button class="tab-btn" onclick="showProjects('completed')">Completed</button>
                <button class="tab-btn" onclick="showProjects('ongoing')">Ongoing</button>
                <button class="tab-btn" onclick="showProjects('upcoming')">Upcoming</button>
            </div>
            
            <div class="projects-grid" id="all-projects">
                <div class="project-card">
                    <img src="images/project1.jpeg" alt="Rural Youth Empowerment">
                    <div class="project-content">
                        <span class="project-status completed">Completed</span>
                        <h3>Empowering Economically Weaker Rural Youths Through Skill Development</h3>
                        <p>A comprehensive skill development program focusing on rural youth empowerment through vocational training and capacity building.</p>
                        <div class="project-meta">
                            <span><i class="fas fa-map-marker-alt"></i> Prayagraj, UP</span>
                            <span><i class="fas fa-users"></i> 150 Beneficiaries</span>
                        </div>
                    </div>
                </div>
                
                <div class="project-card">
                    <img src="images/project2.jpg" alt="Documentation Training">
                    <div class="project-content">
                        <span class="project-status completed">Completed</span>
                        <h3>Documentation Executive Training Program</h3>
                        <p>Training program for rural youth in documentation and administrative skills to enhance employment opportunities.</p>
                        <div class="project-meta">
                            <span><i class="fas fa-map-marker-alt"></i> Bhadohi, UP</span>
                            <span><i class="fas fa-users"></i> 75 Beneficiaries</span>
                        </div>
                    </div>
                </div>
                
                <div class="project-card">
                    <img src="images/project3.jpg" alt="Healthcare Initiative">
                    <div class="project-content">
                        <span class="project-status ongoing">Ongoing</span>
                        <h3>Rural Healthcare Awareness Program</h3>
                        <p>Community health initiatives focusing on preventive healthcare and hygiene awareness in rural areas.</p>
                        <div class="project-meta">
                            <span><i class="fas fa-map-marker-alt"></i> Prayagraj, UP</span>
                            <span><i class="fas fa-users"></i> 500+ Beneficiaries</span>
                        </div>
                    </div>
                </div>
                
                <div class="project-card">
                    <img src="images/project3.jpg" alt="Women Empowerment">
                    <div class="project-content">
                        <span class="project-status ongoing">Ongoing</span>
                        <h3>Women's Self-Help Group Initiative</h3>
                        <p>Empowering rural women through formation of self-help groups and microfinance support for small businesses.</p>
                        <div class="project-meta">
                            <span><i class="fas fa-map-marker-alt"></i> Multiple Villages</span>
                            <span><i class="fas fa-users"></i> 200+ Women</span>
                        </div>
                    </div>
                </div>
                
                <div class="project-card">
                    <img src="images/project1.jpeg" alt="Education Program">
                    <div class="project-content">
                        <span class="project-status upcoming">Upcoming</span>
                        <h3>Digital Literacy Program</h3>
                        <p>Introducing digital literacy and computer skills training for rural youth to bridge the digital divide.</p>
                        <div class="project-meta">
                            <span><i class="fas fa-map-marker-alt"></i> Rural Schools</span>
                            <span><i class="fas fa-users"></i> 300+ Students</span>
                        </div>
                    </div>
                </div>
                
                <div class="project-card">
                    <img src="images/project1.jpeg" alt="Agriculture Training">
                    <div class="project-content">
                        <span class="project-status upcoming">Upcoming</span>
                        <h3>Sustainable Agriculture Training</h3>
                        <p>Training farmers in sustainable agricultural practices and organic farming techniques for better yield and income.</p>
                        <div class="project-meta">
                            <span><i class="fas fa-map-marker-alt"></i> Rural Areas</span>
                            <span><i class="fas fa-users"></i> 100+ Farmers</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="cta-section">
        <div class="container">
            <div class="cta-content">
                <h2>Support Our Projects</h2>
                <p>Help us create more impact in rural communities. Your support can make these projects reach more people.</p>
                <div class="cta-buttons">
                    <a href="donate.php" class="btn btn-primary">Donate Now</a>
                    <a href="contact.php" class="btn btn-secondary">Partner With Us</a>
                </div>
            </div>
        </div>
    </section>
</main>

<style>
.page-hero {
    background: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7)), url('images/projectherobg.png') center center / cover no-repeat;
    padding: 150px 0 100px;
    text-align: center;
    color: white;
}
.page-hero h1 { font-size: 48px; margin-bottom: 20px; }
.projects-section { padding: 80px 0; }
.project-tabs { display: flex; justify-content: center; gap: 20px; margin-bottom: 50px; flex-wrap: wrap; }
.tab-btn { background: transparent; border: 2px solid #f47a20; color: #f47a20; padding: 12px 30px; border-radius: 50px; cursor: pointer; transition: all 0.3s ease; }
.tab-btn.active, .tab-btn:hover { background: #f47a20; color: white; }
.projects-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(350px, 1fr)); gap: 30px; }
.project-card { background: white; border-radius: 20px; overflow: hidden; box-shadow: 0 10px 30px rgba(0,0,0,0.1); transition: transform 0.3s ease; }
.project-card:hover { transform: translateY(-10px); }
.project-card img { width: 100%; height: 250px; object-fit: cover; }
.project-content { padding: 30px; position: relative; }
.project-status { position: absolute; top: -10px; right: 20px; padding: 5px 15px; border-radius: 20px; font-size: 12px; font-weight: bold; }
.project-status.completed { background: #28a745; color: white; }
.project-status.ongoing { background: #ffc107; color: #333; }
.project-status.upcoming { background: #007bff; color: white; }
.project-content h3 { font-size: 20px; margin: 20px 0 15px; line-height: 1.4; }
.project-content p { color: #666; line-height: 1.6; margin-bottom: 20px; }
.project-meta { display: flex; gap: 20px; font-size: 14px; color: #999; }
.project-meta span { display: flex; align-items: center; gap: 5px; }
.cta-section { background: linear-gradient(135deg, #f47a20 0%, #d46a10 100%); padding: 80px 0; text-align: center; color: white; }
.cta-content h2 { font-size: 36px; margin-bottom: 20px; }
.cta-content p { font-size: 18px; margin-bottom: 40px; opacity: 0.9; }
.cta-buttons { display: flex; gap: 20px; justify-content: center; flex-wrap: wrap; }
.btn { padding: 15px 30px; border-radius: 50px; text-decoration: none; font-weight: 600; transition: all 0.3s ease; }
.btn-primary { background: white; color: #f47a20; }
.btn-secondary { background: transparent; color: white; border: 2px solid white; }
.btn:hover { transform: translateY(-2px); }
@media (max-width: 768px) {
    .page-hero h1 { font-size: 36px; }
    .project-tabs { flex-direction: column; align-items: center; }
    .tab-btn { width: 200px; }
    .projects-grid { grid-template-columns: 1fr; }
    .cta-buttons { flex-direction: column; align-items: center; }
}
</style>

<script>
function showProjects(type) {
    const allCards = document.querySelectorAll('.project-card');
    const tabs = document.querySelectorAll('.tab-btn');
    
    // Remove active class from all tabs
    tabs.forEach(tab => tab.classList.remove('active'));
    
    // Add active class to clicked tab
    event.target.classList.add('active');
    
    // Show/hide projects based on type
    allCards.forEach(card => {
        const status = card.querySelector('.project-status').textContent.toLowerCase();
        if (type === 'all' || status === type) {
            card.style.display = 'block';
        } else {
            card.style.display = 'none';
        }
    });
}
</script>

<?php include 'includes/footer.php'; ?> 