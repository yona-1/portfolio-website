<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pageTitle ?? 'Aarati Bulun - Portfolio'; ?></title>
    <link rel="stylesheet" href="css/style.css">
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
                <li><a href="index.php" class="<?php echo ($currentPage ?? '') === 'home' ? 'active' : ''; ?>">Home</a></li>
                <li><a href="about.php" class="<?php echo ($currentPage ?? '') === 'about' ? 'active' : ''; ?>">About</a></li>
                <li><a href="projects.php" class="<?php echo ($currentPage ?? '') === 'projects' ? 'active' : ''; ?>">Projects</a></li>
                <li><a href="blog/index.php" class="<?php echo ($currentPage ?? '') === 'blog' ? 'active' : ''; ?>">Blog</a></li>
                <li><a href="contact.php" class="<?php echo ($currentPage ?? '') === 'contact' ? 'active' : ''; ?>">Contact</a></li>
            </ul>
        </nav>
    </header>
    <main>