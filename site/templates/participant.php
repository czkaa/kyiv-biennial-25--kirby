<?php snippet('header') ?>

<main class="participant">
  <div class="container">
    <header class="participant-header">
      <div class="participant-title">
        <h1><?= $page->title()->html() ?></h1>
      </div>
      
      <?php if ($page->portrait()->isNotEmpty()): ?>
        <div class="participant-portrait">
          <?php if ($portrait = $page->portrait()->toFile()): ?>
            <img src="<?= $portrait->url() ?>" alt="<?= $page->title()->html() ?>" />
          <?php endif ?>
        </div>
      <?php endif ?>
    </header>
    
    <div class="participant-content">
      <?php if ($page->blocks()->isNotEmpty()): ?>
        <div class="participant-blocks">
          <?= $page->blocks()->toBlocks() ?>
        </div>
      <?php endif ?>
      
      <?php if ($page->gallery()->isNotEmpty()): ?>
        <div class="participant-gallery">
          <h2>Gallery</h2>
          <div class="gallery-grid">
            <?php foreach ($page->gallery()->toFiles() as $image): ?>
              <figure class="gallery-item">
                <img 
                  src="<?= $image->url() ?>" 
                  alt="<?= $image->alt()->or($page->title()->html()) ?>"
                  width="<?= $image->width() ?>"
                  height="<?= $image->height() ?>"
                />
                <?php if ($image->caption()->isNotEmpty()): ?>
                  <figcaption><?= $image->caption()->html() ?></figcaption>
                <?php endif ?>
              </figure>
            <?php endforeach ?>
          </div>
        </div>
      <?php endif ?>
    </div>
  </div>
</main>

<?php snippet('footer') ?>