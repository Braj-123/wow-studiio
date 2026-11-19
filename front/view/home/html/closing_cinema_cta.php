<?php
/**
 * ============================================================================
 * WoW STUDIO — CLOSING CINEMA CTA (LET'S CREATE CINEMA TOGETHER • 2026–2027)
 * Mode: Full-Width Luxury Film Closing Scene & Interactive Magnetic CTA
 * Features:
 *   - Slow-motion cinema footage canvas with film grain & color grading overlay
 *   - Slow cinematic camera zoom & depth parallax synced with ScrollTrigger
 *   - Kinetic split-word blur-to-sharp headline reveal & separate 2026–2027 badge
 *   - Animated champagne gold underline accent & floating light leaks
 *   - Magnetic 3D hover CTA buttons with light sweep shimmer & arrow choreography
 *   - Respects prefers-reduced-motion with clean static fallback
 * Theme: Royal Burgundy (#6b1426) & Champagne Gold (#cfa859)
 * File: front/view/home/html/closing_cinema_cta.php
 * ============================================================================
 */

$appBasePath = $appBasePath ?? '';
?>

<style>
/* -------------------------------------------------------------------------
   1. Full-Width Closing Cinema Section Container
   ------------------------------------------------------------------------- */
.closing-cinema-section {
    position: relative;
    width: 100%;
    min-height: 620px;
    padding: 100px 0 95px;
    margin: 0;
    background: #070104;
    color: #ffffff;
    overflow: hidden;
    display: flex;
    align-items: center;
    justify-content: center;
    border-top: 1px solid rgba(207, 168, 89, 0.35);
    perspective: 1800px;
    -webkit-perspective: 1800px;
}

/* -------------------------------------------------------------------------
   2. Background Video / Camera Canvas, Color Grading & Light Leaks
   ------------------------------------------------------------------------- */
.closing-cinema-bg {
    position: absolute;
    inset: -6%;
    z-index: 1;
    overflow: hidden;
    will-change: transform;
    pointer-events: none;
}

.closing-bg-video {
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: center center;
    filter: brightness(0.45) contrast(1.12) saturate(1.15);
    transform: scale(1.06);
    will-change: transform;
}

