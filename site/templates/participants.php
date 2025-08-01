<?php 
// participants.php
snippet('header') ?>

<main class="participants">
  <div class="container">
    <header class="page-header">
      <h1><?= $page->title()->html() ?></h1>
    </header>
    
    <div class="participants-grid">
      <?php foreach ($page->children()->listed() as $participant): ?>
        <article class="participant-card">
          <?php if ($participant->portrait()->isNotEmpty() && $portrait = $participant->portrait()->toFile()): ?>
            <div class="participant-image">
              <a href="<?= $participant->url() ?>">
                <img src="<?= $portrait->url() ?>" alt="<?= $participant->title()->html() ?>" />
              </a>
            </div>
          <?php endif ?>
          
          <div class="participant-info">
            <h2>
              <a href="<?= $participant->url() ?>"><?= $participant->title()->html() ?></a>
            </h2>
          </div>
        </article>
      <?php endforeach ?>
    </div>
  </div>
</main>

<?php snippet('footer') ?>