<?php
declare(strict_types=1);

$db = \Config\Database::connect();
$msg = '';

// Handle Delete
if (isset($_GET['delete_id'])) {
    $delId = (int)$_GET['delete_id'];
    $stmt = $db->prepare("DELETE FROM wedding_events WHERE id = ?");
    $stmt->execute([$delId]);
    $msg = 'Event ceremony removed successfully.';
}

// Handle Add / Update
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['save_event'])) {
    $title = trim((string)($_POST['title'] ?? ''));
    $date = trim((string)($_POST['event_date'] ?? ''));
    $startTime = trim((string)($_POST['start_time'] ?? ''));
    $endTime = trim((string)($_POST['end_time'] ?? ''));
    $venue = trim((string)($_POST['venue'] ?? ''));
    $address = trim((string)($_POST['address'] ?? ''));
    $dress = trim((string)($_POST['dress_code'] ?? ''));
    $desc = trim((string)($_POST['description'] ?? ''));
    $order = (int)($_POST['order_num'] ?? 0);

    if ($title !== '' && $date !== '') {
        $stmt = $db->prepare("INSERT INTO wedding_events (title, event_date, start_time, end_time, venue, address, dress_code, description, order_num) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->execute([$title, $date, $startTime, $endTime, $venue, $address, $dress, $desc, $order]);
        $msg = 'New wedding event added successfully!';
    }
}

$events = $db->query("SELECT * FROM wedding_events ORDER BY order_num ASC, event_date ASC")->fetchAll();
?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h4 class="fw-bold mb-1">Wedding Ceremonies &amp; Itinerary</h4>
        <p class="text-muted small mb-0">Manage rituals, timings, venues, and dress codes for each event.</p>
    </div>
    <button class="btn btn-brand" data-bs-toggle="modal" data-bs-target="#addEventModal">
        <i class="bi bi-plus-circle me-1"></i> Add New Ceremony
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
                    <th>Ceremony Name</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Venue</th>
                    <th>Dress Code</th>
                    <th class="text-end">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($events)): ?>
                    <tr><td colspan="7" class="text-center py-4 text-muted">No ceremonies added yet.</td></tr>
                <?php else: ?>
                    <?php foreach ($events as $ev): ?>
                        <tr>
                            <td><span class="badge bg-light text-dark border"><?= (int)$ev['order_num'] ?></span></td>
                            <td class="fw-bold text-dark"><?= htmlspecialchars($ev['title']) ?></td>
                            <td><i class="bi bi-calendar3 text-muted me-1"></i> <?= date('d M Y', strtotime($ev['event_date'])) ?></td>
                            <td><i class="bi bi-clock text-muted me-1"></i> <?= htmlspecialchars($ev['start_time']) ?> <?= $ev['end_time'] ? ' - ' . htmlspecialchars($ev['end_time']) : '' ?></td>
                            <td><?= htmlspecialchars($ev['venue']) ?></td>
                            <td><span class="badge bg-light text-dark border"><?= htmlspecialchars($ev['dress_code'] ?: 'Not Specified') ?></span></td>
                            <td class="text-end">
                                <a href="index.php?module=events&delete_id=<?= $ev['id'] ?>" class="btn btn-outline-danger btn-sm rounded-pill" onclick="return confirm('Are you sure you want to delete this event?');">
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

<!-- Add Event Modal -->
<div class="modal fade" id="addEventModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fw-bold">Add Wedding Ceremony</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form method="POST" action="">
                <input type="hidden" name="save_event" value="1">
                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-md-8">
                            <label class="form-label small fw-semibold">Ceremony Title *</label>
                            <input type="text" name="title" class="form-control" required placeholder="e.g. Haldi Ceremony, Sangeet Night">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label small fw-semibold">Display Order</label>
                            <input type="number" name="order_num" class="form-control" value="1">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label small fw-semibold">Event Date *</label>
                            <input type="date" name="event_date" class="form-control" required value="2026-12-16">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label small fw-semibold">Start Time *</label>
                            <input type="text" name="start_time" class="form-control" placeholder="e.g. 10:00 AM" required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label small fw-semibold">End Time</label>
                            <input type="text" name="end_time" class="form-control" placeholder="e.g. 02:00 PM">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label small fw-semibold">Venue Hall / Lawn *</label>
                            <input type="text" name="venue" class="form-control" required placeholder="e.g. Courtyard Lawn">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label small fw-semibold">Suggested Dress Code</label>
                            <input type="text" name="dress_code" class="form-control" placeholder="e.g. Traditional Yellow / Royal Lehengas">
                        </div>
                        <div class="col-12">
                            <label class="form-label small fw-semibold">Venue Address *</label>
                            <input type="text" name="address" class="form-control" required placeholder="e.g. The Grand Heritage Palace, Udaipur">
                        </div>
                        <div class="col-12">
                            <label class="form-label small fw-semibold">Ceremony Description</label>
                            <textarea name="description" rows="3" class="form-control" placeholder="Write a short description of the ritual and festivities..."></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-brand">Save Ceremony</button>
                </div>
            </form>
        </div>
    </div>
</div>
