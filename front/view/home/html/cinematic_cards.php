<?php
/**
 * ============================================================================
 * WoW STUDIO — ULTRA-PREMIUM 180° CURVED CINEMATIC SHOWCASE
 * Layout: Multi-Card Horizontal Line with Dynamic 180° Cylindrical 3D Perspective
 * Features:
 *   - Cards glide along a true 180-degree panoramic curved arc (no center collapse)
 *   - Cards at center face forward (scale 1.05, 0deg, full brightness)
 *   - Cards at left and right curve gracefully inward along 180° perspective depth
 *   - NO numbers on cards (clean luxury aesthetic)
 *   - Professional luxury button linking to dedicated full-detail project page
 *   - Smooth interactive drag, auto-glide, and Prev/Next navigation
 * Theme: Royal Burgundy (#6b1426) & Champagne Gold (#cfa859)
 * File: front/view/home/html/cinematic_cards.php
 * ============================================================================
 */
$appBasePath = $appBasePath ?? '';

$cinematicCards = [
    [
        'id'       => '01',
        'title'    => 'The Regal Velvet Bride',
        'tag'      => 'EDITORIAL BRIDAL',
        'desc'     => 'Handcrafted zardozi in royal burgundy velvet, captured under dramatic chiaroscuro palace illumination.',
        'image'    => 'uploads/photo store/3.jpeg',
        'optics'   => '85MM F/1.4 GM // ARRI 35 LOOK',
        'location' => 'Luxury Royal Suite, Udaipur'
    ],
    [
        'id'       => '02',
        'title'    => 'Destiny By The River',
        'tag'      => 'PRE-WEDDING CINEMA',
        'desc'     => 'Two souls united beneath the monumental suspension bridge at dawn as morning mist sweeps across the waters.',
        'image'    => 'uploads/photo store/10.jpeg',
        'optics'   => '35MM F/1.4 GM // 4K 10-BIT LOG',
        'location' => 'Iconic Riverfront, Kolkata'
    ],
    [
        'id'       => '03',
        'title'    => 'The Royal Heritage Couple',
        'tag'      => 'FINE-ART PORTRAIT',
        'desc'     => 'Authentic timeless dignity preserved forever — where cinematic lighting meets unscripted emotional intimacy.',
        'image'    => 'uploads/photo store/2.jpeg',
        'optics'   => '50MM F/1.2 GM // 1/250S ISO 100',
        'location' => 'Heritage Courtyard, Jaipur'
    ],
    [
        'id'       => '04',
        'title'    => 'Haldi Golden Radiance',
        'tag'      => 'RITUALS & CANDID JOY',
        'desc'     => 'Vibrant marigold petals, unfiltered laughter, and sacred turmeric blessings documented in fluid slow-motion.',
        'image'    => 'uploads/photo store/8.jpeg',
        'optics'   => '24-70MM F/2.8 GM // 120 FPS HIGH-SPEED',
        'location' => 'Palace Gardens, Rajasthan'
    ],
    [
        'id'       => '05',
        'title'    => 'Sangeet Midnight Rhythm',
        'tag'      => 'CELEBRATION & BEATS',
        'desc'     => 'Electrifying stage choreography, anamorphic lens flares, and ecstatic family celebration under festival skies.',
        'image'    => 'uploads/photo store/9.jpeg',
        'optics'   => '24MM F/1.4 GM // ISO 1600 RAW',
        'location' => 'Grand Ballroom Gala, Goa'
    ],
    [
        'id'       => '06',
        'title'    => 'Imperial Grand Banquet',
        'tag'      => 'DESTINATION RECEPTION',
        'desc'     => 'Bespoke crystal chandeliers, majestic floral architecture, and an unforgettable lifetime milestone.',
        'image'    => 'uploads/photo store/15.jpeg',
        'optics'   => '16-35MM F/2.8 GM // FULL-FRAME HDR',
        'location' => 'Fortress Amphitheatre, Jodhpur'
    ],
    [
        'id'       => '07',
        'title'    => 'Golden Hour Whispers',
        'tag'      => 'SUNSET ROMANCE',
        'desc'     => 'Warm twilight breeze and gentle silhouetted embraces over tranquil palace lake waters.',
        'image'    => 'uploads/photo store/4.jpeg',
        'optics'   => '85MM F/1.4 GM // 1/1000S ISO 64',
        'location' => 'Pichola Lakeside, Udaipur'
    ],
    [
        'id'       => '08',
        'title'    => 'Candid Chemistry',
        'tag'      => 'UNPOSED EMOTION',
        'desc'     => 'Unscripted glances between two lovers surrounded by ancient carved marble corridors.',
        'image'    => 'uploads/photo store/5.jpeg',
        'optics'   => '50MM F/1.2 GM // NATURAL AMBIENCE',
        'location' => 'Hawa Mahal Environs, Jaipur'
    ]
];
?>

