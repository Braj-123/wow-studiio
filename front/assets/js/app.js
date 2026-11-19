/**
 * ============================================================================
 * MPP GROUP — PUBLIC WEBSITE CLIENT DECLARATIVE EVENT BRIDGE (MPA)
 * Pure Multi-Page Application (Rule 32 & Rule 33 Compliant)
 * Path: front/assets/js/app.js
 * ============================================================================
 */
(() => {
    'use strict';

    // ------------------------------------------------------------------------
    // 1. Mobile Navigation & Dropdown Toggle
    // ------------------------------------------------------------------------
    const toggle = document.querySelector('.nav-toggle');
    const nav = document.querySelector('#primary-nav');
    const header = document.querySelector('.site-header');

    function closeMobileNav() {
        if (toggle && nav) {
            toggle.setAttribute('aria-expanded', 'false');
            nav.classList.remove('open');
            document.querySelectorAll('.nav-item-dropdown').forEach(d => {
                d.classList.remove('is-open');
                d.querySelector('.nav-dropdown-toggle')?.setAttribute('aria-expanded', 'false');
            });
        }
    }

    if (toggle && nav) {
        toggle.addEventListener('click', () => {
            const open = toggle.getAttribute('aria-expanded') === 'true';
            toggle.setAttribute('aria-expanded', String(!open));
            nav.classList.toggle('open', !open);
        });
    }

    // Dropdown toggle on mobile touch devices
    document.addEventListener('click', (e) => {
        const dropToggle = e.target.closest('.nav-dropdown-toggle');
        if (dropToggle && window.innerWidth <= 1080) {
            e.preventDefault();
            const parent = dropToggle.closest('.nav-item-dropdown');
            if (parent) {
                parent.classList.toggle('is-open');
                const isOpen = parent.classList.contains('is-open');
                dropToggle.setAttribute('aria-expanded', String(isOpen));
            }
            return;
        }

        // Close dropdown if clicked outside
        if (!e.target.closest('.nav-item-dropdown')) {
            document.querySelectorAll('.nav-item-dropdown.is-open').forEach(d => {
                d.classList.remove('is-open');
                d.querySelector('.nav-dropdown-toggle')?.setAttribute('aria-expanded', 'false');
            });
        }
    });

    // Close mobile nav on escape key
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape') {
            closeMobileNav();
        }
    });

    // ------------------------------------------------------------------------
    // 2. Sticky Header Elevation on Scroll (Dual State Navbar)
    // ------------------------------------------------------------------------
    function updateHeaderOnScroll() {
        if (!header) return;
        header.classList.toggle('scrolled', window.scrollY > 25);
    }
    window.addEventListener('scroll', updateHeaderOnScroll, { passive: true });
    updateHeaderOnScroll();

    // ------------------------------------------------------------------------
    // 3. Top Reading & Scroll Progress Indicator (Cross-Page)
    // ------------------------------------------------------------------------
    const progressBar = document.getElementById('mppScrollProgressBar');
    if (progressBar) {
        function updateScrollProgress() {
            const scrollTop = window.scrollY || document.documentElement.scrollTop;
            const scrollHeight = document.documentElement.scrollHeight - document.documentElement.clientHeight;
            const progress = scrollHeight > 0 ? (scrollTop / scrollHeight) * 100 : 0;
            progressBar.style.width = Math.min(100, Math.max(0, progress)) + '%';
        }
        window.addEventListener('scroll', updateScrollProgress, { passive: true });
        updateScrollProgress();
    }

    // ------------------------------------------------------------------------
    // 4. Smooth Anchor Link Scrolling (For in-page #anchors only)
    // ------------------------------------------------------------------------
    document.addEventListener('click', (e) => {
        const link = e.target.closest('a');
        if (!link) return;

        const href = link.getAttribute('href') || '';
        // Only intercept local hash anchors like #top or #modules
        if (href.startsWith('#') && href.length > 1) {
            const targetEl = document.querySelector(href);
            if (targetEl) {
                e.preventDefault();
                targetEl.scrollIntoView({ behavior: 'smooth' });
                closeMobileNav();
            }
        }
    });

    // ------------------------------------------------------------------------
    // 5. 3D Modules Filter & Flip Handler (Vidyapranali Grid)
    // ------------------------------------------------------------------------
    function initModulesPlatformInteractive() {
        const filterButtons = document.querySelectorAll('.module-filter-btn');
        const cards = document.querySelectorAll('.module-flip-card');
        if (!cards.length) return;

        filterButtons.forEach(btn => {
            btn.onclick = () => {
                filterButtons.forEach(b => b.classList.remove('active'));
                btn.classList.add('active');

                const selectedCat = btn.getAttribute('data-category');

                cards.forEach(card => {
                    const cardCat = card.getAttribute('data-category');
                    if (selectedCat === 'all' || cardCat === selectedCat) {
                        card.style.display = 'block';
                        card.style.opacity = '0';
                        card.style.transform = 'translateY(15px)';
                        requestAnimationFrame(() => {
                            card.style.transition = 'opacity 0.3s ease, transform 0.3s ease';
                            card.style.opacity = '1';
                            card.style.transform = 'translateY(0)';
                        });
                    } else {
                        card.style.display = 'none';
                    }
                });
            };
        });

        cards.forEach(card => {
            card.onclick = (e) => {
                if (e.target.closest('.module-back-action')) return;
                card.classList.toggle('is-flipped');
            };

            card.onkeydown = (e) => {
                if (e.key === 'Enter' || e.key === ' ') {
                    if (e.target.closest('.module-back-action')) return;
                    e.preventDefault();
                    card.classList.toggle('is-flipped');
                }
            };
        });
    }

    window.initModulesPlatformInteractive = initModulesPlatformInteractive;

    // ------------------------------------------------------------------------
    // 6. Progressive Enhancement Form Bridge ([data-ajax-form])
    // ------------------------------------------------------------------------
    document.addEventListener('submit', async (e) => {
        const form = e.target.closest('form[data-ajax-form]');
        if (!form) return;

        e.preventDefault();

        const submitBtn = form.querySelector('button[type="submit"]');
        const originalBtnHtml = submitBtn ? submitBtn.innerHTML : '';
        const feedbackContainer = form.querySelector('.form-ajax-feedback') || form;

        try {
            if (submitBtn) {
                submitBtn.disabled = true;
                submitBtn.innerHTML = '<i class="fa-solid fa-spinner fa-spin me-2"></i> Submitting...';
            }

            const formData = new FormData(form);
            const response = await fetch(form.action, {
                method: form.method || 'POST',
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                },
                body: formData
            });

            const data = await response.json();

            // Render alert banner
            const alertClass = data.success ? 'alert-success' : 'alert-danger';
            const alertMsg = data.message || (data.success ? 'Action completed successfully.' : 'An error occurred.');

            let alertEl = form.querySelector('.ajax-result-alert');
            if (!alertEl) {
                alertEl = document.createElement('div');
                alertEl.className = 'alert ' + alertClass + ' ajax-result-alert mt-3';
                feedbackContainer.prepend(alertEl);
            } else {
                alertEl.className = 'alert ' + alertClass + ' ajax-result-alert mt-3';
            }
            alertEl.innerHTML = alertMsg;

            if (data.success) {
                form.reset();
                if (data.redirect_url) {
                    setTimeout(() => {
                        window.location.href = data.redirect_url;
                    }, 1200);
                }
            }
        } catch (err) {
            console.error('AJAX form submission error:', err);
            // Fallback: standard submit if JS fetch fails
            form.removeAttribute('data-ajax-form');
            form.submit();
        } finally {
            if (submitBtn) {
                submitBtn.disabled = false;
                submitBtn.innerHTML = originalBtnHtml;
            }
        }
    });

    // ------------------------------------------------------------------------
    // 7. Initial Page Ready Hook
    // ------------------------------------------------------------------------
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', () => {
            initModulesPlatformInteractive();
        });
    } else {
        initModulesPlatformInteractive();
    }
})();
