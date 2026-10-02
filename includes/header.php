<?php require_once __DIR__ . '/config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= e($site['name']) ?> | <?= e($site['tagline']) ?></title>
    <meta name="description" content="Aviyan Villa Wadduwa – a tranquil 4-bedroom private villa with garden, restaurant and steak house, a short walk from Wadduwa Beach, Sri Lanka.">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@500;700&family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<header class="site-header" id="top">
    <div class="container nav-wrap">
        <a href="#top" class="logo">Aviyan<span>Villa</span></a>
        <button class="nav-toggle" aria-label="Open menu" aria-expanded="false">
            <span></span><span></span><span></span>
        </button>
        <nav class="main-nav">
            <a href="#about">About</a>
            <a href="#rooms">Villa</a>
            <a href="#facilities">Facilities</a>
            <a href="#dining">Dining</a>
            <a href="#gallery">Gallery</a>
            <a href="#location">Location</a>
            <a href="#rules">House Rules</a>
            <a href="#book" class="btn btn-small">Book Now</a>
        </nav>
    </div>
</header>
