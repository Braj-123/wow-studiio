<?php
declare(strict_types=1);

/**
 * ============================================================================
 * WoW STUDIO — PUBLIC WEBSITE MASTER HEADER COMPONENT
 * Navigation: Home, About (Dropdown: About Us, Our Team, Tech Partner),
 *             Our Project, Gallery, Blog, Contact | Book Now Button
 * Layout: Fixed Clean Navbar (Zero Morphing / Single-Line Flex Architecture)
 * Theme: Royal Burgundy (#6b1426) & Champagne Gold (#cfa859)
 * Brand: WoW Studio
 * Path: front/include/header.php
 * ============================================================================
 */

$currModule = $currModule ?? ($_GET['module'] ?? 'home');
$appBasePath = $appBasePath ?? '';

// Check active state
$isHomeActive = ($currModule === 'home' || empty($currModule));
$isAboutActive = in_array($currModule, ['about', 'story', 'aboutus', 'techpartner', 'team', 'our-team'], true);
$isProjectActive = in_array($currModule, ['events', 'event', 'project', 'projects', 'our-project', 'ourproject'], true);
$isGalleryActive = in_array($currModule, ['gallery', 'gallary', 'portfolio'], true);
$isBlogActive = in_array($currModule, ['blog', 'blogs', 'journal', 'news'], true);
$isContactActive = ($currModule === 'contact');
?>
<header class="site-header" id="top">
    <div class="container nav-wrap">
        <!-- WoW Studio Monogram Brand -->
        <a class="brand" href="<?= $appBasePath ?>/" aria-label="WoW Studio Home">
            <span class="brand-logo-wrap">
                <img src="<?= $appBasePath ?>/front/assets/images/logo-mark.svg" alt="WoW Studio Emblem" class="brand-monogram-img">
            </span>
            <span class="brand-text-block ms-2">
                <span class="brand-title" style="font-family:'Playfair Display',serif; font-size: 1.45rem; color: var(--royal-burgundy, #6b1426); font-weight: 900; letter-spacing: 1px;">
                    WoW <span style="color: var(--champagne-gold, #cfa859);">STUDIO</span>
                </span>
                <small class="brand-subtitle d-block" style="font-family:'Poppins',sans-serif; font-size: 9.5px; font-weight: 700; letter-spacing: 2.2px; color: var(--champagne-gold-deep, #9b7829); text-transform: uppercase;">
                    PHOTOGRAPHY &bull; CINEMA &bull; FILMS
                </small>
            </span>
        </a>

        <!-- Primary Navigation: Home, About (Dropdown), Our Project, Gallery, Blog, Contact -->
        <nav class="primary-nav" id="primary-nav" aria-label="Primary navigation">
            <a href="<?= $appBasePath ?>/" class="<?= $isHomeActive ? 'active' : '' ?>">Home</a>

            <!-- About Dropdown with Hover & Luxury Styling -->
            <div class="nav-item-dropdown">
                <a href="<?= $appBasePath ?>/about" class="nav-dropdown-toggle <?= $isAboutActive ? 'active' : '' ?>" id="aboutDropdown" aria-haspopup="true" aria-expanded="false">
                    About <i class="bi bi-chevron-down nav-dropdown-caret ms-1"></i>
                </a>
                <div class="nav-dropdown-menu wow-dropdown-menu" aria-labelledby="aboutDropdown">
                    <div class="nav-dropdown-header">Studio Story &amp; Team</div>
                    <ul class="nav-dropdown-list">
                        <li>
                            <a class="nav-dropdown-link <?= ($currModule === 'about' || $currModule === 'aboutus') ? 'active' : '' ?>" href="<?= $appBasePath ?>/about">
                                <span class="nav-drop-left">
                                    <span class="nav-drop-icon icon-company"><i class="bi bi-info-circle-fill"></i></span>
                                    <span>About Us</span>
                                </span>
                                <i class="bi bi-arrow-right-short text-muted"></i>
                            </a>
                        </li>
                        <li>
                            <a class="nav-dropdown-link <?= ($currModule === 'team') ? 'active' : '' ?>" href="<?= $appBasePath ?>/team">
                                <span class="nav-drop-left">
                                    <span class="nav-drop-icon icon-journey"><i class="bi bi-people-fill"></i></span>
                                    <span>Our Team</span>
                                </span>
                                <i class="bi bi-arrow-right-short text-muted"></i>
                            </a>
                        </li>
                        <li>
                            <a class="nav-dropdown-link <?= ($currModule === 'techpartner') ? 'active' : '' ?>" href="<?= $appBasePath ?>/techpartner">
                                <span class="nav-drop-left">
                                    <span class="nav-drop-icon" style="background: rgba(107, 20, 38, 0.1); color: var(--royal-burgundy, #6b1426);"><i class="bi bi-camera-reels-fill"></i></span>
                                    <span>Tech Partner</span>
                                </span>
                                <i class="bi bi-arrow-right-short text-muted"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <a href="<?= $appBasePath ?>/events" class="<?= $isProjectActive ? 'active' : '' ?>">Our Project</a>
            <a href="<?= $appBasePath ?>/gallery" class="<?= $isGalleryActive ? 'active' : '' ?>">Gallery</a>
            <a href="<?= $appBasePath ?>/blog" class="<?= $isBlogActive ? 'active' : '' ?>">Blog</a>
            <a href="<?= $appBasePath ?>/contact" class="<?= $isContactActive ? 'active' : '' ?>">Contact</a>

            <!-- Mobile-only action buttons (Shown inside mobile drawer) -->
            <div class="nav-mobile-actions">
                <a class="btn-royal text-center" href="<?= $appBasePath ?>/rsvp">
                    <i class="bi bi-calendar2-check-fill me-1"></i> Book Now
                </a>
                <a class="btn-gold-outline text-center" href="<?= $appBasePath ?>/admin/login.php">
                    <i class="bi bi-shield-lock-fill me-1"></i> Studio Admin
                </a>
            </div>
        </nav>

        <!-- Right Header Action Area: Book Now Button -->
        <div class="nav-actions">
            <!-- Background Music / Ambient Audio Toggle Button -->
            <button id="weddingMusicToggle" class="btn btn-sm btn-gold-outline py-2 px-3 d-none d-lg-inline-flex align-items-center gap-2" title="Play Cinematic Ambience" aria-label="Toggle Cinematic Music">
                <i class="bi bi-music-note-beamed" id="musicIcon"></i>
                <span class="small fw-semibold" id="musicText">Ambience</span>
            </button>

            <!-- Book Now CTA Button -->
            <a class="button button-small btn-royal" href="<?= $appBasePath ?>/rsvp">
                <i class="bi bi-calendar2-check-fill me-1"></i> Book Now
            </a>

            <!-- Mobile Drawer Hamburger Toggle -->
            <button class="nav-toggle" type="button" aria-expanded="false" aria-controls="primary-nav" aria-label="Toggle navigation">
                <span class="sr-only">Toggle navigation</span>
                <span class="nav-bar"></span>
                <span class="nav-bar"></span>
                <span class="nav-bar"></span>
            </button>
        </div>
    </div>
