<?php
declare(strict_types=1);

/**
 * ============================================================================
 * WoW STUDIO — OUR PROJECTS PAGE (ULTRA-PREMIUM CINEMATIC PORTFOLIO)
 * Architecture:
 *   1. Cinematic Project Hero (Full-screen video backdrop, split-text, zoom)
 *   2. Animated Project Category Filter (Dynamic from genuine data + sessionStorage)
 *   3. Asymmetrical Editorial Portfolio Grid (Clip-mask reveals & staggered depth)
 *   4. Advanced 3D Hover Interactions (Cursor tilt, image zoom & arrow sweep)
 *   5. Featured Project Storytelling Modal (Cover, gallery strip, prev/next nav)
 *   6. Horizontal Cinematic Gallery (Scroll-linked Scrub right-to-left motion)
 *   7. Genuine Project Details & Signature Experiences Showcase
 *   8. Load More Functionality (Preserves active filter & staggers new reveals)
 *   9. Final Cinematic CTA ("YOUR STORY DESERVES TO BE A MASTERPIECE")
 * Theme: Royal Burgundy (#6b1426) & Champagne Gold (#cfa859)
 * File: front/view/events/html/index.php
 * ============================================================================
 */

$appBasePath = $appBasePath ?? '';
$db = \Config\Database::connect();

// Fetch genuine database records
$events = $db->query("SELECT * FROM wedding_events ORDER BY order_num ASC, event_date ASC")->fetchAll();
$galleryRows = $db->query("SELECT * FROM gallery ORDER BY order_num ASC, id ASC")->fetchAll();

// Map event photography from genuine uploads
$eventPhotos = [
    1 => 'uploads/photo store/10.jpeg',
    2 => 'uploads/photo store/9.jpeg',
    3 => 'uploads/photo store/11.jpeg',
    4 => 'uploads/photo store/15.jpeg',
];

// Index gallery photos by category so each project showcases genuine gallery frames
$galleryByCat = [];
foreach ($galleryRows as $g) {
    $catKey = strtolower(trim((string)($g['category'] ?? 'wedding')));
    $galleryByCat[$catKey][] = $g['image_url'];
}

// Build genuine unified portfolio project items from wedding_events + gallery
$projects = [];

// 1. Add each Signature Production Project from wedding_events
foreach ($events as $idx => $ev) {
    $orderNum = (int)($ev['order_num'] ?? ($idx + 1));
    $cover = $eventPhotos[$orderNum] ?? 'uploads/photo store/11.jpeg';
    $titleLower = strtolower((string)($ev['title'] ?? ''));

    if (str_contains($titleLower, 'pre-wedding')) {
        $catSlug = 'pre-wedding';
        $catLabel = 'Pre-Wedding';
        $eventType = 'Pre-Wedding & Editorial Shoot';
        $relatedGallery = $galleryByCat['pre-wedding'] ?? [$cover, 'uploads/photo store/2.jpeg', 'uploads/photo store/3.jpeg'];
    } elseif (str_contains($titleLower, 'sangeet') || str_contains($titleLower, 'mehndi') || str_contains($titleLower, 'haldi')) {
        $catSlug = 'haldi-mehndi';
        $catLabel = 'Haldi & Mehndi';
        $eventType = 'Haldi, Mehndi & Sangeet Cinema';
        $relatedGallery = $galleryByCat['sangeet'] ?? [$cover, 'uploads/photo store/9.jpeg', 'uploads/photo store/8.jpeg'];
    } elseif (str_contains($titleLower, 'reception') || str_contains($titleLower, 'gala') || str_contains($titleLower, 'party')) {
        $catSlug = 'party';
        $catLabel = 'Party & Reception';
        $eventType = 'Grand Reception & After-Party';
        $relatedGallery = $galleryByCat['reception'] ?? [$cover, 'uploads/photo store/15.jpeg', 'uploads/photo store/14.jpeg'];
    } else {
        $catSlug = 'wedding';
        $catLabel = 'Wedding';
        $eventType = 'Sacred Wedding & Pheras';
        $relatedGallery = $galleryByCat['wedding'] ?? [$cover, 'uploads/photo store/11.jpeg', 'uploads/photo store/12.jpeg'];
    }

    array_unshift($relatedGallery, $cover);
    $relatedGallery = array_values(array_unique($relatedGallery));

    $projects[] = [
        'id'          => 'ev-' . ($ev['id'] ?? $idx),
        'title'       => $ev['title'] ?? 'Signature Wedding Project',
        'event_type'  => $eventType,
        'category'    => $catSlug,
        'cat_label'   => $catLabel,
        'location'    => trim((string)($ev['venue'] ?? 'WoW Studio Destination')),
        'address'     => trim((string)($ev['address'] ?? '')),
        'timing'      => trim((string)($ev['start_time'] ?? '')) . (!empty($ev['end_time']) ? ' – ' . trim((string)$ev['end_time']) : ''),
        'description' => trim((string)($ev['description'] ?? 'Multi-camera cinematic celebration production.')),
        'cover'       => $cover,
        'gallery'     => array_slice($relatedGallery, 0, 5),
        'layout'      => ($idx === 0) ? 'featured-wide' : (($idx % 3 === 1) ? 'portrait-tall' : 'standard'),
    ];
}

