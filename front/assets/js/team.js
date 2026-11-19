/**
 * ============================================================================
 * MPP GROUP — PUBLIC WEBSITE: TEAM & FACULTY INTERACTIONS (MPA)
 * Path: front/assets/js/team.js
 * Innovation in Education • All in one software
 * Rule 32 & 33 Compliant: Pure Declarative Event Bridge for Modal
 * ============================================================================
 */
(function () {
    'use strict';

    function initTeamModule() {
        // Interactive Faculty Profile Modal
        const modal          = document.getElementById('teamModal');
        const btnClose       = document.getElementById('btnCloseTeamModal');
        const modalImg       = document.getElementById('modalMemberImg');
        const modalName      = document.getElementById('modalMemberName');
        const modalRole      = document.getElementById('modalMemberRole');
        const modalCategory  = document.getElementById('modalMemberCategory');
        const modalExp       = document.getElementById('modalMemberExp');
        const modalCred      = document.getElementById('modalMemberCred');
        const modalBio       = document.getElementById('modalMemberBio');
        const modalCourses   = document.getElementById('modalMemberCourses');
        const modalTags      = document.getElementById('modalMemberTags');
        const modalLinkedin  = document.getElementById('modalMemberLinkedin');
        const modalEmail     = document.getElementById('modalMemberEmail');

        function openModal(data) {
            if (!modal) return;

            if (modalImg) {
                modalImg.src = data.image || '';
                modalImg.alt = data.name || 'Faculty Member';
            }
            if (modalName) modalName.textContent = data.name || '';
            if (modalRole) modalRole.textContent = data.role || '';
            if (modalCategory) modalCategory.textContent = data.category || '';
            if (modalExp) modalExp.innerHTML = '<i class="fa-solid fa-briefcase"></i> ' + (data.exp || '');
            if (modalCred) modalCred.textContent = data.cred || '';
            if (modalBio) modalBio.textContent = data.bio || '';

            // Courses Mentored List
            if (modalCourses) {
                modalCourses.innerHTML = '';
                if (Array.isArray(data.courses) && data.courses.length > 0) {
                    data.courses.forEach(c => {
                        const row = document.createElement('div');
                        row.className = 'team-modal-course-item';
                        row.innerHTML = '<i class="fa-solid fa-circle-check"></i> <span>' + c + '</span>';
                        modalCourses.appendChild(row);
                    });
                }
            }

            // Skill Tags List
            if (modalTags) {
                modalTags.innerHTML = '';
                if (Array.isArray(data.tags) && data.tags.length > 0) {
                    data.tags.forEach(t => {
                        const chip = document.createElement('span');
                        chip.className = 'team-modal-tag-chip';
                        chip.textContent = t;
                        modalTags.appendChild(chip);
                    });
                }
            }

            // Social Profile Links
            if (modalLinkedin) {
                if (data.linkedin) {
                    modalLinkedin.href = data.linkedin;
                    modalLinkedin.style.display = 'inline-flex';
                } else {
                    modalLinkedin.style.display = 'none';
                }
            }

            if (modalEmail) {
                if (data.email) {
                    modalEmail.href = data.email;
                    modalEmail.style.display = 'inline-flex';
                } else {
                    modalEmail.style.display = 'none';
                }
            }

            modal.removeAttribute('hidden');
            document.body.style.overflow = 'hidden';
        }

        function closeModal() {
            if (!modal) return;
            modal.setAttribute('hidden', '');
            document.body.style.overflow = '';
        }

        // Attach modal openers to all declarative triggers
        const modalTriggers = document.querySelectorAll('[data-open-team-modal]');
        modalTriggers.forEach(trigger => {
            if (trigger.dataset.initialized) return;
            trigger.dataset.initialized = 'true';

            trigger.addEventListener('click', function (e) {
                e.preventDefault();

                let courses = [];
                let tags = [];
                try {
                    courses = JSON.parse(this.getAttribute('data-member-courses') || '[]');
                } catch (err) {
                    courses = [];
                }
                try {
                    tags = JSON.parse(this.getAttribute('data-member-tags') || '[]');
                } catch (err) {
                    tags = [];
                }

                openModal({
                    name:      this.getAttribute('data-member-name'),
                    role:      this.getAttribute('data-member-role'),
                    category:  this.getAttribute('data-member-category'),
                    image:     this.getAttribute('data-member-image'),
                    exp:       this.getAttribute('data-member-exp'),
                    cred:      this.getAttribute('data-member-cred'),
                    bio:       this.getAttribute('data-member-bio'),
                    courses:   courses,
                    tags:      tags,
                    linkedin:  this.getAttribute('data-member-linkedin'),
                    email:     this.getAttribute('data-member-email'),
                });
            });
        });

        if (btnClose && !btnClose.dataset.initialized) {
            btnClose.dataset.initialized = 'true';
            btnClose.addEventListener('click', closeModal);
        }

        if (modal && !modal.dataset.initialized) {
            modal.dataset.initialized = 'true';
            modal.addEventListener('click', function (e) {
                if (e.target === modal) {
                    closeModal();
                }
            });
        }

        // Global ESC key to close modal
        if (!window._teamEscHandlerBound) {
            window._teamEscHandlerBound = true;
            document.addEventListener('keydown', function (e) {
                if (e.key === 'Escape') {
                    const m = document.getElementById('teamModal');
                    if (m && !m.hasAttribute('hidden')) {
                        m.setAttribute('hidden', '');
                        document.body.style.overflow = '';
                    }
                }
            });
        }
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initTeamModule);
    } else {
        initTeamModule();
    }

    window.initTeamModule = initTeamModule;
})();
