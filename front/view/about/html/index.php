<?php
declare(strict_types=1);

/**
 * ============================================================================
 * WoW STUDIO — ABOUT US PAGE (ULTRA-PREMIUM 10-SECTION CINEMATIC EXPERIENCE)
 * Architecture:
 *   1. About Hero Section (Full-screen video canvas, split-text, scroll zoom)
 *   2. Our Story (Editorial split narrative, line reveals & clip-mask visuals)
 *   3. Our Creative Philosophy (Word-by-word kinetic statement & parallax backdrop)
 *   4. Our Approach / What Makes Us Different (Right-to-left 3D staggered cards)
 *   5. Our Expertise (6 Luxury Services visual showcase with horizontal glide)
 *   6. Our Journey / Milestones (Scroll-drawn golden timeline from DB couple_story)
 *   7. Behind The Lens / Our Team (Editorial 3D portrait showcase from wedding_team)
 *   8. Our Master Collection (Portfolio preview module)
 *   9. Client Love (Floating 3D testimonials showcase module)
 *  10. Final Cinematic CTA (Full-width closing scene module)
 * Theme: Royal Burgundy (#6b1426) & Champagne Gold (#cfa859)
 * File: front/view/about/html/index.php
 * ============================================================================
 */

$appBasePath = $appBasePath ?? '';
$db = \Config\Database::connect();

// Fetch genuine database records
$stories = $db->query("SELECT * FROM couple_story ORDER BY order_num ASC, id ASC")->fetchAll();
$leadArtists = $db->query("SELECT * FROM wedding_team ORDER BY order_num ASC LIMIT 4")->fetchAll();
$galleryPhotos = $db->query("SELECT * FROM gallery ORDER BY order_num ASC LIMIT 12")->fetchAll();
$wishes = $db->query("SELECT * FROM wishes WHERE status = 'approved' ORDER BY id DESC")->fetchAll();

// Fallback team profiles only if wedding_team table is empty
if (empty($leadArtists)) {
    $leadArtists = [
        [
            'name' => 'Vikramaditya Rathore',
            'relation_role' => 'Founder & Master Photographer',
            'bio' => 'Capturing royal weddings across India, Europe, and the Middle East with signature lighting craftsmanship.',
            'photo' => 'uploads/photo store/7.jpeg',
        ],
        [
            'name' => 'Ananya Deshmukh',
            'relation_role' => 'Creative Director & Fine-Art Lead',
            'bio' => 'Specializes in editorial bridal couture, chiaroscuro framing, and soulful documentary storytelling.',
            'photo' => 'uploads/photo store/6.jpeg',
        ],
        [
            'name' => 'Kabir Malhotra',
            'relation_role' => 'Chief Cinematographer',
            'bio' => 'Crafts emotionally driven 4K wedding films using cinema prime lenses and fluid steadicam movement.',
            'photo' => 'uploads/photo store/10.jpeg',
        ],
        [
            'name' => 'Rohan Sengupta',
            'relation_role' => 'Senior Aerial Pilot & Colorist',
            'bio' => 'Captures sweeping palace architecture by air and leads in-house DaVinci Resolve color finishing.',
            'photo' => 'uploads/photo store/14.jpeg',
        ],
    ];
}

// Story milestone photography mapping
$storyImages = [
    1 => 'uploads/photo store/2.jpeg',
    2 => 'uploads/photo store/3.jpeg',
    3 => 'uploads/photo store/5.jpeg',
    4 => 'uploads/photo store/11.jpeg',
];

// Genuine brand approach pillars (What Makes Us Different)
$approachPillars = [
    [
        'num' => '01',
        'tag' => 'AUTHENTICITY FIRST',
        'icon' => 'bi-heart-pulse-fill',
        'title' => 'Unscripted Documentary Soul',
        'desc' => 'Zero stiff scripts or artificial staging. We observe quietly so real laughter, tears of joy, and fleeting family embraces unfold naturally.'
    ],
    [
        'num' => '02',
        'tag' => 'CINEMA OPTICS',
        'icon' => 'bi-camera-reels-fill',
        'title' => 'Sony FX & RED Precision',
        'desc' => 'Dual-system 4K 10-bit LOG cinema bodies paired with fast prime lenses ensure museum-grade clarity in candlelight and daylight.'
    ],
    [
        'num' => '03',
        'tag' => 'COLOR & SOUND',
        'icon' => 'bi-palette2',
        'title' => 'In-House DaVinci Mastering',
        'desc' => 'Every film and editorial album is color-graded and sound-designed by our own senior finishing artists for timeless tonal richness.'
    ],
    [
        'num' => '04',
        'tag' => 'PERSONAL DIRECTION',
        'icon' => 'bi-gem',
        'title' => 'Director-Led Celebrations',
        'desc' => 'We accept a curated calendar each season so our founding directors remain personally invested from pre-planning to final cut.'
    ],
];

