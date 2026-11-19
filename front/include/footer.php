<?php
declare(strict_types=1);

/**
 * ============================================================================
 * WoW STUDIO — PUBLIC WEBSITE MASTER FOOTER COMPONENT
 * Layout: MPP Group 4-Column Modern Enterprise Structure
 * Theme: Royal Burgundy (#6b1426) & Champagne Gold (#cfa859)
 * Brand: WoW Studio
 * Path: front/include/footer.php
 * ============================================================================
 */

$appBasePath = $appBasePath ?? '';
?>
<footer class="site-footer" id="site-footer" style="background: linear-gradient(180deg, #2c0810 0%, #1a0409 100%); color: #ffffff; padding: 75px 0 25px; border-top: 2px solid var(--champagne-gold);">
    <div class="container footer-grid">
        <!-- Col 1: Brand & Studio Bio -->
        <div class="footer-brand-col">
            <a class="brand brand-light" href="<?= $appBasePath ?>/" style="display: flex; align-items: center; gap: 12px; margin-bottom: 18px;">
                <span class="brand-logo-wrap">
                    <img src="<?= $appBasePath ?>/front/assets/images/logo-mark.svg" alt="WoW Studio Emblem" style="width: 48px; height: 48px; object-fit: contain;">
                </span>
                <span class="brand-text-block">
                    <span class="brand-title" style="font-family:'Playfair Display',serif; font-size: 1.55rem; color: #ffffff; font-weight: 900; letter-spacing: 1px;">
                        WoW <span style="color: var(--champagne-gold);">STUDIO</span>
                    </span>
                    <small class="brand-subtitle d-block" style="font-family:'Poppins',sans-serif; color: var(--champagne-gold); font-size: 9.5px; letter-spacing: 2.5px; font-weight: 700;">
                        PREMIUM PHOTOGRAPHY &bull; 4K CINEMA
                    </small>
                </span>
            </a>
            <p class="footer-desc" style="color: #d6c6c8; font-size: 14px; line-height: 1.7; max-width: 380px;">
                <strong>WoW Studio</strong> is an internationally acclaimed visual production studio dedicated to documenting luxury weddings, destination love stories, and high-fashion editorials. We blend candid intimacy with cinematic grandeur.
            </p>
            <div class="footer-cert-badges d-flex gap-2 flex-wrap mt-3">
                <span class="badge rounded-pill" style="background: var(--royal-burgundy); border: 1px solid var(--champagne-gold); color: #ffffff; padding: 6px 12px; font-size: 11px;">
                    <i class="bi bi-camera-fill me-1"></i> 500+ Weddings Filmed
                </span>
                <span class="badge rounded-pill" style="background: rgba(207, 168, 89, 0.2); border: 1px solid var(--champagne-gold); color: var(--champagne-gold); padding: 6px 12px; font-size: 11px;">
                    <i class="bi bi-geo-alt me-1"></i> Destination &bull; Global
                </span>
                <span class="badge rounded-pill" style="background: rgba(255, 255, 255, 0.1); color: #ffffff; padding: 6px 12px; font-size: 11px;">
                    <i class="bi bi-award-fill me-1 text-warning"></i> Award-Winning Cinema
                </span>
            </div>
        </div>

        <!-- Col 2: Studio Navigation Links -->
        <div>
            <h3 style="color: var(--champagne-gold); font-size: 14px; text-transform: uppercase; letter-spacing: 1.5px; font-weight: 700; margin-bottom: 20px;">Quick Links</h3>
            <a href="<?= $appBasePath ?>/" style="color: #e2d7d8; display: block; margin: 10px 0; font-size: 14px; transition: color 0.2s;">Home</a>
            <a href="<?= $appBasePath ?>/about" style="color: #e2d7d8; display: block; margin: 10px 0; font-size: 14px; transition: color 0.2s;">About</a>
            <a href="<?= $appBasePath ?>/events" style="color: #e2d7d8; display: block; margin: 10px 0; font-size: 14px; transition: color 0.2s;">Our Project</a>
            <a href="<?= $appBasePath ?>/gallery" style="color: #e2d7d8; display: block; margin: 10px 0; font-size: 14px; transition: color 0.2s;">Gallery</a>
            <a href="<?= $appBasePath ?>/team" style="color: #e2d7d8; display: block; margin: 10px 0; font-size: 14px; transition: color 0.2s;">Our Team</a>
            <a href="<?= $appBasePath ?>/blog" style="color: #e2d7d8; display: block; margin: 10px 0; font-size: 14px; transition: color 0.2s;">Blog</a>
            <a href="<?= $appBasePath ?>/contact" style="color: #e2d7d8; display: block; margin: 10px 0; font-size: 14px; transition: color 0.2s;">Contact</a>
        </div>

        <!-- Col 3: Photography Services -->
        <div>
            <h3 style="color: var(--champagne-gold); font-size: 14px; text-transform: uppercase; letter-spacing: 1.5px; font-weight: 700; margin-bottom: 20px;">Services</h3>
            <a href="<?= $appBasePath ?>/services" style="color: #e2d7d8; display: block; margin: 10px 0; font-size: 14px;">
                <strong>Candid Wedding Photography</strong> <small style="display:block; color: var(--champagne-gold); font-size: 11px;">Unscripted Emotion &amp; Fine-Art</small>
            </a>
            <a href="<?= $appBasePath ?>/services" style="color: #e2d7d8; display: block; margin: 10px 0; font-size: 14px;">
                <strong>4K Cinematic Films &amp; Teasers</strong> <small style="display:block; color: var(--champagne-gold); font-size: 11px;">Master Narrative &amp; Color Grading</small>
            </a>
            <a href="<?= $appBasePath ?>/services" style="color: #e2d7d8; display: block; margin: 10px 0; font-size: 14px;">
                <strong>Destination &amp; Pre-Wedding Shoots</strong> <small style="display:block; color: var(--champagne-gold); font-size: 11px;">Udaipur, Jaipur, Goa &amp; International</small>
            </a>
            <a href="<?= $appBasePath ?>/services" style="color: #e2d7d8; display: block; margin: 10px 0; font-size: 14px;">
                <strong>FPV Drone Aerial Cinematography</strong> <small style="display:block; color: var(--champagne-gold); font-size: 11px;">Sweeping Palace &amp; Sunset Flythroughs</small>
            </a>
        </div>

        <!-- Col 4: Studio Booking & Contact -->
        <div>
            <h3 style="color: var(--champagne-gold); font-size: 14px; text-transform: uppercase; letter-spacing: 1.5px; font-weight: 700; margin-bottom: 20px;">Bookings &amp; Inquiries</h3>
            <p style="color: #e2d7d8; font-size: 13.5px; line-height: 1.6; margin-bottom: 14px;">
                <i class="bi bi-geo-alt-fill text-danger me-1"></i> <strong>WoW Studio Creative Lounge</strong><br>
                Studio Avenue, Luxury Arts District, Udaipur, Rajasthan - 313001
            </p>
            <a href="tel:+919876543210" style="color: #ffffff; display: block; font-size: 14px; font-weight: 600; margin-bottom: 6px;">
                <i class="bi bi-telephone-fill me-1 text-warning"></i> +91 98765 43210
            </a>
            <a href="mailto:hello@wowstudio.in" style="color: #d6c6c8; display: block; font-size: 13px; margin-bottom: 18px;">
                <i class="bi bi-envelope-fill me-1"></i> hello@wowstudio.in
            </a>
            <a href="<?= $appBasePath ?>/rsvp" class="btn btn-sm btn-royal w-100 text-center mb-2" style="border: 1px solid var(--champagne-gold);">
                <i class="bi bi-calendar2-check-fill me-1"></i> Book Now &rarr;
            </a>
            <a href="<?= $appBasePath ?>/admin/login.php" style="color: #cfa859; font-size: 12px; display: inline-flex; align-items: center; gap: 4px; margin-top: 6px;">
                <i class="bi bi-shield-lock"></i> Studio Admin Portal &rarr;
            </a>
        </div>
    </div>

    <!-- Bottom Copyright -->
    <div class="container footer-bottom" style="border-top: 1px solid rgba(255, 255, 255, 0.12); margin-top: 50px; padding-top: 22px; display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 15px; font-size: 13px; color: #b8a6a8;">
        <span>&copy; <?= date('Y') ?> WoW Studio. All rights reserved. Premium Wedding Photography &amp; Cinematic Films.</span>
        <div class="footer-bottom-links d-flex gap-3">
            <a href="<?= $appBasePath ?>/services" style="color: #e2d7d8;">Services</a>
            <a href="<?= $appBasePath ?>/gallery" style="color: #e2d7d8;">Portfolio</a>
            <a href="<?= $appBasePath ?>/contact" style="color: #e2d7d8;">Studio Location</a>
            <a href="<?= $appBasePath ?>/admin/login.php" style="color: var(--champagne-gold);">Admin Login</a>
        </div>
    </div>
</footer>

<!-- Bootstrap 5.3 JS Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous" defer></script>
<!-- Lenis Smooth Scrolling Engine & Declarative Animations -->
<script src="<?= $appBasePath ?>/front/assets/js/lenis.min.js" defer></script>
<script src="<?= $appBasePath ?>/front/assets/js/animations.js?v=<?= file_exists(__DIR__ . '/../assets/js/animations.js') ? filemtime(__DIR__ . '/../assets/js/animations.js') : time() ?>" defer></script>
<script src="<?= $appBasePath ?>/front/assets/js/app.js?v=<?= file_exists(__DIR__ . '/../assets/js/app.js') ? filemtime(__DIR__ . '/../assets/js/app.js') : time() ?>" defer></script>
</body>
</html>
