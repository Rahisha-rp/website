document.addEventListener('DOMContentLoaded', function() {
    // Smooth scrolling for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            e.preventDefault();
            const targetId = this.getAttribute('href');
            if (targetId !== '#') {
                document.querySelector(targetId).scrollIntoView({
                    behavior: 'smooth'
                });
            }
        });
    });

    // Form validation for quote form
    const quoteForm = document.getElementById('quoteForm');
    if (quoteForm) {
        quoteForm.addEventListener('submit', function(e) {
            const phoneInput = document.getElementById('phone');
            const phonePattern = /^[\d\+\-\(\)\s]{10,15}$/;
            
            if (!phonePattern.test(phoneInput.value)) {
                e.preventDefault();
                alert('Please enter a valid phone number');
                phoneInput.focus();
                return false;
            }
            
            // You can add more validation here
            
            // If validation passes, you might want to submit via AJAX
            // e.preventDefault();
            // submitQuoteForm();
        });
    }

    // Testimonial slider
    const testimonialSlider = document.getElementById('testimonialSlider');
    if (testimonialSlider) {
        // Initialize with vanilla JS or you can use a library like Glide.js
        let currentIndex = 0;
        const testimonials = testimonialSlider.querySelectorAll('.testimonial-item');
        const totalTestimonials = testimonials.length;
        
        function showTestimonial(index) {
            testimonials.forEach((testimonial, i) => {
                testimonial.style.display = i === index ? 'block' : 'none';
            });
        }
        
        setInterval(() => {
            currentIndex = (currentIndex + 1) % totalTestimonials;
            showTestimonial(currentIndex);
        }, 5000);
        
        showTestimonial(0);
    }

    // Animate elements when they come into view
    const animateOnScroll = () => {
        const elements = document.querySelectorAll('.animate-on-scroll');
        
        elements.forEach(element => {
            const elementPosition = element.getBoundingClientRect().top;
            const windowHeight = window.innerHeight;
            
            if (elementPosition < windowHeight - 100) {
                element.classList.add('animated');
            }
        });
    };
    
    window.addEventListener('scroll', animateOnScroll);
    animateOnScroll(); // Run once on load
});

// AJAX form submission example
function submitQuoteForm() {
    const form = document.getElementById('quoteForm');
    const formData = new FormData(form);
    
    fetch('process_quote.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert('Thank you! Your quote request has been submitted.');
            // Close modal if using Bootstrap
            const quoteModal = bootstrap.Modal.getInstance(document.getElementById('quoteModal'));
            quoteModal.hide();
            form.reset();
        } else {
            alert('There was an error: ' + (data.message || 'Please try again later.'));
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('There was an error submitting your request. Please try again.');
    });
}