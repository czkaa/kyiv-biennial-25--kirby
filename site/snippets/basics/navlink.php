<?php
if ($path && $title): 
?>
<a 
  class="block bg-black p-3 text-white text-md transition-all duration-300 pointer-events-auto"
  href="<?= $path ?>"
  hx-get="<?= $path ?>"
  hx-target="main" 
  hx-select="main"
  :hx-trigger="$store.site.isGap ? 'innerHTML delay:1000ms' : 'innerHTML'"
  hx-push-url="true"
  @click="$store.site.isGap && $store.site.setIsGap(false)"
  >
  <?= $title ?>
</a>
<?php endif ?>