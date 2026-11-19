<?php
declare(strict_types=1);

$currentModule = $module ?? 'home';
?>
<!-- Navigation -->
<nav class="navbar navbar-expand-lg wedding-nav sticky-top">
    <div class="container">
        <a class="navbar-brand wedding-brand" href="<?= $appBasePath ?>/">
            <span><?= htmlspecialchars($wedding['groom_name']) ?></span>
            <span class="amp">&amp;</span>
            <span><?= htmlspecialchars($wedding['bride_name']) ?></span>
        </a>
        
        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#weddingNavbar" aria-controls="weddingNavbar" aria-expanded="false" aria-label="Toggle navigation">
            <i class="bi bi-list fs-2 text-dark"></i>
        </button>

        <div class="collapse navbar-collapse" id="weddingNavbar">
            <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link <?= $currentModule === 'home' ? 'active' : '' ?>" href="<?= $appBasePath ?>/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= $currentModule === 'about' ? 'active' : '' ?>" href="<?= $appBasePath ?>/?module=about">Our Story</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= $currentModule === 'events' ? 'active' : '' ?>" href="<?= $appBasePath ?>/?module=events">Events</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= $currentModule === 'services' ? 'active' : '' ?>" href="<?= $appBasePath ?>/?module=services">Arrangements</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= $currentModule === 'team' ? 'active' : '' ?>" href="<?= $appBasePath ?>/?module=team">Family</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= $currentModule === 'gallery' ? 'active' : '' ?>" href="<?= $appBasePath ?>/?module=gallery">Gallery</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= $currentModule === 'rsvp' ? 'active' : '' ?>" href="<?= $appBasePath ?>/?module=rsvp">RSVP &amp; Wishes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= $currentModule === 'contact' ? 'active' : '' ?>" href="<?= $appBasePath ?>/?module=contact">Venue &amp; Map</a>
                </li>
            </ul>

            <div class="d-flex align-items-center gap-2">
                <a href="<?= $appBasePath ?>/?module=rsvp" class="btn btn-royal btn-sm">
                    <i class="bi bi-envelope-heart me-1"></i> RSVP Now
                </a>
                <a href="<?= $appBasePath ?>/admin/login.php" class="btn btn-outline-secondary btn-sm rounded-pill" title="Admin Portal">
                    <i class="bi bi-lock-fill"></i>
                </a>
            </div>
        </div>
    </div>
</nav>
