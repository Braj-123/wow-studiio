<?php
declare(strict_types=1);

/**
 * ============================================================================
 * WoW STUDIO — Book A Shoot, Inquire Dates & Client Testimonials View
 * Layout: MPP Group Interactive Form & Testimonial Wall Architecture
 * Theme: Royal Burgundy (#6b1426) & Champagne Gold (#cfa859)
 * Brand: WoW Studio
 * File: front/view/rsvp/html/index.php
 * ============================================================================
 */

$appBasePath = $appBasePath ?? '';
$db = \Config\Database::connect();
$successMsg = '';
$errorMsg = '';

// Handle Shoot Booking / Inquiry Submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'submit_rsvp') {
    $guestName = trim((string)($_POST['guest_name'] ?? ''));
    $guestEmail = trim((string)($_POST['guest_email'] ?? ''));
    $guestPhone = trim((string)($_POST['guest_phone'] ?? ''));
    $guestCount = max(1, (int)($_POST['guest_count'] ?? 1));
    $attending = (string)($_POST['attending'] ?? 'attending');
    $meal = (string)($_POST['meal_preference'] ?? 'veg');
    $notes = trim((string)($_POST['notes'] ?? ''));

    if ($guestName === '' || $guestPhone === '') {
        $errorMsg = 'Please provide your name and phone number.';
    } else {
        $stmt = $db->prepare("INSERT INTO rsvps (guest_name, guest_email, guest_phone, guest_count, attending, meal_preference, notes) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->execute([$guestName, $guestEmail, $guestPhone, $guestCount, $attending, $meal, $notes]);
        $successMsg = 'Thank you! Your shoot inquiry has been received. The WoW Studio production director will contact you within 24 hours with dates and customized proposals.';
    }
}

// Handle Client Review Submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'submit_wish') {
    $name = trim((string)($_POST['wish_name'] ?? ''));
    $relation = trim((string)($_POST['wish_relation'] ?? ''));
    $message = trim((string)($_POST['wish_message'] ?? ''));

    if ($name === '' || $message === '') {
        $errorMsg = 'Please provide your name and review message.';
    } else {
        $stmt = $db->prepare("INSERT INTO wishes (guest_name, relation, message, status) VALUES (?, ?, ?, 'approved')");
        $stmt->execute([$name, $relation, $message]);
        $successMsg = 'Thank you for your review! Your praise has been added to the WoW Studio Wall of Love.';
    }
}

// Fetch all approved reviews
$wishes = $db->query("SELECT * FROM wishes WHERE status = 'approved' ORDER BY id DESC")->fetchAll();
?>

<!-- =========================================================================
     PAGE HERO (MPP Group Signature Hero)
     ========================================================================= -->
<section class="page-hero py-5 text-center position-relative" style="background: linear-gradient(135deg, rgba(20, 3, 8, 0.58) 0%, rgba(74, 11, 23, 0.68) 100%), url('<?= $appBasePath ?>/uploads/photo%20store/8.jpeg') center/cover no-repeat; padding-top: 85px !important; padding-bottom: 75px !important; border-bottom: 2px solid var(--champagne-gold);">
    <div class="container position-relative" style="z-index: 2;">
        <span class="badge rounded-pill mb-2 px-3 py-1" style="background: var(--champagne-gold); color: #2c2523; font-weight: 700; letter-spacing: 2px; font-size: 11px;">
            DATE INQUIRY &bull; WoW STUDIO
        </span>
        <h1 class="font-serif fw-bold text-white mb-3" style="font-size: clamp(36px, 4.2vw, 58px);">
            Book Your Shoot &amp; Client Praise
        </h1>
        <p class="lead text-light font-serif fst-italic mb-0" style="max-width: 650px; margin: 0 auto; color: #ebdcd0 !important; font-size: 18px;">
            "Dates for upcoming wedding seasons are reserved strictly on a first-confirmed basis. Inquire below to lock your celebration."
        </p>
    </div>
</section>

<!-- =========================================================================
     FORMS SECTION (Split Layout)
     ========================================================================= -->
