<?php
$isLeft = $isLeft ?? false;
$transformClass = $isLeft ? '-translate-x-[70%]' : 'translate-x-[70%]';
?>

<div 
  x-data
  @click="$store.site.toggleIsGap(); console.log('LAYOUT TOGGLE')"
  class="w-1/2 transition-all duration-500 ease-in-out transform bg-white cursor-pointer space-y-sm"
  :class="[
      $store.site.isGap ? '<?= $transformClass ?>' : 'translate-x-0',
    ]"
>
  <?php foreach($items as $item): 
    // Generate a random position for left margin (between 0 and 30%)

    $max = 20;
    $min = 0;
  
    $positionType = rand(0, 100);
    
    if ($positionType <= 20) {
        $randomPosition = $min;
    } elseif ($positionType >= 81) {
        $randomPosition = $max;
    } else {
        $randomPosition = rand($min, $max);
    }
  ?>
    <a
      href="/preistragende/<?= $item['page']->slug() ?>"
      hx-get="/preistragende/<?= $item['page']->slug() ?>"
      hx-target="main" 
      hx-select="main"
      hx-swap="outerHTML"
      :hx-trigger="$store.site.isGap ? 'click delay:1000ms' : 'click'"
      hx-push-url="true"
      @click="$store.site.isGap && $store.site.setIsGap(false)"
      style="margin-left: <?= $randomPosition ?>%; width: <?= 100 - $max?>%"
      class="block relative cursor-pointer transform hover:scale-105 hover:z-50 transition-transform duration-300"
      :class="{'pointer-events-none' : $store.site.isGap, 'pointer-events-auto' : !$store.site.isGap}"
    >
      <?php snippet('image', ['image' => $item['image'], 'caption' => $item['page']->title()]) ?>
    </a>
  <?php endforeach ?>
</div>