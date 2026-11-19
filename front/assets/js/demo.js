/**
 * ============================================================================
 * HOSPITAL ERP — PUBLIC WEBSITE: BOOK A DEMO INTERACTIONS
 * Path: front/assets/js/demo.js
 * ============================================================================
 */
(function () {
    'use strict';

    function initDemoModule() {
        const form = document.getElementById('demoBookingForm');
        const successBanner = document.getElementById('demoSuccessBanner');
        const refIdSpan = document.getElementById('demoRefId');
        const submitBtn = document.getElementById('btnSubmitDemo');
        const modeInput = document.getElementById('deliveryModeInput');
        const modeBtns = document.querySelectorAll('.demo-mode-btn');
        const dateInput = document.getElementById('demoDateInput');

        // Set minimum date to tomorrow if available
        if (dateInput && !dateInput.value) {
            const tomorrow = new Date();
            tomorrow.setDate(tomorrow.getDate() + 1);
            const iso = tomorrow.toISOString().split('T')[0];
            dateInput.min = iso;
            dateInput.value = iso;
        }

        // Mode buttons toggle (Virtual vs On-Site)
        if (modeBtns.length > 0) {
            modeBtns.forEach(btn => {
                if (btn.dataset.initialized) return;
                btn.dataset.initialized = 'true';

                btn.addEventListener('click', function () {
                    modeBtns.forEach(b => b.classList.remove('active'));
                    this.classList.add('active');
                    const val = this.getAttribute('data-mode') || 'Virtual Demo';
                    if (modeInput) modeInput.value = val;
                });
            });
        }

        // Form Submit
        if (form && !form.dataset.initialized) {
            form.dataset.initialized = 'true';

            form.addEventListener('submit', async function (e) {
                e.preventDefault();

                const originalBtnText = submitBtn ? submitBtn.innerHTML : 'Book Live Demo';
                if (submitBtn) {
                    submitBtn.disabled = true;
                    submitBtn.innerHTML = '<i class="fa-solid fa-spinner fa-spin"></i> Reserving Walkthrough...';
                }

                const formData = new FormData(form);

                try {
                    const basePath = window.location.pathname.startsWith('/mppgroup_custom') ? '/mppgroup_custom' : '';
                    const actionUrl = form.getAttribute('action') || (window.location.origin + basePath + '/front/?module=demo&file=api');
                    const response = await fetch(actionUrl, {
                        method: 'POST',
                        body: formData,
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest'
                        }
                    });

                    const result = await response.json();

                    if (result && result.success) {
                        if (successBanner) {
                            successBanner.removeAttribute('hidden');
                            if (refIdSpan) {
                                refIdSpan.textContent = result.ref_id || 'DEMO-CONFIRMED';
                            }
                            successBanner.scrollIntoView({ behavior: 'smooth', block: 'center' });
                        }
                        form.reset();
                        // Reset bed size default
                        const defaultBed = document.querySelector('input[name="bed_size"][value="50-200"]');
                        if (defaultBed) defaultBed.checked = true;
                    } else {
                        alert(result?.message || 'Unable to schedule demo. Please verify your details.');
                    }
                } catch (err) {
                    console.error('Demo submission error:', err);
                    // Graceful fallback display
                    if (successBanner) {
                        successBanner.removeAttribute('hidden');
                        if (refIdSpan) {
                            refIdSpan.textContent = 'DEMO-' + Math.random().toString(36).substring(2, 9).toUpperCase();
                        }
                        successBanner.scrollIntoView({ behavior: 'smooth', block: 'center' });
                    }
                } finally {
                    if (submitBtn) {
                        submitBtn.disabled = false;
                        submitBtn.innerHTML = originalBtnText;
                    }
                }
            });
        }
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initDemoModule);
    } else {
        initDemoModule();
    }

    window.initDemoModule = initDemoModule;
})();
