<?php
declare(strict_types=1);

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once __DIR__ . '/../config/db.php';

// If already logged in, redirect to admin dashboard
if (!empty($_SESSION['wedding_admin'])) {
    header('Location: index.php');
    exit;
}

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $identity = trim((string)($_POST['identity'] ?? ''));
    $password = (string)($_POST['password'] ?? '');

    if ($identity === '' || $password === '') {
        $error = 'Please enter both username/email and password.';
    } else {
        $db = \Config\Database::connect();
        $stmt = $db->prepare("SELECT * FROM admins WHERE username = ? OR email = ? LIMIT 1");
        $stmt->execute([$identity, $identity]);
        $admin = $stmt->fetch();

        // Accept default credentials or verify password
        if ($admin && ($password === 'Admin@123' || password_verify($password, $admin['password']))) {
            $_SESSION['wedding_admin'] = [
                'id' => $admin['id'],
                'username' => $admin['username'],
                'name' => $admin['name'],
                'email' => $admin['email'],
            ];
            header('Location: index.php');
            exit;
        } else {
            $error = 'Invalid credentials. Default: admin / Admin@123';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WoW Studio &bull; Admin Sign In</title>
    <!-- Google Fonts & Bootstrap -->
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700&family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../front/assets/vendor/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="../front/assets/vendor/bootstrap-icons/bootstrap-icons.min.css">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #2b0e16, #4a1321, #1d090f);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0;
            padding: 20px;
        }
        .login-card {
            background: #ffffff;
            border-radius: 20px;
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.4);
            max-width: 440px;
            width: 100%;
            padding: 40px 35px;
            border-top: 5px solid #d4af37;
        }
        .login-title {
            font-family: 'Playfair Display', serif;
            color: #6b1426;
            font-weight: 700;
        }
        .btn-royal {
            background: linear-gradient(135deg, #6b1426, #8f2239);
            color: #ffffff;
            border: none;
            padding: 12px;
            border-radius: 10px;
            font-weight: 600;
            transition: all 0.3s;
        }
        .btn-royal:hover {
            background: #540f1d;
            color: #ffffff;
            transform: translateY(-1px);
        }
        .form-control {
            border-radius: 10px;
            padding: 12px 14px;
        }
        .form-control:focus {
            border-color: #d4af37;
            box-shadow: 0 0 0 3px rgba(212, 175, 55, 0.2);
        }
    </style>
</head>
<body>

<div class="login-card text-center">
    <div class="mb-3 d-inline-flex align-items-center justify-content-center rounded-circle" style="width: 70px; height: 70px; background: rgba(107, 20, 38, 0.1); color: #6b1426;">
        <i class="bi bi-shield-lock-fill fs-2"></i>
    </div>

    <h2 class="login-title mb-1">WoW Studio</h2>
    <p class="text-muted small mb-4">Sign in to manage portfolio shoots, booking inquiries, &amp; services</p>

    <?php if ($error): ?>
        <div class="alert alert-danger py-2 small rounded-3 mb-4 text-start">
            <i class="bi bi-exclamation-circle-fill me-1"></i> <?= htmlspecialchars($error) ?>
        </div>
    <?php endif; ?>

    <form method="POST" action="" class="text-start">
        <div class="mb-3">
            <label class="form-label small fw-semibold">Username or Email</label>
            <div class="input-group">
                <span class="input-group-text bg-light border-end-0"><i class="bi bi-person text-muted"></i></span>
                <input type="text" name="identity" class="form-control border-start-0" required placeholder="admin or email" value="admin">
            </div>
        </div>

        <div class="mb-4">
            <label class="form-label small fw-semibold">Password</label>
            <div class="input-group">
                <span class="input-group-text bg-light border-end-0"><i class="bi bi-key text-muted"></i></span>
                <input type="password" name="password" class="form-control border-start-0" required placeholder="Password" value="Admin@123">
            </div>
            <div class="d-flex justify-content-between align-items-center mt-2 small">
                <span class="text-muted">Default: <code>Admin@123</code></span>
            </div>
        </div>

        <button type="submit" class="btn btn-royal w-100 mb-3">
            <i class="bi bi-box-arrow-in-right me-1"></i> Enter Admin Panel
        </button>
    </form>

    <div class="pt-3 border-top text-center">
        <a href="../" class="text-muted small text-decoration-none">
            <i class="bi bi-arrow-left me-1"></i> Back to Public Wedding Website
        </a>
    </div>
</div>

</body>
</html>
