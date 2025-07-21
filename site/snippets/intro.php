<div 
  x-data="{ imageScaled: false }"
  class="pointer-events-auto snap-start w-full z-[100]transition-all duration-1000 overflow-hidden bg-white h-frame-h" 
  id="intro" 
  x-init="
    // Start image scaling animation immediately
    setTimeout(() => { 
      imageScaled = true;
      $store.site.setIsIntro(false);
    }, 100);
  "
>
    
    <div 
      class="flex flex-col items-center justify-center overflow-hidden relative [&_div]:h-full [&_figure]:h-full transition-all linear duration-intro"
      :class="!imageScaled ? 'w-20 h-10 p-0' : 'w-frame-w h-frame-h p-11 px-[7.6rem]'"
    >
      <?php
        // Get all images from the "gallery" field of all listed preistragende children
        $portraitImages = [];
        $landscapeImages = [];
        
        foreach(page('preistragende')->children()->listed() as $child) {
          if($child->gallery()->isNotEmpty()) {
            foreach($child->gallery()->toFiles() as $file) {
              // Calculate the ratio to determine orientation
              $width = $file->width();
              $height = $file->height();
              $ratio = $width / $height;
              
              // If ratio < 1, it's portrait; if ratio > 1, it's landscape
              if ($ratio < 1) {
                $portraitImages[] = $file;
              } else {
                $landscapeImages[] = $file;
              }
            }
          }
        }
        
        // Select random images if arrays aren't empty
        $portraitImage = !empty($portraitImages) ? $portraitImages[array_rand($portraitImages)] : null;
        $landscapeImage = !empty($landscapeImages) ? $landscapeImages[array_rand($landscapeImages)] : null;
      ?>
      
      <!-- Show portrait image on mobile (below md breakpoint) -->
      <?php if ($portraitImage): ?>
      <div class="w-full h-full block md:hidden">
        <figure>
          <?php snippet('image', ['image' => $portraitImage]) ?>
        </figure>
      </div>
      <?php endif; ?>
      
      <!-- Show landscape image on md breakpoint and above -->
      <?php if ($landscapeImage): ?>
      <div class="w-full h-full hidden md:block">
        <figure>
          <?php snippet('image', ['image' => $landscapeImage]) ?>
        </figure>
      </div>
      <?php endif; ?>
    </div>
</div>