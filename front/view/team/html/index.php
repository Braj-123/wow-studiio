<?php
declare(strict_types=1);

/**
 * ============================================================================
 * WoW STUDIO — Master Visual Artists & Creative Crew View
 * Layout: Luxury Cinematic Crew Showcase & Studio Departments
 * Theme: Royal Burgundy (#6b1426) & Champagne Gold (#cfa859)
 * Brand: WoW Studio
 * File: front/view/team/html/index.php
 * ============================================================================
 */

$appBasePath = $appBasePath ?? '';
$db = \Config\Database::connect();
$leadArtists = $db->query("SELECT * FROM wedding_team ORDER BY order_num ASC")->fetchAll();

// Fallback team profiles if table is empty
if (empty($leadArtists)) {
    $leadArtists = [
        [
            'name' => 'Vikramaditya Rathore',
            'relation_role' => 'Founder & Master Photographer',
            'bio' => 'Over 12 years of capturing royal weddings across India, Europe, and the Middle East with international acclaim.',
            'photo' => 'uploads/photo store/7.jpeg',
            'specialty' => 'Royal Portraits'
        ],
        [
            'name' => 'Ananya Deshmukh',
            'relation_role' => 'Creative Director & Fine-Art Lead',
            'bio' => 'Specializes in editorial bridal couture, chiaroscuro lighting, and timeless gallery storytelling.',
            'photo' => 'uploads/photo store/6.jpeg',
            'specialty' => 'Bridal Couture'
        ],
        [
            'name' => 'Kabir Malhotra',
            'relation_role' => 'Chief Cinematographer',
            'bio' => 'Crafts emotionally driven 4K feature wedding films using anamorphic prime optics and dynamic steadicam choreography.',
            'photo' => 'uploads/photo store/10.jpeg',
            'specialty' => '4K Anamorphic'
        ],
        [
            'name' => 'Rohan Sengupta',
            'relation_role' => 'Senior Aerial Pilot & Colorist',
            'bio' => 'Licensed FPV cinema drone pilot and DaVinci Resolve master colorist creating painterly palace vistas.',
            'photo' => 'uploads/photo store/14.jpeg',
            'specialty' => 'Aerial & Grading'
        ],
    ];
}

$specialtyTags = [
    'Royal Portraiture',
    'Editorial Couture',
    '4K Cinema Direction',
    'Aerial & Color Science',
    'Candid Documentary',
    'Destination Storyteller',
];

$departments = [
    [
        'icon' => 'bi-camera-reels-fill',
        'code' => 'DEPT 01 // CINEMA',
        'title' => '4K Cinema Direction',
        'desc' => 'Feature-grade multi-camera directors capturing live vows, ambient acoustics, and kinetic baraat movement in 10-bit LOG.',
    ],
    [
        'icon' => 'bi-camera2',
        'code' => 'DEPT 02 // FINE-ART',
        'title' => 'Fine-Art Portraiture',
        'desc' => 'Editorial fashion lighting paired with natural unposed chemistry to sculpt heirloom portraits for luxury print albums.',
    ],
    [
        'icon' => 'bi-airplane-engines-fill',
        'code' => 'DEPT 03 // AERIAL FPV',
        'title' => 'Aerial FPV Drone Unit',
        'desc' => 'Licensed architectural flythroughs across lakes, fortresses, and open-air mandapams during golden and twilight hours.',
    ],
    [
        'icon' => 'bi-palette2',
        'code' => 'DEPT 04 // POST-LAB',
        'title' => 'DaVinci Color Grading',
        'desc' => 'Bespoke film emulation, sound mixing, and skin-tone accurate mastering handled completely in-house at our Udaipur lounge.',
    ],
];
?>

