<?php
/** @var \Kirby\Cms\Page $page */
include_once(__DIR__ . "/blocks/_blocks.php");



// Compile all sections
$data = [
  'meta' => [
    'title' => $site->title()->value(),
    'description' => $site->description()->value(),
    'uri' => $page->uri(),
    'template' => $page->template()->name()
  ],
  'sections' => $site->children()->template('info')->first()->children()->map(function ($child) {
    return [
      'uri' => $child->uri(),
      'slug' => $child->slug(),
      'title' => $child->title()->value(),
      'blocks' => $child->blocks()->toBlocks()->isEmpty() ? null : $child->blocks()->toBlocks()->map(fn($block) => block($block))->values()
    ];
  })->values(),
];

echo \Kirby\Data\Json::encode($data);
