<?php snippet('header') ?>

<main class="home">
  <div class="container">
    <header class="home-header">
      <h1><?= $page->title()->html() ?></h1>
    </header>
    
    <div class="home-content">
      <?php if ($site->children()->listed()->isNotEmpty()): ?>
        <ul class="home-links">
          <?php foreach ($site->children()->listed() as $child): ?>
            <li>
              <a href="<?= $child->url() ?>"><?= $child->title()->html() ?></a>
            </li>
          <?php endforeach ?>
          </ult>
      <?php endif ?>
    </div>
  </div>
</main>

<?php snippet('footer') ?>