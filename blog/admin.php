<?php
require_once '../config/db.php';
require_once '../config/security.php';

$error = '';
$success = '';

if (isset($_POST['login'])) {
    $username = sanitize_input($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';
    
    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->execute([$username]);
    $user = $stmt->fetch();
    
    if ($user && password_verify($password, $user['password_hash'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
    } else {
        $error = 'Invalid credentials';
    }
}

if (isset($_GET['logout'])) {
    session_destroy();
    header('Location: admin.php');
    exit;
}

if (isset($_POST['create_post']) && isset($_SESSION['user_id'])) {
    $title = sanitize_input($_POST['title'] ?? '');
    $slug = sanitize_input($_POST['slug'] ?? '');
    $content = sanitize_input($_POST['content'] ?? '');
    
    if (!empty($title) && !empty($slug) && !empty($content)) {
        $stmt = $pdo->prepare("INSERT INTO blog_posts (title, slug, content, author_id) VALUES (?, ?, ?, ?)");
        $stmt->execute([$title, $slug, $content, $_SESSION['user_id']]);
        $success = 'Post created successfully!';
    }
}

$is_logged_in = isset($_SESSION['user_id']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Aarati Bulun</title>
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
                <li><a href="index.php">Blog</a></li>
            </ul>
        </nav>
    </header>
    
    <main>
        <section class="section">
            <div style="max-width: 800px; margin: 0 auto; background: white; padding: 3rem; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.08);">
                <h1 style="color: #1e3a5f; margin-bottom: 2rem;">Admin Panel</h1>
                
                <?php if ($error): ?>
                    <div style="background: #fed7d7; color: #742a2a; padding: 1rem; border-radius: 8px; margin-bottom: 1.5rem;">
                        <?php echo e($error); ?>
                    </div>
                <?php endif; ?>
                
                <?php if ($success): ?>
                    <div style="background: #c6f6d5; color: #22543d; padding: 1rem; border-radius: 8px; margin-bottom: 1.5rem;">
                        <?php echo e($success); ?>
                    </div>
                <?php endif; ?>
                
                <?php if (!$is_logged_in): ?>
                    <form method="POST">
                        <div style="margin-bottom: 1.5rem;">
                            <label style="display: block; margin-bottom: 0.5rem; font-weight: 600;">Username</label>
                            <input type="text" name="username" required style="width: 100%; padding: 0.75rem; border: 1px solid #e2e8f0; border-radius: 8px;">
                        </div>
                        <div style="margin-bottom: 1.5rem;">
                            <label style="display: block; margin-bottom: 0.5rem; font-weight: 600;">Password</label>
                            <input type="password" name="password" required style="width: 100%; padding: 0.75rem; border: 1px solid #e2e8f0; border-radius: 8px;">
                        </div>
                        <button type="submit" name="login" class="btn btn-primary">Login</button>
                    </form>
                    <p style="margin-top: 1rem; color: #718096; font-size: 0.9rem;"><strong>Default:</strong> admin / password</p>
                <?php else: ?>
                    <p>Welcome, <strong><?php echo e($_SESSION['username']); ?></strong>!</p>
                    <a href="?logout=1" class="btn btn-secondary" style="margin: 1rem 0;">Logout</a>
                    <hr style="margin: 2rem 0; border: none; border-top: 2px solid #e2e8f0;">
                    <h2 style="color: #1e3a5f; margin-bottom: 1.5rem;">Create New Post</h2>
                    <form method="POST">
                        <div style="margin-bottom: 1.5rem;">
                            <label style="display: block; margin-bottom: 0.5rem; font-weight: 600;">Title</label>
                            <input type="text" name="title" required style="width: 100%; padding: 0.75rem; border: 1px solid #e2e8f0; border-radius: 8px;">
                        </div>
                        <div style="margin-bottom: 1.5rem;">
                            <label style="display: block; margin-bottom: 0.5rem; font-weight: 600;">Slug</label>
                            <input type="text" name="slug" required placeholder="my-first-post" style="width: 100%; padding: 0.75rem; border: 1px solid #e2e8f0; border-radius: 8px;">
                        </div>
                        <div style="margin-bottom: 1.5rem;">
                            <label style="display: block; margin-bottom: 0.5rem; font-weight: 600;">Content</label>
                            <textarea name="content" rows="10" required style="width: 100%; padding: 0.75rem; border: 1px solid #e2e8f0; border-radius: 8px;"></textarea>
                        </div>
                        <button type="submit" name="create_post" class="btn btn-primary">Create Post</button>
                    </form>
                <?php endif; ?>
            </div>
        </section>
    </main>
    
    <footer class="main-footer">
        <p>&copy; <?php echo date('Y'); ?> Aarati Bulun. All rights reserved.</p>
    </footer>
</body>
</html>