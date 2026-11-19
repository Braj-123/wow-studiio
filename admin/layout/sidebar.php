<?php
declare(strict_types=1);

$curMod = $module ?? 'dashboard';
?>
<aside class="admin-sidebar" id="adminSidebar">
    <a href="index.php" class="sidebar-brand">
        <i class="bi bi-camera-fill"></i>
        <div>
            <h6 class="mb-0 fw-bold">WoW Studio Admin</h6>
            <small class="text-white-50" style="font-size: 0.75rem;">Photography &amp; Cinema Hub</small>
        </div>
    </a>

    <ul class="sidebar-menu">
        <li class="sidebar-menu-header">Overview</li>
        <li class="sidebar-item <?= $curMod === 'dashboard' ? 'active' : '' ?>">
            <a href="index.php"><i class="bi bi-speedometer2"></i> Dashboard</a>
        </li>

        <li class="sidebar-menu-header">Ceremonies &amp; Content</li>
        <li class="sidebar-item <?= $curMod === 'events' ? 'active' : '' ?>">
            <a href="index.php?module=events"><i class="bi bi-calendar-event"></i> Wedding Events</a>
        </li>
        <li class="sidebar-item <?= $curMod === 'story' ? 'active' : '' ?>">
            <a href="index.php?module=story"><i class="bi bi-book-half"></i> Couple Love Story</a>
        </li>
        <li class="sidebar-item <?= $curMod === 'team' ? 'active' : '' ?>">
            <a href="index.php?module=team"><i class="bi bi-people-fill"></i> Family &amp; Bridal Party</a>
        </li>
        <li class="sidebar-item <?= $curMod === 'services' ? 'active' : '' ?>">
            <a href="index.php?module=services"><i class="bi bi-hospitality"></i> Guest Arrangements</a>
        </li>
        <li class="sidebar-item <?= $curMod === 'gallery' ? 'active' : '' ?>">
            <a href="index.php?module=gallery"><i class="bi bi-images"></i> Photo Gallery</a>
        </li>

        <li class="sidebar-menu-header">Guest Management</li>
        <li class="sidebar-item <?= $curMod === 'rsvps' ? 'active' : '' ?>">
            <a href="index.php?module=rsvps"><i class="bi bi-envelope-paper-heart"></i> RSVPs &amp; Headcount</a>
        </li>
        <li class="sidebar-item <?= $curMod === 'wishes' ? 'active' : '' ?>">
            <a href="index.php?module=wishes"><i class="bi bi-chat-quote"></i> Guestbook Wishes</a>
        </li>

        <li class="sidebar-menu-header">System</li>
        <li class="sidebar-item <?= $curMod === 'settings' ? 'active' : '' ?>">
            <a href="index.php?module=settings"><i class="bi bi-sliders"></i> Wedding Settings</a>
        </li>
        <li class="sidebar-item">
            <a href="logout.php" class="text-danger"><i class="bi bi-box-arrow-right"></i> Sign Out</a>
        </li>
    </ul>
</aside>
