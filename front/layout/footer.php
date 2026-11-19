<?php
declare(strict_types=1);
?>
<!-- Footer -->
<footer class="wedding-footer">
    <div class="container text-center">
        <h2 class="font-cursive text-white mb-2" style="font-size: 3rem;">
            <?= htmlspecialchars($wedding['groom_name']) ?> <span style="color: var(--champagne-gold);">&amp;</span> <?= htmlspecialchars($wedding['bride_name']) ?>
        </h2>
        <p class="mb-4 text-white-50" style="max-width: 550px; margin: 0 auto;">
            Thank you for being part of our story, sharing in our laughter, and blessing us as we celebrate our new beginnings.
        </p>

        <div class="d-flex justify-content-center gap-4 mb-4 fs-5">
            <a href="tel:<?= htmlspecialchars($wedding['contact_phone']) ?>" title="Call Us"><i class="bi bi-telephone-fill"></i> <?= htmlspecialchars($wedding['contact_phone']) ?></a>
            <span class="text-white-50">&bull;</span>
            <a href="mailto:<?= htmlspecialchars($wedding['contact_email']) ?>" title="Email"><i class="bi bi-envelope-fill"></i> <?= htmlspecialchars($wedding['contact_email']) ?></a>
        </div>

        <hr style="border-color: rgba(207, 168, 89, 0.3); margin: 30px auto; max-width: 600px;">

        <div class="d-flex justify-content-between align-items-center flex-column flex-md-row small text-white-50">
            <div>
                &copy; <?= date('Y') ?> <?= htmlspecialchars($wedding['groom_name']) ?> &amp; <?= htmlspecialchars($wedding['bride_name']) ?> Wedding Celebrations.
            </div>
            <div class="mt-2 mt-md-0">
                <a href="<?= $appBasePath ?>/admin/login.php" class="text-white-50 text-decoration-none">
                    <i class="bi bi-shield-lock me-1"></i> Admin Portal
                </a>
            </div>
        </div>
    </div>
</footer>

<!-- Bootstrap Bundle JS -->
<script src="<?= $appBasePath ?>/front/assets/vendor/bootstrap/bootstrap.bundle.min.js"></script>

<!-- Live Wedding Countdown Timer Script -->
<script>
(function() {
    const targetDateStr = "<?= htmlspecialchars($wedding['wedding_date']) ?>";
    const targetDate = new Date(targetDateStr.replace(' ', 'T')).getTime();

    function updateCountdown() {
        const now = new Date().getTime();
        const difference = targetDate - now;

        const daysEl = document.getElementById('countDays');
        const hoursEl = document.getElementById('countHours');
        const minutesEl = document.getElementById('countMinutes');
        const secondsEl = document.getElementById('countSeconds');

        if (!daysEl || !hoursEl || !minutesEl || !secondsEl) return;

        if (difference < 0) {
            daysEl.innerText = "00";
            hoursEl.innerText = "00";
            minutesEl.innerText = "00";
            secondsEl.innerText = "00";
            const heading = document.getElementById('countdownHeading');
            if (heading) heading.innerText = "Happily Ever After!";
            return;
        }

        const days = Math.floor(difference / (1000 * 60 * 60 * 24));
        const hours = Math.floor((difference % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        const minutes = Math.floor((difference % (1000 * 60 * 60)) / (1000 * 60));
        const seconds = Math.floor((difference % (1000 * 60)) / 1000);

        daysEl.innerText = days < 10 ? '0' + days : days;
        hoursEl.innerText = hours < 10 ? '0' + hours : hours;
        minutesEl.innerText = minutes < 10 ? '0' + minutes : minutes;
        secondsEl.innerText = seconds < 10 ? '0' + seconds : seconds;
    }

    updateCountdown();
    setInterval(updateCountdown, 1000);
})();
</script>
</body>
</html>
