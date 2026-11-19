<?php
declare(strict_types=1);

/**
 * ============================================================================
 * WoW STUDIO — PUBLIC WEBSITE FRONT CONTROLLER
 * Architecture: MPP Group Modular MPA Gateway
 * Theme: Royal Burgundy (#6b1426) & Champagne Gold (#cfa859)
 * Brand: WoW Studio
 * File: front/index.php
 * ============================================================================
 */

require_once __DIR__ . '/../config/db.php';

// Dynamically determine root base path
$appBasePath = '';
$scriptDir = dirname((string)($_SERVER['SCRIPT_NAME'] ?? ''));
if ($scriptDir !== '/' && $scriptDir !== '\\' && $scriptDir !== '.') {
    $cleanDir = str_replace('\\', '/', $scriptDir);
    $appBasePath = preg_replace('#/front/?$#', '', $cleanDir);
}

// Fetch Global Studio Settings
$db = \Config\Database::connect();
$stmt = $db->query("SELECT * FROM wedding_settings WHERE id = 1 LIMIT 1");
$wedding = $stmt->fetch() ?: [
    'groom_name' => 'WoW',
    'bride_name' => 'Studio',
    'wedding_date' => '2026-12-18 19:30:00',
    'venue_name' => 'WoW Studio Headquarters & Creative Lounge',
    'venue_address' => 'Studio Avenue, Luxury Arts District, Udaipur, Rajasthan - 313001',
    'contact_phone' => '+91 98765 43210',
    'contact_email' => 'hello@wowstudio.in',
    'hero_title' => 'Capturing Timeless Stories & Cinematic Memories',
    'hero_subtitle' => 'WoW Studio is an elite wedding photography & cinematic film production studio specializing in luxury destination weddings and authentic storytelling.'
];

// Routing resolution: Support both Clean URLs (domain/page-name) and Query Params (?module=page)
$module = trim((string)($_GET['module'] ?? $_GET['page'] ?? ''));
$file = trim((string)($_GET['file'] ?? $_GET['view'] ?? ''));
// ============================================================================
// CLEAN ROUTING & CANONICAL URL ENFORCEMENT
// Rule 1: Home page must ONLY be the domain root (e.g. /Manish_web/ or / on live domain)
// Rule 2: Other pages must be domain/page-name (e.g. /Manish_web/about, /Manish_web/techpartner)
// Rule 3: Query parameters (?module=...) or /home, /index.php 301 redirect to canonical clean URLs
// ============================================================================
$requestUri = (string)($_SERVER['REQUEST_URI'] ?? '/');
$parsedPath = parse_url($requestUri, PHP_URL_PATH) ?? '/';
$parsedQuery = parse_url($requestUri, PHP_URL_QUERY) ?? '';

$relPath = $parsedPath;
if ($appBasePath !== '' && str_starts_with($relPath, $appBasePath)) {
    $relPath = substr($relPath, strlen($appBasePath));
}
$relPath = trim((string)$relPath, '/');

// 1. Detect explicit query parameters ?module= or ?page= in client request
parse_str($parsedQuery, $explicitParams);
if (isset($explicitParams['module']) || isset($explicitParams['page'])) {
    $rawMod = trim((string)($explicitParams['module'] ?? $explicitParams['page']));
    unset($explicitParams['module'], $explicitParams['page'], $explicitParams['file'], $explicitParams['view']);
    $extraQs = !empty($explicitParams) ? '?' . http_build_query($explicitParams) : '';
    
    if (in_array(strtolower($rawMod), ['home', 'index', ''], true)) {
        header("Location: " . ($appBasePath === '' ? '/' : $appBasePath . '/') . $extraQs, true, 301);
        exit;
    } else {
        header("Location: " . ($appBasePath === '' ? '' : $appBasePath) . '/' . urlencode($rawMod) . $extraQs, true, 301);
        exit;
    }
}

