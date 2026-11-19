/**
 * ============================================================================
 * HOSPITAL ERP — CLIENT ANIMATION & SCROLL-REVEAL ENGINE
 * Path: front/assets/js/animations.js
 * 
 * Powered by IntersectionObserver with progressive enhancement.
 * Includes:
 *  - Scroll-triggered section & card reveals (fade-up, zoom, staggered)
 *  - Dynamic statistics counter count-up (e.g. 10M+, 99.8%, 3,50,000+)
 *  - Interactive hero subtle parallax
 *  - SPA seamless lifecycle re-initialization
 *  - Prefers-reduced-motion accessibility compliance
 * ============================================================================
 */
(() => {
    'use strict';

    // Check prefers-reduced-motion
    const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    // Enable CSS animation rules progressively
    if (!prefersReducedMotion) {
        document.documentElement.classList.add('hms-anim-ready');
    }

    /**
     * Parse stat string into numeric target, prefix, suffix, and formatting
     * Example: "₹14,80,000" -> prefix: "₹", target: 1480000, suffix: "", isIndian: true
     * Example: "10M+" -> target: 10, suffix: "M+"
     * Example: "99.8%" -> target: 99.8, suffix: "%", decimals: 1
     */
    function parseStatString(str) {
        const raw = str.trim();
        const prefixMatch = raw.match(/^[^\d\.]+/);
        const prefix = prefixMatch ? prefixMatch[0] : '';
        const suffixMatch = raw.match(/[^\d\.,]+$/);
        const suffix = suffixMatch ? suffixMatch[0] : '';

        // Extract clean number text
        let numText = raw.substring(prefix.length);
        if (suffix.length > 0) {
            numText = numText.substring(0, numText.length - suffix.length);
        }
        numText = numText.trim();

        const hasCommas = numText.includes(',');
        const cleanNumber = parseFloat(numText.replace(/,/g, ''));

        if (isNaN(cleanNumber)) return null;

        const hasDecimal = numText.includes('.');
        const decimals = hasDecimal ? numText.split('.')[1].length : 0;
        const isIndian = hasCommas && /,\d{2},/.test(numText);

        return {
            raw,
            prefix,
            suffix,
            target: cleanNumber,
            decimals,
            hasCommas,
            isIndian
        };
    }

    /**
     * Format animated number back to original style
     */
    function formatStatNumber(val, spec) {
        let fixed = (spec.decimals > 0) ? val.toFixed(spec.decimals) : Math.round(val).toString();
        if (spec.hasCommas) {
            const parts = fixed.split('.');
            let intPart = parts[0];
            if (spec.isIndian && intPart.length > 3) {
                const lastThree = intPart.substring(intPart.length - 3);
                const otherNumbers = intPart.substring(0, intPart.length - 3);
                intPart = otherNumbers.replace(/\B(?=(\d{2})+(?!\d))/g, ",") + "," + lastThree;
            } else if (!spec.isIndian && intPart.length > 3) {
                intPart = intPart.replace(/\B(?=(\d{3})+(?!\d))/g, ",");
            }
            fixed = parts.length > 1 ? intPart + '.' + parts[1] : intPart;
        }
        return spec.prefix + fixed + spec.suffix;
    }

    /**
     * Animate a single counter element smoothly over duration (infinite re-trigger on scroll)
     */
    function animateCounter(el) {
        const originalText = el.getAttribute('data-original-text') || el.textContent.trim();
        el.setAttribute('data-original-text', originalText);

        if (prefersReducedMotion) {
            el.textContent = originalText;
            return;
        }

        const spec = parseStatString(originalText);
        if (!spec) return;

        // Prevent duplicate animation if already running
        if (el._counterIsRunning) {
            return;
        }

        // Cancel previous animation if active
        if (el._counterRaf) {
            cancelAnimationFrame(el._counterRaf);
            el._counterRaf = null;
        }

        // Feature-bar slow count-up configuration (3200ms for smooth, clearly visible progression)
        const isFeatureBar = Boolean(el.closest('.feature-bar'));
        const customDurationAttr = el.getAttribute('data-counter-duration') || el.closest('.feature-bar')?.getAttribute('data-counter-duration');
        const customDuration = customDurationAttr ? parseInt(customDurationAttr, 10) : 0;

        // Slow count-up: 3200ms for feature-bar, 2000ms for other counters
        const duration = customDuration > 0 ? customDuration : (isFeatureBar ? 3200 : 2000); // ms
        const startTime = performance.now();
        // For feature-bar, count cleanly up from 0 so each step is clearly readable
        const startVal = isFeatureBar ? 0 : (spec.target >= 100 ? Math.floor(spec.target * 0.15) : 0);

        el._counterIsRunning = true;

        let lastFormatted = '';

        function update(now) {
            const elapsed = now - startTime;
            const progress = Math.min(elapsed / duration, 1);
            // Gentle quadratic ease-out for feature-bar so numbers tick slowly throughout
            const easeProgress = isFeatureBar
                ? (1 - Math.pow(1 - progress, 2))
                : (1 - Math.pow(1 - progress, 3));
            const currentVal = startVal + (spec.target - startVal) * easeProgress;

            const nextFormatted = formatStatNumber(currentVal, spec);
            if (nextFormatted !== lastFormatted) {
                el.textContent = nextFormatted;
                lastFormatted = nextFormatted;
            }

            if (progress < 1) {
                el._counterRaf = requestAnimationFrame(update);
            } else {
                el.textContent = originalText;
                el._counterRaf = null;
                el._counterIsRunning = false;
            }
        }

        el._counterRaf = requestAnimationFrame(update);
    }

    /**
     * Reset counter to start value when element leaves viewport so it counts up again on re-entry
     */
    function resetCounter(el) {
        if (el._counterRaf) {
            cancelAnimationFrame(el._counterRaf);
            el._counterRaf = null;
        }
        el._counterIsRunning = false;
        const originalText = el.getAttribute('data-original-text');
        if (originalText) {
            const spec = parseStatString(originalText);
            if (spec) {
                const isFeatureBar = Boolean(el.closest('.feature-bar'));
                const startVal = isFeatureBar ? 0 : (spec.target >= 100 ? Math.floor(spec.target * 0.15) : 0);
                el.textContent = formatStatNumber(startVal, spec);
            }
        }
    }

    /**
     * Tokenize HTML string into tags, entities, and characters (Preserves <em>, <span>, etc.)
     */
    function tokenizeHtml(html) {
        const tokens = [];
        let i = 0;
        while (i < html.length) {
            if (html[i] === '<') {
                const closeIndex = html.indexOf('>', i);
                if (closeIndex !== -1) {
                    const tagStr = html.substring(i, closeIndex + 1);
                    const isClosing = tagStr.startsWith('</');
                    const isSelfClosing = tagStr.endsWith('/>') || /^<(?:br|hr|img|input)/i.test(tagStr);
                    const tagNameMatch = tagStr.match(/<\/?([a-zA-Z0-9_-]+)/);
                    const tagName = tagNameMatch ? tagNameMatch[1].toLowerCase() : '';
                    tokens.push({ type: 'tag', tag: tagStr, tagName, isClosing, isSelfClosing });
                    i = closeIndex + 1;
                    continue;
                }
            }
            if (html[i] === '&') {
                const semiIndex = html.indexOf(';', i);
                if (semiIndex !== -1 && semiIndex - i < 10) {
                    tokens.push({ type: 'entity', value: html.substring(i, semiIndex + 1) });
                    i = semiIndex + 1;
                    continue;
                }
            }
            tokens.push({ type: 'char', value: html[i] });
            i++;
        }
        return tokens;
    }

    /**
     * Build valid HTML string up to target printable characters count with unclosed tags closed
     */
    function getHtmlAtStep(tokens, targetChars) {
        let out = '';
        let currentChars = 0;
        const openStack = [];

        for (const t of tokens) {
            if (t.type === 'tag') {
                out += t.tag;
                if (!t.isSelfClosing) {
                    if (t.isClosing) {
                        const idx = openStack.lastIndexOf(t.tagName);
                        if (idx !== -1) openStack.splice(idx, 1);
                    } else {
                        openStack.push(t.tagName);
                    }
                }
            } else {
                out += t.value;
                currentChars++;
                if (currentChars >= targetChars) break;
            }
        }

        // Close any tags left unclosed at this step
        for (let i = openStack.length - 1; i >= 0; i--) {
            out += '</' + openStack[i] + '>';
        }
        return out;
    }

    /**
     * Live Typewriter Engine for H1, H2, H3 Headings
     * Plays once when entering viewport during first scroll. Never resets on scroll back.
     */
    function startTypingAnimation(el) {
        if (prefersReducedMotion) return;
        if (el._typingCompleted || el._isTyping) return;

        // Skip purely numeric counters or badges
        const rawText = el.textContent.trim();
        if (!rawText || /^[0-9+%,.\s\/]+$/.test(rawText)) return;

        // Initialize tokens and original HTML once
        if (!el._typingTokens) {
            const rawHtml = el.innerHTML.trim();
            el._typingOriginalHtml = rawHtml;
            el._typingTokens = tokenizeHtml(rawHtml);
            el._typingPrintableCount = el._typingTokens.filter(t => t.type !== 'tag').length;
            // Lock height to prevent layout shifts during typing
            if (!el.style.minHeight) {
                el.style.minHeight = el.offsetHeight + 'px';
            }
        }

        if (el._typingTimeout) {
            clearTimeout(el._typingTimeout);
            el._typingTimeout = null;
        }

        const totalChars = el._typingPrintableCount;
        if (totalChars === 0) return;

        el._isTyping = true;

        // Snappy, modern typing cadence (approx 28ms-34ms per character)
        const baseDelay = 30;
        let currentStep = 0;

        function typeStep() {
            currentStep++;
            const partialHtml = getHtmlAtStep(el._typingTokens, currentStep);
            el.innerHTML = partialHtml + '<span class="mpp-typing-cursor" aria-hidden="true"></span>';

            if (currentStep < totalChars) {
                let stepDelay = baseDelay;
                const lastToken = el._typingTokens[currentStep - 1];
                if (lastToken && lastToken.type === 'char') {
                    if (lastToken.value === ' ') {
                        stepDelay += 10;
                    } else if (['.', ',', '?', '!', '—', '-'].includes(lastToken.value)) {
                        stepDelay += 50;
                    }
                }
                el._typingTimeout = setTimeout(typeStep, stepDelay);
            } else {
                // Typing complete: hold cursor for 250ms, then cleanly restore full original HTML
                const cursor = el.querySelector('.mpp-typing-cursor');
                if (cursor) {
                    setTimeout(() => {
                        el.innerHTML = el._typingOriginalHtml;
                        el.style.minHeight = '';
                    }, 250);
                } else {
                    el.innerHTML = el._typingOriginalHtml;
                    el.style.minHeight = '';
                }
                el._typingTimeout = null;
                el._isTyping = false;
                el._typingCompleted = true;
            }
        }

        typeStep();
    }

    /**
     * Scroll-Triggered Typing Observer for H1, H2, H3
     * Triggers ONCE as each heading comes into view during 1st-time scroll.
     * Unobserves immediately so 2nd-time scroll never re-types.
     * On Page Refresh (F5), page resets and 1st-time scroll triggers again.
     */
    function initScrollTypingObserver(root = document) {
        if (prefersReducedMotion) return;

        const selectors = [
            '[data-typing="true"]'
        ];

        const allHeadings = Array.from(root.querySelectorAll(selectors.join(', ')));

        // Exclude site-header, site-footer, brand, counters, and purely numeric badges
        const validHeadings = allHeadings.filter(el => {
            if (el.closest('.site-header, .site-footer, .brand, .nav-dropdown-menu')) return false;
            if (el.matches('[data-counter], .counter, .stat-number, [data-no-typing]')) return false;
            if (el.closest('[data-counter], .counter-box')) return false;
            const text = el.textContent.trim();
            if (!text || /^[0-9+%,.\s\/]+$/.test(text)) return false;
            return true;
        });

        if (validHeadings.length === 0) return;

        if ('IntersectionObserver' in window) {
            const typingObserver = new IntersectionObserver((entries, observer) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const target = entry.target;
                        // Trigger typing animation ONCE
                        startTypingAnimation(target);
                        // Unobserve immediately so 2nd-time scroll never re-triggers
                        observer.unobserve(target);
                    }
                });
            }, {
                root: null,
                rootMargin: '0px 0px -30px 0px',
                threshold: 0.12
            });

            validHeadings.forEach(el => {
                if (!el._typingCompleted && !el._isTyping) {
                    typingObserver.observe(el);
                }
            });
        } else {
            validHeadings.forEach(el => startTypingAnimation(el));
        }
    }

    /**
     * Main Animation & Observer Setup
     */
    function initHmsAnimations(root = document) {
        if (!root) return;

        // 1. Automatically assign reveal classes to content sections, text & cards
        const targetSelectors = [
            '.section-heading',
            '.section-copy',
            '.vidya-tech-kicker',
            '.vidya-header-text',
            '.vidya-sub-para',
            '.value-card',
            '.custom-cap-card',
            '.dev-process-card',
            '.impact-box',
            '.leader-card',
            '.team-card',
            '.team-item',
            '.pricing-cards-grid > *',
            '.pricing-cards-modern-wrap > *',
            '.role-pane-card',
            '.tech-spec-box',
            '.comparison-table-wrap',
            '.tech-stack-container',
            '.demo-card-box',
            '.demo-form-wrapper',
            '.faq-item',
            '.hospital-card',
            '.doctor-card',
            '.feature-card',
            '.featured-services-box1',
            '.feature-item',
            '.service-card',
            '.about-intro-split > div',
            '.about-panel',
            '.about-chip',
            '.about-check-row',
            '.course-card-mpp',
            '.course-card-erp',
            '.module-flip-card',
            '.module-card-mpp',
            '.modules-grid-mpp > *',
            '.v-perk-item',
            '.verification-demo-card',
            '.faculty-card',
            '.testi-card:not(.testi-deck-card)',
            '.demo-box',
            '.v-kpi-box'
        ];

        targetSelectors.forEach(selector => {
            const elements = root.querySelectorAll(selector);
            elements.forEach(el => {
                // Skip if sensitive form or already configured
                if (el.closest('form:not(.demo-box)') && !el.classList.contains('demo-card-box')) return;
                if (!el.classList.contains('hms-reveal')) {
                    el.classList.add('hms-reveal');
                }
            });
        });

        // 1B. Directional Choreography: Left, Right, Down & Up Movements
        // Section Kickers slide down from top
        root.querySelectorAll('.section-kicker, .vidya-tech-kicker, .hero-pill-badge, .v-eyebrow-badge, .eyebrow').forEach(el => {
            el.classList.add('hms-reveal', 'hms-reveal-down');
        });

        // Section Main Headings slide from Left
        root.querySelectorAll('.section-heading h2, .v-section-title, .section-title h2, .vidya-header-text, .about-title').forEach(el => {
            el.classList.add('hms-reveal', 'hms-reveal-left');
        });

        // Section Subtitles & Leads slide from Right
        root.querySelectorAll('.section-heading p, .v-section-lead, .vidya-sub-para').forEach(el => {
            el.classList.add('hms-reveal', 'hms-reveal-right');
        });

        // Split 2-Column Layouts (Left column slides from Left, Right column slides from Right)
        root.querySelectorAll('.mpp-about-panels-grid, .about-intro-split, .split, .hero-default-split-layout, .v-modern-grid').forEach(grid => {
            const children = Array.from(grid.children);
            if (children.length >= 2) {
                children[0].classList.add('hms-reveal', 'hms-reveal-left');
                children[1].classList.add('hms-reveal', 'hms-reveal-right');
            }
        });

        // CTA Box (Left text from Left, Right button from Right)
        root.querySelectorAll('.demo-box').forEach(box => {
            const children = Array.from(box.children);
            if (children.length >= 2) {
                children[0].classList.add('hms-reveal', 'hms-reveal-left');
                children[1].classList.add('hms-reveal', 'hms-reveal-right');
            }
        });

        // Directional Card Choreography inside Grids
        // 4-Card Grids (e.g. Why MPP, Courses): Card 1 Left, Card 2 Up, Card 3 Down, Card 4 Right
        const fourColGrids = root.querySelectorAll('.vidya-why-cards-grid, .row.row-cols-1.row-cols-sm-2.row-cols-lg-4');
        fourColGrids.forEach(grid => {
            const cards = Array.from(grid.children);
            cards.forEach((card, idx) => {
                const targetEl = card.querySelector('.course-card-mpp, .course-card-erp, .featured-services-box1') || card;
                targetEl.classList.add('hms-reveal');
                const pos = idx % 4;
                if (pos === 0) targetEl.classList.add('hms-reveal-left');
                else if (pos === 1) targetEl.classList.add('hms-reveal-up');
                else if (pos === 2) targetEl.classList.add('hms-reveal-down');
                else if (pos === 3) targetEl.classList.add('hms-reveal-right');
            });
        });

        // 3-Card Grids (e.g. Pricing, Testimonials): Left from Left, Middle from Up, Right from Right
        const threeColGrids = root.querySelectorAll('.pricing-cards-grid, .testimonials-grid');
        threeColGrids.forEach(grid => {
            const cards = Array.from(grid.children);
            cards.forEach((card, idx) => {
                card.classList.add('hms-reveal');
                const pos = idx % 3;
                if (pos === 0) card.classList.add('hms-reveal-left');
                else if (pos === 1) card.classList.add('hms-reveal-up');
                else if (pos === 2) card.classList.add('hms-reveal-right');
            });
        });

        // Feature Bar remains 100% stable in place (No slide/zoom transform movement during count-up)

        // Verification Perks: Each perk slides in smoothly from the Left
        root.querySelectorAll('.v-perk-item, .about-check-row').forEach(row => {
            row.classList.add('hms-reveal', 'hms-reveal-left');
        });

        // Verification Telemetry Strip: Left, Up, Right
        root.querySelectorAll('.v-kpi-strip').forEach(strip => {
            const boxes = Array.from(strip.children);
            if (boxes.length >= 3) {
                boxes[0].classList.add('hms-reveal', 'hms-reveal-left');
                boxes[1].classList.add('hms-reveal', 'hms-reveal-up');
                boxes[2].classList.add('hms-reveal-right');
            }
        });

        // Faculty & Team: Alternating Left and Right entry
        root.querySelectorAll('.faculty-grid, #teamCardsRow, .leader-grid').forEach(grid => {
            const items = Array.from(grid.children);
            items.forEach((item, idx) => {
                item.classList.add('hms-reveal');
                if (idx % 2 === 0) {
                    item.classList.add('hms-reveal-left');
                } else {
                    item.classList.add('hms-reveal-right');
                }
            });
        });

        // 2. Add staggered animation delay classes to child items in grid containers
        const gridContainers = [
            '.custom-caps-grid',
            '.dev-process-grid',
            '.impact-metrics-grid',
            '.pricing-cards-grid',
            '.pricing-cards-modern-wrap',
            '#teamCardsRow',
            '.leader-grid',
            '.tech-stack-grid',
            '.faculty-grid',
            '.vidya-why-cards-grid',
            '.mpp-about-panels-grid',
            '.about-grid',
            '.about-checklist-stack',
            '.testimonials-grid',
            '.verification-perks',
            '.v-kpi-strip',
            '.row.row-cols-1.row-cols-sm-2.row-cols-lg-4'
        ];

        gridContainers.forEach(gridSelector => {
            const containers = root.querySelectorAll(gridSelector);
            containers.forEach(container => {
                const children = container.children;
                Array.from(children).forEach((child, index) => {
                    const delayClass = `hms-delay-${Math.min((index % 12) + 1, 12)}`;
                    child.classList.add(delayClass);
                });
            });
        });

        // 3. Setup IntersectionObserver for 1st-Time Scroll Reveals (Trigger Once)
        const revealElements = root.querySelectorAll('.hms-reveal');

        if (prefersReducedMotion) {
            revealElements.forEach(el => el.classList.add('hms-in-view'));
        } else if ('IntersectionObserver' in window) {
            const revealObserver = new IntersectionObserver((entries, observer) => {
                entries.forEach(entry => {
                    const target = entry.target;
                    if (entry.isIntersecting) {
                        target.classList.add('hms-in-view');
                        // Animate counters once inside this card/section
                        const counters = target.querySelectorAll('.impact-number, .trust-row b, .stat-number, [data-counter], .feature-item .content h3, .v-kpi-box strong');
                        counters.forEach(counter => animateCounter(counter));
                        // Unobserve immediately: 2nd-time scroll will never reset or re-animate
                        observer.unobserve(target);
                    }
                });
            }, {
                root: null,
                rootMargin: '0px 0px -30px 0px',
                threshold: 0.08
            });

            revealElements.forEach(el => revealObserver.observe(el));
        } else {
            // Fallback for older browsers without IntersectionObserver
            revealElements.forEach(el => el.classList.add('hms-in-view'));
        }

        // 4. Counter Observer for standalone counter numbers (Trigger Once on 1st scroll)
        const standaloneCounters = root.querySelectorAll('.impact-number, .trust-row b, .stat-number, [data-counter], .feature-item .content h3, .v-kpi-box strong');
        if ('IntersectionObserver' in window && !prefersReducedMotion) {
            const counterObserver = new IntersectionObserver((entries, observer) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        animateCounter(entry.target);
                        observer.unobserve(entry.target);
                    }
                });
            }, {
                threshold: 0.1
            });

            standaloneCounters.forEach(counter => counterObserver.observe(counter));
        } else {
            standaloneCounters.forEach(counter => animateCounter(counter));
        }

        // 4B. Typewriter Animation for H1, H2, H3 — Trigger Once on 1st-Time Scroll & Page Load
        initScrollTypingObserver(root);

        // 5. Subtle Mouse Parallax on Interactive Shells (Desktop Only)
        if (window.innerWidth > 992 && window.matchMedia('(hover: hover)').matches && !prefersReducedMotion) {
            const shells = root.querySelectorAll('.network-preview-shell, .tech-spec-box');
            shells.forEach(shell => {
                if (shell.hasAttribute('data-parallax-init')) return;
                shell.setAttribute('data-parallax-init', 'true');

                shell.addEventListener('mousemove', (e) => {
                    const rect = shell.getBoundingClientRect();
                    const x = e.clientX - rect.left - rect.width / 2;
                    const y = e.clientY - rect.top - rect.height / 2;
                    const rotateX = (-y / rect.height) * 4;
                    const rotateY = (x / rect.width) * 4;
                    shell.style.transform = `perspective(1000px) rotateX(${rotateX.toFixed(2)}deg) rotateY(${rotateY.toFixed(2)}deg) translateY(-2px)`;
                });

                shell.addEventListener('mouseleave', () => {
                    shell.style.transform = '';
                    shell.style.transition = 'transform 0.4s ease';
                    setTimeout(() => {
                        shell.style.transition = '';
                    }, 400);
                });
            });
        }
    }

    // 6. Preloader Startup Animation (Initial Page Load)
    function initPreloader() {
        const preloader = document.getElementById('mpp-premium-preloader');
        if (!preloader) return;

        try {
            if (sessionStorage.getItem('mpp_preloader_seen')) {
                preloader.remove();
                initScrollTypingObserver(document);
                return;
            }
            sessionStorage.setItem('mpp_preloader_seen', '1');
        } catch (e) {}


        const progressBar = document.getElementById('mppPreloaderBar');
        const pctText = document.getElementById('mppPreloaderPct');

        let currentPct = 0;
        const targetPct = 100;
        const duration = 750; // ms
        const startTime = performance.now();

        function step(now) {
            const elapsed = now - startTime;
            const progress = Math.min(elapsed / duration, 1);
            currentPct = Math.floor(progress * targetPct);

            if (progressBar) progressBar.style.width = currentPct + '%';
            if (pctText) pctText.textContent = currentPct + '%';

            if (progress < 1) {
                requestAnimationFrame(step);
            } else {
                setTimeout(() => {
                    preloader.classList.add('is-loaded');
                    // Trigger page load typing right as preloader reveals the page
                    initScrollTypingObserver(document);
                    setTimeout(() => {
                        preloader.remove();
                    }, 850);
                }, 120);
            }
        }

        requestAnimationFrame(step);
    }

    // 7. Top Scroll & Reading Progress Bar
    function updateScrollProgress() {
        const bar = document.getElementById('mppScrollProgressBar');
        if (!bar) return;
        const winScroll = document.documentElement.scrollTop || document.body.scrollTop;
        const height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
        const scrolled = height > 0 ? (winScroll / height) * 100 : 0;
        bar.style.width = scrolled.toFixed(1) + '%';
    }

    if (!prefersReducedMotion) {
        window.addEventListener('scroll', updateScrollProgress, { passive: true });
    }

    // 8. Lenis Butter-Smooth Momentum Scrolling Engine
    let globalLenis = null;
    function initSmoothScroll() {
        if (prefersReducedMotion) return;
        if (typeof window.Lenis === 'undefined') {
            document.documentElement.style.scrollBehavior = 'smooth';
            return;
        }
        if (globalLenis) return;

        try {
            globalLenis = new window.Lenis({
                duration: 1.18,
                easing: (t) => Math.min(1, 1.001 - Math.pow(2, -10 * t)),
                orientation: 'vertical',
                gestureOrientation: 'vertical',
                smoothWheel: true,
                wheelMultiplier: 1.02,
                touchMultiplier: 1.5,
                infinite: false
            });

            function lenisRaf(time) {
                if (globalLenis) {
                    globalLenis.raf(time);
                    requestAnimationFrame(lenisRaf);
                }
            }
            requestAnimationFrame(lenisRaf);

            globalLenis.on('scroll', () => {
                updateScrollProgress();
            });

            // Smoothly glide to anchor links
            document.addEventListener('click', (e) => {
                const anchor = e.target.closest('a[href*="#"]');
                if (!anchor) return;
                const href = anchor.getAttribute('href');
                if (!href || href === '#' || href === '#!') return;
                const hashIdx = href.indexOf('#');
                if (hashIdx !== -1) {
                    const hash = href.substring(hashIdx);
                    if (hash.length > 1) {
                        try {
                            const target = document.querySelector(hash);
                            if (target) {
                                e.preventDefault();
                                globalLenis.scrollTo(target, { offset: -70 });
                            }
                        } catch (_) {}
                    }
                }
            });

            window.globalLenis = globalLenis;
        } catch (err) {
            console.warn('Lenis smooth scroll notice:', err);
            document.documentElement.style.scrollBehavior = 'smooth';
        }
    }

    // Run Preloader immediately
    initPreloader();

    // Run Smooth Scroll
    initSmoothScroll();

    // Expose globally for SPA re-hydration
    window.initScrollTypingObserver = initScrollTypingObserver;
    window.initHmsAnimations = initHmsAnimations;
    window.initSmoothScroll = initSmoothScroll;

    // Run when DOM is ready
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', () => {
            initHmsAnimations(document);
            initSmoothScroll();
            updateScrollProgress();
            initScrollTypingObserver(document);
        });
    } else {
        initHmsAnimations(document);
        initSmoothScroll();
        updateScrollProgress();
        initScrollTypingObserver(document);
    }

    // Guarantee typing effect on page load & refresh
    window.addEventListener('load', () => {
        initScrollTypingObserver(document);
    });
    window.addEventListener('pageshow', () => {
        initScrollTypingObserver(document);
    });
})();
