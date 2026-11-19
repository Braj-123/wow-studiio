<?php
declare(strict_types=1);

/**
 * ============================================================================
 * WoW STUDIO — Wedding Cinema Journal & Photography Blog View
 * Layout: Editorial Spotlight, Filterable Journal Grid & Full Story Modal
 * Theme: Royal Burgundy (#6b1426) & Champagne Gold (#cfa859)
 * Brand: WoW Studio
 * File: front/view/blog/html/index.php
 * ============================================================================
 */

$appBasePath = $appBasePath ?? '';

$featuredPost = [
    'id' => 'udaipur-royal-palace-light',
    'category' => 'Destination Weddings',
    'category_slug' => 'destination',
    'date' => 'November 2026',
    'read_time' => '6 Min Read',
    'author' => 'Vikramaditya Rathore',
    'location' => 'Taj Lake Palace, Udaipur',
    'title' => 'Sculpting Golden Hour Cinema at Lake Pichola Heritage Palaces',
    'excerpt' => 'How our directing unit choreographs natural twilight reflection, ambient palace diyas, and 85mm prime portraiture to preserve unscripted royal vows without intrusive artificial rigs.',
    'image' => 'uploads/photo store/2.jpeg',
    'full_story' => "Capturing a heritage wedding on the waters of Lake Pichola requires working in harmony with fleeting golden hour light. Rather than overpowering historic carved arches with harsh strobe banks, WoW Studio maps the exact solar azimuth days ahead of the pheras.\n\nOur cinematographers pair full-frame 4K sensors with fast f/1.2 and f/1.4 cinema primes, letting warm brass diyas and lakeside water reflections illuminate the couple naturally. Every glance between bride and groom remains completely unposed.\n\nIn post-production, each frame receives custom DaVinci color grading inspired by archival silver-halide film stock, preserving deep royal burgundies and radiant champagne gold highlights for generations."
];

