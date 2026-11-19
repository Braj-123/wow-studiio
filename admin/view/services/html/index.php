<?php
declare(strict_types=1);

$db = \Config\Database::connect();
$msg = '';

if (isset($_GET['delete_id'])) {
    $delId = (int)$_GET['delete_id'];
    $stmt = $db->prepare("DELETE FROM wedding_services WHERE id = ?");
    $stmt->execute([$delId]);
    $msg = 'Arrangement service removed.';
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_service'])) {
    $title = trim((string)($_POST['title'] ?? ''));
    $desc = trim((string)($_POST['description'] ?? ''));
    $icon = trim((string)($_POST['icon'] ?? 'bi-heart'));
    $person = trim((string)($_POST['contact_person'] ?? ''));
    $phone = trim((string)($_POST['contact_phone'] ?? ''));
    $order = (int)($_POST['order_num'] ?? 0);

    if ($title !== '') {
        $stmt = $db->prepare("INSERT INTO wedding_services (title, description, icon, contact_person, contact_phone, order_num) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->execute([$title, $desc, $icon, $person, $phone, $order]);
        $msg = 'New guest service added successfully!';
    }
}

$services = $db->query("SELECT * FROM wedding_services ORDER BY order_num ASC, id ASC")->fetchAll();
?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h4 class="fw-bold mb-1">Guest Arrangements &amp; Services</h4>
        <p class="text-muted small mb-0">Manage stay, shuttle cabs, catering, and concierge helpdesk.</p>
    </div>
    <button class="btn btn-brand" data-bs-toggle="modal" data-bs-target="#addServiceModal">
        <i class="bi bi-plus-circle me-1"></i> Add Arrangement
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
                    <th>Service Title</th>
                    <th>Icon</th>
                    <th>Coordinator</th>
                    <th>Phone</th>
                    <th>Description</th>
                    <th class="text-end">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($services)): ?>
                    <tr><td colspan="7" class="text-center py-4 text-muted">No services added yet.</td></tr>
                <?php else: ?>
                    <?php foreach ($services as $s): ?>
                        <tr>
                            <td><span class="badge bg-light text-dark border"><?= (int)$s['order_num'] ?></span></td>
                            <td class="fw-bold text-dark"><?= htmlspecialchars($s['title']) ?></td>
                            <td><i class="bi <?= htmlspecialchars($s['icon']) ?> fs-5 text-primary"></i></td>
                            <td><?= htmlspecialchars($s['contact_person'] ?: '-') ?></td>
                            <td><?= htmlspecialchars($s['contact_phone'] ?: '-') ?></td>
                            <td class="small text-muted" style="max-width: 300px;"><?= htmlspecialchars($s['description']) ?></td>
                            <td class="text-end">
                                <a href="index.php?module=services&delete_id=<?= $s['id'] ?>" class="btn btn-outline-danger btn-sm rounded-pill" onclick="return confirm('Delete this service?');">
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

<!-- Add Service Modal -->
<div class="modal fade" id="addServiceModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fw-bold">Add Guest Arrangement</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form method="POST" action="">
                <input type="hidden" name="add_service" value="1">
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label small fw-semibold">Service Title *</label>
                        <input type="text" name="title" class="form-control" required placeholder="e.g. Luxury Stay, Airport Pickups">
                    </div>
                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label class="form-label small fw-semibold">Bootstrap Icon Class</label>
                            <input type="text" name="icon" class="form-control" value="bi-house-heart" placeholder="e.g. bi-car-front">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label small fw-semibold">Order</label>
                            <input type="number" name="order_num" class="form-control" value="1">
                        </div>
                    </div>
                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label class="form-label small fw-semibold">Coordinator Name</label>
                            <input type="text" name="contact_person" class="form-control" placeholder="e.g. Vikram Singh">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label small fw-semibold">Coordinator Phone</label>
                            <input type="text" name="contact_phone" class="form-control" placeholder="+91 98765 00000">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label small fw-semibold">Description *</label>
                        <textarea name="description" rows="3" class="form-control" required placeholder="Details about this service for guests..."></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-brand">Save Service</button>
                </div>
            </form>
        </div>
    </div>
</div>