// 6 Signature Studio Expertise Disciplines (from docs/aboutus.docs Section 5)
$expertiseList = [
    [
        'num' => '01',
        'tag' => 'HEIRLOOM STILLS',
        'title' => 'Wedding Photography',
        'desc' => 'Timeless bridal portraits, sacred phera rituals, and regal family compositions crafted for generational print albums.',
        'image' => 'uploads/photo store/11.jpeg',
    ],
    [
        'num' => '02',
        'tag' => '4K FEATURE FILMS',
        'title' => 'Cinematic Wedding Films',
        'desc' => 'Narrative wedding cinema blending synchronized ambient vows, heartfelt speeches, and orchestral soundtracks.',
        'image' => 'uploads/photo store/15.jpeg',
    ],
    [
        'num' => '03',
        'tag' => 'COUPLE STORIES',
        'title' => 'Pre-Wedding Films',
        'desc' => 'Intimate dawn and golden hour short films choreographed across historic lakes, fortresses, and architectural landmarks.',
        'image' => 'uploads/photo store/10.jpeg',
    ],
    [
        'num' => '04',
        'tag' => 'GLOBAL TRAVEL CREW',
        'title' => 'Destination Weddings',
        'desc' => 'End-to-end visual production teams experienced across Udaipur, Jaipur, Goa, Lake Como, and international venues.',
        'image' => 'uploads/photo store/2.jpeg',
    ],
    [
        'num' => '05',
        'tag' => 'EMOTIONAL TRUTH',
        'title' => 'Candid Photography',
        'desc' => 'Discreet documentary coverage catching stolen glances, joyful Haldi chaos, and proud parental tears in pristine detail.',
        'image' => 'uploads/photo store/8.jpeg',
    ],
    [
        'num' => '06',
        'tag' => 'GALA & SANGEET',
        'title' => 'Luxury Event Coverage',
        'desc' => 'Multi-camera choreography for Sangeet nights, starlit receptions, architectural drones, and bespoke editorial galas.',
        'image' => 'uploads/photo store/9.jpeg',
    ],
];
?>

<style>
/* =========================================================================
   1. ABOUT HERO SECTION (Full-Screen Video Canvas)
   ========================================================================= */
.about-cinema-hero {
    position: relative;
    width: 100%;
    min-height: 78vh;
    padding: 100px 0 85px;
    background: #070104;
    color: #ffffff;
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden;
    border-bottom: 2px solid var(--champagne-gold, #cfa859);
}

.about-hero-bg-wrap {
    position: absolute;
    inset: -5%;
    z-index: 1;
    overflow: hidden;
    will-change: transform;
    pointer-events: none;
}

.about-hero-bg-img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: center 25%;
    filter: brightness(0.55) contrast(1.08) saturate(1.12);
    transform: scale(1.06);
}

