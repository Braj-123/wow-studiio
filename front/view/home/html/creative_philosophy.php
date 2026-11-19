<?php
/**
 * ============================================================================
 * WoW STUDIO — OUR CREATIVE PHILOSOPHY (ULTRA-PREMIUM CINEMATIC EXPERIENCE)
 * Architecture: GSAP 3.12 + ScrollTrigger Scrub Choreography
 * Design: Apple-Inspired Editorial Storytelling & Luxury Agency Aesthetics
 * Visuals: 
 *   - Character/Word Split Kinetic Typography with Blur-to-Sharp Entrance
 *   - Ambient Depth Lighting & Dual-Tone Silk Background
 *   - Progressive Scroll-Driven Paragraph & Milestone Cards Activation
 *   - 3D Framed Artwork with Cinematic Curtain Mask & Multi-Layer Parallax
 *   - Floating Glassmorphic Telemetry Cards with Gyroscopic Depth
 * Theme: Royal Burgundy (#6b1426) & Champagne Gold (#cfa859)
 * File: front/view/home/html/creative_philosophy.php
 * ============================================================================
 */
$appBasePath = $appBasePath ?? '';
$stories = $stories ?? [];
?>

<style>
/* -------------------------------------------------------------------------
   1. Creative Philosophy Section Architecture
   ------------------------------------------------------------------------- */