.closing-cinema-grading {
    position: absolute;
    inset: 0;
    z-index: 2;
    background: 
        radial-gradient(circle at 50% 40%, rgba(107, 20, 38, 0.32) 0%, rgba(12, 2, 6, 0.85) 65%, #050002 100%),
        linear-gradient(180deg, #080104 0%, rgba(10, 1, 4, 0.35) 35%, rgba(18, 2, 7, 0.55) 75%, #1a0409 100%);
    pointer-events: none;
}

.closing-film-grain {
    position: absolute;
    inset: 0;
    z-index: 3;
    opacity: 0.055;
    pointer-events: none;
    background-image: radial-gradient(rgba(255, 255, 255, 0.7) 1px, transparent 0);
    background-size: 3px 3px;
}

/* Soft Light Leaks & Floating Particles */
.closing-light-leak-1 {
    position: absolute;
    top: -15%;
    left: -10%;
    width: 680px;
    height: 680px;
    border-radius: 50%;
    background: radial-gradient(circle, rgba(207, 168, 89, 0.22) 0%, rgba(107, 20, 38, 0.18) 45%, transparent 70%);
    filter: blur(90px);
    z-index: 4;
    pointer-events: none;
    animation: closingLeakDrift 15s ease-in-out infinite alternate;
}

.closing-light-leak-2 {
    position: absolute;
    bottom: -20%;
    right: -8%;
    width: 720px;
    height: 720px;
    border-radius: 50%;
    background: radial-gradient(circle, rgba(107, 20, 38, 0.38) 0%, rgba(207, 168, 89, 0.14) 45%, transparent 72%);
    filter: blur(100px);
    z-index: 4;
    pointer-events: none;
    animation: closingLeakDrift 19s ease-in-out infinite alternate-reverse;
}

.closing-particles-layer {
    position: absolute;
    inset: 0;
    z-index: 4;
    pointer-events: none;
    background-image: 
        radial-gradient(1.5px 1.5px at 80px 120px, rgba(255, 216, 117, 0.75), transparent),
        radial-gradient(1px 1px at 260px 60px, rgba(255, 255, 255, 0.5), transparent),
        radial-gradient(2px 2px at 420px 210px, rgba(207, 168, 89, 0.65), transparent),
        radial-gradient(1px 1px at 590px 130px, rgba(255, 255, 255, 0.45), transparent);
    background-size: 640px 320px;
    opacity: 0.45;
    animation: closingParticlesFloat 36s linear infinite;
}

@keyframes closingLeakDrift {
    0% { transform: translate(0, 0) scale(1); }
    100% { transform: translate(40px, -28px) scale(1.12); }
}

@keyframes closingParticlesFloat {
    0% { background-position: 0 0; }
    100% { background-position: 640px -320px; }
}

/* -------------------------------------------------------------------------
   3. Centered Luxury Stage & Typography Choreography
   ------------------------------------------------------------------------- */
.closing-cinema-container {
    position: relative;
    z-index: 10;
    width: 95%;
    max-width: 1060px;
    margin: 0 auto;
    text-align: center;
    padding: 48px 32px;
    border-radius: 28px;
    background: linear-gradient(155deg, rgba(35, 6, 15, 0.72) 0%, rgba(16, 2, 7, 0.84) 60%, rgba(8, 1, 3, 0.90) 100%);
    border: 1.5px solid rgba(207, 168, 89, 0.45);
    box-shadow: 
        0 35px 95px rgba(0, 0, 0, 0.82),
        0 12px 35px rgba(107, 20, 38, 0.45),
        inset 0 1px 0 rgba(255, 255, 255, 0.25);
    backdrop-filter: blur(18px);
    -webkit-backdrop-filter: blur(18px);
}

/* Eyebrow + Season Badge Row */
.closing-eyebrow-bar {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    flex-wrap: wrap;
    gap: 12px;
    margin-bottom: 20px;
}

.closing-eyebrow-pill {
    display: inline-flex;
    align-items: center;
    gap: 9px;
    background: rgba(18, 3, 7, 0.85);
    border: 1px solid rgba(207, 168, 89, 0.48);
    padding: 6px 18px;
    border-radius: 40px;
    box-shadow: 0 6px 20px rgba(0, 0, 0, 0.45);
}

.closing-beacon {
    width: 7px;
    height: 7px;
    border-radius: 50%;
    background: #ffd875;
    box-shadow: 0 0 10px #ffd875;
    animation: closingBeaconPulse 2s infinite ease-in-out;
}

@keyframes closingBeaconPulse {
    0%, 100% { transform: scale(1); opacity: 1; }
    50% { transform: scale(1.45); opacity: 0.65; }
}

.closing-eyebrow-label {
    font-family: 'Space Grotesk', -apple-system, sans-serif;
    font-size: 11px;
    font-weight: 800;
    letter-spacing: 2.2px;
    color: #ffffff;
    text-transform: uppercase;
}

.closing-season-badge {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    background: linear-gradient(135deg, #ffd875 0%, var(--champagne-gold, #cfa859) 100%);
    color: #1f0409;
    font-family: 'Space Grotesk', -apple-system, sans-serif;
    font-size: 11px;
    font-weight: 900;
    letter-spacing: 1.8px;
    padding: 6px 15px;
    border-radius: 40px;
    box-shadow: 0 6px 18px rgba(207, 168, 89, 0.45);
    will-change: transform, opacity;
}

/* Focal Headline (Unified H2 Professional Scale) */
.closing-cinema-title {
    font-family: 'Playfair Display', Georgia, serif;
    font-size: clamp(26px, 2.8vw, 38px);
    line-height: 1.22;
    font-weight: 800;
    color: #ffffff;
    letter-spacing: -0.4px;
    margin: 0 auto 14px;
    max-width: 780px;
    text-shadow: 0 4px 25px rgba(0, 0, 0, 0.9);
}

.closing-split-word {
    display: inline-block;
    will-change: transform, opacity, filter;
    transform-origin: center bottom;
}

.closing-gold-accent {
    color: #ffd875;
    background: linear-gradient(135deg, #ffe4a0 0%, #cfa859 45%, #ffd875 80%, #b58838 100%);
    background-clip: text;
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    font-style: italic;
}

/* Animated Gold Accent Underline */
.closing-accent-underline {
    width: 140px;
    height: 2px;
    margin: 0 auto 22px;
    border-radius: 2px;
    background: linear-gradient(90deg, transparent 0%, #ffd875 50%, transparent 100%);
    box-shadow: 0 0 14px rgba(255, 216, 117, 0.65);
    transform-origin: center;
    will-change: transform, opacity;
}

.closing-cinema-subtitle {
    font-family: 'Plus Jakarta Sans', -apple-system, sans-serif;
    font-size: clamp(14.5px, 1.15vw, 17px);
    line-height: 1.7;
    color: rgba(245, 237, 228, 0.86);
    max-width: 650px;
    margin: 0 auto 34px;
}

/* -------------------------------------------------------------------------
   4. Magnetic CTA Buttons with Sweep Light & Arrow Choreography
   ------------------------------------------------------------------------- */
.closing-cta-actions {
    display: flex;
    justify-content: center;
    align-items: center;
    flex-wrap: wrap;
    gap: 16px;
}

.btn-closing-primary,
.btn-closing-secondary,
.btn-closing-tertiary {
    position: relative;
    overflow: hidden;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 9px;
    border-radius: 40px;
    font-family: 'Space Grotesk', -apple-system, sans-serif;
    font-size: 13.5px;
    font-weight: 800;
    letter-spacing: 0.6px;
    text-decoration: none;
    white-space: nowrap !important;
    flex-shrink: 0 !important;
    transition: transform 0.25s cubic-bezier(0.22, 1, 0.36, 1), box-shadow 0.3s ease, border-color 0.3s ease, background 0.3s ease;
    will-change: transform;
}

.btn-closing-primary {
    padding: 15px 32px;
    background: linear-gradient(135deg, #ffd875 0%, var(--champagne-gold, #cfa859) 100%);
    color: #210409 !important;
    border: 1.5px solid #ffe7a8;
    box-shadow: 0 12px 32px rgba(207, 168, 89, 0.42);
}

.btn-closing-primary:hover {
    box-shadow: 0 18px 42px rgba(255, 216, 117, 0.58);
    color: #160205 !important;
}

/* Light Sweep Shimmer Effect */
.btn-closing-primary::before,
.btn-closing-secondary::before,
.btn-closing-tertiary::before {
    content: '';
    position: absolute;
    top: 0;
    left: -120%;
    width: 60%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.45), transparent);
    transform: skewX(-22deg);
    transition: left 0.65s ease;
    pointer-events: none;
}

.btn-closing-primary:hover::before,
.btn-closing-secondary:hover::before,
.btn-closing-tertiary:hover::before {
    left: 140%;
}

.btn-closing-primary .cta-arrow-icon,
.btn-closing-tertiary .cta-arrow-icon {
    transition: transform 0.3s ease;
}

.btn-closing-primary:hover .cta-arrow-icon,
.btn-closing-tertiary:hover .cta-arrow-icon {
    transform: translateX(5px);
}

.btn-closing-secondary {
    padding: 15px 28px;
    background: rgba(107, 20, 38, 0.72);
    border: 1.5px solid rgba(207, 168, 89, 0.65);
    color: #ffffff !important;
    box-shadow: 0 10px 26px rgba(0, 0, 0, 0.45);
    backdrop-filter: blur(10px);
}

.btn-closing-secondary:hover {
    background: linear-gradient(135deg, #8a1a32 0%, var(--royal-burgundy, #6b1426) 100%);
    border-color: #ffd875;
    box-shadow: 0 14px 34px rgba(107, 20, 38, 0.72);
    color: #ffffff !important;
}

.btn-closing-tertiary {
    padding: 15px 26px;
    background: rgba(255, 255, 255, 0.07);
    border: 1.5px solid rgba(255, 255, 255, 0.28);
    color: #ffffff !important;
    backdrop-filter: blur(10px);
}

.btn-closing-tertiary:hover {
    background: rgba(255, 255, 255, 0.16);
    border-color: #ffd875;
    color: #ffd875 !important;
}

/* Minimal Scroll-to-Footer Cue */
.closing-footer-cue {
    margin-top: 34px;
    display: inline-flex;
    flex-direction: column;
    align-items: center;
    gap: 6px;
    color: rgba(207, 168, 89, 0.75);
    font-family: 'Space Grotesk', -apple-system, sans-serif;
    font-size: 9.5px;
    font-weight: 700;
    letter-spacing: 2px;
    text-transform: uppercase;
}

.closing-cue-line {
    width: 1px;
    height: 22px;
    background: linear-gradient(180deg, rgba(255, 216, 117, 0.85), transparent);
    animation: cuePulse 2s ease-in-out infinite;
}

@keyframes cuePulse {
    0%, 100% { transform: scaleY(1); opacity: 0.9; }
    50% { transform: scaleY(0.55); opacity: 0.45; }
}

/* -------------------------------------------------------------------------
   5. Responsive Rules & Reduced Motion Accessibility
   ------------------------------------------------------------------------- */
@media (max-width: 991px) {
    .closing-cinema-section {
        min-height: 540px;
        padding: 70px 0 65px;
    }
    .closing-cinema-container {
        padding: 38px 24px;
    }
}

@media (max-width: 576px) {
    .closing-cinema-section {
        min-height: auto;
        padding: 55px 0 50px;
    }
    .closing-cinema-container {
        padding: 30px 18px;
        border-radius: 22px;
    }
    .btn-closing-primary,
    .btn-closing-secondary,
    .btn-closing-tertiary {
        width: 100%;
        padding: 13px 20px;
        font-size: 13px;
    }
}

@media (prefers-reduced-motion: reduce) {
    .closing-light-leak-1,
    .closing-light-leak-2,
    .closing-particles-layer,
    .closing-beacon,
    .closing-cue-line {
        animation: none !important;
    }
    .closing-bg-video {
        transform: none !important;
    }
}
</style>

<section class="closing-cinema-section" id="closingCinemaSection" aria-label="Let's Create Cinema Together 2026-2027">
    <!-- 1. Slow-Motion Cinema Background Canvas -->
    <div class="closing-cinema-bg" id="closingCinemaBg">
        <video class="closing-bg-video"
               id="closingBgVideo"
               autoplay
               muted
               loop
               playsinline
               preload="metadata"
               poster="<?= $appBasePath ?>/uploads/photo store/15.jpeg">
            <source src="<?= $appBasePath ?>/uploads/photo%20store/WhatsApp%20Video%202026-11-16%20at%208.50.54%20PM.mp4" type="video/mp4">
            <source src="<?= $appBasePath ?>/uploads/IMG_1035.mp4" type="video/mp4">
        </video>
        <div class="closing-cinema-grading"></div>
        <div class="closing-film-grain"></div>
    </div>

    <!-- Ambient Light Leaks & Floating Particles -->
    <div class="closing-light-leak-1" aria-hidden="true"></div>
    <div class="closing-light-leak-2" aria-hidden="true"></div>
    <div class="closing-particles-layer" aria-hidden="true"></div>

    <!-- 2. Centered Cinematic Closing Card -->
    <div class="closing-cinema-container" id="closingCinemaCard">
        <!-- Eyebrow & Separately Animated 2026-2027 Season Badge -->
        <div class="closing-eyebrow-bar">
            <div class="closing-eyebrow-pill" id="closingEyebrowPill">
                <span class="closing-beacon"></span>
                <span class="closing-eyebrow-label">LET'S CREATE CINEMA TOGETHER</span>
            </div>
            <span class="closing-season-badge" id="closingSeasonBadge">
                <i class="bi bi-sparkles"></i> 2026&ndash;2027
            </span>
        </div>

        <!-- Split-Word Focal Headline -->
        <h2 class="closing-cinema-title" id="closingCinemaTitle">
            <span class="closing-split-word">Planning</span>
            <span class="closing-split-word">A</span>
            <span class="closing-split-word closing-gold-accent">Luxury</span>
            <span class="closing-split-word closing-gold-accent">Wedding</span>
            <span class="closing-split-word">Or</span>
            <span class="closing-split-word">Destination</span>
            <span class="closing-split-word">Shoot?</span>
        </h2>

        <!-- Animated Champagne Gold Underline -->
        <div class="closing-accent-underline" id="closingAccentUnderline"></div>

        <!-- Supporting Narrative -->
        <p class="closing-cinema-subtitle" id="closingCinemaSubtitle">
            Connect with WoW Studio today to discuss your vision, review available dates, and receive a customized photography &amp; film proposal.
        </p>

        <!-- Magnetic Interactive CTA Actions -->
        <div class="closing-cta-actions" id="closingCtaActions">
            <a href="<?= $appBasePath ?>/rsvp" class="btn-closing-primary magnetic-cta">
                <i class="bi bi-calendar2-check-fill"></i>
                <span>Inquire Availability</span>
                <i class="bi bi-arrow-right cta-arrow-icon"></i>
            </a>

            <a href="<?= $appBasePath ?>/contact" class="btn-closing-tertiary magnetic-cta">
                <i class="bi bi-chat-dots-fill text-warning"></i>
                <span>Let's Talk</span>
                <i class="bi bi-arrow-right cta-arrow-icon"></i>
            </a>

            <a href="tel:+919876543210" class="btn-closing-secondary magnetic-cta">
                <i class="bi bi-telephone-fill text-warning"></i>
                <span>+91 98765 43210</span>
            </a>
        </div>

        <!-- Seamless Transition Cue to Footer -->
        <div class="closing-footer-cue" aria-hidden="true">
            <span class="closing-cue-line"></span>
            <span>WoW Studio Finale</span>
        </div>
    </div>
</section>

<!-- =======================================================================
     Engine Script: GSAP + ScrollTrigger Choreography & Magnetic CTA Physics
     ======================================================================= -->
<script>
(function() {
    'use strict';

    function initClosingCinemaSection() {
        const section = document.getElementById('closingCinemaSection');
        const bgCanvas = document.getElementById('closingCinemaBg');
        const bgVideo = document.getElementById('closingBgVideo');
        const card = document.getElementById('closingCinemaCard');
        const eyebrow = document.getElementById('closingEyebrowPill');
        const seasonBadge = document.getElementById('closingSeasonBadge');
        const words = document.querySelectorAll('.closing-split-word');
        const underline = document.getElementById('closingAccentUnderline');
        const subtitle = document.getElementById('closingCinemaSubtitle');
        const ctaGroup = document.getElementById('closingCtaActions');
        const magneticBtns = document.querySelectorAll('.magnetic-cta');

        if (!section) return;

        // Ensure background video attempts silent autoplay cleanly
        if (bgVideo) {
            bgVideo.muted = true;
            const playRes = bgVideo.play();
            if (playRes !== undefined) {
                playRes.catch(function() {});
            }
        }

        const prefersReduced = window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches;
        if (prefersReduced || typeof gsap === 'undefined') {
            return;
        }

        if (typeof ScrollTrigger !== 'undefined') {
            gsap.registerPlugin(ScrollTrigger);
        }

        // 1. Progressive Scroll-Driven Entrance & Reverse Choreography
        const entranceTl = gsap.timeline({
            scrollTrigger: {
                trigger: section,
                start: 'top 80%',
                end: 'bottom 20%',
                toggleActions: 'play none none reverse'
            }
        });

        entranceTl.fromTo(card,
            { opacity: 0, y: 45, scale: 0.96 },
            { opacity: 1, y: 0, scale: 1, duration: 0.9, ease: 'power3.out' },
            0
        );

        entranceTl.fromTo(eyebrow,
            { opacity: 0, x: -25 },
            { opacity: 1, x: 0, duration: 0.65, ease: 'power3.out' },
            0.15
        );

        entranceTl.fromTo(seasonBadge,
            { opacity: 0, scale: 0.75, y: -10 },
            { opacity: 1, scale: 1, y: 0, duration: 0.65, ease: 'back.out(1.7)' },
            0.25
        );

        entranceTl.fromTo(words,
            { opacity: 0, y: 30, rotationX: -20, filter: 'blur(10px)' },
            {
                opacity: 1,
                y: 0,
                rotationX: 0,
                filter: 'blur(0px)',
                duration: 0.85,
                stagger: 0.06,
                ease: 'power3.out'
            },
            0.3
        );

        entranceTl.fromTo(underline,
            { scaleX: 0, opacity: 0 },
            { scaleX: 1, opacity: 1, duration: 0.8, ease: 'power3.inOut' },
            0.55
        );

        entranceTl.fromTo(subtitle,
            { opacity: 0, y: 20, filter: 'blur(6px)' },
            { opacity: 1, y: 0, filter: 'blur(0px)', duration: 0.8, ease: 'power2.out' },
            0.65
        );

        entranceTl.fromTo(ctaGroup,
            { opacity: 0, y: 22 },
            { opacity: 1, y: 0, duration: 0.75, ease: 'power3.out' },
            0.8
        );

        // 2. Scroll-Synchronized Slow Cinematic Camera Zoom & Depth Parallax
        if (bgCanvas && typeof ScrollTrigger !== 'undefined') {
            gsap.fromTo(bgCanvas,
                { scale: 1.02, yPercent: -4 },
                {
                    scale: 1.14,
                    yPercent: 4,
                    ease: 'none',
                    scrollTrigger: {
                        trigger: section,
                        start: 'top bottom',
                        end: 'bottom top',
                        scrub: 1.2
                    }
                }
            );
        }

        // 3. Magnetic 3D Cursor Tracking on Desktop CTAs
        if (window.innerWidth > 991) {
            magneticBtns.forEach(function(btn) {
                btn.addEventListener('mousemove', function(e) {
                    const rect = btn.getBoundingClientRect();
                    const relX = e.clientX - rect.left - rect.width / 2;
                    const relY = e.clientY - rect.top - rect.height / 2;
                    const moveX = relX * 0.22;
                    const moveY = relY * 0.28;
                    btn.style.transform = `translate3d(${moveX.toFixed(1)}px, ${moveY.toFixed(1)}px, 0) scale(1.03)`;
                });

                btn.addEventListener('mouseleave', function() {
                    btn.style.transform = '';
                });
            });
        }
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initClosingCinemaSection);
    } else {
        initClosingCinemaSection();
    }
})();
</script>