<style>
.team-card-luxury {
    background: #ffffff;
    border: 1.5px solid var(--champagne-gold-border);
    border-radius: 20px;
    padding: 28px 22px 24px;
    transition: transform 0.35s cubic-bezier(0.22, 1, 0.36, 1), box-shadow 0.35s ease, border-color 0.35s ease;
    box-shadow: 0 12px 32px rgba(74, 11, 23, 0.06);
}
.team-card-luxury:hover {
    transform: translateY(-6px);
    border-color: var(--champagne-gold);
    box-shadow: 0 22px 50px rgba(107, 20, 38, 0.14);
}
.team-avatar-ring {
    width: 124px;
    height: 124px;
    margin: 0 auto 16px;
    border-radius: 50%;
    padding: 3px;
    background: linear-gradient(135deg, #ffd875 0%, var(--champagne-gold) 55%, var(--royal-burgundy) 100%);
    box-shadow: 0 10px 24px rgba(107, 20, 38, 0.16);
}
.team-avatar-inner {
    width: 100%;
    height: 100%;
    border-radius: 50%;
    overflow: hidden;
    background: var(--royal-burgundy-light);
    display: grid;
    place-items: center;
}
.team-avatar-inner img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: center top;
    transition: transform 0.5s ease;
}
.team-card-luxury:hover .team-avatar-inner img {
    transform: scale(1.08);
}
.team-specialty-badge {
    display: inline-flex;
    align-items: center;
    gap: 5px;
    background: var(--champagne-gold-light);
    color: var(--champagne-gold-deep);
    border: 1px solid var(--champagne-gold-border);
    font-size: 10.5px;
    font-weight: 800;
    letter-spacing: 0.8px;
    text-transform: uppercase;
    padding: 4px 12px;
    border-radius: 30px;
    white-space: nowrap;
}
.team-member-title {
    font-family: 'Playfair Display', Georgia, serif;
    font-size: clamp(17px, 1.35vw, 20px);
    font-weight: 700;
    line-height: 1.28;
    color: var(--royal-burgundy);
    margin-bottom: 4px;
}
.team-dept-card {
    background: linear-gradient(155deg, #2a060f 0%, #150207 100%);
    border: 1.5px solid rgba(207, 168, 89, 0.35);
    border-radius: 20px;
    padding: 28px 24px;
    color: #ffffff;
    height: 100%;
    transition: transform 0.35s ease, border-color 0.35s ease, box-shadow 0.35s ease;
    box-shadow: 0 18px 45px rgba(0, 0, 0, 0.35);
}
.team-dept-card:hover {
    transform: translateY(-5px);
    border-color: #ffd875;
    box-shadow: 0 24px 55px rgba(107, 20, 38, 0.45);
}
.team-dept-icon {
    width: 48px;
    height: 48px;
    border-radius: 14px;
    background: rgba(207, 168, 89, 0.14);
    border: 1px solid rgba(207, 168, 89, 0.45);
    color: #ffd875;
    display: grid;
    place-items: center;
    font-size: 20px;
    margin-bottom: 16px;
}
</style>

<!-- =========================================================================
     PAGE HERO (MPP Group Signature Hero)
     ========================================================================= -->
<section class="page-hero py-5 text-center position-relative" style="background: linear-gradient(135deg, rgba(20, 3, 8, 0.58) 0%, rgba(74, 11, 23, 0.68) 100%), url('<?= $appBasePath ?>/uploads/photo%20store/13.jpeg') center/cover no-repeat; padding-top: 85px !important; padding-bottom: 75px !important; border-bottom: 2px solid var(--champagne-gold);">
    <div class="container position-relative" style="z-index: 2;">
        <span class="badge rounded-pill mb-2 px-3 py-1" style="background: var(--champagne-gold); color: #2c2523; font-weight: 700; letter-spacing: 2px; font-size: 11px;">
            THE VISUAL MASTERS &bull; WoW STUDIO
        </span>
        <h1 class="font-serif fw-bold text-white mb-3">
            Our Creative Crew &amp; Directors
        </h1>
        <p class="lead text-light font-serif fst-italic mb-0" style="max-width: 650px; margin: 0 auto; color: #ebdcd0 !important; font-size: 18px;">
            "Meet the visionary photographers, directors, drone pilots, and master colorists behind WoW Studio's acclaimed cinema."
        </p>
    </div>
</section>

<!-- =========================================================================
     CREATIVE CREW GRID
     ========================================================================= -->
<section class="section" style="background-color: var(--paper-bg); padding: 80px 0 85px;">
    <div class="container">
        <div class="text-center mb-5">
            <span class="badge rounded-pill px-4 py-2 mb-3" style="background: var(--royal-burgundy); color: #fff; font-size: 12px; letter-spacing: 1.5px;">
                <i class="bi bi-camera-fill me-1"></i> MASTER VISUAL PRODUCTION TEAM
            </span>
            <h2 class="font-serif fw-bold" style="color: var(--royal-burgundy);">
                Passionate Artists. Uncompromising Standard.
            </h2>
            <p class="text-muted mx-auto mt-2" style="max-width: 620px; font-size: 15.5px;">
                Every wedding crew at WoW Studio is personally led by senior directors and fine-art photographers dedicated to preserving your celebration with timeless elegance.
            </p>
        </div>

        <div class="row g-4 justify-content-center">
            <?php foreach ($leadArtists as $idx => $mem): 
                $specialty = $mem['specialty'] ?? $specialtyTags[$idx % count($specialtyTags)];
            ?>
                <div class="col-lg-3 col-md-6">
                    <article class="team-card-luxury text-center h-100 d-flex flex-column justify-content-between">
                        <div>
                            <div class="team-avatar-ring">
                                <div class="team-avatar-inner">
                                    <?php if (!empty($mem['photo'])): ?>
                                        <img src="<?= $appBasePath ?>/<?= htmlspecialchars($mem['photo']) ?>" alt="<?= htmlspecialchars($mem['name']) ?>" loading="lazy">
                                    <?php else: ?>
                                        <i class="bi bi-person-video" style="color: var(--royal-burgundy); font-size: 42px;"></i>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="mb-2">
                                <span class="team-specialty-badge">
                                    <i class="bi bi-stars"></i> <?= htmlspecialchars($specialty) ?>
                                </span>
                            </div>

                            <h3 class="team-member-title">
                                <?= htmlspecialchars($mem['name']) ?>
                            </h3>
                            <p class="text-uppercase fw-semibold small mb-2" style="color: var(--champagne-gold-deep); letter-spacing: 0.9px; font-size: 11.5px;">
                                <?= htmlspecialchars($mem['relation_role']) ?>
                            </p>
                            <p class="text-muted small mb-0" style="line-height: 1.65;">
                                <?= htmlspecialchars($mem['bio'] ?: '') ?>
                            </p>
                        </div>

                        <div class="pt-3 border-top mt-4 d-flex align-items-center justify-content-between gap-2">
                            <span class="badge bg-light text-dark border" style="white-space: nowrap;">
                                <i class="bi bi-check2-circle text-success me-1"></i> Available 2026–27
                            </span>
                            <a href="<?= $appBasePath ?>/rsvp" class="btn btn-sm btn-gold-outline py-1 px-3" style="font-size: 11px;">
                                Book Crew
                            </a>
                        </div>
                    </article>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- =========================================================================
     STUDIO PRODUCTION DEPARTMENTS
     ========================================================================= -->
<section class="section" style="background: radial-gradient(circle at 50% 20%, #190208 0%, #090104 75%); padding: 85px 0; border-top: 1px solid rgba(207, 168, 89, 0.35); border-bottom: 2px solid var(--champagne-gold);">
    <div class="container">
        <div class="text-center mb-5">
            <p class="eyebrow" style="color: #ffd875 !important; letter-spacing: 2px; margin-bottom: 10px;">
                STUDIO ARCHITECTURE &bull; IN-HOUSE DIVISIONS
            </p>
            <h2 class="font-serif fw-bold text-white mb-2">
                Four Specialized Production Units
            </h2>
            <p class="mx-auto mb-0" style="color: rgba(245, 237, 228, 0.8); max-width: 620px; font-size: 15.5px;">
                From live audio sync during sacred pheras to museum-grade archival albums, every frame stays inside our dedicated studio pipeline.
            </p>
        </div>

        <div class="row g-4">
            <?php foreach ($departments as $dept): ?>
                <div class="col-lg-3 col-md-6">
                    <div class="team-dept-card">
                        <div class="team-dept-icon">
                            <i class="bi <?= htmlspecialchars($dept['icon']) ?>"></i>
                        </div>
                        <span class="d-block mb-2" style="font-family: 'Courier New', monospace; font-size: 10.5px; color: #ffd875; letter-spacing: 1px;">
                            <?= htmlspecialchars($dept['code']) ?>
                        </span>
                        <h3 class="font-serif fw-bold text-white mb-2">
                            <?= htmlspecialchars($dept['title']) ?>
                        </h3>
                        <p class="mb-0" style="font-size: 13.5px; line-height: 1.65; color: rgba(255, 255, 255, 0.78);">
                            <?= htmlspecialchars($dept['desc']) ?>
                        </p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <!-- Booking CTA Banner -->
        <div class="mt-5 p-4 p-md-5 rounded-4 d-flex justify-content-between align-items-center flex-wrap gap-4" style="background: linear-gradient(135deg, rgba(107, 20, 38, 0.9) 0%, rgba(59, 6, 16, 0.95) 100%); border: 1.5px solid var(--champagne-gold); box-shadow: 0 20px 50px rgba(0, 0, 0, 0.45);">
            <div>
                <h3 class="font-serif fw-bold text-white mb-1">Reserve Our Lead Directors For Your 2026–2027 Celebration</h3>
                <p class="mb-0" style="color: #ebdcd0; font-size: 14.5px;">
                    We accept a curated number of destination weddings per season so our founding directors remain hands-on for every couple.
                </p>
            </div>
            <div class="d-flex gap-3 flex-wrap">
                <a href="<?= $appBasePath ?>/rsvp" class="button" style="background: var(--champagne-gold) !important; color: #210409 !important; border-color: var(--champagne-gold) !important; border-radius: 30px !important; padding: 0 28px;">
                    <i class="bi bi-calendar2-check-fill me-2"></i> Check Crew Availability
                </a>
                <a href="<?= $appBasePath ?>/blog" class="btn-gold-outline text-white border-white">
                    <i class="bi bi-journal-richtext me-1"></i> Read Studio Journal
                </a>
            </div>
        </div>
    </div>
</section>
