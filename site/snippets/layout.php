<?php
// Get all images from the "gallery" field of all listed preistragende children
$images = [];
$imageIndex = 0; // Keep track of the global index

foreach (page('preistragende')->children()->listed() as $child) {
  $imageIndex = 0;
  foreach ($child->gallery()->toFiles() as $file) {
    $images[] = [
      'image' => $file,
      'page'  => $child,
      'index' => $imageIndex++ // Store the index for each image
    ];
  }
}

// Shuffle the entire pool of images
shuffle($images);

// Split the shuffled images into two halves for the two columns
$half = ceil(count($images) / 2);
$leftImages  = array_slice($images, 0, $half);
$rightImages = array_slice($images, $half);
?>

<div class="w-full flex relative z-10 space-x-sm mt-20 p-sm  snap-start">
  <?php snippet('layoutColumn', ['items' => $leftImages, 'isLeft' => true]) ?>
  <?php snippet('layoutColumn', ['items' => $rightImages]) ?>
</div>

