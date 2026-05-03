<?php
require_once 'config/security.php';
$currentPage = 'about';
$pageTitle = 'About - Aarati Bulun';
include 'includes/header.php';
?>

<section class="hero" style="padding: 80px 2rem;">
    <div class="container">
        <h1>About Me</h1>
    </div>
</section>

<section class="section">
    <div style="max-width: 800px; margin: 0 auto; background: white; padding: 3rem; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.08);">
        <h2 style="color: #1e3a5f; margin-bottom: 1.5rem;">Who Am I?</h2>
        <p style="margin-bottom: 1.5rem; line-height: 1.8;">
            Hello! I'm Aarati Bulun, a passionate web developer and cybersecurity specialist focused on building secure, 
            scalable web applications. I believe in writing clean, secure code that not only functions well but also 
            protects users from common web vulnerabilities.
        </p>
        
        <h2 style="color: #1e3a5f; margin: 2rem 0 1.5rem;">My Skills</h2>
        <ul style="line-height: 2; color: #4a5568;">
            <li><strong>Web Development:</strong> PHP, MySQL, HTML5, CSS3, JavaScript</li>
            <li><strong>Security:</strong> OWASP Top 10, Penetration Testing, Secure Coding</li>
            <li><strong>DevOps:</strong> Docker, CI/CD, Cloud Infrastructure</li>
            <li><strong>Databases:</strong> MySQL, PostgreSQL, MongoDB</li>
        </ul>
    </div>
</section>

<?php include 'includes/footer.php'; ?>