<?php
require_once 'config/db.php';
require_once 'config/security.php';
$currentPage = 'home';
$pageTitle = 'Aarati Bulun - Web Developer & Cybersecurity Specialist';
include 'includes/header.php';
?>

<section class="hero">
    <div class="container">
        <h1>Web Developer & Cybersecurity Specialist</h1>
        <p>Building secure, scalable web applications with a focus on modern technologies and best security practices.</p>
        <div class="hero-buttons">
            <a href="projects.php" class="btn btn-primary">View Projects →</a>
            <a href="blog/index.php" class="btn btn-secondary">Read Blog</a>
        </div>
    </div>
</section>

<section class="section">
    <h2>Core Expertise</h2>
    <div class="skills-grid">
        <div class="skill-card">
            <div class="skill-icon">&lt;&gt;</div>
            <h3>Web Development</h3>
            <p>PHP, MySQL, HTML5, CSS3, JavaScript. Building secure, scalable web applications with modern frameworks.</p>
        </div>
        <div class="skill-card">
            <div class="skill-icon">🛡️</div>
            <h3>Cybersecurity</h3>
            <p>OWASP Top 10 prevention, penetration testing, secure coding practices, and vulnerability assessment.</p>
        </div>
        <div class="skill-card">
            <div class="skill-icon">🐳</div>
            <h3>DevOps</h3>
            <p>Docker containerization, CI/CD pipelines, cloud infrastructure, and automated deployment.</p>
        </div>
    </div>
</section>

<section class="section" style="background: white;">
    <h2>Latest Blog Posts</h2>
    <div class="blog-grid">
        <?php
        $stmt = $pdo->prepare("SELECT * FROM blog_posts ORDER BY created_at DESC LIMIT 3");
        $stmt->execute();
        $posts = $stmt->fetchAll();
        
        foreach ($posts as $post):
        ?>
        <article class="blog-card">
            <div class="blog-content">
                <div class="blog-meta">
                    <?php echo date('M d, Y', strtotime($post['created_at'])); ?>
                </div>
                <h3><?php echo e($post['title']); ?></h3>
                <p><?php echo e(substr($post['content'], 0, 150)) . '...'; ?></p>
                <a href="blog/view.php?slug=<?php echo e($post['slug']); ?>" class="btn btn-primary">Read More</a>
            </div>
        </article>
        <?php endforeach; ?>
    </div>
    <div style="text-align: center; margin-top: 2rem;">
        <a href="blog/index.php" class="btn btn-secondary">View All Posts</a>
    </div>
</section>

<?php include 'includes/footer.php'; ?>