<?php
// Contact Form Processing Logic
$message_status = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    if (!empty($name) && !empty($email) && !empty($message)) {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            // Yahan database ya email send karne ka logic aayega (Epic 5 backend)
            $message_status = "<div class='alert success'>Thank you, $name! Your message has been sent successfully.</div>";
        } else {
            $message_status = "<div class='alert error'>Please enter a valid email address.</div>";
        }
    } else {
        $message_status = "<div class='alert error'>All fields are required!</div>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QuickPOS - Smart Point of Sale</title>
    
    <link rel="stylesheet" href="style.css">
    
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>

    <header class="navbar">
        <div class="logo">
            <i class="fa-solid fa-cash-register"></i> QuickPOS
        </div>
        <nav>
            <ul class="nav-links">
                <li><a href="#features">Features</a></li>
                <li><a href="#pricing">Pricing</a></li>
                <li><a href="#contact">Contact</a></li>
            </ul>
        </nav>
        <a href="#signup" class="btn btn-outline">Sign Up</a>
    </header>

    <section class="hero">
        <div class="hero-content">
            <h1>Smart Point of Sale for Modern Business</h1>
            <p>Streamline your checkout process, manage inventory in real-time, and grow your sales seamlessly with QuickPOS.</p>
            <div class="hero-buttons">
                <a href="#pricing" class="btn btn-primary">Get a Free Demo</a>
                <a href="#features" class="btn btn-secondary">Learn More</a>
            </div>
        </div>
        <div class="hero-image">
            <img src="https://images.unsplash.com/photo-1556742049-0cfed4f6a45d?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80" alt="POS System Interface">
        </div>
    </section>

    <section id="features" class="features">
        <div class="section-header">
            <h2>Why Choose QuickPOS?</h2>
            <p>Everything you need to run your business smoothly and efficiently.</p>
        </div>
        <div class="feature-grid">
            <div class="feature-card">
                <i class="fa-solid fa-bolt feature-icon"></i>
                <h3>Lightning Fast Checkout</h3>
                <p>Process transactions in seconds to keep your lines moving and customers happy.</p>
            </div>
            <div class="feature-card">
                <i class="fa-solid fa-box-open feature-icon"></i>
                <h3>Inventory Management</h3>
                <p>Track stock levels automatically and receive low-stock alerts in real-time.</p>
            </div>
            <div class="feature-card">
                <i class="fa-solid fa-chart-line feature-icon"></i>
                <h3>Detailed Analytics</h3>
                <p>Make data-driven decisions with powerful sales reports and visual insights.</p>
            </div>
        </div>
    </section>

    <section id="pricing" class="pricing">
        <div class="section-header">
            <h2>Simple, Transparent Pricing</h2>
            <p>Choose the plan that best fits your business needs.</p>
        </div>
        <div class="pricing-grid">
            <div class="pricing-card">
                <h3>Basic</h3>
                <div class="price"><span>$</span>29<span>/mo</span></div>
                <ul class="features-list">
                    <li><i class="fa-solid fa-check"></i> 1 Register</li>
                    <li><i class="fa-solid fa-check"></i> Basic Reporting</li>
                    <li><i class="fa-solid fa-check"></i> Email Support</li>
                </ul>
                <a href="#contact" class="btn btn-outline">Choose Basic</a>
            </div>
            <div class="pricing-card popular">
                <div class="badge">Most Popular</div>
                <h3>Pro</h3>
                <div class="price"><span>$</span>79<span>/mo</span></div>
                <ul class="features-list">
                    <li><i class="fa-solid fa-check"></i> Up to 5 Registers</li>
                    <li><i class="fa-solid fa-check"></i> Advanced Analytics</li>
                    <li><i class="fa-solid fa-check"></i> 24/7 Priority Support</li>
                    <li><i class="fa-solid fa-check"></i> Inventory Management</li>
                </ul>
                <a href="#contact" class="btn btn-primary">Choose Pro</a>
            </div>
            <div class="pricing-card">
                <h3>Enterprise</h3>
                <div class="price"><span>$</span>199<span>/mo</span></div>
                <ul class="features-list">
                    <li><i class="fa-solid fa-check"></i> Unlimited Registers</li>
                    <li><i class="fa-solid fa-check"></i> Custom Integrations</li>
                    <li><i class="fa-solid fa-check"></i> Dedicated Account Manager</li>
                </ul>
                <a href="#contact" class="btn btn-outline">Contact Sales</a>
            </div>
        </div>
    </section>

    <section id="contact" class="contact">
        <div class="section-header">
            <h2>Get In Touch</h2>
            <p>Have questions? Our team is here to help you.</p>
        </div>
        <div class="contact-container">
            <?= $message_status; ?>
            <form action="#contact" method="POST" class="contact-form">
                <div class="form-group">
                    <label for="name">Full Name</label>
                    <input type="text" id="name" name="name" placeholder="John Doe" required>
                </div>
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" id="email" name="email" placeholder="john@example.com" required>
                </div>
                <div class="form-group">
                    <label for="message">Your Message</label>
                    <textarea id="message" name="message" rows="5" placeholder="How can we help you?" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Send Message</button>
            </form>
        </div>
    </section>

    <footer class="footer">
        <div class="footer-content">
            <div class="footer-logo">
                <i class="fa-solid fa-cash-register"></i> QuickPOS
            </div>
            <div class="social-links">
                <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                <a href="#"><i class="fa-brands fa-twitter"></i></a>
                <a href="#"><i class="fa-brands fa-instagram"></i></a>
                <a href="#"><i class="fa-brands fa-linkedin-in"></i></a>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2026 QuickPOS. All rights reserved.</p>
        </div>
    </footer>

</body>
</html>