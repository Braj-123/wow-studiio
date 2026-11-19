<?php
declare(strict_types=1);

/**
 * ============================================================================
 * WoW STUDIO — TECH PARTNER: MPP GROUP
 * Content: Sourced directly from docs/companyabout.docs (About MPP Group)
 * Card Architecture: Reviewed and adapted from http://localhost/mppgroup_custom/team
 * Strict 4-Cards per Row Responsive Grid with Floating Badges & Full Bio Modal
 * Theme: Royal Burgundy (#6b1426) & Champagne Gold (#cfa859)
 * File: front/view/techpartner/html/index.php
 * ============================================================================
 */

$appBasePath = $appBasePath ?? '';

// MPP Group Engineering & Leadership Team (adapted from mppgroup_custom/team card architecture)
$techMembers = [
    [
        'id'          => 'alok-kumar-jha',
        'name'        => 'Alok Kumar Jha',
        'designation' => 'Co-Founder & Principal Tech Architect',
        'department'  => 'CO-FOUNDER',
        'experience'  => '12+ Yrs Exp',
        'credential'  => 'Co-Founder, MPP Group • Systems Architecture',
        'image'       => 'uploads/team/co_founder.jpg',
        'bio'         => 'Co-Founder at MPP Group. Leads enterprise architecture, scalable cloud systems, and bespoke digital platforms.',
        'detailed_bio'=> 'With over 12 years of specialized enterprise software engineering experience at MPP Group, Alok Kumar Jha co-founded the company to deliver transformative software solutions. He has spearheaded core ERP platforms for education and healthcare, enterprise automation, and high-performance custom web applications (including reference client WoW Studio).',
        'tags'        => ['Co-Founder', 'PHP 8.2', 'MySQL 8', 'Enterprise ERP', 'Cloud Architecture', 'Security'],
        'projects_led'=> ['MPP Enterprise ERP', 'School, College & Hospital Systems', 'Custom Software Platform', 'WoW Studio Web Platform'],
        'social'      => [
            'linkedin'  => 'https://linkedin.com',
            'github'    => 'https://github.com',
            'twitter'   => 'https://twitter.com',
            'portfolio' => 'https://example.com',
        ],
    ],
    [
        'id'          => 'priya-singhania',
        'name'        => 'Priya Singhania',
        'designation' => 'Lead UI/UX & Motion Designer',
        'department'  => 'UI/UX & MOTION',
        'experience'  => '7+ Yrs Exp',
        'credential'  => 'M.Des • Creative Direction',
        'image'       => 'uploads/team/sunita.jpg',
        'bio'         => 'Specializes in user-friendly design systems, modern typography hierarchy, and fluid 60 FPS motion interactions.',
        'detailed_bio'=> 'Priya leads user-centric visual aesthetics and interaction design at MPP Group. She crafts intuitive, high-efficiency dashboard interfaces for institutional software as well as luxury web applications, ensuring engaging user experiences across every device.',
        'tags'        => ['UI/UX Systems', 'Figma', 'Motion Design', 'Design Systems', 'Typography'],
        'projects_led'=> ['Enterprise Design System', 'ERP User Dashboards', 'WoW Studio Web Platform'],
        'social'      => [
            'linkedin'  => 'https://linkedin.com',
            'github'    => 'https://dribbble.com',
            'twitter'   => 'https://twitter.com',
            'portfolio' => 'https://example.com',
        ],
    ],
    [
        'id'          => 'rahul-verma',
        'name'        => 'Rahul Verma',
        'designation' => 'Senior Full-Stack Web Engineer',
        'department'  => 'FULL STACK',
        'experience'  => '8+ Yrs Exp',
        'credential'  => 'B.E. IT • Full-Stack Systems',
        'image'       => 'uploads/team/cto.jpg',
        'bio'         => 'Engineered dynamic booking pipelines, RSVP inquiry endpoints, and real-time database query optimizations.',
        'detailed_bio'=> 'Rahul brings deep full-stack proficiency with modern PHP and relational database design. He developed the reservation workflow, client testimonial review modules, and automated schema migrations for the production deployment.',
        'tags'        => ['PHP OOP', 'REST APIs', 'MySQL Relational', 'JavaScript', 'PDO'],
        'projects_led'=> ['Booking & RSVP System', 'Gallery Filtering Engine', 'Database Normalization'],
        'social'      => [
            'linkedin'  => 'https://linkedin.com',
            'github'    => 'https://github.com',
            'twitter'   => 'https://twitter.com',
            'portfolio' => 'mailto:rahul@example.com',
        ],
    ],
    [
        'id'          => 'tanvi-kulkarni',
        'name'        => 'Tanvi Kulkarni',
        'designation' => 'Frontend & Interaction Specialist',
        'department'  => 'FRONTEND',
        'experience'  => '6+ Yrs Exp',
        'credential'  => 'B.Tech • Modern Web Tech',
        'image'       => 'uploads/team/tanvi.jpg',
        'bio'         => 'Specializes in buttery 60 FPS mobile responsiveness, parallax choreography, and fluid UI components.',
        'detailed_bio'=> 'Tanvi focuses on modern responsive layout paradigms and CSS 3D transforms at MPP Group. She tested and perfected cross-device parity across iPhone, iPad, and high-DPI desktop displays with zero horizontal scroll jitter.',
        'tags'        => ['Bootstrap 5.3', 'CSS 3D', 'ScrollTrigger', 'Mobile UX', 'Flex/Grid'],
        'projects_led'=> ['Mobile Navigation Drawer', 'Fluid Grid Layouts', 'Card Hover Physics'],
        'social'      => [
            'linkedin'  => 'https://linkedin.com',
            'github'    => 'https://github.com',
            'twitter'   => 'https://twitter.com',
            'portfolio' => 'https://example.com',
        ],
    ],
    [
        'id'          => 'arvind-patel',
        'name'        => 'Arvind Patel',
        'designation' => 'DevOps & Cloud Infrastructure Lead',
        'department'  => 'DEVOPS & CLOUD',
        'experience'  => '7+ Yrs Exp',
        'credential'  => 'AWS Certified • Linux SysAdmin',
        'image'       => 'uploads/team/arvind.jpg',
        'bio'         => 'Oversees zero-downtime deployment pipelines, Cloudflare CDN acceleration, and automated backup mirrors.',
        'detailed_bio'=> 'Arvind is responsible for server reliability, SSL/TLS certificate management, and asset caching strategies. He configured Brotli compression, HTTP/2 multiplexing, and server-side protection against high-traffic spikes.',
        'tags'        => ['Apache', 'Nginx', 'SSL/TLS', 'Cloud CDN', 'Brotli', 'Linux'],
        'projects_led'=> ['CDN Asset Caching', 'Automated Daily Backups', 'Zero-Downtime Pipeline'],
        'social'      => [
            'linkedin'  => 'https://linkedin.com',
            'github'    => 'https://github.com',
            'twitter'   => 'https://twitter.com',
            'portfolio' => 'mailto:arvind@example.com',
        ],
    ],
    [
        'id'          => 'rohan-deshmukh',
        'name'        => 'Rohan Deshmukh',
        'designation' => 'QA & Web Performance Engineer',
        'department'  => 'QA & SPEED',
        'experience'  => '5+ Yrs Exp',
        'credential'  => 'B.Tech • Web Vitals Specialist',
        'image'       => 'uploads/team/rohan.jpg',
        'bio'         => 'Ensures 100% cross-browser fidelity across Safari, Chrome, iOS, and Android with sub-second page loads.',
        'detailed_bio'=> 'Rohan runs automated performance audits, Lighthouse benchmarks, and accessibility validations. His optimizations achieved high 95+ performance scores and instant visual readiness on cold starts.',
        'tags'        => ['Lighthouse 95+', 'Web Vitals', 'Cross-Browser', 'WCAG 2.1', 'Audit'],
        'projects_led'=> ['Lighthouse Speed Tuning', 'Automated End-to-End Tests', 'Font Display Optimization'],
        'social'      => [
            'linkedin'  => 'https://linkedin.com',
            'github'    => 'https://github.com',
            'twitter'   => 'https://twitter.com',
            'portfolio' => 'mailto:rohan@example.com',
        ],
    ],
    [
        'id'          => 'vikramaditya-roy',
        'name'        => 'Vikramaditya Roy',
        'designation' => 'Cybersecurity & Data Privacy Lead',
        'department'  => 'SECURITY',
        'experience'  => '9+ Yrs Exp',
        'credential'  => 'CISSP • Security Architecture',
        'image'       => 'uploads/team/ciso.jpg',
        'bio'         => 'Implemented cryptographic authentication guards, input sanitization, and enterprise data protection.',
        'detailed_bio'=> 'Vikramaditya is a certified cybersecurity specialist at MPP Group. He secured all admin session tokens, implemented parameterized SQL statements, CSRF validation, and hardened password hashing via modern Argon2/Bcrypt.',
        'tags'        => ['OWASP Top 10', 'CSRF Shield', 'SQL Hardening', 'Data Privacy', 'XSS Guard'],
        'projects_led'=> ['Admin Auth Shield', 'Input Sanitization Layer', 'Encrypted Credentials Storage'],
        'social'      => [
            'linkedin'  => 'https://linkedin.com',
            'github'    => 'https://github.com',
            'twitter'   => 'https://twitter.com',
            'portfolio' => 'mailto:vikramaditya@example.com',
        ],
    ],
    [
        'id'          => 'ananya-sen',
        'name'        => 'Ananya Sen',
        'designation' => 'Product Strategy & Digital Growth Lead',
        'department'  => 'GROWTH & SEO',
        'experience'  => '6+ Yrs Exp',
        'credential'  => 'MBA Tech • Product Strategy',
        'image'       => 'uploads/team/cmo.jpg',
        'bio'         => 'Drives technical SEO architecture, structured OpenGraph metadata, and conversion funnel optimizations.',
        'detailed_bio'=> 'Ananya blends technical engineering insights with growth strategy at MPP Group. She crafted the schema.org structured data, semantic HTML5 hierarchy, and social sharing OpenGraph integrations across all public modules.',
        'tags'        => ['Technical SEO', 'Schema.org', 'OpenGraph', 'Analytics', 'Conversion Funnel'],
        'projects_led'=> ['Schema.org Rich Snippets', 'Social Sharing Metadata', 'Funnel Analytics'],
        'social'      => [
            'linkedin'  => 'https://linkedin.com',
            'github'    => 'https://github.com',
            'twitter'   => 'https://twitter.com',
            'portfolio' => 'mailto:ananya@example.com',
        ],
    ],
];

