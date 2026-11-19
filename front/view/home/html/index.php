<?php
declare(strict_types=1);

/**
 * ============================================================================
 * WoW STUDIO — Public Website Home View
 * Layout: MPP Group Enterprise Split-Hero, Infinite Photo Marquee,
 *         Portfolio Grid, Signature Experiences & Lightbox
 * Theme: Royal Burgundy (#6b1426) & Champagne Gold (#cfa859)
 * Brand: WoW Studio (Photography & Cinema)
 * File: front/view/home/html/index.php
 * ============================================================================
 */

$appBasePath = $appBasePath ?? '';
$db = \Config\Database::connect();

// Fetch Global Settings
$stmt = $db->query("SELECT * FROM wedding_settings WHERE id = 1 LIMIT 1");
$wedding = $stmt->fetch() ?: [
    'hero_title' => 'Capturing Timeless Stories & Cinematic Memories',
    'hero_subtitle' => 'WoW Studio is an elite wedding photography & cinematic film production studio specializing in luxury destination weddings and authentic storytelling.',
    'venue_name' => 'WoW Studio Headquarters & Creative Lounge',
    'venue_address' => 'Studio Avenue, Luxury Arts District, Udaipur, Rajasthan - 313001',
    'contact_phone' => '+91 98765 43210',
    'contact_email' => 'hello@wowstudio.in'
];

// Fetch services
$services = $db->query("SELECT * FROM wedding_services ORDER BY order_num ASC LIMIT 4")->fetchAll();

// Fetch experiences / events
$events = $db->query("SELECT * FROM wedding_events ORDER BY order_num ASC LIMIT 4")->fetchAll();

// Fetch studio milestones / stories
$stories = $db->query("SELECT * FROM couple_story ORDER BY order_num ASC LIMIT 4")->fetchAll();

// Fetch portfolio gallery photos
$galleryPhotos = $db->query("SELECT * FROM gallery ORDER BY order_num ASC LIMIT 12")->fetchAll();

// Fetch client testimonials
$wishes = $db->query("SELECT * FROM wishes WHERE status = 'approved' ORDER BY id DESC")->fetchAll();

// Marquee Photos Array from uploads/photo store
$marqueePhotos = [
    ['src' => 'uploads/photo store/2.jpeg', 'title' => 'The Royal Couple', 'tag' => 'Pre-Wedding'],
    ['src' => 'uploads/photo store/3.jpeg', 'title' => 'Golden Sunset Romance', 'tag' => 'Editorial'],
    ['src' => 'uploads/photo store/4.jpeg', 'title' => 'Candid Chemistry', 'tag' => 'Fine-Art'],
    ['src' => 'uploads/photo store/5.jpeg', 'title' => 'Whispers of Love', 'tag' => 'Cinematic'],
    ['src' => 'uploads/photo store/6.jpeg', 'title' => 'The Regal Bride', 'tag' => 'Bridal Portrait'],
    ['src' => 'uploads/photo store/7.jpeg', 'title' => 'The Dapper Groom', 'tag' => 'Portraiture'],
    ['src' => 'uploads/photo store/8.jpeg', 'title' => 'Haldi Festive Glow', 'tag' => 'Rituals'],
    ['src' => 'uploads/photo store/9.jpeg', 'title' => 'Mehndi Rhythm', 'tag' => 'Sangeet Beats'],
    ['src' => 'uploads/photo store/10.jpeg', 'title' => 'Grand Reception', 'tag' => 'Celebration'],
    ['src' => 'uploads/photo store/11.jpeg', 'title' => 'Sacred Pheras & Vows', 'tag' => 'The Wedding'],
    ['src' => 'uploads/photo store/12.jpeg', 'title' => 'Mandapam Geometry', 'tag' => 'Traditions'],
    ['src' => 'uploads/photo store/13.jpeg', 'title' => 'Family Joy & Laughter', 'tag' => 'Unscripted'],
    ['src' => 'uploads/photo store/14.jpeg', 'title' => 'Hand in Hand Forever', 'tag' => 'Candid'],
    ['src' => 'uploads/photo store/15.jpeg', 'title' => 'Imperial Evening Gala', 'tag' => 'Grand Banquet'],
    ['src' => 'uploads/photo store/16.jpeg', 'title' => 'Stolen Glances', 'tag' => 'Emotions'],
    ['src' => 'uploads/photo store/17.jpeg', 'title' => 'Sacred Blessings', 'tag' => 'Pooja'],
    ['src' => 'uploads/photo store/18.jpeg', 'title' => 'A New Lifetime Chapter', 'tag' => 'Film Master'],
];
?>

<!-- =========================================================================
     1. ULTRA-PREMIUM CINEMATIC HERO SECTION
     ========================================================================= -->
<?php require __DIR__ . '/hero_cinema.php'; ?>

<!-- =========================================================================
     2. ULTRA-PREMIUM CINEMATIC 3D FLOATING CARDS SHOWCASE (GSAP + ScrollTrigger)
        Cards enter smoothly from right to left with 3D perspective & depth
     ========================================================================= -->
<?php require __DIR__ . '/cinematic_cards.php'; ?>

<!-- =========================================================================
     3. BESPOKE PRODUCTION — PHOTOGRAPHY & FILM SERVICES
        Ultra-Premium Cinematic Production Showcase & 3D Parallax Slates
     ========================================================================= -->
<?php require __DIR__ . '/bespoke_production.php'; ?>

<!-- =========================================================================
     4. OUR CREATIVE PHILOSOPHY (ULTRA-PREMIUM CINEMATIC EXPERIENCE)
        Kinetic Typography, Blur-to-Sharp Reveals, 3D Museum-Grade Artwork
     ========================================================================= -->
<?php require __DIR__ . '/creative_philosophy.php'; ?>

<!-- =========================================================================
     5. CELEBRATION COVERAGE — SIGNATURE SHOOT EXPERIENCES
        Ultra-Premium Cinematic Asymmetrical Portfolio & Parallax Gallery
     ========================================================================= -->
<?php require __DIR__ . '/celebration_coverage.php'; ?>

<!-- =========================================================================
     6. OUR MASTER COLLECTION — FEATURED PORTFOLIO GALLERY
        Ultra-Premium Cinematic Editorial Portfolio & Lightbox Experience
     ========================================================================= -->
<?php require __DIR__ . '/master_collection.php'; ?>

<!-- =========================================================================
     7. CLIENT LOVE • 5-STAR PRAISE (ULTRA-PREMIUM CINEMATIC TESTIMONIAL SHOWCASE)
     ========================================================================= -->
<?php require __DIR__ . '/client_love.php'; ?>

<!-- =========================================================================
     8. LET'S CREATE CINEMA TOGETHER • 2026-2027 (CLOSING CINEMA CTA)
     ========================================================================= -->
<?php require __DIR__ . '/closing_cinema_cta.php'; ?>

