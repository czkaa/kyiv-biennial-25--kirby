
<?php
// site/snippets/language-toggle.php


if(kirby()->multilang()): ?>
<nav class="language-toggle" aria-label="Language selection">
  <ul class="language-list">
    <?php foreach(kirby()->languages() as $language): ?>
    <li class="language-item">
      <?php if($language->code() === kirby()->language()->code()): ?>
        <span class="language-link language-link--current" aria-current="page">
          <?= strtoupper($language->code()) ?>
        </span>
      <?php else: ?>
        <a 
          class="language-link" 
          href="<?= $page->url($language->code()) ?>"
          hreflang="<?= $language->code() ?>"
        >
          <?= strtoupper($language->code()) ?>
        </a>
      <?php endif ?>
    </li>
    <?php endforeach ?>
  </ul>
</nav>
<?php endif ?>