// 2. All Celebration & Function Showcases (Engagement, Anniversary, Birthday, Party, Maternity, Corporate)
$functionShowcases = [
    [
        'id'          => 'fn-eng-1',
        'title'       => 'Royal Ring Ceremony & Roka Celebration',
        'event_type'  => 'Engagement & Roka',
        'category'    => 'engagement',
        'cat_label'   => 'Engagement & Roka',
        'location'    => 'Rambagh Palace Lawns, Jaipur',
        'address'     => '',
        'timing'      => '',
        'description' => 'Intimate family blessings, ring exchange close-ups, and golden champagne celebration documented in signature editorial warmth.',
        'cover'       => 'uploads/photo store/5.jpeg',
        'gallery'     => ['uploads/photo store/5.jpeg', 'uploads/photo store/4.jpeg', 'uploads/photo store/2.jpeg'],
        'layout'      => 'portrait-tall',
    ],
    [
        'id'          => 'fn-ann-1',
        'title'       => '25th Silver Jubilee Palace Gala',
        'event_type'  => 'Milestone Anniversary',
        'category'    => 'anniversary',
        'cat_label'   => 'Anniversary',
        'location'    => 'Taj Lake Palace, Udaipur',
        'address'     => '',
        'timing'      => '',
        'description' => 'Generations gathered together for an emotional silver jubilee evening featuring vow renewals, live string music, and candlelit family portraits.',
        'cover'       => 'uploads/photo store/14.jpeg',
        'gallery'     => ['uploads/photo store/14.jpeg', 'uploads/photo store/15.jpeg', 'uploads/photo store/13.jpeg'],
        'layout'      => 'standard',
    ],
    [
        'id'          => 'fn-bday-1',
        'title'       => 'Luxury Milestone Birthday Celebration',
        'event_type'  => 'Milestone Birthday Party',
        'category'    => 'birthday',
        'cat_label'   => 'Birthday',
        'location'    => 'Fairmont Courtyard, Jaipur',
        'address'     => '',
        'timing'      => '',
        'description' => 'Custom floral installations, spontaneous laughter across kids and grandparents, and dynamic flash-editorial party storytelling.',
        'cover'       => 'uploads/photo store/13.jpeg',
        'gallery'     => ['uploads/photo store/13.jpeg', 'uploads/photo store/9.jpeg', 'uploads/photo store/18.jpeg'],
        'layout'      => 'featured-wide',
    ],
    [
        'id'          => 'fn-party-1',
        'title'       => 'Starlit Cocktail & After-Party Night',
        'event_type'  => 'Cocktail & Private Party',
        'category'    => 'party',
        'cat_label'   => 'Party & Reception',
        'location'    => 'Grand Ballroom, Goa',
        'address'     => '',
        'timing'      => '',
        'description' => 'Kinetic dance floor cinematography, crystal chandelier flares, and candid late-night celebration frames with multi-cam audio.',
        'cover'       => 'uploads/photo store/9.jpeg',
        'gallery'     => ['uploads/photo store/9.jpeg', 'uploads/photo store/15.jpeg', 'uploads/photo store/18.jpeg'],
        'layout'      => 'standard',
    ],
    [
        'id'          => 'fn-mat-1',
        'title'       => 'Golden Hour Maternity & Godh Bharai',
        'event_type'  => 'Maternity & Baby Shower',
        'category'    => 'maternity',
        'cat_label'   => 'Maternity & Baby Shower',
        'location'    => 'Heritage Gardens, Udaipur',
        'address'     => '',
        'timing'      => '',
        'description' => 'Delicate sunset maternity portraiture paired with colorful traditional Godh Bharai rituals surrounded by loved ones.',
        'cover'       => 'uploads/photo store/4.jpeg',
        'gallery'     => ['uploads/photo store/4.jpeg', 'uploads/photo store/6.jpeg', 'uploads/photo store/16.jpeg'],
        'layout'      => 'portrait-tall',
    ],
    [
        'id'          => 'fn-corp-1',
        'title'       => 'Luxury Heritage Gala & Cultural Festival',
        'event_type'  => 'Corporate & Cultural Event',
        'category'    => 'corporate',
        'cat_label'   => 'Corporate & Cultural',
        'location'    => 'City Palace Amphitheatre, Udaipur',
        'address'     => '',
        'timing'      => '',
        'description' => 'Architectural stage documentation, VIP red-carpet portraits, classical music performances, and same-day social highlight reels.',
        'cover'       => 'uploads/photo store/17.jpeg',
        'gallery'     => ['uploads/photo store/17.jpeg', 'uploads/photo store/15.jpeg', 'uploads/photo store/10.jpeg'],
        'layout'      => 'standard',
    ],
    [
        'id'          => 'fn-eng-2',
        'title'       => 'Intimate Champagne Engagement Soirée',
        'event_type'  => 'Engagement Celebration',
        'category'    => 'engagement',
        'cat_label'   => 'Engagement & Roka',
        'location'    => 'The Leela Courtyard, Udaipur',
        'address'     => '',
        'timing'      => '',
        'description' => 'Candlelit ring-ceremony portraits, acoustic speeches, and couple twilight silhouettes framed before the main wedding festivities.',
        'cover'       => 'uploads/photo store/7.jpeg',
        'gallery'     => ['uploads/photo store/7.jpeg', 'uploads/photo store/2.jpeg', 'uploads/photo store/3.jpeg'],
        'layout'      => 'standard',
    ],
    [
        'id'          => 'fn-ann-2',
        'title'       => 'Golden Anniversary Family Reunion & Vows',
        'event_type'  => 'Golden Jubilee Celebration',
        'category'    => 'anniversary',
        'cat_label'   => 'Anniversary',
        'location'    => 'Samode Palace, Rajasthan',
        'address'     => '',
        'timing'      => '',
        'description' => 'Honoring fifty years of togetherness through archival-grade family group portraits, grandkids stories, and evening courtyard dining.',
        'cover'       => 'uploads/photo store/16.jpeg',
        'gallery'     => ['uploads/photo store/16.jpeg', 'uploads/photo store/14.jpeg', 'uploads/photo store/12.jpeg'],
        'layout'      => 'portrait-tall',
    ],
    [
        'id'          => 'fn-bday-2',
        'title'       => 'First Birthday Royal Theme Wonderland',
        'event_type'  => 'Kids & Family Birthday',
        'category'    => 'birthday',
        'cat_label'   => 'Birthday',
        'location'    => 'Palace Gardens, Jodhpur',
        'address'     => '',
        'timing'      => '',
        'description' => 'Storybook cake-smash photography, pastel balloon pavilions, and candid family joy preserved for lifelong keepsake albums.',
        'cover'       => 'uploads/photo store/8.jpeg',
        'gallery'     => ['uploads/photo store/8.jpeg', 'uploads/photo store/13.jpeg', 'uploads/photo store/18.jpeg'],
        'layout'      => 'standard',
    ],
    [
        'id'          => 'fn-haldi-1',
        'title'       => 'Marigold Haldi & Courtyard Splash',
        'event_type'  => 'Haldi & Mehndi Function',
        'category'    => 'haldi-mehndi',
        'cat_label'   => 'Haldi & Mehndi',
        'location'    => 'Jagmandir Island Palace, Udaipur',
        'address'     => '',
        'timing'      => '',
        'description' => 'High-speed 120 FPS floral shower captures, vibrant turmeric blessings, and dhol-nagara family dance reels.',
        'cover'       => 'uploads/photo store/12.jpeg',
        'gallery'     => ['uploads/photo store/12.jpeg', 'uploads/photo store/8.jpeg', 'uploads/photo store/9.jpeg'],
        'layout'      => 'standard',
    ],
];

foreach ($functionShowcases as $fs) {
    $projects[] = $fs;
}

// 3. Append genuine gallery showcase projects from gallery table
$catDisplayMap = [
    'pre-wedding' => ['slug' => 'pre-wedding', 'label' => 'Pre-Wedding', 'type' => 'Pre-Wedding Film & Stills'],
    'wedding'     => ['slug' => 'wedding', 'label' => 'Wedding', 'type' => 'Wedding Ceremony Documentary'],
    'haldi'       => ['slug' => 'haldi-mehndi', 'label' => 'Haldi & Mehndi', 'type' => 'Haldi & Courtyard Rituals'],
    'sangeet'     => ['slug' => 'haldi-mehndi', 'label' => 'Haldi & Mehndi', 'type' => 'Mehndi & Sangeet Gala'],
    'reception'   => ['slug' => 'party', 'label' => 'Party & Reception', 'type' => 'Reception & Party Cinema'],
];