$blogPosts = [
    [
        'id' => 'bridal-velvet-chiaroscuro',
        'category' => 'Bridal & Styling',
        'category_slug' => 'bridal',
        'date' => 'October 2026',
        'read_time' => '5 Min Read',
        'author' => 'Ananya Deshmukh',
        'location' => 'City Palace, Jaipur',
        'title' => 'Bridal Couture Portraiture: Styling Zardozi & Chiaroscuro Light',
        'excerpt' => 'Techniques for timing bridal getting-ready portraits so antique kundan jewellery, veil texture, and emotional family moments shine naturally.',
        'image' => 'uploads/photo store/3.jpeg',
        'full_story' => "When a bride steps into hand-embroidered velvet or silk couture, fabric texture becomes a storytelling character on its own. Setting aside 35 calm minutes before the baraat arrives transforms rushed snapshots into museum-grade editorial heirlooms.\n\nWe position bridal portraits beside soft palace window light at 45-degree angles, allowing metallic zardozi threadwork and heirloom kundan jewellery to catch crisp specular highlights while keeping shadows velvet-smooth.\n\nAlways coordinate veil draping and makeup touch-ups with natural window orientation rather than overhead chandelier bulbs so skin tones stay luminous."
    ],
    [
        'id' => 'dawn-river-prewedding-cinema',
        'category' => 'Pre-Wedding Cinema',
        'category_slug' => 'prewedding',
        'date' => 'October 2026',
        'read_time' => '4 Min Read',
        'author' => 'Kabir Malhotra',
        'location' => 'Iconic Riverfront, Kolkata',
        'title' => 'Dawn Mist & Acoustic Storytelling in Pre-Wedding Short Films',
        'excerpt' => 'Why waking up before sunrise unlocks empty iconic landmarks, gentle morning mist, and relaxed unhurried chemistry for destination couple films.',
        'image' => 'uploads/photo store/10.jpeg',
        'full_story' => "The secret behind WoW Studio's most memorable pre-wedding cinema is capturing destinations before the city awakens. Between 5:30 AM and 7:15 AM, bridges, stone ghats, and palace courtyards turn into tranquil private film sets.\n\nInstead of asking couples to perform rigid poses, Kabir directs gentle walking conversations and quiet movement through 35mm wide-angle frames, paired with synchronized dual-system lapel audio for authentic voiceovers.\n\nThe result is a two-minute theatrical overture that plays like an intimate independent cinema piece at your reception gala."
    ],
    [
        'id' => 'haldi-marigold-slowmo',
        'category' => 'Behind The Lens',
        'category_slug' => 'behind-lens',
        'date' => 'September 2026',
        'read_time' => '5 Min Read',
        'author' => 'Rohan Sengupta',
        'location' => 'Rambagh Gardens, Jaipur',
        'title' => '120 FPS High-Speed Framing for Marigold & Haldi Celebrations',
        'excerpt' => 'Choosing shutter angles, weather-sealed prime glass, and warm color science for vibrant morning turmeric rituals under open courtyard skies.',
        'image' => 'uploads/photo store/8.jpeg',
        'full_story' => "Haldi ceremonies move fast—petals fly across the courtyard, laughter erupts in every corner, and golden sunlight evolves minute by minute. Shooting selective bursts at 120 frames per second suspends airborne marigold petals in mid-air.\n\nTo retain punchy turmeric yellows and emerald foliage without clipping highlights in midday sun, our camera crew exposes strictly for skin luminance in 10-bit LOG profiles.\n\nTwo roaming documentary photographers stay embedded inside the family circle so parents' tearful smiles and sibling mischief are never missed."
    ],
    [
        'id' => 'sangeet-anamorphic-stage',
        'category' => 'Behind The Lens',
        'category_slug' => 'behind-lens',
        'date' => 'September 2026',
        'read_time' => '4 Min Read',
        'author' => 'Kabir Malhotra',
        'location' => 'Grand Ballroom, Goa',
        'title' => 'Capturing Sangeet Choreography with Anamorphic Flares & Multi-Cam Audio',
        'excerpt' => 'How live multi-track soundboard recording and synchronized stage cameras preserve electric Sangeet performances with zero audio clipping.',
        'image' => 'uploads/photo store/9.jpeg',
        'full_story' => "A breathtaking Sangeet film depends as much on pristine audio as on dynamic camera movement. Before guests arrive, our sound team taps directly into the DJ console while capturing crowd applause through ambient stereo shotgun mics.\n\nOn the dance floor, stabilized cinema gimbals glide beside choreographed family entries, capturing sweeping oval bokeh and warm champagne lens flares across the stage lighting.\n\nMeanwhile, dedicated candid cameras watch the front row to capture the bride and groom's spontaneous reactions to every surprise toast."
    ],
    [
        'id' => 'rajputana-bridal-heirlooms',
        'category' => 'Bridal & Styling',
        'category_slug' => 'bridal',
        'date' => 'August 2026',
        'read_time' => '5 Min Read',
        'author' => 'Ananya Deshmukh',
        'location' => 'Zenana Mahal, Udaipur',
        'title' => 'Flat-Lays & Heirloom Details: Preserving Bridal Jewellery & Invites',
        'excerpt' => 'Curating linen backdrops, natural side light, and macro lenses to document wedding invitations, kalire, perfume bottles, and family heirlooms.',
        'image' => 'uploads/photo store/6.jpeg',
        'full_story' => "Every wedding begins with months of thoughtful curation—hand-illustrated invitations, heirloom polki sets, custom embroidered shoes, and engraved wedding bands. Documenting these details early in the morning sets the visual prologue for the wedding album.\n\nWe carry travertine stone slabs, handmade deckle-edge paper swatches, and raw silk cloths that harmonize with Royal Burgundy and Champagne Gold wedding themes.\n\nShot on a 90mm macro lens with natural diffused daylight, each flat-lay frame anchors the opening spread of your handcrafted Italian print album."
    ],
    [
        'id' => 'imperial-reception-banquet',
        'category' => 'Destination Weddings',
        'category_slug' => 'destination',
        'date' => 'August 2026',
        'read_time' => '6 Min Read',
        'author' => 'Vikramaditya Rathore',
        'location' => 'Umaid Bhawan, Jodhpur',
        'title' => 'Starlit Reception Architecture & Candlelight Banquet Cinematography',
        'excerpt' => 'Balancing architectural drone wide shots with intimate candlelight toast close-ups during fortress and palace reception dinners.',
        'image' => 'uploads/photo store/15.jpeg',
        'full_story' => "When sandstone fortresses and crystal chandeliers light up after dusk, reception cinematography shifts into high-contrast elegance. Wide architectural lenses establish the scale of floral canopies and fireworks, while fast telephoto primes isolate intimate champagne toasts.\n\nOur crew always scouts reception table décor twenty minutes before doors open so floral symmetry and candlelit table styling are archived untouched.\n\nBlending sweeping aerial departures with crisp close-up speeches delivers a triumphant finale to every WoW Studio wedding film."
    ],
];
?>

