<?php
/**
 * ============================================================================
 * WoW STUDIO — BESPOKE PRODUCTION (ULTRA-PREMIUM CINEMATIC SHOWCASE)
 * Architecture: GSAP 3.12 + ScrollTrigger Multi-Plane Choreography
 * Design: High-End Film Studio Production Aesthetics, Blur-to-Sharp Kinetic
 *         Typography, 3D Floating Production Slates, Parallax Imagery & Specular Sheen.
 * Theme: Royal Burgundy (#6b1426) & Champagne Gold (#cfa859)
 * File: front/view/home/html/bespoke_production.php
 * ============================================================================
 */
$appBasePath = $appBasePath ?? '';
$services = $services ?? [];

$serviceMedia = [
    0 => [
        'img'      => 'uploads/photo store/4.jpeg',
        'code'     => 'PROD.01 // CANDID FINE-ART',
        'specs'    => '50MM F/1.2 &bull; CHIAROSCURO LIGHT',
        'badge'    => 'SIGNATURE CRAFT'
    ],
    1 => [
        'img'      => 'uploads/photo store/18.jpeg',
        'code'     => 'PROD.02 // 4K CINEMA MASTER',
        'specs'    => 'ARRI LOG-C &bull; 24 FPS PRORES',
        'badge'    => 'DIRECTOR CUT'
    ],
    2 => [
        'img'      => 'uploads/photo store/10.jpeg',
        'code'     => 'PROD.03 // DESTINATION PRE-WEDDING',
        'specs'    => '35MM F/1.4 &bull; SUNSET ANAMORPHIC',
        'badge'    => 'EDITORIAL'
    ],
    3 => [
        'img'      => 'uploads/photo store/15.jpeg',
        'code'     => 'PROD.04 // FPV AERIAL CINEMA',
        'specs'    => '60 FPS 4K &bull; PALACE FLYTHROUGH',
        'badge'    => 'HIGH-ALTITUDE'
    ],
];
?>

<style>
/* -------------------------------------------------------------------------
   1. Bespoke Production Section Viewport Architecture
   ------------------------------------------------------------------------- */