<style>
/* -------------------------------------------------------------------------
   1. 180° Curved Panoramic Showcase Architecture
   ------------------------------------------------------------------------- */
.cinematic-cards-section {
    position: relative;
    width: 100%;
    padding: 85px 0 95px;
    background: #faf6f0;
    background: linear-gradient(180deg, #faf6f0 0%, #f3e8d9 100%);
    overflow: hidden;
    color: #2c2523;
    border-top: 1px solid rgba(207, 168, 89, 0.4);
    border-bottom: 2px solid var(--champagne-gold, #cfa859);
}

/* Ambient Atmospheric Lights */
.cards-ambient-bg {
    position: absolute;
    inset: 0;
    pointer-events: none;
    z-index: 1;
    overflow: hidden;
}
.cards-ambient-glow-1 {
    position: absolute;
    top: 10%;
    left: 5%;
    width: 600px;
    height: 600px;
    border-radius: 50%;
    background: radial-gradient(circle, rgba(207, 168, 89, 0.22) 0%, transparent 70%);
    filter: blur(80px);
    opacity: 0.7;
}
.cards-ambient-glow-2 {
    position: absolute;
    bottom: 5%;
    right: 8%;
    width: 650px;
    height: 650px;
    border-radius: 50%;
    background: radial-gradient(circle, rgba(107, 20, 38, 0.14) 0%, rgba(207, 168, 89, 0.12) 40%, transparent 70%);
    filter: blur(90px);
    opacity: 0.65;
}

/* -------------------------------------------------------------------------
   2. Clean Section Header with Interactive Nav Controls
   ------------------------------------------------------------------------- */
.cards-section-header {
    position: relative;
    z-index: 15;
    width: 90%;
    max-width: 1400px;
    margin: 0 auto 36px;
    display: flex;
    align-items: flex-end;
    justify-content: space-between;
    flex-wrap: wrap;
    gap: 20px;
}

.cards-header-copy {
    max-width: 720px;
}

.cards-eyebrow {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    background: rgba(107, 20, 38, 0.08);
    border: 1px solid rgba(207, 168, 89, 0.5);
    padding: 5px 16px;
    border-radius: 30px;
    font-size: 11px;
    font-weight: 800;
    letter-spacing: 1.5px;
    color: var(--royal-burgundy, #6b1426);
    text-transform: uppercase;
    margin-bottom: 12px;
}

.masterpiece-cinema-title {
    font-family: 'Playfair Display', Georgia, serif;
    font-size: clamp(28px, 3vw, 42px);
    line-height: 1.2;
    font-weight: 800;
    color: var(--royal-burgundy, #6b1426);
    letter-spacing: -0.4px;
    margin: 0;
}

.masterpiece-cinema-title span {
    color: var(--champagne-gold, #cfa859);
}

.cards-nav-controls {
    display: flex;
    align-items: center;
    gap: 12px;
}

.cards-arrow-btn {
    width: 48px;
    height: 48px;
    border-radius: 50%;
    background: #ffffff;
    border: 1.5px solid var(--champagne-gold, #cfa859);
    color: var(--royal-burgundy, #6b1426);
    display: inline-flex;
    align-items: center;
    justify-content: center;
    font-size: 18px;
    cursor: pointer;
    box-shadow: 0 4px 14px rgba(107, 20, 38, 0.12);
    transition: all 0.25s ease;
}
.cards-arrow-btn:hover {
    background: var(--royal-burgundy, #6b1426);
    color: #ffffff;
    border-color: var(--royal-burgundy, #6b1426);
    transform: translateY(-2px);
    box-shadow: 0 8px 22px rgba(107, 20, 38, 0.35);
}

/* -------------------------------------------------------------------------
   3. True 3D Round 180° Revolving Stage & Viewport
   ------------------------------------------------------------------------- */
.cinematic-horizontal-viewport {
    position: relative;
    z-index: 10;
    width: 100%;
    height: clamp(560px, 66vh, 620px);
    overflow: hidden;
    perspective: 1600px;
    -webkit-perspective: 1600px;
    perspective-origin: 50% 50%;
    cursor: grab;
    display: flex;
    align-items: center;
    justify-content: center;
}
.cinematic-horizontal-viewport:active {
    cursor: grabbing;
}

.cinematic-horizontal-track {
    position: relative;
    width: 100%;
    height: 100%;
    transform-style: preserve-3d;
    -webkit-transform-style: preserve-3d;
}

/* -------------------------------------------------------------------------
   4. Luxury Editorial Card Item Positioned on 180° Circular Arc
   ------------------------------------------------------------------------- */
.cinematic-card-item {
    position: absolute;
    top: 50%;
    left: 50%;
    width: clamp(310px, 24vw, 360px);
    height: clamp(500px, 58vh, 540px);
    margin-left: calc(-1 * clamp(310px, 24vw, 360px) / 2);
    margin-top: calc(-1 * clamp(500px, 58vh, 540px) / 2);
    border-radius: 22px;
    transform-origin: center center;
    will-change: transform, opacity;
    user-select: none;
    transition: box-shadow 0.35s ease, border-color 0.35s ease;
}

.cinematic-card-item.is-active-center {
    cursor: default;
}
.cinematic-card-item:not(.is-active-center) {
    cursor: pointer;
}
.cinematic-card-item.is-active-center .card-3d-chassis {
    border-color: #ffd875;
    box-shadow: 0 25px 60px rgba(0, 0, 0, 0.75), 0 0 35px rgba(207, 168, 89, 0.45);
}

/* Pagination Dots for Round 180° Carousel */
.cards-carousel-dots {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
    margin-top: 24px;
    position: relative;
    z-index: 15;
}
.carousel-dot-btn {
    width: 10px;
    height: 10px;
    border-radius: 50%;
    border: 1.5px solid var(--champagne-gold, #cfa859);
    background: transparent;
    cursor: pointer;
    padding: 0;
    transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
}
.carousel-dot-btn.active {
    width: 30px;
    border-radius: 12px;
    background: var(--royal-burgundy, #6b1426);
    border-color: #ffd875;
    box-shadow: 0 0 12px rgba(207, 168, 89, 0.6);
}

/* Card 3D Chassis */
.card-3d-chassis {
    position: relative;
    width: 100%;
    height: 100%;
    border-radius: 22px;
    background: linear-gradient(155deg, rgba(32, 5, 12, 0.94) 0%, rgba(14, 2, 5, 0.98) 60%, rgba(5, 0, 2, 1) 100%);
    border: 1.5px solid rgba(207, 168, 89, 0.45);
    box-shadow: 0 20px 48px rgba(0, 0, 0, 0.5), 0 6px 20px rgba(107, 20, 38, 0.35);
    overflow: hidden;
    display: flex;
    flex-direction: column;
}

/* Card Media / Image Window */
.card-media-wrap {
    position: absolute;
    inset: 0;
    width: 100%;
    height: 100%;
    overflow: hidden;
    z-index: 1;
}

.card-parallax-img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: center;
    transition: transform 0.6s cubic-bezier(0.16, 1, 0.3, 1), filter 0.4s ease;
    filter: brightness(0.85) contrast(1.08);
}
.cinematic-card-item:hover .card-parallax-img {
    transform: scale(1.08);
    filter: brightness(0.96) contrast(1.12);
}

/* Rich Cinema Gradients */
.card-grading-overlay {
    position: absolute;
    inset: 0;
    background: linear-gradient(
        180deg, 
        rgba(10, 1, 3, 0.22) 0%, 
        transparent 35%, 
        rgba(18, 3, 7, 0.75) 65%, 
        rgba(10, 1, 3, 0.96) 100%
    );
    z-index: 2;
    pointer-events: none;
}

.card-specular-glare {
    position: absolute;
    top: 0;
    left: -120%;
    width: 80%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.18), transparent);
    transform: skewX(-25deg);
    z-index: 3;
    pointer-events: none;
    transition: left 0.8s ease;
}
.cinematic-card-item:hover .card-specular-glare {
    left: 140%;
}

/* 3D Header Badge (Clean Luxury: No Number Indicator) */
.card-3d-header {
    position: relative;
    z-index: 4;
    padding: 18px 20px 0;
    display: flex;
    justify-content: flex-start;
    align-items: center;
}

.card-tag-badge {
    background: rgba(14, 2, 5, 0.82);
    border: 1px solid var(--champagne-gold, #cfa859);
    color: #ffd875;
    font-family: 'Space Grotesk', -apple-system, sans-serif;
    font-size: 10px;
    font-weight: 800;
    letter-spacing: 1.2px;
    padding: 5px 14px;
    border-radius: 20px;
    text-transform: uppercase;
    backdrop-filter: blur(8px);
}

/* 3D Footer Content */
.card-3d-footer {
    position: relative;
    z-index: 4;
    margin-top: auto;
    padding: 20px 22px 22px;
    color: #ffffff;
}

.card-optics-meta {
    font-family: 'Courier New', monospace;
    font-size: 9.5px;
    font-weight: 700;
    color: var(--champagne-gold, #cfa859);
    letter-spacing: 1px;
    margin-bottom: 6px;
    text-transform: uppercase;
}

.card-item-title {
    font-family: 'Playfair Display', Georgia, serif;
    font-size: clamp(17px, 1.3vw, 20px);
    font-weight: 700;
    line-height: 1.25;
    color: #ffffff;
    margin-bottom: 8px;
    text-shadow: 0 2px 10px rgba(0, 0, 0, 0.9);
}

.card-item-desc {
    font-size: 12px;
    line-height: 1.55;
    color: rgba(255, 255, 255, 0.8);
    margin-bottom: 12px;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

.card-action-row {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding-top: 8px;
    border-top: 1px solid rgba(207, 168, 89, 0.22);
}

.card-location-meta {
    font-size: 11.5px;
    color: rgba(255, 255, 255, 0.88);
    display: inline-flex;
    align-items: center;
    gap: 5px;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}

/* Professional Luxury Project Story Action Button */
.card-action-wrap {
    margin-top: 14px;
    width: 100%;
}

.btn-card-project-story {
    display: flex !important;
    align-items: center !important;
    justify-content: space-between !important;
    width: 100% !important;
    padding: 12px 18px !important;
    background: linear-gradient(135deg, var(--royal-burgundy, #6b1426) 0%, #450a16 100%) !important;
    border: 1.5px solid var(--champagne-gold, #cfa859) !important;
    border-radius: 12px !important;
    color: #ffffff !important;
    font-family: var(--body, 'Poppins', sans-serif) !important;
    font-size: 12px !important;
    font-weight: 700 !important;
    letter-spacing: 0.6px !important;
    text-decoration: none !important;
    text-transform: uppercase !important;
    box-shadow: 0 8px 20px rgba(107, 20, 38, 0.35) !important;
    transition: all 0.28s cubic-bezier(0.16, 1, 0.3, 1) !important;
    position: relative !important;
    overflow: hidden !important;
}

.btn-card-project-story::before {
    content: '' !important;
    position: absolute !important;
    top: 0 !important;
    left: -100% !important;
    width: 60% !important;
    height: 100% !important;
    background: linear-gradient(90deg, transparent, rgba(255, 216, 117, 0.35), transparent) !important;
    transform: skewX(-25deg) !important;
    transition: left 0.6s ease !important;
}

.btn-card-project-story:hover::before {
    left: 140% !important;
}

.btn-card-project-story:hover {
    background: linear-gradient(135deg, #8a1a32 0%, var(--royal-burgundy, #6b1426) 100%) !important;
    border-color: #ffd875 !important;
    color: #ffffff !important;
    transform: translateY(-2px) !important;
    box-shadow: 0 12px 28px rgba(107, 20, 38, 0.55), 0 0 16px rgba(207, 168, 89, 0.4) !important;
}

.btn-story-text {
    font-size: 11.5px;
    letter-spacing: 0.8px;
    font-weight: 700;
}

.btn-story-arrow {
    width: 26px !important;
    height: 26px !important;
    border-radius: 50% !important;
    background: rgba(207, 168, 89, 0.2) !important;
    display: inline-flex !important;
    align-items: center !important;
    justify-content: center !important;
    color: #ffd875 !important;
    font-size: 14px !important;
    transition: transform 0.25s ease, background 0.25s ease !important;
}

.btn-card-project-story:hover .btn-story-arrow {
    transform: translateX(4px) !important;
    background: var(--champagne-gold, #cfa859) !important;
    color: var(--royal-burgundy, #6b1426) !important;
}

/* Responsive adjustments */
@media (max-width: 991px) {
    .cinematic-cards-section {
        padding: 70px 0 75px;
    }
    .cinematic-card-item {
        flex: 0 0 290px;
        width: 290px;
        height: 470px;
    }
}
@media (max-width: 576px) {
    .cinematic-cards-section {
        padding: 55px 0 60px;
    }
    .cinematic-card-item {
        flex: 0 0 84vw;
        width: 84vw;
        height: 490px;
    }
}
</style>

<!-- =======================================================================
     HTML Structure: Ultra-Premium Multi-Card 180° Curved Panoramic Showcase
     ======================================================================= -->
<section class="cinematic-cards-section" id="cinematicCardsSection" aria-label="WoW Studio Masterpiece Portfolio Showcase">
    <!-- Ambient Atmospheric Glows -->
    <div class="cards-ambient-bg">
        <div class="cards-ambient-glow-1"></div>
        <div class="cards-ambient-glow-2"></div>
    </div>

    <!-- Header with Title & Left/Right Arrows -->
    <div class="cards-section-header">
        <div class="cards-header-copy">
            <div class="cards-eyebrow">
                <i class="bi bi-camera-reels-fill text-warning"></i>
                <span>SIGNATURE SHOWCASE</span>
            </div>
            <h2 class="masterpiece-cinema-title">
                The Masterpiece <span>Portfolio.</span>
            </h2>
        </div>

        <!-- Next / Prev Arrow Controls -->
        <div class="cards-nav-controls">
            <button class="cards-arrow-btn" id="cardsPrevBtn" aria-label="Previous Projects" title="Rotate Previous (180° Arc)">
                <i class="bi bi-chevron-left"></i>
            </button>
            <button class="cards-arrow-btn" id="cardsNextBtn" aria-label="Next Projects" title="Rotate Next (180° Arc)">
                <i class="bi bi-chevron-right"></i>
            </button>
        </div>
    </div>

    <!-- True 3D 180° Round Revolving Carousel Stage -->
    <div class="cinematic-horizontal-viewport" id="cardsViewport">
        <div class="cinematic-horizontal-track" id="cardsTrack">
            <?php foreach ($cinematicCards as $idx => $card): ?>
                <div class="cinematic-card-item" data-card-idx="<?= $idx ?>">
                    <div class="card-3d-chassis">
                        <div class="card-media-wrap">
                            <img src="<?= $appBasePath ?>/<?= $card['image'] ?>" 
                                 alt="<?= htmlspecialchars($card['title']) ?>" 
                                 class="card-parallax-img"
                                 loading="lazy">
                            <div class="card-grading-overlay"></div>
                            <div class="card-specular-glare"></div>
                        </div>

                        <!-- 3D Header: Clean Luxury Tag Badge (No Numbers) -->
                        <div class="card-3d-header">
                            <span class="card-tag-badge"><?= htmlspecialchars($card['tag']) ?></span>
                        </div>

                        <div class="card-3d-footer">
                            <div class="card-optics-meta">
                                <span><?= htmlspecialchars($card['optics']) ?></span>
                            </div>
                            <h3 class="card-item-title"><?= htmlspecialchars($card['title']) ?></h3>
                            <p class="card-item-desc"><?= htmlspecialchars($card['desc']) ?></p>
                            
                            <div class="card-action-row">
                                <span class="card-location-meta">
                                    <i class="bi bi-geo-alt-fill text-warning"></i> <?= htmlspecialchars($card['location']) ?>
                                </span>
                            </div>

                            <div class="card-action-wrap">
                                <a href="<?= $appBasePath ?>/project-detail?id=<?= $card['id'] ?>" class="btn-card-project-story">
                                    <span class="btn-story-text">View Project Story &bull; 4K Film</span>
                                    <span class="btn-story-arrow"><i class="bi bi-arrow-right"></i></span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- 180° Round Carousel Pagination Dots -->
    <div class="cards-carousel-dots" id="carouselDots">
        <?php foreach ($cinematicCards as $idx => $card): ?>
            <button class="carousel-dot-btn <?= $idx === 0 ? 'active' : '' ?>" data-index="<?= $idx ?>" aria-label="Project <?= $idx + 1 ?>"></button>
        <?php endforeach; ?>
    </div>
</section>

<!-- =======================================================================
     Engine Script: True 3D Round 180° Revolving Carousel Arc
     ======================================================================= -->
<script>
(function() {
    'use strict';

    function initRound180Showcase() {
        const viewport = document.getElementById('cardsViewport');
        const track = document.getElementById('cardsTrack');
        const prevBtn = document.getElementById('cardsPrevBtn');
        const nextBtn = document.getElementById('cardsNextBtn');
        const dots = document.querySelectorAll('.carousel-dot-btn');

        if (!viewport || !track) return;
        const cards = Array.from(track.querySelectorAll('.cinematic-card-item'));
        const totalCards = cards.length;
        if (totalCards === 0) return;

        let currentAngle = 0;
        let targetAngle = 0;
        let isDragging = false;
        let startX = 0;
        let prevAngle = 0;
        let isHovered = false;
        let animationFrameId = null;
        let isSectionVisible = true;

        const anglePerCard = 360 / totalCards; // 45 degrees per card

        function updateCards3D() {
            if (!isSectionVisible) {
                animationFrameId = null;
                return;
            }
            const stageWidth = viewport.clientWidth;
            // Radius dynamically scales with viewport width so arc fits beautifully:
            // Desktop: 680px - 760px; Tablet: 520px; Mobile: 360px
            const radius = Math.max(340, Math.min(stageWidth * 0.62, 760));

            // Smooth physical interpolation
            currentAngle += (targetAngle - currentAngle) * 0.12;

            // Calculate active index (card closest to center front: angle = 0)
            let normalizedRotation = (-currentAngle) % 360;
            if (normalizedRotation < 0) normalizedRotation += 360;
            const activeIndex = Math.round(normalizedRotation / anglePerCard) % totalCards;

            // Update pagination dots
            dots.forEach((dot, idx) => {
                dot.classList.toggle('active', idx === activeIndex);
            });

            cards.forEach((card, i) => {
                // Angle of this specific card relative to the center front
                let cardAngle = (i * anglePerCard + currentAngle) % 360;
                if (cardAngle > 180) cardAngle -= 360;
                if (cardAngle < -180) cardAngle += 360;

                const absAngle = Math.abs(cardAngle);

                // Render cards within the visible 180-degree front round arc (±105°)
                if (absAngle <= 105) {
                    const rad = (cardAngle * Math.PI) / 180;
                    // Circular geometry in 3D:
                    const x = Math.sin(rad) * radius;
                    const z = (Math.cos(rad) - 1) * radius; // Front card z=0, sides curve back into distance

                    // Natural inward curvature along the round 180° arc towards viewer:
                    const rotY = cardAngle * 0.72;
                    const norm = absAngle / 90; // 0 at center, 1 at 90 deg
                    const scale = Math.max(0.78, 1.05 - (norm * 0.24));
                    const opacity = Math.max(0, 1 - (norm * 0.82));
                    const zIndex = Math.round(100 - absAngle);

                    card.style.display = 'block';
                    card.style.transform = `translate3d(${x.toFixed(1)}px, 0px, ${z.toFixed(1)}px) rotateY(${rotY.toFixed(1)}deg) scale(${scale.toFixed(3)})`;
                    card.style.opacity = opacity.toFixed(3);
                    card.style.zIndex = zIndex;

                    if (absAngle < 22) {
                        card.classList.add('is-active-center');
                        card.style.pointerEvents = 'auto';
                    } else {
                        card.classList.remove('is-active-center');
                        card.style.pointerEvents = absAngle < 85 ? 'auto' : 'none';
                    }
                } else {
                    // Back hemisphere (invisible)
                    card.style.display = 'none';
                    card.style.opacity = '0';
                    card.style.pointerEvents = 'none';
                    card.classList.remove('is-active-center');
                }
            });

            animationFrameId = requestAnimationFrame(updateCards3D);
        }

        function rotateNext() {
            targetAngle -= anglePerCard;
        }

        function rotatePrev() {
            targetAngle += anglePerCard;
        }

        if (nextBtn) nextBtn.addEventListener('click', (e) => { e.preventDefault(); rotateNext(); });
        if (prevBtn) prevBtn.addEventListener('click', (e) => { e.preventDefault(); rotatePrev(); });

        // Dot navigation
        dots.forEach(dot => {
            dot.addEventListener('click', function() {
                const targetIdx = parseInt(this.getAttribute('data-index'), 10);
                let normalizedRotation = (-targetAngle) % 360;
                if (normalizedRotation < 0) normalizedRotation += 360;
                const activeIndex = Math.round(normalizedRotation / anglePerCard) % totalCards;
                let diff = targetIdx - activeIndex;
                if (diff > totalCards / 2) diff -= totalCards;
                if (diff < -totalCards / 2) diff += totalCards;
                targetAngle -= diff * anglePerCard;
            });
        });

        // Click side card to swing it to the front
        cards.forEach((card, idx) => {
            card.addEventListener('click', function(e) {
                // If user clicked the button or a link inside, let it navigate
                if (e.target.closest('a') || e.target.closest('button')) {
                    return;
                }
                if (!card.classList.contains('is-active-center')) {
                    e.preventDefault();
                    let cardAngle = (idx * anglePerCard + targetAngle) % 360;
                    if (cardAngle > 180) cardAngle -= 360;
                    if (cardAngle < -180) cardAngle += 360;
                    targetAngle -= cardAngle;
                }
            });
        });

        // Mouse Drag / Touch Swipe for interactive 3D rotation
        viewport.addEventListener('mouseenter', () => { isHovered = true; });
        viewport.addEventListener('mouseleave', () => { isHovered = false; });

        viewport.addEventListener('mousedown', (e) => {
            isDragging = true;
            startX = e.pageX;
            prevAngle = targetAngle;
        });

        window.addEventListener('mousemove', (e) => {
            if (!isDragging) return;
            const diffX = e.pageX - startX;
            targetAngle = prevAngle + (diffX * 0.22);
        });

        window.addEventListener('mouseup', () => {
            if (!isDragging) return;
            isDragging = false;
            // Snap cleanly to nearest card angle
            targetAngle = Math.round(targetAngle / anglePerCard) * anglePerCard;
        });

        // Touch support for mobile devices
        viewport.addEventListener('touchstart', (e) => {
            isDragging = true;
            startX = e.touches[0].pageX;
            prevAngle = targetAngle;
        }, { passive: true });

        viewport.addEventListener('touchmove', (e) => {
            if (!isDragging) return;
            const diffX = e.touches[0].pageX - startX;
            targetAngle = prevAngle + (diffX * 0.25);
        }, { passive: true });

        viewport.addEventListener('touchend', () => {
            isDragging = false;
            targetAngle = Math.round(targetAngle / anglePerCard) * anglePerCard;
        });

        // Gentle auto-rotation every 4.8 seconds when idle
        setInterval(() => {
            if (!isHovered && !isDragging) {
                targetAngle -= anglePerCard;
            }
        }, 4800);

        // Performance: Pause 3D animation loop when section is scrolled out of viewport
        if ('IntersectionObserver' in window && viewport) {
            const cardsVisibilityObserver = new IntersectionObserver(function(entries) {
                entries.forEach(function(entry) {
                    isSectionVisible = entry.isIntersecting;
                    if (isSectionVisible && !animationFrameId) {
                        animationFrameId = requestAnimationFrame(updateCards3D);
                    }
                });
            }, { threshold: 0.05 });
            cardsVisibilityObserver.observe(viewport);
        }

        // Start 3D round loop
        updateCards3D();
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initRound180Showcase);
    } else {
        initRound180Showcase();
    }
})();
</script>
