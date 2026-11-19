<?php
/**
 * ============================================================================
 * WoW STUDIO — CELEBRATION COVERAGE (ULTRA-PREMIUM CINEMATIC GALLERY)
 * Architecture: GSAP 3.12 + ScrollTrigger Multi-Speed Parallax & Asymmetrical Flow
 * Design: High-Fashion Editorial Masonry Composition, 3D Gyroscopic Hover,
 *         Curtain Mask Reveals, Anamorphic Glare & Cinematic Typography.
 * Theme: Royal Burgundy (#6b1426) & Champagne Gold (#cfa859)
 * File: front/view/home/html/celebration_coverage.php
 * ============================================================================
 */
$appBasePath = $appBasePath ?? '';
$events = $events ?? [];

$eventPhotos = [
    1 => 'uploads/photo store/8.jpeg',
    2 => 'uploads/photo store/9.jpeg',
    3 => 'uploads/photo store/11.jpeg',
    4 => 'uploads/photo store/15.jpeg',
];

$eventTags = [
    1 => 'RITUALS & CANDID JOY',
    2 => 'SANGEET & MIDNIGHT BEATS',
    3 => 'SACRED PHERAS & VOWS',
    4 => 'IMPERIAL DESTINATION GALA',
];
?>

<style>
/* -------------------------------------------------------------------------
   1. Celebration Coverage Section Architecture
   ------------------------------------------------------------------------- */
