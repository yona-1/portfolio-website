<?php
require_once '../config/db.php';
require_once '../config/security.php';

$slug = $_GET['slug'] ?? '';
if (empty($slug)) {
    header('Location: index.php');
    exit;
}

$stmt = $pdo->prepare("SELECT p.*, u.username FROM blog_posts p LEFT JOIN users u ON p.author_id = u.id WHERE p.slug = ?");
$stmt->execute([$slug]);
$post = $stmt->fetch();

if (!$post) {
    die('Post not found');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo e($post['title']); ?> - Aarati Bulun</title>
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
        <article style="max-width: 900px; margin: 2rem auto; background: white; padding: 3rem; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.08);">
            <header style="margin-bottom: 2rem; padding-bottom: 2rem; border-bottom: 2px solid #e2e8f0;">
                <h1 style="color: #1e3a5f; font-size: 2.5rem; margin-bottom: 1rem;"><?php echo e($post['title']); ?></h1>
                <div style="color: #718096;">
                    By <?php echo e($post['username'] ?? 'Admin'); ?> | 
                    Published: <?php echo date('M d, Y', strtotime($post['created_at'])); ?>
                </div>
            </header>
            
            <div style="line-height: 1.8; color: #4a5568; font-size: 1.1rem;">
                <?php echo nl2br(e($post['content'])); ?>
            </div>
            
            <footer style="margin-top: 3rem; padding-top: 2rem; border-top: 2px solid #e2e8f0;">
                <a href="index.php" class="btn btn-secondary">← Back to Blog</a>
            </footer>
        </article>
    </main>
    
    <footer class="main-footer">
        <div class="footer-content">
            <p>&copy; <?php echo date('Y'); ?> Aarati Bulun. All rights reserved.</p>
            <p class="security-badge">🔒 OWASP Top 10 Protected | Docker Secured</p>
        </div>
    </footer>
</body>
</html>