.philosophy-cinema-section {
    position: relative;
    width: 100%;
    background: #faf6f0;
    background: linear-gradient(180deg, #faf6f0 0%, #f2e7d6 100%);
    color: #2c2523;
    padding: clamp(55px, 6.5vh, 95px) 0;
    overflow: hidden;
    border-top: 1px solid rgba(207, 168, 89, 0.45);
    border-bottom: 1px solid rgba(207, 168, 89, 0.45);
    perspective: 1600px;
}

/* Atmospheric Ambient Lighting & Editorial Watermark */
.philosophy-ambient-glow {
    position: absolute;
    width: 650px;
    height: 650px;
    border-radius: 50%;
    filter: blur(100px);
    pointer-events: none;
    z-index: 1;
    opacity: 0.45;
}
.philosophy-glow-left {
    top: 10%;
    left: -120px;
    background: radial-gradient(circle, rgba(207, 168, 89, 0.28) 0%, transparent 70%);
}
.philosophy-glow-right {
    bottom: 5%;
    right: -100px;
    background: radial-gradient(circle, rgba(194, 130, 133, 0.25) 0%, rgba(207, 168, 89, 0.16) 50%, transparent 70%);
}

.philosophy-watermark-text {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    font-family: 'Playfair Display', serif;
    font-size: clamp(80px, 16vw, 240px);
    font-weight: 900;
    color: rgba(107, 20, 38, 0.035);
    letter-spacing: 12px;
    white-space: nowrap;
    pointer-events: none;
    z-index: 1;
    user-select: none;
}

/* -------------------------------------------------------------------------
   2. Typography & Kinetic Editorial Header
   ------------------------------------------------------------------------- */
.philosophy-content-wrap {
    position: relative;
    z-index: 10;
}

/* Eyebrow Badge */
.philosophy-eyebrow {
    display: inline-flex;
    align-items: center;
    gap: 12px;
    background: rgba(20, 3, 7, 0.75);
    backdrop-filter: blur(12px);
    -webkit-backdrop-filter: blur(12px);
    border: 1px solid rgba(207, 168, 89, 0.45);
    padding: 7px 22px;
    border-radius: 30px;
    margin-bottom: 28px;
    box-shadow: 0 8px 24px rgba(0, 0, 0, 0.4);
    will-change: transform, opacity;
}
.philosophy-eyebrow-beacon {
    width: 8px;
    height: 8px;
    border-radius: 50%;
    background: var(--champagne-gold, #cfa859);
    box-shadow: 0 0 10px #ffd875;
    animation: beaconPulse 2s infinite ease-in-out;
}
.philosophy-eyebrow-text {
    font-family: 'Space Grotesk', -apple-system, sans-serif;
    font-size: 11.5px;
    font-weight: 800;
    letter-spacing: 2.4px;
    color: #ffffff;
    text-transform: uppercase;
}

/* Kinetic Main Heading */
.philosophy-cinema-title {
    font-family: 'Playfair Display', Georgia, serif;
    font-size: clamp(26px, 2.8vw, 38px);
    line-height: 1.22;
    font-weight: 800;
    color: var(--royal-burgundy, #6b1426);
    margin-bottom: 20px;
    letter-spacing: -0.4px;
}

.kinetic-line {
    display: block;
    overflow: hidden;
}
.kinetic-word {
    display: inline-block;
    will-change: transform, opacity, filter;
    transform-origin: left bottom;
}

/* Highlight Color Shifts (High-Contrast Royal Palette on Warm Ivory) */
.philosophy-cinema-section .highlight-burgundy {
    color: #8f1d35;
    background: linear-gradient(135deg, #6b1426 0%, #9b223b 65%, #4a0b17 100%);
    background-clip: text;
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
}
.philosophy-cinema-section .highlight-gold {
    color: #9e7323;
    background: linear-gradient(135deg, #cfa859 0%, #9e7323 55%, #7a5514 100%);
    background-clip: text;
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    filter: drop-shadow(0 2px 8px rgba(158, 115, 35, 0.2));
}
.philosophy-cinema-section .highlight-shimmer {
    color: #6b1426;
    background: linear-gradient(90deg, #6b1426 0%, #cfa859 40%, #6b1426 75%, #9e7323 100%);
    background-size: 200% auto;
    background-clip: text;
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    animation: textShimmer 6s linear infinite;
}
@keyframes textShimmer {
    to { background-position: 200% center; }
}

/* Narrative Paragraph */
.philosophy-lead-copy {
    font-family: 'DM Sans', -apple-system, sans-serif;
    font-size: clamp(15px, 1.05vw, 16.5px);
    line-height: 1.7;
    color: #4a3e3c;
    max-width: 580px;
    margin-bottom: 28px;
    text-shadow: none;
    will-change: transform, opacity;
}

/* -------------------------------------------------------------------------
   3. Interactive Milestone Story Cards Timeline (Apple Staggered Style)
   ------------------------------------------------------------------------- */
.philosophy-timeline-stack {
    position: relative;
    padding-left: 28px;
    margin-bottom: 42px;
}
/* Vertical Golden Timeline Track */
.philosophy-timeline-line {
    position: absolute;
    left: 8px;
    top: 8px;
    bottom: 8px;
    width: 2px;
    background: rgba(207, 168, 89, 0.35);
    border-radius: 2px;
}
.philosophy-timeline-progress {
    position: absolute;
    left: 0;
    top: 0;
    width: 100%;
    height: 0%;
    background: linear-gradient(180deg, var(--royal-burgundy, #6b1426) 0%, var(--champagne-gold, #cfa859) 100%);
    box-shadow: 0 0 8px rgba(207, 168, 89, 0.6);
    border-radius: 2px;
    transition: height 0.2s ease-out;
}

.philosophy-milestone-item {
    position: relative;
    margin-bottom: 22px;
    padding: 16px 20px;
    border-radius: 16px;
    background: #ffffff;
    border: 1px solid rgba(207, 168, 89, 0.55);
    box-shadow: 0 8px 24px rgba(107, 20, 38, 0.05);
    transition: all 0.4s cubic-bezier(0.25, 0.8, 0.25, 1);
    will-change: transform, opacity, border-color;
}
.philosophy-milestone-item:hover,
.philosophy-milestone-item.active {
    background: #fffdf9;
    border-color: var(--royal-burgundy, #6b1426);
    box-shadow: 0 14px 34px rgba(107, 20, 38, 0.14);
    transform: translateX(8px);
}

/* Timeline Node Dot */
.philosophy-node-dot {
    position: absolute;
    left: -28px;
    top: 22px;
    width: 16px;
    height: 16px;
    border-radius: 50%;
    background: #faf6f0;
    border: 2px solid var(--champagne-gold, #cfa859);
    transition: all 0.3s ease;
}
.philosophy-milestone-item.active .philosophy-node-dot,
.philosophy-milestone-item:hover .philosophy-node-dot {
    background: var(--royal-burgundy, #6b1426);
    border-color: #ffd875;
    box-shadow: 0 0 10px rgba(107, 20, 38, 0.45);
    transform: scale(1.2);
}

.milestone-badge-row {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 6px;
    flex-wrap: wrap;
    gap: 8px;
}
.milestone-card-title {
    font-family: 'Playfair Display', serif;
    font-size: 17px;
    font-weight: 800;
    color: var(--royal-burgundy, #6b1426);
    margin: 0;
}
.milestone-date-chip {
    font-family: 'Space Grotesk', -apple-system, sans-serif;
    font-size: 11px;
    font-weight: 700;
    color: #8a6723;
    background: #fcf9f0;
    padding: 3px 10px;
    border-radius: 20px;
    border: 1px solid rgba(207, 168, 89, 0.55);
}
.milestone-card-desc {
    font-size: 13.5px;
    line-height: 1.6;
    color: #5a4e4c;
    margin: 0;
}

/* -------------------------------------------------------------------------
   4. Action CTA Buttons
   ------------------------------------------------------------------------- */
.philosophy-cta-row {
    display: flex;
    flex-wrap: wrap;
    gap: 16px;
    align-items: center;
}
.btn-philosophy-primary {
    background: linear-gradient(135deg, var(--royal-burgundy, #6b1426) 0%, #4a0d1a 100%);
    border: 1.5px solid var(--champagne-gold, #cfa859);
    color: #ffffff !important;
    font-weight: 800;
    font-size: 15px;
    letter-spacing: 0.5px;
    border-radius: 40px;
    padding: 14px 34px;
    box-shadow: 0 10px 28px rgba(107, 20, 38, 0.6), inset 0 1px 0 rgba(255, 255, 255, 0.25);
    transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
    display: inline-flex;
    align-items: center;
    text-decoration: none;
}
.btn-philosophy-primary:hover {
    background: linear-gradient(135deg, #8a1a32 0%, var(--royal-burgundy, #6b1426) 100%);
    border-color: #ffd875;
    transform: translateY(-3px) scale(1.02);
    box-shadow: 0 16px 36px rgba(107, 20, 38, 0.8);
    color: #ffffff;
}

.btn-philosophy-secondary {
    background: #ffffff;
    border: 1.5px solid var(--royal-burgundy, #6b1426);
    color: var(--royal-burgundy, #6b1426) !important;
    font-weight: 700;
    font-size: 15px;
    border-radius: 40px;
    padding: 14px 30px;
    box-shadow: 0 8px 24px rgba(107, 20, 38, 0.1);
    transition: all 0.3s ease;
    display: inline-flex;
    align-items: center;
    text-decoration: none;
}
.btn-philosophy-secondary:hover {
    background: var(--champagne-gold, #cfa859);
    border-color: var(--champagne-gold, #cfa859);
    color: #210409 !important;
    transform: translateY(-3px);
    box-shadow: 0 12px 28px rgba(207, 168, 89, 0.3);
}

/* -------------------------------------------------------------------------
   5. Right Column: 3D Museum-Grade Framed Artwork & Parallax Accents
   ------------------------------------------------------------------------- */
.philosophy-visual-stage {
    position: relative;
    transform-style: preserve-3d;
    -webkit-transform-style: preserve-3d;
    padding: 20px 0;
}

/* Master 3D Chassis Frame */
.philosophy-artwork-chassis {
    position: relative;
    border-radius: 28px;
    background: #000000;
    border: 2px solid rgba(207, 168, 89, 0.5);
    box-shadow: 
        0 35px 90px rgba(0, 0, 0, 0.85),
        0 12px 35px rgba(107, 20, 38, 0.45),
        inset 0 1px 0 rgba(255, 255, 255, 0.3);
    overflow: hidden;
    transform-style: preserve-3d;
    -webkit-transform-style: preserve-3d;
    will-change: transform;
}

/* Curtain Wipe Reveal Container */
.philosophy-media-curtain {
    position: relative;
    width: 100%;
    height: clamp(380px, 46vh, 480px);
    overflow: hidden;
    clip-path: inset(0 0 0 0 round 24px);
    -webkit-clip-path: inset(0 0 0 0 round 24px);
    will-change: clip-path;
}

.philosophy-art-image {
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: center 25%;
    position: absolute;
    inset: 0;
    filter: brightness(0.92) contrast(1.08) saturate(1.12);
    transition: filter 0.5s ease;
    will-change: transform;
}
.philosophy-artwork-chassis:hover .philosophy-art-image {
    filter: brightness(1.02) contrast(1.15) saturate(1.22);
}

/* Cinematic Multi-Gradient Shading Overlay */
.philosophy-art-overlay {
    position: absolute;
    inset: 0;
    background: 
        radial-gradient(circle at 50% 20%, transparent 25%, rgba(10, 1, 3, 0.5) 65%, rgba(5, 0, 2, 0.95) 100%),
        linear-gradient(180deg, rgba(10, 1, 3, 0.25) 0%, transparent 35%, rgba(44, 11, 23, 0.88) 80%, rgba(12, 1, 4, 0.98) 100%);
    pointer-events: none;
    z-index: 2;
}

/* Film Manifesto Quote Banner (Elevated 3D) */
.philosophy-quote-banner {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    padding: 30px 28px;
    z-index: 5;
    color: #ffffff;
    transform: translateZ(40px);
    -webkit-transform: translateZ(40px);
}
.quote-icon-gold {
    font-size: 32px;
    line-height: 1;
    color: var(--champagne-gold, #cfa859);
    filter: drop-shadow(0 2px 8px rgba(207, 168, 89, 0.5));
}
.philosophy-quote-text {
    font-family: 'Playfair Display', Georgia, serif;
    font-size: clamp(16px, 1.4vw, 20px);
    font-style: italic;
    line-height: 1.5;
    color: #ffffff;
    text-shadow: 0 2px 10px rgba(0, 0, 0, 0.95);
    margin: 8px 0 10px;
}
.philosophy-quote-author {
    font-family: 'Space Grotesk', -apple-system, sans-serif;
    font-size: 11px;
    font-weight: 800;
    letter-spacing: 2px;
    color: var(--champagne-gold, #cfa859);
    text-transform: uppercase;
}

/* Floating 3D Accent Card 1: DaVinci Color Science */
.philosophy-floating-accent-1 {
    position: absolute;
    top: -24px;
    right: -24px;
    z-index: 15;
    background: rgba(22, 3, 8, 0.88);
    backdrop-filter: blur(16px);
    -webkit-backdrop-filter: blur(16px);
    border: 1.5px solid var(--champagne-gold, #cfa859);
    border-radius: 18px;
    padding: 14px 22px;
    box-shadow: 0 16px 40px rgba(0, 0, 0, 0.7), 0 0 24px rgba(107, 20, 38, 0.4);
    display: flex;
    align-items: center;
    gap: 14px;
    transform: translateZ(65px);
    -webkit-transform: translateZ(65px);
    will-change: transform;
}
.accent-icon-wrap {
    width: 46px;
    height: 46px;
    border-radius: 50%;
    background: linear-gradient(135deg, var(--royal-burgundy, #6b1426) 0%, #4a0d1a 100%);
    border: 1px solid var(--champagne-gold, #cfa859);
    color: var(--champagne-gold, #cfa859);
    display: grid;
    place-items: center;
    font-size: 20px;
    box-shadow: 0 4px 12px rgba(107, 20, 38, 0.6);
}
.accent-title {
    font-family: 'Playfair Display', serif;
    font-weight: 800;
    font-size: 14px;
    color: #ffffff;
    display: block;
    line-height: 1.2;
}
.accent-sub {
    font-family: 'Space Grotesk', -apple-system, sans-serif;
    font-size: 11px;
    color: var(--champagne-gold, #cfa859);
    font-weight: 700;
    letter-spacing: 0.5px;
}

/* Floating 3D Accent Card 2: Camera Telemetry Chip */
.philosophy-floating-accent-2 {
    position: absolute;
    bottom: 24px;
    left: -28px;
    z-index: 15;
    background: rgba(14, 2, 5, 0.9);
    backdrop-filter: blur(14px);
    -webkit-backdrop-filter: blur(14px);
    border: 1px solid rgba(207, 168, 89, 0.5);
    border-radius: 16px;
    padding: 10px 18px;
    box-shadow: 0 14px 32px rgba(0, 0, 0, 0.65);
    display: flex;
    align-items: center;
    gap: 10px;
    font-family: 'Courier New', monospace;
    font-size: 11px;
    font-weight: 700;
    letter-spacing: 1.2px;
    color: #ffd875;
    transform: translateZ(50px);
    -webkit-transform: translateZ(50px);
    will-change: transform;
}
.accent-pulse-led {
    width: 8px;
    height: 8px;
    border-radius: 50%;
    background: #00e676;
    box-shadow: 0 0 10px #00e676;
}

@media (max-width: 991px) {
    .philosophy-floating-accent-1 { right: 10px; top: -14px; }
    .philosophy-floating-accent-2 { left: 10px; bottom: 14px; }
}
</style>

<!-- =======================================================================
     HTML Structure: Cinematic Creative Philosophy Stage
     ======================================================================= -->
<section class="philosophy-cinema-section" id="creativePhilosophySection" aria-label="Our Creative Philosophy">
    <!-- Atmospheric Ambient Glows & Background Watermark -->
    <div class="philosophy-ambient-glow philosophy-glow-left"></div>
    <div class="philosophy-ambient-glow philosophy-glow-right"></div>
    <div class="philosophy-watermark-text" aria-hidden="true">PHILOSOPHY</div>

    <div class="container position-relative philosophy-content-wrap">
        <div class="row align-items-center g-5">
            <!-- Left Column: Kinetic Typography, Narrative & Story Timeline -->
            <div class="col-lg-6">
                <!-- Eyebrow Badge -->
                <div class="philosophy-eyebrow" id="philoEyebrow">
                    <span class="philosophy-eyebrow-beacon"></span>
                    <span class="philosophy-eyebrow-text">OUR CREATIVE PHILOSOPHY</span>
                </div>

                <!-- Kinetic Character & Word Split Title -->
                <h2 class="philosophy-cinema-title" id="philoTitle">
                    <span class="kinetic-line">
                        <span class="kinetic-word">Authentic</span> 
                        <span class="kinetic-word highlight-burgundy">Emotions.</span>
                    </span>
                    <span class="kinetic-line">
                        <span class="kinetic-word">Masterful</span> 
                        <span class="kinetic-word highlight-gold">Light.</span>
                    </span>
                    <span class="kinetic-line">
                        <span class="kinetic-word fst-italic highlight-shimmer">Pure Cinema.</span>
                    </span>
                </h2>

                <!-- Narrative Lead Copy -->
                <p class="philosophy-lead-copy" id="philoLead">
                    We believe the most memorable wedding moments are unscripted: a stolen glance between the couple, 
                    tears of joy in a father's eyes, and high-energy family dance steps. 
                    We blend into your celebrations like friends with cameras &mdash; capturing raw honesty with the precision of Hollywood optics.
                </p>

                <!-- Interactive Milestone Story Timeline -->
                <?php if (!empty($stories)): ?>
                <div class="philosophy-timeline-stack" id="philoTimeline">
                    <div class="philosophy-timeline-line">
                        <div class="philosophy-timeline-progress" id="philoTimelineBar"></div>
                    </div>

                    <?php foreach ($stories as $idx => $st): ?>
                        <div class="philosophy-milestone-item <?= $idx === 0 ? 'active' : '' ?>" data-milestone-idx="<?= $idx ?>">
                            <span class="philosophy-node-dot"></span>
                            <div class="milestone-badge-row">
                                <h4 class="milestone-card-title"><?= htmlspecialchars($st['title']) ?></h4>
                                <span class="milestone-date-chip"><?= htmlspecialchars($st['story_date']) ?></span>
                            </div>
                            <p class="milestone-card-desc"><?= htmlspecialchars($st['description']) ?></p>
                        </div>
                    <?php endforeach; ?>
                </div>
                <?php endif; ?>

                <!-- Action CTAs -->
                <div class="philosophy-cta-row" id="philoCtas">
                    <a href="<?= $appBasePath ?>/about" class="btn-philosophy-primary">
                        <span>Discover Our Philosophy</span>
                        <i class="bi bi-arrow-right ms-2"></i>
                    </a>
                    <a href="<?= $appBasePath ?>/team" class="btn-philosophy-secondary">
                        <i class="bi bi-camera-reels-fill me-2 text-warning"></i>
                        <span>Meet The Creative Crew</span>
                    </a>
                </div>
            </div>

            <!-- Right Column: 3D Museum-Grade Framed Artwork & Parallax Accents -->
            <div class="col-lg-6">
                <div class="philosophy-visual-stage" id="philoVisualStage">
                    <!-- Master Framed Artwork Chassis -->
                    <div class="philosophy-artwork-chassis" id="philoArtworkChassis">
                        <div class="philosophy-media-curtain" id="philoMediaCurtain">
                            <img src="<?= $appBasePath ?>/uploads/photo store/5.jpeg" 
                                 alt="WoW Studio Candid Fine-Art" 
                                 class="philosophy-art-image"
                                 id="philoArtImage"
                                 loading="lazy">
                            <div class="philosophy-art-overlay"></div>
                        </div>

                        <!-- Film Quote Manifesto -->
                        <div class="philosophy-quote-banner" id="philoQuoteBanner">
                            <i class="bi bi-quote quote-icon-gold"></i>
                            <p class="philosophy-quote-text">
                                &ldquo;Photography is the poetry of time &mdash; preserving raw feeling long after the music has stopped.&rdquo;
                            </p>
                            <span class="philosophy-quote-author">&mdash; WoW Studio Visual Manifesto</span>
                        </div>
                    </div>

                    <!-- Floating 3D Accent Card 1: DaVinci Color Science -->
                    <div class="philosophy-floating-accent-1" id="philoAccent1">
                        <div class="accent-icon-wrap">
                            <i class="bi bi-camera-reels-fill"></i>
                        </div>
                        <div>
                            <span class="accent-title">4K RAW Color Science</span>
                            <span class="accent-sub">DaVinci Resolve Film Masters</span>
                        </div>
                    </div>

                    <!-- Floating 3D Accent Card 2: Camera Telemetry Chip -->
                    <div class="philosophy-floating-accent-2" id="philoAccent2">
                        <span class="accent-pulse-led"></span>
                        <span>SHUTTER 180&deg; &bull; ARRI LOG-C</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- =======================================================================
     Engine Script: GSAP ScrollTrigger Choreography & Parallax
     ======================================================================= -->
<script>
(function() {
    'use strict';

    function initPhilosophyCinema() {
        if (typeof gsap === 'undefined' || typeof ScrollTrigger === 'undefined') {
            setTimeout(initPhilosophyCinema, 100);
            return;
        }

        gsap.registerPlugin(ScrollTrigger);

        const section = document.getElementById('creativePhilosophySection');
        if (!section) return;

        // Elements
        const eyebrow = document.getElementById('philoEyebrow');
        const words = document.querySelectorAll('#philoTitle .kinetic-word');
        const lead = document.getElementById('philoLead');
        const milestones = document.querySelectorAll('.philosophy-milestone-item');
        const timelineBar = document.getElementById('philoTimelineBar');
        const ctas = document.getElementById('philoCtas');

        const visualStage = document.getElementById('philoVisualStage');
        const chassis = document.getElementById('philoArtworkChassis');
        const curtain = document.getElementById('philoMediaCurtain');
        const artImg = document.getElementById('philoArtImage');
        const quoteBanner = document.getElementById('philoQuoteBanner');
        const accent1 = document.getElementById('philoAccent1');
        const accent2 = document.getElementById('philoAccent2');

        // Synchronize with Lenis if active
        if (window.globalLenis) {
            window.globalLenis.on('scroll', ScrollTrigger.update);
        }

        // ---------------------------------------------------------------------
        // 1. Initial State Setup (Cinematic Blur-to-Sharp & 3D Staging)
        // ---------------------------------------------------------------------
        if (eyebrow) {
            gsap.set(eyebrow, { opacity: 0, y: 30, filter: 'blur(6px)' });
        }
        if (words && words.length > 0) {
            gsap.set(words, { 
                opacity: 0, 
                y: 55, 
                rotateX: 25, 
                filter: 'blur(10px)',
                transformOrigin: '0% 100%'
            });
        }
        if (lead) {
            gsap.set(lead, { opacity: 0, y: 35, filter: 'blur(6px)' });
        }
        if (milestones && milestones.length > 0) {
            gsap.set(milestones, { opacity: 0, x: -30, filter: 'blur(5px)' });
        }
        if (ctas) {
            gsap.set(ctas, { opacity: 0, y: 25 });
        }

        if (chassis) {
            gsap.set(chassis, { 
                opacity: 0, 
                scale: 0.92, 
                rotateY: 8, 
                rotateX: -4,
                filter: 'blur(8px)'
            });
        }
        if (accent1) {
            gsap.set(accent1, { opacity: 0, y: -30, scale: 0.85 });
        }
        if (accent2) {
            gsap.set(accent2, { opacity: 0, y: 30, scale: 0.85 });
        }
        if (quoteBanner) {
            gsap.set(quoteBanner, { opacity: 0, y: 20 });
        }

        // ---------------------------------------------------------------------
        // 2. Cinematic Entrance Timeline (ScrollTrigger with Batch Reveal)
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

        // 1. Eyebrow Reveal
        if (eyebrow) {
            enterTl.to(eyebrow, {
                opacity: 1,
                y: 0,
                filter: 'blur(0px)',
                duration: 0.8,
                ease: 'power3.out'
            }, 0);
        }

        // 2. Kinetic Words Reveal (Staggered Blur-to-Sharp)
        if (words && words.length > 0) {
            enterTl.to(words, {
                opacity: 1,
                y: 0,
                rotateX: 0,
                filter: 'blur(0px)',
                duration: 1.0,
                stagger: 0.08,
                ease: 'power4.out'
            }, 0.15);
        }

        // 3. Lead Paragraph Reveal
        if (lead) {
            enterTl.to(lead, {
                opacity: 1,
                y: 0,
                filter: 'blur(0px)',
                duration: 0.9,
                ease: 'power3.out'
            }, 0.45);
        }

        // 4. Milestone Cards Progressive Cascade
        if (milestones && milestones.length > 0) {
            enterTl.to(milestones, {
                opacity: 1,
                x: 0,
                filter: 'blur(0px)',
                duration: 0.8,
                stagger: 0.12,
                ease: 'power3.out'
            }, 0.6);
        }

        // 5. CTAs Appearance
        if (ctas) {
            enterTl.to(ctas, {
                opacity: 1,
                y: 0,
                duration: 0.8,
                ease: 'power2.out'
            }, 0.9);
        }

        // 6. Right Visual Artwork Frame 3D Entrance
        if (chassis) {
            enterTl.to(chassis, {
                opacity: 1,
                scale: 1,
                rotateY: 0,
                rotateX: 0,
                filter: 'blur(0px)',
                duration: 1.2,
                ease: 'power3.out'
            }, 0.3);
        }
        if (quoteBanner) {
            enterTl.to(quoteBanner, {
                opacity: 1,
                y: 0,
                duration: 0.8,
                ease: 'power2.out'
            }, 0.8);
        }
        if (accent1) {
            enterTl.to(accent1, {
                opacity: 1,
                y: 0,
                scale: 1,
                duration: 0.9,
                ease: 'back.out(1.5)'
            }, 0.95);
        }
        if (accent2) {
            enterTl.to(accent2, {
                opacity: 1,
                y: 0,
                scale: 1,
                duration: 0.9,
                ease: 'back.out(1.5)'
            }, 1.05);
        }

        // ---------------------------------------------------------------------
        // 3. Continuous Scroll-Linked Parallax & Timeline Scrub
        // ---------------------------------------------------------------------
        const scrubTl = gsap.timeline({
            scrollTrigger: {
                trigger: section,
                start: 'top bottom',
                end: 'bottom top',
                scrub: 1.2
            }
        });

        // Background Image Counter-Parallax
        if (artImg) {
            scrubTl.to(artImg, {
                yPercent: 10,
                scale: 1.0,
                ease: 'none'
            }, 0);
        }

        // 3D Chassis Gentle Float Tilt
        if (chassis) {
            scrubTl.to(chassis, {
                y: -40,
                rotateX: 3,
                rotateY: -3,
                ease: 'none'
            }, 0);
        }

        // Floating Accents Multi-Depth Parallax (Differential speeds)
        if (accent1) {
            scrubTl.to(accent1, {
                y: -65,
                ease: 'none'
            }, 0);
        }
        if (accent2) {
            scrubTl.to(accent2, {
                y: -25,
                ease: 'none'
            }, 0);
        }

        // Progress bar along the milestone timeline
        if (timelineBar) {
            ScrollTrigger.create({
                trigger: section,
                start: 'top 60%',
                end: 'bottom 80%',
                scrub: true,
                onUpdate: (self) => {
                    timelineBar.style.height = (self.progress * 100).toFixed(1) + '%';
                    
                    // Activate milestone cards based on progress
                    if (milestones && milestones.length > 0) {
                        const step = 1 / milestones.length;
                        milestones.forEach((item, idx) => {
                            if (self.progress >= idx * step) {
                                item.classList.add('active');
                            } else if (idx > 0) {
                                item.classList.remove('active');
                            }
                        });
                    }
                }
            });
        }

        // ---------------------------------------------------------------------
        // 4. Interactive 3D Gyroscopic Cursor Hover on Visual Stage
        // ---------------------------------------------------------------------
        if (visualStage && chassis) {
            visualStage.addEventListener('mousemove', (e) => {
                const rect = visualStage.getBoundingClientRect();
                const x = (e.clientX - rect.left) / rect.width - 0.5;
                const y = (e.clientY - rect.top) / rect.height - 0.5;

                gsap.to(chassis, {
                    duration: 0.4,
                    rotateY: x * 14,
                    rotateX: -y * 14,
                    ease: 'power2.out'
                });

                if (accent1) {
                    gsap.to(accent1, {
                        duration: 0.5,
                        x: x * 22,
                        y: y * 22,
                        ease: 'power2.out'
                    });
                }
                if (accent2) {
                    gsap.to(accent2, {
                        duration: 0.5,
                        x: x * -18,
                        y: y * -18,
                        ease: 'power2.out'
                    });
                }
            });

            visualStage.addEventListener('mouseleave', () => {
                gsap.to(chassis, {
                    duration: 0.8,
                    rotateY: 0,
                    rotateX: 0,
                    ease: 'power2.out'
                });
                if (accent1) {
                    gsap.to(accent1, {
                        duration: 0.8,
                        x: 0,
                        y: 0,
                        ease: 'power2.out'
                    });
                }
                if (accent2) {
                    gsap.to(accent2, {
                        duration: 0.8,
                        x: 0,
                        y: 0,
                        ease: 'power2.out'
                    });
                }
            });
        }
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initPhilosophyCinema);
    } else {
        initPhilosophyCinema();
    }

    window.addEventListener('load', function() {
        if (typeof ScrollTrigger !== 'undefined') {
            ScrollTrigger.refresh();
        }
    });
})();
</script>
