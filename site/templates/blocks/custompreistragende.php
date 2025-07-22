<?php
/** @var \Kirby\Cms\App $kirby */
/** @var \Kirby\Cms\Site $site */
$site = kirby()->site();


  $content = [
    'children' => $site->index()->template('preistragende')->first()->children()->listed()->map(function($child) {
      return [
        'title' => $child->title()->value(),
        'slug' => $child->slug(),
        'uri' => $child->uri()
      ];
    })->values()
  ];
?>

