<?php
declare(strict_types=1);

$db = \Config\Database::connect();
$msg = '';

if (isset($_GET['delete_id'])) {
    $delId = (int)$_GET['delete_id'];
    $stmt = $db->prepare("DELETE FROM gallery WHERE id = ?");
    $stmt->execute([$delId]);
    $msg = 'Photo removed from gallery.';
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_photo'])) {
    $title = trim((string)($_POST['title'] ?? ''));
    $cat = trim((string)($_POST['category'] ?? 'pre-wedding'));
    $url = trim((string)($_POST['image_url'] ?? ''));
    $order = (int)($_POST['order_num'] ?? 0);

    if ($url !== '') {
        $stmt = $db->prepare("INSERT INTO gallery (title, category, image_url, order_num) VALUES (?, ?, ?, ?)");
        $stmt->execute([$title, $cat, $url, $order]);
        $msg = 'Photo added to wedding gallery successfully!';
    }
}

$photos = $db->query("SELECT * FROM gallery ORDER BY order_num ASC, id DESC")->fetchAll();
?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h4 class="fw-bold mb-1">Wedding Photo Gallery</h4>
        <p class="text-muted small mb-0">Organize and publish celebration photos across various categories.</p>
    </div>
    <button class="btn btn-brand" data-bs-toggle="modal" data-bs-target="#addPhotoModal">
        <i class="bi bi-cloud-arrow-up-fill me-1"></i> Add New Photo
    </button>
</div>

<?php if ($msg): ?>
    <div class="alert alert-success alert-dismissible fade show rounded-3 mb-4">
        <i class="bi bi-check-circle-fill me-2"></i> <?= htmlspecialchars($msg) ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
<?php endif; ?>

<div class="row g-4">
    <?php if (empty($photos)): ?>
        <div class="col-12">
            <div class="table-card p-5 text-center text-muted">
                <i class="bi bi-images display-4 text-muted mb-3 d-block"></i>
                <h5>No Photos in Gallery</h5>
                <p class="small">Click "Add New Photo" to publish pre-wedding, haldi, mehndi or wedding photos.</p>
            </div>
        </div>
    <?php else: ?>
        <?php foreach ($photos as $p): ?>
            <div class="col-xl-3 col-lg-4 col-md-6">
                <div class="table-card overflow-hidden h-100 d-flex flex-column justify-content-between">
                    <div>
                        <?php 
                        $imgSrc = $p['image_url'];
                        if (!str_starts_with($imgSrc, 'http') && !str_starts_with($imgSrc, '/')) {
                            $imgSrc = '../' . $imgSrc;
                        }
                        ?>
                        <img src="<?= htmlspecialchars($imgSrc) ?>" alt="Gallery Image" class="w-100" style="height: 190px; object-fit: cover;">
                        <div class="p-3">
                            <h6 class="fw-bold text-dark mb-1"><?= htmlspecialchars($p['title'] ?: 'Untitled Moment') ?></h6>
                            <span class="badge bg-light text-muted border text-uppercase small"><?= htmlspecialchars($p['category']) ?></span>
                        </div>
                    </div>
                    <div class="p-3 border-top text-end bg-light">
                        <a href="index.php?module=gallery&delete_id=<?= $p['id'] ?>" class="btn btn-outline-danger btn-sm rounded-pill" onclick="return confirm('Remove this photo?');">
                            <i class="bi bi-trash"></i> Delete
                        </a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</div>

<!-- Add Photo Modal -->
<div class="modal fade" id="addPhotoModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fw-bold">Add Photo to Gallery</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form method="POST" action="">
                <input type="hidden" name="add_photo" value="1">
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label small fw-semibold">Photo Title / Caption</label>
                        <input type="text" name="title" class="form-control" placeholder="e.g. Sangeet Dance Performance">
                    </div>
                    <div class="mb-3">
                        <label class="form-label small fw-semibold">Category *</label>
                        <select name="category" class="form-select" required>
                            <option value="pre-wedding">Pre-Wedding Shoot</option>
                            <option value="engagement">Engagement</option>
                            <option value="haldi">Haldi Ceremony</option>
                            <option value="mehndi">Mehndi &amp; Sangeet</option>
                            <option value="wedding">Wedding / Varmala</option>
                            <option value="reception">Reception Evening</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label small fw-semibold">Image URL or Web Path *</label>
                        <input type="url" name="image_url" class="form-control" required placeholder="https://example.com/photo.jpg">
                        <small class="text-muted">Enter a direct image link or path from <code>uploads/gallery/...</code></small>
                    </div>
                    <div class="mb-3">
                        <label class="form-label small fw-semibold">Sort Order</label>
                        <input type="number" name="order_num" class="form-control" value="1">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-brand">Add Photo</button>
                </div>
            </form>
        </div>
    </div>
</div>
