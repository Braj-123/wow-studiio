<?php
declare(strict_types=1);

/**
 * ============================================================================
 * WEDDING PLATFORM — ADMIN FRONT CONTROLLER & ROUTER
 * File: admin/index.php
 * ============================================================================
 */

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once __DIR__ . '/../config/db.php';

// Authentication Guard
if (empty($_SESSION['wedding_admin'])) {
    header('Location: login.php');
    exit;
}

// Module routing
$module = trim((string)($_GET['module'] ?? 'dashboard'));
$file = trim((string)($_GET['file'] ?? 'index'));

$allowedModules = [
    'dashboard',
    'events',
    'story',
    'team',
    'services',
    'gallery',
    'rsvps',
    'wishes',
    'settings',
];

if (!in_array($module, $allowedModules, true)) {
    $module = 'dashboard';
}

$viewFile = __DIR__ . "/view/{$module}/html/{$file}.php";
if (!is_file($viewFile)) {
    $viewFile = __DIR__ . "/view/{$module}/html/index.php";
}

// Page Titles
$titles = [
    'dashboard' => 'Dashboard Overview',
    'events' => 'Manage Wedding Ceremonies',
    'story' => 'Couple Love Story Timeline',
    'team' => 'Family & Bridal Entourage',
    'services' => 'Guest Arrangements & Services',
    'gallery' => 'Wedding Photo Gallery',
    'rsvps' => 'Guest RSVPs & Headcount',
    'wishes' => 'Guestbook Wishes Moderation',
    'settings' => 'General Wedding Settings',
];
$pageTitle = $titles[$module] ?? 'Wedding Admin';

// Render Layout & View
require_once __DIR__ . '/layout/header.php';

if (is_file($viewFile)) {
    require $viewFile;
} else {
    echo '<div class="alert alert-info">Module view not found.</div>';
}

require_once __DIR__ . '/layout/footer.php';
