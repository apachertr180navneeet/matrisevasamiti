// Main JavaScript for Matri Seva Samiti Website

document.addEventListener('DOMContentLoaded', function() {
    // Mobile Navigation Toggle
    const navToggle = document.getElementById('nav-toggle');
    const navMenu = document.getElementById('nav-menu');
    
    if (navToggle && navMenu) {
        navToggle.addEventListener('click', function() {
            navMenu.classList.toggle('active');
            navToggle.classList.toggle('active');
        });
        
        // Close menu when clicking on a link
        const navLinks = document.querySelectorAll('.nav-link');
        navLinks.forEach(link => {
            link.addEventListener('click', function() {
                navMenu.classList.remove('active');
                navToggle.classList.remove('active');
            });
        });
    }
    
    // Header scroll effect
    const header = document.querySelector('.header');
    if (header) {
        window.addEventListener('scroll', function() {
            if (window.scrollY > 100) {
                header.style.background = '#0F2B5B';
            } else {
                header.style.background = '#0F2B5B';
            }
        });
    }
    
    // Smooth scrolling for anchor links
    const anchors = document.querySelectorAll('a[href^="#"]');
    anchors.forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });
    
    // Form validation
    const forms = document.querySelectorAll('form');
    forms.forEach(form => {
        form.addEventListener('submit', function(e) {
            const requiredFields = form.querySelectorAll('[required]');
            let isValid = true;
            
            requiredFields.forEach(field => {
                if (!field.value.trim()) {
                    isValid = false;
                    field.style.borderColor = '#f47a20';
                    
                    // Remove error style after typing
                    field.addEventListener('input', function() {
                        this.style.borderColor = '#ddd';
                    });
                }
            });
            
            if (!isValid) {
                e.preventDefault();
                alert('Please fill in all required fields.');
            }
        });
    });
    
    // Animation on scroll
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };
    
    const observer = new IntersectionObserver(function(entries) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
            }
        });
    }, observerOptions);
    
    // Observe elements for animation
    const animateElements = document.querySelectorAll('.project-card, .blog-card, .vm-item');
    animateElements.forEach(el => {
        el.style.opacity = '0';
        el.style.transform = 'translateY(30px)';
        el.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
        observer.observe(el);
    });
    
    // Chat widget functionality
    const chatWidget = document.getElementById('chatWidget');
    if (chatWidget) {
        chatWidget.addEventListener('click', function() {
            // You can integrate with any chat service here
            alert('Chat feature coming soon! Please contact us at matrisevasamiti1910@gmail.com');
        });
    }
    
    // Back to top button
    const backToTopBtn = document.createElement('button');
    backToTopBtn.innerHTML = '<i class="fas fa-arrow-up"></i>';
    backToTopBtn.className = 'back-to-top';
    backToTopBtn.style.cssText = `
        position: fixed;
        bottom: 100px;
        right: 30px;
        width: 50px;
        height: 50px;
        background: #f47a20;
        color: white;
        border: none;
        border-radius: 50%;
        cursor: pointer;
        font-size: 18px;
        opacity: 0;
        transition: all 0.3s ease;
        z-index: 999;
    `;
    
    document.body.appendChild(backToTopBtn);
    
    window.addEventListener('scroll', function() {
        if (window.scrollY > 500) {
            backToTopBtn.style.opacity = '1';
            backToTopBtn.style.transform = 'scale(1)';
        } else {
            backToTopBtn.style.opacity = '0';
            backToTopBtn.style.transform = 'scale(0.8)';
        }
    });
    
    backToTopBtn.addEventListener('click', function() {
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    });
});

// Project tabs functionality
function showProjects(type) {
    // Hide all project grids
    const grids = document.querySelectorAll('.projects-grid');
    grids.forEach(grid => {
        grid.classList.add('hidden');
    });
    
    // Show selected grid
    const selectedGrid = document.getElementById(type + '-projects');
    if (selectedGrid) {
        selectedGrid.classList.remove('hidden');
    }
    
    // Update active tab
    const tabs = document.querySelectorAll('.tab-btn');
    tabs.forEach(tab => {
        tab.classList.remove('active');
    });
    
    event.target.classList.add('active');
}

// Toggle chat widget
function toggleChat() {
    // Simple alert for now - can be replaced with actual chat integration
    const userAgent = navigator.userAgent.toLowerCase();
    const isMobile = /android|webos|iphone|ipad|ipod|blackberry|iemobile|opera mini/i.test(userAgent);
    
    if (isMobile) {
        window.location.href = 'tel:+919415451910';
    } else {
        const email = 'matrisevasamiti1910@gmail.com';
        const subject = 'Inquiry from Website';
        const body = 'Hello, I would like to know more about your organization.';
        window.location.href = `mailto:${email}?subject=${encodeURIComponent(subject)}&body=${encodeURIComponent(body)}`;
    }
}

// Utility functions
function fadeIn(element, duration = 300) {
    element.style.opacity = 0;
    element.style.display = 'block';
    
    let start = null;
    function animate(timestamp) {
        if (!start) start = timestamp;
        const progress = timestamp - start;
        
        element.style.opacity = Math.min(progress / duration, 1);
        
        if (progress < duration) {
            requestAnimationFrame(animate);
        }
    }
    
    requestAnimationFrame(animate);
}

function fadeOut(element, duration = 300) {
    let start = null;
    function animate(timestamp) {
        if (!start) start = timestamp;
        const progress = timestamp - start;
        
        element.style.opacity = Math.max(1 - (progress / duration), 0);
        
        if (progress < duration) {
            requestAnimationFrame(animate);
        } else {
            element.style.display = 'none';
        }
    }
    
    requestAnimationFrame(animate);
}

// Loading screen
window.addEventListener('load', function() {
    const loadingScreen = document.getElementById('loading-screen');
    if (loadingScreen) {
        fadeOut(loadingScreen, 500);
    }
});

// Error handling for images
document.addEventListener('DOMContentLoaded', function() {
    const images = document.querySelectorAll('img');
    images.forEach(img => {
        img.addEventListener('error', function() {
            this.src = 'https://via.placeholder.com/400x300/ff6b35/ffffff?text=Image+Not+Found';
            this.alt = 'Image not available';
        });
    });
    
    // Initialize text animation between English and Hindi
    initializeTextAnimation();
});

// Text Animation between English and Hindi
function initializeTextAnimation() {
    const animatedTexts = document.querySelectorAll('.animated-text');
    
    if (animatedTexts.length === 0) return;
    
    let currentLanguage = 'english'; // Start with English
    
    function switchLanguage() {
        animatedTexts.forEach((textElement, index) => {
            // Add fade-out class
            textElement.classList.add('fade-out');
            
            // After fade-out animation completes, change text and fade-in
            setTimeout(() => {
                if (currentLanguage === 'english') {
                    textElement.textContent = textElement.getAttribute('data-hindi');
                } else {
                    textElement.textContent = textElement.getAttribute('data-english');
                }
                
                // Remove fade-out and add fade-in
                textElement.classList.remove('fade-out');
                textElement.classList.add('fade-in');
                
                // Remove fade-in class after animation
                setTimeout(() => {
                    textElement.classList.remove('fade-in');
                }, 500);
                
            }, 250); // Half of the transition duration
        });
        
        // Toggle language
        currentLanguage = currentLanguage === 'english' ? 'hindi' : 'english';
    }
    
    // Start animation after 3 seconds, then repeat every 4 seconds
    setTimeout(() => {
        switchLanguage();
        setInterval(switchLanguage, 4000);
    }, 3000);
}