// MPP Group Credentials & Stats (from docs/companyabout.docs)
$companyStats = [
    ['icon' => 'bi-code-slash', 'number' => '500+', 'label' => 'Institutions & Clients', 'sub' => 'Powered Across India'],
    ['icon' => 'bi-speedometer2', 'number' => '99.9%', 'label' => 'Cloud SLA Uptime', 'sub' => 'Intelligent & Reliable Systems'],
    ['icon' => 'bi-stars', 'number' => '60 FPS', 'label' => 'Cinematic UX Motion', 'sub' => 'GSAP Hardware Acceleration'],
    ['icon' => 'bi-shield-check', 'number' => '24/7', 'label' => 'Dedicated Support', 'sub' => 'Continuous SLA Monitoring'],
];

// Complete Software & Digital Development Solutions (from docs/companyabout.docs Section "WHAT WE DO")
$mppSolutions = [
    [
        'num'   => '01',
        'title' => 'School Management Software',
        'icon'  => 'bi-mortarboard-fill',
        'desc'  => 'Smart school management solutions designed to simplify educational administration, student management, attendance, fee collection, examinations, results, communication, and institutional operations.',
    ],
    [
        'num'   => '02',
        'title' => 'Hospital Management Software',
        'icon'  => 'bi-hospital-fill',
        'desc'  => 'Comprehensive hospital management solutions to streamline patient records, appointments, OPD, IPD, billing, pharmacy, laboratory, doctors, staff, and hospital administration.',
    ],
    [
        'num'   => '03',
        'title' => 'Computer Institute Software',
        'icon'  => 'bi-pc-display-horizontal',
        'desc'  => 'Complete ERP solutions for computer training institutes, including student admissions, courses, batches, fees, attendance, examinations, certificates, franchises, and student management.',
    ],
    [
        'num'   => '04',
        'title' => 'Coaching Management Software',
        'icon'  => 'bi-book-half',
        'desc'  => 'Smart coaching institute management systems for student enrollment, batch scheduling, attendance, fee management, online examinations, results, study materials, and performance tracking.',
    ],
    [
        'num'   => '05',
        'title' => 'Custom Software Development',
        'icon'  => 'bi-gear-wide-connected',
        'desc'  => 'We develop tailor-made software applications according to your business requirements, workflows, and operational needs. From business automation to complex enterprise applications, we turn ideas into practical digital solutions.',
    ],
    [
        'num'   => '06',
        'title' => 'Custom Website Development',
        'icon'  => 'bi-globe-central-south-asia',
        'desc'  => 'We design and develop modern, responsive, SEO-friendly, and performance-focused websites that strengthen your online presence and help businesses connect with their audiences.',
    ],
];

// Why Choose MPP Group (from docs/companyabout.docs Section "WHY CHOOSE MPP GROUP?")
$whyChooseMpp = [
    ['icon' => 'bi-bullseye', 'title' => 'Industry-Focused Solutions', 'desc' => 'Software designed around real business requirements and operational workflows.'],
    ['icon' => 'bi-sliders2', 'title' => 'Customized Development', 'desc' => 'Solutions precisely tailored to your specific organizational needs and growth.'],
    ['icon' => 'bi-cpu-fill', 'title' => 'Modern Technology', 'desc' => 'Utilizing modern tools, clean architectures, and modern development practices.'],
    ['icon' => 'bi-palette-fill', 'title' => 'User-Friendly Design', 'desc' => 'Simple, intuitive, and efficient interfaces that teams love to use every day.'],
    ['icon' => 'bi-graph-up-arrow', 'title' => 'Scalable Architecture', 'desc' => 'Engineered from day one to support exponential transaction and user growth.'],
    ['icon' => 'bi-headset', 'title' => 'Reliable Dedicated Support', 'desc' => 'Dedicated assistance, continuous performance improvements, and rapid SLA response.'],
    ['icon' => 'bi-diagram-3-fill', 'title' => 'Integrated Digital Ecosystem', 'desc' => 'Software, websites, automation, and digital services delivered under one roof.'],
];

// Development Approach (from docs/companyabout.docs Section "OUR DEVELOPMENT APPROACH")
$devApproach = [
    ['step' => '01', 'title' => 'Understand', 'desc' => 'We understand your business, goals, and requirements thoroughly.'],
    ['step' => '02', 'title' => 'Plan', 'desc' => 'We prepare the right technology strategy and development roadmap.'],
    ['step' => '03', 'title' => 'Design', 'desc' => 'We create intuitive interfaces and user-friendly visual experiences.'],
    ['step' => '04', 'title' => 'Develop', 'desc' => 'We build secure, scalable, and efficient digital software systems.'],
    ['step' => '05', 'title' => 'Test', 'desc' => 'We carefully test functionality, security, performance, and reliability.'],
    ['step' => '06', 'title' => 'Deliver & Support', 'desc' => 'We deploy the solution and provide ongoing technical assistance.'],
];
?>

<style>
/* =========================================================================
   TECH PARTNER (MPP GROUP) — MPPGROUP_CUSTOM CARD DESIGN ARCHITECTURE
   Theme: Royal Burgundy (#6b1426) & Champagne Gold (#cfa859)
   ========================================================================= */

/* -------------------------------------------------------------------------
   CO-FOUNDER & CHIEF TECHNICAL ARCHITECT SPOTLIGHT
   ------------------------------------------------------------------------- */
