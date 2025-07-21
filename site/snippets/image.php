<?php
?>

<figure class="w-full relative">
  <?php snippet('basics/image', ['image' => $image]) ?>

  <?php if (isset($caption) && $caption):  ?>
    <?php snippet('basics/caption', ['caption' => $caption]) ?>
  <?php endif ?>
</figure>
