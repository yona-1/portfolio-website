<?php
require_once 'config/security.php';
$currentPage = 'contact';
$pageTitle = 'Contact - Aarati Bulun';
include 'includes/header.php';
?>

<section class="hero" style="padding: 80px 2rem;">
    <div class="container">
        <h1>Contact Me</h1>
    </div>
</section>

<section class="section">
    <div style="max-width: 800px; margin: 0 auto; background: white; padding: 3rem; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.08);">
        <h2 style="color: #1e3a5f; margin-bottom: 1.5rem;">Get In Touch</h2>
        <p style="color: #4a5568; line-height: 1.8; margin-bottom: 2rem;">
            📧 Email: contact@aaratibulun.com.np<br>
            📍 Location: Kathmandu, Nepal<br>
            🔒 This form is protected with OWASP security measures
        </p>
    </div>
</section>

<?php include 'includes/footer.php'; ?>