<style>
.blog-filter-pill {
    background: #ffffff;
    border: 1.5px solid var(--champagne-gold-border);
    color: var(--charcoal);
    font-family: 'Space Grotesk', -apple-system, sans-serif;
    font-size: 12px;
    font-weight: 700;
    letter-spacing: 0.6px;
    padding: 8px 18px;
    border-radius: 30px;
    cursor: pointer;
    transition: all 0.25s ease;
    white-space: nowrap;
}
.blog-filter-pill:hover {
    border-color: var(--royal-burgundy);
    color: var(--royal-burgundy);
    transform: translateY(-2px);
}
.blog-filter-pill.active {
    background: linear-gradient(135deg, var(--royal-burgundy) 0%, #4a0d1a 100%);
    border-color: var(--champagne-gold);
    color: #ffffff;
    box-shadow: 0 8px 20px rgba(107, 20, 38, 0.25);
}

.blog-spotlight-card {
    background: #ffffff;
    border: 1.5px solid var(--champagne-gold-border);
    border-radius: 24px;
    overflow: hidden;
    box-shadow: 0 20px 55px rgba(74, 11, 23, 0.08);
}
.blog-spotlight-img-wrap {
    height: 100%;
    min-height: 360px;
    overflow: hidden;
    position: relative;
}
.blog-spotlight-img-wrap img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.6s ease;
}
.blog-spotlight-card:hover .blog-spotlight-img-wrap img {
    transform: scale(1.04);
}

