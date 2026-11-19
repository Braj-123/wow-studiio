<?php
declare(strict_types=1);

$db = \Config\Database::connect();
$msg = '';

if (isset($_GET['delete_id'])) {
    $delId = (int)$_GET['delete_id'];
    $stmt = $db->prepare("DELETE FROM rsvps WHERE id = ?");
    $stmt->execute([$delId]);
    $msg = 'RSVP entry removed.';
}

$rsvps = $db->query("SELECT * FROM rsvps ORDER BY id DESC")->fetchAll();
$totalAttending = (int)$db->query("SELECT COALESCE(SUM(guest_count), 0) FROM rsvps WHERE attending = 'attending'")->fetchColumn();
$totalRegrets = (int)$db->query("SELECT COUNT(*) FROM rsvps WHERE attending = 'not_attending'")->fetchColumn();
?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h4 class="fw-bold mb-1">Guest RSVPs &amp; Headcount</h4>
        <p class="text-muted small mb-0">Track confirmations, guest counts, and special meal preferences.</p>
    </div>
    <div class="d-flex gap-2">
        <span class="badge bg-success bg-opacity-10 text-success fs-6 py-2 px-3 border border-success border-opacity-25">
            <i class="bi bi-people-fill me-1"></i> <?= $totalAttending ?> Guests Attending
        </span>
        <span class="badge bg-danger bg-opacity-10 text-danger fs-6 py-2 px-3 border border-danger border-opacity-25">
            <i class="bi bi-x-circle me-1"></i> <?= $totalRegrets ?> Regrets
        </span>
    </div>
</div>

<?php if ($msg): ?>
    <div class="alert alert-success alert-dismissible fade show rounded-3 mb-4">
        <i class="bi bi-check-circle-fill me-2"></i> <?= htmlspecialchars($msg) ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
<?php endif; ?>

<div class="table-card p-4">
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead class="table-light small text-uppercase text-muted">
                <tr>
                    <th>Guest Name</th>
                    <th>Contact Info</th>
                    <th>Status</th>
                    <th>Headcount</th>
                    <th>Meal Preference</th>
                    <th>Special Notes</th>
                    <th>Submitted</th>
                    <th class="text-end">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($rsvps)): ?>
                    <tr><td colspan="8" class="text-center py-4 text-muted">No RSVPs received yet.</td></tr>
                <?php else: ?>
                    <?php foreach ($rsvps as $r): ?>
                        <tr>
                            <td class="fw-bold text-dark"><?= htmlspecialchars($r['guest_name']) ?></td>
                            <td>
                                <div><i class="bi bi-telephone-fill text-muted me-1"></i> <?= htmlspecialchars($r['guest_phone']) ?></div>
                                <?php if (!empty($r['guest_email'])): ?>
                                    <div class="small text-muted"><i class="bi bi-envelope text-muted me-1"></i> <?= htmlspecialchars($r['guest_email']) ?></div>
                                <?php endif; ?>
                            </td>
                            <td>
                                <?php if ($r['attending'] === 'attending'): ?>
                                    <span class="badge bg-success bg-opacity-10 text-success fw-semibold"><i class="bi bi-check-circle me-1"></i> Attending</span>
                                <?php elseif ($r['attending'] === 'not_attending'): ?>
                                    <span class="badge bg-danger bg-opacity-10 text-danger fw-semibold"><i class="bi bi-x-circle me-1"></i> Regret</span>
                                <?php else: ?>
                                    <span class="badge bg-warning bg-opacity-10 text-warning fw-semibold"><i class="bi bi-question-circle me-1"></i> Maybe</span>
                                <?php endif; ?>
                            </td>
                            <td><span class="badge bg-light text-dark border fs-6"><?= (int)$r['guest_count'] ?></span></td>
                            <td><span class="badge bg-light text-dark border text-capitalize"><?= htmlspecialchars($r['meal_preference']) ?></span></td>
                            <td class="small text-muted" style="max-width: 200px;"><?= htmlspecialchars($r['notes'] ?: '-') ?></td>
                            <td class="small text-muted"><?= date('d M, h:i A', strtotime($r['created_at'])) ?></td>
                            <td class="text-end">
                                <a href="index.php?module=rsvps&delete_id=<?= $r['id'] ?>" class="btn btn-outline-danger btn-sm rounded-pill" onclick="return confirm('Delete this RSVP?');">
                                    <i class="bi bi-trash"></i>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
