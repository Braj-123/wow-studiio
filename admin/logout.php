<?php
declare(strict_types=1);

session_start();
unset($_SESSION['wedding_admin']);
session_destroy();

header('Location: login.php');
exit;
