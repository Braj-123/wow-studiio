<?php
declare(strict_types=1);

// Load Settings from DB
$db = \Config\Database::connect();
$stmt = $db->query("SELECT * FROM wedding_settings WHERE id = 1 LIMIT 1");
$wedding = $stmt->fetch() ?: [
    'groom_name' => 'WoW',
    'bride_name' => 'Studio',
    'wedding_date' => '2026-12-18 19:30:00',
    'venue_name' => 'WoW Studio Headquarters & Creative Lounge',
    'venue_address' => 'Studio Avenue, Luxury Arts District, Udaipur, Rajasthan',
    'contact_phone' => '+91 98765 43210',
    'contact_email' => 'hello@wowstudio.in',
    'hero_title' => 'Capturing Timeless Stories & Cinematic Memories',
    'hero_subtitle' => 'WoW Studio is an elite wedding photography & cinematic film production studio.'
];

$pageTitle = $pageTitle ?? 'WoW Studio — Premium Wedding Photography & Cinema';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($pageTitle) ?></title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Bootstrap 5 CSS -->
    <link rel="stylesheet" href="<?= $appBasePath ?>/front/assets/vendor/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="<?= $appBasePath ?>/front/assets/vendor/bootstrap-icons/bootstrap-icons.min.css">

    <style>
        :root {
            --royal-burgundy: #6b1426;
            --rose-gold: #c28285;
            --champagne-gold: #cfa859;
            --soft-gold: #e6ca65;
            --ivory: #fffdf9;
            --paper-bg: #faf6f0;
            --charcoal: #2c2523;
            --muted-text: #6e6462;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--paper-bg);
            color: var(--charcoal);
            overflow-x: hidden;
            scroll-behavior: smooth;
        }

        h1, h2, h3, h4, .font-serif {
            font-family: 'Playfair Display', serif;
        }

        .font-cursive {
            font-family: 'Great Vibes', cursive;
        }

        /* Navbar */
        .wedding-nav {
            background: rgba(255, 253, 249, 0.95);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(207, 168, 89, 0.25);
            transition: all 0.3s ease;
        }

        .wedding-brand {
            font-family: 'Great Vibes', cursive;
            font-size: 2.2rem;
            color: var(--royal-burgundy) !important;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .wedding-brand span.amp {
            font-family: 'Playfair Display', serif;
            font-size: 1.6rem;
            color: var(--champagne-gold);
            font-style: italic;
        }

        .nav-link {
            font-size: 0.95rem;
            font-weight: 500;
            color: var(--charcoal) !important;
            letter-spacing: 0.5px;
            padding: 8px 16px !important;
            transition: color 0.2s ease;
        }

        .nav-link:hover, .nav-link.active {
            color: var(--royal-burgundy) !important;
        }

        .btn-royal {
            background: linear-gradient(135deg, var(--royal-burgundy), #8f2239);
            color: #ffffff !important;
            border: none;
            padding: 10px 24px;
            border-radius: 50px;
            font-weight: 600;
            letter-spacing: 0.5px;
            box-shadow: 0 4px 15px rgba(107, 20, 38, 0.25);
            transition: all 0.3s ease;
        }

        .btn-royal:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(107, 20, 38, 0.35);
        }

        .btn-gold-outline {
            border: 2px solid var(--champagne-gold);
            color: var(--charcoal) !important;
            background: transparent;
            padding: 9px 24px;
            border-radius: 50px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-gold-outline:hover {
            background: var(--champagne-gold);
            color: #ffffff !important;
        }

        /* Section Headings */
        .section-header {
            text-align: center;
            margin-bottom: 50px;
            position: relative;
        }

        .section-header .sub-title {
            font-family: 'Great Vibes', cursive;
            font-size: 2.2rem;
            color: var(--champagne-gold);
            margin-bottom: 0;
            line-height: 1;
        }

        .section-header .main-title {
            font-size: 2.5rem;
            color: var(--royal-burgundy);
            font-weight: 700;
            letter-spacing: 0.5px;
        }

        .section-header .divider {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 12px;
            margin-top: 10px;
        }

        .section-header .divider::before,
        .section-header .divider::after {
            content: "";
            width: 50px;
            height: 1px;
            background: var(--champagne-gold);
        }

        .section-header .divider i {
            color: var(--champagne-gold);
            font-size: 1.1rem;
        }

        /* Countdown Card */
        .countdown-box {
            background: rgba(255, 255, 255, 0.95);
            border: 1px solid rgba(207, 168, 89, 0.4);
            border-radius: 16px;
            padding: 24px 15px;
            box-shadow: 0 10px 30px rgba(107, 20, 38, 0.08);
            text-align: center;
        }

        .countdown-num {
            font-family: 'Playfair Display', serif;
            font-size: 2.8rem;
            font-weight: 700;
            color: var(--royal-burgundy);
            line-height: 1;
        }

        .countdown-label {
            font-size: 0.8rem;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            color: var(--champagne-gold);
            font-weight: 600;
            margin-top: 6px;
        }

        /* Cards */
        .wedding-card {
            background: #ffffff;
            border: 1px solid rgba(207, 168, 89, 0.2);
            border-radius: 16px;
            padding: 30px;
            transition: all 0.3s ease;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.03);
            height: 100%;
        }

        .wedding-card:hover {
            transform: translateY(-5px);
            border-color: var(--champagne-gold);
            box-shadow: 0 12px 30px rgba(107, 20, 38, 0.1);
        }

        /* Footer */
        .wedding-footer {
            background: var(--royal-burgundy);
            color: #f7ece9;
            padding: 60px 0 30px;
            border-top: 4px solid var(--champagne-gold);
        }

        .wedding-footer a {
            color: #fce8d5;
            text-decoration: none;
            transition: color 0.2s;
        }

        .wedding-footer a:hover {
            color: #ffffff;
        }
    </style>
</head>
<body>
