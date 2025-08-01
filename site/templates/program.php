<?php 
// program.php
// -------------------------
snippet('header') ?>

<main class="program">
  <div class="container">
    <header class="page-header">
      <h1><?= $page->title()->html() ?></h1>
    </header>
    
    <div class="program-list">
      <?php foreach ($page->children()->listed() as $event): ?>
        <article class="event-card">
          <div class="event-info">
            <h2>
              <a href="<?= $event->url() ?>"><?= $event->title()->html() ?></a>
            </h2>
            
            <?php if ($event->subtitle()->isNotEmpty()): ?>
              <p class="event-subtitle"><?= $event->subtitle()->html() ?></p>
            <?php endif ?>
            
            <?php if ($event->display_date()->isNotEmpty()): ?>
              <time class="event-date"><?= $event->display_date()->html() ?></time>
            <?php endif ?>
            
            <?php if ($event->curators()->isNotEmpty()): ?>
              <div class="event-curators">
                <span>Curators: </span>
                <?php 
                $curatorNames = [];
                foreach ($event->curators()->toStructure() as $curator) {
                  $curatorNames[] = $curator->name()->html();
                }
                echo implode(', ', $curatorNames);
                ?>
              </div>
            <?php endif ?>
          </div>
        </article>
      <?php endforeach ?>
    </div>
  </div>
</main>

<?php snippet('footer') ?>