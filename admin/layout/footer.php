<?php
declare(strict_types=1);
?>
        </main>
        <!-- Footer -->
        <footer class="py-3 px-4 bg-white border-top text-center text-muted small mt-auto">
            &copy; <?= date('Y') ?> Wedding Portal &bull; All Rights Reserved.
        </footer>
    </div>
</div>

<script src="../front/assets/vendor/bootstrap/bootstrap.bundle.min.js"></script>
<script>
document.getElementById('sidebarToggle')?.addEventListener('click', function() {
    document.getElementById('adminSidebar')?.classList.toggle('show');
});
</script>
</body>
</html>
