<?php
require_once 'config/security.php';
$currentPage = 'projects';
$pageTitle = 'Projects - Aarati Bulun';
include 'includes/header.php';
?>

<section class="hero" style="padding: 80px 2rem;">
    <div class="container">
        <h1>My Projects</h1>
    </div>
</section>

<section class="section">
    <div class="blog-grid">
        <div class="blog-card">
            <div class="blog-content">
                <h3>Secure Portfolio Website</h3>
                <p>A full-stack portfolio with blog, built with PHP, MySQL, and Docker. Implements OWASP Top 10 security measures.</p>
                <div style="margin: 1rem 0;">
                    <span style="display: inline-block; background: #e6fffa; color: #234e52; padding: 0.25rem 0.75rem; border-radius: 20px; font-size: 0.85rem; margin: 0.25rem;">PHP</span>
                    <span style="display: inline-block; background: #e6fffa; color: #234e52; padding: 0.25rem 0.75rem; border-radius: 20px; font-size: 0.85rem; margin: 0.25rem;">MySQL</span>
                    <span style="display: inline-block; background: #e6fffa; color: #234e52; padding: 0.25rem 0.75rem; border-radius: 20px; font-size: 0.85rem; margin: 0.25rem;">Docker</span>
                </div>
            </div>
        </div>
        
        <div class="blog-card">
            <div class="blog-content">
                <h3>E-Commerce Platform</h3>
                <p>Online shopping platform with secure payment integration and user authentication.</p>
                <div style="margin: 1rem 0;">
                    <span style="display: inline-block; background: #e6fffa; color: #234e52; padding: 0.25rem 0.75rem; border-radius: 20px; font-size: 0.85rem; margin: 0.25rem;">PHP</span>
                    <span style="display: inline-block; background: #e6fffa; color: #234e52; padding: 0.25rem 0.75rem; border-radius: 20px; font-size: 0.85rem; margin: 0.25rem;">MySQL</span>
                </div>
            </div>
        </div>
        
        <div class="blog-card">
            <div class="blog-content">
                <h3>Blog CMS with Security</h3>
                <p>Content management system with role-based access control and XSS/SQL injection prevention.</p>
                <div style="margin: 1rem 0;">
                    <span style="display: inline-block; background: #e6fffa; color: #234e52; padding: 0.25rem 0.75rem; border-radius: 20px; font-size: 0.85rem; margin: 0.25rem;">PHP</span>
                    <span style="display: inline-block; background: #e6fffa; color: #234e52; padding: 0.25rem 0.75rem; border-radius: 20px; font-size: 0.85rem; margin: 0.25rem;">Bootstrap</span>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>