.coverage-cinema-section {
    position: relative;
    width: 100%;
    background: #100206;
    background: radial-gradient(circle at 50% 25%, #24040c 0%, #100206 65%, #070103 100%);
    color: #ffffff;
    padding: clamp(75px, 9vh, 130px) 0;
    overflow: hidden;
    border-top: 1px solid rgba(207, 168, 89, 0.35);
    border-bottom: 1px solid rgba(207, 168, 89, 0.35);
    perspective: 1800px;
}

/* Atmospheric Ambient Lights */
.coverage-ambient-glow {
    position: absolute;
    width: 700px;
    height: 700px;
    border-radius: 50%;
    filter: blur(110px);
    pointer-events: none;
    z-index: 1;
    opacity: 0.5;
}
.coverage-glow-1 {
    top: 5%;
    right: -150px;
    background: radial-gradient(circle, rgba(107, 20, 38, 0.45) 0%, transparent 70%);
}
.coverage-glow-2 {
    bottom: 0;
    left: -150px;
    background: radial-gradient(circle, rgba(207, 168, 89, 0.22) 0%, rgba(107, 20, 38, 0.25) 50%, transparent 70%);
}

/* -------------------------------------------------------------------------
   2. Cinematic Section Header & Split Typography
   ------------------------------------------------------------------------- */
.coverage-header-wrap {
    position: relative;
    z-index: 15;
    margin-bottom: clamp(45px, 6vh, 70px);
}

.coverage-eyebrow {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    background: rgba(20, 3, 7, 0.78);
    backdrop-filter: blur(12px);
    -webkit-backdrop-filter: blur(12px);
    border: 1px solid rgba(207, 168, 89, 0.45);
    padding: 6px 20px;
    border-radius: 30px;
    margin-bottom: 20px;
    box-shadow: 0 8px 24px rgba(0, 0, 0, 0.4);
    will-change: transform, opacity;
}
.coverage-eyebrow-beacon {
    width: 8px;
    height: 8px;
    border-radius: 50%;
    background: var(--champagne-gold, #cfa859);
    box-shadow: 0 0 10px #ffd875;
    animation: beaconPulse 2s infinite ease-in-out;
}
.coverage-eyebrow-text {
    font-family: 'Space Grotesk', -apple-system, sans-serif;
    font-size: 11px;
    font-weight: 800;
    letter-spacing: 2.2px;
    color: #ffffff;
    text-transform: uppercase;
}

.coverage-cinema-title {
    font-family: 'Playfair Display', Georgia, serif;
    font-size: clamp(26px, 2.8vw, 38px);
    line-height: 1.22;
    font-weight: 800;
    color: #ffffff;
    letter-spacing: -0.4px;
    margin-bottom: 14px;
}
.coverage-split-word {
    display: inline-block;
    will-change: transform, opacity, filter;
}

.highlight-gold {
    color: #ffd875;
    background: linear-gradient(135deg, #ffe4a0 0%, #cfa859 50%, #ffd875 80%, #b58838 100%);
    background-clip: text;
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    filter: drop-shadow(0 2px 14px rgba(207, 168, 89, 0.4));
}
.highlight-burgundy {
    color: #ffc0cb;
    background: linear-gradient(135deg, #ffffff 0%, #ffc0cb 50%, #e06c84 100%);
    background-clip: text;
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
}

.coverage-lead-subtitle {
    font-size: clamp(15px, 1.1vw, 17.5px);
    line-height: 1.7;
    color: rgba(255, 255, 255, 0.82);
    max-width: 620px;
    margin: 0;
}

.btn-coverage-all {
    background: rgba(20, 3, 7, 0.85);
    backdrop-filter: blur(12px);
    -webkit-backdrop-filter: blur(12px);
    border: 1.5px solid var(--champagne-gold, #cfa859);
    color: #ffffff !important;
    font-family: 'Space Grotesk', -apple-system, sans-serif;
    font-size: 13px;
    font-weight: 700;
    letter-spacing: 0.8px;
    padding: 12px 28px;
    border-radius: 30px;
    text-decoration: none;
    transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
    box-shadow: 0 8px 24px rgba(0, 0, 0, 0.5);
    display: inline-flex;
    align-items: center;
    gap: 8px;
}
.btn-coverage-all:hover {
    background: linear-gradient(135deg, var(--royal-burgundy, #6b1426) 0%, #4a0d1a 100%);
    border-color: #ffd875;
    transform: translateY(-2px);
    box-shadow: 0 12px 30px rgba(107, 20, 38, 0.6);
    color: #ffffff;
}

/* -------------------------------------------------------------------------
   3. Editorial Asymmetrical Masonry Portfolio Grid
   ------------------------------------------------------------------------- */
.coverage-gallery-grid {
    position: relative;
    z-index: 10;
    transform-style: preserve-3d;
    -webkit-transform-style: preserve-3d;
}

/* Individual Parallax Columns (Multi-Speed Vertical Differential) */
.coverage-parallax-col {
    will-change: transform;
}

/* -------------------------------------------------------------------------
   4. Luxury 3D Gallery Card Architecture
   ------------------------------------------------------------------------- */
.coverage-cinema-card {
    position: relative;
    width: 100%;
    border-radius: 24px;
    background: #080103;
    border: 1.5px solid rgba(207, 168, 89, 0.4);
    box-shadow: 
        0 25px 65px rgba(0, 0, 0, 0.75),
        0 8px 25px rgba(107, 20, 38, 0.35),
        inset 0 1px 0 rgba(255, 255, 255, 0.25);
    overflow: hidden;
    transform-style: preserve-3d;
    -webkit-transform-style: preserve-3d;
    transition: border-color 0.4s ease, box-shadow 0.4s ease;
    cursor: pointer;
    will-change: transform, opacity;
    margin-bottom: 30px;
}

/* Asymmetrical Height Ratios */
.card-height-tall {
    height: clamp(480px, 58vh, 560px);
}
.card-height-medium {
    height: clamp(400px, 48vh, 470px);
}

.coverage-cinema-card:hover {
    border-color: rgba(255, 216, 117, 0.9);
    box-shadow: 
        0 35px 90px rgba(0, 0, 0, 0.85),
        0 14px 40px rgba(107, 20, 38, 0.6),
        0 0 25px rgba(207, 168, 89, 0.35),
        inset 0 1px 0 rgba(255, 255, 255, 0.5);
}

/* Internal Photo Curtain Window */
.coverage-card-curtain {
    position: absolute;
    inset: 0;
    overflow: hidden;
    border-radius: 22px;
    z-index: 1;
}

.coverage-card-img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: center 25%;
    position: absolute;
    inset: 0;
    filter: brightness(0.90) contrast(1.08) saturate(1.12);
    transform: scale(1.0);
    transition: transform 0.8s cubic-bezier(0.25, 1, 0.5, 1), filter 0.6s ease;
    will-change: transform;
}
.coverage-cinema-card:hover .coverage-card-img {
    transform: scale(1.08);
    filter: brightness(1.02) contrast(1.14) saturate(1.2);
}

/* Luxury Multi-Gradient Vignette Overlay */
.coverage-card-overlay {
    position: absolute;
    inset: 0;
    z-index: 2;
    background: 
        radial-gradient(circle at 50% 20%, transparent 20%, rgba(10, 1, 3, 0.4) 60%, rgba(5, 0, 2, 0.95) 100%),
        linear-gradient(180deg, rgba(8, 1, 3, 0.45) 0%, transparent 35%, rgba(18, 3, 7, 0.85) 75%, rgba(6, 0, 2, 0.98) 100%);
    pointer-events: none;
    transition: opacity 0.4s ease;
}
.coverage-cinema-card:hover .coverage-card-overlay {
    opacity: 0.92;
}

/* Diagonal Specular Reflection Sheen */
.coverage-card-specular {
    position: absolute;
    top: -50%;
    left: -50%;
    width: 200%;
    height: 200%;
    background: linear-gradient(135deg, transparent 42%, rgba(255, 255, 255, 0.12) 48%, rgba(255, 216, 117, 0.18) 50%, transparent 56%);
    transform: rotate(28deg);
    pointer-events: none;
    z-index: 3;
    opacity: 0.45;
    transition: transform 0.7s ease, opacity 0.7s ease;
}
.coverage-cinema-card:hover .coverage-card-specular {
    opacity: 0.85;
    transform: rotate(28deg) translateY(20%);
}

/* -------------------------------------------------------------------------
   5. Card 3D Content Layers (translateZ Depth)
   ------------------------------------------------------------------------- */
/* Card Top Header */
.coverage-card-header {
    position: absolute;
    top: 18px;
    left: 18px;
    right: 18px;
    z-index: 10;
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 6px;
    flex-wrap: nowrap;
    transform: translateZ(35px);
    -webkit-transform: translateZ(35px);
}

.coverage-tag-pill {
    background: rgba(107, 20, 38, 0.82);
    backdrop-filter: blur(10px);
    -webkit-backdrop-filter: blur(10px);
    border: 1px solid rgba(207, 168, 89, 0.6);
    color: #ffffff;
    font-family: 'Space Grotesk', -apple-system, sans-serif;
    font-size: 8.5px;
    font-weight: 800;
    letter-spacing: 0.8px;
    padding: 4px 9px;
    border-radius: 20px;
    text-transform: uppercase;
    box-shadow: 0 4px 14px rgba(0, 0, 0, 0.5);
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
    min-width: 0;
    max-width: 56%;
}

.coverage-time-pill {
    background: rgba(14, 2, 5, 0.85);
    backdrop-filter: blur(10px);
    border: 1px solid rgba(207, 168, 89, 0.4);
    color: var(--champagne-gold, #cfa859);
    font-family: 'Space Grotesk', -apple-system, sans-serif;
    font-size: 9px;
    font-weight: 700;
    padding: 4px 9px;
    border-radius: 20px;
    display: flex;
    align-items: center;
    gap: 4px;
    white-space: nowrap;
    flex-shrink: 0;
}

/* Card Bottom Footer */
.coverage-card-footer {
    position: absolute;
    bottom: 18px;
    left: 18px;
    right: 18px;
    z-index: 10;
    transform: translateZ(45px);
    -webkit-transform: translateZ(45px);
}

.coverage-card-title {
    font-family: 'Playfair Display', Georgia, serif;
    font-size: clamp(17px, 1.35vw, 20px);
    font-weight: 700;
    line-height: 1.28;
    color: #ffffff;
    margin-bottom: 6px;
    text-shadow: 0 2px 10px rgba(0, 0, 0, 0.95);
    transition: color 0.3s ease;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}
.coverage-cinema-card:hover .coverage-card-title {
    color: #ffd875;
}

.coverage-card-desc {
    font-size: 12px;
    line-height: 1.5;
    color: rgba(255, 255, 255, 0.82);
    margin-bottom: 12px;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

.coverage-meta-row {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding-top: 10px;
    border-top: 1px solid rgba(207, 168, 89, 0.3);
    gap: 8px;
    flex-wrap: nowrap;
    min-width: 0;
}

.coverage-venue-text {
    font-size: 10.5px;
    color: rgba(255, 255, 255, 0.72);
    display: flex;
    align-items: center;
    gap: 5px;
    min-width: 0;
    flex: 1 1 auto;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}
.coverage-venue-text span {
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}

.btn-view-gallery-pill {
    background: linear-gradient(135deg, var(--royal-burgundy, #6b1426) 0%, #4a0d1a 100%);
    border: 1px solid var(--champagne-gold, #cfa859);
    color: #ffffff !important;
    font-family: 'Space Grotesk', -apple-system, sans-serif;
    font-size: 10px;
    font-weight: 800;
    letter-spacing: 0.5px;
    padding: 5px 12px;
    border-radius: 30px;
    text-decoration: none;
    transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
    box-shadow: 0 4px 14px rgba(107, 20, 38, 0.5);
    display: inline-flex;
    align-items: center;
    gap: 5px;
    white-space: nowrap !important;
    flex-shrink: 0 !important;
}
.coverage-cinema-card:hover .btn-view-gallery-pill {
    background: linear-gradient(135deg, #8a1a32 0%, var(--royal-burgundy, #6b1426) 100%);
    border-color: #ffd875;
    transform: translateY(-2px);
    box-shadow: 0 8px 20px rgba(107, 20, 38, 0.7);
    color: #ffffff;
}
</style>

<!-- =======================================================================
     HTML Structure: Celebration Coverage Cinematic Gallery Section
     ======================================================================= -->
<section class="coverage-cinema-section" id="celebrationCoverageSection" aria-label="Celebration Coverage Experiences">
    <!-- Atmospheric Ambient Glows -->
    <div class="coverage-ambient-glow coverage-glow-1"></div>
    <div class="coverage-ambient-glow coverage-glow-2"></div>

    <div class="container position-relative" style="z-index: 10;">
        <!-- 1. Cinematic Section Header -->
        <div class="coverage-header-wrap">
            <div class="d-flex justify-content-between align-items-end flex-wrap gap-4">
                <div>
                    <!-- Eyebrow Badge -->
                    <div class="coverage-eyebrow" id="coverageEyebrow">
                        <span class="coverage-eyebrow-beacon"></span>
                        <span class="coverage-eyebrow-text">CELEBRATION COVERAGE</span>
                    </div>

                    <!-- Split Kinetic Title -->
                    <h2 class="coverage-cinema-title" id="coverageTitle">
                        <span class="coverage-split-word">Signature</span>
                        <span class="coverage-split-word highlight-gold">Shoot</span>
                        <span class="coverage-split-word fst-italic highlight-burgundy">Experiences.</span>
                    </h2>

                    <!-- Narrative Subtitle -->
                    <p class="coverage-lead-subtitle" id="coverageSubtitle">
                        From sacred pre-dawn rituals to grand midnight galas &mdash; an editorial journey through authentic wedding celebrations.
                    </p>
                </div>

                <div id="coverageHeaderCta">
                    <a href="<?= $appBasePath ?>/events" class="btn-coverage-all">
                        <span>View Detailed Experiences</span>
                        <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>

        <!-- 2. Asymmetrical Multi-Speed Parallax Gallery Grid -->
        <div class="row g-4 coverage-gallery-grid" id="coverageGalleryGrid">
            <?php 
            foreach ($events as $idx => $ev): 
                $evImg = $eventPhotos[$ev['order_num']] ?? 'uploads/photo store/11.jpeg';
                $evTag = $eventTags[$ev['order_num']] ?? 'SIGNATURE SHOOT';
                
                // Asymmetrical height class: odd cards tall, even cards medium
                $heightClass = ($idx % 2 === 0) ? 'card-height-tall' : 'card-height-medium';
                // Parallax depth speed indicator: alternating vertical offset
                $colParallax = ($idx % 2 === 0) ? 'col-parallax-slow' : 'col-parallax-fast';
            ?>
                <div class="col-lg-3 col-md-6 coverage-parallax-col <?= $colParallax ?>">
                    <div class="coverage-cinema-card <?= $heightClass ?>" data-card-idx="<?= $idx ?>">
                        <!-- Photo Frame Curtain -->
                        <div class="coverage-card-curtain">
                            <img src="<?= $appBasePath ?>/<?= $evImg ?>" 
                                 alt="<?= htmlspecialchars($ev['title']) ?>" 
                                 class="coverage-card-img"
                                 loading="lazy">
                            <div class="coverage-card-overlay"></div>
                            <div class="coverage-card-specular"></div>
                        </div>

                        <!-- 3D Header -->
                        <div class="coverage-card-header">
                            <span class="coverage-tag-pill"><?= htmlspecialchars($evTag) ?></span>
                            <?php if (!empty($ev['start_time'])): ?>
                                <span class="coverage-time-pill">
                                    <i class="bi bi-clock-fill text-warning"></i>
                                    <span><?= htmlspecialchars($ev['start_time']) ?></span>
                                </span>
                            <?php endif; ?>
                        </div>

                        <!-- 3D Footer -->
                        <div class="coverage-card-footer">
                            <h4 class="coverage-card-title"><?= htmlspecialchars($ev['title']) ?></h4>
                            
                            <?php if (!empty($ev['description'])): ?>
                                <p class="coverage-card-desc"><?= htmlspecialchars($ev['description']) ?></p>
                            <?php endif; ?>

                            <div class="coverage-meta-row">
                                <span class="coverage-venue-text">
                                    <i class="bi bi-geo-alt-fill text-danger"></i>
                                    <span><?= htmlspecialchars($ev['venue'] ?? 'WoW Studio Venue') ?></span>
                                </span>
                                <a href="<?= $appBasePath ?>/events" class="btn-view-gallery-pill">
                                    <span>Explore</span>
                                    <i class="bi bi-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- =======================================================================
     Engine Script: GSAP ScrollTrigger Multi-Speed Parallax & Gyroscopic 3D
     ======================================================================= -->
<script>
(function() {
    'use strict';

    function initCoverageCinema() {
        if (typeof gsap === 'undefined' || typeof ScrollTrigger === 'undefined') {
            setTimeout(initCoverageCinema, 100);
            return;
        }

        gsap.registerPlugin(ScrollTrigger);

        const section = document.getElementById('celebrationCoverageSection');
        if (!section) return;

        // Elements
        const eyebrow = document.getElementById('coverageEyebrow');
        const titleWords = document.querySelectorAll('#coverageTitle .coverage-split-word');
        const subtitle = document.getElementById('coverageSubtitle');
        const headerCta = document.getElementById('coverageHeaderCta');
        const cards = gsap.utils.toArray('.coverage-cinema-card');
        const slowCols = gsap.utils.toArray('.col-parallax-slow');
        const fastCols = gsap.utils.toArray('.col-parallax-fast');

        // Synchronize with Lenis if active
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
        if (subtitle) {
            gsap.set(subtitle, { opacity: 0, y: 30, filter: 'blur(5px)' });
        }
        if (headerCta) {
            gsap.set(headerCta, { opacity: 0, y: 20 });
        }

        // Cards initial 3D staggered entrance state
        cards.forEach((card, i) => {
            // Alternating entrance direction: odd from left/tilt, even from right/tilt
            const xOffset = (i % 2 === 0) ? -35 : 35;
            const yOffset = 50 + (i * 15);
            gsap.set(card, {
                opacity: 0,
                x: xOffset,
                y: yOffset,
                scale: 0.94,
                rotateY: (i % 2 === 0) ? -6 : 6,
                filter: 'blur(8px)'
            });
        });

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
                duration: 0.7,
                ease: 'power3.out'
            }, 0);
        }
        if (titleWords && titleWords.length > 0) {
            enterTl.to(titleWords, {
                opacity: 1,
                y: 0,
                rotateX: 0,
                filter: 'blur(0px)',
                duration: 0.9,
                stagger: 0.1,
                ease: 'power4.out'
            }, 0.12);
        }
        if (subtitle) {
            enterTl.to(subtitle, {
                opacity: 1,
                y: 0,
                filter: 'blur(0px)',
                duration: 0.8,
                ease: 'power3.out'
            }, 0.35);
        }
        if (headerCta) {
            enterTl.to(headerCta, {
                opacity: 1,
                y: 0,
                duration: 0.7,
                ease: 'power2.out'
            }, 0.45);
        }

        // Cards Staggered 3D Reveal
        cards.forEach((card, i) => {
            enterTl.to(card, {
                opacity: 1,
                x: 0,
                y: 0,
                scale: 1,
                rotateY: 0,
                filter: 'blur(0px)',
                duration: 1.1,
                ease: 'power3.out'
            }, 0.3 + (i * 0.12));
        });

        // ---------------------------------------------------------------------
        // 3. Multi-Speed Scroll Parallax
        // ---------------------------------------------------------------------
        const scrubTl = gsap.timeline({
            scrollTrigger: {
                trigger: section,
                start: 'top bottom',
                end: 'bottom top',
                scrub: 1.2
            }
        });

        // Slow columns move with subtle parallax
        if (slowCols.length > 0) {
            scrubTl.to(slowCols, {
                y: -30,
                ease: 'none'
            }, 0);
        }
        // Fast columns glide with deeper parallax for physical depth
        if (fastCols.length > 0) {
            scrubTl.to(fastCols, {
                y: -60,
                ease: 'none'
            }, 0);
        }

        // ---------------------------------------------------------------------
        // 4. Interactive Gyroscopic 3D Cursor Hover
        // ---------------------------------------------------------------------
        cards.forEach((card) => {
            const specular = card.querySelector('.coverage-card-specular');
            const img = card.querySelector('.coverage-card-img');
            let isHovered = false;

            card.addEventListener('mouseenter', () => { isHovered = true; });

            card.addEventListener('mousemove', (e) => {
                if (!isHovered) return;
                const rect = card.getBoundingClientRect();
                const mouseX = e.clientX - rect.left;
                const mouseY = e.clientY - rect.top;
                const xPct = (mouseX / rect.width - 0.5) * 2;
                const yPct = (mouseY / rect.height - 0.5) * 2;

                gsap.to(card, {
                    duration: 0.35,
                    rotateY: xPct * 10,
                    rotateX: -yPct * 10,
                    scale: 1.02,
                    ease: 'power2.out'
                });

                if (specular) {
                    gsap.to(specular, {
                        duration: 0.35,
                        xPercent: xPct * 20,
                        yPercent: yPct * 20,
                        opacity: 0.8,
                        ease: 'power2.out'
                    });
                }
            });

            card.addEventListener('mouseleave', () => {
                isHovered = false;
                gsap.to(card, {
                    duration: 0.6,
                    rotateY: 0,
                    rotateX: 0,
                    scale: 1,
                    ease: 'power2.out'
                });

                if (specular) {
                    gsap.to(specular, {
                        duration: 0.6,
                        xPercent: 0,
                        yPercent: 0,
                        opacity: 0.45,
                        ease: 'power2.out'
                    });
                }
            });
        });

        ScrollTrigger.refresh();
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initCoverageCinema);
    } else {
        initCoverageCinema();
    }

    window.addEventListener('load', function() {
        if (typeof ScrollTrigger !== 'undefined') {
            ScrollTrigger.refresh();
        }
    });
})();
</script>
