<?php
declare(strict_types=1);

/**
 * ============================================================================
 * WoW STUDIO — Public Website Master Shell Layout (Pure MPA)
 * Architecture: MPP Group Unified Shell & Event Bridge
 * Theme: Royal Burgundy (#6b1426) & Champagne Gold (#cfa859)
 * Brand: WoW Studio (Photography & Cinema)
 * Path: front/layout/frontlayout.php
 * ============================================================================
 */

$appBasePath = $appBasePath ?? '';
$pageTitle = $pageTitle ?? 'WoW Studio — Premium Wedding Photography & Cinematic Films';
$currModule = $currModule ?? ($_GET['module'] ?? 'home');
$isLoginPage = ($currModule === 'login');

require __DIR__ . '/../include/head.php';
?>

<?php if (!$isLoginPage): ?>
<!-- Announcement Bar (MPP Group signature top bar) -->
<div class="announcement-bar">
    <div class="container d-flex justify-content-between align-items-center flex-wrap gap-2">
        <div>
            <span class="announcement-badge">WoW Studio</span>
            <strong>Luxury Wedding Photography &bull; 4K Cinematic Films</strong> &bull; Destination &bull; Editorial &bull; Pre-Weddings
        </div>
        <div>
            <a href="<?= $appBasePath ?>/rsvp" class="announcement-link" style="color:#ffffff; font-weight:700; text-decoration:underline;">
                Inquire Dates &bull; Book Now &rarr;
            </a>
        </div>
    </div>
</div>

<?php
require __DIR__ . '/../include/header.php';
?>
<?php endif; ?>

<main id="main-content" data-module="<?= htmlspecialchars($currModule ?? 'home', ENT_QUOTES, 'UTF-8') ?>" class="<?= $isLoginPage ? 'login-page-main' : '' ?>">
    <?php
    if (isset($contentView) && is_file($contentView)) {
        require $contentView;
    } elseif (isset($viewPath) && is_file($viewPath)) {
        require $viewPath;
    } else {
        echo '<section class="section"><div class="container"><div class="p-5 text-center bg-light rounded-4"><h2>Page Under Construction</h2><p class="text-muted">This section is currently being updated with royal moments.</p><a href="' . ($appBasePath ?? '') . '/" class="button mt-3">Back to Home</a></div></div></section>';
    }
    ?>
</main>

<?php
if (!$isLoginPage) {
    require __DIR__ . '/../include/footer.php';
} else {
    echo '</body></html>';
}
