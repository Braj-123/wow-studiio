<?php
/**
 * ============================================================================
 * WoW STUDIO — ULTRA-PREMIUM CINEMATIC HERO SECTION
 * Video: IMG_1035.mp4 (Pure Cinematic Video Background — No Recording HUD)
 * Headline: "Welcome to WoW Studio"
 * CTAs: "Book Now" & "Contact Us"
 * Scroll Effect: Cinematic Camera Zoom, Parallax & Depth Fade via GSAP ScrollTrigger
 * Theme: Royal Burgundy (#6b1426) & Champagne Gold (#cfa859)
 * File: front/view/home/html/hero_cinema.php
 * ============================================================================
 */
$appBasePath = $appBasePath ?? '';
?>

<style>
/* -------------------------------------------------------------------------
   1. Cinematic Hero Section Viewport Architecture
   ------------------------------------------------------------------------- */
.wedding-cinema-hero {
    position: relative;
    min-height: 94vh;
    min-height: 94dvh;
    width: 100%;
    background: #060103;
    overflow: hidden;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #ffffff;
    border-bottom: 2px solid var(--champagne-gold, #cfa859);
}

/* Subtle Anamorphic Letterbox Framing */
.cinema-letterbox-top,
.cinema-letterbox-bottom {
    position: absolute;
    left: 0;
    right: 0;
    height: 12px;
    background: #000000;
    z-index: 25;
    pointer-events: none;
    border-bottom: 1px solid rgba(207, 168, 89, 0.2);
}
.cinema-letterbox-top { top: 0; }
.cinema-letterbox-bottom { 
    bottom: 0; 
    border-bottom: none; 
    border-top: 1px solid rgba(207, 168, 89, 0.2); 
}

/* -------------------------------------------------------------------------
   2. Pure Cinematic Video Background Canvas (No Recording Overlays)
   ------------------------------------------------------------------------- */
.wedding-video-canvas {
    position: absolute;
    inset: 0;
    width: 100%;
    height: 100%;
    overflow: hidden;
    pointer-events: none;
    z-index: 1;
}

.wedding-video-elem {
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: center center;
    display: block;
    filter: brightness(0.88) contrast(1.08) saturate(1.15);
    transform: scale(1.0);
    will-change: transform, opacity;
}

/* Luxury Royal Burgundy Vignette & Dark Contrast Overlay */
.wedding-video-overlay {
    position: absolute;
    inset: 0;
    background: 
        radial-gradient(circle at 50% 45%, rgba(107, 20, 38, 0.22) 0%, rgba(18, 3, 7, 0.65) 72%, rgba(5, 0, 2, 0.94) 100%),
        linear-gradient(180deg, rgba(8, 1, 3, 0.52) 0%, rgba(8, 1, 3, 0.2) 45%, rgba(5, 0, 2, 0.90) 100%);
    z-index: 2;
    pointer-events: none;
    will-change: opacity;
}

/* Subtle 35mm Film Grain Texture */
.wedding-film-grain {
    position: absolute;
    inset: 0;
    opacity: 0.04;
    background-image: repeating-radial-gradient(circle at 50% 50%, transparent 0, #ffffff 1px, transparent 2px);
    background-size: 3px 3px;
    z-index: 3;
    pointer-events: none;
}

/* Floating Audio Toggle in Upper Corner */
.hero-sound-control {
    position: absolute;
    top: 24px;
    right: 28px;
    z-index: 30;
}
.btn-cinema-sound {
    background: rgba(20, 3, 7, 0.75);
    backdrop-filter: blur(12px);
    -webkit-backdrop-filter: blur(12px);
    border: 1px solid var(--champagne-gold, #cfa859);
    color: #ffffff;
    font-family: 'Space Grotesk', -apple-system, sans-serif;
    font-size: 11.5px;
    font-weight: 700;
    letter-spacing: 1px;
    padding: 7px 16px;
    border-radius: 24px;
    cursor: pointer;
    transition: all 0.25s ease;
    display: inline-flex;
    align-items: center;
    gap: 7px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.5);
}
.btn-cinema-sound:hover {
    background: var(--royal-burgundy, #6b1426);
    border-color: #ffd875;
    color: #ffffff;
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(107, 20, 38, 0.6);
}

/* -------------------------------------------------------------------------
   3. Center-Aligned Cinematic Hero Content (Animated on Scroll)
   ------------------------------------------------------------------------- */
.wedding-hero-content {
    position: relative;
    z-index: 20;
    max-width: 960px;
    padding: 60px 20px 40px;
    will-change: transform, opacity;
}

/* Eyebrow Badge */
.wedding-hero-badge {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    background: rgba(20, 3, 7, 0.78);
    backdrop-filter: blur(12px);
    -webkit-backdrop-filter: blur(12px);
    border: 1px solid rgba(207, 168, 89, 0.55);
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.6);
    padding: 8px 24px;
    border-radius: 50px;
}
.badge-gold-stars {
    color: var(--champagne-gold, #cfa859);
    font-size: 13px;
    letter-spacing: 2px;
}
.badge-text-tag {
    font-size: 11.5px;
    font-weight: 800;
    letter-spacing: 2.2px;
    color: #ffffff;
    text-transform: uppercase;
}

/* Main Headline: "Welcome to WoW Studio" */
.wedding-hero-title {
    font-family: 'Playfair Display', Georgia, serif;
    font-size: clamp(32px, 3.6vw, 46px);
    line-height: 1.18;
    font-weight: 800;
    color: #ffffff;
    text-shadow: 0 4px 30px rgba(0, 0, 0, 0.95), 0 2px 8px rgba(0, 0, 0, 0.9);
    margin-bottom: 22px;
    letter-spacing: -0.5px;
}

.gold-gradient-shimmer {
    color: #ffd875;
    background: linear-gradient(135deg, #ffe4a0 0%, #cfa859 45%, #ffd875 75%, #b58838 100%);
    background-clip: text;
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    display: inline-block;
    filter: drop-shadow(0 4px 20px rgba(207, 168, 89, 0.55));
}

.wedding-hero-lead {
    font-size: clamp(16px, 1.3vw, 20.5px);
    line-height: 1.7;
    color: rgba(255, 255, 255, 0.92);
    max-width: 740px;
    margin: 0 auto 34px;
    text-shadow: 0 2px 10px rgba(0, 0, 0, 0.95);
    font-weight: 400;
}

/* -------------------------------------------------------------------------
   4. Action Buttons: "Book Now" & "Contact Us"
   ------------------------------------------------------------------------- */
.wedding-hero-btn-row {
    display: flex;
    flex-wrap: wrap;
    gap: 18px;
    justify-content: center;
    align-items: center;
}

.btn-wedding-primary {
    background: linear-gradient(135deg, var(--royal-burgundy, #6b1426) 0%, #4a0d1a 100%);
    border: 2px solid var(--champagne-gold, #cfa859);
    color: #ffffff !important;
    font-weight: 800;
    font-size: 16px;
    letter-spacing: 0.6px;
    border-radius: 40px;
    padding: 16px 44px;
    box-shadow: 0 10px 30px rgba(107, 20, 38, 0.65), inset 0 1px 0 rgba(255, 255, 255, 0.25);
    transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
    display: inline-flex;
    align-items: center;
    justify-content: center;
    text-decoration: none;
}
.btn-wedding-primary:hover {
    background: linear-gradient(135deg, #8a1a32 0%, var(--royal-burgundy, #6b1426) 100%);
    border-color: #ffe4a0;
    transform: translateY(-3px) scale(1.02);
    box-shadow: 0 16px 40px rgba(107, 20, 38, 0.85);
    color: #ffffff;
}

.btn-wedding-secondary {
    background: rgba(20, 4, 8, 0.85);
    backdrop-filter: blur(14px);
    -webkit-backdrop-filter: blur(14px);
    border: 2px solid var(--champagne-gold, #cfa859);
    color: #ffffff !important;
    font-weight: 700;
    font-size: 16px;
    border-radius: 40px;
    padding: 16px 38px;
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.5);
    transition: all 0.3s ease;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    text-decoration: none;
}
.btn-wedding-secondary:hover {
    background: rgba(255, 255, 255, 0.18);
    border-color: #ffd875;
    color: #ffffff;
    transform: translateY(-3px);
    box-shadow: 0 14px 32px rgba(207, 168, 89, 0.35);
}

/* -------------------------------------------------------------------------
   5. Trust Metrics Strip
   ------------------------------------------------------------------------- */
.wedding-trust-strip {
    margin-top: 32px;
}
.trust-chip-glass {
    background: rgba(18, 3, 6, 0.72);
    backdrop-filter: blur(14px);
    -webkit-backdrop-filter: blur(14px);
    border: 1px solid rgba(207, 168, 89, 0.35);
    border-radius: 14px;
    padding: 9px 20px;
    box-shadow: 0 8px 24px rgba(0, 0, 0, 0.4);
}
.chip-val {
    font-family: 'Playfair Display', serif;
    font-weight: 800;
    font-size: 20px;
    color: var(--champagne-gold, #cfa859);
    display: block;
    line-height: 1.1;
}
.chip-label {
    font-size: 11px;
    font-weight: 700;
    letter-spacing: 1px;
    color: rgba(255, 255, 255, 0.85);
    text-transform: uppercase;
}
</style>

<!-- =======================================================================
     HTML Structure: Clean Cinematic Wedding Hero (IMG_1035.mp4)
     ======================================================================= -->
<section class="wedding-cinema-hero" id="homeHeroSection">
    <!-- Top & Bottom Anamorphic Widescreen Bars -->
    <div class="cinema-letterbox-top"></div>
    <div class="cinema-letterbox-bottom"></div>

    <!-- Floating Audio Sound Control -->
    <div class="hero-sound-control">
        <button id="heroSoundToggle" type="button" class="btn-cinema-sound" aria-label="Toggle Hero Sound">
            <i id="heroSoundIcon" class="bi bi-volume-mute-fill text-warning"></i>
            <span id="heroSoundText">Sound: OFF</span>
        </button>
    </div>

    <!-- 1. Pure Cinematic Background Video Canvas (IMG_1035.mp4 ONLY) -->
    <div class="wedding-video-canvas" id="heroVideoCanvas">
        <video id="heroWeddingVideo" 
               class="wedding-video-elem" 
               autoplay 
               muted 
               loop 
               playsinline 
               preload="auto"
               poster="<?= $appBasePath ?>/uploads/photo store/2.jpeg">
            <source src="<?= $appBasePath ?>/uploads/IMG_1035.mp4" type="video/mp4">
            <source src="<?= $appBasePath ?>/uploads/photo%20store/IMG_1035.MP4" type="video/mp4">
        </video>
        <!-- Luxury Royal Burgundy Vignette -->
        <div class="wedding-video-overlay" id="heroVideoOverlay"></div>
        <div class="wedding-film-grain"></div>
    </div>

    <!-- 2. Center-Aligned Hero Typography & CTAs (Transforms on Scroll) -->
    <div class="container position-relative wedding-hero-content d-flex flex-column align-items-center justify-content-center text-center" id="heroContentWrap">
        <!-- Eyebrow Badge -->
        <div class="wedding-hero-badge mb-3">
            <span class="badge-gold-stars">★ ★ ★ ★ ★</span>
            <span class="badge-text-tag">LUXURY WEDDING PHOTOGRAPHY &bull; CINEMATIC FILMS</span>
        </div>

        <!-- Main Prominent Headline: "Welcome to WoW Studio" -->
        <h1 class="wedding-hero-title font-serif">
            Welcome to <span class="gold-gradient-shimmer">WoW Studio</span>
        </h1>

        <!-- Subtitle / Wedding Cinematic Narrative -->
        <p class="wedding-hero-lead">
            Where your greatest love story meets the artistry of cinema. 
            From royal destination palaces to unscripted emotional moments, 
            experience the finest fine-art photography and Hollywood-grade 4K wedding films.
        </p>

        <!-- The Two Requested Primary Buttons: "Book Now" & "Contact Us" -->
        <div class="wedding-hero-btn-row d-flex flex-wrap justify-content-center gap-3 align-items-center mb-2">
            <a href="<?= $appBasePath ?>/rsvp" class="btn-wedding-primary">
                <i class="bi bi-calendar2-heart-fill me-2"></i> Book Now
            </a>
            <a href="<?= $appBasePath ?>/contact" class="btn-wedding-secondary">
                <i class="bi bi-chat-dots-fill me-2 text-warning"></i> Contact Us &rarr;
            </a>
        </div>

        <!-- Trust Stats Strip -->
        <div class="wedding-trust-strip row g-2 g-md-3 justify-content-center pt-3">
            <div class="col-auto">
                <div class="trust-chip-glass">
                    <span class="chip-val">500+</span>
                    <span class="chip-label">Luxury Weddings</span>
                </div>
            </div>
            <div class="col-auto">
                <div class="trust-chip-glass">
                    <span class="chip-val">4K HDR</span>
                    <span class="chip-label">Cinematic Films</span>
                </div>
            </div>
            <div class="col-auto">
                <div class="trust-chip-glass">
                    <span class="chip-val">10+ Yrs</span>
                    <span class="chip-label">Storytelling</span>
                </div>
            </div>
            <div class="col-auto d-none d-sm-block">
                <div class="trust-chip-glass">
                    <span class="chip-val">100%</span>
                    <span class="chip-label">5-Star Happiness</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- =======================================================================
     Engine Script: Autoplay, Sound Toggle & Cinematic ScrollTrigger Effect
     ======================================================================= -->
<script>
(function() {
    'use strict';

    const video = document.getElementById('heroWeddingVideo');
    const heroSection = document.getElementById('homeHeroSection');
    const heroContent = document.getElementById('heroContentWrap');
    const heroOverlay = document.getElementById('heroVideoOverlay');
    const soundBtn = document.getElementById('heroSoundToggle');
    const soundIcon = document.getElementById('heroSoundIcon');
    const soundText = document.getElementById('heroSoundText');

    if (!video) return;

    // 1. Guaranteed Seamless Autoplay Handler
    function startAutoplay() {
        video.muted = true;
        const playPromise = video.play();
        if (playPromise !== undefined) {
            playPromise.catch(function() {
                const onUserInteract = function() {
                    video.play().catch(function(){});
                    window.removeEventListener('click', onUserInteract);
                    window.removeEventListener('scroll', onUserInteract);
                    window.removeEventListener('touchstart', onUserInteract);
                };
                window.addEventListener('click', onUserInteract, { once: true });
                window.addEventListener('scroll', onUserInteract, { once: true });
                window.addEventListener('touchstart', onUserInteract, { once: true });
            });
        }
    }
    startAutoplay();

    // 2. Audio Sound Toggle
    if (soundBtn) {
        soundBtn.addEventListener('click', function(e) {
            e.stopPropagation();
            if (video.muted) {
                video.muted = false;
                if (soundIcon) soundIcon.className = 'bi bi-volume-up-fill text-warning';
                if (soundText) soundText.textContent = 'Sound: ON';
            } else {
                video.muted = true;
                if (soundIcon) soundIcon.className = 'bi bi-volume-mute-fill text-warning';
                if (soundText) soundText.textContent = 'Sound: OFF';
            }
        });
    }

    // 3. Cinematic Scroll Effect via GSAP ScrollTrigger
    function initHeroScrollEffect() {
        if (typeof gsap === 'undefined' || typeof ScrollTrigger === 'undefined') {
            setTimeout(initHeroScrollEffect, 100);
            return;
        }

        gsap.registerPlugin(ScrollTrigger);

        if (window.globalLenis) {
            window.globalLenis.on('scroll', ScrollTrigger.update);
        }

        // Smooth cinematic camera zoom & depth transition as the user scrolls down
        const heroTimeline = gsap.timeline({
            scrollTrigger: {
                trigger: heroSection,
                start: 'top top',
                end: 'bottom top',
                scrub: 1.2, // Ultra-smooth inertia scrub
                invalidateOnRefresh: true
            }
        });

        // Background Camera Push-in (Subtle, realistic motion without excessive zoom)
        heroTimeline.to(video, {
            scale: 1.05,
            yPercent: 4,
            filter: 'brightness(0.76) contrast(1.12) saturate(1.2)',
            ease: 'none'
        }, 0);

        // Darkening vignette for seamless depth blend
        if (heroOverlay) {
            heroTimeline.to(heroOverlay, {
                opacity: 0.98,
                ease: 'none'
            }, 0);
        }

        // Hero Typography & CTAs float upward with realistic perspective fade
        if (heroContent) {
            heroTimeline.to(heroContent, {
                y: -90,
                scale: 0.94,
                opacity: 0,
                ease: 'power2.in'
            }, 0);
        }
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initHeroScrollEffect);
    } else {
        initHeroScrollEffect();
    }
})();
</script>
