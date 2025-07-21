<?php 
  $page = page('preistragende'); 
?>
<section id="<?= $page->slug() ?>" class="preistragende pt-24 space-y-4">
  <?php snippet('basics/headline', ['text' => $page->title()->html(), 'level' => 1]) ?>
  <ul class="space-y-2">
    <?php foreach($page->children()->listed() as $child): ?>
      <li>
        <a 
          href="/preistragende/<?= $child->slug() ?>"
          hx-get="/preistragende/<?= $child->slug() ?>"
          hx-target="main" 
          hx-select="main"
          hx-swap="outerHTML"
          :hx-trigger="$store.site.isGap ? 'click delay:1000ms' : 'click'"
          hx-push-url="true"
          @click="$store.site.isGap && $store.site.setIsGap(false); $store.site.setImageIndex(0)"
          class="inline-block bg-black text-white text-lg px-3 py-3"

          >
          <?= $child->title()->html() ?>
        </a>
      </li>
    <?php endforeach ?>
  </ul>
</section>

