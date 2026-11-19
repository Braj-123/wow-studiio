<?php
/**
 * ============================================================================
 * WoW STUDIO — OUR MASTER COLLECTION (FEATURED PORTFOLIO GALLERY)
 * Mode: Ultra-Premium Cinematic Editorial Portfolio & Lightbox Experience
 * Features:
 *   - Asymmetrical editorial layout (Dominant Hero Feature + Tall & Wide Slates)
 *   - Staggered 3D card entrances from multiple vectors (GSAP + ScrollTrigger)
 *   - Layered multi-speed parallax scrolling across cards
 *   - Interactive 3D cursor-tracking tilt & specular shine sheen
 *   - Filter pills with smooth GSAP transition (All, Pre-Wedding, Wedding, Haldi, Sangeet, Reception)
 *   - Cinema Fullscreen Lightbox with Next/Prev, Counter, Keyboard & Touch Swiping
 * Theme: Royal Burgundy (#6b1426) & Champagne Gold (#cfa859)
 * File: front/view/home/html/master_collection.php
 * ============================================================================
 */

$appBasePath = $appBasePath ?? '';

// Ensure galleryPhotos has rich data
if (!isset($galleryPhotos) || empty($galleryPhotos)) {
    if (isset($db)) {
        $galleryPhotos = $db->query("SELECT * FROM gallery ORDER BY order_num ASC LIMIT 12")->fetchAll();
    } else {
        $galleryPhotos = [];
    }
}

// Fallback metadata for camera optics and royal locations
$collectionMetadata = [
    0 => ['optics' => '85MM F/1.4 GM // FULL-FRAME RAW', 'location' => 'Taj Lake Palace, Udaipur', 'aspect' => 'hero'],
    1 => ['optics' => '50MM F/1.2 GM // 1/500S ISO 100', 'location' => 'Rambagh Palace, Jaipur', 'aspect' => 'tall'],
    2 => ['optics' => '35MM F/1.4 GM // 4K 10-BIT LOG', 'location' => 'Iconic Riverfront, Kolkata', 'aspect' => 'standard'],
    3 => ['optics' => '24-70MM F/2.8 GM // CANDID CINE', 'location' => 'Umaid Bhawan, Jodhpur', 'aspect' => 'standard'],
    4 => ['optics' => '85MM F/1.4 GM // ARRI 35 LOOK', 'location' => 'The Leela Palace, Udaipur', 'aspect' => 'standard'],
    5 => ['optics' => '24MM F/1.4 GM // 120 FPS SLOW-MO', 'location' => 'Samode Palace, Rajasthan', 'aspect' => 'wide'],
    6 => ['optics' => '70-200MM F/2.8 GM // TELEPHOTO', 'location' => 'Fairmont Hotel, Jaipur', 'aspect' => 'compact'],
    7 => ['optics' => '35MM F/1.4 GM // CINEMATIC COLOR', 'location' => 'Grand Hyatt Gala, Goa', 'aspect' => 'standard'],
    8 => ['optics' => '50MM F/1.2 GM // ROYAL PORTRAIT', 'location' => 'City Palace Courtyard, Jaipur', 'aspect' => 'standard'],
    9 => ['optics' => '16-35MM F/2.8 GM // WIDE ARCHITECTURE', 'location' => 'Mandapam Sanctum, Udaipur', 'aspect' => 'standard'],
    10 => ['optics' => '85MM F/1.4 GM // CANDID TEARS', 'location' => 'Suryagarh Fortress, Jaisalmer', 'aspect' => 'wide'],
    11 => ['optics' => '50MM F/1.2 GM // SUNSET GLOW', 'location' => 'Alila Fort Bishangarh', 'aspect' => 'compact'],
];
?>

<style>
/* -------------------------------------------------------------------------
   1. Master Collection Section Canvas (Atmospheric Cinema Staging)
   ------------------------------------------------------------------------- */