.blog-article-card {
    background: #ffffff;
    border: 1.5px solid var(--champagne-gold-border);
    border-radius: 20px;
    overflow: hidden;
    height: 100%;
    display: flex;
    flex-direction: column;
    box-shadow: 0 10px 30px rgba(74, 11, 23, 0.05);
    transition: transform 0.35s cubic-bezier(0.22, 1, 0.36, 1), box-shadow 0.35s ease, border-color 0.35s ease;
}
.blog-article-card:hover {
    transform: translateY(-6px);
    border-color: var(--champagne-gold);
    box-shadow: 0 22px 48px rgba(107, 20, 38, 0.14);
}
.blog-card-thumb {
    position: relative;
    height: 240px;
    overflow: hidden;
    background: #150207;
}
.blog-card-thumb img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: center 25%;
    transition: transform 0.6s ease;
}
.blog-article-card:hover .blog-card-thumb img {
    transform: scale(1.08);
}
.blog-cat-tag {
    position: absolute;
    top: 14px;
    left: 14px;
    background: rgba(107, 20, 38, 0.9);
    border: 1px solid rgba(207, 168, 89, 0.7);
    color: #ffffff;
    font-size: 10px;
    font-weight: 800;
    letter-spacing: 1px;
    text-transform: uppercase;
    padding: 4px 12px;
    border-radius: 20px;
    white-space: nowrap;
}
.blog-card-title {
    font-family: 'Playfair Display', Georgia, serif;
    font-size: clamp(17px, 1.35vw, 20px);
    font-weight: 700;
    line-height: 1.3;
    color: var(--royal-burgundy);
    margin-bottom: 10px;
}
.blog-read-btn {
    background: linear-gradient(135deg, var(--royal-burgundy) 0%, #4a0d1a 100%);
    border: 1px solid var(--champagne-gold);
    color: #ffffff !important;
    font-size: 11px;
    font-weight: 700;
    padding: 6px 15px;
    border-radius: 30px;
    cursor: pointer;
    display: inline-flex;
    align-items: center;
    gap: 5px;
    white-space: nowrap !important;
    flex-shrink: 0 !important;
    transition: all 0.25s ease;
}
.blog-read-btn:hover {
    background: var(--champagne-gold);
    color: #210409 !important;
}
</style>

<!-- =========================================================================
     PAGE HERO (MPP Group Signature Hero)
     ========================================================================= -->
<section class="page-hero py-5 text-center position-relative" style="background: linear-gradient(135deg, rgba(20, 3, 8, 0.58) 0%, rgba(74, 11, 23, 0.68) 100%), url('<?= $appBasePath ?>/uploads/photo%20store/5.jpeg') center/cover no-repeat; padding-top: 85px !important; padding-bottom: 75px !important; border-bottom: 2px solid var(--champagne-gold);">
    <div class="container position-relative" style="z-index: 2;">
        <span class="badge rounded-pill mb-2 px-3 py-1" style="background: var(--champagne-gold); color: #2c2523; font-weight: 700; letter-spacing: 2px; font-size: 11px;">
            CINEMA JOURNAL &bull; WoW STUDIO
        </span>
        <h1 class="font-serif fw-bold text-white mb-3">
            Wedding Stories, Cinema &amp; Photography Blog
        </h1>
        <p class="lead text-light font-serif fst-italic mb-0" style="max-width: 680px; margin: 0 auto; color: #ebdcd0 !important; font-size: 18px;">
            "Field notes from royal palaces, bridal styling guides, lighting secrets, and destination film essays by the WoW Studio creative team."
        </p>
    </div>
</section>

<!-- =========================================================================
     BLOG JOURNAL SECTION
     ========================================================================= -->
<section class="section" style="background-color: var(--paper-bg); padding: 75px 0 95px;">
    <div class="container">
        <!-- Featured Editorial Spotlight -->
        <div class="blog-spotlight-card mb-5">
            <div class="row g-0 align-items-stretch">
                <div class="col-lg-6">
                    <div class="blog-spotlight-img-wrap">
                        <img src="<?= $appBasePath ?>/<?= htmlspecialchars($featuredPost['image']) ?>" alt="<?= htmlspecialchars($featuredPost['title']) ?>">
                        <span class="blog-cat-tag">
                            <i class="bi bi-star-fill text-warning me-1"></i> Featured Story &bull; <?= htmlspecialchars($featuredPost['category']) ?>
                        </span>
                    </div>
                </div>
                <div class="col-lg-6 p-4 p-md-5 d-flex flex-column justify-content-between">
                    <div>
                        <div class="d-flex flex-wrap align-items-center gap-3 mb-3 text-muted small">
                            <span><i class="bi bi-calendar3 text-warning me-1"></i> <?= htmlspecialchars($featuredPost['date']) ?></span>
                            <span><i class="bi bi-clock text-warning me-1"></i> <?= htmlspecialchars($featuredPost['read_time']) ?></span>
                            <span><i class="bi bi-geo-alt-fill text-danger me-1"></i> <?= htmlspecialchars($featuredPost['location']) ?></span>
                        </div>
                        <h2 class="font-serif fw-bold mb-3" style="color: var(--royal-burgundy);">
                            <?= htmlspecialchars($featuredPost['title']) ?>
                        </h2>
                        <p class="text-muted mb-4" style="line-height: 1.75; font-size: 15px;">
                            <?= htmlspecialchars($featuredPost['excerpt']) ?>
                        </p>
                    </div>
                    <div class="pt-3 border-top d-flex align-items-center justify-content-between flex-wrap gap-2">
                        <span class="small fw-semibold" style="color: var(--champagne-gold-deep);">
                            By <?= htmlspecialchars($featuredPost['author']) ?>
                        </span>
                        <button type="button"
                                class="blog-read-btn open-blog-modal"
                                data-title="<?= htmlspecialchars($featuredPost['title']) ?>"
                                data-category="<?= htmlspecialchars($featuredPost['category']) ?>"
                                data-date="<?= htmlspecialchars($featuredPost['date']) ?>"
                                data-readtime="<?= htmlspecialchars($featuredPost['read_time']) ?>"
                                data-author="<?= htmlspecialchars($featuredPost['author']) ?>"
                                data-location="<?= htmlspecialchars($featuredPost['location']) ?>"
                                data-image="<?= $appBasePath ?>/<?= htmlspecialchars($featuredPost['image']) ?>"
                                data-story="<?= htmlspecialchars($featuredPost['full_story']) ?>">
                            <span>Read Full Story</span>
                            <i class="bi bi-arrow-right"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Category Filter Bar -->
        <div class="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-4 pb-2">
            <div>
                <h2 class="font-serif fw-bold mb-1" style="color: var(--royal-burgundy);">Latest Studio Essays</h2>
                <p class="text-muted small mb-0">Explore curated advice for upcoming 2026–2027 destination weddings and pre-wedding shoots.</p>
            </div>
            <div class="d-flex flex-wrap gap-2" id="blogCategoryBar">
                <button type="button" class="blog-filter-pill active" data-filter="all">All Stories</button>
                <button type="button" class="blog-filter-pill" data-filter="destination">Destination Weddings</button>
                <button type="button" class="blog-filter-pill" data-filter="prewedding">Pre-Wedding Cinema</button>
                <button type="button" class="blog-filter-pill" data-filter="bridal">Bridal &amp; Styling</button>
                <button type="button" class="blog-filter-pill" data-filter="behind-lens">Behind The Lens</button>
            </div>
        </div>

        <!-- 6 Blog Article Cards -->
        <div class="row g-4" id="blogPostsGrid">
            <?php foreach ($blogPosts as $post): ?>
                <div class="col-lg-4 col-md-6 blog-post-col" data-category="<?= htmlspecialchars($post['category_slug']) ?>">
                    <article class="blog-article-card">
                        <div class="blog-card-thumb">
                            <img src="<?= $appBasePath ?>/<?= htmlspecialchars($post['image']) ?>" alt="<?= htmlspecialchars($post['title']) ?>" loading="lazy">
                            <span class="blog-cat-tag"><?= htmlspecialchars($post['category']) ?></span>
                        </div>
                        <div class="p-4 d-flex flex-column justify-content-between flex-grow-1">
                            <div>
                                <div class="d-flex align-items-center justify-content-between gap-2 text-muted small mb-2" style="font-size: 11.5px;">
                                    <span><i class="bi bi-calendar3 text-warning me-1"></i> <?= htmlspecialchars($post['date']) ?></span>
                                    <span><i class="bi bi-clock text-warning me-1"></i> <?= htmlspecialchars($post['read_time']) ?></span>
                                </div>
                                <h3 class="blog-card-title">
                                    <?= htmlspecialchars($post['title']) ?>
                                </h3>
                                <p class="text-muted small mb-3" style="line-height: 1.65;">
                                    <?= htmlspecialchars($post['excerpt']) ?>
                                </p>
                            </div>
                            <div class="pt-3 border-top d-flex align-items-center justify-content-between gap-2" style="min-width: 0;">
                                <span class="text-muted small text-truncate" style="font-size: 11.5px; min-width: 0;">
                                    <i class="bi bi-geo-alt-fill text-danger me-1"></i> <?= htmlspecialchars($post['location']) ?>
                                </span>
                                <button type="button"
                                        class="blog-read-btn open-blog-modal"
                                        data-title="<?= htmlspecialchars($post['title']) ?>"
                                        data-category="<?= htmlspecialchars($post['category']) ?>"
                                        data-date="<?= htmlspecialchars($post['date']) ?>"
                                        data-readtime="<?= htmlspecialchars($post['read_time']) ?>"
                                        data-author="<?= htmlspecialchars($post['author']) ?>"
                                        data-location="<?= htmlspecialchars($post['location']) ?>"
                                        data-image="<?= $appBasePath ?>/<?= htmlspecialchars($post['image']) ?>"
                                        data-story="<?= htmlspecialchars($post['full_story']) ?>">
                                    <span>Read Story</span>
                                    <i class="bi bi-arrow-right"></i>
                                </button>
                            </div>
                        </div>
                    </article>
                </div>
            <?php endforeach; ?>
        </div>

        <!-- Bottom Studio Inquiry CTA Banner -->
        <div class="mt-5 p-4 p-md-5 rounded-4 d-flex justify-content-between align-items-center flex-wrap gap-4" style="background: linear-gradient(135deg, #4a0b17 0%, #6b1426 65%, #8a1c33 100%); border: 2px solid var(--champagne-gold); box-shadow: 0 20px 50px rgba(74, 11, 23, 0.25);">
            <div>
                <p class="eyebrow" style="color: var(--champagne-gold) !important; letter-spacing: 2px; margin-bottom: 6px;">
                    FEATURE YOUR CELEBRATION &bull; 2026–2027
                </p>
                <h2 class="font-serif fw-bold text-white mb-1">Planning A Wedding Shoot With WoW Studio?</h2>
                <p class="mb-0" style="color: #ebdcd0; font-size: 15px;">
                    Schedule a 1-on-1 creative planning call with our directors for lighting timelines, location scouting, and cinema packages.
                </p>
            </div>
            <div class="d-flex gap-3 flex-wrap">
                <a href="<?= $appBasePath ?>/rsvp" class="button" style="background: var(--champagne-gold) !important; color: #210409 !important; border-color: var(--champagne-gold) !important; border-radius: 30px !important; padding: 0 28px;">
                    <i class="bi bi-calendar2-check-fill me-2"></i> Inquire Dates
                </a>
                <a href="<?= $appBasePath ?>/team" class="btn-gold-outline text-white border-white">
                    <i class="bi bi-people-fill me-1"></i> Meet Our Team
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Editorial Article Reader Modal -->
<div class="modal fade" id="blogStoryModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content border-0 overflow-hidden" style="border-radius: 22px; border: 1.5px solid var(--champagne-gold) !important;">
            <div class="position-relative" style="height: 290px; background: #140206;">
                <img id="modalBlogImage" src="" alt="" class="w-100 h-100" style="object-fit: cover;">
                <div class="position-absolute inset-0" style="position:absolute; inset:0; background: linear-gradient(180deg, rgba(0,0,0,0.2) 0%, rgba(20,2,6,0.92) 100%);"></div>
                <button type="button" class="btn-close btn-close-white position-absolute top-0 end-0 m-3" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="position-absolute bottom-0 start-0 end-0 p-4 text-white">
                    <span id="modalBlogCategory" class="badge rounded-pill mb-2 px-3 py-1" style="background: var(--champagne-gold); color: #210409; font-weight: 800; font-size: 10.5px;"></span>
                    <h3 id="modalBlogTitle" class="font-serif fw-bold text-white mb-1"></h3>
                    <div class="small text-light opacity-75">
                        <span id="modalBlogMeta"></span>
                    </div>
                </div>
            </div>
            <div class="modal-body p-4 p-md-5" style="background: #fffdf9;">
                <div id="modalBlogBody" style="font-size: 15.5px; line-height: 1.8; color: #3a3230;"></div>
            </div>
            <div class="modal-footer justify-content-between px-4 py-3" style="background: #faf6f0; border-top: 1px solid #ebdcd0;">
                <span class="small fw-semibold" style="color: var(--royal-burgundy);" id="modalBlogAuthor"></span>
                <a href="<?= $appBasePath ?>/rsvp" class="btn btn-royal btn-sm">
                    <i class="bi bi-calendar2-check-fill me-1"></i> Book This Style
                </a>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // 1. Category Filter Interaction
    const filterButtons = document.querySelectorAll('#blogCategoryBar .blog-filter-pill');
    const postCols = document.querySelectorAll('#blogPostsGrid .blog-post-col');

    filterButtons.forEach(function(btn) {
        btn.addEventListener('click', function() {
            const selected = btn.getAttribute('data-filter');
            filterButtons.forEach(b => b.classList.remove('active'));
            btn.classList.add('active');

            postCols.forEach(function(col) {
                const cat = col.getAttribute('data-category');
                if (selected === 'all' || cat === selected) {
                    col.style.display = '';
                } else {
                    col.style.display = 'none';
                }
            });
        });
    });

    // 2. Editorial Story Modal Reader
    const storyTriggers = document.querySelectorAll('.open-blog-modal');
    const modalEl = document.getElementById('blogStoryModal');
    let storyModal = null;

    storyTriggers.forEach(function(trigger) {
        trigger.addEventListener('click', function() {
            if (!modalEl) return;

            document.getElementById('modalBlogTitle').textContent = trigger.getAttribute('data-title') || '';
            document.getElementById('modalBlogCategory').textContent = trigger.getAttribute('data-category') || '';
            document.getElementById('modalBlogImage').src = trigger.getAttribute('data-image') || '';
            document.getElementById('modalBlogImage').alt = trigger.getAttribute('data-title') || '';
            document.getElementById('modalBlogMeta').textContent =
                (trigger.getAttribute('data-date') || '') + ' • ' +
                (trigger.getAttribute('data-readtime') || '') + ' • ' +
                (trigger.getAttribute('data-location') || '');
            document.getElementById('modalBlogAuthor').textContent = 'Written by ' + (trigger.getAttribute('data-author') || 'WoW Studio');

            const storyRaw = trigger.getAttribute('data-story') || '';
            const bodyContainer = document.getElementById('modalBlogBody');
            bodyContainer.innerHTML = '';
            storyRaw.split('\n\n').forEach(function(para) {
                const p = document.createElement('p');
                p.textContent = para.trim();
                p.className = 'mb-3';
                bodyContainer.appendChild(p);
            });

            if (typeof bootstrap !== 'undefined' && bootstrap.Modal) {
                if (!storyModal) {
                    storyModal = new bootstrap.Modal(modalEl);
                }
                storyModal.show();
            }
        });
    });
});
</script>
