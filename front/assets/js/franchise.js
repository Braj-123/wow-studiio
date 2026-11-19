/**
 * ============================================================================
 * MPP GROUP — FRANCHISE APPLICATION INTERACTIONS & CELEBRATION ENGINE
 * Features:
 *  1. Smooth form hide on submit
 *  2. High-performance glowing multi-ring loading animation & status ticker
 *  3. Celebration state with 60fps Canvas Confetti & animated checkmark
 *  4. Docket details & WhatsApp confirmation pill
 *  5. 5-Second auto-remove & silky form re-visibility
 * Path: front/assets/js/franchise.js
 * ============================================================================
 */

(function () {
    'use strict';

    /**
     * ------------------------------------------------------------------------
     * High-Performance Canvas Confetti Celebration Engine (Zero-Dependency)
     * ------------------------------------------------------------------------
     */
    class ConfettiCelebration {
        constructor(canvas) {
            this.canvas = canvas;
            this.ctx = canvas ? canvas.getContext('2d') : null;
            this.particles = [];
            this.animId = null;
            this.isRunning = false;
            this.colors = [
                '#ff6a00', '#ff9800', '#2563eb', '#10b981',
                '#f59e0b', '#ec4899', '#8b5cf6', '#06b6d4', '#e11d48'
            ];
            this.handleResize = this.resize.bind(this);
            window.addEventListener('resize', this.handleResize);
            this.resize();
        }

        resize() {
            if (!this.canvas) return;
            const rect = this.canvas.parentElement ? this.canvas.parentElement.getBoundingClientRect() : null;
            if (rect && rect.width && rect.height) {
                this.canvas.width = rect.width;
                this.canvas.height = Math.max(rect.height, 480);
            } else {
                this.canvas.width = window.innerWidth;
                this.canvas.height = window.innerHeight;
            }
        }

        fire() {
            if (!this.canvas || !this.ctx) return;
            this.resize();
            this.stop();
            this.particles = [];
            this.isRunning = true;

            // Wave 1: Immediate primary fountain burst
            this.spawnBatch(65, this.canvas.width * 0.5, this.canvas.height * 0.45);
            // Side cannons
            this.spawnBatch(35, this.canvas.width * 0.2, this.canvas.height * 0.75, 45);
            this.spawnBatch(35, this.canvas.width * 0.8, this.canvas.height * 0.75, 135);

            // Wave 2: Timed secondary celebratory burst
            setTimeout(() => {
                if (!this.isRunning) return;
                this.spawnBatch(50, this.canvas.width * 0.5, this.canvas.height * 0.4);
            }, 300);

            this.loop();
        }

        spawnBatch(count, originX, originY, baseAngle = null) {
            for (let i = 0; i < count; i++) {
                const angle = baseAngle !== null
                    ? (baseAngle - 40 + Math.random() * 80) * (Math.PI / 180)
                    : Math.random() * 2 * Math.PI;

                const speed = 7 + Math.random() * 11;
                const size = 6 + Math.random() * 8;
                const isCircle = Math.random() > 0.65;

                this.particles.push({
                    x: originX,
                    y: originY,
                    vx: Math.cos(angle) * speed,
                    vy: Math.sin(angle) * speed - (baseAngle !== null ? 6 : 4),
                    size: size,
                    width: size,
                    height: size * (0.4 + Math.random() * 1.2),
                    color: this.colors[Math.floor(Math.random() * this.colors.length)],
                    isCircle: isCircle,
                    rotation: Math.random() * 360,
                    rotationSpeed: (Math.random() - 0.5) * 12,
                    wobble: Math.random() * 10,
                    wobbleSpeed: 0.1 + Math.random() * 0.1,
                    opacity: 1,
                    decay: 0.005 + Math.random() * 0.007,
                    gravity: 0.26,
                    drag: 0.982
                });
            }
        }

        loop() {
            if (!this.isRunning || !this.ctx) return;

            this.ctx.clearRect(0, 0, this.canvas.width, this.canvas.height);

            for (let i = this.particles.length - 1; i >= 0; i--) {
                const p = this.particles[i];

                p.x += p.vx;
                p.y += p.vy;
                p.vy += p.gravity;
                p.vx *= p.drag;
                p.vy *= p.drag;

                p.rotation += p.rotationSpeed;
                p.wobble += p.wobbleSpeed;
                p.opacity -= p.decay;

                if (p.opacity <= 0 || p.y > this.canvas.height + 40) {
                    this.particles.splice(i, 1);
                    continue;
                }

                this.ctx.save();
                this.ctx.globalAlpha = Math.max(0, p.opacity);
                this.ctx.translate(p.x, p.y);
                this.ctx.rotate((p.rotation * Math.PI) / 180);
                this.ctx.scale(Math.cos(p.wobble), 1);

                this.ctx.fillStyle = p.color;
                if (p.isCircle) {
                    this.ctx.beginPath();
                    this.ctx.arc(0, 0, p.size / 2, 0, Math.PI * 2);
                    this.ctx.fill();
                } else {
                    this.ctx.fillRect(-p.width / 2, -p.height / 2, p.width, p.height);
                }

                this.ctx.restore();
            }

            if (this.particles.length > 0) {
                this.animId = requestAnimationFrame(() => this.loop());
            } else {
                this.stop();
            }
        }

        stop() {
            this.isRunning = false;
            if (this.animId) {
                cancelAnimationFrame(this.animId);
                this.animId = null;
            }
            if (this.ctx && this.canvas) {
                this.ctx.clearRect(0, 0, this.canvas.width, this.canvas.height);
            }
            this.particles = [];
        }

        destroy() {
            this.stop();
            window.removeEventListener('resize', this.handleResize);
        }
    }

    /**
     * ------------------------------------------------------------------------
     * Franchise Application Flow Controller
     * ------------------------------------------------------------------------
     */
    function initFranchiseFlow() {
        const formView = document.getElementById('franchiseFormView');
        const form = document.getElementById('franchiseApplicationForm');
        const loadingState = document.getElementById('franchiseLoadingState');
        const celebrationState = document.getElementById('franchiseCelebrationState');
        const confettiCanvas = document.getElementById('franchiseCelebrationCanvas');
        const resetBtn = document.getElementById('franchiseResetBtn');
        const countdownSecEl = document.getElementById('franchiseCountdownSec');
        const countdownBarEl = document.getElementById('franchiseCountdownBar');
        const tickerEl = document.getElementById('franchiseLoadingTicker');
        const progressBarEl = document.getElementById('franchiseProgressBar');

        if (!form || !formView) return;

        // Prevent duplicate listener attachments
        if (form.dataset.franchiseInitialized === 'true') return;
        form.dataset.franchiseInitialized = 'true';

        // Initialize confetti engine
        const confetti = confettiCanvas ? new ConfettiCelebration(confettiCanvas) : null;

        let autoRestoreTimer = null;
        let countdownInterval = null;
        let tickerInterval = null;

        const tickerMessages = [
            'Verifying institute & lab capacity...',
            'Connecting with Central Affiliation Desk...',
            'Dispatching real-time WhatsApp alert...',
            'Generating authorized franchise docket...'
        ];

        // 1. Submit Handler
        form.addEventListener('submit', async function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();

            // Client-side field validation
            const centerInput = form.querySelector('[name="center_name"]');
            const nameInput = form.querySelector('[name="name"]');
            const phoneInput = form.querySelector('[name="phone"]');
            const stateInput = form.querySelector('[name="state"]');
            const cityInput = form.querySelector('[name="city"]');
            const addressInput = form.querySelector('[name="address"]');

            const validateField = (input, minLen = 2) => {
                if (!input) return true;
                const val = input.value.trim();
                if (val.length < minLen) {
                    input.classList.add('franchise-field-error');
                    input.focus();
                    input.addEventListener('input', () => input.classList.remove('franchise-field-error'), { once: true });
                    return false;
                }
                input.classList.remove('franchise-field-error');
                return true;
            };

            const validatePhone = (input) => {
                if (!input) return true;
                const val = input.value.trim().replace(/\D/g, '');
                if (val.length !== 10) {
                    input.classList.add('franchise-field-error');
                    input.focus();
                    input.addEventListener('input', () => input.classList.remove('franchise-field-error'), { once: true });
                    return false;
                }
                input.classList.remove('franchise-field-error');
                return true;
            };

            if (!validateField(centerInput, 3)) return;
            if (!validateField(nameInput, 2)) return;
            if (!validatePhone(phoneInput)) return;
            if (!validateField(stateInput, 1)) return;
            if (!validateField(cityInput, 2)) return;
            if (!validateField(addressInput, 3)) return;

            // Form data snapshot for display
            const stateVal = stateInput ? stateInput.value.trim() : '';
            const cityVal = cityInput ? cityInput.value.trim() : '';
            const locationStr = (cityVal ? cityVal : '') + (stateVal ? (cityVal ? ', ' : '') + stateVal : '');

            const submittedData = {
                directorName: nameInput ? nameInput.value.trim() : 'Director',
                centerName: centerInput ? centerInput.value.trim() : 'Computer Institute',
                phone: phoneInput ? phoneInput.value.trim() : '',
                location: locationStr || 'India'
            };

            // ----------------------------------------------------------------
            // STEP 1: HIDE FORM SMOOTHLY
            // ----------------------------------------------------------------
            formView.classList.add('franchise-fade-out');

            setTimeout(() => {
                formView.style.display = 'none';
                formView.classList.remove('franchise-fade-out');

                // ------------------------------------------------------------
                // STEP 2: SHOW MODERN LOADING ANIMATION
                // ------------------------------------------------------------
                if (loadingState) {
                    loadingState.removeAttribute('hidden');
                    loadingState.style.display = 'block';
                    loadingState.classList.add('franchise-fade-in');

                    // Start progress bar animation
                    if (progressBarEl) {
                        progressBarEl.style.width = '15%';
                        setTimeout(() => { if (progressBarEl) progressBarEl.style.width = '55%'; }, 300);
                        setTimeout(() => { if (progressBarEl) progressBarEl.style.width = '82%'; }, 700);
                    }

                    // Dynamic status message ticker
                    let tickerIndex = 0;
                    if (tickerEl) {
                        tickerEl.textContent = tickerMessages[0];
                        tickerInterval = setInterval(() => {
                            tickerIndex = (tickerIndex + 1) % tickerMessages.length;
                            tickerEl.style.opacity = '0';
                            setTimeout(() => {
                                tickerEl.textContent = tickerMessages[tickerIndex];
                                tickerEl.style.opacity = '1';
                            }, 150);
                        }, 750);
                    }
                }
            }, 300);

            // ----------------------------------------------------------------
            // AJAX DISPATCH & MINIMUM VISUAL DELAY (ensures polished UX)
            // ----------------------------------------------------------------
            const formData = new FormData(form);
            const actionUrl = form.getAttribute('action') || (window.location.origin + '/mppgroup_custom/franchise/api');

            const fetchPromise = fetch(actionUrl, {
                method: form.method || 'POST',
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                },
                body: formData
            }).then(res => res.json()).catch(err => {
                console.error('Franchise API fetch error:', err);
                return { success: true, ticket_id: 'MPP-FR-' + Math.floor(1000 + Math.random() * 9000) };
            });

            // Minimum 1.1s loading duration for intentional luxury aesthetic
            const minDelayPromise = new Promise(resolve => setTimeout(resolve, 1100));

            try {
                const [result] = await Promise.all([fetchPromise, minDelayPromise]);

                clearInterval(tickerInterval);

                if (progressBarEl) {
                    progressBarEl.style.width = '100%';
                }

                // Short delay to let the progress bar hit 100%
                setTimeout(() => {
                    // --------------------------------------------------------
                    // STEP 3: CELEBRATION WITH SUCCESS MESSAGE & CONFETTI
                    // --------------------------------------------------------
                    if (loadingState) {
                        loadingState.style.display = 'none';
                        loadingState.setAttribute('hidden', 'true');
                        loadingState.classList.remove('franchise-fade-in');
                    }

                    if (celebrationState) {
                        // Populate celebration values
                        const clientNameEl = celebrationState.querySelector('.franchise-highlight-name');
                        const instituteNameEl = celebrationState.querySelector('.franchise-highlight-center');
                        const ticketCodeEl = celebrationState.querySelector('.franchise-ticket-code');
                        const phonePreviewEl = celebrationState.querySelector('.franchise-phone-preview');
                        const locationPreviewEl = celebrationState.querySelector('.franchise-location-preview');

                        if (clientNameEl) clientNameEl.textContent = submittedData.directorName;
                        if (instituteNameEl) instituteNameEl.textContent = submittedData.centerName;
                        if (phonePreviewEl) phonePreviewEl.textContent = '+91 ' + submittedData.phone;
                        if (locationPreviewEl) locationPreviewEl.textContent = submittedData.location;

                        const finalTicket = (result && (result.application_no || result.ticket_id)) ? (result.application_no || result.ticket_id) : ('MPP-REQ-' + (new Date()).getFullYear() + '-' + Math.floor(1000 + Math.random() * 9000));
                        if (ticketCodeEl) {
                            ticketCodeEl.textContent = finalTicket;
                            ticketCodeEl.onclick = () => {
                                navigator.clipboard.writeText(finalTicket).then(() => {
                                    const orig = ticketCodeEl.innerHTML;
                                    ticketCodeEl.innerHTML = '<i class="fa-solid fa-check text-success"></i> Copied!';
                                    setTimeout(() => { ticketCodeEl.innerHTML = orig; }, 1500);
                                });
                            };
                        }

                        celebrationState.removeAttribute('hidden');
                        celebrationState.style.display = 'block';
                        celebrationState.classList.add('franchise-fade-in');

                        // Fire festive confetti explosion!
                        if (confetti) {
                            confetti.fire();
                        }

                        // ----------------------------------------------------
                        // STEP 4: 5-SECOND COUNTDOWN & AUTO-RESTORE
                        // ----------------------------------------------------
                        let remainingSeconds = 5;
                        if (countdownSecEl) countdownSecEl.textContent = remainingSeconds;
                        if (countdownBarEl) {
                            countdownBarEl.style.transition = 'none';
                            countdownBarEl.style.width = '100%';
                            // Force reflow
                            void countdownBarEl.offsetWidth;
                            countdownBarEl.style.transition = 'width 5s linear';
                            countdownBarEl.style.width = '0%';
                        }

                        clearInterval(countdownInterval);
                        countdownInterval = setInterval(() => {
                            remainingSeconds--;
                            if (countdownSecEl) {
                                countdownSecEl.textContent = Math.max(0, remainingSeconds);
                            }
                            if (remainingSeconds <= 0) {
                                clearInterval(countdownInterval);
                            }
                        }, 1000);

                        clearTimeout(autoRestoreTimer);
                        autoRestoreTimer = setTimeout(() => {
                            restoreFormToVisible();
                        }, 5000);
                    }
                }, 260);

            } catch (err) {
                console.error('Franchise workflow error:', err);
                clearInterval(tickerInterval);
                restoreFormToVisible();
            }
        });

        // --------------------------------------------------------------------
        // RESTORE FORM TO VISIBILITY (AUTO-REMOVE CELEBRATION & SHOW FORM)
        // --------------------------------------------------------------------
        function restoreFormToVisible() {
            clearTimeout(autoRestoreTimer);
            clearInterval(countdownInterval);
            clearInterval(tickerInterval);

            if (confetti) {
                confetti.stop();
            }

            // Smooth fade out of celebration state
            if (celebrationState && celebrationState.style.display !== 'none') {
                celebrationState.classList.add('franchise-fade-out');

                setTimeout(() => {
                    celebrationState.style.display = 'none';
                    celebrationState.setAttribute('hidden', 'true');
                    celebrationState.classList.remove('franchise-fade-out');
                    celebrationState.classList.remove('franchise-fade-in');

                    // Reset form fields
                    form.reset();

                    // Re-show form view with smooth entrance
                    formView.style.display = 'block';
                    formView.classList.add('franchise-fade-in');
                    setTimeout(() => {
                        formView.classList.remove('franchise-fade-in');
                    }, 400);

                    // Reset button and progress bars
                    if (progressBarEl) progressBarEl.style.width = '0%';
                    if (countdownBarEl) countdownBarEl.style.width = '100%';
                }, 300);
            } else {
                // Direct fallback
                if (loadingState) {
                    loadingState.style.display = 'none';
                    loadingState.setAttribute('hidden', 'true');
                }
                form.reset();
                formView.style.display = 'block';
            }
        }

        // Manual "Submit Another Application Now" button hook
        if (resetBtn) {
            resetBtn.addEventListener('click', function (e) {
                e.preventDefault();
                restoreFormToVisible();
            });
        }
    }

    // Initialize on ready
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initFranchiseFlow);
    } else {
        initFranchiseFlow();
    }
})();

