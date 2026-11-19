<?php
declare(strict_types=1);

$db = \Config\Database::connect();
$msg = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_settings'])) {
    $groom = trim((string)($_POST['groom_name'] ?? ''));
    $bride = trim((string)($_POST['bride_name'] ?? ''));
    $groomBio = trim((string)($_POST['groom_bio'] ?? ''));
    $brideBio = trim((string)($_POST['bride_bio'] ?? ''));
    $date = trim((string)($_POST['wedding_date'] ?? ''));
    $venue = trim((string)($_POST['venue_name'] ?? ''));
    $address = trim((string)($_POST['venue_address'] ?? ''));
    $phone = trim((string)($_POST['contact_phone'] ?? ''));
    $email = trim((string)($_POST['contact_email'] ?? ''));
    $title = trim((string)($_POST['hero_title'] ?? ''));
    $subtitle = trim((string)($_POST['hero_subtitle'] ?? ''));
    $invitation = trim((string)($_POST['invitation_text'] ?? ''));

    $stmt = $db->prepare("UPDATE wedding_settings SET 
        groom_name = ?, bride_name = ?, groom_bio = ?, bride_bio = ?,
        wedding_date = ?, venue_name = ?, venue_address = ?, contact_phone = ?,
        contact_email = ?, hero_title = ?, hero_subtitle = ?, invitation_text = ?
        WHERE id = 1");
    $stmt->execute([$groom, $bride, $groomBio, $brideBio, $date, $venue, $address, $phone, $email, $title, $subtitle, $invitation]);
    $msg = 'Wedding settings updated successfully! Live website countdown and details are now updated.';
}

$wedding = $db->query("SELECT * FROM wedding_settings WHERE id = 1 LIMIT 1")->fetch();
?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h4 class="fw-bold mb-1">General Wedding Settings</h4>
        <p class="text-muted small mb-0">Update couple names, wedding date (countdown timer), venue, and invitation text.</p>
    </div>
</div>

<?php if ($msg): ?>
    <div class="alert alert-success alert-dismissible fade show rounded-3 mb-4">
        <i class="bi bi-check-circle-fill me-2"></i> <?= htmlspecialchars($msg) ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
<?php endif; ?>

<div class="table-card p-4">
    <form method="POST" action="">
        <input type="hidden" name="update_settings" value="1">

        <h5 class="fw-bold text-dark border-bottom pb-2 mb-4">
            <i class="bi bi-heart-fill text-danger me-2"></i> Couple Details
        </h5>

        <div class="row g-3 mb-4">
            <div class="col-md-6">
                <label class="form-label fw-semibold small">Groom's Name *</label>
                <input type="text" name="groom_name" class="form-control" required value="<?= htmlspecialchars($wedding['groom_name']) ?>">
            </div>
            <div class="col-md-6">
                <label class="form-label fw-semibold small">Bride's Name *</label>
                <input type="text" name="bride_name" class="form-control" required value="<?= htmlspecialchars($wedding['bride_name']) ?>">
            </div>
            <div class="col-md-6">
                <label class="form-label fw-semibold small">Groom Short Bio</label>
                <textarea name="groom_bio" rows="3" class="form-control"><?= htmlspecialchars($wedding['groom_bio'] ?? '') ?></textarea>
            </div>
            <div class="col-md-6">
                <label class="form-label fw-semibold small">Bride Short Bio</label>
                <textarea name="bride_bio" rows="3" class="form-control"><?= htmlspecialchars($wedding['bride_bio'] ?? '') ?></textarea>
            </div>
        </div>

        <h5 class="fw-bold text-dark border-bottom pb-2 mb-4">
            <i class="bi bi-calendar-heart text-primary me-2"></i> Auspicious Date &amp; Countdown Target
        </h5>

        <div class="row g-3 mb-4">
            <div class="col-md-6">
                <label class="form-label fw-semibold small">Wedding Date &amp; Time (YYYY-MM-DD HH:MM:SS) *</label>
                <input type="text" name="wedding_date" class="form-control" required value="<?= htmlspecialchars($wedding['wedding_date']) ?>">
                <small class="text-muted">Example: <code>2026-12-18 19:30:00</code>. This directly controls the live timer on the website homepage.</small>
            </div>
            <div class="col-md-6">
                <label class="form-label fw-semibold small">Venue Name *</label>
                <input type="text" name="venue_name" class="form-control" required value="<?= htmlspecialchars($wedding['venue_name']) ?>">
            </div>
            <div class="col-12">
                <label class="form-label fw-semibold small">Venue Full Address *</label>
                <input type="text" name="venue_address" class="form-control" required value="<?= htmlspecialchars($wedding['venue_address']) ?>">
            </div>
        </div>

        <h5 class="fw-bold text-dark border-bottom pb-2 mb-4">
            <i class="bi bi-telephone-fill text-success me-2"></i> Contact &amp; Invitation Copy
        </h5>

        <div class="row g-3 mb-4">
            <div class="col-md-6">
                <label class="form-label fw-semibold small">Helpdesk / Coordinator Phone *</label>
                <input type="text" name="contact_phone" class="form-control" required value="<?= htmlspecialchars($wedding['contact_phone']) ?>">
            </div>
            <div class="col-md-6">
                <label class="form-label fw-semibold small">Inquiry Email *</label>
                <input type="email" name="contact_email" class="form-control" required value="<?= htmlspecialchars($wedding['contact_email']) ?>">
            </div>
            <div class="col-md-6">
                <label class="form-label fw-semibold small">Hero Headline</label>
                <input type="text" name="hero_title" class="form-control" value="<?= htmlspecialchars($wedding['hero_title']) ?>">
            </div>
            <div class="col-md-6">
                <label class="form-label fw-semibold small">Hero Subtitle</label>
                <input type="text" name="hero_subtitle" class="form-control" value="<?= htmlspecialchars($wedding['hero_subtitle']) ?>">
            </div>
            <div class="col-12">
                <label class="form-label fw-semibold small">Invitation Letter / Text</label>
                <textarea name="invitation_text" rows="4" class="form-control"><?= htmlspecialchars($wedding['invitation_text'] ?? '') ?></textarea>
            </div>
        </div>

        <div class="border-top pt-4 text-end">
            <button type="submit" class="btn btn-brand px-4 py-2">
                <i class="bi bi-save2-fill me-1"></i> Save Wedding Settings
            </button>
        </div>
    </form>
</div>
