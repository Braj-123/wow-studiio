<?php
declare(strict_types=1);

/**
 * ============================================================================
 * WoW STUDIO — Studio Location, Lounge & Direct Contact Helpline View
 * Layout: MPP Group Interactive Split Contact Architecture
 * Theme: Royal Burgundy (#6b1426) & Champagne Gold (#cfa859)
 * Brand: WoW Studio
 * File: front/view/contact/html/index.php
 * ============================================================================
 */

$appBasePath = $appBasePath ?? '';
$db = \Config\Database::connect();
$stmt = $db->query("SELECT * FROM wedding_settings WHERE id = 1 LIMIT 1");
$wedding = $stmt->fetch();
?>

<!-- =========================================================================
     PAGE HERO (MPP Group Signature Hero)
     ========================================================================= -->
<section class="page-hero py-5 text-center position-relative" style="background: linear-gradient(135deg, rgba(20, 3, 8, 0.58) 0%, rgba(74, 11, 23, 0.68) 100%), url('<?= $appBasePath ?>/uploads/photo%20store/15.jpeg') center/cover no-repeat; padding-top: 85px !important; padding-bottom: 75px !important; border-bottom: 2px solid var(--champagne-gold);">
    <div class="container position-relative" style="z-index: 2;">
        <span class="badge rounded-pill mb-2 px-3 py-1" style="background: var(--champagne-gold); color: #2c2523; font-weight: 700; letter-spacing: 2px; font-size: 11px;">
            STUDIO LOUNGE &bull; UDAIPUR, RAJASTHAN
        </span>
        <h1 class="font-serif fw-bold text-white mb-3" style="font-size: clamp(36px, 4.2vw, 58px);">
            Studio Headquarters &amp; Inquiries
        </h1>
        <p class="lead text-light font-serif fst-italic mb-0" style="max-width: 650px; margin: 0 auto; color: #ebdcd0 !important; font-size: 18px;">
            "Visit our creative lounge in Udaipur for private screenings of 4K wedding films and album walkthroughs, or connect with our director directly."
        </p>
    </div>
</section>

<!-- =========================================================================
     STUDIO DETAILS & GOOGLE MAPS EMBED
     ========================================================================= -->
<section class="section" style="background-color: var(--paper-bg); padding: 80px 0 100px;">
    <div class="container">
        <div class="row g-4 align-items-stretch">
            <!-- Left Info Card -->
            <div class="col-lg-5">
                <div class="p-4 p-md-5 rounded-4 bg-white h-100 shadow-sm d-flex flex-column justify-content-between" style="border: 2px solid var(--champagne-gold-border); border-radius: 20px;">
                    <div>
                        <span class="badge rounded-pill mb-2 px-3 py-1" style="background: var(--royal-burgundy); color: #fff; font-size: 11px;">WoW STUDIO HQ</span>
                        <h2 class="font-serif fw-bold mb-4" style="color: var(--royal-burgundy); font-size: 1.85rem;">
                            <?= htmlspecialchars($wedding['venue_name'] ?: 'WoW Studio Headquarters') ?>
                        </h2>

                        <div class="d-flex align-items-start gap-3 mb-4">
                            <div class="rounded-circle d-grid place-items-center flex-shrink-0" style="width: 48px; height: 48px; background: var(--royal-burgundy-light); color: var(--royal-burgundy); font-size: 20px;">
                                <i class="bi bi-geo-alt-fill"></i>
                            </div>
                            <div>
                                <h6 class="fw-bold mb-1 text-dark">Studio Address</h6>
                                <p class="text-muted small mb-0" style="line-height: 1.6;"><?= htmlspecialchars($wedding['venue_address']) ?></p>
                            </div>
                        </div>

                        <div class="d-flex align-items-start gap-3 mb-4">
                            <div class="rounded-circle d-grid place-items-center flex-shrink-0" style="width: 48px; height: 48px; background: var(--champagne-gold-light); color: var(--champagne-gold-deep); font-size: 20px;">
                                <i class="bi bi-clock-history"></i>
                            </div>
                            <div>
                                <h6 class="fw-bold mb-1 text-dark">Lounge Screening Hours</h6>
                                <p class="text-muted small mb-0">Monday &ndash; Sunday &bull; 10:00 AM &ndash; 08:00 PM (By Appointment)</p>
                            </div>
                        </div>

                        <div class="d-flex align-items-start gap-3 mb-4">
                            <div class="rounded-circle d-grid place-items-center flex-shrink-0" style="width: 48px; height: 48px; background: var(--royal-burgundy-light); color: var(--royal-burgundy); font-size: 20px;">
                                <i class="bi bi-telephone-fill"></i>
                            </div>
                            <div>
                                <h6 class="fw-bold mb-1 text-dark">Booking Director Phone</h6>
                                <p class="text-muted small mb-0">
                                    <a href="tel:<?= htmlspecialchars($wedding['contact_phone']) ?>" class="text-decoration-none fw-bold" style="color: var(--royal-burgundy);">
                                        <?= htmlspecialchars($wedding['contact_phone']) ?>
                                    </a> (Direct / WhatsApp)
                                </p>
                            </div>
                        </div>

                        <div class="d-flex align-items-start gap-3 mb-4">
                            <div class="rounded-circle d-grid place-items-center flex-shrink-0" style="width: 48px; height: 48px; background: var(--champagne-gold-light); color: var(--champagne-gold-deep); font-size: 20px;">
                                <i class="bi bi-envelope-fill"></i>
                            </div>
                            <div>
                                <h6 class="fw-bold mb-1 text-dark">Email Inquiries</h6>
                                <p class="text-muted small mb-0">
                                    <a href="mailto:<?= htmlspecialchars($wedding['contact_email']) ?>" class="text-decoration-none text-muted">
                                        <?= htmlspecialchars($wedding['contact_email']) ?>
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="pt-3 border-top">
                        <a href="https://maps.google.com/?q=<?= urlencode($wedding['venue_name'] . ' ' . $wedding['venue_address']) ?>" target="_blank" class="button btn-royal w-100 text-center py-3">
                            <i class="bi bi-geo-alt-fill me-2"></i> Open Location in Google Maps
                        </a>
                    </div>
                </div>
            </div>

            <!-- Right Interactive Map Embed Frame -->
            <div class="col-lg-7">
                <div class="rounded-4 overflow-hidden shadow-sm h-100 position-relative" style="min-height: 480px; border: 2px solid var(--champagne-gold-border); border-radius: 20px;">
                    <iframe 
                        src="https://maps.google.com/maps?q=<?= urlencode('Udaipur Rajasthan India') ?>&t=&z=13&ie=UTF8&iwloc=&output=embed" 
                        width="100%" 
                        height="100%" 
                        style="border:0; min-height: 480px;" 
                        allowfullscreen="" 
                        loading="lazy">
                    </iframe>
                </div>
            </div>
        </div>
    </div>
</section>