</header>

<!-- Luxury Scoped Header & Dropdown Styles (Cleanly Placed Outside Nav Elements) -->
<style>
/* Navbar Single-Line Flex Guarantee */
.site-header {
    background: #ffffff !important;
    border-bottom: 1.5px solid rgba(207, 168, 89, 0.3) !important;
    box-shadow: 0 4px 22px rgba(107, 20, 38, 0.06) !important;
    position: sticky !important;
    top: 0 !important;
    z-index: 1050 !important;
    width: 100% !important;
}

.site-header .nav-wrap {
    display: flex !important;
    align-items: center !important;
    justify-content: space-between !important;
    flex-wrap: nowrap !important;
    gap: 16px !important;
}

.primary-nav {
    display: flex !important;
    align-items: center !important;
    justify-content: center !important;
    flex-wrap: nowrap !important;
    gap: clamp(6px, 1.1vw, 20px) !important;
    margin-inline: auto !important;
}

.primary-nav > a,
.nav-dropdown-toggle {
    font-family: var(--body, 'Poppins', sans-serif) !important;
    font-size: 15.5px !important;
    font-weight: 700 !important;
    color: #2c2523 !important;
    text-decoration: none !important;
    padding: 8px 6px !important;
    border-radius: 8px !important;
    transition: color 0.2s ease, background 0.2s ease !important;
    white-space: nowrap !important;
}

