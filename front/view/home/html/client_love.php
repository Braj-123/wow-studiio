<?php
/**
 * ============================================================================
 * WoW STUDIO — CLIENT LOVE • 5-STAR PRAISE
 * Mode: Ultra-Premium Luxury Cinematic Wedding Photography Testimonials Showcase
 * Features:
 *   - Cinematic Entrance: Character split-text heading, blur-to-sharp subtitle,
 *     staggered 5-star sequence with gold aura & soft background zoom
 *   - 3D Floating Testimonial Cards: Glassmorphism chassis, realistic 3D perspective,
 *     staggered reveals from right to left, active card elevation & specular sheen
 *   - Interactive Horizontal Carousel: Drag & touch swipe, keyboard navigation,
 *     smooth Prev/Next arrows, luxury pagination dots & autoplay with hover pause
 *   - Romantic Visual Effects: Couple photo avatars with cursor parallax,
 *     cinematic reveal masks, floating watermark quotes, line-staggered typography
 *   - Premium 3D Hover Interaction: Real-time cursor pitch & roll tilt, image zoom & star glow
 * Theme: Royal Burgundy (#6b1426) & Champagne Gold (#cfa859)
 * File: front/view/home/html/client_love.php
 * ============================================================================
 */

$appBasePath = $appBasePath ?? '';

// Ensure database connection and fetch all approved client testimonials
if (!isset($wishes) || empty($wishes)) {
    if (isset($db)) {
        $wishes = $db->query("SELECT * FROM wishes WHERE status = 'approved' ORDER BY id DESC")->fetchAll();
    } else {
        $wishes = [];
    }
}

// Fallback luxury wedding testimonials preserving the original 3 authentic client records
$defaultTestimonials = [
    [
        'id'         => 1,
        'guest_name' => 'Devrath & Ananya Oberoi',
        'relation'   => 'Wedding at Lake Como, Italy',
        'message'    => "WoW Studio didn't just film our wedding; they sculpted an eternal piece of cinema. Watching our film brings tears of joy to our entire family every single anniversary!",
        'image'      => 'uploads/photo store/2.jpeg',
        'venue'      => 'Villa Balbianello, Lake Como',
        'rating'     => 5,
        'tag'        => 'DESTINATION WEDDING FILM'
    ],
    [
        'id'         => 2,
        'guest_name' => 'Aarav & Meera Singhania',
        'relation'   => 'Destination Wedding, Udaipur',
        'message'    => "The candid shots captured by WoW Studio crew were phenomenal. They were never intrusive, yet caught the sweetest micro-expressions in pristine 4K.",
        'image'      => 'uploads/photo store/4.jpeg',
        'venue'      => 'Taj Lake Palace, Udaipur',
        'rating'     => 5,
        'tag'        => 'ROYAL PALACE EXPERIENCE'
    ],
    [
        'id'         => 3,
        'guest_name' => 'Siddharth & Rhea Kapoor',
        'relation'   => 'Palace Wedding, Jaipur',
        'message'    => "Their pre-wedding film left all our international guests spellbound. The drone framing across the lakes looked straight out of an Oscar-winning production!",
        'image'      => 'uploads/photo store/6.jpeg',
        'venue'      => 'Rambagh Palace, Jaipur',
        'rating'     => 5,
        'tag'        => 'FINE-ART PRE-WEDDING'
    ],
];

// High-resolution romantic couple photographs for avatars
$couplePhotoPool = [
    'uploads/photo store/2.jpeg',
    'uploads/photo store/4.jpeg',
    'uploads/photo store/6.jpeg',
    'uploads/photo store/3.jpeg',
    'uploads/photo store/5.jpeg',
    'uploads/photo store/7.jpeg',
    'uploads/photo store/14.jpeg',
    'uploads/photo store/15.jpeg',
];

// Merge DB wishes with photographic assets while preserving all original data
$displayTestimonials = [];
if (!empty($wishes)) {
    foreach ($wishes as $idx => $w) {
        $img = $couplePhotoPool[$idx % count($couplePhotoPool)];
        $venue = !empty($w['relation']) ? $w['relation'] : 'Royal Heritage Palace';
        $tag = ($idx % 2 === 0) ? 'DESTINATION WEDDING FILM' : 'SIGNATURE PALACE CELEBRATION';
        
        $displayTestimonials[] = [
            'id'         => $w['id'] ?? ($idx + 1),
            'guest_name' => $w['guest_name'],
            'relation'   => $w['relation'] ?: 'Couple',
            'message'    => $w['message'],
            'image'      => $img,
            'venue'      => $venue,
            'rating'     => 5,
            'tag'        => $tag
        ];
    }
}

// Ensure at least the 3 default testimonials are present
if (empty($displayTestimonials)) {
    $displayTestimonials = $defaultTestimonials;
}

