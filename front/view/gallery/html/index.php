<?php
declare(strict_types=1);

/**
 * ============================================================================
 * WEDDING PLATFORM — Complete Photo Gallery View
 * Layout: MPP Group Filterable Showcase with Fullscreen Lightbox
 * Theme: Royal Burgundy (#6b1426) & Champagne Gold (#cfa859)
 * Photos: C:\xampp\htdocs\Manish_web\uploads\photo store
 * File: front/view/gallery/html/index.php
 * ============================================================================
 */

$appBasePath = $appBasePath ?? '';
$db = \Config\Database::connect();

// Fetch all gallery photos
$photos = $db->query("SELECT * FROM gallery ORDER BY order_num ASC, id ASC")->fetchAll();

// Fallback to directory scan if DB table is empty
if (empty($photos)) {
    $dir = dirname(__DIR__, 4) . '/uploads/photo store';
    if (is_dir($dir)) {
        $files = scandir($dir);
        $order = 1;
        foreach ($files as $f) {
            if ($f === '.' || $f === '..' || str_ends_with($f, '.mp4')) continue;
            $photos[] = [
                'title' => 'Cherished Moment #' . $order,
                'category' => ($order % 3 === 0) ? 'wedding' : (($order % 2 === 0) ? 'haldi' : 'pre-wedding'),
                'image_url' => 'uploads/photo store/' . $f,
                'order_num' => $order++
            ];
        }
    }
}
?>

<!-- =========================================================================
     PAGE HERO (MPP Group Signature Hero with Royal Theme)
     ========================================================================= -->
<section class="page-hero py-5 text-center position-relative" style="background: linear-gradient(135deg, rgba(20, 3, 8, 0.58) 0%, rgba(74, 11, 23, 0.68) 100%), url('<?= $appBasePath ?>/uploads/photo%20store/3.jpeg') center/cover no-repeat; padding-top: 85px !important; padding-bottom: 75px !important; border-bottom: 2px solid var(--champagne-gold);">
    <div class="container position-relative" style="z-index: 2;">
        <span class="badge rounded-pill mb-2 px-3 py-1" style="background: var(--champagne-gold); color: #2c2523; font-weight: 700; letter-spacing: 2px; font-size: 11px;">
            WoW STUDIO &bull; MASTER PORTFOLIO
        </span>
        <h1 class="font-serif fw-bold text-white mb-3" style="font-size: clamp(36px, 4.2vw, 58px);">
            Featured Weddings &amp; Visual Stories
        </h1>
        <p class="lead text-light font-serif fst-italic mb-0" style="max-width: 650px; margin: 0 auto; color: #ebdcd0 !important; font-size: 18px;">
            "A showcase of raw emotion, cinematic lighting, regal celebrations, and the timeless beauty of love captured across India and destination shores."
        </p>
    </div>
</section>

<!-- =========================================================================
     GALLERY FILTER & MASONRY-STYLE GRID
     ========================================================================= -->
