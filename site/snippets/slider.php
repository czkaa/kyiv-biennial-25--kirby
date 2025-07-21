<?php
/**
 * Snippet: alpine-gallery.php
 * A simple image gallery with Alpine.js navigation using click regions
 * Images are centered and have a max height of 70vh
 */

// Default parameters if not provided
$images = $images ?? new \Kirby\Cms\Files([]);
$class = $class ?? '';
?>

<div 
  x-data="{ currentIndex: $store.site.imageIndex }" 
  class="grid grid-cols-1 relative <?= $class ?>"
>
  <?php $imageIndex = 0; ?>
  <?php foreach ($images as $image): ?>
    <?php
      // Generate WebP version with 70% quality
      $webpImage = $image->thumb(['format' => 'webp', 'quality' => 70]);
      
      // Generate srcset with WebP format
      $srcset = $webpImage->srcset([
          '320w'  => ['width' => 320, 'format' => 'webp', 'quality' => 100],
          '640w'  => ['width' => 640, 'format' => 'webp', 'quality' => 100],
          '960w'  => ['width' => 960, 'format' => 'webp', 'quality' => 100],
          '1280w' => ['width' => 1280, 'format' => 'webp', 'quality' => 100],
          '1920w' => ['width' => 1920, 'format' => 'webp', 'quality' => 70]
      ]);
      
      $alt = $image->alt()->isNotEmpty() ? $image->alt()->html() : 
             ($image->caption()->isNotEmpty() ? $image->caption()->html() : $image->filename());
    ?>
    <div 
      x-show="currentIndex === <?= $imageIndex ?>"
      class="col-start-1 row-start-1 top-0 left-0 transition-opacity duration-300 h-[70vh] flex flex-col justify-center"
      x-transition:enter="transition ease-out duration-300"
      x-transition:enter-start="opacity-0"
      x-transition:enter-end="opacity-100"
      x-transition:leave="transition ease-in duration-200"
      x-transition:leave-start="opacity-100"
      x-transition:leave-end="opacity-0"
    >
      <img 
        src="<?= $webpImage->url() ?>" 
        srcset="<?= $srcset ?>"
        sizes="(max-width: 768px) 100vw, 80vw"
        alt="<?= $alt ?>"
        class="max-h-full w-auto object-contain"
        loading="<?= $imageIndex === 0 ? 'eager' : 'lazy' ?>"
      >
      <?php if ($image->caption()->isNotEmpty()): ?>
        <?php snippet('basics/caption', ['caption' => $image->caption()]) ?>
      <?php endif ?>
    </div>
    <?php $imageIndex++; ?>
  <?php endforeach; ?>

  <?php if (count($images) > 1): ?>
    <!-- Invisible click regions for navigation -->
    <div 
      @click="currentIndex = (currentIndex - 1 + <?= count($images) ?>) % <?= count($images) ?>"
      class="absolute left-0 top-0 w-1/2 h-full z-10 cursor-w-resize"
      aria-label="Previous image"
    ></div>
    
    <div 
      @click="currentIndex = (currentIndex + 1) % <?= count($images) ?>"
      class="absolute right-0 top-0 w-1/2 h-full z-10 cursor-e-resize"
      aria-label="Next image"
    ></div>
  <?php endif; ?>
</div>