.about-hero-overlay {
    position: absolute;
    inset: 0;
    z-index: 2;
    background:
        radial-gradient(circle at 50% 42%, rgba(107, 20, 38, 0.35) 0%, rgba(10, 1, 4, 0.85) 70%, #050002 100%),
        linear-gradient(180deg, rgba(8, 1, 4, 0.65) 0%, transparent 45%, rgba(8, 1, 4, 0.94) 100%);
    pointer-events: none;
}

.about-hero-content {
    position: relative;
    z-index: 5;
    max-width: 860px;
    margin: 0 auto;
    padding: 0 20px;
    text-align: center;
}

.about-hero-badge {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    background: rgba(20, 3, 7, 0.78);
    border: 1px solid rgba(207, 168, 89, 0.55);
    color: #ffd875;
    font-family: 'Space Grotesk', -apple-system, sans-serif;
    font-size: 11px;
    font-weight: 800;
    letter-spacing: 2.2px;
    text-transform: uppercase;
    padding: 6px 18px;
    border-radius: 40px;
    margin-bottom: 18px;
    backdrop-filter: blur(10px);
}

.about-hero-title {
    color: #ffffff;
    margin-bottom: 18px;
    text-shadow: 0 4px 26px rgba(0, 0, 0, 0.9);
}

.about-hero-word {
    display: inline-block;
    will-change: transform, opacity, filter;
}

.about-hero-lead {
    font-family: 'Playfair Display', Georgia, serif;
    font-style: italic;
    font-size: clamp(16px, 1.35vw, 20px);
    line-height: 1.7;
    color: #f3e6db;
    max-width: 680px;
    margin: 0 auto 30px;
}

.about-scroll-cue {
    display: inline-flex;
    flex-direction: column;
    align-items: center;
    gap: 8px;
    color: rgba(255, 216, 117, 0.85);
    font-family: 'Space Grotesk', -apple-system, sans-serif;
    font-size: 10px;
    font-weight: 700;
    letter-spacing: 2px;
    text-transform: uppercase;
}
.about-scroll-cue-bar {
    width: 1.5px;
    height: 30px;
    background: linear-gradient(180deg, #ffd875, transparent);
    animation: aboutCueBob 1.8s ease-in-out infinite;
}
@keyframes aboutCueBob {
    0%, 100% { transform: translateY(0); opacity: 1; }
    50% { transform: translateY(6px); opacity: 0.4; }
}

/* =========================================================================
   2. OUR STORY (Editorial Split & Clip-Mask Photograph)
   ========================================================================= */
.about-story-section {
    background-color: var(--paper-bg, #faf6f0);
    padding: 95px 0;
    overflow: hidden;
}

.about-story-line {
    will-change: transform, opacity;
}

.about-highlight-word {
    color: var(--royal-burgundy, #6b1426);
    font-weight: 700;
    border-bottom: 1.5px solid rgba(207, 168, 89, 0.65);
}

.about-stat-tile {
    background: #ffffff;
    border: 1.5px solid var(--champagne-gold-border, #e9d6a7);
    border-radius: 16px;
    padding: 18px 20px;
    box-shadow: 0 8px 24px rgba(107, 20, 38, 0.05);
    transition: transform 0.3s ease, border-color 0.3s ease;
}
.about-stat-tile:hover {
    transform: translateY(-3px);
    border-color: var(--champagne-gold, #cfa859);
}

.about-story-frame {
    position: relative;
    perspective: 1200px;
}

.about-story-mask {
    border-radius: 24px;
    overflow: hidden;
    border: 4px solid #ffffff;
    box-shadow: 0 24px 60px rgba(74, 11, 23, 0.18);
    will-change: clip-path, transform;
    background: #140206;
}

.about-story-img {
    width: 100%;
    height: 490px;
    object-fit: cover;
    transition: transform 0.7s ease;
}
.about-story-mask:hover .about-story-img {
    transform: scale(1.05);
}

.about-story-caption {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    padding: 28px 24px;
    background: linear-gradient(180deg, transparent, rgba(20, 3, 7, 0.92));
    color: #ffffff;
}

.about-story-inset-card {
    position: absolute;
    bottom: -24px;
    left: -24px;
    width: 195px;
    height: 220px;
    border-radius: 18px;
    overflow: hidden;
    border: 2px solid var(--champagne-gold, #cfa859);
    box-shadow: 0 18px 40px rgba(0, 0, 0, 0.35);
    z-index: 4;
}
.about-story-inset-card img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

/* =========================================================================
   3. OUR CREATIVE PHILOSOPHY (Word-by-Word Kinetic Statement)
   ========================================================================= */
.about-philosophy-banner {
    position: relative;
    padding: 105px 0;
    background: #080104;
    color: #ffffff;
    overflow: hidden;
    border-top: 1px solid rgba(207, 168, 89, 0.35);
    border-bottom: 1px solid rgba(207, 168, 89, 0.35);
}

.about-philosophy-bg-img {
    position: absolute;
    inset: -12% 0;
    background-size: cover;
    background-position: center;
    opacity: 0.24;
    filter: contrast(1.15) saturate(0.9);
    will-change: transform;
    pointer-events: none;
}

.about-philosophy-shade {
    position: absolute;
    inset: 0;
    background: radial-gradient(circle at 50% 50%, rgba(107, 20, 38, 0.45) 0%, rgba(8, 1, 4, 0.92) 75%);
    pointer-events: none;
}

.about-manifesto-quote {
    font-family: 'Playfair Display', Georgia, serif;
    font-size: clamp(24px, 2.7vw, 38px);
    font-weight: 800;
    line-height: 1.32;
    color: #ffffff;
    max-width: 920px;
    margin: 0 auto 38px;
}

.manifesto-word {
    display: inline-block;
    margin-right: 0.22em;
    will-change: opacity, transform, filter;
}

.about-philo-chip {
    background: rgba(25, 4, 10, 0.78);
    border: 1px solid rgba(207, 168, 89, 0.38);
    border-radius: 16px;
    padding: 18px 20px;
    backdrop-filter: blur(12px);
    height: 100%;
}

/* =========================================================================
   4. OUR APPROACH / WHAT MAKES US DIFFERENT (3D Right-to-Left Cards)
   ========================================================================= */
.about-approach-section {
    background: radial-gradient(circle at 50% 10%, #160208 0%, #070104 70%);
    color: #ffffff;
    padding: 95px 0;
    overflow: hidden;
    perspective: 1600px;
}

.about-approach-card {
    background: linear-gradient(155deg, rgba(38, 6, 15, 0.92) 0%, rgba(16, 2, 7, 0.96) 100%);
    border: 1.5px solid rgba(207, 168, 89, 0.4);
    border-radius: 22px;
    padding: 30px 24px;
    height: 100%;
    box-shadow: 0 22px 55px rgba(0, 0, 0, 0.65);
    transform-style: preserve-3d;
    transition: border-color 0.35s ease, box-shadow 0.35s ease;
    will-change: transform, opacity;
}
.about-approach-card:hover {
    border-color: #ffd875;
    box-shadow: 0 28px 65px rgba(107, 20, 38, 0.5), 0 0 22px rgba(207, 168, 89, 0.28);
}

.approach-icon-orb {
    width: 50px;
    height: 50px;
    border-radius: 14px;
    background: linear-gradient(135deg, var(--royal-burgundy, #6b1426) 0%, #4a0d1a 100%);
    border: 1px solid var(--champagne-gold, #cfa859);
    color: #ffd875;
    display: grid;
    place-items: center;
    font-size: 20px;
}

/* =========================================================================
   5. OUR EXPERTISE (6 Disciplines Visual Showcase)
   ========================================================================= */
.about-expertise-section {
    background-color: #ffffff;
    padding: 95px 0;
    overflow: hidden;
}

.expertise-visual-card {
    position: relative;
    height: 390px;
    border-radius: 22px;
    overflow: hidden;
    border: 1.5px solid var(--champagne-gold-border, #e9d6a7);
    box-shadow: 0 18px 45px rgba(74, 11, 23, 0.12);
    background: #120206;
    display: flex;
    flex-direction: column;
    justify-content: flex-end;
    will-change: transform, opacity;
}

.expertise-card-img {
    position: absolute;
    inset: 0;
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: center 25%;
    transition: transform 0.7s cubic-bezier(0.22, 1, 0.36, 1), filter 0.6s ease;
}
.expertise-visual-card:hover .expertise-card-img {
    transform: scale(1.08);
    filter: brightness(1.04);
}

.expertise-card-scrim {
    position: absolute;
    inset: 0;
    background: linear-gradient(180deg, rgba(10, 1, 4, 0.18) 0%, rgba(10, 1, 4, 0.35) 45%, rgba(16, 2, 7, 0.94) 92%);
    z-index: 1;
}

.expertise-card-body {
    position: relative;
    z-index: 2;
    padding: 24px 22px;
    color: #ffffff;
}

.expertise-tag-pill {
    display: inline-block;
    background: rgba(107, 20, 38, 0.88);
    border: 1px solid rgba(207, 168, 89, 0.65);
    color: #ffd875;
    font-size: 9.5px;
    font-weight: 800;
    letter-spacing: 1.4px;
    text-transform: uppercase;
    padding: 4px 10px;
    border-radius: 20px;
    margin-bottom: 10px;
    white-space: nowrap;
}

.expertise-link-pill {
    display: inline-flex;
    align-items: center;
    gap: 5px;
    font-size: 11px;
    font-weight: 700;
    color: #ffd875;
    text-decoration: none;
    white-space: nowrap;
    transition: transform 0.25s ease, color 0.25s ease;
}
.expertise-visual-card:hover .expertise-link-pill {
    color: #ffffff;
    transform: translateX(4px);
}

/* =========================================================================
   6. OUR JOURNEY / MILESTONES (Scroll-Drawn Vertical Timeline)
   ========================================================================= */
.about-journey-section {
    background-color: var(--paper-bg, #faf6f0);
    padding: 95px 0;
    position: relative;
    overflow: hidden;
}

.about-timeline-wrapper {
    position: relative;
    max-width: 980px;
    margin: 0 auto;
    padding-left: 34px;
}

.about-timeline-track {
    position: absolute;
    left: 10px;
    top: 10px;
    bottom: 10px;
    width: 2px;
    background: rgba(207, 168, 89, 0.25);
}

.about-timeline-progress {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(180deg, var(--royal-burgundy, #6b1426), var(--champagne-gold, #cfa859), #ffd875);
    transform-origin: top center;
    transform: scaleY(0);
    will-change: transform;
}

.about-milestone-card {
    position: relative;
    background: #ffffff;
    border: 1.5px solid var(--champagne-gold-border, #e9d6a7);
    border-radius: 20px;
    padding: 26px;
    margin-bottom: 28px;
    box-shadow: 0 12px 32px rgba(74, 11, 23, 0.05);
    will-change: transform, opacity;
}

.about-milestone-node {
    position: absolute;
    left: -31px;
    top: 30px;
    width: 14px;
    height: 14px;
    border-radius: 50%;
    background: var(--royal-burgundy, #6b1426);
    border: 2.5px solid #ffd875;
    box-shadow: 0 0 12px rgba(207, 168, 89, 0.65);
}

/* =========================================================================
   7. BEHIND THE LENS / OUR TEAM (Editorial Portrait Showcase)
   ========================================================================= */
.about-team-section {
    background: #ffffff;
    padding: 95px 0;
    overflow: hidden;
}

.about-portrait-card {
    position: relative;
    border-radius: 22px;
    overflow: hidden;
    border: 1.5px solid var(--champagne-gold-border, #e9d6a7);
    background: #140207;
    box-shadow: 0 18px 45px rgba(74, 11, 23, 0.12);
    transition: transform 0.35s ease, box-shadow 0.35s ease, border-color 0.35s ease;
    will-change: transform, opacity;
}
.about-portrait-card:hover {
    transform: translateY(-6px);
    border-color: var(--champagne-gold, #cfa859);
    box-shadow: 0 26px 60px rgba(107, 20, 38, 0.22);
}

.about-portrait-media {
    height: 310px;
    overflow: hidden;
    position: relative;
}
.about-portrait-media img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: center top;
    transition: transform 0.65s ease;
}
.about-portrait-card:hover .about-portrait-media img {
    transform: scale(1.07);
}
.about-portrait-overlay {
    position: absolute;
    inset: 0;
    background: linear-gradient(180deg, transparent 45%, rgba(16, 2, 6, 0.94) 100%);
}
.about-portrait-info {
    padding: 20px 20px 22px;
    color: #ffffff;
    background: linear-gradient(180deg, #1a0309 0%, #0d0104 100%);
}

/* Responsive Adjustments */
@media (max-width: 991px) {
    .about-cinema-hero { min-height: 62vh; padding: 80px 0 65px; }
    .about-story-inset-card { display: none; }
    .about-story-img { height: 380px; }
    .about-story-section,
    .about-philosophy-banner,
    .about-approach-section,
    .about-expertise-section,
    .about-journey-section,
    .about-team-section { padding: 70px 0; }
}

@media (max-width: 576px) {
    .about-cinema-hero { min-height: 54vh; padding: 65px 0 55px; }
    .about-story-section,
    .about-philosophy-banner,
    .about-approach-section,
    .about-expertise-section,
    .about-journey-section,
    .about-team-section { padding: 55px 0; }
    .about-timeline-wrapper { padding-left: 24px; }
    .about-milestone-node { left: -21px; }
}
</style>

<!-- =========================================================================
     SECTION 1: ABOUT HERO SECTION
     ========================================================================= -->
<section class="about-cinema-hero" id="aboutHeroSection" aria-label="About WoW Studio">
    <div class="about-hero-bg-wrap" id="aboutHeroBgWrap">
        <img src="<?= $appBasePath ?>/uploads/photo store/4.jpeg"
             alt="WoW Studio Wedding Couple Story"
             class="about-hero-bg-img">
    </div>
    <div class="about-hero-overlay"></div>

    <div class="about-hero-content">
        <div class="about-hero-badge" id="aboutHeroBadge">
            <i class="bi bi-camera-reels-fill"></i>
            <span>ABOUT WoW STUDIO &bull; VISUAL ARTISTRY</span>
        </div>

        <h1 class="about-hero-title" id="aboutHeroTitle">
            <span class="about-hero-word">About</span>
            <span class="about-hero-word" style="color: #ffd875;">WoW Studio</span>
            <span class="about-hero-word">&amp;</span>
            <span class="about-hero-word fst-italic">Visual</span>
            <span class="about-hero-word fst-italic">Artistry</span>
        </h1>

        <p class="about-hero-lead" id="aboutHeroLead">
            "We are storytellers who see the world in chiaroscuro light, intimate micro-moments, and the majestic poetry of grand celebrations."
        </p>

        <div class="about-scroll-cue" aria-hidden="true">
            <span>Discover Our Story</span>
            <span class="about-scroll-cue-bar"></span>
        </div>
    </div>
</section>

<!-- =========================================================================
     SECTION 2: OUR STORY (Emotional Editorial Layout & Clip-Mask Visuals)
     ========================================================================= -->
<section class="about-story-section" id="aboutStorySection">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-6">
                <span class="badge rounded-pill mb-3 px-3 py-1" style="background: var(--royal-burgundy); color: #ffffff; font-size: 11px; letter-spacing: 1.5px;">
                    OUR STORY &bull; CORE VISION
                </span>

                <h2 class="font-serif fw-bold mb-4" style="color: var(--royal-burgundy);">
                    Crafting Visual Heirlooms That Transcend Generations
                </h2>

                <p class="about-story-line text-muted mb-3" style="line-height: 1.85; font-size: 15.5px;">
                    Founded with a fierce passion for <span class="about-highlight-word">unposed cinematography</span> and fine-art photography, <strong>WoW Studio</strong> has become a sought-after visual collective for royal palace weddings in Rajasthan, international celebrations in Europe, and intimate destination love stories.
                </p>

                <p class="about-story-line text-muted mb-4" style="line-height: 1.85; font-size: 15.5px;">
                    We treat every wedding as an independent <span class="about-highlight-word">feature film</span>. No formulaic scripts, no stiff poses &mdash; only authentic emotions captured with cinema primes and color-graded in-house by finishing artists.
                </p>

                <div class="row g-3 pt-1">
                    <div class="col-sm-6">
                        <div class="about-stat-tile about-story-line">
                            <h3 class="font-serif fw-bold mb-1" style="color: var(--royal-burgundy);">500+</h3>
                            <p class="small text-muted mb-0">Weddings Filmed Globally</p>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="about-stat-tile about-story-line">
                            <h3 class="font-serif fw-bold mb-1" style="color: var(--royal-burgundy);">Sony FX &amp; RED</h3>
                            <p class="small text-muted mb-0">Full-Frame Cinema Precision</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="about-story-frame" id="aboutStoryFrame">
                    <div class="about-story-mask" id="aboutStoryMask">
                        <img src="<?= $appBasePath ?>/uploads/photo store/3.jpeg" alt="WoW Studio Crew in Action" class="about-story-img" loading="lazy">
                        <div class="about-story-caption">
                            <span class="badge rounded-pill mb-2 px-3 py-1" style="background: var(--champagne-gold); color: #210409; font-weight: 800; font-size: 10px; letter-spacing: 1px;">
                                PRE-WEDDING CINEMA
                            </span>
                            <h3 class="font-serif text-white mb-0">Udaipur Golden Hour Magic &bull; WoW Studio</h3>
                        </div>
                    </div>

                    <div class="about-story-inset-card" id="aboutStoryInset">
                        <img src="<?= $appBasePath ?>/uploads/photo store/2.jpeg" alt="Royal Couple Detail" loading="lazy">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- =========================================================================
     SECTION 3: OUR CREATIVE PHILOSOPHY (Word-by-Word Kinetic Statement)
     ========================================================================= -->
<section class="about-philosophy-banner" id="aboutPhilosophySection">
    <div class="about-philosophy-bg-img" id="aboutPhilosophyBg" style="background-image: url('<?= $appBasePath ?>/uploads/photo store/10.jpeg');"></div>
    <div class="about-philosophy-shade"></div>

    <div class="container position-relative" style="z-index: 5;">
        <div class="text-center mb-4">
            <span class="badge rounded-pill px-3 py-1 mb-3" style="background: rgba(107, 20, 38, 0.85); border: 1px solid rgba(207, 168, 89, 0.55); color: #ffd875; font-size: 10.5px; letter-spacing: 2px;">
                OUR CREATIVE PHILOSOPHY
            </span>

            <p class="about-manifesto-quote" id="aboutManifestoQuote">
                <span class="manifesto-word">We</span>
                <span class="manifesto-word">do</span>
                <span class="manifesto-word">not</span>
                <span class="manifesto-word">stage</span>
                <span class="manifesto-word">moments</span>
                <span class="manifesto-word">&mdash;</span>
                <span class="manifesto-word">we</span>
                <span class="manifesto-word" style="color: #ffd875;">sculpt</span>
                <span class="manifesto-word" style="color: #ffd875;">living</span>
                <span class="manifesto-word" style="color: #ffd875;">cinema</span>
                <span class="manifesto-word">out</span>
                <span class="manifesto-word">of</span>
                <span class="manifesto-word">fleeting</span>
                <span class="manifesto-word">human</span>
                <span class="manifesto-word">truth.</span>
            </p>
        </div>

        <div class="row g-3 justify-content-center">
            <div class="col-md-4">
                <div class="about-philo-chip text-center">
                    <i class="bi bi-sun-fill text-warning fs-4 mb-2 d-block"></i>
                    <h3 class="text-white mb-1">Natural Chiaroscuro</h3>
                    <p class="small mb-0" style="color: rgba(245, 237, 228, 0.78);">Using authentic courtyard sunlight, diyas, and architectural shadow over artificial strobes.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="about-philo-chip text-center">
                    <i class="bi bi-soundwave text-warning fs-4 mb-2 d-block"></i>
                    <h3 class="text-white mb-1">Acoustic Storytelling</h3>
                    <p class="small mb-0" style="color: rgba(245, 237, 228, 0.78);">Dual-system live recording of sacred mantras, vows, and family blessings for emotional depth.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="about-philo-chip text-center">
                    <i class="bi bi-award-fill text-warning fs-4 mb-2 d-block"></i>
                    <h3 class="text-white mb-1">Archival Elegance</h3>
                    <p class="small mb-0" style="color: rgba(245, 237, 228, 0.78);">Restrained, painterly film tones crafted to remain timeless decades after your wedding day.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- =========================================================================
     SECTION 4: OUR APPROACH / WHAT MAKES US DIFFERENT (Right-to-Left 3D Cards)
     ========================================================================= -->
<section class="about-approach-section" id="aboutApproachSection">
    <div class="container">
        <div class="text-center mb-5">
            <p class="eyebrow" style="color: #ffd875 !important; letter-spacing: 2.2px; margin-bottom: 10px;">
                WHAT MAKES US DIFFERENT
            </p>
            <h2 class="text-white mb-2">The WoW Studio Signature Approach</h2>
            <p class="mx-auto mb-0" style="color: rgba(245, 237, 228, 0.8); max-width: 620px; font-size: 15.5px;">
                Four foundational principles guiding every pre-wedding shoot, destination wedding, and heirloom delivery.
            </p>
        </div>

        <div class="row g-4" id="aboutApproachGrid">
            <?php foreach ($approachPillars as $ap): ?>
                <div class="col-lg-3 col-md-6">
                    <article class="about-approach-card d-flex flex-column justify-content-between">
                        <div>
                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <div class="approach-icon-orb">
                                    <i class="bi <?= htmlspecialchars($ap['icon']) ?>"></i>
                                </div>
                                <span style="font-family: 'Playfair Display', serif; font-size: 26px; font-weight: 800; color: rgba(207, 168, 89, 0.45);">
                                    <?= htmlspecialchars($ap['num']) ?>
                                </span>
                            </div>

                            <span class="d-block mb-2" style="font-family: 'Space Grotesk', sans-serif; font-size: 10px; font-weight: 800; letter-spacing: 1.5px; color: #ffd875;">
                                <?= htmlspecialchars($ap['tag']) ?>
                            </span>

                            <h3 class="text-white mb-2"><?= htmlspecialchars($ap['title']) ?></h3>
                            <p class="small mb-0" style="color: rgba(245, 237, 228, 0.8); line-height: 1.65;">
                                <?= htmlspecialchars($ap['desc']) ?>
                            </p>
                        </div>
                    </article>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- =========================================================================
     SECTION 5: OUR EXPERTISE (6 Luxury Visual Disciplines)
     ========================================================================= -->
<section class="about-expertise-section" id="aboutExpertiseSection">
    <div class="container">
        <div class="d-flex justify-content-between align-items-end flex-wrap gap-3 mb-5">
            <div>
                <p class="eyebrow" style="color: var(--royal-burgundy) !important; letter-spacing: 2px; margin-bottom: 8px;">
                    OUR EXPERTISE &bull; BESPOKE CRAFT
                </p>
                <h2 class="mb-1" style="color: var(--royal-burgundy);">Comprehensive Wedding Visual Disciplines</h2>
                <p class="text-muted mb-0" style="max-width: 600px;">
                    Tailored production units working seamlessly across intimate ceremonies and multi-day royal destination celebrations.
                </p>
            </div>
            <a href="<?= $appBasePath ?>/services" class="btn-royal">
                <span>Explore Full Services</span>
                <i class="bi bi-arrow-right"></i>
            </a>
        </div>

        <div class="row g-4" id="aboutExpertiseGrid">
            <?php foreach ($expertiseList as $exp): ?>
                <div class="col-lg-4 col-md-6">
                    <article class="expertise-visual-card">
                        <img src="<?= $appBasePath ?>/<?= htmlspecialchars($exp['image']) ?>" alt="<?= htmlspecialchars($exp['title']) ?>" class="expertise-card-img" loading="lazy">
                        <div class="expertise-card-scrim"></div>
                        <div class="expertise-card-body">
                            <span class="expertise-tag-pill"><?= htmlspecialchars($exp['tag']) ?></span>
                            <h3 class="text-white mb-2"><?= htmlspecialchars($exp['title']) ?></h3>
                            <p class="small mb-3" style="color: rgba(255, 255, 255, 0.82); line-height: 1.55;">
                                <?= htmlspecialchars($exp['desc']) ?>
                            </p>
                            <div class="d-flex justify-content-between align-items-center pt-2" style="border-top: 1px solid rgba(207, 168, 89, 0.3);">
                                <span style="font-family: 'Courier New', monospace; font-size: 10.5px; color: #ffd875;">
                                    STUDIO UNIT <?= htmlspecialchars($exp['num']) ?>
                                </span>
                                <a href="<?= $appBasePath ?>/services" class="expertise-link-pill">
                                    <span>View Details</span>
                                    <i class="bi bi-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </article>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- =========================================================================
     SECTION 6: OUR JOURNEY / MILESTONES (Scroll-Drawn Vertical Timeline)
     ========================================================================= -->
<section class="about-journey-section" id="aboutJourneySection">
    <div class="container">
        <div class="text-center mb-5">
            <p class="eyebrow" style="color: var(--royal-burgundy) !important; letter-spacing: 2px; margin-bottom: 8px;">
                OUR JOURNEY &bull; STUDIO PILLARS
            </p>
            <h2 class="mb-2" style="color: var(--royal-burgundy);">Milestones &amp; Creative Standards</h2>
            <p class="text-muted mx-auto mb-0" style="max-width: 600px;">
                The defining standards and visual ethos that shaped WoW Studio into a premier wedding cinema house.
            </p>
        </div>

        <div class="about-timeline-wrapper" id="aboutTimelineWrapper">
            <div class="about-timeline-track">
                <div class="about-timeline-progress" id="aboutTimelineLine"></div>
            </div>

            <?php foreach ($stories as $idx => $st):
                $photoSrc = $storyImages[$st['order_num']] ?? 'uploads/photo store/5.jpeg';
                $isEven = ($idx % 2 === 1);
            ?>
                <div class="about-milestone-card">
                    <span class="about-milestone-node"></span>
                    <div class="row align-items-center g-4 <?= $isEven ? 'flex-md-row-reverse' : '' ?>">
                        <div class="col-md-5">
                            <div class="rounded-4 overflow-hidden shadow-sm" style="height: 230px; border: 2px solid var(--champagne-gold);">
                                <img src="<?= $appBasePath ?>/<?= htmlspecialchars($photoSrc) ?>" alt="<?= htmlspecialchars($st['title']) ?>" class="w-100 h-100" style="object-fit: cover;" loading="lazy">
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div class="d-flex justify-content-between align-items-center mb-2 flex-wrap gap-2">
                                <span class="badge rounded-pill px-3 py-1" style="background: var(--royal-burgundy); color: #fff; font-size: 11px;">
                                    <i class="bi bi-star-fill me-1 text-warning"></i> <?= htmlspecialchars($st['story_date']) ?>
                                </span>
                                <span class="font-cursive fs-4" style="color: var(--champagne-gold);">Chapter <?= $idx + 1 ?></span>
                            </div>
                            <h3 class="mb-2" style="color: var(--royal-burgundy);">
                                <?= htmlspecialchars($st['title']) ?>
                            </h3>
                            <p class="text-muted mb-0" style="line-height: 1.75; font-size: 14.5px;">
                                <?= nl2br(htmlspecialchars($st['description'])) ?>
                            </p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- =========================================================================
     SECTION 7: BEHIND THE LENS / OUR TEAM (Editorial Portrait Showcase)
     ========================================================================= -->
<section class="about-team-section" id="aboutTeamSection">
    <div class="container">
        <div class="d-flex justify-content-between align-items-end flex-wrap gap-3 mb-5">
            <div>
                <p class="eyebrow" style="color: var(--royal-burgundy) !important; letter-spacing: 2px; margin-bottom: 8px;">
                    BEHIND THE LENS &bull; OUR CREW
                </p>
                <h2 class="mb-1" style="color: var(--royal-burgundy);">Meet The Creative Directors</h2>
                <p class="text-muted mb-0" style="max-width: 580px;">
                    Cinematographers, fine-art portraitists, drone pilots, and master colorists bringing warmth and precision to your wedding.
                </p>
            </div>
            <a href="<?= $appBasePath ?>/team" class="btn-gold-outline">
                <span>View Full Crew</span>
                <i class="bi bi-arrow-right"></i>
            </a>
        </div>

        <div class="row g-4" id="aboutTeamGrid">
            <?php foreach ($leadArtists as $mem): ?>
                <div class="col-lg-3 col-md-6">
                    <article class="about-portrait-card h-100 d-flex flex-column justify-content-between">
                        <div class="about-portrait-media">
                            <?php if (!empty($mem['photo'])): ?>
                                <img src="<?= $appBasePath ?>/<?= htmlspecialchars($mem['photo']) ?>" alt="<?= htmlspecialchars($mem['name']) ?>" loading="lazy">
                            <?php else: ?>
                                <img src="<?= $appBasePath ?>/uploads/photo store/7.jpeg" alt="<?= htmlspecialchars($mem['name']) ?>" loading="lazy">
                            <?php endif; ?>
                            <div class="about-portrait-overlay"></div>
                        </div>

                        <div class="about-portrait-info flex-grow-1 d-flex flex-column justify-content-between">
                            <div>
                                <h3 class="text-white mb-1"><?= htmlspecialchars($mem['name']) ?></h3>
                                <p class="text-uppercase fw-semibold mb-2" style="color: #ffd875; font-size: 10.5px; letter-spacing: 1px;">
                                    <?= htmlspecialchars($mem['relation_role']) ?>
                                </p>
                                <p class="small mb-3" style="color: rgba(245, 237, 228, 0.78); line-height: 1.55;">
                                    <?= htmlspecialchars($mem['bio'] ?: '') ?>
                                </p>
                            </div>
                            <div class="pt-2 border-top d-flex justify-content-between align-items-center" style="border-color: rgba(207, 168, 89, 0.25) !important;">
                                <span style="font-size: 10.5px; color: rgba(255, 216, 117, 0.85);">
                                    <i class="bi bi-camera-fill me-1"></i> Lead Unit
                                </span>
                                <a href="<?= $appBasePath ?>/team" class="expertise-link-pill">
                                    <span>Profile</span>
                                    <i class="bi bi-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </article>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- =========================================================================
     SECTION 8: OUR MASTER COLLECTION (Reused Portfolio Module)
     ========================================================================= -->
<?php require __DIR__ . '/../../home/html/master_collection.php'; ?>

<!-- =========================================================================
     SECTION 9: CLIENT LOVE (Reused 3D Testimonials Module)
     ========================================================================= -->
<?php require __DIR__ . '/../../home/html/client_love.php'; ?>

<!-- =========================================================================
     SECTION 10: FINAL CINEMATIC CTA (Reused Full-Width Closing Scene)
     ========================================================================= -->
<?php require __DIR__ . '/../../home/html/closing_cinema_cta.php'; ?>

<!-- =========================================================================
     JAVASCRIPT: Section-Specific GSAP + ScrollTrigger Choreography
     ========================================================================= -->
<script>
(function() {
    'use strict';

    function initAboutCinematicExperience() {
        const prefersReduced = window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches;
        if (prefersReduced || typeof gsap === 'undefined') {
            return;
        }

        if (typeof ScrollTrigger !== 'undefined') {
            gsap.registerPlugin(ScrollTrigger);
        }

        // 1. Hero Entrance & Scroll Camera Zoom
        const heroWords = document.querySelectorAll('.about-hero-word');
        const heroTl = gsap.timeline();
        heroTl.fromTo('#aboutHeroBadge',
            { opacity: 0, y: -16 },
            { opacity: 1, y: 0, duration: 0.7, ease: 'power3.out' }
        ).fromTo(heroWords,
            { opacity: 0, y: 35, filter: 'blur(10px)' },
            { opacity: 1, y: 0, filter: 'blur(0px)', duration: 0.9, stagger: 0.08, ease: 'power3.out' },
            0.15
        ).fromTo('#aboutHeroLead',
            { opacity: 0, y: 20, filter: 'blur(8px)' },
            { opacity: 1, y: 0, filter: 'blur(0px)', duration: 0.85, ease: 'power2.out' },
            0.45
        );

        if (typeof ScrollTrigger !== 'undefined') {
            gsap.to('#aboutHeroBgWrap', {
                scale: 1.15,
                yPercent: 6,
                ease: 'none',
                scrollTrigger: {
                    trigger: '#aboutHeroSection',
                    start: 'top top',
                    end: 'bottom top',
                    scrub: 1
                }
            });

            // 2. Our Story Line Reveals & Clip-Mask Image Entrance
            gsap.fromTo('#aboutStorySection .about-story-line',
                { opacity: 0, y: 28 },
                {
                    opacity: 1,
                    y: 0,
                    duration: 0.8,
                    stagger: 0.14,
                    ease: 'power3.out',
                    scrollTrigger: {
                        trigger: '#aboutStorySection',
                        start: 'top 78%',
                        toggleActions: 'play none none reverse'
                    }
                }
            );

            gsap.fromTo('#aboutStoryMask',
                { clipPath: 'inset(0 100% 0 0 round 24px)', opacity: 0.3 },
                {
                    clipPath: 'inset(0 0% 0 0 round 24px)',
                    opacity: 1,
                    duration: 1.15,
                    ease: 'power3.inOut',
                    scrollTrigger: {
                        trigger: '#aboutStorySection',
                        start: 'top 75%',
                        toggleActions: 'play none none reverse'
                    }
                }
            );

            gsap.to('#aboutStoryInset', {
                y: -28,
                ease: 'none',
                scrollTrigger: {
                    trigger: '#aboutStorySection',
                    start: 'top bottom',
                    end: 'bottom top',
                    scrub: 1.1
                }
            });

            // 3. Creative Philosophy Word-by-Word Scroll Reveal & BG Parallax
            gsap.to('#aboutPhilosophyBg', {
                yPercent: 18,
                ease: 'none',
                scrollTrigger: {
                    trigger: '#aboutPhilosophySection',
                    start: 'top bottom',
                    end: 'bottom top',
                    scrub: 1
                }
            });

            gsap.fromTo('#aboutManifestoQuote .manifesto-word',
                { opacity: 0.18, y: 14, filter: 'blur(4px)' },
                {
                    opacity: 1,
                    y: 0,
                    filter: 'blur(0px)',
                    stagger: 0.06,
                    duration: 0.65,
                    ease: 'power2.out',
                    scrollTrigger: {
                        trigger: '#aboutPhilosophySection',
                        start: 'top 75%',
                        toggleActions: 'play none none reverse'
                    }
                }
            );

            // 4. Approach Cards: Cinematic Right-to-Left 3D Entrance
            gsap.fromTo('#aboutApproachGrid .about-approach-card',
                { opacity: 0, x: 95, rotateY: -14, scale: 0.94 },
                {
                    opacity: 1,
                    x: 0,
                    rotateY: 0,
                    scale: 1,
                    duration: 0.95,
                    stagger: 0.14,
                    ease: 'power3.out',
                    scrollTrigger: {
                        trigger: '#aboutApproachSection',
                        start: 'top 76%',
                        toggleActions: 'play none none reverse'
                    }
                }
            );

            // 5. Expertise Grid: Staggered Vertical & Scale Lift
            gsap.fromTo('#aboutExpertiseGrid .expertise-visual-card',
                { opacity: 0, y: 45, scale: 0.95 },
                {
                    opacity: 1,
                    y: 0,
                    scale: 1,
                    duration: 0.85,
                    stagger: 0.1,
                    ease: 'power3.out',
                    scrollTrigger: {
                        trigger: '#aboutExpertiseSection',
                        start: 'top 76%',
                        toggleActions: 'play none none reverse'
                    }
                }
            );

            // 6. Journey Timeline Line Draw & Alternating Milestone Entrance
            gsap.to('#aboutTimelineLine', {
                scaleY: 1,
                ease: 'none',
                scrollTrigger: {
                    trigger: '#aboutTimelineWrapper',
                    start: 'top 72%',
                    end: 'bottom 68%',
                    scrub: 0.8
                }
            });

            gsap.utils.toArray('#aboutTimelineWrapper .about-milestone-card').forEach(function(card, idx) {
                const startX = (idx % 2 === 0) ? -45 : 45;
                gsap.fromTo(card,
                    { opacity: 0, x: startX },
                    {
                        opacity: 1,
                        x: 0,
                        duration: 0.85,
                        ease: 'power3.out',
                        scrollTrigger: {
                            trigger: card,
                            start: 'top 82%',
                            toggleActions: 'play none none reverse'
                        }
                    }
                );
            });

            // 7. Team Editorial Portrait Showcase
            gsap.fromTo('#aboutTeamGrid .about-portrait-card',
                { opacity: 0, y: 40, scale: 0.95 },
                {
                    opacity: 1,
                    y: 0,
                    scale: 1,
                    duration: 0.85,
                    stagger: 0.12,
                    ease: 'power3.out',
                    scrollTrigger: {
                        trigger: '#aboutTeamSection',
                        start: 'top 78%',
                        toggleActions: 'play none none reverse'
                    }
                }
            );
        }

        // Subtle 3D Hover Tilt on Desktop Approach Cards
        if (window.innerWidth > 991) {
            document.querySelectorAll('.about-approach-card').forEach(function(card) {
                card.addEventListener('mousemove', function(e) {
                    const rect = card.getBoundingClientRect();
                    const dx = (e.clientX - rect.left - rect.width / 2) / (rect.width / 2);
                    const dy = (e.clientY - rect.top - rect.height / 2) / (rect.height / 2);
                    card.style.transform = `perspective(900px) rotateX(${(-dy * 6).toFixed(1)}deg) rotateY(${(dx * 7).toFixed(1)}deg) translateY(-4px)`;
                });
                card.addEventListener('mouseleave', function() {
                    card.style.transform = '';
                });
            });
        }
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initAboutCinematicExperience);
    } else {
        initAboutCinematicExperience();
    }
})();
</script>
