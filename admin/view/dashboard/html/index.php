<?php
declare(strict_types=1);

$db = \Config\Database::connect();

// Statistics
$totalRsvps = (int)$db->query("SELECT COUNT(*) FROM rsvps")->fetchColumn();
$attendingGuests = (int)$db->query("SELECT COALESCE(SUM(guest_count), 0) FROM rsvps WHERE attending = 'attending'")->fetchColumn();
$totalWishes = (int)$db->query("SELECT COUNT(*) FROM wishes")->fetchColumn();
$totalEvents = (int)$db->query("SELECT COUNT(*) FROM wedding_events")->fetchColumn();
$totalPhotos = (int)$db->query("SELECT COUNT(*) FROM gallery")->fetchColumn();

// Settings
$wedding = $db->query("SELECT * FROM wedding_settings WHERE id = 1 LIMIT 1")->fetch();

// Recent RSVPs
$recentRsvps = $db->query("SELECT * FROM rsvps ORDER BY id DESC LIMIT 5")->fetchAll();
?>

<!-- Welcome Banner -->
<div class="p-4 rounded-4 mb-4" style="background: linear-gradient(135deg, #6b1426, #3b0d18); color: #ffffff;">
    <div class="row align-items-center">
        <div class="col-md-8">
            <h3 class="fw-bold mb-1">
                <?= htmlspecialchars($wedding['groom_name']) ?> &amp; <?= htmlspecialchars($wedding['bride_name']) ?> Wedding
            </h3>
            <p class="mb-0 text-white-50">
                Wedding Date: <strong class="text-white"><?= date('l, d F Y - h:i A', strtotime($wedding['wedding_date'])) ?></strong> &bull; Venue: <strong class="text-white"><?= htmlspecialchars($wedding['venue_name']) ?></strong>
            </p>
        </div>
        <div class="col-md-4 text-md-end mt-3 mt-md-0">
            <a href="index.php?module=settings" class="btn btn-warning btn-sm fw-semibold rounded-pill px-3">
                <i class="bi bi-gear-fill me-1"></i> Edit Wedding Info
            </a>
        </div>
    </div>
</div>

<!-- Stats Row -->
<div class="row g-4 mb-4">
    <div class="col-xl-3 col-sm-6">
        <div class="stat-card">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <span class="text-muted small text-uppercase fw-semibold">Confirmed Guests</span>
                <div class="rounded-3 p-2 bg-success bg-opacity-10 text-success">
                    <i class="bi bi-people-fill fs-4"></i>
                </div>
            </div>
            <h2 class="fw-bold mb-1 text-dark"><?= number_format($attendingGuests) ?></h2>
            <small class="text-muted"><i class="bi bi-check-circle-fill text-success"></i> Attending in person</small>
        </div>
    </div>

    <div class="col-xl-3 col-sm-6">
        <div class="stat-card">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <span class="text-muted small text-uppercase fw-semibold">Total RSVP Forms</span>
                <div class="rounded-3 p-2 bg-primary bg-opacity-10 text-primary">
                    <i class="bi bi-envelope-paper-heart-fill fs-4"></i>
                </div>
            </div>
            <h2 class="fw-bold mb-1 text-dark"><?= number_format($totalRsvps) ?></h2>
            <small class="text-muted"><a href="index.php?module=rsvps" class="text-decoration-none">Manage Guest list &rarr;</a></small>
        </div>
    </div>

    <div class="col-xl-3 col-sm-6">
        <div class="stat-card">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <span class="text-muted small text-uppercase fw-semibold">Guest Wishes</span>
                <div class="rounded-3 p-2 bg-warning bg-opacity-10 text-warning">
                    <i class="bi bi-chat-heart-fill fs-4"></i>
                </div>
            </div>
            <h2 class="fw-bold mb-1 text-dark"><?= number_format($totalWishes) ?></h2>
            <small class="text-muted"><a href="index.php?module=wishes" class="text-decoration-none">View Blessings Wall &rarr;</a></small>
        </div>
    </div>

    <div class="col-xl-3 col-sm-6">
        <div class="stat-card">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <span class="text-muted small text-uppercase fw-semibold">Ceremonies</span>
                <div class="rounded-3 p-2 bg-danger bg-opacity-10 text-danger">
                    <i class="bi bi-calendar-check-fill fs-4"></i>
                </div>
            </div>
            <h2 class="fw-bold mb-1 text-dark"><?= number_format($totalEvents) ?></h2>
            <small class="text-muted"><a href="index.php?module=events" class="text-decoration-none">View Itinerary &rarr;</a></small>
        </div>
    </div>
</div>

<!-- Recent RSVPs Table -->
<div class="table-card p-4 mb-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h5 class="fw-bold mb-1">Recent RSVP Registrations</h5>
            <p class="text-muted small mb-0">Latest responses received through public website</p>
        </div>
        <a href="index.php?module=rsvps" class="btn btn-outline-secondary btn-sm rounded-pill">
            View All RSVPs &rarr;
        </a>
    </div>

    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead class="table-light small text-uppercase text-muted">
                <tr>
                    <th>Guest Name</th>
                    <th>Phone</th>
                    <th>Status</th>
                    <th>Guests</th>
                    <th>Meal</th>
                    <th>Received At</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($recentRsvps)): ?>
                    <tr><td colspan="6" class="text-center py-4 text-muted">No RSVPs received yet. Share the website link with guests!</td></tr>
                <?php else: ?>
                    <?php foreach ($recentRsvps as $r): ?>
                        <tr>
                            <td class="fw-semibold text-dark"><?= htmlspecialchars($r['guest_name']) ?></td>
                            <td><?= htmlspecialchars($r['guest_phone']) ?></td>
                            <td>
                                <?php if ($r['attending'] === 'attending'): ?>
                                    <span class="badge bg-success bg-opacity-10 text-success fw-semibold"><i class="bi bi-check-circle me-1"></i> Attending</span>
                                <?php elseif ($r['attending'] === 'not_attending'): ?>
                                    <span class="badge bg-danger bg-opacity-10 text-danger fw-semibold"><i class="bi bi-x-circle me-1"></i> Regret</span>
                                <?php else: ?>
                                    <span class="badge bg-warning bg-opacity-10 text-warning fw-semibold"><i class="bi bi-question-circle me-1"></i> Maybe</span>
                                <?php endif; ?>
                            </td>
                            <td><span class="badge bg-light text-dark border"><?= (int)$r['guest_count'] ?></span></td>
                            <td><span class="badge bg-light text-dark border text-capitalize"><?= htmlspecialchars($r['meal_preference']) ?></span></td>
                            <td class="small text-muted"><?= date('d M Y, h:i A', strtotime($r['created_at'])) ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