foreach ($galleryRows as $gIdx => $g) {
    $rawCat = strtolower(trim((string)($g['category'] ?? 'wedding')));
    $mapped = $catDisplayMap[$rawCat] ?? ['slug' => 'wedding', 'label' => 'Wedding', 'type' => ucfirst($rawCat)];
    $imgUrl = (string)($g['image_url'] ?? 'uploads/photo store/2.jpeg');
    $siblingImgs = $galleryByCat[$rawCat] ?? [$imgUrl];
    array_unshift($siblingImgs, $imgUrl);
    $siblingImgs = array_values(array_unique($siblingImgs));

    $projects[] = [
        'id'          => 'gal-' . ($g['id'] ?? $gIdx),
        'title'       => !empty($g['title']) ? $g['title'] : ($mapped['label'] . ' Feature'),
        'event_type'  => $mapped['type'],
        'category'    => $mapped['slug'],
        'cat_label'   => $mapped['label'],
        'location'    => 'WoW Studio Portfolio Collection',
        'address'     => '',
        'timing'      => '',
        'description' => 'Frame curated from the WoW Studio ' . strtolower($mapped['label']) . ' showcase, captured with prime cinema glass and natural lighting.',
        'cover'       => $imgUrl,
        'gallery'     => array_slice($siblingImgs, 0, 5),
        'layout'      => ($gIdx % 5 === 2) ? 'featured-wide' : (($gIdx % 2 === 0) ? 'portrait-tall' : 'standard'),
    ];
}

// Build supported category filters dynamically from all celebration & function data
$desiredFilters = [
    'all'          => 'All Projects',
    'wedding'      => 'Wedding',
    'pre-wedding'  => 'Pre-Wedding',
    'engagement'   => 'Engagement & Roka',
    'haldi-mehndi' => 'Haldi & Mehndi',
    'anniversary'  => 'Anniversary',
    'birthday'     => 'Birthday',
    'party'        => 'Party & Reception',
    'maternity'    => 'Maternity & Baby Shower',
    'corporate'    => 'Corporate & Cultural',
];

$availableSlugs = array_unique(array_column($projects, 'category'));
$activeFilters = ['all' => 'All Projects'];
foreach ($desiredFilters as $slug => $label) {
    if ($slug === 'all') continue;
    if (in_array($slug, $availableSlugs, true)) {
        $activeFilters[$slug] = $label;
    }
}

$horizontalReelItems = array_slice($projects, 0, 8);
?>

<style>
/* =========================================================================
   1. CINEMATIC PROJECT HERO
   ========================================================================= */
.projects-cinema-hero {
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

.projects-hero-bg {
    position: absolute;
    inset: -5%;
    z-index: 1;
    overflow: hidden;
    will-change: transform;
    pointer-events: none;
}

.projects-hero-bg-img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: center 28%;
    filter: brightness(0.55) contrast(1.08) saturate(1.12);
    transform: scale(1.06);
}