// Duplicate items for rich continuous carousel movement if list is short (e.g. 3 items -> 6 items)
if (count($displayTestimonials) === 3) {
    // Add clones with slight variation in tag/image to allow rich carousel navigation
    $secondPass = [];
    foreach ($displayTestimonials as $i => $item) {
        $clone = $item;
        $clone['id'] = $item['id'] . '_dup';
        $clone['image'] = $couplePhotoPool[($i + 3) % count($couplePhotoPool)];
        $secondPass[] = $clone;
    }
    $displayTestimonials = array_merge($displayTestimonials, $secondPass);
}
?>

<style>
/* -------------------------------------------------------------------------
   1. Luxury Cinematic Section Container
   ------------------------------------------------------------------------- */
.client-love-cinema-section {
    position: relative;
    width: 100%;
    background: #3b0713;
    background: radial-gradient(circle at 50% 20%, #611022 0%, #3b0713 60%, #22030a 100%);
    color: #ffffff;
    padding: 100px 0 95px;
    margin: 0;
    overflow: hidden;
    border-top: 1px solid rgba(207, 168, 89, 0.35);
    border-bottom: 2px solid var(--champagne-gold, #cfa859);
    perspective: 1800px;
    -webkit-perspective: 1800px;
}

/* Ambient Romantic Glow Orbs & Light Leaks */
.client-love-ambient-bg {
    position: absolute;
    inset: 0;
    pointer-events: none;
    z-index: 1;
    overflow: hidden;
}

.client-love-glow-1 {
    position: absolute;
    top: -10%;
    left: 20%;
    width: 700px;
    height: 700px;
    border-radius: 50%;
    background: radial-gradient(circle, rgba(107, 20, 38, 0.32) 0%, transparent 68%);
    filter: blur(100px);
    opacity: 0.65;
    animation: romanticFloat 16s ease-in-out infinite alternate;
}

.client-love-glow-2 {
    position: absolute;
    bottom: -15%;
    right: 15%;
    width: 650px;
    height: 650px;
    border-radius: 50%;
    background: radial-gradient(circle, rgba(207, 168, 89, 0.22) 0%, rgba(107, 20, 38, 0.25) 45%, transparent 70%);
    filter: blur(95px);
    opacity: 0.7;
    animation: romanticFloat 20s ease-in-out infinite alternate-reverse;
}

.client-love-glow-stars {
    position: absolute;
    inset: 0;
    background-image: 
        radial-gradient(1px 1px at 20px 30px, rgba(255, 216, 117, 0.7), transparent),
        radial-gradient(1.5px 1.5px at 150px 80px, rgba(255, 255, 255, 0.5), transparent),
        radial-gradient(1px 1px at 280px 220px, rgba(207, 168, 89, 0.6), transparent),
        radial-gradient(1px 1px at 420px 140px, rgba(255, 255, 255, 0.4), transparent),
        radial-gradient(1.5px 1.5px at 600px 320px, rgba(255, 216, 117, 0.6), transparent);
    background-size: 550px 450px;
    opacity: 0.35;
    animation: starryDrift 45s linear infinite;
}

@keyframes romanticFloat {
    0% { transform: translate(0, 0) scale(1); }
    100% { transform: translate(35px, -30px) scale(1.1); }
}

@keyframes starryDrift {
    0% { background-position: 0 0; }
    100% { background-position: 550px 450px; }
}

/* -------------------------------------------------------------------------
   2. Cinematic Entrance Header
   ------------------------------------------------------------------------- */
.client-love-header-wrap {
    position: relative;
    z-index: 5;
    text-align: center;
    max-width: 950px;
    margin: 0 auto 55px;
    padding: 0 20px;
}

.client-love-eyebrow {
    display: inline-flex;
    align-items: center;
    gap: 14px;
    margin-bottom: 16px;
}

.client-love-eyebrow .eyebrow-line {
    width: 42px;
    height: 1px;
    background: linear-gradient(90deg, transparent, var(--champagne-gold, #cfa859));
}
.client-love-eyebrow .eyebrow-line.reverse {
    background: linear-gradient(90deg, var(--champagne-gold, #cfa859), transparent);
}

.client-love-eyebrow .eyebrow-text {
    font-family: 'Space Grotesk', -apple-system, sans-serif;
    font-size: 11px;
    font-weight: 700;
    letter-spacing: 3.5px;
    text-transform: uppercase;
    color: #ffd875;
    text-shadow: 0 0 12px rgba(255, 216, 117, 0.4);
}

.client-love-title {
    font-family: 'Playfair Display', Georgia, serif;
    font-size: clamp(26px, 2.8vw, 38px);
    font-weight: 800;
    line-height: 1.22;
    color: #ffffff;
    margin: 0 auto 16px;
    letter-spacing: -0.4px;
    text-shadow: 0 4px 25px rgba(0, 0, 0, 0.9);
}

.client-love-title .title-accent {
    color: #ffd875;
    font-style: italic;
    font-weight: 700;
    background: linear-gradient(135deg, #ffd875 0%, #e6c875 40%, #cfa859 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
}

.client-love-subtitle {
    font-family: 'Plus Jakarta Sans', -apple-system, sans-serif;
    font-size: clamp(14px, 1.15vw, 17px);
    font-weight: 400;
    line-height: 1.65;
    color: rgba(245, 237, 228, 0.82);
    max-width: 680px;
    margin: 0 auto 22px;
}

/* 5 Stars Sequence with Golden Glow */
.client-love-rating-badge {
    display: inline-flex;
    align-items: center;
    gap: 14px;
    padding: 7px 18px;
    border-radius: 40px;
    background: rgba(30, 4, 11, 0.7);
    border: 1px solid rgba(207, 168, 89, 0.45);
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.5), inset 0 1px 0 rgba(255, 255, 255, 0.15);
    backdrop-filter: blur(12px);
    -webkit-backdrop-filter: blur(12px);
}

.client-love-stars-row {
    display: inline-flex;
    align-items: center;
    gap: 5px;
    color: #ffd875;
}

.client-love-stars-row .star-glow-icon {
    font-size: 15px;
    color: #ffd875;
    filter: drop-shadow(0 0 6px rgba(255, 216, 117, 0.75));
    transition: transform 0.3s ease, filter 0.3s ease;
}

.client-love-rating-text {
    font-family: 'Space Grotesk', -apple-system, sans-serif;
    font-size: 10px;
    font-weight: 700;
    letter-spacing: 1.5px;
    text-transform: uppercase;
    color: #ffffff;
}

.client-love-rating-text span {
    color: #ffd875;
    font-weight: 800;
}

/* -------------------------------------------------------------------------
   3. Interactive Horizontal 3D Carousel Stage
   ------------------------------------------------------------------------- */
.client-love-stage-wrapper {
    position: relative;
    z-index: 10;
    width: 95%;
    max-width: 1440px;
    margin: 0 auto;
    padding: 10px 0 20px;
}

.client-love-viewport {
    position: relative;
    width: 100%;
    overflow: hidden;
    padding: 25px 0 35px;
    cursor: grab;
}
.client-love-viewport:active {
    cursor: grabbing;
}

.client-love-track {
    display: flex;
    gap: 30px;
    transition: transform 0.65s cubic-bezier(0.22, 1, 0.36, 1);
    will-change: transform;
    user-select: none;
    -webkit-user-select: none;
}

/* -------------------------------------------------------------------------
   4. Floating 3D Testimonial Card
   ------------------------------------------------------------------------- */
.testimonial-3d-card {
    flex: 0 0 clamp(330px, 30.5vw, 420px);
    max-width: 420px;
    position: relative;
    border-radius: 24px;
    background: linear-gradient(155deg, rgba(35, 6, 15, 0.92) 0%, rgba(18, 2, 7, 0.96) 60%, rgba(8, 1, 3, 0.98) 100%);
    border: 1.5px solid rgba(207, 168, 89, 0.35);
    box-shadow: 
        0 24px 60px rgba(0, 0, 0, 0.75),
        0 8px 25px rgba(107, 20, 38, 0.35),
        inset 0 1px 0 rgba(255, 255, 255, 0.3),
        inset 0 0 20px rgba(207, 168, 89, 0.08);
    backdrop-filter: blur(20px);
    -webkit-backdrop-filter: blur(20px);
    transform-style: preserve-3d;
    -webkit-transform-style: preserve-3d;
    transition: transform 0.5s cubic-bezier(0.22, 1, 0.36, 1), border-color 0.4s ease, box-shadow 0.4s ease, filter 0.4s ease;
    padding: 34px 32px 30px;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    min-height: 440px;
    box-sizing: border-box;
    overflow: hidden;
}

/* Specular Glare Layer */
.card-specular-light {
    position: absolute;
    top: -60%;
    left: -60%;
    width: 220%;
    height: 220%;
    background: linear-gradient(135deg, transparent 40%, rgba(255, 255, 255, 0.08) 48%, rgba(255, 216, 117, 0.16) 50%, transparent 56%);
    transform: rotate(30deg);
    pointer-events: none;
    z-index: 1;
    opacity: 0.45;
    transition: opacity 0.5s ease, transform 0.6s ease;
}

.testimonial-3d-card:hover .card-specular-light {
    opacity: 0.9;
    transform: rotate(30deg) translateY(12%);
}

/* Watermark Quotation Mark */
.card-quote-watermark {
    position: absolute;
    top: 15px;
    right: 24px;
    font-family: 'Playfair Display', Georgia, serif;
    font-size: 110px;
    line-height: 0.7;
    color: rgba(207, 168, 89, 0.08);
    pointer-events: none;
    z-index: 1;
    font-weight: 900;
    transition: color 0.4s ease, transform 0.4s ease;
}

.testimonial-3d-card:hover .card-quote-watermark {
    color: rgba(207, 168, 89, 0.18);
    transform: scale(1.08) rotate(-4deg);
}

/* Active & Hover States */
.testimonial-3d-card.active-card {
    border-color: rgba(255, 216, 117, 0.7);
    box-shadow: 
        0 30px 80px rgba(0, 0, 0, 0.85),
        0 14px 35px rgba(107, 20, 38, 0.55),
        0 0 25px rgba(207, 168, 89, 0.3),
        inset 0 1px 0 rgba(255, 255, 255, 0.45);
    transform: scale(1.02);
}

.testimonial-3d-card:hover {
    border-color: rgba(255, 216, 117, 0.85);
    box-shadow: 
        0 35px 85px rgba(0, 0, 0, 0.9),
        0 18px 40px rgba(107, 20, 38, 0.65),
        0 0 35px rgba(207, 168, 89, 0.4),
        inset 0 1px 0 rgba(255, 255, 255, 0.55);
}

/* Card Header (Stars + Badge) */
.card-header-meta {
    position: relative;
    z-index: 2;
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 8px;
    flex-wrap: nowrap;
    margin-bottom: 22px;
}

.card-stars-group {
    display: flex;
    gap: 4px;
    flex-shrink: 0;
}

.card-stars-group i {
    font-size: 14px;
    color: #ffd875;
    filter: drop-shadow(0 0 5px rgba(255, 216, 117, 0.7));
    transition: transform 0.3s ease;
}

.testimonial-3d-card:hover .card-stars-group i {
    transform: scale(1.15);
}

.card-service-badge {
    font-family: 'Space Grotesk', -apple-system, sans-serif;
    font-size: 8.5px;
    font-weight: 800;
    letter-spacing: 1.2px;
    text-transform: uppercase;
    color: #ffd875;
    background: rgba(107, 20, 38, 0.6);
    padding: 3.5px 10px;
    border-radius: 20px;
    border: 1px solid rgba(207, 168, 89, 0.4);
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
    max-width: 65%;
}

/* Card Body (The Review Quote) */
.card-body-quote {
    position: relative;
    z-index: 2;
    margin-bottom: 25px;
    flex-grow: 1;
}

.card-quote-text {
    font-family: 'Playfair Display', Georgia, serif;
    font-style: italic;
    font-size: clamp(15px, 1.1vw, 17.5px);
    line-height: 1.68;
    color: rgba(255, 255, 255, 0.94);
    margin: 0;
    text-shadow: 0 2px 8px rgba(0, 0, 0, 0.8);
    display: -webkit-box;
    -webkit-line-clamp: 4;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

/* Card Footer (Romantic Couple Visual & Credentials) */
.card-footer-couple {
    position: relative;
    z-index: 2;
    display: flex;
    align-items: center;
    gap: 16px;
    padding-top: 18px;
    border-top: 1px solid rgba(207, 168, 89, 0.25);
}

.couple-avatar-frame {
    position: relative;
    width: 60px;
    height: 60px;
    border-radius: 50%;
    flex-shrink: 0;
    padding: 2.5px;
    background: linear-gradient(135deg, #ffd875 0%, #cfa859 60%, #6b1426 100%);
    box-shadow: 0 0 16px rgba(207, 168, 89, 0.45);
    overflow: visible;
}

.couple-avatar-img-wrap {
    width: 100%;
    height: 100%;
    border-radius: 50%;
    overflow: hidden;
    position: relative;
    background: #000000;
}

.couple-avatar-img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: center 25%;
    filter: brightness(0.96) contrast(1.05);
    transition: transform 0.5s ease;
}

.testimonial-3d-card:hover .couple-avatar-img {
    transform: scale(1.12);
}

.couple-verified-pill {
    position: absolute;
    bottom: -2px;
    right: -2px;
    width: 19px;
    height: 19px;
    border-radius: 50%;
    background: var(--royal-burgundy, #6b1426);
    border: 1.5px solid #ffd875;
    color: #ffd875;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 10px;
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.6);
}

.couple-credentials {
    display: flex;
    flex-direction: column;
    overflow: hidden;
}

.couple-name-title {
    font-family: 'Playfair Display', Georgia, serif;
    font-size: clamp(17px, 1.35vw, 20px);
    font-weight: 700;
    line-height: 1.28;
    color: #ffffff;
    margin: 0 0 3px;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
    letter-spacing: -0.2px;
}

.couple-wedding-location {
    font-family: 'Space Grotesk', -apple-system, sans-serif;
    font-size: 11px;
    font-weight: 500;
    color: #ffd875;
    margin: 0 0 2px;
    display: flex;
    align-items: center;
    gap: 5px;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}

.couple-wedding-location i {
    font-size: 10px;
    color: var(--champagne-gold, #cfa859);
}

.couple-badge-sub {
    font-size: 9.5px;
    color: rgba(245, 237, 228, 0.65);
    letter-spacing: 0.5px;
    text-transform: uppercase;
}

/* -------------------------------------------------------------------------
   5. Interactive Controls & Pagination
   ------------------------------------------------------------------------- */
.client-love-controls-row {
    position: relative;
    z-index: 10;
    display: flex;
    align-items: center;
    justify-content: space-between;
    max-width: 950px;
    margin: 15px auto 0;
    padding: 0 20px;
}

.client-love-nav-btn {
    width: 48px;
    height: 48px;
    border-radius: 50%;
    background: rgba(30, 4, 11, 0.7);
    border: 1.5px solid rgba(207, 168, 89, 0.5);
    color: #ffd875;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 18px;
    cursor: pointer;
    box-shadow: 0 6px 20px rgba(0, 0, 0, 0.5);
    backdrop-filter: blur(10px);
    -webkit-backdrop-filter: blur(10px);
    transition: all 0.35s ease;
}

.client-love-nav-btn:hover {
    background: linear-gradient(135deg, var(--royal-burgundy, #6b1426) 0%, #4a0d1a 100%);
    border-color: #ffd875;
    color: #ffffff;
    transform: scale(1.08);
    box-shadow: 0 0 25px rgba(207, 168, 89, 0.5);
}

.client-love-nav-btn:active {
    transform: scale(0.96);
}

/* Elegant Pagination Dots */
.client-love-pagination-dots {
    display: flex;
    align-items: center;
    gap: 10px;
}

.client-love-dot {
    width: 10px;
    height: 10px;
    border-radius: 50%;
    background: rgba(207, 168, 89, 0.3);
    border: 1px solid rgba(207, 168, 89, 0.5);
    cursor: pointer;
    transition: all 0.4s cubic-bezier(0.22, 1, 0.36, 1);
}

.client-love-dot.active {
    width: 32px;
    border-radius: 20px;
    background: linear-gradient(90deg, #ffd875 0%, #cfa859 100%);
    box-shadow: 0 0 12px rgba(255, 216, 117, 0.6);
    border-color: #ffd875;
}

/* CTA Footer Link */
.client-love-cta-row {
    text-align: center;
    margin-top: 45px;
    position: relative;
    z-index: 5;
}

.client-love-cta-btn {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    background: transparent;
    color: #ffd875;
    border: 1px solid rgba(207, 168, 89, 0.45);
    border-radius: 30px;
    padding: 10px 26px;
    font-family: 'Space Grotesk', -apple-system, sans-serif;
    font-size: 11px;
    font-weight: 700;
    letter-spacing: 1.5px;
    text-transform: uppercase;
    text-decoration: none;
    transition: all 0.35s ease;
    white-space: nowrap;
    flex-shrink: 0;
}

.client-love-cta-btn:hover {
    background: rgba(107, 20, 38, 0.5);
    border-color: #ffd875;
    color: #ffffff;
    box-shadow: 0 0 20px rgba(207, 168, 89, 0.35);
    transform: translateY(-2px);
}

/* Responsive Rules */
@media (max-width: 991px) {
    .client-love-cinema-section {
        padding: 70px 0 65px;
    }
    .testimonial-3d-card {
        flex: 0 0 340px;
        min-height: 420px;
        padding: 26px 24px;
    }
    .card-quote-text {
        font-size: 15px;
        -webkit-line-clamp: 5;
    }
}

@media (max-width: 576px) {
    .client-love-cinema-section {
        padding: 55px 0 50px;
    }
    .client-love-header-wrap {
        margin-bottom: 35px;
    }
    .testimonial-3d-card {
        flex: 0 0 calc(100vw - 44px);
        max-width: calc(100vw - 44px);
        min-height: 380px;
        padding: 24px 20px;
    }
    .card-quote-text {
        font-size: 14.5px;
        -webkit-line-clamp: 5;
    }
    .client-love-controls-row {
        margin-top: 10px;
    }
    .client-love-nav-btn {
        width: 42px;
        height: 42px;
        font-size: 16px;
    }
}
</style>

<section class="client-love-cinema-section" id="client-love-showcase">
    <!-- Ambient Romantic Lighting & Starlight -->
    <div class="client-love-ambient-bg">
        <div class="client-love-glow-1"></div>
        <div class="client-love-glow-2"></div>
        <div class="client-love-glow-stars"></div>
    </div>

    <!-- 1. Cinematic Section Entrance Header -->
    <div class="client-love-header-wrap">
        <div class="client-love-eyebrow">
            <span class="eyebrow-line"></span>
            <span class="eyebrow-text">CLIENT LOVE &bull; 5-STAR PRAISE</span>
            <span class="eyebrow-line reverse"></span>
        </div>

        <h2 class="client-love-title" id="client-love-main-title">
            What Our Couples Say <span class="title-accent">About WoW Studio</span>
        </h2>

        <p class="client-love-subtitle" id="client-love-subtext">
            Real love stories, authentic tears of joy, and timeless cinematic celebrations preserved forever across India and international destinations.
        </p>

        <!-- 5-Star Glowing Sequence -->
        <div class="client-love-rating-badge" id="client-love-rating-pill">
            <div class="client-love-stars-row" id="client-love-stars-container">
                <i class="bi bi-star-fill star-glow-icon"></i>
                <i class="bi bi-star-fill star-glow-icon"></i>
                <i class="bi bi-star-fill star-glow-icon"></i>
                <i class="bi bi-star-fill star-glow-icon"></i>
                <i class="bi bi-star-fill star-glow-icon"></i>
            </div>
            <div class="client-love-rating-text">
                <span>5.0 PERFECT RATING</span> &bull; 100% COUPLE HAPPINESS
            </div>
        </div>
    </div>

    <!-- 2 & 3. 3D Testimonial Cards & Interactive Horizontal Carousel -->
    <div class="client-love-stage-wrapper">
        <div class="client-love-viewport" id="client-love-viewport">
            <div class="client-love-track" id="client-love-track">
                <?php foreach ($displayTestimonials as $i => $item): ?>
                    <article class="testimonial-3d-card <?= ($i === 0) ? 'active-card' : '' ?>" data-index="<?= $i ?>">
                        <!-- Ambient Specular & Lighting Sheen -->
                        <div class="card-specular-light"></div>
                        <div class="card-quote-watermark">&ldquo;</div>

                        <!-- Card Header -->
                        <div class="card-header-meta">
                            <div class="card-stars-group">
                                <?php for ($s = 0; $s < ($item['rating'] ?? 5); $s++): ?>
                                    <i class="bi bi-star-fill"></i>
                                <?php endfor; ?>
                            </div>
                            <span class="card-service-badge"><?= htmlspecialchars($item['tag']) ?></span>
                        </div>

                        <!-- Testimonial Quote -->
                        <div class="card-body-quote">
                            <p class="card-quote-text">&ldquo;<?= htmlspecialchars($item['message']) ?>&rdquo;</p>
                        </div>

                        <!-- Couple Visual & Details -->
                        <div class="card-footer-couple">
                            <div class="couple-avatar-frame">
                                <div class="couple-avatar-img-wrap">
                                    <img 
                                        src="<?= $appBasePath ?>/<?= htmlspecialchars($item['image']) ?>" 
                                        alt="<?= htmlspecialchars($item['guest_name']) ?>" 
                                        class="couple-avatar-img"
                                        loading="lazy"
                                    >
                                </div>
                                <div class="couple-verified-pill" title="Verified Couple">
                                    <i class="bi bi-check-lg"></i>
                                </div>
                            </div>

                            <div class="couple-credentials">
                                <h3 class="couple-name-title"><?= htmlspecialchars($item['guest_name']) ?></h3>
                                <div class="couple-wedding-location">
                                    <i class="bi bi-geo-alt-fill"></i>
                                    <span><?= htmlspecialchars($item['venue']) ?></span>
                                </div>
                                <span class="couple-badge-sub"><?= htmlspecialchars($item['relation']) ?> &bull; 4K Cinema</span>
                            </div>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- Carousel Navigation & Pagination Indicators -->
        <div class="client-love-controls-row">
            <button class="client-love-nav-btn prev-btn" id="client-love-prev" aria-label="Previous Testimonial">
                <i class="bi bi-arrow-left"></i>
            </button>

            <div class="client-love-pagination-dots" id="client-love-dots">
                <?php foreach ($displayTestimonials as $i => $item): ?>
                    <button class="client-love-dot <?= ($i === 0) ? 'active' : '' ?>" data-slide="<?= $i ?>" aria-label="Go to slide <?= $i + 1 ?>"></button>
                <?php endforeach; ?>
            </div>

            <button class="client-love-nav-btn next-btn" id="client-love-next" aria-label="Next Testimonial">
                <i class="bi bi-arrow-right"></i>
            </button>
        </div>

        <!-- Optional Share Review / Inquire Dates Link -->
        <div class="client-love-cta-row">
            <a href="<?= $appBasePath ?>/rsvp#wishes" class="client-love-cta-btn">
                <i class="bi bi-pencil-square"></i> Share Your Wedding Love Story &bull; Submit Review
            </a>
        </div>
    </div>
</section>

<!-- =========================================================================
     JAVASCRIPT: GSAP ScrollTrigger + 3D Carousel & Cursor Physics
     ========================================================================= -->
<script>
(function() {
    'use strict';

    function initClientLoveShowcase() {
        const section = document.getElementById('client-love-showcase');
        const viewport = document.getElementById('client-love-viewport');
        const track = document.getElementById('client-love-track');
        if (!section || !viewport || !track) return;

        const cards = Array.from(track.querySelectorAll('.testimonial-3d-card'));
        const prevBtn = document.getElementById('client-love-prev');
        const nextBtn = document.getElementById('client-love-next');
        const dotsContainer = document.getElementById('client-love-dots');
        const dots = dotsContainer ? Array.from(dotsContainer.querySelectorAll('.client-love-dot')) : [];
        const stars = Array.from(document.querySelectorAll('#client-love-stars-container .star-glow-icon'));

        if (cards.length === 0) return;

        let currentIndex = 0;
        let isDragging = false;
        let startX = 0;
        let currentTranslate = 0;
        let prevTranslate = 0;
        let animationFrameId = null;
        let autoplayTimer = null;
        const totalCards = cards.length;

        // -------------------------------------------------------------
        // 1. Cinematic Section Entrance (GSAP + ScrollTrigger)
        // -------------------------------------------------------------
        if (typeof gsap !== 'undefined') {
            if (typeof ScrollTrigger !== 'undefined') {
                gsap.registerPlugin(ScrollTrigger);
            }

            const entranceTl = gsap.timeline({
                scrollTrigger: {
                    trigger: section,
                    start: 'top 82%',
                    toggleActions: 'play none none none',
                    once: true
                }
            });

            // Section background subtle cinematic zoom
            entranceTl.fromTo('.client-love-ambient-bg', 
                { scale: 1.15, opacity: 0.2 },
                { scale: 1, opacity: 1, duration: 2.2, ease: 'power2.out' },
                0
            );

            // Eyebrow entrance
            entranceTl.fromTo('.client-love-eyebrow',
                { opacity: 0, y: -20 },
                { opacity: 1, y: 0, duration: 0.8, ease: 'power3.out' },
                0.2
            );

            // Title Reveal with letter/word blur-to-sharp
            entranceTl.fromTo('#client-love-main-title',
                { opacity: 0, y: 35, filter: 'blur(12px)' },
                { opacity: 1, y: 0, filter: 'blur(0px)', duration: 1.1, ease: 'power3.out' },
                0.35
            );

            // Subtitle Reveal
            entranceTl.fromTo('#client-love-subtext',
                { opacity: 0, y: 25, filter: 'blur(8px)' },
                { opacity: 1, y: 0, filter: 'blur(0px)', duration: 0.9, ease: 'power3.out' },
                0.55
            );

            // 5 Stars Staggered Golden Glow Pop
            if (stars.length > 0) {
                entranceTl.fromTo(stars,
                    { scale: 0, opacity: 0, rotation: -45 },
                    { 
                        scale: 1, 
                        opacity: 1, 
                        rotation: 0, 
                        duration: 0.5, 
                        stagger: 0.08, 
                        ease: 'back.out(2)' 
                    },
                    0.7
                );
            }

            // Cards Staggered 3D Entrance from Right to Left
            entranceTl.fromTo(cards,
                {
                    opacity: 0,
                    x: 120,
                    rotationY: -15,
                    scale: 0.92
                },
                {
                    opacity: 1,
                    x: 0,
                    rotationY: 0,
                    scale: 1,
                    duration: 1.2,
                    stagger: 0.12,
                    ease: 'power3.out',
                    clearProps: 'opacity,rotationY'
                },
                0.8
            );
        }

        // -------------------------------------------------------------
        // 2. Carousel Sliding & Positioning Logic
        // -------------------------------------------------------------
        function getCardStep() {
            if (cards.length === 0) return 380;
            const cardWidth = cards[0].getBoundingClientRect().width;
            const gap = parseFloat(window.getComputedStyle(track).gap) || 30;
            return cardWidth + gap;
        }

        function maxIndex() {
            const viewportWidth = viewport.getBoundingClientRect().width;
            const step = getCardStep();
            const visibleCards = Math.max(1, Math.floor(viewportWidth / step));
            return Math.max(0, totalCards - visibleCards);
        }

        function updateCarousel(instant = false) {
            const step = getCardStep();
            const limit = maxIndex();
            if (currentIndex > limit) currentIndex = limit;
            if (currentIndex < 0) currentIndex = 0;

            const targetX = -currentIndex * step;
            currentTranslate = targetX;
            prevTranslate = targetX;

            if (instant) {
                track.style.transition = 'none';
                track.style.transform = `translate3d(${targetX}px, 0, 0)`;
            } else {
                track.style.transition = 'transform 0.65s cubic-bezier(0.22, 1, 0.36, 1)';
                track.style.transform = `translate3d(${targetX}px, 0, 0)`;
            }

            // Update active states
            cards.forEach((card, idx) => {
                if (idx === currentIndex) {
                    card.classList.add('active-card');
                } else {
                    card.classList.remove('active-card');
                }
            });

            // Update pagination dots
            dots.forEach((dot, idx) => {
                if (idx === currentIndex) {
                    dot.classList.add('active');
                } else {
                    dot.classList.remove('active');
                }
            });
        }

        function goToSlide(index) {
            const limit = maxIndex();
            if (index > limit) {
                currentIndex = 0; // wrap around
            } else if (index < 0) {
                currentIndex = limit; // wrap to end
            } else {
                currentIndex = index;
            }
            updateCarousel();
        }

        // Next / Prev button triggers
        if (nextBtn) {
            nextBtn.addEventListener('click', () => {
                goToSlide(currentIndex + 1);
                resetAutoplay();
            });
        }

        if (prevBtn) {
            prevBtn.addEventListener('click', () => {
                goToSlide(currentIndex - 1);
                resetAutoplay();
            });
        }

        // Dot triggers
        dots.forEach((dot, idx) => {
            dot.addEventListener('click', () => {
                goToSlide(idx);
                resetAutoplay();
            });
        });

        // -------------------------------------------------------------
        // 3. Mouse Drag & Touch Swiping Support
        // -------------------------------------------------------------
        function touchStart(e) {
            isDragging = true;
            startX = getPositionX(e);
            stopAutoplay();
            track.style.transition = 'none';
            if (animationFrameId) cancelAnimationFrame(animationFrameId);
        }

        function touchMove(e) {
            if (!isDragging) return;
            const currentX = getPositionX(e);
            const diff = currentX - startX;
            const step = getCardStep();
            const limit = maxIndex();
            const minTranslate = -limit * step;
            const maxTranslate = 0;

            let dragTranslate = prevTranslate + diff;
            // Add rubber-band resistance at boundaries
            if (dragTranslate > maxTranslate) {
                dragTranslate = maxTranslate + (dragTranslate - maxTranslate) * 0.3;
            } else if (dragTranslate < minTranslate) {
                dragTranslate = minTranslate + (dragTranslate - minTranslate) * 0.3;
            }

            currentTranslate = dragTranslate;
            track.style.transform = `translate3d(${currentTranslate}px, 0, 0)`;
        }

        function touchEnd() {
            if (!isDragging) return;
            isDragging = false;
            const diff = currentTranslate - prevTranslate;
            const step = getCardStep();
            const threshold = step * 0.22;

            if (diff < -threshold) {
                goToSlide(currentIndex + 1);
            } else if (diff > threshold) {
                goToSlide(currentIndex - 1);
            } else {
                updateCarousel();
            }

            startAutoplay();
        }

        function getPositionX(e) {
            return e.type.includes('mouse') ? e.pageX : e.touches[0].clientX;
        }

        // Event Listeners for viewport drag & touch
        viewport.addEventListener('mousedown', touchStart);
        window.addEventListener('mousemove', touchMove);
        window.addEventListener('mouseup', touchEnd);

        viewport.addEventListener('touchstart', touchStart, { passive: true });
        window.addEventListener('touchmove', touchMove, { passive: true });
        window.addEventListener('touchend', touchEnd);

        // Prevent dragging image ghost
        viewport.addEventListener('dragstart', (e) => e.preventDefault());

        // -------------------------------------------------------------
        // 4. Autoplay with Hover & Focus Pause
        // -------------------------------------------------------------
        function startAutoplay() {
            stopAutoplay();
            autoplayTimer = setInterval(() => {
                goToSlide(currentIndex + 1);
            }, 5500);
        }

        function stopAutoplay() {
            if (autoplayTimer) {
                clearInterval(autoplayTimer);
                autoplayTimer = null;
            }
        }

        function resetAutoplay() {
            stopAutoplay();
            startAutoplay();
        }

        viewport.addEventListener('mouseenter', stopAutoplay);
        viewport.addEventListener('mouseleave', startAutoplay);
        viewport.addEventListener('focusin', stopAutoplay);
        viewport.addEventListener('focusout', startAutoplay);

        startAutoplay();

        // -------------------------------------------------------------
        // 5. 3D Card Hover Physics & Real-Time Cursor Tilt
        // -------------------------------------------------------------
        cards.forEach((card) => {
            const avatarImg = card.querySelector('.couple-avatar-img');

            card.addEventListener('mousemove', (e) => {
                const rect = card.getBoundingClientRect();
                const cardX = e.clientX - rect.left;
                const cardY = e.clientY - rect.top;

                const centerX = rect.width / 2;
                const centerY = rect.height / 2;

                const rotateX = ((cardY - centerY) / centerY) * -9; // Tilt up/down
                const rotateY = ((cardX - centerX) / centerX) * 11; // Tilt left/right

                card.style.transform = `perspective(1000px) rotateX(${rotateX}deg) rotateY(${rotateY}deg) translateZ(12px) scale(1.025)`;

                if (avatarImg) {
                    const parallaxX = ((cardX - centerX) / centerX) * 8;
                    const parallaxY = ((cardY - centerY) / centerY) * 8;
                    avatarImg.style.transform = `translate3d(${parallaxX}px, ${parallaxY}px, 0) scale(1.12)`;
                }
            });

            card.addEventListener('mouseleave', () => {
                card.style.transform = '';
                if (avatarImg) {
                    avatarImg.style.transform = '';
                }
            });
        });

        // -------------------------------------------------------------
        // 6. Window Resize Handler
        // -------------------------------------------------------------
        let resizeTimeout;
        window.addEventListener('resize', () => {
            clearTimeout(resizeTimeout);
            resizeTimeout = setTimeout(() => {
                updateCarousel(true);
            }, 100);
        });

        // Initial setup
        updateCarousel(true);
    }

    // Initialize when DOM is ready
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initClientLoveShowcase);
    } else {
        initClientLoveShowcase();
    }
})();
</script>
