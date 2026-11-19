<?php
declare(strict_types=1);

$db = \Config\Database::connect();
$msg = '';

if (isset($_GET['delete_id'])) {
    $delId = (int)$_GET['delete_id'];
    $stmt = $db->prepare("DELETE FROM wedding_team WHERE id = ?");
    $stmt->execute([$delId]);
    $msg = 'Family/team member removed.';
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_member'])) {
    $name = trim((string)($_POST['name'] ?? ''));
    $role = trim((string)($_POST['relation_role'] ?? ''));
    $side = trim((string)($_POST['side'] ?? 'groom'));
    $bio = trim((string)($_POST['bio'] ?? ''));
    $order = (int)($_POST['order_num'] ?? 0);

    if ($name !== '' && $role !== '') {
        $stmt = $db->prepare("INSERT INTO wedding_team (name, relation_role, side, bio, order_num) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([$name, $role, $side, $bio, $order]);
        $msg = 'New family member added successfully!';
    }
}

$members = $db->query("SELECT * FROM wedding_team ORDER BY side ASC, order_num ASC, id ASC")->fetchAll();
?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h4 class="fw-bold mb-1">Family &amp; Bridal Party</h4>
        <p class="text-muted small mb-0">Manage parents, bridesmaids, groomsmen, and close family.</p>
    </div>
    <button class="btn btn-brand" data-bs-toggle="modal" data-bs-target="#addMemberModal">
        <i class="bi bi-person-plus-fill me-1"></i> Add Family Member
    </button>
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
                    <th>Side</th>
                    <th>Name</th>
                    <th>Relation / Role</th>
                    <th>Short Note</th>
                    <th>Order</th>
                    <th class="text-end">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($members)): ?>
                    <tr><td colspan="6" class="text-center py-4 text-muted">No family members added yet.</td></tr>
                <?php else: ?>
                    <?php foreach ($members as $m): ?>
                        <tr>
                            <td>
                                <span class="badge <?= $m['side'] === 'groom' ? 'bg-primary' : 'bg-danger' ?> bg-opacity-10 <?= $m['side'] === 'groom' ? 'text-primary' : 'text-danger' ?> fw-semibold text-uppercase">
                                    <?= htmlspecialchars($m['side']) ?>'s Side
                                </span>
                            </td>
                            <td class="fw-bold text-dark"><?= htmlspecialchars($m['name']) ?></td>
                            <td><span class="badge bg-light text-dark border"><?= htmlspecialchars($m['relation_role']) ?></span></td>
                            <td class="small text-muted" style="max-width: 300px;"><?= htmlspecialchars($m['bio'] ?: '-') ?></td>
                            <td><span class="badge bg-light text-muted border"><?= (int)$m['order_num'] ?></span></td>
                            <td class="text-end">
                                <a href="index.php?module=team&delete_id=<?= $m['id'] ?>" class="btn btn-outline-danger btn-sm rounded-pill" onclick="return confirm('Remove member?');">
                                    <i class="bi bi-trash"></i> Delete
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Add Member Modal -->
<div class="modal fade" id="addMemberModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fw-bold">Add Family / Party Member</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form method="POST" action="">
                <input type="hidden" name="add_member" value="1">
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label small fw-semibold">Side *</label>
                        <select name="side" class="form-select" required>
                            <option value="groom">Groom's Side</option>
                            <option value="bride">Bride's Side</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label small fw-semibold">Full Name *</label>
                        <input type="text" name="name" class="form-control" required placeholder="e.g. Rameshwar Sharma">
                    </div>
                    <div class="mb-3">
                        <label class="form-label small fw-semibold">Relation or Role *</label>
                        <input type="text" name="relation_role" class="form-control" required placeholder="e.g. Groom's Father, Maid of Honor">
                    </div>
                    <div class="mb-3">
                        <label class="form-label small fw-semibold">Display Order</label>
                        <input type="number" name="order_num" class="form-control" value="1">
                    </div>
                    <div class="mb-3">
                        <label class="form-label small fw-semibold">Short Bio / Note</label>
                        <textarea name="bio" rows="2" class="form-control" placeholder="A brief note about them..."></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-brand">Save Member</button>
                </div>
            </form>
        </div>
    </div>
</div>