// 2. Detect explicit /home, /index.php, /front, or /front/index.php in URL path
if (in_array(strtolower($relPath), ['home', 'index.php', 'index', 'front', 'front/index.php'], true)) {
    $extraQs = !empty($parsedQuery) ? '?' . $parsedQuery : '';
    header("Location: " . ($appBasePath === '' ? '/' : $appBasePath . '/') . $extraQs, true, 301);
    exit;
}

// 3. Resolve module and file from clean URL path
if ($module === '') {
    if ($relPath === '' || $relPath === 'index.php') {
        $module = 'home';
        $file = 'index';
    } else {
        $segments = explode('/', $relPath);
        $module = $segments[0] ?? 'home';
        $file = $segments[1] ?? 'index';
    }
}

if ($file === '') {
    $file = 'index';
}

// Normalize alias routes
$aliases = [
    'story' => 'about',
    'aboutus' => 'about',
    'about-us' => 'about',
    'ourteam' => 'team',
    'our-team' => 'team',
    'service' => 'services',
    'event' => 'events',
    'project' => 'events',
    'projects' => 'events',
    'our-project' => 'events',
    'our-projects' => 'events',
    'ourproject' => 'events',
    'portfolio' => 'gallery',
    'gallary' => 'gallery',
    'booking' => 'rsvp',
    'book-now' => 'rsvp',
    'booknow' => 'rsvp',
    'book' => 'rsvp',
    'wishes' => 'rsvp',
    'blogs' => 'blog',
    'journal' => 'blog',
    'news' => 'blog',
    'tech-partner' => 'techpartner',
    'tech_partner' => 'techpartner',
    'techpatner' => 'techpartner',
    'tech-team' => 'techpartner',
    'techteam' => 'techpartner',
    'project-detail' => 'project-detail',
    'projectdetail' => 'project-detail',
    'project-story' => 'project-detail',
    'projectstory' => 'project-detail',
    'project' => 'project-detail',
    'masterpiece' => 'project-detail',
    'masterpiece-detail' => 'project-detail',
];
if (isset($aliases[$module])) {
    $module = $aliases[$module];
}

// Allowed modules
$allowedModules = ['home', 'about', 'events', 'services', 'team', 'gallery', 'blog', 'rsvp', 'contact', 'techpartner', 'project-detail'];
if (!in_array($module, $allowedModules, true)) {
    $module = 'home';
}

// Page Titles for WoW Studio
$titles = [
    'home' => 'WoW Studio — Premium Wedding Photography & Cinematic Films',
    'about' => 'About WoW Studio — Our Philosophy, Gear & Visual Journey',
    'events' => 'Signature Shoot Experiences — Pre-Weddings, Weddings & Receptions',
    'gallery' => 'Portfolio Gallery — Featured Weddings & Editorial Shoots | WoW Studio',
    'services' => 'Photography & Cinema Packages — WoW Studio',
    'team' => 'Master Visual Crew & Creative Directors — WoW Studio',
    'blog' => 'Wedding Cinema Journal & Photography Blog — WoW Studio',
    'rsvp' => 'Book Your Wedding Date & Client Reviews — WoW Studio',
    'contact' => 'Contact WoW Studio — Studio Lounge, Phone & Inquiries',
    'techpartner' => 'Technology Partners & Cinema Gear Ecosystem — WoW Studio',
    'project-detail' => 'Masterpiece Cinema Story & Behind-The-Lens Production — WoW Studio',
];
$pageTitle = $titles[$module] ?? 'WoW Studio — Premium Wedding Photography & Cinema';

$currModule = $module;
$currFile = $file;

// Locate view file
$viewPath = __DIR__ . "/view/{$module}/html/{$file}.php";
if (!is_file($viewPath)) {
    $viewPath = __DIR__ . "/view/{$module}/html/index.php";
}

if (!is_file($viewPath)) {
    $module = 'home';
    $viewPath = __DIR__ . "/view/home/html/index.php";
}

$contentView = $viewPath;

// Render Unified Master Shell Layout
require_once __DIR__ . '/layout/frontlayout.php';
