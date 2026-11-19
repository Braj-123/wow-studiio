<?php
declare(strict_types=1);

$db = \Config\Database::connect();
$msg = '';

if (isset($_GET['delete_id'])) {
    $delId = (int)$_GET['delete_id'];
    $stmt = $db->prepare("DELETE FROM couple_story WHERE id = ?");
    $stmt->execute([$delId]);
    $msg = 'Story milestone removed.';
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_story'])) {
    $title = trim((string)($_POST['title'] ?? ''));
    $date = trim((string)($_POST['story_date'] ?? ''));
    $desc = trim((string)($_POST['description'] ?? ''));
    $order = (int)($_POST['order_num'] ?? 0);

    if ($title !== '') {
        $stmt = $db->prepare("INSERT INTO couple_story (title, story_date, description, order_num) VALUES (?, ?, ?, ?)");
        $stmt->execute([$title, $date, $desc, $order]);
        $msg = 'New story milestone added successfully!';
    }
}

$stories = $db->query("SELECT * FROM couple_story ORDER BY order_num ASC, id ASC")->fetchAll();
?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h4 class="fw-bold mb-1">Couple Love Story Milestones</h4>
        <p class="text-muted small mb-0">Timeline chapters published on the public "Our Story" page.</p>
    </div>
    <button class="btn btn-brand" data-bs-toggle="modal" data-bs-target="#addStoryModal">
        <i class="bi bi-plus-circle me-1"></i> Add Chapter
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
                    <th>Order</th>
                    <th>Chapter Title</th>
                    <th>Milestone Date</th>
                    <th>Story Description</th>
                    <th class="text-end">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($stories)): ?>
                    <tr><td colspan="5" class="text-center py-4 text-muted">No story chapters added yet.</td></tr>
                <?php else: ?>
                    <?php foreach ($stories as $st): ?>
                        <tr>
                            <td><span class="badge bg-light text-dark border"><?= (int)$st['order_num'] ?></span></td>
                            <td class="fw-bold text-dark"><?= htmlspecialchars($st['title']) ?></td>
                            <td><span class="badge bg-primary bg-opacity-10 text-primary fw-semibold"><?= htmlspecialchars($st['story_date']) ?></span></td>
                            <td class="small text-muted" style="max-width: 400px;"><?= nl2br(htmlspecialchars($st['description'])) ?></td>
                            <td class="text-end">
                                <a href="index.php?module=story&delete_id=<?= $st['id'] ?>" class="btn btn-outline-danger btn-sm rounded-pill" onclick="return confirm('Delete this chapter?');">
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

<!-- Add Story Modal -->
<div class="modal fade" id="addStoryModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fw-bold">Add Story Milestone</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form method="POST" action="">
                <input type="hidden" name="add_story" value="1">
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label small fw-semibold">Chapter Title *</label>
                        <input type="text" name="title" class="form-control" required placeholder="e.g. The Proposal, How We Met">
                    </div>
                    <div class="mb-3">
                        <label class="form-label small fw-semibold">Milestone Date *</label>
                        <input type="text" name="story_date" class="form-control" required placeholder="e.g. 14 February 2024">
                    </div>
                    <div class="mb-3">
                        <label class="form-label small fw-semibold">Sort Order</label>
                        <input type="number" name="order_num" class="form-control" value="1">
                    </div>
                    <div class="mb-3">
                        <label class="form-label small fw-semibold">Description *</label>
                        <textarea name="description" rows="4" class="form-control" required placeholder="Tell what made this moment unforgettable..."></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-brand">Save Milestone</button>
                </div>
            </form>
        </div>
    </div>
</div>
