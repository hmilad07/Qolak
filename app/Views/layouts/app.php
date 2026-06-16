<!doctype html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, viewport-fit=cover">
    <meta name="csrf-token" content="<?= e(\App\Core\Csrf::token()) ?>">
    <title><?= e($title ?? $app['name']) ?></title>
    <link rel="stylesheet" href="<?= e(url('assets/css/app.css')) ?>">
</head>
<body>
    <div class="app-shell">
        <div class="backdrop" data-close-menu></div>

        <aside class="sidebar" id="sidebar" aria-hidden="true">
            <div class="brand">
                <span class="brand-mark">ق</span>
                <div>
                    <strong>قُلک</strong>
                    <small>مدیریت صندوق‌ها</small>
                </div>
            </div>

            <nav class="nav" aria-label="منوی اصلی">
                <a href="<?= e(url('/')) ?>">داشبورد</a>
                <a href="<?= e(url('admin/funds')) ?>">صندوق‌ها</a>
                <a href="<?= e(url('admin/users')) ?>">اعضا</a>
                <a href="<?= e(url('admin/payments')) ?>">پرداخت‌ها</a>
                <a href="<?= e(url('draws')) ?>">قرعه‌کشی</a>
                <a href="<?= e(url('ledger')) ?>">دفتر کل</a>
                <a href="<?= e(url('admin/notifications')) ?>">اعلان‌ها</a>
            </nav>
        </aside>

        <main class="main">
            <header class="topbar">
                <button id="menu" type="button" aria-controls="sidebar" aria-expanded="false" aria-label="باز کردن منو">☰</button>
                <div class="page-title"><?= e($title ?? '') ?></div>
                <button id="theme" type="button" aria-label="تغییر حالت روشن و تاریک">🌓</button>
            </header>

            <section class="content">
                <?php require $viewFile; ?>
            </section>
        </main>
    </div>

    <script src="<?= e(url('assets/js/app.js')) ?>"></script>
</body>
</html>
