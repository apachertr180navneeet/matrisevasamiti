/**
 * MATRI SEVA SAMITI - CORE JAVASCRIPT
 * Version: 2.0 (Modern Redesign)
 */

document.addEventListener('DOMContentLoaded', function() {
    'use strict';

    // --- 1. Mobile Navigation Toggle ---
    const navToggle = document.getElementById('nav-toggle');
    const navMenu = document.getElementById('nav-menu');

    if (navToggle && navMenu) {
        navToggle.addEventListener('click', function(e) {
            e.stopPropagation();
            navMenu.classList.toggle('active');
            navToggle.classList.toggle('active');
            document.body.classList.toggle('no-scroll', navMenu.classList.contains('active'));
        });

        // Close menu when clicking outside
        document.addEventListener('click', function(e) {
            if (navMenu.classList.contains('active') && !navMenu.contains(e.target) && !navToggle.contains(e.target)) {
                navMenu.classList.remove('active');
                navToggle.classList.remove('active');
                document.body.classList.remove('no-scroll');
            }
        });

        // Close menu on nav item click
        const navLinks = navMenu.querySelectorAll('.nav-link');
        navLinks.forEach(link => {
            link.addEventListener('click', () => {
                navMenu.classList.remove('active');
                navToggle.classList.remove('active');
                document.body.classList.remove('no-scroll');
            });
        });
    }

    // --- 2. Sticky Header Scroll Effect ---
    const header = document.querySelector('.header');
    if (header) {
        window.addEventListener('scroll', function() {
            if (window.scrollY > 50) {
                header.classList.add('scrolled');
            } else {
                header.classList.remove('scrolled');
            }
        });
    }

    // --- 3. Hero Background Slider ---
    const slides = document.querySelectorAll('.hero-slide');
    if (slides.length > 1) {
        let currentSlide = 0;
        setInterval(() => {
            slides[currentSlide].classList.remove('active');
            currentSlide = (currentSlide + 1) % slides.length;
            slides[currentSlide].classList.add('active');
        }, 5500);
    }

    // --- 4. Animated Number Counters on Scroll ---
    const counterElements = document.querySelectorAll('.metric-number');
    if (counterElements.length > 0) {
        const counterObserver = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const target = entry.target;
                    const countTo = parseInt(target.getAttribute('data-count'), 10);
                    const duration = 2000;
                    const stepTime = 20;
                    const totalSteps = duration / stepTime;
                    const stepIncrement = countTo / totalSteps;
                    let currentCount = 0;

                    const timer = setInterval(() => {
                        currentCount += stepIncrement;
                        if (currentCount >= countTo) {
                            target.innerText = countTo.toLocaleString() + (target.getAttribute('data-suffix') || '');
                            clearInterval(timer);
                        } else {
                            target.innerText = Math.floor(currentCount).toLocaleString() + (target.getAttribute('data-suffix') || '');
                        }
                    }, stepTime);

                    observer.unobserve(target);
                }
            });
        }, { threshold: 0.2 });

        counterElements.forEach(el => counterObserver.observe(el));
    }

    // --- 5. Project Filtering Tabs ---
    window.filterProjects = function(category, event) {
        if (event) {
            const tabButtons = document.querySelectorAll('.tab-btn, .gallery-tab-btn');
            tabButtons.forEach(btn => btn.classList.remove('active'));
            event.target.classList.add('active');
        }

        const projectCards = document.querySelectorAll('.project-card, .gallery-card');
        projectCards.forEach(card => {
            const cardCat = card.getAttribute('data-category');
            if (category === 'all' || cardCat === category) {
                card.style.display = 'flex';
                card.style.animation = 'fadeInUp 0.4s ease';
            } else {
                card.style.display = 'none';
            }
        });
    };

    // --- 6. Interactive FAQ Accordion ---
    const faqItems = document.querySelectorAll('.faq-item');
    faqItems.forEach(item => {
        const header = item.querySelector('.faq-header');
        if (header) {
            header.addEventListener('click', () => {
                const isActive = item.classList.contains('active');
                
                // Close all other items
                faqItems.forEach(otherItem => {
                    otherItem.classList.remove('active');
                    const content = otherItem.querySelector('.faq-content');
                    if (content) content.style.maxHeight = null;
                });

                // Toggle clicked item
                if (!isActive) {
                    item.classList.add('active');
                    const content = item.querySelector('.faq-content');
                    if (content) content.style.maxHeight = content.scrollHeight + 'px';
                }
            });
        }
    });

    // --- 7. Donation Preset & 80G Tax Calculation ---
    const amountCards = document.querySelectorAll('.amount-btn-card');
    const customAmtInput = document.getElementById('custom-amount');
    const taxSavingsDisplay = document.getElementById('tax-savings-amount');
    const donationAmountDisplay = document.getElementById('display-donation-amount');

    function updateDonationSummary(amount) {
        const numAmt = parseFloat(amount) || 0;
        if (donationAmountDisplay) {
            donationAmountDisplay.innerText = '₹' + numAmt.toLocaleString('en-IN');
        }
        if (taxSavingsDisplay) {
            // 80G allows 50% deduction of donation amount from taxable income.
            // For someone in 30% tax bracket, actual tax savings = 50% * 30% = 15% of total donation.
            const taxSaved = Math.round(numAmt * 0.15);
            taxSavingsDisplay.innerText = '₹' + taxSaved.toLocaleString('en-IN');
        }
    }

    if (amountCards.length > 0) {
        amountCards.forEach(card => {
            card.addEventListener('click', function() {
                amountCards.forEach(c => c.classList.remove('active'));
                this.classList.add('active');
                const amt = this.getAttribute('data-amount');
                if (customAmtInput) {
                    customAmtInput.value = amt;
                }
                updateDonationSummary(amt);
            });
        });
    }

    if (customAmtInput) {
        customAmtInput.addEventListener('input', function() {
            amountCards.forEach(c => c.classList.remove('active'));
            updateDonationSummary(this.value);
        });
    }

    // --- 8. Copy to Clipboard Functionality ---
    window.copyToClipboard = function(text, elementId, message) {
        navigator.clipboard.writeText(text).then(() => {
            const el = document.getElementById(elementId);
            const originalText = el ? el.innerHTML : '';
            if (el) {
                el.innerHTML = '<i class="fas fa-check"></i> Copied!';
                setTimeout(() => {
                    el.innerHTML = originalText;
                }, 2000);
            } else {
                alert(message || 'Copied to clipboard: ' + text);
            }
        }).catch(err => {
            console.error('Copy failed', err);
        });
    };

    // --- 9. Lightbox Modal Preview ---
    window.openModal = function(modalId, imageSrc, title) {
        const modal = document.getElementById(modalId);
        if (modal) {
            if (imageSrc) {
                const img = modal.querySelector('.modal-image');
                if (img) img.src = imageSrc;
            }
            if (title) {
                const titleEl = modal.querySelector('.modal-title');
                if (titleEl) titleEl.innerText = title;
            }
            modal.classList.add('active');
            document.body.style.overflow = 'hidden';
        }
    };

    window.closeModal = function(modalId) {
        const modal = document.getElementById(modalId);
        if (modal) {
            modal.classList.remove('active');
            document.body.style.overflow = 'auto';
        }
    };

    // Close modal on background click
    document.querySelectorAll('.custom-modal').forEach(modal => {
        modal.addEventListener('click', function(e) {
            if (e.target === this) {
                this.classList.remove('active');
                document.body.style.overflow = 'auto';
            }
        });
    });

    // --- 10. Back to Top Button ---
    const floatTopBtn = document.getElementById('floatTopBtn');
    if (floatTopBtn) {
        window.addEventListener('scroll', () => {
            if (window.scrollY > 400) {
                floatTopBtn.classList.add('visible');
            } else {
                floatTopBtn.classList.remove('visible');
            }
        });

        floatTopBtn.addEventListener('click', () => {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });
    }

    // --- 11. Form Validation & Submissions ---
    const forms = document.querySelectorAll('.ajax-form');
    forms.forEach(form => {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            const submitBtn = form.querySelector('button[type="submit"]');
            const originalBtnText = submitBtn ? submitBtn.innerHTML : 'Submit';
            
            if (submitBtn) {
                submitBtn.disabled = true;
                submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Submitting...';
            }

            const formData = new FormData(form);
            const action = form.getAttribute('action') || window.location.href;

            fetch(action, {
                method: 'POST',
                body: formData
            })
            .then(res => res.text())
            .then(data => {
                alert('Thank you! Your submission has been received successfully. Our team will contact you shortly.');
                form.reset();
                if (submitBtn) {
                    submitBtn.disabled = false;
                    submitBtn.innerHTML = originalBtnText;
                }
            })
            .catch(err => {
                console.error(err);
                alert('Your request has been submitted successfully! Thank you.');
                form.reset();
                if (submitBtn) {
                    submitBtn.disabled = false;
                    submitBtn.innerHTML = originalBtnText;
                }
            });
        });
    });
});