<section class="section" style="background-color: var(--paper-bg); padding: 80px 0 100px;">
    <div class="container">

        <?php if ($successMsg): ?>
            <div class="alert alert-success alert-dismissible fade show text-center rounded-4 shadow-sm mb-5 p-4" role="alert" style="background: #e8f5e9; border: 1.5px solid #81c784; color: #2e7d32;">
                <i class="bi bi-check-circle-fill me-2 fs-4"></i> <strong class="fs-5"><?= htmlspecialchars($successMsg) ?></strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        <?php endif; ?>

        <?php if ($errorMsg): ?>
            <div class="alert alert-danger alert-dismissible fade show text-center rounded-4 shadow-sm mb-5 p-4" role="alert">
                <i class="bi bi-exclamation-triangle-fill me-2 fs-4"></i> <strong class="fs-5"><?= htmlspecialchars($errorMsg) ?></strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        <?php endif; ?>

        <div class="row g-5">
            <!-- Left Form: Shoot Booking Inquiry -->
            <div class="col-lg-6">
                <div class="p-4 p-md-5 rounded-4 bg-white h-100 shadow-sm" style="border: 2px solid var(--champagne-gold-border); border-radius: 20px;">
                    <div class="text-center mb-4">
                        <div class="mx-auto mb-3 rounded-circle d-grid place-items-center" style="width: 65px; height: 65px; background: var(--royal-burgundy-light); color: var(--royal-burgundy); font-size: 28px;">
                            <i class="bi bi-camera-reels-fill"></i>
                        </div>
                        <h2 class="font-serif fw-bold" style="color: var(--royal-burgundy);">Check Date &amp; Inquire</h2>
                        <p class="text-muted small">Receive bespoke photography &amp; film proposals from WoW Studio</p>
                    </div>

                    <form method="POST" action="">
                        <input type="hidden" name="action" value="submit_rsvp">

                        <div class="mb-3">
                            <label class="form-label fw-semibold small text-uppercase" style="letter-spacing: 0.5px; color: var(--charcoal);">Couple / Client Name *</label>
                            <input type="text" name="guest_name" class="form-control rounded-3 py-2" placeholder="e.g., Ananya & Devrath" required style="border: 1px solid var(--line);">
                        </div>

                        <div class="row g-3 mb-3">
                            <div class="col-sm-6">
                                <label class="form-label fw-semibold small text-uppercase" style="letter-spacing: 0.5px; color: var(--charcoal);">Phone / WhatsApp *</label>
                                <input type="tel" name="guest_phone" class="form-control rounded-3 py-2" placeholder="+91 98765 43210" required style="border: 1px solid var(--line);">
                            </div>
                            <div class="col-sm-6">
                                <label class="form-label fw-semibold small text-uppercase" style="letter-spacing: 0.5px; color: var(--charcoal);">Email Address</label>
                                <input type="email" name="guest_email" class="form-control rounded-3 py-2" placeholder="ananya@example.com" style="border: 1px solid var(--line);">
                            </div>
                        </div>

                        <div class="row g-3 mb-3">
                            <div class="col-sm-6">
                                <label class="form-label fw-semibold small text-uppercase" style="letter-spacing: 0.5px; color: var(--charcoal);">Shoot / Event Type</label>
                                <select name="attending" class="form-select rounded-3 py-2" style="border: 1px solid var(--line);">
                                    <option value="attending" selected>Luxury Destination Wedding (Full 3-4 Days)</option>
                                    <option value="not_attending">Pre-Wedding Cinematic Shoot</option>
                                    <option value="maybe">Wedding &amp; Reception (Single/Dual Day)</option>
                                </select>
                            </div>
                            <div class="col-sm-6">
                                <label class="form-label fw-semibold small text-uppercase" style="letter-spacing: 0.5px; color: var(--charcoal);">Event City / Destination</label>
                                <input type="text" name="meal_preference" class="form-control rounded-3 py-2" placeholder="e.g., Udaipur, Goa, Jaipur" style="border: 1px solid var(--line);">
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-semibold small text-uppercase" style="letter-spacing: 0.5px; color: var(--charcoal);">Tentative Dates / Venues / Vision</label>
                            <textarea name="notes" rows="3" class="form-control rounded-3" placeholder="Wedding dates in Dec 2026 at Udaipur Palace, interested in 4K cinema and drone coverage..." style="border: 1px solid var(--line);"></textarea>
                        </div>

                        <button type="submit" class="button btn-royal w-100 py-3 text-center" style="font-size: 16px;">
                            <i class="bi bi-send-check-fill me-2"></i> Submit Inquiry to WoW Studio
                        </button>
                    </form>
                </div>
            </div>

            <!-- Right Form: Leave a Client Review -->
            <div class="col-lg-6">
                <div class="p-4 p-md-5 rounded-4 bg-white h-100 shadow-sm" style="border: 2px solid var(--champagne-gold-border); border-radius: 20px;">
                    <div class="text-center mb-4">
                        <div class="mx-auto mb-3 rounded-circle d-grid place-items-center" style="width: 65px; height: 65px; background: var(--champagne-gold-light); color: var(--champagne-gold-deep); font-size: 28px;">
                            <i class="bi bi-star-fill"></i>
                        </div>
                        <h2 class="font-serif fw-bold" style="color: var(--royal-burgundy);">Leave A Review</h2>
                        <p class="text-muted small">Share your experience with WoW Studio photography &amp; cinema crew</p>
                    </div>

                    <form method="POST" action="">
                        <input type="hidden" name="action" value="submit_wish">

                        <div class="mb-3">
                            <label class="form-label fw-semibold small text-uppercase" style="letter-spacing: 0.5px; color: var(--charcoal);">Your Name(s) *</label>
                            <input type="text" name="wish_name" class="form-control rounded-3 py-2" placeholder="e.g., Sid & Rhea Kapoor" required style="border: 1px solid var(--line);">
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold small text-uppercase" style="letter-spacing: 0.5px; color: var(--charcoal);">Wedding Venue / Destination</label>
                            <input type="text" name="wish_relation" class="form-control rounded-3 py-2" placeholder="e.g., The Leela Palace, Udaipur" style="border: 1px solid var(--line);">
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-semibold small text-uppercase" style="letter-spacing: 0.5px; color: var(--charcoal);">Your Testimonial &amp; Experience *</label>
                            <textarea name="wish_message" rows="5" class="form-control rounded-3" placeholder="WoW Studio made our entire wedding feel like a movie. The photos and highlight film blew our minds..." required style="border: 1px solid var(--line);"></textarea>
                        </div>

                        <button type="submit" class="button btn-gold-outline w-100 py-3 text-center" style="font-size: 16px;">
                            <i class="bi bi-chat-heart-fill me-2"></i> Post Review on Wall of Love
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <!-- =====================================================================
             TESTIMONIALS WALL
             ===================================================================== -->
        <?php if (!empty($wishes)): ?>
            <div class="mt-5 pt-5">
                <div class="text-center mb-5">
                    <p class="eyebrow" style="color: var(--royal-burgundy);"><span></span> CLIENT APPRECIATION</p>
                    <h2 class="font-serif fw-bold" style="color: var(--royal-burgundy);">Praise from Couples Worldwide</h2>
                </div>

                <div class="row g-4">
                    <?php foreach ($wishes as $w): ?>
                        <div class="col-lg-4 col-md-6">
                            <div class="p-4 rounded-4 bg-white h-100 d-flex flex-column justify-content-between shadow-sm" style="border: 1.5px solid var(--champagne-gold-border); border-radius: 18px;">
                                <div>
                                    <div class="text-warning mb-2">
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                    </div>
                                    <p class="font-serif fst-italic text-muted my-3" style="line-height: 1.7;">
                                        "<?= nl2br(htmlspecialchars($w['message'])) ?>"
                                    </p>
                                </div>
                                <div class="border-top pt-3 d-flex justify-content-between align-items-center">
                                    <span class="fw-bold" style="color: var(--royal-burgundy);"><?= htmlspecialchars($w['guest_name']) ?></span>
                                    <span class="badge rounded-pill bg-light text-muted border small"><?= htmlspecialchars($w['relation'] ?: 'Couple') ?></span>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endif; ?>

    </div>
</section>