.master-collection-section {
    position: relative;
    width: 100%;
    background: #faf6f0;
    background: linear-gradient(180deg, #faf6f0 0%, #f1e5d3 100%);
    color: #2c2523;
    padding: 100px 0 110px;
    overflow: hidden;
    border-top: 1px solid rgba(207, 168, 89, 0.45);
    border-bottom: 2px solid var(--champagne-gold, #cfa859);
    perspective: 1600px;
}

/* Atmospheric Glow Orbs & Background Watermark */
.collection-ambient-glow {
    position: absolute;
    border-radius: 50%;
    pointer-events: none;
    z-index: 1;
}
.collection-glow-1 {
    top: 5%;
    left: 8%;
    width: 600px;
    height: 600px;
    background: radial-gradient(circle, rgba(207, 168, 89, 0.25) 0%, transparent 70%);
    filter: blur(100px);
    opacity: 0.7;
    animation: collectionFloat 16s ease-in-out infinite alternate;
}
.collection-glow-2 {
    bottom: 8%;
    right: 5%;
    width: 700px;
    height: 700px;
    background: radial-gradient(circle, rgba(194, 130, 133, 0.22) 0%, rgba(207, 168, 89, 0.16) 50%, transparent 70%);
    filter: blur(110px);
    opacity: 0.65;
    animation: collectionFloat 20s ease-in-out infinite alternate-reverse;
}
@keyframes collectionFloat {
    0% { transform: translate(0, 0) scale(1); }
    100% { transform: translate(35px, -25px) scale(1.1); }
}

.collection-watermark {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    font-family: 'Playfair Display', Georgia, serif;
    font-size: clamp(80px, 16vw, 240px);
    font-weight: 900;
    letter-spacing: 0.08em;
    color: rgba(107, 20, 38, 0.035);
    text-transform: uppercase;
    white-space: nowrap;
    user-select: none;
    pointer-events: none;
    z-index: 1;
}

/* -------------------------------------------------------------------------
   2. Cinematic Section Header & Kinetic Typography
   ------------------------------------------------------------------------- */
.collection-header-wrap {
    position: relative;
    z-index: 10;
    max-width: 920px;
    margin: 0 auto 50px;
    text-align: center;
}

.collection-eyebrow {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    background: rgba(22, 3, 8, 0.82);
    backdrop-filter: blur(12px);
    -webkit-backdrop-filter: blur(12px);
    border: 1px solid rgba(207, 168, 89, 0.55);
    box-shadow: 0 6px 24px rgba(0, 0, 0, 0.6);
    padding: 7px 22px;
    border-radius: 30px;
    margin-bottom: 20px;
}
.collection-beacon {
    width: 8px;
    height: 8px;
    background: var(--champagne-gold, #cfa859);
    border-radius: 50%;
    box-shadow: 0 0 10px #ffd875, 0 0 20px rgba(207, 168, 89, 0.8);
    display: inline-block;
    animation: beaconPulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite;
}
.collection-eyebrow-text {
    font-family: 'Space Grotesk', -apple-system, sans-serif;
    font-size: 11px;
    font-weight: 800;
    letter-spacing: 2.4px;
    color: #ffffff;
    text-transform: uppercase;
}

.collection-cinema-title {
    font-family: 'Playfair Display', Georgia, serif;
    font-size: clamp(26px, 2.8vw, 38px);
    font-weight: 800;
    line-height: 1.22;
    color: var(--royal-burgundy, #6b1426);
    margin-bottom: 18px;
    letter-spacing: -0.4px;
    text-shadow: none;
}
.collection-split-word {
    display: inline-block;
    will-change: transform, opacity, filter;
}

.master-collection-section .highlight-gold {
    color: #9e7323;
    background: linear-gradient(135deg, #cfa859 0%, #9e7323 55%, #7a5514 100%);
    background-clip: text;
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    filter: drop-shadow(0 2px 8px rgba(158, 115, 35, 0.2));
}
.master-collection-section .highlight-burgundy {
    color: #8f1d35;
    background: linear-gradient(135deg, #6b1426 0%, #9b223b 65%, #4a0b17 100%);
    background-clip: text;
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
}

.collection-lead-desc {
    font-family: 'DM Sans', -apple-system, sans-serif;
    font-size: clamp(15px, 1.1vw, 17px);
    line-height: 1.7;
    color: #4a3e3c;
    max-width: 680px;
    margin: 0 auto 30px;
    text-shadow: none;
}

/* -------------------------------------------------------------------------
   3. Interactive Category Filter Bar
   ------------------------------------------------------------------------- */
.collection-filter-bar {
    display: flex;
    justify-content: center;
    align-items: center;
    flex-wrap: wrap;
    gap: 10px;
    margin: 0 auto;
}
.filter-pill-btn {
    background: #ffffff;
    border: 1.5px solid rgba(207, 168, 89, 0.55);
    color: #3a2e2c;
    font-family: 'Space Grotesk', -apple-system, sans-serif;
    font-size: 11.5px;
    font-weight: 700;
    letter-spacing: 1px;
    padding: 8px 20px;
    border-radius: 30px;
    cursor: pointer;
    transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
    box-shadow: 0 4px 12px rgba(107, 20, 38, 0.06);
}
.filter-pill-btn:hover {
    background: #fdf2f4;
    border-color: var(--royal-burgundy, #6b1426);
    color: var(--royal-burgundy, #6b1426);
    transform: translateY(-2px);
    box-shadow: 0 8px 18px rgba(107, 20, 38, 0.14);
}
.filter-pill-btn.active {
    background: linear-gradient(135deg, var(--royal-burgundy, #6b1426) 0%, #4a0d1a 100%);
    border-color: var(--champagne-gold, #cfa859);
    color: #ffffff;
    box-shadow: 0 8px 22px rgba(107, 20, 38, 0.3), inset 0 1px 0 rgba(255, 255, 255, 0.25);
}

/* -------------------------------------------------------------------------
   4. Artistic Asymmetrical Editorial Gallery Grid
   ------------------------------------------------------------------------- */
.collection-gallery-wrap {
    position: relative;
    z-index: 10;
    margin-top: 45px;
}

/* Card Outer Wrapper for Parallax & 3D Tilt */
.collection-item-col {
    perspective: 1200px;
    will-change: transform, opacity;
    transition: transform 0.4s ease, opacity 0.4s ease;
}

/* Multi-Speed Parallax Column Offsets */
.col-parallax-slow {
    will-change: transform;
}
.col-parallax-fast {
    will-change: transform;
}

/* Card Chassis Container */
.collection-card {
    position: relative;
    border-radius: 20px;
    overflow: hidden;
    background: #0f0205;
    border: 1.5px solid rgba(207, 168, 89, 0.4);
    box-shadow: 
        0 20px 50px rgba(0, 0, 0, 0.8),
        0 6px 20px rgba(107, 20, 38, 0.35),
        inset 0 1px 0 rgba(255, 255, 255, 0.25);
    cursor: pointer;
    transform-style: preserve-3d;
    -webkit-transform-style: preserve-3d;
    transition: border-color 0.4s ease, box-shadow 0.4s ease, transform 0.5s cubic-bezier(0.2, 0.8, 0.2, 1);
    width: 100%;
}
.collection-card:hover {
    border-color: rgba(255, 216, 117, 0.95);
    box-shadow: 
        0 30px 75px rgba(0, 0, 0, 0.95),
        0 12px 35px rgba(107, 20, 38, 0.65),
        0 0 30px rgba(207, 168, 89, 0.4),
        inset 0 1px 0 rgba(255, 255, 255, 0.5);
}

/* Specific Height Variations for Asymmetrical Editorial Rhythm */
.card-height-hero {
    height: clamp(430px, 54vh, 520px);
}
.card-height-tall {
    height: clamp(430px, 54vh, 520px);
}
.card-height-wide {
    height: clamp(300px, 38vh, 370px);
}
.card-height-standard {
    height: clamp(300px, 38vh, 370px);
}
.card-height-compact {
    height: clamp(300px, 38vh, 370px);
}

/* Media Window with Smooth Zoom */
.collection-media-box {
    position: absolute;
    inset: 0;
    overflow: hidden;
    z-index: 1;
    background: #000000;
}
.collection-img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: center 30%;
    filter: brightness(0.92) contrast(1.08) saturate(1.12);
    transition: transform 0.7s cubic-bezier(0.25, 1, 0.5, 1), filter 0.7s ease;
    will-change: transform, filter;
}
.collection-card:hover .collection-img {
    transform: scale(1.08);
    filter: brightness(1.04) contrast(1.12) saturate(1.18);
}

/* Royal Burgundy & Dark Cinema Grading Vignette */
.collection-grading-overlay {
    position: absolute;
    inset: 0;
    z-index: 2;
    background: 
        radial-gradient(circle at 50% 25%, transparent 25%, rgba(12, 2, 5, 0.55) 65%, rgba(4, 0, 1, 0.95) 100%),
        linear-gradient(180deg, rgba(8, 1, 3, 0.35) 0%, rgba(8, 1, 3, 0.1) 40%, rgba(14, 2, 5, 0.92) 80%, rgba(5, 0, 2, 0.98) 100%);
    pointer-events: none;
    transition: opacity 0.4s ease;
}
.collection-card:hover .collection-grading-overlay {
    opacity: 0.9;
}

/* Specular Light Sheen Reflection */
.collection-specular-glare {
    position: absolute;
    top: -50%;
    left: -50%;
    width: 200%;
    height: 200%;
    background: linear-gradient(135deg, transparent 40%, rgba(255, 255, 255, 0.12) 48%, rgba(255, 216, 117, 0.22) 50%, transparent 56%);
    transform: rotate(25deg);
    pointer-events: none;
    z-index: 3;
    opacity: 0.4;
    transition: transform 0.6s ease, opacity 0.6s ease;
}
.collection-card:hover .collection-specular-glare {
    opacity: 0.85;
    transform: rotate(25deg) translateY(18%);
}

/* Top Badge Row */
.collection-card-topbar {
    position: absolute;
    top: 18px;
    left: 18px;
    right: 18px;
    z-index: 10;
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 8px;
    flex-wrap: nowrap;
    transform: translateZ(28px);
}
.collection-category-badge {
    background: rgba(107, 20, 38, 0.85);
    backdrop-filter: blur(10px);
    border: 1px solid rgba(207, 168, 89, 0.65);
    color: #ffffff;
    font-family: 'Space Grotesk', -apple-system, sans-serif;
    font-size: 9px;
    font-weight: 800;
    letter-spacing: 1.4px;
    padding: 5px 12px;
    border-radius: 20px;
    text-transform: uppercase;
    box-shadow: 0 4px 14px rgba(0, 0, 0, 0.5);
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}
.collection-hero-pill {
    background: linear-gradient(135deg, #ffd875 0%, var(--champagne-gold, #cfa859) 100%);
    color: #1a0409;
    font-family: 'Space Grotesk', -apple-system, sans-serif;
    font-size: 9px;
    font-weight: 900;
    letter-spacing: 1.2px;
    padding: 5px 12px;
    border-radius: 20px;
    text-transform: uppercase;
    box-shadow: 0 4px 15px rgba(207, 168, 89, 0.6);
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}

.collection-view-btn {
    width: 36px;
    height: 36px;
    border-radius: 50%;
    background: rgba(18, 3, 7, 0.85);
    border: 1px solid rgba(207, 168, 89, 0.6);
    color: #ffd875;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 13px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.5);
    transition: all 0.3s cubic-bezier(0.2, 0.8, 0.2, 1);
    transform: scale(0.9);
    opacity: 0.85;
}
.collection-card:hover .collection-view-btn {
    transform: scale(1.1) rotate(90deg);
    background: var(--royal-burgundy, #6b1426);
    border-color: #ffd875;
    color: #ffffff;
    opacity: 1;
    box-shadow: 0 6px 18px rgba(107, 20, 38, 0.7);
}

/* Bottom Card Metadata Stack */
.collection-card-content {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    padding: 20px 20px 18px;
    z-index: 10;
    transform: translateZ(36px);
    transition: transform 0.4s ease;
}
.collection-optics-tag {
    font-family: 'Courier New', monospace;
    font-size: 9.5px;
    color: #ffd875;
    letter-spacing: 1px;
    margin-bottom: 5px;
    display: flex;
    align-items: center;
    gap: 5px;
}
.collection-optics-tag::before {
    content: '';
    width: 5px;
    height: 5px;
    background: #ffd875;
    border-radius: 50%;
    display: inline-block;
    flex-shrink: 0;
}

.collection-card-title {
    font-family: 'Playfair Display', Georgia, serif;
    font-size: clamp(17px, 1.35vw, 20px);
    font-weight: 700;
    line-height: 1.28;
    color: #ffffff;
    margin-bottom: 6px;
    text-shadow: 0 2px 10px rgba(0, 0, 0, 0.95);
    word-break: break-word;
    overflow: hidden;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
}
.card-height-hero .collection-card-title {
    font-size: clamp(17px, 1.35vw, 20px);
    font-weight: 700;
    line-height: 1.28;
}

.collection-footer-row {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding-top: 10px;
    border-top: 1px solid rgba(207, 168, 89, 0.3);
    gap: 8px;
    flex-wrap: nowrap;
    min-width: 0;
}
.collection-location-meta {
    font-size: 11px;
    color: rgba(255, 255, 255, 0.75);
    display: flex;
    align-items: center;
    gap: 5px;
    min-width: 0;
    flex: 1 1 auto;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}
.collection-expand-cta {
    font-family: 'Space Grotesk', -apple-system, sans-serif;
    font-size: 10px;
    font-weight: 800;
    letter-spacing: 0.8px;
    color: #ffd875;
    text-transform: uppercase;
    display: flex;
    align-items: center;
    gap: 4px;
    transition: transform 0.25s ease, color 0.25s ease;
    white-space: nowrap !important;
    flex-shrink: 0 !important;
}
.collection-card:hover .collection-expand-cta {
    color: #ffffff;
    transform: translateX(4px);
}

/* Bottom Gallery CTAs */
.collection-bottom-cta {
    margin-top: 60px;
    text-align: center;
    position: relative;
    z-index: 10;
}
.btn-collection-full {
    background: linear-gradient(135deg, var(--royal-burgundy, #6b1426) 0%, #4a0d1a 100%);
    border: 2px solid var(--champagne-gold, #cfa859);
    color: #ffffff !important;
    font-family: 'Space Grotesk', -apple-system, sans-serif;
    font-size: 14.5px;
    font-weight: 800;
    letter-spacing: 1px;
    padding: 15px 40px;
    border-radius: 40px;
    text-decoration: none;
    box-shadow: 0 10px 30px rgba(107, 20, 38, 0.65), inset 0 1px 0 rgba(255, 255, 255, 0.3);
    transition: all 0.35s cubic-bezier(0.25, 0.8, 0.25, 1);
    display: inline-flex;
    align-items: center;
    gap: 10px;
}
.btn-collection-full:hover {
    background: linear-gradient(135deg, #8a1a32 0%, var(--royal-burgundy, #6b1426) 100%);
    border-color: #ffd875;
    transform: translateY(-3px) scale(1.02);
    box-shadow: 0 16px 45px rgba(107, 20, 38, 0.85);
    color: #ffffff;
}

/* -------------------------------------------------------------------------
   5. Cinema Fullscreen Lightbox Modal (Ultra-Luxury Experience)
   ------------------------------------------------------------------------- */
.cinema-lightbox-overlay {
    position: fixed;
    inset: 0;
    z-index: 9999;
    background: rgba(4, 0, 2, 0.94);
    backdrop-filter: blur(24px);
    -webkit-backdrop-filter: blur(24px);
    display: none;
    opacity: 0;
    transition: opacity 0.35s ease;
    align-items: center;
    justify-content: center;
    user-select: none;
}
.cinema-lightbox-overlay.active {
    display: flex;
    opacity: 1;
}

/* Close & Counter Top Bar */
.lightbox-topbar {
    position: absolute;
    top: 24px;
    left: 28px;
    right: 28px;
    z-index: 10010;
    display: flex;
    justify-content: space-between;
    align-items: center;
}
.lightbox-counter-pill {
    background: rgba(22, 3, 8, 0.85);
    border: 1px solid rgba(207, 168, 89, 0.5);
    border-radius: 24px;
    padding: 6px 16px;
    font-family: 'Space Grotesk', -apple-system, sans-serif;
    font-size: 12px;
    font-weight: 700;
    color: #ffffff;
    letter-spacing: 1px;
}
.lightbox-close-btn {
    width: 44px;
    height: 44px;
    border-radius: 50%;
    background: rgba(22, 3, 8, 0.85);
    border: 1px solid rgba(207, 168, 89, 0.5);
    color: #ffffff;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 20px;
    cursor: pointer;
    transition: all 0.25s ease;
}
.lightbox-close-btn:hover {
    background: var(--royal-burgundy, #6b1426);
    border-color: #ffd875;
    color: #ffffff;
    transform: rotate(90deg) scale(1.08);
}

/* Main Lightbox Viewport & Image Canvas */
.lightbox-viewport {
    position: relative;
    max-width: 90vw;
    max-height: 84vh;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    z-index: 10005;
}
.lightbox-img-wrap {
    position: relative;
    max-width: 100%;
    max-height: 72vh;
    border-radius: 18px;
    overflow: hidden;
    border: 2px solid var(--champagne-gold, #cfa859);
    box-shadow: 0 30px 90px rgba(0, 0, 0, 0.95), 0 10px 40px rgba(107, 20, 38, 0.6);
    background: #000000;
}
.lightbox-main-img {
    max-width: 100%;
    max-height: 72vh;
    object-fit: contain;
    display: block;
    transition: opacity 0.25s ease, transform 0.25s ease;
}

/* Lightbox Bottom Caption Bar */
.lightbox-caption-bar {
    margin-top: 18px;
    text-align: center;
    max-width: 780px;
    padding: 0 20px;
}
.lightbox-title {
    font-family: 'Playfair Display', Georgia, serif;
    font-size: clamp(18px, 1.8vw, 24px);
    font-weight: 800;
    color: #ffffff;
    margin-bottom: 4px;
}
.lightbox-meta {
    font-family: 'Space Grotesk', -apple-system, sans-serif;
    font-size: 11.5px;
    color: var(--champagne-gold, #cfa859);
    letter-spacing: 1.5px;
    text-transform: uppercase;
}

/* Next / Prev Glass Nav Buttons */
.lightbox-nav-btn {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    width: 54px;
    height: 54px;
    border-radius: 50%;
    background: rgba(22, 3, 8, 0.85);
    border: 1.5px solid rgba(207, 168, 89, 0.6);
    color: #ffffff;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 20px;
    cursor: pointer;
    z-index: 10010;
    transition: all 0.3s ease;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.7);
}
.lightbox-prev-btn { left: 24px; }
.lightbox-next-btn { right: 24px; }
.lightbox-nav-btn:hover {
    background: var(--royal-burgundy, #6b1426);
    border-color: #ffd875;
    color: #ffd875;
    transform: translateY(-50%) scale(1.1);
}
@media (max-width: 768px) {
    .lightbox-nav-btn { width: 42px; height: 42px; font-size: 16px; }
    .lightbox-prev-btn { left: 10px; }
    .lightbox-next-btn { right: 10px; }
}
</style>

<!-- =======================================================================
     HTML Structure: OUR MASTER COLLECTION (Artistic Editorial Gallery)
     ======================================================================= -->
<section class="master-collection-section" id="masterCollectionSection" aria-label="Our Master Collection — Featured Portfolio Gallery">
    <!-- Atmospheric Ambient Glows & Background Watermark -->
    <div class="collection-ambient-glow collection-glow-1"></div>
    <div class="collection-ambient-glow collection-glow-2"></div>
    <div class="collection-watermark" aria-hidden="true">COLLECTION</div>

    <div class="container position-relative" style="z-index: 10;">
        <!-- 1. Cinematic Section Header -->
        <div class="collection-header-wrap">
            <!-- Eyebrow Badge -->
            <div class="collection-eyebrow" id="collectionEyebrow">
                <span class="collection-beacon"></span>
                <span class="collection-eyebrow-text">OUR MASTER COLLECTION</span>
            </div>

            <!-- Kinetic Title -->
            <h2 class="collection-cinema-title" id="collectionTitle">
                <span class="collection-split-word">Featured</span>
                <span class="collection-split-word highlight-gold">Portfolio</span>
                <span class="collection-split-word fst-italic highlight-burgundy">Gallery.</span>
            </h2>

            <!-- Lead Description -->
            <p class="collection-lead-desc" id="collectionLead">
                Explore real high-resolution photographs celebrating unposed love, breathtaking palaces, and festive joy captured across India and destination celebrations by WoW Studio.
            </p>

            <!-- Interactive Category Filter Bar -->
            <div class="collection-filter-bar" id="collectionFilterBar">
                <button class="filter-pill-btn active" data-filter="all">All Masterpieces</button>
                <button class="filter-pill-btn" data-filter="pre-wedding">Pre-Wedding Shoots</button>
                <button class="filter-pill-btn" data-filter="wedding">Sacred Weddings</button>
                <button class="filter-pill-btn" data-filter="haldi">Haldi &amp; Rituals</button>
                <button class="filter-pill-btn" data-filter="sangeet">Sangeet &amp; Beats</button>
                <button class="filter-pill-btn" data-filter="reception">Receptions &amp; Galas</button>
            </div>
        </div>

        <!-- 2. Asymmetrical Editorial Gallery Grid -->
        <div class="row g-4 collection-gallery-wrap" id="collectionGalleryGrid">
            <?php 
            foreach ($galleryPhotos as $idx => $photo): 
                $meta = $collectionMetadata[$idx] ?? $collectionMetadata[0];
                $category = strtolower(trim($photo['category'] ?? 'wedding'));
                $title = $photo['title'] ?? 'WoW Studio Masterpiece';
                $imgUrl = $photo['image_url'];
                
                // Determine Asymmetrical Editorial Column Classes & Height
                if ($idx === 0) {
                    // Dominant Hero Editorial Feature
                    $colClass = 'col-lg-8 col-md-12 editorial-card-hero';
                    $heightClass = 'card-height-hero';
                    $isHero = true;
                    $parallaxClass = 'col-parallax-slow';
                } elseif ($idx === 1) {
                    // Tall Vertical Portrait Frame
                    $colClass = 'col-lg-4 col-md-6';
                    $heightClass = 'card-height-tall';
                    $isHero = false;
                    $parallaxClass = 'col-parallax-fast';
                } elseif ($idx === 2 || $idx === 3 || $idx === 4) {
                    // Dynamic 3-card balanced row
                    $colClass = 'col-lg-4 col-md-6';
                    $heightClass = 'card-height-standard';
                    $isHero = false;
                    $parallaxClass = ($idx % 2 === 0) ? 'col-parallax-slow' : 'col-parallax-fast';
                } elseif ($idx === 5) {
                    // Wide Cinematic Frame
                    $colClass = 'col-lg-7 col-md-12';
                    $heightClass = 'card-height-wide';
                    $isHero = false;
                    $parallaxClass = 'col-parallax-slow';
                } elseif ($idx === 6) {
                    // Compact Editorial Complement
                    $colClass = 'col-lg-5 col-md-6';
                    $heightClass = 'card-height-compact';
                    $isHero = false;
                    $parallaxClass = 'col-parallax-fast';
                } else {
                    // Balanced Editorial Cards
                    $colClass = 'col-lg-4 col-md-6';
                    $heightClass = 'card-height-standard';
                    $isHero = false;
                    $parallaxClass = ($idx % 2 === 0) ? 'col-parallax-slow' : 'col-parallax-fast';
                }
            ?>
                <div class="<?= $colClass ?> collection-item-col <?= $parallaxClass ?>" 
                     data-card-idx="<?= $idx ?>"
                     data-category="<?= htmlspecialchars($category) ?>"
                     data-full-src="<?= $appBasePath ?>/<?= htmlspecialchars($imgUrl) ?>"
                     data-title="<?= htmlspecialchars($title) ?>"
                     data-optics="<?= htmlspecialchars($meta['optics']) ?>"
                     data-location="<?= htmlspecialchars($meta['location']) ?>">
                    
                    <div class="collection-card <?= $heightClass ?>" data-tilt-chassis>
                        <!-- Image Container with Zoom & Grading -->
                        <div class="collection-media-box">
                            <img src="<?= $appBasePath ?>/<?= htmlspecialchars($imgUrl) ?>" 
                                 alt="<?= htmlspecialchars($title) ?>" 
                                 class="collection-img"
                                 loading="lazy">
                            <div class="collection-grading-overlay"></div>
                            <div class="collection-specular-glare"></div>
                        </div>

                        <!-- Top Bar with Category & Expand Action -->
                        <div class="collection-card-topbar">
                            <div class="d-flex align-items-center gap-2">
                                <span class="collection-category-badge"><?= htmlspecialchars($category) ?></span>
                                <?php if ($isHero): ?>
                                    <span class="collection-hero-pill">FEATURED MASTERPIECE</span>
                                <?php endif; ?>
                            </div>
                            <button class="collection-view-btn" aria-label="View Fullscreen" title="View Fullscreen">
                                <i class="bi bi-arrows-fullscreen"></i>
                            </button>
                        </div>

                        <!-- Bottom Metadata Details -->
                        <div class="collection-card-content">
                            <div class="collection-optics-tag">
                                <span><?= htmlspecialchars($meta['optics']) ?></span>
                            </div>
                            <h3 class="collection-card-title"><?= htmlspecialchars($title) ?></h3>
                            
                            <div class="collection-footer-row">
                                <span class="collection-location-meta">
                                    <i class="bi bi-geo-alt-fill text-warning"></i> <?= htmlspecialchars($meta['location']) ?>
                                </span>
                                <span class="collection-expand-cta">
                                    View Fullscreen &rarr;
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <!-- 3. Bottom CTAs -->
        <div class="collection-bottom-cta" id="collectionBottomCta">
            <a href="<?= $appBasePath ?>/gallery" class="btn-collection-full">
                <i class="bi bi-images"></i>
                <span>Explore Complete Archive (19 Masterpieces) &rarr;</span>
            </a>
        </div>
    </div>
</section>

<!-- =======================================================================
     Cinema Fullscreen Lightbox Modal (Custom Interactive Engine)
     ======================================================================= -->
<div class="cinema-lightbox-overlay" id="cinemaLightboxOverlay" aria-modal="true" role="dialog" aria-label="WoW Studio Masterpiece Lightbox">
    <!-- Top Navigation Bar -->
    <div class="lightbox-topbar">
        <div class="lightbox-counter-pill" id="lightboxCounter">01 / 12</div>
        <button class="lightbox-close-btn" id="lightboxCloseBtn" aria-label="Close Lightbox">&times;</button>
    </div>

    <!-- Left & Right Nav Buttons -->
    <button class="lightbox-nav-btn lightbox-prev-btn" id="lightboxPrevBtn" aria-label="Previous Image">
        <i class="bi bi-chevron-left"></i>
    </button>
    <button class="lightbox-nav-btn lightbox-next-btn" id="lightboxNextBtn" aria-label="Next Image">
        <i class="bi bi-chevron-right"></i>
    </button>

    <!-- Main Viewport Canvas -->
    <div class="lightbox-viewport">
        <div class="lightbox-img-wrap" id="lightboxImgWrap">
            <img src="" alt="WoW Studio Masterpiece" class="lightbox-main-img" id="lightboxMainImg">
        </div>
        <div class="lightbox-caption-bar">
            <h4 class="lightbox-title" id="lightboxTitle"></h4>
            <div class="lightbox-meta" id="lightboxMeta"></div>
        </div>
    </div>
</div>

<!-- =======================================================================
     Engine Script: GSAP ScrollTrigger Choreography, Parallax & Lightbox
     ======================================================================= -->
<script>
(function() {
    'use strict';

    function initMasterCollectionCinema() {
        if (typeof gsap === 'undefined' || typeof ScrollTrigger === 'undefined') {
            setTimeout(initMasterCollectionCinema, 100);
            return;
        }

        gsap.registerPlugin(ScrollTrigger);

        const section = document.getElementById('masterCollectionSection');
        if (!section) return;

        const eyebrow = document.getElementById('collectionEyebrow');
        const titleWords = document.querySelectorAll('#collectionTitle .collection-split-word');
        const lead = document.getElementById('collectionLead');
        const filterBar = document.getElementById('collectionFilterBar');
        const cards = gsap.utils.toArray('.collection-item-col');
        const bottomCta = document.getElementById('collectionBottomCta');

        if (window.globalLenis) {
            window.globalLenis.on('scroll', ScrollTrigger.update);
        }

        // ---------------------------------------------------------------------
        // 1. Initial State Setup (Blur-to-sharp & 3D Staggered Offsets)
        // ---------------------------------------------------------------------
        if (eyebrow) {
            gsap.set(eyebrow, { opacity: 0, y: 25, filter: 'blur(6px)' });
        }
        if (titleWords && titleWords.length > 0) {
            gsap.set(titleWords, { 
                opacity: 0, 
                y: 45, 
                rotateX: 20, 
                filter: 'blur(8px)',
                transformOrigin: '0% 100%' 
            });
        }
        if (lead) {
            gsap.set(lead, { opacity: 0, y: 30, filter: 'blur(5px)' });
        }
        if (filterBar) {
            gsap.set(filterBar, { opacity: 0, y: 20 });
        }

        // Cards initial entrance states (alternating vector offsets & 3D tilts)
        cards.forEach((card, i) => {
            const xOffset = (i % 3 === 0) ? -35 : ((i % 3 === 1) ? 35 : 0);
            const yOffset = 50 + (i * 12);
            gsap.set(card, {
                opacity: 0,
                x: xOffset,
                y: yOffset,
                scale: 0.94,
                rotateY: (i % 2 === 0) ? -4 : 4,
                filter: 'blur(8px)'
            });
        });

        if (bottomCta) {
            gsap.set(bottomCta, { opacity: 0, y: 30 });
        }

        // ---------------------------------------------------------------------
        // 2. Entrance Choreography Timeline
        // ---------------------------------------------------------------------
        const enterTl = gsap.timeline({
            scrollTrigger: {
                trigger: section,
                start: 'top 85%',
                end: 'top 20%',
                toggleActions: 'play none none none',
                once: true
            }
        });

        // Header Elements
        if (eyebrow) {
            enterTl.to(eyebrow, {
                opacity: 1,
                y: 0,
                filter: 'blur(0px)',
                duration: 0.8,
                ease: 'power3.out'
            }, 0);
        }

        if (titleWords && titleWords.length > 0) {
            enterTl.to(titleWords, {
                opacity: 1,
                y: 0,
                rotateX: 0,
                filter: 'blur(0px)',
                duration: 1.0,
                stagger: 0.08,
                ease: 'power4.out'
            }, 0.12);
        }

        if (lead) {
            enterTl.to(lead, {
                opacity: 1,
                y: 0,
                filter: 'blur(0px)',
                duration: 0.8,
                ease: 'power3.out'
            }, 0.35);
        }

        if (filterBar) {
            enterTl.to(filterBar, {
                opacity: 1,
                y: 0,
                duration: 0.7,
                ease: 'power2.out'
            }, 0.5);
        }

        // Batch Reveal Cards with Stagger
        if (cards && cards.length > 0) {
            enterTl.to(cards, {
                opacity: 1,
                x: 0,
                y: 0,
                scale: 1,
                rotateY: 0,
                filter: 'blur(0px)',
                duration: 1.0,
                stagger: {
                    amount: 0.7,
                    from: 'start'
                },
                ease: 'power3.out'
            }, 0.45);
        }

        if (bottomCta) {
            enterTl.to(bottomCta, {
                opacity: 1,
                y: 0,
                duration: 0.8,
                ease: 'power2.out'
            }, 0.9);
        }

        // ---------------------------------------------------------------------
        // 3. Multi-Speed Scroll Parallax on Cards
        // ---------------------------------------------------------------------
        cards.forEach((col, idx) => {
            const isSlow = col.classList.contains('col-parallax-slow');
            const shiftY = isSlow ? -30 : 35;

            gsap.to(col, {
                y: shiftY,
                ease: 'none',
                scrollTrigger: {
                    trigger: section,
                    start: 'top bottom',
                    end: 'bottom top',
                    scrub: 1.2
                }
            });
        });

        // ---------------------------------------------------------------------
        // 4. Interactive 3D Cursor Tracking Tilt on Cards
        // ---------------------------------------------------------------------
        const tiltCards = document.querySelectorAll('.collection-card');
        tiltCards.forEach(card => {
            const glare = card.querySelector('.collection-specular-glare');

            card.addEventListener('mousemove', (e) => {
                const rect = card.getBoundingClientRect();
                const x = e.clientX - rect.left;
                const y = e.clientY - rect.top;

                const centerX = rect.width / 2;
                const centerY = rect.height / 2;

                const rotateX = ((y - centerY) / centerY) * -6; // Max 6 deg
                const rotateY = ((x - centerX) / centerX) * 6;

                gsap.to(card, {
                    rotateX: rotateX,
                    rotateY: rotateY,
                    transformPerspective: 1000,
                    duration: 0.35,
                    ease: 'power1.out'
                });

                if (glare) {
                    const glareX = (x / rect.width) * 100;
                    const glareY = (y / rect.height) * 100;
                    gsap.to(glare, {
                        xPercent: (glareX - 50) * 0.4,
                        yPercent: (glareY - 50) * 0.4,
                        duration: 0.35
                    });
                }
            });

            card.addEventListener('mouseleave', () => {
                gsap.to(card, {
                    rotateX: 0,
                    rotateY: 0,
                    duration: 0.6,
                    ease: 'power2.out'
                });
                if (glare) {
                    gsap.to(glare, {
                        xPercent: 0,
                        yPercent: 0,
                        duration: 0.6
                    });
                }
            });
        });

        // ---------------------------------------------------------------------
        // 5. Category Filtering Engine with Smooth GSAP Transitions
        // ---------------------------------------------------------------------
        const filterBtns = document.querySelectorAll('.filter-pill-btn');
        filterBtns.forEach(btn => {
            btn.addEventListener('click', function() {
                filterBtns.forEach(b => b.classList.remove('active'));
                this.classList.add('active');

                const filter = this.getAttribute('data-filter');

                cards.forEach(cardCol => {
                    const cat = cardCol.getAttribute('data-category');
                    const match = (filter === 'all' || cat === filter || 
                                  (filter === 'haldi' && (cat === 'haldi' || cat === 'rituals')) ||
                                  (filter === 'sangeet' && (cat === 'sangeet' || cat === 'beats')) ||
                                  (filter === 'wedding' && (cat === 'wedding' || cat === 'ceremony')));

                    if (match) {
                        cardCol.style.display = '';
                        gsap.to(cardCol, {
                            opacity: 1,
                            scale: 1,
                            duration: 0.45,
                            ease: 'power2.out'
                        });
                    } else {
                        gsap.to(cardCol, {
                            opacity: 0,
                            scale: 0.92,
                            duration: 0.3,
                            ease: 'power2.in',
                            onComplete: () => {
                                cardCol.style.display = 'none';
                            }
                        });
                    }
                });

                // Refresh ScrollTrigger after layout shift
                setTimeout(() => {
                    ScrollTrigger.refresh();
                }, 350);
            });
        });

        // ---------------------------------------------------------------------
        // 6. Fullscreen Cinema Lightbox System
        // ---------------------------------------------------------------------
        const lightbox = document.getElementById('cinemaLightboxOverlay');
        const mainImg = document.getElementById('lightboxMainImg');
        const imgWrap = document.getElementById('lightboxImgWrap');
        const titleEl = document.getElementById('lightboxTitle');
        const metaEl = document.getElementById('lightboxMeta');
        const counterEl = document.getElementById('lightboxCounter');
        const closeBtn = document.getElementById('lightboxCloseBtn');
        const prevBtn = document.getElementById('lightboxPrevBtn');
        const nextBtn = document.getElementById('lightboxNextBtn');

        // Collect all items metadata
        const galleryItems = cards.map(col => ({
            src: col.getAttribute('data-full-src'),
            title: col.getAttribute('data-title'),
            category: col.getAttribute('data-category'),
            optics: col.getAttribute('data-optics'),
            location: col.getAttribute('data-location')
        }));

        let activeIdx = 0;

        function updateLightbox(idx, direction = 1) {
            if (!galleryItems[idx]) return;
            activeIdx = idx;
            const item = galleryItems[idx];

            // Animate transition
            gsap.to(mainImg, {
                opacity: 0,
                scale: 0.96,
                duration: 0.2,
                ease: 'power2.in',
                onComplete: () => {
                    mainImg.src = item.src;
                    titleEl.textContent = item.title;
                    metaEl.innerHTML = `${item.category.toUpperCase()} &bull; ${item.optics} &bull; ${item.location}`;
                    counterEl.textContent = `${String(activeIdx + 1).padStart(2, '0')} / ${String(galleryItems.length).padStart(2, '0')}`;

                    mainImg.onload = () => {
                        gsap.fromTo(mainImg, 
                            { opacity: 0, scale: 0.96, x: direction * 25 },
                            { opacity: 1, scale: 1, x: 0, duration: 0.35, ease: 'power2.out' }
                        );
                    };
                }
            });
        }

        function openLightbox(idx) {
            activeIdx = idx;
            lightbox.classList.add('active');
            document.body.style.overflow = 'hidden';
            updateLightbox(idx, 0);

            gsap.fromTo(imgWrap,
                { scale: 0.88, opacity: 0 },
                { scale: 1, opacity: 1, duration: 0.4, ease: 'power3.out' }
            );
        }

        function closeLightbox() {
            gsap.to(imgWrap, {
                scale: 0.9,
                opacity: 0,
                duration: 0.25,
                ease: 'power2.in',
                onComplete: () => {
                    lightbox.classList.remove('active');
                    document.body.style.overflow = '';
                    mainImg.src = '';
                }
            });
        }

        function showNext() {
            const nextIdx = (activeIdx + 1) % galleryItems.length;
            updateLightbox(nextIdx, 1);
        }

        function showPrev() {
            const prevIdx = (activeIdx - 1 + galleryItems.length) % galleryItems.length;
            updateLightbox(prevIdx, -1);
        }

        // Attach click triggers to cards
        cards.forEach((col, idx) => {
            col.addEventListener('click', () => {
                openLightbox(idx);
            });
        });

        // Global opener for compatibility with any legacy onclick calls
        window.openHomeLightbox = function(src, caption) {
            const foundIdx = galleryItems.findIndex(i => i.src === src);
            if (foundIdx !== -1) {
                openLightbox(foundIdx);
            } else {
                openLightbox(0);
            }
        };

        // Lightbox controls
        if (closeBtn) closeBtn.addEventListener('click', closeLightbox);
        if (nextBtn) nextBtn.addEventListener('click', showNext);
        if (prevBtn) prevBtn.addEventListener('click', showPrev);

        // Click outside image to close
        lightbox.addEventListener('click', (e) => {
            if (e.target === lightbox) {
                closeLightbox();
            }
        });

        // Keyboard navigation
        window.addEventListener('keydown', (e) => {
            if (!lightbox.classList.contains('active')) return;
            if (e.key === 'Escape') closeLightbox();
            if (e.key === 'ArrowRight') showNext();
            if (e.key === 'ArrowLeft') showPrev();
        });

        // Mobile touch swipe gesture support
        let touchStartX = 0;
        let touchEndX = 0;
        lightbox.addEventListener('touchstart', (e) => {
            touchStartX = e.changedTouches[0].screenX;
        }, { passive: true });

        lightbox.addEventListener('touchend', (e) => {
            touchEndX = e.changedTouches[0].screenX;
            const diffX = touchEndX - touchStartX;
            if (Math.abs(diffX) > 45) {
                if (diffX < 0) showNext(); // Swipe left
                else showPrev(); // Swipe right
            }
        }, { passive: true });
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initMasterCollectionCinema);
    } else {
        initMasterCollectionCinema();
    }
})();
</script>
