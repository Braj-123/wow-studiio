<?php
declare(strict_types=1);

$db = \Config\Database::connect();
$msg = '';

if (isset($_GET['delete_id'])) {
    $delId = (int)$_GET['delete_id'];
    $stmt = $db->prepare("DELETE FROM wishes WHERE id = ?");
    $stmt->execute([$delId]);
    $msg = 'Wish deleted successfully.';
}

if (isset($_GET['approve_id'])) {
    $appId = (int)$_GET['approve_id'];
    $stmt = $db->prepare("UPDATE wishes SET status = 'approved' WHERE id = ?");
    $stmt->execute([$appId]);
    $msg = 'Wish approved for live display!';
}

$wishes = $db->query("SELECT * FROM wishes ORDER BY id DESC")->fetchAll();
?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h4 class="fw-bold mb-1">Guestbook Blessings &amp; Wishes</h4>
        <p class="text-muted small mb-0">Review, approve, and display guest wishes on the website wall.</p>
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
                    <th>Relation</th>
                    <th>Heartfelt Message</th>
                    <th>Status</th>
                    <th>Date</th>
                    <th class="text-end">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($wishes)): ?>
                    <tr><td colspan="6" class="text-center py-4 text-muted">No wishes received yet.</td></tr>
                <?php else: ?>
                    <?php foreach ($wishes as $w): ?>
                        <tr>
                            <td class="fw-bold text-dark"><?= htmlspecialchars($w['guest_name']) ?></td>
                            <td><span class="badge bg-light text-muted border"><?= htmlspecialchars($w['relation'] ?: 'Guest') ?></span></td>
                            <td class="font-serif fst-italic" style="max-width: 350px;">"<?= htmlspecialchars($w['message']) ?>"</td>
                            <td>
                                <?php if ($w['status'] === 'approved'): ?>
                                    <span class="badge bg-success bg-opacity-10 text-success fw-semibold"><i class="bi bi-check-all me-1"></i> Live</span>
                                <?php else: ?>
                                    <span class="badge bg-warning bg-opacity-10 text-warning fw-semibold"><i class="bi bi-hourglass-split me-1"></i> Pending</span>
                                <?php endif; ?>
                            </td>
                            <td class="small text-muted"><?= date('d M Y', strtotime($w['created_at'])) ?></td>
                            <td class="text-end">
                                <?php if ($w['status'] !== 'approved'): ?>
                                    <a href="index.php?module=wishes&approve_id=<?= $w['id'] ?>" class="btn btn-outline-success btn-sm rounded-pill me-1">
                                        <i class="bi bi-check-lg"></i> Approve
                                    </a>
                                <?php endif; ?>
                                <a href="index.php?module=wishes&delete_id=<?= $w['id'] ?>" class="btn btn-outline-danger btn-sm rounded-pill" onclick="return confirm('Delete this wish?');">
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
