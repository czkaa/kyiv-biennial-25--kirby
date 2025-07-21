
<!-- navigation.php -->
<nav 
  class="w-full h-20  transition-transform duration-300 -translate-y-full" 
  :class="$store.site.isIntro ? '-translate-y-full' : '-translate-y-0'" 
  x-data 
  >
  <ul class="flex justify-end space-x-1">
    <?php foreach ($site->children()->listed() as $item): ?>  
      <?php snippet('basics/navlink', ['path' => '#' . $item->slug(), 'title' => $item->title()]) ?>
    <?php endforeach ?>
    <?php snippet('language') ?>
  </ul>
  
</nav>