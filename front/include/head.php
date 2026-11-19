<?php
declare(strict_types=1);

/**
 * ============================================================================
 * WoW STUDIO — PUBLIC WEBSITE MASTER HEAD COMPONENT
 * Architecture: MPP Group High-Performance Layout
 * Theme: Royal Burgundy (#6b1426) & Champagne Gold (#cfa859)
 * Brand: WoW Studio (Photography & Cinematic Films)
 * Path: front/include/head.php
 * ============================================================================
 */

$pageTitle       = $pageTitle ?? 'WoW Studio — Premium Wedding Photography & Cinematic Films';
$pageDescription = $pageDescription ?? 'WoW Studio is an elite wedding photography & cinematography production house. Specializing in luxury destination weddings, candid love stories, and cinematic films.';
$pageKeywords    = $pageKeywords ?? 'WoW Studio, wedding photography, destination wedding photographer, pre-wedding shoot, candid wedding films, Udaipur wedding cinema';
$canonicalUrl    = $canonicalUrl ?? '';
$ogType          = $ogType ?? 'website';
$ogImage         = $ogImage ?? (($appBasePath ?? '') . '/uploads/photo store/2.jpeg');
$appBasePath     = $appBasePath ?? '';
$currModule      = $currModule ?? ($_GET['module'] ?? 'home');
$isHomePage      = ($currModule === 'home' || empty($currModule));
$bodyPageClass   = $isHomePage ? 'page-home is-home-page' : 'page-inner is-other-page is-inner-page';
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= htmlspecialchars($pageTitle, ENT_QUOTES, 'UTF-8') ?></title>
    <meta name="description" content="<?= htmlspecialchars($pageDescription, ENT_QUOTES, 'UTF-8') ?>">
    <meta name="keywords" content="<?= htmlspecialchars($pageKeywords, ENT_QUOTES, 'UTF-8') ?>">
    <meta name="theme-color" content="#6b1426">

    <?php if (!empty($canonicalUrl)): ?>
    <link rel="canonical" href="<?= htmlspecialchars($canonicalUrl, ENT_QUOTES, 'UTF-8') ?>">
    <?php endif; ?>

    <!-- OpenGraph Social Sharing Metadata -->
    <meta property="og:type" content="<?= htmlspecialchars($ogType, ENT_QUOTES, 'UTF-8') ?>">
    <meta property="og:site_name" content="WoW Studio">
    <meta property="og:title" content="<?= htmlspecialchars($pageTitle, ENT_QUOTES, 'UTF-8') ?>">
    <meta property="og:description" content="<?= htmlspecialchars($pageDescription, ENT_QUOTES, 'UTF-8') ?>">
    <?php if (!empty($ogImage)): ?>
    <meta property="og:image" content="<?= htmlspecialchars($ogImage, ENT_QUOTES, 'UTF-8') ?>">
    <?php endif; ?>

    <!-- Twitter Card Metadata -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?= htmlspecialchars($pageTitle, ENT_QUOTES, 'UTF-8') ?>">
    <meta name="twitter:description" content="<?= htmlspecialchars($pageDescription, ENT_QUOTES, 'UTF-8') ?>">
    <?php if (!empty($ogImage)): ?>
    <meta name="twitter:image" content="<?= htmlspecialchars($ogImage, ENT_QUOTES, 'UTF-8') ?>">
    <?php endif; ?>

    <link rel="icon" type="image/svg+xml" href="<?= $appBasePath ?>/front/assets/images/logo-mark.svg">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Poppins:wght@300;400;500;600;700;800;900&family=DM+Sans:wght@400;500;700&display=swap" rel="stylesheet">

    <!-- Bootstrap 5.3 Framework & FontAwesome 6 & Bootstrap Icons (Local Vendor with CDN Fallback) -->
    <?php if (file_exists(__DIR__ . '/../assets/vendor/bootstrap/bootstrap.min.css')): ?>
    <link rel="stylesheet" href="<?= $appBasePath ?>/front/assets/vendor/bootstrap/bootstrap.min.css">
    <?php else: ?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <?php endif; ?>

    <?php if (file_exists(__DIR__ . '/../assets/vendor/bootstrap-icons/bootstrap-icons.min.css')): ?>
    <link rel="stylesheet" href="<?= $appBasePath ?>/front/assets/vendor/bootstrap-icons/bootstrap-icons.min.css">
    <?php else: ?>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <?php endif; ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <!-- Core Shared MPP Design System Stylesheets with Royal Burgundy & Champagne Gold Theme -->
    <link rel="stylesheet" href="<?= $appBasePath ?>/front/assets/css/app.css?v=<?= file_exists(__DIR__ . '/../assets/css/app.css') ? filemtime(__DIR__ . '/../assets/css/app.css') : time() ?>">
    <link rel="stylesheet" href="<?= $appBasePath ?>/front/assets/css/components.css?v=<?= file_exists(__DIR__ . '/../assets/css/components.css') ? filemtime(__DIR__ . '/../assets/css/components.css') : time() ?>">
    <link rel="stylesheet" href="<?= $appBasePath ?>/front/assets/css/responsive.css?v=<?= file_exists(__DIR__ . '/../assets/css/responsive.css') ? filemtime(__DIR__ . '/../assets/css/responsive.css') : time() ?>">
    <link rel="stylesheet" href="<?= $appBasePath ?>/front/assets/css/animations.css?v=<?= file_exists(__DIR__ . '/../assets/css/animations.css') ? filemtime(__DIR__ . '/../assets/css/animations.css') : time() ?>">

    <!-- GSAP & ScrollTrigger Core Cinematic Animation Engine -->
    <script src="<?= $appBasePath ?>/front/assets/js/gsap.min.js"></script>
    <script src="<?= $appBasePath ?>/front/assets/js/ScrollTrigger.min.js"></script>

    <!-- Strict Fixed Navbar (Zero Morphing / Zero Capsule Shrinking on Scroll) -->
    <style>
        /* Navbar is always 100% full width and fixed at top 0 across all pages and on scroll */
        .site-header,
        .site-header.scrolled,
        body.is-other-page .site-header,
        body.is-inner-page .site-header,
        body:not(.is-home-page) .site-header {
            position: sticky !important;
            top: 0 !important;
            left: 0 !important;
            right: 0 !important;
            width: 100% !important;
            max-width: 100% !important;
            margin: 0 !important;
            border-radius: 0 !important;
            background: #ffffff !important;
            border-bottom: 1px solid var(--line) !important;
            box-shadow: 0 4px 18px rgba(0, 0, 0, 0.06) !important;
            z-index: 1050 !important;
            transform: none !important;
            transition: none !important;
        }

        .site-header .container,
        .site-header.scrolled .container,
        body.is-other-page .site-header .container,
        body.is-inner-page .site-header .container {
            width: 100% !important;
            max-width: 100% !important;
            padding-inline: 28px !important;
        }

        .font-serif { font-family: 'Playfair Display', Georgia, serif !important; }
        .font-cursive { font-family: 'Great Vibes', cursive !important; }
        .brand-monogram-img {
            width: 44px;
            height: 44px;
            object-fit: contain;
            filter: drop-shadow(0 2px 5px rgba(107, 20, 38, 0.25));
        }
        .text-royal-burgundy { color: var(--royal-burgundy) !important; }
        .text-champagne-gold { color: var(--champagne-gold) !important; }
        .bg-royal-burgundy { background-color: var(--royal-burgundy) !important; color: #ffffff !important; }
        .bg-champagne-gold { background-color: var(--champagne-gold) !important; color: #ffffff !important; }
        .btn-royal {
            background: linear-gradient(135deg, var(--royal-burgundy), #4a0b17);
            color: #ffffff !important;
            border: 1px solid var(--royal-burgundy);
            padding: 10px 24px;
            border-radius: 30px;
            font-weight: 600;
            transition: all 0.3s ease;
            box-shadow: 0 4px 14px rgba(107, 20, 38, 0.25);
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }
        .btn-royal:hover {
            background: linear-gradient(135deg, #540d1a, #2f040d);
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(107, 20, 38, 0.35);
            color: #ffffff !important;
        }
        .btn-gold-outline {
            background: transparent;
            color: var(--champagne-gold) !important;
            border: 1.5px solid var(--champagne-gold);
            padding: 10px 24px;
            border-radius: 30px;
            font-weight: 600;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }
        .btn-gold-outline:hover {
            background: var(--champagne-gold);
            color: #ffffff !important;
            transform: translateY(-2px);
            box-shadow: 0 6px 18px rgba(207, 168, 89, 0.3);
        }
        .announcement-bar {
            background: linear-gradient(90deg, #4a0b17 0%, #6b1426 50%, #4a0b17 100%) !important;
            color: #ffffff;
            font-size: 13.5px;
            padding: 9px 0;
            border-bottom: 1px solid rgba(207, 168, 89, 0.3);
        }
        .announcement-badge {
            background: var(--champagne-gold) !important;
            color: #2c2523 !important;
            font-weight: 700;
            font-size: 11px;
            text-transform: uppercase;
            letter-spacing: 0.8px;
            padding: 3px 10px;
            border-radius: 20px;
            margin-right: 8px;
            display: inline-block;
        }
        /* Marquee Ticker Strip */
        .marquee-container {
            overflow: hidden;
            white-space: nowrap;
            position: relative;
            padding: 24px 0;
            background: #ffffff;
            border-top: 1px solid var(--line);
            border-bottom: 1px solid var(--line);
        }
        .marquee-track {
            display: inline-flex;
            gap: 20px;
            animation: marqueeScroll 45s linear infinite;
        }
        .marquee-track:hover {
            animation-play-state: paused;
        }
        @keyframes marqueeScroll {
            0% { transform: translateX(0); }
            100% { transform: translateX(-50%); }
        }
        .marquee-card {
            flex: 0 0 240px;
            height: 310px;
            border-radius: 14px;
            overflow: hidden;
            position: relative;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.08);
            border: 2px solid var(--champagne-gold-border);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .marquee-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 16px 36px rgba(107, 20, 38, 0.2);
            border-color: var(--champagne-gold);
        }
        .marquee-card img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }
        .marquee-card:hover img {
            transform: scale(1.08);
        }
        .marquee-card .marquee-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(180deg, transparent 50%, rgba(44, 11, 23, 0.92) 100%);
            display: flex;
            flex-direction: column;
            justify-content: flex-end;
            padding: 16px;
            color: #ffffff;
        }
        .marquee-card .marquee-title {
            font-size: 14px;
            font-weight: 700;
            margin-bottom: 2px;
            font-family: 'Playfair Display', serif;
        }
        .marquee-card .marquee-tag {
            font-size: 11px;
            color: var(--champagne-gold);
            text-transform: uppercase;
            letter-spacing: 1px;
            font-weight: 600;
        }

        /* =================================================================
           Universal Card & Button Anti-Line-Break & Anti-Overlap System
           ================================================================= */
        .button,
        .btn,
        .btn-royal,
        .btn-gold-outline,
        .btn-wedding-primary,
        .btn-wedding-secondary,
        .card-explore-btn,
        .btn-bespoke-action,
        .btn-view-gallery-pill,
        .btn-coverage-all,
        .btn-collection-full,
        .filter-pill-btn,
        .btn-philosophy-primary,
        .btn-philosophy-secondary,
        .client-love-cta-btn,
        .collection-expand-cta,
        .btn-closing-primary,
        .btn-closing-secondary,
        .btn-closing-tertiary {
            white-space: nowrap !important;
            flex-shrink: 0 !important;
            display: inline-flex !important;
            align-items: center !important;
            justify-content: center !important;
            line-height: 1.2 !important;
        }

        .card-action-row,
        .bespoke-action-row,
        .coverage-meta-row,
        .collection-footer-row,
        .card-3d-header,
        .bespoke-card-header,
        .coverage-card-header,
        .collection-card-topbar,
        .card-header-meta {
            display: flex !important;
            align-items: center !important;
            justify-content: space-between !important;
            flex-wrap: nowrap !important;
            gap: 8px !important;
            min-width: 0 !important;
        }

        .card-location-meta,
        .bespoke-specs-text,
        .coverage-venue-text,
        .coverage-venue-text span,
        .collection-location-meta,
        .collection-location-meta span {
            min-width: 0 !important;
            flex: 1 1 auto !important;
            white-space: nowrap !important;
            overflow: hidden !important;
            text-overflow: ellipsis !important;
        }

        .card-tag-badge,
        .bespoke-badge-pill,
        .coverage-tag-pill,
        .coverage-time-pill,
        .collection-category-badge,
        .collection-hero-pill,
        .card-service-badge {
            white-space: nowrap !important;
            overflow: hidden !important;
            text-overflow: ellipsis !important;
        }

        /* Multi-Card Row Single-Line Grid Safeguards */
        @media (min-width: 992px) {
            .bespoke-cards-grid,
            .coverage-gallery-grid {
                display: flex !important;
                flex-wrap: wrap !important;
            }
            .bespoke-cards-grid > .col-lg-3,
            .coverage-gallery-grid > .col-lg-3 {
                flex: 0 0 25% !important;
                max-width: 25% !important;
                width: 25% !important;
            }
        }
        @media (min-width: 600px) and (max-width: 991px) {
            .bespoke-cards-grid > [class*="col-"],
            .coverage-gallery-grid > [class*="col-"] {
                flex: 0 0 50% !important;
                max-width: 50% !important;
                width: 50% !important;
            }
        }

        /* =================================================================
           Unified Professional Typography Scale (H1, H2, H3, H4)
           ================================================================= */
        h1, h2, h3, h4, .font-serif {
            font-family: 'Playfair Display', Georgia, serif !important;
        }

        h1,
        .wedding-hero-title,
        .page-hero h1,
        .hero h1 {
            font-size: clamp(32px, 3.6vw, 46px) !important;
            line-height: 1.18 !important;
            font-weight: 800 !important;
            letter-spacing: -0.5px !important;
        }

        h2,
        .section h2,
        .masterpiece-cinema-title,
        .bespoke-cinema-title,
        .philosophy-cinema-title,
        .coverage-cinema-title,
        .collection-cinema-title,
        .client-love-title,
        .closing-cinema-title,
        .demo-box h2 {
            font-size: clamp(26px, 2.8vw, 38px) !important;
            line-height: 1.22 !important;
            font-weight: 800 !important;
            letter-spacing: -0.4px !important;
        }

        h3,
        .bespoke-card-title,
        .coverage-card-title,
        .collection-card-title,
        .card-height-hero .collection-card-title,
        .couple-name-title,
        .milestone-card-title {
            font-size: clamp(17px, 1.35vw, 20px) !important;
            line-height: 1.28 !important;
            font-weight: 700 !important;
            letter-spacing: -0.2px !important;
        }

        .cinematic-card-item .card-item-title {
            font-size: clamp(12.5px, 0.95vw, 14.5px) !important;
            line-height: 1.22 !important;
            font-weight: 800 !important;
        }

        /* =================================================================
           Inner Page Hero Wedding-Only Background Photography (Excluding Home)
           ================================================================= */
        body:not(.is-home-page) .page-hero {
            background-color: #160208 !important;
            background-size: cover !important;
            background-position: center 30% !important;
            background-repeat: no-repeat !important;
            border-bottom: 2px solid var(--champagne-gold) !important;
        }
        body:not(.is-home-page) .page-hero:before {
            background: linear-gradient(135deg, rgba(16, 2, 7, 0.52) 0%, rgba(74, 11, 23, 0.62) 55%, rgba(16, 2, 7, 0.72) 100%) !important;
        }
        body:not(.is-home-page) [data-module="about"] .page-hero {
            background-image: url('<?= $appBasePath ?>/uploads/photo%20store/4.jpeg') !important;
        }
        body:not(.is-home-page) [data-module="events"] .page-hero {
            background-image: url('<?= $appBasePath ?>/uploads/photo%20store/11.jpeg') !important;
        }
        body:not(.is-home-page) [data-module="gallery"] .page-hero {
            background-image: url('<?= $appBasePath ?>/uploads/photo%20store/3.jpeg') !important;
        }
        body:not(.is-home-page) [data-module="services"] .page-hero {
            background-image: url('<?= $appBasePath ?>/uploads/photo%20store/10.jpeg') !important;
        }
        body:not(.is-home-page) [data-module="team"] .page-hero {
            background-image: url('<?= $appBasePath ?>/uploads/photo%20store/13.jpeg') !important;
        }
        body:not(.is-home-page) [data-module="blog"] .page-hero {
            background-image: url('<?= $appBasePath ?>/uploads/photo%20store/5.jpeg') !important;
        }
        body:not(.is-home-page) [data-module="rsvp"] .page-hero {
            background-image: url('<?= $appBasePath ?>/uploads/photo%20store/8.jpeg') !important;
        }
        body:not(.is-home-page) [data-module="contact"] .page-hero {
            background-image: url('<?= $appBasePath ?>/uploads/photo%20store/15.jpeg') !important;
        }
    </style>
</head>
<body class="<?= $bodyPageClass ?>" data-page="<?= $isHomePage ? 'home' : 'inner' ?>">
<a class="skip-link" href="#main-content">Skip to content</a>

<!-- Top Reading & Scroll Progress Indicator (Cross-Page) -->
<div class="mpp-scroll-progress" id="mppScrollProgressBar" style="background: linear-gradient(90deg, var(--champagne-gold), var(--royal-burgundy)) !important; height: 3px;" aria-hidden="true"></div>
