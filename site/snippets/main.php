<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <?php snippet('seo'); ?>

  <?= css([
    'assets/css/index.css',
    'assets/css/basic.css',
    'assets/css/bundle.css',
    '@auto'
  ]) ?>

  <!-- Load Alpine.js first, then your stores -->
  <script defer src="https://unpkg.com/alpinejs@3.12.0/dist/cdn.min.js"></script>
  
  <!-- Then load HTMX -->
  <script defer src="https://unpkg.com/htmx.org@2.0.4" integrity="sha384-HGfztofotfshcF7+8n44JQL2oJmowVChPTg48S+jvZoztPfvwD79OC/LTtG6dMp+" crossorigin="anonymous"></script>
  
  <!-- Then load your custom scripts that depend on Alpine and HTMX -->
  <?= js([
    'assets/js/store.js', 
    'assets/js/index.js',
    'assets/js/links.js',
    '@auto'
  ]) ?>

  <link rel="shortcut icon" type="image/x-icon" href="<?= url('favicon.ico') ?>">
</head>

  <body x-data >
    <?php if (isset($slot)): ?>
      <?= $slot ?>
    <?php endif; ?>
  </body>
</html>

<!-- <style>
html, body {
  height: 100%;
  margin: 0;
  overflow-y: auto;
  scroll-snap-type: y mandatory;
}
</style> -->
