<?php
require_once '../config/db.php';
require_once '../config/security.php';
$currentPage = 'blog';
$pageTitle = 'Blog - Aarati Bulun';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pageTitle; ?></title>
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">
</head>
<body>
    <header class="main-header">
        <nav class="navbar">
            <div class="nav-brand">
                <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>
                </svg>
                <span>Aarati Bulun</span>
            </div>
            <ul class="nav-menu">
                <li><a href="../index.php">Home</a></li>
                <li><a href="../about.php">About</a></li>
                <li><a href="../projects.php">Projects</a></li>
                <li><a href="index.php" class="active">Blog</a></li>
                <li><a href="../contact.php">Contact</a></li>
            </ul>
        </nav>
    </header>
    
    <main>
        <section class="hero" style="padding: 80px 2rem;">
            <div class="container">
                <h1>Blog</h1>
            </div>
        </section>

        <section class="section">
            <div class="blog-grid">
                <?php
                $stmt = $pdo->prepare("SELECT * FROM blog_posts ORDER BY created_at DESC");
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
                        <p><?php echo e(substr($post['content'], 0, 200)) . '...'; ?></p>
                        <a href="view.php?slug=<?php echo e($post['slug']); ?>" class="btn btn-primary">Read More</a>
                    </div>
                </article>
                <?php endforeach; ?>
            </div>
        </section>
    </main>
    
    <footer class="main-footer">
        <div class="footer-content">
            <p>&copy; <?php echo date('Y'); ?> Aarati Bulun. All rights reserved.</p>
            <p class="security-badge">🔒 OWASP Top 10 Protected | Docker Secured</p>
        </div>
    </footer>
</body>
</html>