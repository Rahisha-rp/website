<?php 
$pageTitle = "Contact Us - Insurance Company";
include 'includes/header.php'; 
?>

<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <h2 class="fw-bold mb-4">Contact Our Team</h2>
                <p class="lead">Have questions? We're here to help!</p>
                
                <form id="contactForm" action="process_contact.php" method="POST" class="mt-4">
                    <div class="mb-3">
                        <label for="name" class="form-label">Full Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email Address</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="subject" class="form-label">Subject</label>
                        <input type="text" class="form-control" id="subject" name="subject" required>
                    </div>
                    <div class="mb-3">
                        <label for="message" class="form-label">Message</label>
                        <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Send Message</button>
                </form>
            </div>
            <div class="col-lg-6">
                <div class="bg-light p-4 rounded h-100">
                    <h3 class="fw-bold mb-4">Our Offices</h3>
                    <div class="mb-4">
                        <h4>Headquarters</h4>
                        <p>
                            <i class="fas fa-map-marker-alt me-2"></i> 123 Insurance Street, City, Country<br>
                            <i class="fas fa-phone me-2"></i> +1 (234) 567-8900<br>
                            <i class="fas fa-envelope me-2"></i> info@insurancecompany.com
                        </p>
                    </div>
                    
                    <h4 class="mt-5">Business Hours</h4>
                    <p>
                        Monday - Friday: 8:30 AM - 5:30 PM<br>
                        Saturday: 9:00 AM - 1:00 PM<br>
                        Sunday: Closed
                    </p>
                    
                    <div class="mt-5">
                        <h4>Follow Us</h4>
                        <div class="social-icons">
                            <a href="#" class="me-3"><i class="fab fa-facebook-f"></i></a>
                            <a href="#" class="me-3"><i class="fab fa-twitter"></i></a>
                            <a href="#" class="me-3"><i class="fab fa-linkedin-in"></i></a>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Map Section -->
<section class="py-0">
    <div class="container-fluid p-0">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d12345.6789!2dlongitude!3dlatitude!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zNDLCsDQ1JzQxLjQiTiA3NcKwNTcnMDkuNiJF!5e0!3m2!1sen!2sus!4v1234567890123!5m2!1sen!2sus" 
                width="100%" 
                height="450" 
                style="border:0;" 
                allowfullscreen="" 
                loading="lazy"></iframe>
    </div>
</section>

<?php include 'includes/footer.php'; ?>