.projects-hero-scrim {
    position: absolute;
    inset: 0;
    z-index: 2;
    background:
        radial-gradient(circle at 50% 42%, rgba(107, 20, 38, 0.36) 0%, rgba(10, 1, 4, 0.85) 70%, #050002 100%),
        linear-gradient(180deg, rgba(8, 1, 4, 0.65) 0%, transparent 45%, rgba(8, 1, 4, 0.95) 100%);
    pointer-events: none;
}

.projects-hero-content {
    position: relative;
    z-index: 5;
    max-width: 860px;
    margin: 0 auto;
    padding: 0 20px;
    text-align: center;
}

.projects-hero-badge {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    background: rgba(20, 3, 7, 0.8);
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

.projects-hero-word {
    display: inline-block;
    will-change: transform, opacity, filter;
}

.projects-scroll-indicator {
    display: inline-flex;
    flex-direction: column;
    align-items: center;
    gap: 8px;
    margin-top: 24px;
    color: rgba(255, 216, 117, 0.85);
    font-family: 'Space Grotesk', -apple-system, sans-serif;
    font-size: 10px;
    font-weight: 700;
    letter-spacing: 2px;
    text-transform: uppercase;
}
.projects-scroll-line {
    width: 1.5px;
    height: 30px;
    background: linear-gradient(180deg, #ffd875, transparent);
    animation: projectsCueBob 1.8s ease-in-out infinite;
}
@keyframes projectsCueBob {
    0%, 100% { transform: translateY(0); opacity: 1; }
    50% { transform: translateY(6px); opacity: 0.4; }
}

/* =========================================================================
   2 & 3 & 4. CATEGORY FILTER, EDITORIAL GRID & 3D HOVER CARDS
   ========================================================================= */
.projects-portfolio-section {
    background: #080104;
    background: radial-gradient(circle at 50% 10%, #170208 0%, #080104 65%, #040002 100%);
    color: #ffffff;
    padding: 90px 0 95px;
    overflow: hidden;
    border-bottom: 1px solid rgba(207, 168, 89, 0.35);
    perspective: 1600px;
}

.projects-filter-bar {
    display: flex;
    justify-content: center;
    align-items: center;
    flex-wrap: wrap;
    gap: 10px;
    margin: 0 auto 44px;
}

.project-filter-btn {
    background: rgba(24, 3, 9, 0.72);
    border: 1px solid rgba(207, 168, 89, 0.38);
    color: rgba(255, 255, 255, 0.85);
    font-family: 'Space Grotesk', -apple-system, sans-serif;
    font-size: 11.5px;
    font-weight: 700;
    letter-spacing: 0.8px;
    padding: 8px 18px;
    border-radius: 30px;
    cursor: pointer;
    white-space: nowrap !important;
    flex-shrink: 0 !important;
    transition: all 0.28s cubic-bezier(0.22, 1, 0.36, 1);
}
.project-filter-btn:hover {
    border-color: #ffd875;
    color: #ffffff;
    transform: translateY(-2px);
}
.project-filter-btn.active {
    background: linear-gradient(135deg, var(--royal-burgundy, #6b1426) 0%, #4a0d1a 100%);
    border-color: #ffd875;
    color: #ffd875;
    box-shadow: 0 8px 24px rgba(107, 20, 38, 0.65);
}

/* Editorial Asymmetrical Masonry Card */
.project-col-item {
    perspective: 1200px;
    will-change: transform, opacity;
}
.project-col-item.is-hidden-filter,
.project-col-item.is-hidden-paged {
    display: none;
}

.project-editorial-card {
    position: relative;
    width: 100%;
    height: 360px;
    border-radius: 22px;
    overflow: hidden;
    background: #120206;
    border: 1.5px solid rgba(207, 168, 89, 0.42);
    box-shadow: 0 22px 55px rgba(0, 0, 0, 0.75);
    cursor: pointer;
    transform-style: preserve-3d;
    transition: border-color 0.35s ease, box-shadow 0.35s ease, transform 0.35s ease;
}
.project-editorial-card.card-featured-wide {
    height: 410px;
}
.project-editorial-card.card-portrait-tall {
    height: 410px;
}
.project-editorial-card:hover {
    border-color: #ffd875;
    box-shadow: 0 32px 75px rgba(0, 0, 0, 0.9), 0 0 28px rgba(207, 168, 89, 0.32);
}

.project-card-media-mask {
    position: absolute;
    inset: 0;
    overflow: hidden;
    z-index: 1;
    will-change: clip-path;
}

.project-card-img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: center 25%;
    filter: brightness(0.9) contrast(1.06) saturate(1.12);
    transition: transform 0.75s cubic-bezier(0.22, 1, 0.36, 1), filter 0.6s ease;
}
.project-editorial-card:hover .project-card-img {
    transform: scale(1.08);
    filter: brightness(1.02) contrast(1.12) saturate(1.18);
}

.project-card-gradient {
    position: absolute;
    inset: 0;
    z-index: 2;
    background:
        radial-gradient(circle at 50% 25%, transparent 25%, rgba(8, 1, 3, 0.55) 70%, rgba(4, 0, 1, 0.94) 100%),
        linear-gradient(180deg, rgba(8, 1, 3, 0.35) 0%, transparent 40%, rgba(16, 2, 6, 0.94) 88%);
    pointer-events: none;
}

.project-card-top {
    position: absolute;
    top: 18px;
    left: 18px;
    right: 18px;
    z-index: 4;
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 8px;
}

.project-cat-pill {
    background: rgba(107, 20, 38, 0.88);
    border: 1px solid rgba(207, 168, 89, 0.65);
    color: #ffffff;
    font-family: 'Space Grotesk', -apple-system, sans-serif;
    font-size: 9.5px;
    font-weight: 800;
    letter-spacing: 1.2px;
    text-transform: uppercase;
    padding: 4px 12px;
    border-radius: 20px;
    white-space: nowrap;
}

.project-card-content {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    padding: 22px;
    z-index: 4;
    transform: translateZ(30px);
}

.project-location-line {
    font-size: 11px;
    color: #ffd875;
    margin-bottom: 5px;
    display: flex;
    align-items: center;
    gap: 5px;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}

.project-view-btn {
    background: linear-gradient(135deg, var(--royal-burgundy, #6b1426) 0%, #4a0d1a 100%);
    border: 1px solid var(--champagne-gold, #cfa859);
    color: #ffffff !important;
    font-size: 10.5px;
    font-weight: 800;
    letter-spacing: 0.6px;
    padding: 5px 14px;
    border-radius: 30px;
    white-space: nowrap !important;
    flex-shrink: 0 !important;
    display: inline-flex;
    align-items: center;
    gap: 5px;
    transition: all 0.25s ease;
}
.project-editorial-card:hover .project-view-btn {
    background: var(--champagne-gold, #cfa859);
    color: #210409 !important;
    transform: translateX(3px);
}

/* =========================================================================
   6. HORIZONTAL CINEMATIC GALLERY (Scroll-Linked Scrub)
   ========================================================================= */
.projects-horizontal-section {
    background: radial-gradient(circle at 50% 50%, #1d030b 0%, #090104 75%);
    padding: 85px 0;
    overflow: hidden;
    border-bottom: 1px solid rgba(207, 168, 89, 0.35);
    color: #ffffff;
}

.projects-reel-track {
    display: flex;
    gap: 24px;
    padding: 15px 0;
    will-change: transform;
}

.projects-reel-card {
    flex: 0 0 clamp(270px, 24vw, 340px);
    height: 360px;
    border-radius: 20px;
    overflow: hidden;
    position: relative;
    border: 1.5px solid rgba(207, 168, 89, 0.45);
    box-shadow: 0 20px 50px rgba(0, 0, 0, 0.7);
    cursor: pointer;
    transition: border-color 0.3s ease, transform 0.3s ease;
}
.projects-reel-card:hover {
    border-color: #ffd875;
    transform: translateY(-5px);
}
.projects-reel-card img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}
.projects-reel-overlay {
    position: absolute;
    inset: 0;
    background: linear-gradient(180deg, transparent 42%, rgba(12, 1, 5, 0.95) 95%);
    display: flex;
    flex-direction: column;
    justify-content: flex-end;
    padding: 18px;
}

/* =========================================================================
   7. SIGNATURE SHOOT EXPERIENCES (Genuine wedding_events Details)
   ========================================================================= */
.projects-experiences-section {
    background-color: var(--paper-bg, #faf6f0);
    padding: 90px 0;
}

.project-experience-row {
    background: #ffffff;
    border: 1.5px solid var(--champagne-gold-border, #e9d6a7);
    border-radius: 22px;
    box-shadow: 0 12px 35px rgba(74, 11, 23, 0.06);
    padding: 28px;
    margin-bottom: 26px;
}

/* =========================================================================
   9. FINAL CINEMATIC CTA ("YOUR STORY DESERVES TO BE A MASTERPIECE")
   ========================================================================= */
.projects-closing-cta {
    position: relative;
    width: 100%;
    min-height: 520px;
    padding: 100px 0 95px;
    background: #070104;
    color: #ffffff;
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden;
    border-top: 2px solid var(--champagne-gold, #cfa859);
}

.projects-closing-bg {
    position: absolute;
    inset: -6%;
    background-size: cover;
    background-position: center;
    opacity: 0.34;
    filter: contrast(1.12) saturate(1.1);
    will-change: transform;
    pointer-events: none;
}

.projects-closing-overlay {
    position: absolute;
    inset: 0;
    background: radial-gradient(circle at 50% 45%, rgba(107, 20, 38, 0.55) 0%, rgba(8, 1, 4, 0.92) 72%);
    pointer-events: none;
}

@media (max-width: 991px) {
    .projects-cinema-hero { min-height: 60vh; padding: 80px 0 65px; }
    .projects-portfolio-section,
    .projects-horizontal-section,
    .projects-experiences-section,
    .projects-closing-cta { padding: 70px 0 65px; }
    .project-editorial-card.card-featured-wide,
    .project-editorial-card.card-portrait-tall { height: 340px; }
}

@media (max-width: 576px) {
    .projects-cinema-hero { min-height: 52vh; padding: 65px 0 55px; }
    .projects-portfolio-section,
    .projects-horizontal-section,
    .projects-experiences-section,
    .projects-closing-cta { padding: 55px 0 50px; }
    .project-editorial-card,
    .project-editorial-card.card-featured-wide,
    .project-editorial-card.card-portrait-tall { height: 310px; }
}
</style>

<!-- =========================================================================
     SECTION 1: CINEMATIC PROJECT HERO
     ========================================================================= -->
<section class="projects-cinema-hero" id="projectsHeroSection" aria-label="Our Projects">
    <div class="projects-hero-bg" id="projectsHeroBg">
        <img src="<?= $appBasePath ?>/uploads/photo store/11.jpeg"
             alt="WoW Studio Wedding Projects Showcase"
             class="projects-hero-bg-img">
    </div>
    <div class="projects-hero-scrim"></div>

    <div class="projects-hero-content">
        <div class="projects-hero-badge" id="projectsHeroBadge">
            <i class="bi bi-film"></i>
            <span>WoW STUDIO &bull; FEATURED PORTFOLIO</span>
        </div>

        <h1 class="text-white mb-3" id="projectsHeroTitle">
            <span class="projects-hero-word">OUR</span>
            <span class="projects-hero-word" style="color: #ffd875;">PROJECTS</span>
        </h1>

        <p class="lead font-serif fst-italic mb-0" id="projectsHeroSubtitle" style="max-width: 660px; margin: 0 auto; color: #f2e4d8;">
            "Every celebration documented as an editorial wedding story &mdash; from intimate pre-dawn ceremonies to grand starlit palace galas."
        </p>

        <div class="projects-scroll-indicator" aria-hidden="true">
            <span>Scroll to Explore</span>
            <span class="projects-scroll-line"></span>
        </div>
    </div>
</section>

<!-- =========================================================================
     SECTION 2, 3, 4 & 8: CATEGORY FILTER, ASYMMETRICAL GALLERY & LOAD MORE
     ========================================================================= -->
<section class="projects-portfolio-section" id="projectsPortfolioSection">
    <div class="container">
        <div class="text-center mb-4">
            <p class="eyebrow" style="color: #ffd875 !important; letter-spacing: 2px; margin-bottom: 8px;">
                CURATED PORTFOLIO STORIES
            </p>
            <h2 class="text-white mb-2">Signature Weddings &amp; Film Chronicles</h2>
            <p class="mx-auto mb-4" style="color: rgba(245, 237, 228, 0.8); max-width: 620px; font-size: 15px;">
                Select any category below to filter projects cleanly or click any story to launch its full editorial gallery.
            </p>
        </div>

        <!-- Category Filters -->
        <div class="projects-filter-bar" id="projectsFilterBar">
            <?php foreach ($activeFilters as $slug => $label): ?>
                <button type="button"
                        class="project-filter-btn <?= ($slug === 'all') ? 'active' : '' ?>"
                        data-filter="<?= htmlspecialchars($slug) ?>">
                    <?= htmlspecialchars($label) ?>
                </button>
            <?php endforeach; ?>
        </div>

        <!-- Asymmetrical Editorial Portfolio Grid -->
        <div class="row g-4" id="projectsGrid">
            <?php foreach ($projects as $pIdx => $proj):
                $colSizeClass = ($proj['layout'] === 'featured-wide') ? 'col-lg-8 col-md-12' : 'col-lg-4 col-md-6';
                $cardHeightClass = ($proj['layout'] === 'featured-wide') ? 'card-featured-wide' : (($proj['layout'] === 'portrait-tall') ? 'card-portrait-tall' : '');
                $isInitiallyPaged = ($pIdx >= 9) ? 'is-hidden-paged' : '';
            ?>
                <div class="<?= $colSizeClass ?> project-col-item <?= $isInitiallyPaged ?>"
                     data-category="<?= htmlspecialchars($proj['category']) ?>"
                     data-project-idx="<?= $pIdx ?>">
                    <article class="project-editorial-card <?= $cardHeightClass ?> open-project-modal"
                             data-project-idx="<?= $pIdx ?>"
                             role="button"
                             tabindex="0"
                             aria-label="Open project <?= htmlspecialchars($proj['title']) ?>">
                        <div class="project-card-media-mask">
                            <img src="<?= $appBasePath ?>/<?= htmlspecialchars($proj['cover']) ?>"
                                 alt="<?= htmlspecialchars($proj['title']) ?>"
                                 class="project-card-img"
                                 loading="lazy">
                        </div>
                        <div class="project-card-gradient"></div>

                        <div class="project-card-top">
                            <span class="project-cat-pill"><?= htmlspecialchars($proj['cat_label']) ?></span>
                            <span class="badge rounded-pill" style="background: rgba(14, 2, 5, 0.82); border: 1px solid rgba(207, 168, 89, 0.4); color: #ffd875; font-size: 10px;">
                                <?= count($proj['gallery']) ?> Frames
                            </span>
                        </div>

                        <div class="project-card-content">
                            <div class="project-location-line">
                                <i class="bi bi-geo-alt-fill text-warning"></i>
                                <span><?= htmlspecialchars($proj['location']) ?></span>
                            </div>
                            <h3 class="text-white mb-2"><?= htmlspecialchars($proj['title']) ?></h3>
                            <p class="small mb-3" style="color: rgba(255, 255, 255, 0.82); display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;">
                                <?= htmlspecialchars($proj['description']) ?>
                            </p>
                            <div class="d-flex justify-content-between align-items-center pt-2" style="border-top: 1px solid rgba(207, 168, 89, 0.28);">
                                <span style="font-size: 10.5px; color: rgba(255, 216, 117, 0.88);">
                                    <?= htmlspecialchars($proj['event_type']) ?>
                                </span>
                                <span class="project-view-btn">
                                    <span>View Project</span>
                                    <i class="bi bi-arrow-right"></i>
                                </span>
                            </div>
                        </div>
                    </article>
                </div>
            <?php endforeach; ?>
        </div>

        <!-- Load More Button -->
        <?php if (count($projects) > 9): ?>
            <div class="text-center mt-5" id="projectsLoadMoreWrap">
                <button type="button" id="projectsLoadMoreBtn" class="btn-royal" style="background: var(--champagne-gold) !important; color: #210409 !important; border-color: var(--champagne-gold) !important;">
                    <i class="bi bi-plus-circle-fill me-1"></i>
                    <span>Load More Projects</span>
                </button>
            </div>
        <?php endif; ?>
    </div>
</section>

<!-- =========================================================================
     SECTION 6: HORIZONTAL CINEMATIC GALLERY (Scroll-Linked Scrub)
     ========================================================================= -->
<section class="projects-horizontal-section" id="projectsHorizontalSection">
    <div class="container mb-4">
        <div class="d-flex justify-content-between align-items-end flex-wrap gap-3">
            <div>
                <p class="eyebrow" style="color: #ffd875 !important; letter-spacing: 2px; margin-bottom: 6px;">
                    CINEMA REEL &bull; FEATURED MOMENTS
                </p>
                <h2 class="text-white mb-0">Horizontal Storyboard Showcase</h2>
            </div>
            <span class="small" style="color: rgba(255, 216, 117, 0.85);">
                Scroll to glide through featured stories &rarr;
            </span>
        </div>
    </div>

    <div class="container-fluid px-3 px-md-5 overflow-hidden">
        <div class="projects-reel-track" id="projectsReelTrack">
            <?php foreach ($horizontalReelItems as $hIdx => $item): ?>
                <div class="projects-reel-card open-project-modal" data-project-idx="<?= $hIdx ?>">
                    <img src="<?= $appBasePath ?>/<?= htmlspecialchars($item['cover']) ?>" alt="<?= htmlspecialchars($item['title']) ?>" loading="lazy">
                    <div class="projects-reel-overlay">
                        <span class="project-cat-pill mb-2 align-self-start"><?= htmlspecialchars($item['cat_label']) ?></span>
                        <h3 class="text-white mb-1"><?= htmlspecialchars($item['title']) ?></h3>
                        <span class="small" style="color: #ffd875;"><?= htmlspecialchars($item['location']) ?></span>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- =========================================================================
     SECTION 7: SIGNATURE SHOOT EXPERIENCES (Genuine wedding_events Details)
     ========================================================================= -->
<?php if (!empty($events)): ?>
<section class="projects-experiences-section" id="projectsExperiencesSection">
    <div class="container">
        <div class="text-center mb-5">
            <p class="eyebrow" style="color: var(--royal-burgundy) !important; letter-spacing: 2px; margin-bottom: 8px;">
                PRODUCTION DETAILS &bull; COVERAGE TIMELINE
            </p>
            <h2 style="color: var(--royal-burgundy);">Signature Shoot Experiences</h2>
            <p class="text-muted mx-auto mb-0" style="max-width: 620px;">
                Genuine coverage breakdown from our active production calendar across pre-weddings, rituals, and luxury galas.
            </p>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-10">
                <?php foreach ($events as $idx => $ev):
                    $evPhoto = $eventPhotos[$ev['order_num']] ?? 'uploads/photo store/11.jpeg';
                ?>
                    <article class="project-experience-row">
                        <div class="row align-items-center g-4">
                            <div class="col-md-5">
                                <div class="rounded-4 overflow-hidden position-relative shadow-sm" style="height: 270px; border: 2px solid var(--champagne-gold);">
                                    <img src="<?= $appBasePath ?>/<?= htmlspecialchars($evPhoto) ?>" alt="<?= htmlspecialchars($ev['title']) ?>" class="w-100 h-100" style="object-fit: cover;" loading="lazy">
                                    <span class="position-absolute top-0 start-0 m-3 badge rounded-pill px-3 py-2" style="background: var(--royal-burgundy); color: #ffffff; font-size: 11px;">
                                        <i class="bi bi-camera-fill me-1"></i> Experience <?= $idx + 1 ?>
                                    </span>
                                </div>
                            </div>

                            <div class="col-md-7 ps-md-3">
                                <span class="badge rounded-pill mb-2 px-3 py-1" style="background: var(--champagne-gold-light); color: var(--champagne-gold-deep); font-weight: 700; font-size: 10.5px; text-transform: uppercase;">
                                    WoW STUDIO PRODUCTION
                                </span>
                                <h3 class="mb-2" style="color: var(--royal-burgundy);">
                                    <?= htmlspecialchars($ev['title']) ?>
                                </h3>
                                <?php if (!empty($ev['start_time'])): ?>
                                    <p class="fw-semibold mb-2 small" style="color: var(--champagne-gold-deep);">
                                        <i class="bi bi-clock-fill text-warning me-1"></i>
                                        <?= htmlspecialchars($ev['start_time']) ?> <?= !empty($ev['end_time']) ? ' to ' . htmlspecialchars($ev['end_time']) : '' ?>
                                    </p>
                                <?php endif; ?>
                                <p class="text-muted mb-3" style="line-height: 1.7; font-size: 14.5px;">
                                    <?= nl2br(htmlspecialchars($ev['description'] ?: '')) ?>
                                </p>

                                <?php if (!empty($ev['venue']) || !empty($ev['address'])): ?>
                                    <div class="p-3 rounded-3 mb-3" style="background: var(--paper-bg); border: 1px solid var(--line);">
                                        <div class="d-flex align-items-center gap-3">
                                            <i class="bi bi-geo-alt-fill fs-4" style="color: var(--royal-burgundy);"></i>
                                            <div>
                                                <div class="fw-bold text-dark small"><?= htmlspecialchars($ev['venue']) ?></div>
                                                <?php if (!empty($ev['address'])): ?>
                                                    <div class="text-muted small"><?= htmlspecialchars($ev['address']) ?></div>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>

                                <div class="d-flex align-items-center justify-content-between flex-wrap gap-2">
                                    <span class="badge bg-light text-dark border py-2 px-3">
                                        <i class="bi bi-film text-danger me-1"></i> Multi-Camera 4K Coverage
                                    </span>
                                    <a href="<?= $appBasePath ?>/rsvp" class="btn-royal btn-sm">
                                        <i class="bi bi-calendar-check me-1"></i> Inquire This Experience
                                    </a>
                                </div>
                            </div>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>

<!-- =========================================================================
     SECTION 9: FINAL CINEMATIC CTA
     ========================================================================= -->
<section class="projects-closing-cta" id="projectsClosingCta">
    <div class="projects-closing-bg" id="projectsClosingBg" style="background-image: url('<?= $appBasePath ?>/uploads/photo store/15.jpeg');"></div>
    <div class="projects-closing-overlay"></div>

    <div class="container position-relative text-center" style="z-index: 5; max-width: 820px;">
        <span class="badge rounded-pill px-3 py-1 mb-3" style="background: rgba(107, 20, 38, 0.85); border: 1px solid rgba(207, 168, 89, 0.6); color: #ffd875; font-size: 10.5px; letter-spacing: 2px;">
            BESPOKE FILM &amp; PHOTOGRAPHY &bull; WoW STUDIO
        </span>
        <h2 class="text-white mb-3" id="projectsClosingTitle">
            YOUR STORY DESERVES TO BE A <span style="color: #ffd875; font-style: italic;">MASTERPIECE</span>
        </h2>
        <p class="lead mb-4" style="color: #f0e2d6;">
            Let's create something unforgettable together.
        </p>
        <div class="d-flex justify-content-center align-items-center flex-wrap gap-3">
            <a href="<?= $appBasePath ?>/contact" class="btn-closing-primary" style="padding: 14px 32px; background: linear-gradient(135deg, #ffd875 0%, var(--champagne-gold) 100%); color: #210409 !important; border-radius: 40px; font-weight: 800; text-decoration: none; display: inline-flex; align-items: center; gap: 8px;">
                <i class="bi bi-chat-dots-fill"></i>
                <span>Contact Us</span>
                <i class="bi bi-arrow-right"></i>
            </a>
            <a href="<?= $appBasePath ?>/rsvp" class="btn-gold-outline text-white border-white">
                <i class="bi bi-calendar2-check-fill"></i>
                <span>Inquire Dates</span>
            </a>
        </div>
    </div>
</section>

<!-- =========================================================================
     SECTION 5: FEATURED PROJECT STORYTELLING MODAL
     ========================================================================= -->
<div class="modal fade" id="projectDetailModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content border-0 overflow-hidden" style="border-radius: 22px; background: #0e0206; color: #ffffff; border: 1.5px solid var(--champagne-gold) !important;">
            <div class="position-relative" style="height: 390px; background: #050002;">
                <img id="projModalCover" src="" alt="" class="w-100 h-100" style="object-fit: cover;">
                <div style="position: absolute; inset: 0; background: linear-gradient(180deg, rgba(0,0,0,0.2) 0%, rgba(14,2,6,0.94) 98%);"></div>
                <button type="button" class="btn-close btn-close-white position-absolute top-0 end-0 m-3" data-bs-dismiss="modal" aria-label="Return to Projects"></button>

                <div class="position-absolute bottom-0 start-0 end-0 p-4 p-md-5">
                    <span id="projModalCategory" class="project-cat-pill mb-2 d-inline-block"></span>
                    <h2 id="projModalTitle" class="text-white mb-2"></h2>
                    <div class="d-flex flex-wrap gap-3 small" style="color: #ffd875;">
                        <span id="projModalType"></span>
                        <span id="projModalLocation"></span>
                        <span id="projModalTiming"></span>
                    </div>
                </div>
            </div>

            <div class="modal-body p-4 p-md-5">
                <p id="projModalDesc" class="mb-4" style="font-size: 15.5px; line-height: 1.8; color: #f3e8df;"></p>

                <div class="mb-2 d-flex justify-content-between align-items-center">
                    <h3 class="text-white mb-0">Project Gallery</h3>
                    <span class="small" style="color: #ffd875;">Click any frame to switch main view</span>
                </div>
                <div class="row g-3" id="projModalGalleryGrid"></div>
            </div>

            <div class="modal-footer justify-content-between px-4 py-3" style="background: #170309; border-top: 1px solid rgba(207, 168, 89, 0.3);">
                <div class="d-flex gap-2">
                    <button type="button" class="btn btn-sm btn-gold-outline text-white" id="projModalPrev">
                        <i class="bi bi-arrow-left"></i> Prev Project
                    </button>
                    <button type="button" class="btn btn-sm btn-gold-outline text-white" id="projModalNext">
                        Next Project <i class="bi bi-arrow-right"></i>
                    </button>
                </div>
                <div class="d-flex gap-2">
                    <button type="button" class="btn btn-sm btn-outline-light rounded-pill px-3" data-bs-dismiss="modal">
                        Return to Projects
                    </button>
                    <a href="<?= $appBasePath ?>/rsvp" class="btn btn-sm btn-royal">
                        <i class="bi bi-calendar2-check-fill"></i> Book Similar Coverage
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- =========================================================================
     JAVASCRIPT: Category Filtering, Pagination, 3D Hover, GSAP & Project Modal
     ========================================================================= -->
<script>
(function() {
    'use strict';

    const PROJECTS_DATA = <?= json_encode($projects, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP) ?>;
    const BASE_PATH = <?= json_encode($appBasePath) ?>;

    function initProjectsPortfolio() {
        const filterButtons = document.querySelectorAll('#projectsFilterBar .project-filter-btn');
        const gridItems = Array.from(document.querySelectorAll('#projectsGrid .project-col-item'));
        const loadMoreWrap = document.getElementById('projectsLoadMoreWrap');
        const loadMoreBtn = document.getElementById('projectsLoadMoreBtn');
        let visibleLimit = 9;
        let activeCategory = sessionStorage.getItem('wow_project_filter') || 'all';

        // Validate saved category exists among buttons
        const availableFilterValues = Array.from(filterButtons).map(b => b.getAttribute('data-filter'));
        if (!availableFilterValues.includes(activeCategory)) {
            activeCategory = 'all';
        }

        function applyProjectFilter(filterVal, animateReveal = true) {
            activeCategory = filterVal;
            sessionStorage.setItem('wow_project_filter', filterVal);

            filterButtons.forEach(function(btn) {
                btn.classList.toggle('active', btn.getAttribute('data-filter') === filterVal);
            });

            let matchedCount = 0;
            const newlyVisible = [];

            gridItems.forEach(function(item) {
                const cat = item.getAttribute('data-category');
                const matches = (filterVal === 'all' || cat === filterVal);

                item.classList.remove('is-hidden-filter', 'is-hidden-paged');

                if (!matches) {
                    item.classList.add('is-hidden-filter');
                } else {
                    matchedCount++;
                    if (matchedCount > visibleLimit) {
                        item.classList.add('is-hidden-paged');
                    } else {
                        newlyVisible.push(item);
                    }
                }
            });

            if (loadMoreWrap) {
                loadMoreWrap.style.display = (matchedCount > visibleLimit) ? '' : 'none';
            }

            if (animateReveal && typeof gsap !== 'undefined' && newlyVisible.length > 0 && !prefersReducedMotion()) {
                gsap.fromTo(newlyVisible,
                    { opacity: 0, y: 28, scale: 0.96 },
                    { opacity: 1, y: 0, scale: 1, duration: 0.55, stagger: 0.06, ease: 'power3.out' }
                );
            }
        }

        filterButtons.forEach(function(btn) {
            btn.addEventListener('click', function() {
                visibleLimit = 9;
                applyProjectFilter(btn.getAttribute('data-filter'), true);
            });
        });

        if (loadMoreBtn) {
            loadMoreBtn.addEventListener('click', function() {
                visibleLimit += 9;
                applyProjectFilter(activeCategory, true);
            });
        }

        // Apply initial filter state
        applyProjectFilter(activeCategory, false);

        // -------------------------------------------------------------
        // Project Details Storytelling Modal (With Prev / Next Nav)
        // -------------------------------------------------------------
        const modalEl = document.getElementById('projectDetailModal');
        let bsModal = null;
        let currentProjectIdx = 0;

        function renderProjectModal(idx) {
            if (!PROJECTS_DATA.length) return;
            currentProjectIdx = (idx + PROJECTS_DATA.length) % PROJECTS_DATA.length;
            const proj = PROJECTS_DATA[currentProjectIdx];

            document.getElementById('projModalCover').src = BASE_PATH + '/' + proj.cover;
            document.getElementById('projModalCover').alt = proj.title;
            document.getElementById('projModalCategory').textContent = proj.cat_label || '';
            document.getElementById('projModalTitle').textContent = proj.title || '';
            document.getElementById('projModalType').innerHTML = proj.event_type ? ('<i class="bi bi-camera-reels me-1"></i>' + proj.event_type) : '';
            document.getElementById('projModalLocation').innerHTML = proj.location ? ('<i class="bi bi-geo-alt-fill me-1"></i>' + proj.location) : '';
            document.getElementById('projModalTiming').innerHTML = proj.timing ? ('<i class="bi bi-clock me-1"></i>' + proj.timing) : '';
            document.getElementById('projModalDesc').textContent = proj.description || '';

            const galGrid = document.getElementById('projModalGalleryGrid');
            galGrid.innerHTML = '';
            (proj.gallery || [proj.cover]).forEach(function(imgPath) {
                const col = document.createElement('div');
                col.className = 'col-6 col-md-3';
                col.innerHTML = `
                    <div class="rounded-3 overflow-hidden" style="height: 120px; border: 1.5px solid rgba(207, 168, 89, 0.45); cursor: pointer;">
                        <img src="${BASE_PATH}/${imgPath}" alt="${proj.title}" style="width:100%; height:100%; object-fit:cover;">
                    </div>
                `;
                col.addEventListener('click', function() {
                    document.getElementById('projModalCover').src = BASE_PATH + '/' + imgPath;
                });
                galGrid.appendChild(col);
            });
        }

        document.querySelectorAll('.open-project-modal').forEach(function(el) {
            el.addEventListener('click', function() {
                const idx = parseInt(el.getAttribute('data-project-idx') || '0', 10);
                renderProjectModal(idx);
                if (typeof bootstrap !== 'undefined' && bootstrap.Modal && modalEl) {
                    if (!bsModal) bsModal = new bootstrap.Modal(modalEl);
                    bsModal.show();
                }
            });
            el.addEventListener('keydown', function(e) {
                if (e.key === 'Enter' || e.key === ' ') {
                    e.preventDefault();
                    el.click();
                }
            });
        });

        const prevModalBtn = document.getElementById('projModalPrev');
        const nextModalBtn = document.getElementById('projModalNext');
        if (prevModalBtn) prevModalBtn.addEventListener('click', () => renderProjectModal(currentProjectIdx - 1));
        if (nextModalBtn) nextModalBtn.addEventListener('click', () => renderProjectModal(currentProjectIdx + 1));

        // -------------------------------------------------------------
        // 3D Cursor Hover Tilt on Project Editorial Cards
        // -------------------------------------------------------------
        if (window.innerWidth > 991 && !prefersReducedMotion()) {
            document.querySelectorAll('.project-editorial-card').forEach(function(card) {
                card.addEventListener('mousemove', function(e) {
                    const rect = card.getBoundingClientRect();
                    const dx = (e.clientX - rect.left - rect.width / 2) / (rect.width / 2);
                    const dy = (e.clientY - rect.top - rect.height / 2) / (rect.height / 2);
                    card.style.transform = `perspective(1000px) rotateX(${(-dy * 5).toFixed(1)}deg) rotateY(${(dx * 6).toFixed(1)}deg) translateY(-4px)`;
                });
                card.addEventListener('mouseleave', function() {
                    card.style.transform = '';
                });
            });
        }

        // -------------------------------------------------------------
        // GSAP + ScrollTrigger Choreography
        // -------------------------------------------------------------
        if (prefersReducedMotion() || typeof gsap === 'undefined') {
            return;
        }

        if (typeof ScrollTrigger !== 'undefined') {
            gsap.registerPlugin(ScrollTrigger);
        }

        // Hero Split-Text Entrance
        gsap.timeline()
            .fromTo('#projectsHeroBadge', { opacity: 0, y: -15 }, { opacity: 1, y: 0, duration: 0.65, ease: 'power3.out' })
            .fromTo('.projects-hero-word', { opacity: 0, y: 36, filter: 'blur(10px)' }, { opacity: 1, y: 0, filter: 'blur(0px)', duration: 0.85, stagger: 0.12, ease: 'power3.out' }, 0.15)
            .fromTo('#projectsHeroSubtitle', { opacity: 0, y: 20, filter: 'blur(8px)' }, { opacity: 1, y: 0, filter: 'blur(0px)', duration: 0.85, ease: 'power2.out' }, 0.4);

        if (typeof ScrollTrigger !== 'undefined') {
            // Hero Camera Zoom on Scroll
            gsap.to('#projectsHeroBg', {
                scale: 1.15,
                yPercent: 6,
                ease: 'none',
                scrollTrigger: {
                    trigger: '#projectsHeroSection',
                    start: 'top top',
                    end: 'bottom top',
                    scrub: 1
                }
            });

            // Editorial Cards Right-to-Left Staggered Reveal
            gsap.fromTo('#projectsGrid .project-col-item:not(.is-hidden-paged)',
                { opacity: 0, x: 75, scale: 0.94 },
                {
                    opacity: 1,
                    x: 0,
                    scale: 1,
                    duration: 0.9,
                    stagger: 0.1,
                    ease: 'power3.out',
                    scrollTrigger: {
                        trigger: '#projectsGrid',
                        start: 'top 78%',
                        toggleActions: 'play none none reverse'
                    }
                }
            );

            // Scroll-Linked Horizontal Reel Movement (Right to Left)
            const reelTrack = document.getElementById('projectsReelTrack');
            if (reelTrack) {
                gsap.fromTo(reelTrack,
                    { xPercent: 8 },
                    {
                        xPercent: -26,
                        ease: 'none',
                        scrollTrigger: {
                            trigger: '#projectsHorizontalSection',
                            start: 'top bottom',
                            end: 'bottom top',
                            scrub: 1.2
                        }
                    }
                );
            }

            // Closing CTA Slow Camera Zoom & Title Entrance
            gsap.to('#projectsClosingBg', {
                scale: 1.14,
                ease: 'none',
                scrollTrigger: {
                    trigger: '#projectsClosingCta',
                    start: 'top bottom',
                    end: 'bottom top',
                    scrub: 1.1
                }
            });

            gsap.fromTo('#projectsClosingTitle',
                { opacity: 0, y: 30, filter: 'blur(8px)' },
                {
                    opacity: 1,
                    y: 0,
                    filter: 'blur(0px)',
                    duration: 0.9,
                    ease: 'power3.out',
                    scrollTrigger: {
                        trigger: '#projectsClosingCta',
                        start: 'top 80%',
                        toggleActions: 'play none none reverse'
                    }
                }
            );
        }
    }

    function prefersReducedMotion() {
        return !!(window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches);
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initProjectsPortfolio);
    } else {
        initProjectsPortfolio();
    }
})();
</script>