.cofounder-spotlight-section {
    background: linear-gradient(180deg, #faf6f0 0%, #ffffff 100%);
    border-bottom: 2px solid var(--champagne-gold, #cfa859);
    position: relative;
    overflow: hidden;
}

.cofounder-portrait-chassis {
    position: relative;
    max-width: 440px;
    margin: 0 auto;
}

.cofounder-portrait-wrapper {
    position: relative;
    border-radius: 26px;
    overflow: hidden;
    border: 2.5px solid var(--champagne-gold, #cfa859);
    box-shadow: 0 25px 60px rgba(107, 20, 38, 0.22), 0 8px 24px rgba(0, 0, 0, 0.12);
    background: #140207;
    aspect-ratio: 4 / 4.6;
}

.cofounder-portrait-image {
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: center top;
    display: block;
    transition: transform 0.6s cubic-bezier(0.16, 1, 0.3, 1), filter 0.4s ease;
}

.cofounder-portrait-chassis:hover .cofounder-portrait-image {
    transform: scale(1.04);
}

.cofounder-image-overlay {
    position: absolute;
    inset: 0;
    background: linear-gradient(180deg, rgba(14, 2, 6, 0.05) 0%, transparent 40%, rgba(14, 2, 6, 0.75) 75%, rgba(10, 1, 4, 0.95) 100%);
    pointer-events: none;
}

.cofounder-top-badge {
    position: absolute;
    top: 18px;
    left: 18px;
    background: rgba(14, 2, 6, 0.92);
    border: 1px solid var(--champagne-gold, #cfa859);
    color: #ffd875;
    padding: 6px 14px;
    border-radius: 30px;
    font-size: 11px;
    font-weight: 800;
    letter-spacing: 1px;
    text-transform: uppercase;
    backdrop-filter: blur(8px);
    display: inline-flex;
    align-items: center;
    gap: 6px;
    box-shadow: 0 4px 14px rgba(0, 0, 0, 0.4);
    z-index: 3;
}

.cofounder-bottom-kpi-card {
    position: absolute;
    bottom: 18px;
    left: 18px;
    right: 18px;
    background: rgba(255, 255, 255, 0.96);
    border: 1.5px solid var(--champagne-gold, #cfa859);
    border-radius: 16px;
    padding: 14px 18px;
    backdrop-filter: blur(10px);
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.25);
    transition: transform 0.3s ease;
    z-index: 3;
}

.cofounder-portrait-chassis:hover .cofounder-bottom-kpi-card {
    transform: translateY(-3px);
}

.kpi-role-tag {
    font-size: 10px;
    font-weight: 800;
    letter-spacing: 1.5px;
    color: var(--royal-burgundy, #6b1426);
    text-transform: uppercase;
    margin-bottom: 2px;
}

.kpi-name {
    font-family: 'Playfair Display', Georgia, serif;
    font-size: 18px;
    font-weight: 800;
    color: var(--royal-burgundy, #6b1426);
    margin-bottom: 2px;
    line-height: 1.2;
}

.kpi-desc {
    font-size: 11.5px;
    color: #554844;
    line-height: 1.45;
}

.cofounder-social-strip {
    display: flex;
    justify-content: center;
    gap: 10px;
    margin-top: 18px;
}

.cofounder-social-btn {
    flex: 1;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 6px;
    padding: 9px 12px;
    border-radius: 12px;
    background: #ffffff;
    border: 1.5px solid var(--champagne-gold-border, #e9d6a7);
    color: var(--royal-burgundy, #6b1426);
    font-size: 12px;
    font-weight: 700;
    text-decoration: none !important;
    box-shadow: 0 4px 12px rgba(107, 20, 38, 0.06);
    transition: all 0.25s ease;
}

.cofounder-social-btn:hover {
    background: var(--royal-burgundy, #6b1426);
    color: #ffffff;
    border-color: var(--royal-burgundy, #6b1426);
    transform: translateY(-2px);
    box-shadow: 0 8px 18px rgba(107, 20, 38, 0.25);
}

.cofounder-quote-callout {
    position: relative;
    background: #ffffff;
    border-left: 4px solid var(--champagne-gold, #cfa859);
    border-radius: 0 16px 16px 0;
    padding: 20px 24px;
    box-shadow: 0 10px 30px rgba(107, 20, 38, 0.06);
    border-top: 1px solid rgba(207, 168, 89, 0.2);
    border-right: 1px solid rgba(207, 168, 89, 0.2);
    border-bottom: 1px solid rgba(207, 168, 89, 0.2);
}

.quote-symbol {
    font-family: 'Playfair Display', Georgia, serif;
    font-size: 32px;
    color: var(--champagne-gold, #cfa859);
    line-height: 1;
    margin-bottom: 4px;
}

.quote-body {
    font-size: 15.5px;
    line-height: 1.7;
    color: #3b2f2c;
}

.quote-signature {
    font-size: 12px;
    color: #6d5e5b;
}
.quote-signature strong {
    color: var(--royal-burgundy, #6b1426);
}

.cofounder-spec-tile {
    background: #ffffff;
    border: 1.5px solid var(--champagne-gold-border, #e9d6a7);
    border-radius: 14px;
    padding: 18px 16px;
    transition: all 0.28s ease;
}
.cofounder-spec-tile:hover {
    border-color: var(--champagne-gold, #cfa859);
    transform: translateY(-3px);
    box-shadow: 0 10px 24px rgba(107, 20, 38, 0.1);
}
.cofounder-spec-tile .spec-icon {
    font-size: 22px;
    color: var(--royal-burgundy, #6b1426);
    margin-bottom: 8px;
}
.cofounder-spec-tile .spec-title {
    font-family: 'Playfair Display', Georgia, serif;
    font-size: 15px;
    font-weight: 700;
    color: var(--royal-burgundy, #6b1426);
    margin-bottom: 6px;
}
.cofounder-spec-tile .spec-desc {
    font-size: 12px;
    line-height: 1.55;
    color: #5c4f4b;
}

/* KPI Strip (from mppgroup_custom/team) */
.tech-metrics-strip {
    background: #ffffff;
    padding: 38px 0;
    border-bottom: 1px solid var(--line, #ebdcd0);
}
.tech-stats-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 20px;
}
@media (max-width: 991px) and (min-width: 576px) {
    .tech-stats-grid { grid-template-columns: repeat(2, 1fr); }
}
@media (max-width: 575px) {
    .tech-stats-grid { grid-template-columns: 1fr; }
}

.tech-stat-card {
    display: flex;
    align-items: center;
    gap: 16px;
    padding: 18px 20px;
    background: #fdfaf6;
    border: 1.5px solid var(--champagne-gold-border, #e9d6a7);
    border-radius: 16px;
    transition: transform 0.28s ease, border-color 0.28s ease, box-shadow 0.28s ease, background 0.28s ease;
}
.tech-stat-card:hover {
    transform: translateY(-4px);
    border-color: var(--champagne-gold, #cfa859);
    background: #ffffff;
    box-shadow: 0 14px 30px rgba(107, 20, 38, 0.10);
}
.tech-stat-icon-wrap {
    width: 48px;
    height: 48px;
    border-radius: 14px;
    background: rgba(207, 168, 89, 0.15);
    color: var(--royal-burgundy, #6b1426);
    display: grid;
    place-items: center;
    font-size: 20px;
    flex-shrink: 0;
    transition: transform 0.3s ease, background 0.3s ease, color 0.3s ease;
}
.tech-stat-card:hover .tech-stat-icon-wrap {
    transform: scale(1.1) rotate(4deg);
    background: var(--royal-burgundy, #6b1426);
    color: #ffd875;
}
.tech-stat-number {
    font-family: 'Playfair Display', Georgia, serif;
    font-size: 24px;
    font-weight: 800;
    color: var(--royal-burgundy, #6b1426);
    line-height: 1.1;
    display: block;
}
.tech-stat-label {
    font-size: 13px;
    font-weight: 700;
    color: #2c2523;
    margin-top: 3px;
    line-height: 1.3;
}
.tech-stat-sub {
    font-size: 11.5px;
    color: #7a6e6b;
    margin-top: 2px;
}

/* 4-Cards Per Row Responsive Grid (exact match to mppgroup_custom) */
.team-cards-grid-4 {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 26px;
}
@media (max-width: 1200px) and (min-width: 769px) {
    .team-cards-grid-4 {
        grid-template-columns: repeat(2, 1fr);
        gap: 24px;
    }
}
@media (max-width: 768px) {
    .team-cards-grid-4 {
        grid-template-columns: 1fr;
        gap: 22px;
        max-width: 500px;
        margin-inline: auto;
    }
}

/* THE MODERN TEAM CARD (adapted directly from mppgroup_custom .team-card-modern) */
.team-card-modern {
    background: #ffffff;
    border-radius: 20px;
    border: 1.5px solid var(--champagne-gold-border, #e9d6a7);
    box-shadow: 0 10px 28px rgba(74, 11, 23, 0.06);
    overflow: hidden;
    display: flex;
    flex-direction: column;
    width: 100%;
    position: relative;
    transition: transform 0.35s cubic-bezier(0.16, 1, 0.3, 1), box-shadow 0.35s cubic-bezier(0.16, 1, 0.3, 1), border-color 0.35s ease;
}
.team-card-modern:hover {
    transform: translateY(-8px);
    box-shadow: 0 22px 50px rgba(107, 20, 38, 0.16);
    border-color: var(--champagne-gold, #cfa859);
}

/* Top Image Frame */
.team-card-media {
    position: relative;
    width: 100%;
    aspect-ratio: 1 / 1.05;
    background: #170208;
    overflow: hidden;
}
.team-card-img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: top center;
    transition: transform 0.5s cubic-bezier(0.16, 1, 0.3, 1);
    display: block;
}
.team-card-modern:hover .team-card-img {
    transform: scale(1.08);
}
.team-card-media::after {
    content: "";
    position: absolute;
    inset: 0;
    background: linear-gradient(180deg, rgba(0, 0, 0, 0.05) 0%, rgba(10, 1, 4, 0.55) 100%);
    pointer-events: none;
}

/* Floating Badges on Image (from mppgroup_custom) */
.team-card-badge-left {
    position: absolute;
    top: 14px;
    left: 14px;
    z-index: 3;
    display: inline-flex;
    align-items: center;
    gap: 6px;
    background: rgba(10, 1, 4, 0.82);
    backdrop-filter: blur(8px);
    -webkit-backdrop-filter: blur(8px);
    color: #ffffff;
    border: 1px solid rgba(255, 216, 117, 0.35);
    border-radius: 999px;
    font-size: 11px;
    font-weight: 700;
    padding: 4px 10px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.25);
}
.team-card-badge-left i {
    color: #ffd875;
    font-size: 11px;
}

.team-card-badge-right {
    position: absolute;
    top: 14px;
    right: 14px;
    z-index: 3;
    background: rgba(255, 255, 255, 0.95);
    backdrop-filter: blur(8px);
    -webkit-backdrop-filter: blur(8px);
    color: var(--royal-burgundy, #6b1426);
    border: 1px solid var(--champagne-gold-border, #e9d6a7);
    border-radius: 999px;
    font-size: 10px;
    font-weight: 800;
    padding: 4px 10px;
    text-transform: uppercase;
    letter-spacing: 0.6px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.12);
}

/* Quick View Overlay on Hover */
.team-card-quick-overlay {
    position: absolute;
    bottom: 14px;
    left: 14px;
    right: 14px;
    z-index: 4;
    opacity: 0;
    transform: translateY(10px);
    transition: opacity 0.25s ease, transform 0.25s ease;
    text-align: center;
}
.team-card-modern:hover .team-card-quick-overlay {
    opacity: 1;
    transform: translateY(0);
}
.team-btn-quickview {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    width: 100%;
    padding: 9px 16px;
    background: rgba(255, 255, 255, 0.96);
    color: var(--royal-burgundy, #6b1426);
    border: 1px solid #ffffff;
    border-radius: 12px;
    font-size: 12px;
    font-weight: 700;
    cursor: pointer;
    box-shadow: 0 6px 16px rgba(0, 0, 0, 0.25);
    transition: all 0.2s ease;
}
.team-btn-quickview:hover {
    background: var(--royal-burgundy, #6b1426);
    color: #ffffff;
    border-color: var(--royal-burgundy, #6b1426);
}

/* Card Body Content */
.team-card-body {
    padding: 22px 20px;
    display: flex;
    flex-direction: column;
    flex-grow: 1;
    text-align: left;
}

.team-card-cred-pill {
    display: inline-block;
    align-self: flex-start;
    background: var(--champagne-gold-light, rgba(207, 168, 89, 0.15));
    color: var(--champagne-gold-deep, #9c782b);
    border: 1px solid var(--champagne-gold-border, #e9d6a7);
    font-size: 10.5px;
    font-weight: 700;
    padding: 3px 10px;
    border-radius: 6px;
    margin-bottom: 10px;
    letter-spacing: 0.2px;
}

.team-card-name {
    font-family: 'Playfair Display', Georgia, serif;
    font-size: 19px;
    font-weight: 800;
    color: var(--royal-burgundy, #6b1426);
    margin: 0 0 4px;
    line-height: 1.25;
}

.team-card-role {
    font-size: 12.5px;
    font-weight: 700;
    color: var(--champagne-gold-deep, #9c782b);
    margin: 0 0 10px;
    line-height: 1.4;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.team-card-bio {
    font-size: 12.5px;
    color: #635754;
    line-height: 1.55;
    margin: 0 0 14px;
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
    overflow: hidden;
    flex-grow: 1;
}

/* Skill Tags */
.team-card-tags {
    display: flex;
    flex-wrap: wrap;
    gap: 5px;
    margin-bottom: 16px;
}
.team-tag-pill {
    background: #fdfaf6;
    color: #4a3b32;
    font-size: 10.5px;
    font-weight: 600;
    padding: 3px 8px;
    border-radius: 999px;
    border: 1px solid rgba(207, 168, 89, 0.35);
    transition: background 0.2s ease, color 0.2s ease;
}
.team-card-modern:hover .team-tag-pill {
    background: rgba(207, 168, 89, 0.18);
    color: var(--royal-burgundy, #6b1426);
}

/* Card Bottom Footer with Social Buttons */
.team-card-footer {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding-top: 14px;
    border-top: 1px solid var(--line, #ebdcd0);
    margin-top: auto;
}
.team-btn-profile {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    font-size: 12px;
    font-weight: 700;
    color: var(--royal-burgundy, #6b1426);
    background: transparent;
    border: none;
    padding: 0;
    cursor: pointer;
    transition: color 0.2s ease, transform 0.2s ease;
}
.team-btn-profile:hover {
    color: var(--champagne-gold-deep, #9c782b);
    transform: translateX(3px);
}
.team-card-socials {
    display: flex;
    align-items: center;
    gap: 6px;
}
.team-social-btn {
    width: 32px;
    height: 32px;
    border-radius: 50%;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    background: rgba(207, 168, 89, 0.12);
    border: 1px solid rgba(207, 168, 89, 0.4);
    color: var(--royal-burgundy, #6b1426);
    font-size: 13.5px;
    text-decoration: none !important;
    transition: all 0.25s ease;
}
.team-social-btn:hover {
    background: var(--royal-burgundy, #6b1426);
    color: #ffffff !important;
    border-color: var(--royal-burgundy, #6b1426);
    transform: translateY(-2px);
    box-shadow: 0 4px 10px rgba(107, 20, 38, 0.25);
}

/* Solutions Cards */
.solution-card-luxury {
    background: #ffffff;
    border: 1.5px solid var(--champagne-gold-border, #e9d6a7);
    border-radius: 20px;
    padding: 28px 24px;
    height: 100%;
    transition: transform 0.3s ease, border-color 0.3s ease, box-shadow 0.3s ease;
    box-shadow: 0 8px 25px rgba(74, 11, 23, 0.05);
    position: relative;
}
.solution-card-luxury:hover {
    transform: translateY(-5px);
    border-color: var(--champagne-gold, #cfa859);
    box-shadow: 0 16px 40px rgba(107, 20, 38, 0.12);
}
.solution-icon-wrap {
    width: 52px;
    height: 52px;
    border-radius: 14px;
    background: linear-gradient(135deg, rgba(207, 168, 89, 0.18) 0%, rgba(107, 20, 38, 0.1) 100%);
    color: var(--royal-burgundy, #6b1426);
    display: grid;
    place-items: center;
    font-size: 24px;
    margin-bottom: 18px;
    border: 1px solid rgba(207, 168, 89, 0.4);
    transition: all 0.3s ease;
}
.solution-card-luxury:hover .solution-icon-wrap {
    background: var(--royal-burgundy, #6b1426);
    color: #ffd875;
    transform: scale(1.08);
}
.solution-num {
    position: absolute;
    top: 20px;
    right: 22px;
    font-family: 'Playfair Display', Georgia, serif;
    font-size: 22px;
    font-weight: 800;
    color: rgba(207, 168, 89, 0.35);
}

/* Why Choose Tiles */
.why-tile {
    background: #ffffff;
    border: 1px solid var(--champagne-gold-border, #e9d6a7);
    border-radius: 14px;
    padding: 18px 20px;
    display: flex;
    align-items: flex-start;
    gap: 14px;
    transition: transform 0.25s ease, border-color 0.25s ease;
}
.why-tile:hover {
    transform: translateY(-3px);
    border-color: var(--champagne-gold, #cfa859);
}
.why-tile i {
    font-size: 22px;
    color: var(--royal-burgundy, #6b1426);
    flex-shrink: 0;
    margin-top: 2px;
}

/* Development Approach Roadmap Steps */
.step-card {
    background: linear-gradient(155deg, #2a060f 0%, #150207 100%);
    border: 1.5px solid rgba(207, 168, 89, 0.35);
    border-radius: 18px;
    padding: 24px 20px;
    color: #ffffff;
    height: 100%;
    position: relative;
    transition: transform 0.3s ease, border-color 0.3s ease, box-shadow 0.3s ease;
}
.step-card:hover {
    transform: translateY(-5px);
    border-color: #ffd875;
    box-shadow: 0 16px 40px rgba(107, 20, 38, 0.4);
}
.step-num-pill {
    display: inline-block;
    font-family: 'Courier New', monospace;
    font-size: 11px;
    font-weight: 800;
    color: #ffd875;
    background: rgba(207, 168, 89, 0.16);
    border: 1px solid rgba(207, 168, 89, 0.4);
    padding: 2px 10px;
    border-radius: 20px;
    margin-bottom: 12px;
}

/* Interactive Team Bio Modal Dialog */
.team-modal-backdrop {
    position: fixed;
    inset: 0;
    z-index: 9999;
    background: rgba(10, 1, 4, 0.82);
    backdrop-filter: blur(10px);
    -webkit-backdrop-filter: blur(10px);
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 20px;
}
.team-modal-backdrop[hidden] {
    display: none !important;
}
.team-modal-card {
    background: #ffffff;
    border: 2px solid var(--champagne-gold, #cfa859);
    border-radius: 24px;
    max-width: 820px;
    width: 100%;
    box-shadow: 0 30px 80px rgba(0, 0, 0, 0.5);
    position: relative;
    overflow: hidden;
    animation: modalPop 0.3s cubic-bezier(0.16, 1, 0.3, 1);
}
@keyframes modalPop {
    from { opacity: 0; transform: scale(0.92) translateY(20px); }
    to { opacity: 1; transform: scale(1) translateY(0); }
}
.team-modal-close {
    position: absolute;
    top: 18px;
    right: 18px;
    width: 38px;
    height: 38px;
    border-radius: 50%;
    background: rgba(107, 20, 38, 0.1);
    border: 1px solid rgba(207, 168, 89, 0.4);
    color: var(--royal-burgundy, #6b1426);
    display: grid;
    place-items: center;
    font-size: 16px;
    cursor: pointer;
    z-index: 10;
    transition: all 0.2s ease;
}
.team-modal-close:hover {
    background: var(--royal-burgundy, #6b1426);
    color: #ffffff;
}
.team-modal-layout {
    display: grid;
    grid-template-columns: 280px 1fr;
}
@media (max-width: 768px) {
    .team-modal-layout {
        grid-template-columns: 1fr;
        max-height: 85vh;
        overflow-y: auto;
    }
}
.team-modal-sidebar {
    background: #fdfaf6;
    border-right: 1px solid var(--line, #ebdcd0);
    padding: 35px 25px;
    text-align: center;
    display: flex;
    flex-direction: column;
    align-items: center;
}
.team-modal-avatar {
    width: 150px;
    height: 150px;
    border-radius: 50%;
    object-fit: cover;
    border: 3px solid var(--champagne-gold, #cfa859);
    box-shadow: 0 10px 25px rgba(107, 20, 38, 0.18);
    margin-bottom: 16px;
}
.team-modal-exp-badge {
    background: var(--royal-burgundy, #6b1426);
    color: #ffd875;
    font-size: 11px;
    font-weight: 800;
    letter-spacing: 0.6px;
    padding: 5px 14px;
    border-radius: 30px;
    margin-bottom: 8px;
}
.team-modal-cred-text {
    font-size: 11.5px;
    color: #6e6462;
    font-weight: 600;
    margin-bottom: 16px;
}
.team-modal-socials {
    display: flex;
    gap: 8px;
    margin-top: auto;
}
.team-modal-body {
    padding: 35px 30px;
}
.team-modal-category {
    font-size: 10.5px;
    font-weight: 800;
    text-transform: uppercase;
    letter-spacing: 1px;
    color: var(--champagne-gold-deep, #9c782b);
    display: block;
    margin-bottom: 4px;
}
.team-modal-name {
    font-family: 'Playfair Display', Georgia, serif;
    font-size: 26px;
    font-weight: 800;
    color: var(--royal-burgundy, #6b1426);
    margin-bottom: 4px;
}
.team-modal-role {
    font-size: 13px;
    font-weight: 700;
    color: #594b47;
    margin-bottom: 16px;
    display: block;
}
.team-modal-desc {
    font-size: 14px;
    color: #4a3b32;
    line-height: 1.7;
    margin-bottom: 20px;
}
.team-modal-section-title {
    font-size: 11.5px;
    font-weight: 800;
    text-transform: uppercase;
    letter-spacing: 0.8px;
    color: var(--royal-burgundy, #6b1426);
    display: block;
    margin-bottom: 8px;
}
.team-modal-tags-list {
    display: flex;
    flex-wrap: wrap;
    gap: 6px;
    margin-bottom: 18px;
}
.team-modal-courses-list {
    display: flex;
    flex-wrap: wrap;
    gap: 6px;
    margin-bottom: 18px;
}
</style>

<!-- =========================================================================
     1. PAGE HERO (MPP Group Signature Hero)
     ========================================================================= -->
<section class="page-hero py-5 text-center position-relative" style="background: linear-gradient(135deg, rgba(20, 3, 8, 0.72) 0%, rgba(74, 11, 23, 0.82) 100%), url('<?= $appBasePath ?>/uploads/photo%20store/13.jpeg') center/cover no-repeat; padding-top: 85px !important; padding-bottom: 75px !important; border-bottom: 2px solid var(--champagne-gold, #cfa859);">
    <div class="container position-relative" style="z-index: 2;">
        <span class="badge rounded-pill mb-2 px-3 py-1" style="background: var(--champagne-gold, #cfa859); color: #2c2523; font-weight: 800; letter-spacing: 2px; font-size: 11px;">
            MPP GROUP &bull; SOFTWARE &bull; WEB DEVELOPMENT
        </span>
        <h1 class="font-serif fw-bold text-white mb-3" style="font-size: clamp(34px, 4vw, 56px);">
            MPP Group
        </h1>
        <p class="lead text-light font-serif fst-italic mb-3" style="max-width: 780px; margin: 0 auto; color: #ebdcd0 !important; font-size: 18px; line-height: 1.65;">
            "Empowering Businesses Through Smart Technology. Developing intelligent, reliable, scalable, and user-friendly software systems that simplify operations and accelerate business growth."
        </p>
        <div class="d-inline-flex align-items-center gap-2 px-3 py-1 rounded-pill" style="background: rgba(255, 255, 255, 0.12); border: 1px solid rgba(207, 168, 89, 0.4); backdrop-filter: blur(8px);">
            <i class="bi bi-award-fill text-warning" style="font-size: 13px;"></i>
            <span style="color: #ffd875; font-size: 11.5px; font-weight: 700; letter-spacing: 0.6px;">
                Official Technology Partner &amp; Web Platform Developer for WoW Studio
            </span>
        </div>
    </div>
</section>

<!-- =========================================================================
     2. CO-FOUNDER & CHIEF TECHNICAL ARCHITECT SPOTLIGHT
     "We Make Simple Technology" — Alok Kumar Jha (Co-Founder, MPP Group)
     ========================================================================= -->
<section class="cofounder-spotlight-section py-5 position-relative" id="coFounderSection" aria-label="MPP Group Co-Founder & Technology Leadership">
    <div class="container py-4">
        <div class="row align-items-center g-5">
            <!-- Left Column: Company Vision, Heading "We Make Simple Technology" & Co-Founder Message -->
            <div class="col-lg-7">
                <div class="pe-lg-3">
                    <span class="badge rounded-pill px-3 py-1 mb-3" style="background: var(--royal-burgundy, #6b1426); color: #ffd875; font-size: 11.5px; letter-spacing: 1.8px; font-weight: 800;">
                        <i class="bi bi-cpu-fill me-1 text-warning"></i> MPP GROUP &bull; LEADERSHIP
                    </span>

                    <h2 class="font-serif fw-bold mb-2" style="color: var(--royal-burgundy, #6b1426); font-size: clamp(32px, 3.4vw, 48px); line-height: 1.15;">
                        We Make Simple Technology
                    </h2>

                    <div class="fw-bold mb-3" style="color: var(--champagne-gold-deep, #9c782b); font-size: 16px; letter-spacing: 0.5px;">
                        Transforming Businesses Through Smart, Reliable &amp; Scalable Digital Systems
                    </div>

                    <p class="lead" style="color: #4a3b32; font-size: 16px; font-weight: 500; line-height: 1.75; margin-bottom: 18px;">
                        <strong>MPP Group</strong> is a technology-driven software development company dedicated to transforming modern businesses through innovative digital solutions. We specialize in developing intelligent, reliable, scalable, and user-friendly software systems that simplify daily operations, improve productivity, and accelerate business growth.
                    </p>

                    <!-- Co-Founder Message Callout from Alok Kumar Jha -->
                    <div class="cofounder-quote-callout mb-4">
                        <div class="quote-symbol">&ldquo;</div>
                        <p class="quote-body font-serif fst-italic mb-2">
                            We believe technology should make businesses smarter, operations easier, and growth faster. Our engineering approach is rooted in simplicity, high-performance architecture, and long-term scalability. Whether architecting enterprise management software or building bespoke interactive web applications like WoW Studio's digital platform, we build technology that delivers measurable business success.
                        </p>
                        <div class="quote-signature">
                            <strong>Alok Kumar Jha</strong> &mdash; <span>Co-Founder &amp; Chief Technical Architect, MPP Group</span>
                        </div>
                    </div>

                    <!-- Highlighted Institutional & Enterprise Software Scope -->
                    <div class="p-3 p-md-4 rounded-3 mb-4" style="background: linear-gradient(135deg, rgba(207, 168, 89, 0.14) 0%, rgba(107, 20, 38, 0.05) 100%); border-left: 4px solid var(--royal-burgundy, #6b1426); border-top: 1px solid rgba(207, 168, 89, 0.35); border-right: 1px solid rgba(207, 168, 89, 0.35); border-bottom: 1px solid rgba(207, 168, 89, 0.35); box-shadow: 0 4px 16px rgba(0, 0, 0, 0.04);">
                        <p class="mb-0" style="color: #2c2523; font-size: 15px; font-weight: 500; line-height: 1.85;">
                            <i class="bi bi-patch-check-fill text-warning me-2" style="font-size: 18px;"></i>From comprehensive <strong>School Management Software</strong>, <strong>Hospital Management ERPs</strong>, <strong>College &amp; University Portals</strong>, to <strong>Computer Training Institutes</strong>, <strong>Coaching Management Systems</strong>, and tailor-made enterprise digital platforms &mdash; <strong>MPP Group</strong> delivers smart, reliable software designed around real-world operational challenges.
                        </p>
                    </div>

                    <!-- Key Solutions Overview (3-Item Micro Grid) -->
                    <div class="row g-3 mb-4">
                        <div class="col-md-4">
                            <div class="cofounder-spec-tile h-100">
                                <div class="spec-icon"><i class="bi bi-hdd-network-fill"></i></div>
                                <h5 class="spec-title">Custom Software ERP</h5>
                                <p class="spec-desc mb-0">Scalable enterprise applications for schools, colleges, hospitals, institutes, and organizations.</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="cofounder-spec-tile h-100">
                                <div class="spec-icon"><i class="bi bi-laptop-fill"></i></div>
                                <h5 class="spec-title">Custom Web Platforms</h5>
                                <p class="spec-desc mb-0">Modern, responsive, high-speed web applications with interactive 60 FPS motion.</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="cofounder-spec-tile h-100">
                                <div class="spec-icon"><i class="bi bi-shield-lock-fill"></i></div>
                                <h5 class="spec-title">Cloud Architecture</h5>
                                <p class="spec-desc mb-0">Zero-trust security, parameterized databases, and sub-second asset delivery pipelines.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Creator Callout Badge -->
                    <div class="p-3 rounded-3 mb-4" style="background: rgba(207, 168, 89, 0.12); border: 1px dashed var(--champagne-gold, #cfa859); font-size: 12.5px; color: #5a4b47;">
                        <i class="bi bi-check2-circle text-success me-1 font-monospace fw-bold" style="font-size: 16px;"></i>
                        MPP Group is the official technology partner that architected and engineered the complete <strong>WoW Studio</strong> web platform.
                    </div>

                    <!-- Skills & Technologies Pills -->
                    <div class="mb-4">
                        <span class="d-block small fw-bold mb-2" style="color: var(--royal-burgundy, #6b1426); letter-spacing: 0.8px;">CORE CAPABILITIES &amp; TECH STACK:</span>
                        <div class="d-flex flex-wrap gap-2">
                            <span class="badge px-3 py-2" style="background: rgba(107, 20, 38, 0.08); color: var(--royal-burgundy, #6b1426); border: 1px solid rgba(207, 168, 89, 0.45); font-size: 11.5px; font-weight: 700;">Enterprise ERP Software</span>
                            <span class="badge px-3 py-2" style="background: rgba(107, 20, 38, 0.08); color: var(--royal-burgundy, #6b1426); border: 1px solid rgba(207, 168, 89, 0.45); font-size: 11.5px; font-weight: 700;">School, College &amp; Hospital Systems</span>
                            <span class="badge px-3 py-2" style="background: rgba(107, 20, 38, 0.08); color: var(--royal-burgundy, #6b1426); border: 1px solid rgba(207, 168, 89, 0.45); font-size: 11.5px; font-weight: 700;">Computer Institute &amp; Coaching ERP</span>
                            <span class="badge px-3 py-2" style="background: rgba(107, 20, 38, 0.08); color: var(--royal-burgundy, #6b1426); border: 1px solid rgba(207, 168, 89, 0.45); font-size: 11.5px; font-weight: 700;">Custom Web Development</span>
                            <span class="badge px-3 py-2" style="background: rgba(107, 20, 38, 0.08); color: var(--royal-burgundy, #6b1426); border: 1px solid rgba(207, 168, 89, 0.45); font-size: 11.5px; font-weight: 700;">PHP &amp; MySQL Relational</span>
                            <span class="badge px-3 py-2" style="background: rgba(107, 20, 38, 0.08); color: var(--royal-burgundy, #6b1426); border: 1px solid rgba(207, 168, 89, 0.45); font-size: 11.5px; font-weight: 700;">Cloud Infrastructure</span>
                        </div>
                    </div>

                    <!-- Direct Contact / Action Buttons -->
                    <div class="d-flex flex-wrap gap-3 align-items-center pt-2">
                        <a href="<?= $appBasePath ?>/contact" class="btn btn-royal px-4 py-2" style="background: var(--royal-burgundy, #6b1426); color: #ffffff; border: 1.5px solid var(--champagne-gold, #cfa859); border-radius: 30px; font-weight: 700; font-size: 13.5px; text-decoration: none; display: inline-flex; align-items: center; gap: 8px; box-shadow: 0 8px 20px rgba(107, 20, 38, 0.25);">
                            <i class="bi bi-chat-dots-fill"></i>
                            <span>Discuss Your Tech Project</span>
                        </a>
                        <a href="#mppSolutionsSection" class="btn btn-gold-outline px-4 py-2" style="border: 1.5px solid var(--champagne-gold, #cfa859); color: var(--royal-burgundy, #6b1426); border-radius: 30px; font-weight: 700; font-size: 13.5px; text-decoration: none; display: inline-flex; align-items: center; gap: 8px;">
                            <span>Explore MPP Group Solutions</span>
                            <i class="bi bi-arrow-down-short"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Right Column: Co-Founder Photo (Alok Kumar Jha) Showcase -->
            <div class="col-lg-5">
                <div class="cofounder-portrait-chassis">
                    <div class="cofounder-portrait-wrapper">
                        <img src="<?= $appBasePath ?>/uploads/team/co_founder.jpg" 
                             alt="Alok Kumar Jha — Co-Founder, MPP Group" 
                             class="cofounder-portrait-image">
                        <div class="cofounder-image-overlay"></div>
                        
                        <!-- Floating Glassmorphic Top Badge -->
                        <div class="cofounder-top-badge">
                            <span class="badge-icon"><i class="bi bi-shield-fill-check"></i></span>
                            <span class="badge-text">Co-Founder &bull; MPP Group</span>
                        </div>

                        <!-- Floating Bottom Role Card -->
                        <div class="cofounder-bottom-kpi-card">
                            <div class="kpi-role-tag">CO-FOUNDER &amp; CHIEF ARCHITECT</div>
                            <h4 class="kpi-name">Alok Kumar Jha</h4>
                            <p class="kpi-desc mb-0">Co-Founder &bull; 12+ Years Enterprise Software &amp; Digital Solutions Leadership</p>
                        </div>
                    </div>

                    <!-- Reference Note -->
                    <div class="text-center mt-2">
                        <small style="color: #6d5e5b; font-size: 11px;">
                            <i class="bi bi-award-fill text-warning me-1"></i> Architect Behind WoW Studio Platform
                        </small>
                    </div>

                    <!-- Executive Connect & Social Toolbar -->
                    <div class="cofounder-social-strip">
                        <a href="https://linkedin.com" target="_blank" rel="noopener" class="cofounder-social-btn" title="LinkedIn Profile">
                            <i class="bi bi-linkedin"></i>
                            <span>LinkedIn</span>
                        </a>
                        <a href="https://github.com" target="_blank" rel="noopener" class="cofounder-social-btn" title="GitHub Repositories">
                            <i class="bi bi-github"></i>
                            <span>GitHub</span>
                        </a>
                        <a href="mailto:hello@mppgroup.in" class="cofounder-social-btn" title="Direct Email">
                            <i class="bi bi-envelope-fill"></i>
                            <span>Email</span>
                        </a>
                        <a href="<?= $appBasePath ?>/contact" class="cofounder-social-btn" title="Discuss Tech Project">
                            <i class="bi bi-chat-dots-fill"></i>
                            <span>Inquire</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- =========================================================================
     3. METRICS & CREDENTIALS KPI STRIP (from mppgroup_custom)
     ========================================================================= -->
<section class="tech-metrics-strip" aria-label="MPP Group Credentials">
    <div class="container">
        <div class="tech-stats-grid">
            <?php foreach ($companyStats as $st): ?>
                <div class="tech-stat-card">
                    <div class="tech-stat-icon-wrap" aria-hidden="true">
                        <i class="bi <?= htmlspecialchars($st['icon']) ?>"></i>
                    </div>
                    <div>
                        <span class="tech-stat-number"><?= htmlspecialchars($st['number']) ?></span>
                        <span class="tech-stat-label"><?= htmlspecialchars($st['label']) ?></span>
                        <span class="tech-stat-sub d-block"><?= htmlspecialchars($st['sub']) ?></span>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- =========================================================================
     4. ABOUT OUR TECHNOLOGY PARTNER (SOURCED FROM docs/companyabout.docs)
     ========================================================================= -->
<section style="background: #ffffff; padding: 85px 0 75px; border-bottom: 1px solid var(--line, #ebdcd0);">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-7">
                <span class="badge rounded-pill px-3 py-1 mb-3" style="background: var(--royal-burgundy, #6b1426); color: #fff; font-size: 11.5px; letter-spacing: 1.5px;">
                    ABOUT OUR TECHNOLOGY PARTNER &bull; MPP GROUP
                </span>
                <h2 class="font-serif fw-bold mb-3" style="color: var(--royal-burgundy, #6b1426); font-size: clamp(28px, 2.6vw, 38px); line-height: 1.22;">
                    Empowering Businesses Through Smart Technology
                </h2>
                <p class="lead" style="color: #4a3b32; font-size: 17px; font-weight: 500; line-height: 1.7;">
                    <strong>MPP Group</strong> is a technology-driven software development company dedicated to transforming businesses through innovative digital solutions. We specialize in developing intelligent, reliable, scalable, and user-friendly software systems that simplify operations, improve productivity, and accelerate business growth.
                </p>
                <p style="color: #4a3b32; font-size: 15px; line-height: 1.75;">
                    From <strong>Schools &amp; Colleges</strong> and <strong>Healthcare &amp; Hospitals</strong> to <strong>Computer Training Institutes</strong>, <strong>Coaching Centers</strong>, and growing modern businesses &mdash; we deliver technology solutions designed to meet real-world challenges. We believe technology should make businesses smarter, operations easier, and growth faster.
                </p>

                <!-- Mission & Vision Cards -->
                <div class="row g-3 mt-3">
                    <div class="col-sm-6">
                        <div class="p-3 rounded-4 h-100" style="background: #fdfaf6; border: 1.5px solid var(--champagne-gold-border, #e9d6a7);">
                            <div class="d-flex align-items-center gap-2 mb-2">
                                <i class="bi bi-compass-fill" style="color: var(--royal-burgundy, #6b1426); font-size: 18px;"></i>
                                <h4 class="font-serif fw-bold mb-0" style="color: var(--royal-burgundy, #6b1426); font-size: 16px;">Our Mission</h4>
                            </div>
                            <p class="text-muted small mb-0" style="line-height: 1.55;">
                                To empower educational institutions, healthcare organizations, and businesses with innovative, affordable, and reliable technology solutions that simplify operations and create opportunities for growth.
                            </p>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="p-3 rounded-4 h-100" style="background: #fdfaf6; border: 1.5px solid var(--champagne-gold-border, #e9d6a7);">
                            <div class="d-flex align-items-center gap-2 mb-2">
                                <i class="bi bi-eye-fill" style="color: var(--royal-burgundy, #6b1426); font-size: 18px;"></i>
                                <h4 class="font-serif fw-bold mb-0" style="color: var(--royal-burgundy, #6b1426); font-size: 16px;">Our Vision</h4>
                            </div>
                            <p class="text-muted small mb-0" style="line-height: 1.55;">
                                To become a trusted technology partner by delivering smart digital solutions, continuous innovation, and exceptional customer experiences while contributing to a digitally empowered future.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Overview Card (WHO WE ARE & COMMITMENT) -->
            <div class="col-lg-5">
                <div class="p-4 p-md-5 rounded-4" style="background: linear-gradient(145deg, #2a060f 0%, #150207 100%); color: #ffffff; border: 1.5px solid var(--champagne-gold, #cfa859); box-shadow: 0 20px 50px rgba(107, 20, 38, 0.25);">
                    <span class="d-block text-uppercase fw-bold mb-2" style="color: #ffd875; font-size: 11px; letter-spacing: 1.8px;">
                        WHO WE ARE &bull; DIGITAL TRANSFORMATION
                    </span>
                    <h3 class="font-serif fw-bold text-white mb-3" style="font-size: 22px;">
                        Your Technology Partner for Digital Growth
                    </h3>
                    <p class="mb-3" style="color: rgba(255, 255, 255, 0.82); font-size: 14px; line-height: 1.7;">
                        At <strong>MPP Group</strong>, we combine technology, creativity, and industry knowledge to build solutions that make a difference. We develop customized software and websites that help organizations manage daily operations, improve efficiency, and embrace digital transformation.
                    </p>
                    <p class="mb-4" style="color: rgba(255, 255, 255, 0.82); font-size: 14px; line-height: 1.7;">
                        Our focus is not just on developing software but on creating long-term technology solutions that grow with your business.
                    </p>
                    <div class="pt-3 border-top" style="border-color: rgba(207, 168, 89, 0.35) !important;">
                        <span class="d-block mb-1 small fw-bold" style="color: #ffd875;">TECHNOLOGY PILLARS:</span>
                        <div class="d-flex gap-2 flex-wrap">
                            <span class="badge px-3 py-2" style="background: rgba(207, 168, 89, 0.2); color: #ffd875; border: 1px solid rgba(207, 168, 89, 0.4); font-size: 11px;">Custom ERPs</span>
                            <span class="badge px-3 py-2" style="background: rgba(207, 168, 89, 0.2); color: #ffd875; border: 1px solid rgba(207, 168, 89, 0.4); font-size: 11px;">Web Platforms</span>
                            <span class="badge px-3 py-2" style="background: rgba(207, 168, 89, 0.2); color: #ffd875; border: 1px solid rgba(207, 168, 89, 0.4); font-size: 11px;">GSAP Motion</span>
                            <span class="badge px-3 py-2" style="background: rgba(207, 168, 89, 0.2); color: #ffd875; border: 1px solid rgba(207, 168, 89, 0.4); font-size: 11px;">Cloud Reliability</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- =========================================================================
     5. WHAT WE DO — COMPLETE SOFTWARE & DIGITAL SOLUTIONS (FROM DOCS)
     ========================================================================= -->
<section id="mppSolutionsSection" style="background: #faf6f0; padding: 85px 0; border-bottom: 1px solid var(--line, #ebdcd0);">
    <div class="container">
        <div class="text-center mb-5">
            <span class="badge rounded-pill px-4 py-2 mb-3" style="background: var(--royal-burgundy, #6b1426); color: #fff; font-size: 12px; letter-spacing: 1.5px;">
                WHAT WE DO &bull; COMPLETE SOLUTIONS
            </span>
            <h2 class="font-serif fw-bold" style="color: var(--royal-burgundy, #6b1426);">
                Complete Software &amp; Digital Development Solutions
            </h2>
            <p class="text-muted mx-auto mt-2" style="max-width: 650px; font-size: 15.5px;">
                Intelligent, scalable, and user-friendly software systems built by MPP Group to meet real-world institutional and business challenges.
            </p>
        </div>

        <div class="row g-4">
            <?php foreach ($mppSolutions as $sol): ?>
                <div class="col-lg-4 col-md-6">
                    <div class="solution-card-luxury">
                        <span class="solution-num"><?= htmlspecialchars($sol['num']) ?></span>
                        <div class="solution-icon-wrap">
                            <i class="bi <?= htmlspecialchars($sol['icon']) ?>"></i>
                        </div>
                        <h3 class="font-serif fw-bold mb-2" style="color: var(--royal-burgundy, #6b1426); font-size: 19px;">
                            <?= htmlspecialchars($sol['title']) ?>
                        </h3>
                        <p class="text-muted small mb-0" style="line-height: 1.65; font-size: 13.5px;">
                            <?= htmlspecialchars($sol['desc']) ?>
                        </p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- =========================================================================
     6. WHY CHOOSE MPP GROUP? (FROM DOCS)
     ========================================================================= -->
<section style="background: #ffffff; padding: 80px 0; border-bottom: 1px solid var(--line, #ebdcd0);">
    <div class="container">
        <div class="text-center mb-5">
            <span class="badge rounded-pill px-4 py-2 mb-3" style="background: var(--champagne-gold, #cfa859); color: #2c2523; font-weight: 700; font-size: 12px; letter-spacing: 1.5px;">
                ENTERPRISE ADVANTAGE &bull; MPP GROUP
            </span>
            <h2 class="font-serif fw-bold" style="color: var(--royal-burgundy, #6b1426);">
                Why Choose MPP Group?
            </h2>
            <p class="text-muted mx-auto mt-2" style="max-width: 600px; font-size: 15.5px;">
                We turn ideas into practical digital solutions that help organizations work smarter and grow confidently.
            </p>
        </div>

        <div class="row g-3 justify-content-center">
            <?php foreach ($whyChooseMpp as $wc): ?>
                <div class="col-lg-4 col-md-6">
                    <div class="why-tile h-100">
                        <i class="bi <?= htmlspecialchars($wc['icon']) ?>"></i>
                        <div>
                            <h4 class="fw-bold mb-1" style="font-size: 15px; color: var(--royal-burgundy, #6b1426);"><?= htmlspecialchars($wc['title']) ?></h4>
                            <p class="text-muted small mb-0" style="font-size: 12.5px; line-height: 1.55;"><?= htmlspecialchars($wc['desc']) ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- =========================================================================
     7. THE IT TEAM DIRECTORY (STRICT 4-CARDS / ROW — MPPGROUP_CUSTOM CARD DESIGN)
     ========================================================================= -->
<section class="section" style="background-color: var(--paper-bg, #faf6f0); padding: 85px 0 95px; border-bottom: 1px solid var(--line, #ebdcd0);">
    <div class="container">
        
        <!-- Section Header -->
        <div class="text-center mb-5">
            <span class="badge rounded-pill px-4 py-2 mb-3" style="background: var(--royal-burgundy, #6b1426); color: #fff; font-size: 12px; letter-spacing: 1.5px;">
                <i class="bi bi-people-fill me-1"></i> THE DEVELOPMENT CREW &bull; MPP GROUP
            </span>
            <h2 class="font-serif fw-bold" style="color: var(--royal-burgundy, #6b1426);">
                Engineering Minds Behind The Platform
            </h2>
            <p class="text-muted mx-auto mt-2" style="max-width: 650px; font-size: 15.5px;">
                Meet our dedicated software engineers, architects, and motion designers who craft flawless digital solutions with modern technology.
            </p>
        </div>

        <!-- Strict 4-Cards Per Row Responsive Grid (from mppgroup_custom/team) -->
        <div class="team-cards-grid-4">
            <?php foreach ($techMembers as $m): ?>
                <article class="team-card-modern">
                    
                    <!-- Top Image Media Frame -->
                    <div class="team-card-media">
                        <img 
                            src="<?= htmlspecialchars($appBasePath) ?>/<?= htmlspecialchars($m['image']) ?>" 
                            alt="<?= htmlspecialchars($m['name']) ?>"
                            class="team-card-img"
                            loading="lazy"
                        >

                        <!-- Floating Left Experience Badge -->
                        <div class="team-card-badge-left">
                            <i class="bi bi-briefcase-fill" aria-hidden="true"></i>
                            <span><?= htmlspecialchars($m['experience']) ?></span>
                        </div>

                        <!-- Floating Right Department Badge -->
                        <div class="team-card-badge-right">
                            <?= htmlspecialchars($m['department']) ?>
                        </div>

                        <!-- Quick View Button Overlay on Hover -->
                        <div class="team-card-quick-overlay">
                            <button 
                                type="button" 
                                class="team-btn-quickview"
                                data-open-team-modal
                                data-member-name="<?= htmlspecialchars($m['name']) ?>"
                                data-member-role="<?= htmlspecialchars($m['designation']) ?>"
                                data-member-category="<?= htmlspecialchars($m['department']) ?>"
                                data-member-image="<?= htmlspecialchars($appBasePath) ?>/<?= htmlspecialchars($m['image']) ?>"
                                data-member-exp="<?= htmlspecialchars($m['experience']) ?>"
                                data-member-cred="<?= htmlspecialchars($m['credential']) ?>"
                                data-member-bio="<?= htmlspecialchars($m['detailed_bio'] ?? $m['bio']) ?>"
                                data-member-tags='<?= json_encode($m['tags'] ?? [], JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP) ?>'
                                data-member-courses='<?= json_encode($m['projects_led'] ?? [], JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP) ?>'
                                data-member-linkedin="<?= htmlspecialchars($m['social']['linkedin'] ?? '') ?>"
                                data-member-github="<?= htmlspecialchars($m['social']['github'] ?? '') ?>"
                                data-member-twitter="<?= htmlspecialchars($m['social']['twitter'] ?? '') ?>"
                                data-member-portfolio="<?= htmlspecialchars($m['social']['portfolio'] ?? '') ?>"
                            >
                                <i class="bi bi-person-badge" aria-hidden="true"></i>
                                <span>Quick View Bio</span>
                            </button>
                        </div>
                    </div>

                    <!-- Card Body Content -->
                    <div class="team-card-body">
                        
                        <!-- Tech Credential Tag -->
                        <span class="team-card-cred-pill">
                            <?= htmlspecialchars($m['credential']) ?>
                        </span>

                        <h3 class="team-card-name"><?= htmlspecialchars($m['name']) ?></h3>
                        <div class="team-card-role"><?= htmlspecialchars($m['designation']) ?></div>
                        <p class="team-card-bio"><?= htmlspecialchars($m['bio']) ?></p>

                        <!-- Skill / Stack Tags -->
                        <div class="team-card-tags">
                            <?php foreach ($m['tags'] as $t): ?>
                                <span class="team-tag-pill"><?= htmlspecialchars($t) ?></span>
                            <?php endforeach; ?>
                        </div>

                        <!-- Card Bottom Footer with Profile & Social Icons -->
                        <div class="team-card-footer">
                            <button 
                                type="button" 
                                class="team-btn-profile"
                                data-open-team-modal
                                data-member-name="<?= htmlspecialchars($m['name']) ?>"
                                data-member-role="<?= htmlspecialchars($m['designation']) ?>"
                                data-member-category="<?= htmlspecialchars($m['department']) ?>"
                                data-member-image="<?= htmlspecialchars($appBasePath) ?>/<?= htmlspecialchars($m['image']) ?>"
                                data-member-exp="<?= htmlspecialchars($m['experience']) ?>"
                                data-member-cred="<?= htmlspecialchars($m['credential']) ?>"
                                data-member-bio="<?= htmlspecialchars($m['detailed_bio'] ?? $m['bio']) ?>"
                                data-member-tags='<?= json_encode($m['tags'] ?? [], JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP) ?>'
                                data-member-courses='<?= json_encode($m['projects_led'] ?? [], JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP) ?>'
                                data-member-linkedin="<?= htmlspecialchars($m['social']['linkedin'] ?? '') ?>"
                                data-member-github="<?= htmlspecialchars($m['social']['github'] ?? '') ?>"
                                data-member-twitter="<?= htmlspecialchars($m['social']['twitter'] ?? '') ?>"
                                data-member-portfolio="<?= htmlspecialchars($m['social']['portfolio'] ?? '') ?>"
                                aria-label="View credentials of <?= htmlspecialchars($m['name']) ?>"
                            >
                                <span>Full Profile</span>
                                <i class="bi bi-arrow-right" aria-hidden="true"></i>
                            </button>

                            <!-- Social Media Icons Bar -->
                            <div class="team-card-socials">
                                <?php if (!empty($m['social']['linkedin'])): ?>
                                    <a href="<?= htmlspecialchars($m['social']['linkedin']) ?>" target="_blank" rel="noopener noreferrer" class="team-social-btn" aria-label="LinkedIn Profile">
                                        <i class="bi bi-linkedin"></i>
                                    </a>
                                <?php endif; ?>
                                <?php if (!empty($m['social']['github'])): ?>
                                    <a href="<?= htmlspecialchars($m['social']['github']) ?>" target="_blank" rel="noopener noreferrer" class="team-social-btn" aria-label="GitHub Profile">
                                        <i class="bi bi-github"></i>
                                    </a>
                                <?php endif; ?>
                                <?php if (!empty($m['social']['twitter'])): ?>
                                    <a href="<?= htmlspecialchars($m['social']['twitter']) ?>" target="_blank" rel="noopener noreferrer" class="team-social-btn" aria-label="Twitter Profile">
                                        <i class="bi bi-twitter-x"></i>
                                    </a>
                                <?php endif; ?>
                                <?php if (!empty($m['social']['portfolio'])): ?>
                                    <a href="<?= htmlspecialchars($m['social']['portfolio']) ?>" target="_blank" rel="noopener noreferrer" class="team-social-btn" aria-label="Website / Email">
                                        <i class="bi bi-globe2"></i>
                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>

                    </div>

                </article>
            <?php endforeach; ?>
        </div>

    </div>
</section>

<!-- =========================================================================
     7. OUR DEVELOPMENT APPROACH (FROM DOCS: FROM IDEAS TO DIGITAL EXCELLENCE)
     ========================================================================= -->
<section style="background: radial-gradient(circle at 50% 20%, #190208 0%, #090104 75%); padding: 85px 0; border-top: 1px solid rgba(207, 168, 89, 0.35); border-bottom: 2px solid var(--champagne-gold, #cfa859);">
    <div class="container">
        <div class="text-center mb-5">
            <p class="eyebrow" style="color: #ffd875 !important; letter-spacing: 2px; margin-bottom: 10px;">
                DEVELOPMENT APPROACH &bull; MPP GROUP
            </p>
            <h2 class="font-serif fw-bold text-white mb-2">
                From Ideas to Digital Excellence
            </h2>
            <p class="mx-auto mb-0" style="color: rgba(245, 237, 228, 0.8); max-width: 620px; font-size: 15.5px;">
                Our systematic 6-stage engineering process ensuring reliability, security, and exceptional performance for every project.
            </p>
        </div>

        <div class="row g-4">
            <?php foreach ($devApproach as $st): ?>
                <div class="col-lg-4 col-md-6">
                    <div class="step-card">
                        <span class="step-num-pill">STAGE <?= htmlspecialchars($st['step']) ?></span>
                        <h3 class="font-serif fw-bold text-white mb-2" style="font-size: 18px;">
                            <?= htmlspecialchars($st['title']) ?>
                        </h3>
                        <p class="mb-0" style="font-size: 13.5px; line-height: 1.6; color: rgba(255, 255, 255, 0.78);">
                            <?= htmlspecialchars($st['desc']) ?>
                        </p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <!-- Collaboration CTA Banner (FROM DOCS: LET'S BUILD YOUR DIGITAL FUTURE) -->
        <div class="mt-5 p-4 p-md-5 rounded-4 d-flex justify-content-between align-items-center flex-wrap gap-4" style="background: linear-gradient(135deg, rgba(107, 20, 38, 0.9) 0%, rgba(59, 6, 16, 0.95) 100%); border: 1.5px solid var(--champagne-gold, #cfa859); box-shadow: 0 20px 50px rgba(0, 0, 0, 0.45);">
            <div>
                <span class="badge rounded-pill mb-2 px-3 py-1" style="background: #ffd875; color: #210409; font-weight: 800; font-size: 11px;">
                    MPP GROUP &bull; TRUSTED SOFTWARE PARTNER
                </span>
                <h3 class="font-serif fw-bold text-white mb-1">Let's Build Your Digital Future Together</h3>
                <p class="mb-1" style="color: #ebdcd0; font-size: 14.5px;">
                    Have an idea, a business challenge, or a software project in mind? Let's work together to transform your vision into a powerful digital solution.
                </p>
                <small style="color: rgba(235, 220, 208, 0.7); font-size: 11px;">
                    <i class="bi bi-award-fill text-warning me-1"></i> Proud technology creator &amp; developer of the WoW Studio web platform.
                </small>
            </div>
            <div class="d-flex gap-3 flex-wrap">
                <a href="<?= $appBasePath ?>/contact" class="button" style="background: var(--champagne-gold, #cfa859) !important; color: #210409 !important; border-color: var(--champagne-gold, #cfa859) !important; border-radius: 30px !important; padding: 0 28px;">
                    <i class="bi bi-chat-dots-fill me-2"></i> Discuss Your Project
                </a>
                <a href="#mppSolutionsSection" class="btn-gold-outline text-white border-white">
                    <i class="bi bi-grid-fill me-1"></i> Explore Our Solutions
                </a>
            </div>
        </div>
    </div>
</section>

<!-- =========================================================================
     8. INTERACTIVE MEMBER BIO MODAL DIALOG (Adapted from mppgroup_custom)
     ========================================================================= -->
<div id="techTeamModal" class="team-modal-backdrop" hidden role="dialog" aria-modal="true" aria-labelledby="modalMemberName">
    <div class="team-modal-card">
        
        <button type="button" id="btnCloseTeamModal" class="team-modal-close" aria-label="Close Profile Dialog">
            <i class="bi bi-x-lg"></i>
        </button>

        <div class="team-modal-layout">
            
            <!-- Left Profile Frame -->
            <div class="team-modal-sidebar">
                <img id="modalMemberImg" src="" alt="Team Member" class="team-modal-avatar">
                <span id="modalMemberExp" class="team-modal-exp-badge"></span>
                <span id="modalMemberCred" class="team-modal-cred-text"></span>
                <div class="team-modal-socials" id="modalMemberSocials">
                    <!-- Populated dynamically -->
                </div>
            </div>

            <!-- Right Biography Details -->
            <div class="team-modal-body">
                <span id="modalMemberCategory" class="team-modal-category"></span>
                <h3 id="modalMemberName" class="team-modal-name"></h3>
                <span id="modalMemberRole" class="team-modal-role"></span>
                
                <p id="modalMemberBio" class="team-modal-desc"></p>

                <!-- Key Projects Led -->
                <span class="team-modal-section-title">Key Projects &amp; Systems Led:</span>
                <div id="modalMemberCourses" class="team-modal-courses-list"></div>

                <!-- Skill & Framework Tags -->
                <span class="team-modal-section-title">Core Technologies &amp; Skills:</span>
                <div id="modalMemberTags" class="team-modal-tags-list"></div>
            </div>

        </div>

    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const modal = document.getElementById('techTeamModal');
    const closeBtn = document.getElementById('btnCloseTeamModal');
    const triggers = document.querySelectorAll('[data-open-team-modal]');

    function openModal(btn) {
        if (!modal) return;
        
        const name = btn.getAttribute('data-member-name') || '';
        const role = btn.getAttribute('data-member-role') || '';
        const cat = btn.getAttribute('data-member-category') || '';
        const img = btn.getAttribute('data-member-image') || '';
        const exp = btn.getAttribute('data-member-exp') || '';
        const cred = btn.getAttribute('data-member-cred') || '';
        const bio = btn.getAttribute('data-member-bio') || '';
        
        let tags = [];
        let courses = [];
        try { tags = JSON.parse(btn.getAttribute('data-member-tags') || '[]'); } catch(e){}
        try { courses = JSON.parse(btn.getAttribute('data-member-courses') || '[]'); } catch(e){}

        const linkedin = btn.getAttribute('data-member-linkedin') || '';
        const github = btn.getAttribute('data-member-github') || '';
        const twitter = btn.getAttribute('data-member-twitter') || '';
        const portfolio = btn.getAttribute('data-member-portfolio') || '';

        document.getElementById('modalMemberName').textContent = name;
        document.getElementById('modalMemberRole').textContent = role;
        document.getElementById('modalMemberCategory').textContent = cat;
        document.getElementById('modalMemberImg').src = img;
        document.getElementById('modalMemberImg').alt = name;
        document.getElementById('modalMemberExp').textContent = exp;
        document.getElementById('modalMemberCred').textContent = cred;
        document.getElementById('modalMemberBio').textContent = bio;

        // Tags
        const tagsContainer = document.getElementById('modalMemberTags');
        tagsContainer.innerHTML = '';
        tags.forEach(t => {
            const span = document.createElement('span');
            span.className = 'team-tag-pill';
            span.textContent = t;
            tagsContainer.appendChild(span);
        });

        // Courses / Projects
        const coursesContainer = document.getElementById('modalMemberCourses');
        coursesContainer.innerHTML = '';
        courses.forEach(c => {
            const span = document.createElement('span');
            span.className = 'badge bg-white text-dark border px-2 py-1';
            span.style.fontSize = '11px';
            span.textContent = c;
            coursesContainer.appendChild(span);
        });

        // Socials
        const socialsContainer = document.getElementById('modalMemberSocials');
        socialsContainer.innerHTML = '';
        if (linkedin) {
            socialsContainer.innerHTML += `<a href="${linkedin}" target="_blank" rel="noopener noreferrer" class="team-social-btn" aria-label="LinkedIn"><i class="bi bi-linkedin"></i></a>`;
        }
        if (github) {
            socialsContainer.innerHTML += `<a href="${github}" target="_blank" rel="noopener noreferrer" class="team-social-btn" aria-label="GitHub"><i class="bi bi-github"></i></a>`;
        }
        if (twitter) {
            socialsContainer.innerHTML += `<a href="${twitter}" target="_blank" rel="noopener noreferrer" class="team-social-btn" aria-label="Twitter"><i class="bi bi-twitter-x"></i></a>`;
        }
        if (portfolio) {
            socialsContainer.innerHTML += `<a href="${portfolio}" target="_blank" rel="noopener noreferrer" class="team-social-btn" aria-label="Website"><i class="bi bi-globe2"></i></a>`;
        }

        modal.removeAttribute('hidden');
        document.body.style.overflow = 'hidden';
    }

    function closeModal() {
        if (!modal) return;
        modal.setAttribute('hidden', '');
        document.body.style.overflow = '';
    }

    triggers.forEach(trigger => {
        trigger.addEventListener('click', function(e) {
            e.preventDefault();
            openModal(this);
        });
    });

    if (closeBtn) {
        closeBtn.addEventListener('click', closeModal);
    }

    if (modal) {
        modal.addEventListener('click', function(e) {
            if (e.target === modal) {
                closeModal();
            }
        });
    }

    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && modal && !modal.hasAttribute('hidden')) {
            closeModal();
        }
    });
});
</script>