<section class="section" style="background-color: var(--paper-bg); padding: 70px 0 100px;">
    <div class="container">
        <!-- Filter Tabs -->
        <div class="d-flex justify-content-center flex-wrap gap-2 mb-5" id="galleryFilterNav">
            <button class="btn btn-royal btn-sm active" data-filter="all">All Photos (<?= count($photos) ?>)</button>
            <button class="btn btn-gold-outline btn-sm" data-filter="pre-wedding">Pre-Wedding Romance</button>
            <button class="btn btn-gold-outline btn-sm" data-filter="wedding">Sacred Wedding &amp; Pheras</button>
            <button class="btn btn-gold-outline btn-sm" data-filter="haldi">Haldi Rituals</button>
            <button class="btn btn-gold-outline btn-sm" data-filter="sangeet">Mehndi &amp; Sangeet</button>
            <button class="btn btn-gold-outline btn-sm" data-filter="reception">Grand Reception</button>
        </div>

        <!-- Grid Cards -->
        <div class="row g-4" id="mainGalleryGrid">
            <?php foreach ($photos as $p): ?>
                <div class="col-lg-4 col-md-6 gallery-card-item" data-category="<?= htmlspecialchars($p['category']) ?>">
                    <div class="rounded-4 overflow-hidden position-relative group shadow-sm h-100" style="cursor: pointer; background: #ffffff; border: 2px solid var(--champagne-gold-border); border-radius: 18px; transition: transform 0.35s ease, box-shadow 0.35s ease;" onclick="openMainLightbox('<?= $appBasePath ?>/<?= htmlspecialchars($p['image_url']) ?>', '<?= htmlspecialchars($p['title'] ?? 'Wedding Moment') ?>', '<?= htmlspecialchars($p['category']) ?>')">
                        <div style="height: 310px; overflow: hidden; position: relative;">
                            <img src="<?= $appBasePath ?>/<?= htmlspecialchars($p['image_url']) ?>" alt="<?= htmlspecialchars($p['title'] ?? 'Wedding Moment') ?>" class="w-100 h-100" style="object-fit: cover; transition: transform 0.6s cubic-bezier(0.16, 1, 0.3, 1);" loading="lazy">
                            <span class="position-absolute top-0 start-0 m-3 badge rounded-pill px-3 py-1" style="background: var(--royal-burgundy); color: #ffffff; font-size: 11px; text-transform: uppercase; letter-spacing: 1px;">
                                <?= htmlspecialchars($p['category']) ?>
                            </span>
                        </div>
                        <div class="p-3 text-center" style="background: #ffffff; border-top: 1px solid var(--line);">
                            <h6 class="font-serif fw-bold mb-1" style="color: var(--royal-burgundy); font-size: 15px;">
                                <?= htmlspecialchars($p['title'] ?? 'Celebration') ?>
                            </h6>
                            <span class="small text-muted">Click to view full screen &rarr;</span>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <!-- Pre-Footer CTA -->
        <div class="mt-5 pt-4 text-center">
            <div class="p-4 p-md-5 rounded-4 d-inline-block text-center" style="background: #ffffff; border: 2px dashed var(--champagne-gold); max-width: 750px;">
                <i class="bi bi-camera-fill fs-2" style="color: var(--champagne-gold);"></i>
                <h4 class="font-serif fw-bold mt-2" style="color: var(--royal-burgundy);">Planning A Wedding Celebration?</h4>
                <p class="text-muted small mb-3">Let WoW Studio document your love story with editorial elegance, cinema lighting, and timeless emotion.</p>
                <a href="<?= $appBasePath ?>/rsvp" class="btn btn-royal">
                    <i class="bi bi-calendar-check me-1"></i> Inquire Availability for Your Date
                </a>
            </div>
        </div>
    </div>
</section>

<!-- =========================================================================
     FULLSCREEN LIGHTBOX MODAL
     ========================================================================= -->
<div class="modal fade" id="mainGalleryModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content bg-transparent border-0">
            <div class="modal-body p-0 text-center position-relative">
                <button type="button" class="btn-close btn-close-white position-absolute top-0 end-0 m-3 z-3" data-bs-dismiss="modal" aria-label="Close" style="filter: drop-shadow(0 2px 5px rgba(0,0,0,0.8));"></button>
                <div class="p-2 d-inline-block rounded-4" style="background: rgba(44, 11, 23, 0.95); border: 2px solid var(--champagne-gold); box-shadow: 0 25px 60px rgba(0,0,0,0.5);">
                    <img src="" id="mainLightboxImg" class="img-fluid rounded-3" style="max-height: 82vh; object-fit: contain;" alt="Wedding Moment">
                    <div class="p-3 text-center">
                        <span class="badge rounded-pill mb-2 px-3 py-1" id="mainLightboxCat" style="background: var(--champagne-gold); color: #2c2523; font-weight: 700;"></span>
                        <h4 id="mainLightboxCaption" class="text-white font-serif mb-0"></h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    window.openMainLightbox = function(src, caption, category) {
        document.getElementById('mainLightboxImg').src = src;
        document.getElementById('mainLightboxCaption').innerText = caption;
        document.getElementById('mainLightboxCat').innerText = category.toUpperCase();
        const modal = new bootstrap.Modal(document.getElementById('mainGalleryModal'));
        modal.show();
    };

    // Filter Logic
    const filterBtns = document.querySelectorAll('#galleryFilterNav button');
    filterBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            filterBtns.forEach(b => {
                b.classList.remove('btn-royal');
                b.classList.add('btn-gold-outline');
            });
            this.classList.remove('btn-gold-outline');
            this.classList.add('btn-royal');

            const filter = this.getAttribute('data-filter');
            document.querySelectorAll('.gallery-card-item').forEach(item => {
                const cat = item.getAttribute('data-category');
                if (filter === 'all' || cat === filter) {
                    item.style.display = 'block';
                } else {
                    item.style.display = 'none';
                }
            });
        });
    });
});
</script>
