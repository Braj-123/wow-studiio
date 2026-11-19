<?php
declare(strict_types=1);

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (empty($_SESSION['wedding_admin'])) {
    header('Location: login.php');
    exit;
}

$adminUser = $_SESSION['wedding_admin'];
$module = $module ?? 'dashboard';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($pageTitle ?? 'Admin Dashboard') ?> &bull; Wedding Manager</title>

    <!-- Google Fonts & Bootstrap -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../front/assets/vendor/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="../front/assets/vendor/bootstrap-icons/bootstrap-icons.min.css">

    <style>
        :root {
            --sidebar-width: 260px;
            --brand-dark: #3b0d18;
            --brand-accent: #8b1c36;
            --brand-gold: #cfa859;
            --bg-light: #f8fafc;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--bg-light);
            color: #334155;
            min-height: 100vh;
        }

        /* Sidebar Styling */
        .admin-sidebar {
            width: var(--sidebar-width);
            background: linear-gradient(180deg, var(--brand-dark), #26070f);
            color: #ffffff;
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            z-index: 1000;
            overflow-y: auto;
            box-shadow: 4px 0 20px rgba(0, 0, 0, 0.1);
        }

        .sidebar-brand {
            padding: 24px 20px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            display: flex;
            align-items: center;
            gap: 12px;
            color: #ffffff;
            text-decoration: none;
        }

        .sidebar-brand i {
            color: var(--brand-gold);
            font-size: 1.8rem;
        }

        .sidebar-menu {
            padding: 15px 0;
            list-style: none;
            margin: 0;
        }

        .sidebar-menu-header {
            padding: 10px 24px 4px;
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            color: rgba(255, 255, 255, 0.4);
            font-weight: 600;
        }

        .sidebar-item a {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 24px;
            color: rgba(255, 255, 255, 0.75);
            text-decoration: none;
            font-size: 0.9rem;
            font-weight: 500;
            transition: all 0.2s ease;
        }

        .sidebar-item a:hover {
            color: #ffffff;
            background: rgba(255, 255, 255, 0.08);
            border-left: 4px solid var(--brand-gold);
        }

        .sidebar-item.active a {
            color: #ffffff;
            background: rgba(207, 168, 89, 0.15);
            border-left: 4px solid var(--brand-gold);
            font-weight: 600;
        }

        .sidebar-item a i {
            font-size: 1.15rem;
            width: 20px;
            text-align: center;
        }

        /* Main Content */
        .admin-main {
            margin-left: var(--sidebar-width);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .admin-topbar {
            height: 70px;
            background: #ffffff;
            border-bottom: 1px solid #e2e8f0;
            padding: 0 30px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: sticky;
            top: 0;
            z-index: 999;
        }

        .admin-content {
            padding: 30px;
            flex: 1;
        }

        .stat-card {
            background: #ffffff;
            border-radius: 16px;
            padding: 24px;
            border: 1px solid #e2e8f0;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.02);
            transition: transform 0.2s;
        }

        .stat-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.06);
        }

        .table-card {
            background: #ffffff;
            border-radius: 16px;
            border: 1px solid #e2e8f0;
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.02);
        }

        .btn-brand {
            background: var(--brand-accent);
            color: #ffffff;
            border: none;
            padding: 8px 18px;
            border-radius: 8px;
            font-weight: 500;
            transition: all 0.2s;
        }

        .btn-brand:hover {
            background: #6a1327;
            color: #ffffff;
        }

        @media (max-width: 991.98px) {
            .admin-sidebar {
                margin-left: calc(-1 * var(--sidebar-width));
                transition: margin 0.3s ease;
            }
            .admin-sidebar.show {
                margin-left: 0;
            }
            .admin-main {
                margin-left: 0;
            }
        }
    </style>
</head>
<body>

<div class="d-flex">
    <!-- Sidebar -->
    <?php require_once __DIR__ . '/sidebar.php'; ?>

    <!-- Main Wrapper -->
    <div class="admin-main">
        <!-- Topbar -->
        <header class="admin-topbar">
            <div class="d-flex align-items-center gap-3">
                <button class="btn btn-light d-lg-none" id="sidebarToggle" type="button">
                    <i class="bi bi-list fs-4"></i>
                </button>
                <h5 class="mb-0 fw-bold text-dark"><?= htmlspecialchars($pageTitle ?? 'Dashboard') ?></h5>
            </div>

            <div class="d-flex align-items-center gap-3">
                <a href="../" target="_blank" class="btn btn-outline-secondary btn-sm rounded-pill">
                    <i class="bi bi-globe me-1"></i> View Live Website
                </a>
                <div class="dropdown">
                    <button class="btn btn-light d-flex align-items-center gap-2 rounded-pill px-3 py-1" type="button" data-bs-toggle="dropdown">
                        <i class="bi bi-person-circle fs-5 text-secondary"></i>
                        <span class="small fw-semibold"><?= htmlspecialchars($adminUser['name']) ?></span>
                        <i class="bi bi-chevron-down small text-muted"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end shadow-sm border-0">
                        <li><a class="dropdown-item py-2" href="index.php?module=settings"><i class="bi bi-gear me-2 text-muted"></i> Settings</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item py-2 text-danger" href="logout.php"><i class="bi bi-box-arrow-right me-2"></i> Log Out</a></li>
                    </ul>
                </div>
            </div>
        </header>

        <!-- Content Area -->
        <main class="admin-content">