.bespoke-cinema-section {
    position: relative;
    width: 100%;
    background: #3d0814;
    background: radial-gradient(circle at 50% 22%, #631123 0%, #3d0814 60%, #24040b 100%);
    color: #ffffff;
    padding: clamp(75px, 9vh, 125px) 0;
    overflow: hidden;
    border-top: 1px solid rgba(207, 168, 89, 0.35);
    border-bottom: 1px solid rgba(207, 168, 89, 0.35);
    perspective: 1800px;
    -webkit-perspective: 1800px;
}

/* Atmospheric Ambient Lights */
.bespoke-ambient-glow {
    position: absolute;
    width: 700px;
    height: 700px;
    border-radius: 50%;
    filter: blur(100px);
    pointer-events: none;
    z-index: 1;
    opacity: 0.5;
}
.bespoke-glow-1 {
    top: 5%;
    left: -120px;
    background: radial-gradient(circle, rgba(107, 20, 38, 0.45) 0%, transparent 70%);
}
.bespoke-glow-2 {
    bottom: 5%;
    right: -120px;
    background: radial-gradient(circle, rgba(207, 168, 89, 0.22) 0%, rgba(107, 20, 38, 0.25) 50%, transparent 70%);
}

/* Editorial Studio Watermark Background */
.bespoke-watermark-text {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    font-family: 'Playfair Display', serif;
    font-size: clamp(80px, 15vw, 220px);
    font-weight: 900;
    color: rgba(255, 255, 255, 0.016);
    letter-spacing: 14px;
    white-space: nowrap;
    pointer-events: none;
    z-index: 1;
    user-select: none;
}

/* -------------------------------------------------------------------------
   2. Cinematic Section Header & Split Kinetic Typography
   ------------------------------------------------------------------------- */
.bespoke-header-wrap {
    position: relative;
    z-index: 15;
    text-align: center;
    margin-bottom: clamp(45px, 6vh, 65px);
}

.bespoke-eyebrow {
    display: inline-flex;
    align-items: center;
    gap: 12px;
    background: rgba(20, 3, 7, 0.8);
    backdrop-filter: blur(12px);
    -webkit-backdrop-filter: blur(12px);
    border: 1px solid rgba(207, 168, 89, 0.45);
    padding: 6px 22px;
    border-radius: 30px;
    margin-bottom: 20px;
    box-shadow: 0 8px 24px rgba(0, 0, 0, 0.45);
    will-change: transform, opacity;
}
.bespoke-eyebrow-beacon {
    width: 8px;
    height: 8px;
    border-radius: 50%;
    background: var(--champagne-gold, #cfa859);
    box-shadow: 0 0 10px #ffd875;
    animation: beaconPulse 2s infinite ease-in-out;
}
.bespoke-eyebrow-text {
    font-family: 'Space Grotesk', -apple-system, sans-serif;
    font-size: 11px;
    font-weight: 800;
    letter-spacing: 2.4px;
    color: #ffffff;
    text-transform: uppercase;
}

.bespoke-cinema-title {
    font-family: 'Playfair Display', Georgia, serif;
    font-size: clamp(26px, 2.8vw, 38px);
    line-height: 1.22;
    font-weight: 800;
    color: #ffffff;
    letter-spacing: -0.4px;
    margin-bottom: 14px;
}
.bespoke-split-word {
    display: inline-block;
    will-change: transform, opacity, filter;
    transform-origin: left bottom;
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

.bespoke-lead-subtitle {
    font-size: clamp(15px, 1.1vw, 17.5px);
    line-height: 1.7;
    color: rgba(255, 255, 255, 0.82);
    max-width: 660px;
    margin: 0 auto;
}

/* -------------------------------------------------------------------------
   3. Floating 3D Production Slate Cards (Asymmetrical / Parallax Grid)
   ------------------------------------------------------------------------- */
.bespoke-cards-grid {
    position: relative;
    z-index: 10;
    transform-style: preserve-3d;
    -webkit-transform-style: preserve-3d;
}

.bespoke-card-col {
    will-change: transform;
}

/* Master 3D Production Card */
.bespoke-production-card {
    position: relative;
    width: 100%;
    height: clamp(450px, 54vh, 520px);
    border-radius: 24px;
    background: #080103;
    border: 1.5px solid rgba(207, 168, 89, 0.4);
    box-shadow: 
        0 25px 70px rgba(0, 0, 0, 0.8),
        0 10px 25px rgba(107, 20, 38, 0.35),
        inset 0 1px 0 rgba(255, 255, 255, 0.25);
    overflow: hidden;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    transform-style: preserve-3d;
    -webkit-transform-style: preserve-3d;
    transition: border-color 0.4s ease, box-shadow 0.4s ease;
    cursor: pointer;
    will-change: transform, opacity;
}

.bespoke-production-card:hover {
    border-color: rgba(255, 216, 117, 0.9);
    box-shadow: 
        0 35px 95px rgba(0, 0, 0, 0.9),
        0 15px 40px rgba(107, 20, 38, 0.6),
        0 0 25px rgba(207, 168, 89, 0.35),
        inset 0 1px 0 rgba(255, 255, 255, 0.5);
}

/* Background Artwork Window with Smooth Parallax */
.bespoke-card-media {
    position: absolute;
    inset: 0;
    overflow: hidden;
    z-index: 1;
}

.bespoke-card-img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: center 25%;
    position: absolute;
    inset: 0;
    filter: brightness(0.88) contrast(1.1) saturate(1.15);
    transform: scale(1.0);
    transition: transform 0.8s cubic-bezier(0.25, 1, 0.5, 1), filter 0.6s ease;
    will-change: transform;
}
.bespoke-production-card:hover .bespoke-card-img {
    transform: scale(1.08);
    filter: brightness(1.02) contrast(1.15) saturate(1.22);
}

/* Multi-Gradient Luxury Shading Overlay */
.bespoke-card-overlay {
    position: absolute;
    inset: 0;
    z-index: 2;
    background: 
        radial-gradient(circle at 50% 20%, transparent 20%, rgba(10, 1, 3, 0.4) 60%, rgba(5, 0, 2, 0.95) 100%),
        linear-gradient(180deg, rgba(8, 1, 3, 0.45) 0%, transparent 35%, rgba(18, 3, 7, 0.88) 75%, rgba(6, 0, 2, 0.98) 100%);
    pointer-events: none;
    transition: opacity 0.4s ease;
}
.bespoke-production-card:hover .bespoke-card-overlay {
    opacity: 0.92;
}

/* Specular Reflection Sheen */
.bespoke-card-specular {
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
.bespoke-production-card:hover .bespoke-card-specular {
    opacity: 0.85;
    transform: rotate(28deg) translateY(20%);
}

/* -------------------------------------------------------------------------
   4. Card 3D Content Layers (Physical translateZ Depth)
   ------------------------------------------------------------------------- */
/* Card Top Header */
.bespoke-card-header {
    position: relative;
    z-index: 10;
    padding: 18px 18px 0;
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 8px;
    flex-wrap: nowrap;
    transform: translateZ(35px);
    -webkit-transform: translateZ(35px);
}

.bespoke-icon-orb {
    width: 42px;
    height: 42px;
    flex-shrink: 0;
    border-radius: 50%;
    background: linear-gradient(135deg, var(--royal-burgundy, #6b1426) 0%, #4a0d1a 100%);
    border: 1.5px solid var(--champagne-gold, #cfa859);
    color: var(--champagne-gold, #cfa859);
    display: grid;
    place-items: center;
    font-size: 18px;
    box-shadow: 0 6px 18px rgba(107, 20, 38, 0.6);
    transition: all 0.3s ease;
}
.bespoke-production-card:hover .bespoke-icon-orb {
    transform: scale(1.1) rotate(6deg);
    border-color: #ffd875;
    box-shadow: 0 8px 24px rgba(207, 168, 89, 0.5);
}

.bespoke-badge-pill {
    background: rgba(14, 2, 5, 0.85);
    backdrop-filter: blur(10px);
    -webkit-backdrop-filter: blur(10px);
    border: 1px solid rgba(207, 168, 89, 0.45);
    color: var(--champagne-gold, #cfa859);
    font-family: 'Space Grotesk', -apple-system, sans-serif;
    font-size: 9px;
    font-weight: 800;
    letter-spacing: 1px;
    padding: 4px 10px;
    border-radius: 20px;
    text-transform: uppercase;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
    max-width: calc(100% - 52px);
}

/* Card Bottom Footer */
.bespoke-card-footer {
    position: relative;
    z-index: 10;
    padding: 0 18px 18px;
    transform: translateZ(45px);
    -webkit-transform: translateZ(45px);
}

.bespoke-prod-code {
    font-family: 'Courier New', monospace;
    font-size: 10px;
    font-weight: 700;
    color: #ffd875;
    letter-spacing: 1.2px;
    margin-bottom: 5px;
    display: flex;
    align-items: center;
    gap: 6px;
}
.bespoke-prod-code::before {
    content: '';
    width: 6px;
    height: 6px;
    background: #00e676;
    border-radius: 50%;
    box-shadow: 0 0 8px #00e676;
    display: inline-block;
}

.bespoke-card-title {
    font-family: 'Playfair Display', Georgia, serif;
    font-size: clamp(17px, 1.35vw, 20px);
    font-weight: 900;
    line-height: 1.25;
    color: #ffffff;
    margin-bottom: 6px;
    text-shadow: 0 2px 10px rgba(0, 0, 0, 0.95);
    transition: color 0.3s ease;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}
.bespoke-production-card:hover .bespoke-card-title {
    color: #ffd875;
}

.bespoke-card-desc {
    font-size: 12px;
    line-height: 1.5;
    color: rgba(255, 255, 255, 0.82);
    margin-bottom: 12px;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

.bespoke-action-row {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding-top: 10px;
    border-top: 1px solid rgba(207, 168, 89, 0.3);
    gap: 8px;
    flex-wrap: nowrap;
    min-width: 0;
}

.bespoke-specs-text {
    font-family: 'Courier New', monospace;
    font-size: 9.5px;
    color: rgba(255, 255, 255, 0.7);
    letter-spacing: 0.4px;
    min-width: 0;
    flex: 1 1 auto;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}

.btn-bespoke-action {
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
    gap: 6px;
    white-space: nowrap !important;
    flex-shrink: 0 !important;
}
.bespoke-production-card:hover .btn-bespoke-action {
    background: linear-gradient(135deg, #8a1a32 0%, var(--royal-burgundy, #6b1426) 100%);
    border-color: #ffd875;
    transform: translateY(-2px);
    box-shadow: 0 8px 20px rgba(107, 20, 38, 0.7);
    color: #ffffff;
}
</style>

<!-- =======================================================================
     HTML Structure: Bespoke Production Cinematic Showcase
     ======================================================================= -->
<section class="bespoke-cinema-section" id="bespokeProductionSection" aria-label="Bespoke Production Services">
    <!-- Atmospheric Ambient Glows & Background Watermark -->
    <div class="bespoke-ambient-glow bespoke-glow-1"></div>
    <div class="bespoke-ambient-glow bespoke-glow-2"></div>
    <div class="bespoke-watermark-text" aria-hidden="true">PRODUCTION</div>

    <div class="container position-relative" style="z-index: 10;">
        <!-- 1. Cinematic Section Header -->
        <div class="bespoke-header-wrap">
            <!-- Eyebrow Badge -->
            <div class="bespoke-eyebrow" id="bespokeEyebrow">
                <span class="bespoke-eyebrow-beacon"></span>
                <span class="bespoke-eyebrow-text">BESPOKE PRODUCTION</span>
            </div>

            <!-- Kinetic Split Title -->
            <h2 class="bespoke-cinema-title" id="bespokeTitle">
                <span class="bespoke-split-word">Our</span>
                <span class="bespoke-split-word highlight-gold">Photography</span>
                <span class="bespoke-split-word">&amp;</span>
                <span class="bespoke-split-word fst-italic highlight-burgundy">Film Services.</span>
            </h2>

            <!-- Supporting Lead Subtitle -->
            <p class="bespoke-lead-subtitle" id="bespokeSubtitle">
                Mastercrafted destination wedding cinema, unposed fine-art portraiture, and Hollywood-grade 4K color grading tailored for royal celebrations.
            </p>
        </div>

        <!-- 2. Floating 3D Production Slate Cards (Multi-Speed Parallax) -->
        <div class="row g-4 bespoke-cards-grid" id="bespokeCardsGrid">
            <?php foreach ($services as $idx => $srv): 
                $meta = $serviceMedia[$idx] ?? $serviceMedia[0];
                $colParallax = ($idx % 2 === 0) ? 'col-bespoke-slow' : 'col-bespoke-fast';
            ?>
                <div class="col-lg-3 col-md-6 bespoke-card-col <?= $colParallax ?>">
                    <div class="bespoke-production-card" data-card-idx="<?= $idx ?>">
                        <!-- Background Image Window -->
                        <div class="bespoke-card-media">
                            <img src="<?= $appBasePath ?>/<?= $meta['img'] ?>" 
                                 alt="<?= htmlspecialchars($srv['title']) ?>" 
                                 class="bespoke-card-img"
                                 loading="lazy">
                            <div class="bespoke-card-overlay"></div>
                            <div class="bespoke-card-specular"></div>
                        </div>

                        <!-- 3D Header -->
                        <div class="bespoke-card-header">
                            <div class="bespoke-icon-orb">
                                <i class="bi <?= htmlspecialchars($srv['icon']) ?>"></i>
                            </div>
                            <span class="bespoke-badge-pill"><?= htmlspecialchars($meta['badge']) ?></span>
                        </div>

                        <!-- 3D Footer -->
                        <div class="bespoke-card-footer">
                            <div class="bespoke-prod-code">
                                <span><?= htmlspecialchars($meta['code']) ?></span>
                            </div>

                            <h4 class="bespoke-card-title"><?= htmlspecialchars($srv['title']) ?></h4>
                            <p class="bespoke-card-desc"><?= htmlspecialchars($srv['description']) ?></p>

                            <div class="bespoke-action-row">
                                <span class="bespoke-specs-text">
                                    <?= $meta['specs'] ?>
                                </span>
                                <a href="<?= $appBasePath ?>/services" class="btn-bespoke-action">
                                    <span>Learn More</span>
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
     Engine Script: GSAP ScrollTrigger Multi-Plane Choreography & 3D Tilt
     ======================================================================= -->
<script>
(function() {
    'use strict';

    function initBespokeCinema() {
        if (typeof gsap === 'undefined' || typeof ScrollTrigger === 'undefined') {
            setTimeout(initBespokeCinema, 100);
            return;
        }

        gsap.registerPlugin(ScrollTrigger);

        const section = document.getElementById('bespokeProductionSection');
        if (!section) return;

        // Elements
        const eyebrow = document.getElementById('bespokeEyebrow');
        const titleWords = document.querySelectorAll('#bespokeTitle .bespoke-split-word');
        const subtitle = document.getElementById('bespokeSubtitle');
        const cards = gsap.utils.toArray('.bespoke-production-card');
        const slowCols = gsap.utils.toArray('.col-bespoke-slow');
        const fastCols = gsap.utils.toArray('.col-bespoke-fast');

        // Synchronize with Lenis if active
        if (window.globalLenis) {
            window.globalLenis.on('scroll', ScrollTrigger.update);
        }

        // ---------------------------------------------------------------------
        // 1. Initial State Setup (Blur-to-sharp & Staggered Offsets)
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

        cards.forEach((card, i) => {
            // Alternating entrance direction: from right/left with subtle 3D tilt
            const xOffset = (i % 2 === 0) ? -30 : 30;
            const yOffset = 50 + (i * 12);
            gsap.set(card, {
                opacity: 0,
                x: xOffset,
                y: yOffset,
                scale: 0.94,
                rotateY: (i % 2 === 0) ? -5 : 5,
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
                stagger: 0.09,
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

        if (slowCols.length > 0) {
            scrubTl.to(slowCols, {
                y: -25,
                ease: 'none'
            }, 0);
        }
        if (fastCols.length > 0) {
            scrubTl.to(fastCols, {
                y: -50,
                ease: 'none'
            }, 0);
        }

        // ---------------------------------------------------------------------
        // 4. Interactive Gyroscopic 3D Cursor Hover
        // ---------------------------------------------------------------------
        cards.forEach((card) => {
            const specular = card.querySelector('.bespoke-card-specular');
            const img = card.querySelector('.bespoke-card-img');
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
                    rotateY: xPct * 9,
                    rotateX: -yPct * 9,
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
        document.addEventListener('DOMContentLoaded', initBespokeCinema);
    } else {
        initBespokeCinema();
    }

    window.addEventListener('load', function() {
        if (typeof ScrollTrigger !== 'undefined') {
            ScrollTrigger.refresh();
        }
    });
})();
</script>
