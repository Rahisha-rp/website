<?php 
$pageTitle = "Home - Insurance Company";
include 'includes/header.php'; 
?>

<!-- Hero Section -->
<section class="hero-section">
    <div class="container">
        <h1 class="hero-title">Protecting What Matters Most</h1>
        <p class="lead fs-4 mb-4">Trusted insurance solutions tailored to your needs</p>
        <div class="d-flex justify-content-center gap-3">
            <a href="products.php" class="btn btn-light btn-lg px-4">Our Products</a>
            <a href="#" class="btn btn-outline-light btn-lg px-4" data-bs-toggle="modal" data-bs-target="#quoteModal">Get a Quote</a>
        </div>
    </div>
</section>

<!-- Features Section -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold">Why Choose Us?</h2>
            <p class="lead text-muted">We provide exceptional service with these benefits</p>
        </div>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="text-center p-4 bg-white rounded shadow-sm">
                    <i class="fas fa-shield-alt product-icon"></i>
                    <h3>Comprehensive Coverage</h3>
                    <p>Our policies offer extensive protection tailored to your specific needs.</p>
                </div>
            </div>
            <!-- Repeat for other features -->
        </div>
    </div>
</section>

<!-- Products Preview -->
<section class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold">Our Insurance Products</h2>
            <p class="lead text-muted">Find the perfect coverage for your needs</p>
        </div>
        <div class="row g-4">
            <?php
            // Sample products data - in real app this would come from database
            $products = [
                [
                    'id' => 'life',
                    'title' => 'Life Insurance',
                    'desc' => 'Secure your family\'s future with financial protection.',
                    'icon' => 'fa-heart'
                ],
                [
                    'id' => 'health',
                    'title' => 'Health Insurance',
                    'desc' => 'Comprehensive medical coverage for you and your family.',
                    'icon' => 'fa-medkit'
                ],
                [
                    'id' => 'property',
                    'title' => 'Property Insurance',
                    'desc' => 'Protect your home and belongings from unexpected events.',
                    'icon' => 'fa-home'
                ]
            ];
            
            foreach ($products as $product) {
                echo '<div class="col-md-4">
                    <div class="product-card p-4 text-center h-100">
                        <i class="fas '.$product['icon'].' product-icon"></i>
                        <h3>'.$product['title'].'</h3>
                        <p>'.$product['desc'].'</p>
                        <a href="products.php#'.$product['id'].'" class="btn btn-outline-primary">Learn More</a>
                    </div>
                </div>';
            }
            ?>
        </div>
        <div class="text-center mt-5">
            <a href="products.php" class="btn btn-primary btn-lg">View All Products</a>
        </div>
    </div>
</section>

<!-- Quote Modal -->
<div class="modal fade" id="quoteModal" tabindex="-1" aria-labelledby="quoteModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="quoteModalLabel">Get a Free Quote</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="quoteForm" action="process_quote.php" method="POST">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="fullName" class="form-label">Full Name</label>
                            <input type="text" class="form-control" id="fullName" name="fullName" required>
                        </div>
                        <div class="col-md-6">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="col-md-6">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="tel" class="form-control" id="phone" name="phone" required>
                        </div>
                        <div class="col-md-6">
                            <label for="insuranceType" class="form-label">Insurance Type</label>
                            <select class="form-select" id="insuranceType" name="insuranceType" required>
                                <option value="">Select...</option>
                                <option value="life">Life Insurance</option>
                                <option value="health">Health Insurance</option>
                                <option value="property">Property Insurance</option>
                                <option value="auto">Auto Insurance</option>
                                <option value="business">Business Insurance</option>
                            </select>
                        </div>
                        <div class="col-12">
                            <label for="message" class="form-label">Additional Information</label>
                            <textarea class="form-control" id="message" name="message" rows="3"></textarea>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" form="quoteForm" class="btn btn-primary">Submit Request</button>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>