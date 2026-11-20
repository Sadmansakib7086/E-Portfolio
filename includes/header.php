<?php require_once __DIR__ . '/config.php'; require_once __DIR__ . '/icons.php'; ?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= e(SITE_TITLE) ?></title>
  <meta name="description" content="<?= e(SITE_DESC) ?>">
  <meta name="theme-color" content="#070912">
  <meta property="og:type" content="website">
  <meta property="og:title" content="<?= e(SITE_TITLE) ?>">
  <meta property="og:description" content="<?= e(SITE_DESC) ?>">
  <link rel="icon" type="image/png" href="assets/images/favicon.png">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Manrope:wght@400;500;600;700;800&display=swap">
  <link rel="stylesheet" href="assets/css/style.css?v=<?= filemtime(__DIR__ . '/../assets/css/style.css') ?>">
</head>
<body>
<a class="skip-link" href="#main">Skip to content</a>
<div class="app-shell">
  <header class="site-header" id="siteHeader">
    <nav class="nav-shell" aria-label="Primary navigation">
      <a href="#top" class="brand" aria-label="Sadman Sakib, home">
        <span class="brand-mark">SS</span>
        <span class="brand-name">Sadman <b>Sakib</b></span>
      </a>

      <div class="desktop-nav">
        <?php foreach ($nav as $item): ?>
          <a href="#<?= slug($item) ?>" data-spy="<?= slug($item) ?>"><?= e($item) ?></a>
        <?php endforeach; ?>
      </div>

      <div class="nav-actions">
        <span class="availability"><i></i> Available for opportunities</span>
        <a class="button button-primary nav-resume" href="<?= e(RESUME_PATH) ?>" download>Résumé <?= icon('download', 17) ?></a>
        <button class="menu-toggle" id="menuToggle" type="button" aria-label="Toggle navigation" aria-expanded="false" aria-controls="mobileNav">
          <span></span><span></span>
        </button>
      </div>

      <div class="mobile-nav" id="mobileNav" hidden>
        <?php foreach ($nav as $item): ?>
          <a href="#<?= slug($item) ?>"><?= e($item) ?></a>
        <?php endforeach; ?>
        <a href="<?= e(RESUME_PATH) ?>" download>Download résumé</a>
      </div>
    </nav>
  </header>

  <main id="main">
