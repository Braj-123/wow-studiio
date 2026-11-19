<?php
declare(strict_types=1);

/**
 * ============================================================================
 * WoW STUDIO — Services, Cinema Packages & Production Options View
 * Layout: MPP Group Enterprise Services Grid
 * Theme: Royal Burgundy (#6b1426) & Champagne Gold (#cfa859)
 * Brand: WoW Studio
 * File: front/view/services/html/index.php
 * ============================================================================
 */

$appBasePath = $appBasePath ?? '';
$db = \Config\Database::connect();
$services = $db->query("SELECT * FROM wedding_services ORDER BY order_num ASC, id ASC")->fetchAll();
?>

<!-- =========================================================================
     PAGE HERO (MPP Group Signature Hero)
     ========================================================================= -->
<section class="page-hero py-5 text-center position-relative" style="background: linear-gradient(135deg, rgba(20, 3, 8, 0.58) 0%, rgba(74, 11, 23, 0.68) 100%), url('<?= $appBasePath ?>/uploads/photo%20store/10.jpeg') center/cover no-repeat; padding-top: 85px !important; padding-bottom: 75px !important; border-bottom: 2px solid var(--champagne-gold);">
    <div class="container position-relative" style="z-index: 2;">
        <span class="badge rounded-pill mb-2 px-3 py-1" style="background: var(--champagne-gold); color: #2c2523; font-weight: 700; letter-spacing: 2px; font-size: 11px;">
            CINEMATIC PACKAGES &bull; WoW STUDIO
        </span>
        <h1 class="font-serif fw-bold text-white mb-3" style="font-size: clamp(36px, 4.2vw, 58px);">
            Photography &amp; Cinema Services
        </h1>
        <p class="lead text-light font-serif fst-italic mb-0" style="max-width: 650px; margin: 0 auto; color: #ebdcd0 !important; font-size: 18px;">
            "From candid fine-art albums to full 4K HDR cinematic wedding feature films, explore our bespoke production services."
        </p>
    </div>
</section>

<!-- =========================================================================
     SERVICES GRID
     ========================================================================= -->
<section class="section" style="background-color: var(--paper-bg); padding: 80px 0 100px;">
    <div class="container">
        <div class="row g-4 justify-content-center">
            <?php foreach ($services as $srv): ?>
                <div class="col-lg-6">
                    <div class="p-4 p-md-5 rounded-4 bg-white h-100 d-flex align-items-start gap-4 shadow-sm" style="border: 1.5px solid var(--champagne-gold-border); border-radius: 20px;">
                        <div class="rounded-circle d-grid place-items-center flex-shrink-0" style="width: 72px; height: 72px; background: var(--royal-burgundy-light); color: var(--royal-burgundy); font-size: 30px;">
                            <i class="bi <?= htmlspecialchars($srv['icon']) ?>"></i>
                        </div>
                        <div class="flex-grow-1">
                            <h3 class="font-serif fw-bold mb-2" style="color: var(--royal-burgundy); font-size: 1.35rem;">
                                <?= htmlspecialchars($srv['title']) ?>
                            </h3>
                            <p class="text-muted mb-3" style="line-height: 1.7; font-size: 14.5px;">
                                <?= htmlspecialchars($srv['description']) ?>
                            </p>
                            <?php if (!empty($srv['contact_person']) || !empty($srv['contact_phone'])): ?>
                                <div class="pt-3 border-top d-flex align-items-center justify-content-between flex-wrap gap-2 text-muted small">
                                    <span>
                                        <i class="bi bi-camera2 me-1" style="color: var(--champagne-gold);"></i> Lead: <strong><?= htmlspecialchars($srv['contact_person'] ?? '') ?></strong>
                                    </span>
                                    <a href="<?= $appBasePath ?>/rsvp" class="btn btn-sm btn-gold-outline py-1 px-3">
                                        <i class="bi bi-calendar2-check me-1"></i> Inquire Package
                                    </a>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <!-- Bespoke Consultation Banner -->
        <div class="mt-5 text-center p-4 p-md-5 rounded-4" style="background: linear-gradient(135deg, #4a0b17 0%, #6b1426 100%); border: 2px solid var(--champagne-gold); color: #ffffff; border-radius: 20px;">
            <i class="bi bi-camera-reels fs-1" style="color: var(--champagne-gold);"></i>
            <h3 class="font-serif fw-bold text-white mt-2 mb-2">Need A Customized Destination Proposal?</h3>
            <p style="color: #ecdccb; max-width: 600px; margin: 0 auto 20px;">
                Every wedding has unique timelines, travel destinations, and requirements. Schedule a 1-on-1 direct video consultation or coffee meet with WoW Studio director.
            </p>
            <div class="d-flex justify-content-center gap-3 flex-wrap">
                <a href="<?= $appBasePath ?>/rsvp" class="btn btn-royal" style="background: var(--champagne-gold); color: #2c2523; font-weight: 700; border-color: var(--champagne-gold);">
                    <i class="bi bi-calendar-check-fill me-1"></i> Book A Consultation Call
                </a>
                <a href="tel:+919876543210" class="btn btn-gold-outline text-white border-white">
                    <i class="bi bi-telephone-fill me-1"></i> Direct Helpline: +91 98765 43210
                </a>
            </div>
        </div>
    </div>
</section>