.primary-nav > a:hover,
.nav-dropdown-toggle:hover,
.nav-item-dropdown:hover .nav-dropdown-toggle {
    color: var(--royal-burgundy, #6b1426) !important;
}

.primary-nav > a.active,
.nav-dropdown-toggle.active {
    color: var(--royal-burgundy, #6b1426) !important;
    font-weight: 800 !important;
}

/* Dropdown Container */
.nav-item-dropdown {
    position: relative !important;
    display: inline-flex !important;
    align-items: center !important;
}

.nav-dropdown-caret {
    font-size: 10px !important;
    transition: transform 0.25s ease !important;
    color: var(--champagne-gold, #cfa859) !important;
}

.nav-item-dropdown:hover .nav-dropdown-caret {
    transform: rotate(180deg) !important;
    color: var(--royal-burgundy, #6b1426) !important;
}

/* Luxury Dropdown Menu */
.wow-dropdown-menu {
    position: absolute !important;
    top: calc(100% + 8px) !important;
    left: 0 !important;
    min-width: 250px !important;
    background: #ffffff !important;
    border: 1.5px solid rgba(207, 168, 89, 0.4) !important;
    border-radius: 14px !important;
    padding: 8px !important;
    box-shadow: 0 16px 45px rgba(107, 20, 38, 0.14), 0 4px 16px rgba(0, 0, 0, 0.05) !important;
    opacity: 0 !important;
    visibility: hidden !important;
    pointer-events: none !important;
    transform: translateY(10px) !important;
    transition: opacity 0.22s cubic-bezier(0.16, 1, 0.3, 1),
                transform 0.22s cubic-bezier(0.16, 1, 0.3, 1),
                visibility 0.22s ease !important;
    z-index: 1060 !important;
}

/* Invisible bridge for seamless hover transition */
.wow-dropdown-menu::before {
    content: '' !important;
    position: absolute !important;
    top: -12px !important;
    left: 0 !important;
    right: 0 !important;
    height: 14px !important;
    background: transparent !important;
}

.nav-item-dropdown:hover .wow-dropdown-menu,
.nav-item-dropdown:focus-within .wow-dropdown-menu {
    opacity: 1 !important;
    visibility: visible !important;
    pointer-events: auto !important;
    transform: translateY(0) !important;
}

.nav-dropdown-header {
    font-family: var(--body, 'Poppins', sans-serif) !important;
    font-size: 10.5px !important;
    font-weight: 800 !important;
    text-transform: uppercase !important;
    letter-spacing: 1.2px !important;
    color: var(--champagne-gold-deep, #9b7829) !important;
    padding: 6px 12px 6px !important;
    border-bottom: 1px solid rgba(207, 168, 89, 0.2) !important;
    margin-bottom: 6px !important;
}

/* Dropdown Link Items Override Primary Nav Link Rules */
.nav-item-dropdown .nav-dropdown-link {
    display: flex !important;
    align-items: center !important;
    justify-content: space-between !important;
    padding: 10px 14px !important;
    border-radius: 10px !important;
    color: #2c2523 !important;
    font-size: 13.5px !important;
    font-weight: 600 !important;
    text-decoration: none !important;
    transition: all 0.2s ease !important;
    white-space: nowrap !important;
    width: 100% !important;
    background: transparent !important;
}

.nav-item-dropdown .nav-dropdown-link:hover,
.nav-item-dropdown .nav-dropdown-link.active {
    background: rgba(207, 168, 89, 0.12) !important;
    color: var(--royal-burgundy, #6b1426) !important;
    transform: translateX(3px) !important;
}

.nav-item-dropdown .nav-dropdown-link .nav-drop-icon {
    width: 30px !important;
    height: 30px !important;
    border-radius: 8px !important;
    display: inline-flex !important;
    align-items: center !important;
    justify-content: center !important;
    font-size: 13px !important;
    flex-shrink: 0 !important;
}

.nav-item-dropdown .nav-dropdown-link .icon-company {
    background: rgba(207, 168, 89, 0.18) !important;
    color: var(--royal-burgundy, #6b1426) !important;
}

.nav-item-dropdown .nav-dropdown-link .icon-journey {
    background: rgba(107, 20, 38, 0.10) !important;
    color: var(--royal-burgundy, #6b1426) !important;
}

/* Mobile responsive drawer styling */
@media (max-width: 1080px) {
    .site-header .nav-wrap {
        flex-wrap: wrap !important;
    }
    .primary-nav {
        position: absolute !important;
        top: 100% !important;
        left: 0 !important;
        right: 0 !important;
        background: #ffffff !important;
        flex-direction: column !important;
        align-items: stretch !important;
        padding: 18px 24px 24px !important;
        border-bottom: 2px solid var(--champagne-gold, #cfa859) !important;
        box-shadow: 0 15px 40px rgba(0, 0, 0, 0.12) !important;
    }
    .primary-nav:not(.open) {
        display: none !important;
    }
    .nav-item-dropdown {
        flex-direction: column !important;
        align-items: stretch !important;
        width: 100% !important;
    }
    .wow-dropdown-menu {
        position: static !important;
        opacity: 1 !important;
        visibility: visible !important;
        pointer-events: auto !important;
        transform: none !important;
        box-shadow: none !important;
        border: none !important;
        border-left: 2px solid var(--champagne-gold, #cfa859) !important;
        border-radius: 0 !important;
        padding-left: 12px !important;
        background: transparent !important;
        min-width: unset !important;
    }
}
</style>

<!-- Ambient Cinematic Background Audio -->
<audio id="weddingBgAudio" loop preload="none">
    <source src="https://cdn.pixabay.com/download/audio/2022/05/16/audio_db60ecb389.mp3?filename=indian-flute-and-sitar-relaxing-music-111429.mp3" type="audio/mpeg">
</audio>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // 1. Audio Ambience Toggle
    const musicBtn = document.getElementById('weddingMusicToggle');
    const audio = document.getElementById('weddingBgAudio');
    const musicIcon = document.getElementById('musicIcon');
    const musicText = document.getElementById('musicText');

    if (musicBtn && audio) {
        musicBtn.addEventListener('click', function() {
            if (audio.paused) {
                audio.play().then(() => {
                    musicBtn.classList.add('bg-champagne-gold', 'text-white');
                    if (musicIcon) musicIcon.classList.replace('bi-music-note-beamed', 'bi-pause-circle-fill');
                    if (musicText) musicText.innerText = 'Playing';
                }).catch(err => {
                    console.log('Audio playback notice:', err);
                });
            } else {
                audio.pause();
                musicBtn.classList.remove('bg-champagne-gold', 'text-white');
                if (musicIcon) musicIcon.classList.replace('bi-pause-circle-fill', 'bi-music-note-beamed');
                if (musicText) musicText.innerText = 'Ambience';
            }
        });
    }

    // 2. Mobile Nav Toggle
    const navToggle = document.querySelector('.nav-toggle');
    const primaryNav = document.getElementById('primary-nav');
    if (navToggle && primaryNav) {
        navToggle.addEventListener('click', function() {
            const isOpen = primaryNav.classList.toggle('open');
            navToggle.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
        });
    }
});
</script>
