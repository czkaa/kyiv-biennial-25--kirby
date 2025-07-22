<?php
/** @var \Kirby\Cms\App $kirby */
/** @var \Kirby\Cms\Site $site */
include_once(__DIR__ . "/blocks/_blocks.php");


// Compile all sections
$data = [
  'meta' => [
    'title' => $site->title()->value(),
    'description' => $site->description()->value(),
    'uri' => $page->uri(),
    'template' => $page->template()->name()
  ],
  'sections' => $site->children()->listed()->filterBy('template', '!=', 'home')->filterBy('template', '!=', 'info')->map(function ($child) {
    return [
      'uri' => $child->uri(),
      'slug' => $child->slug(),
      'title' => $child->title()->value(),
      'blocks' => $child->blocks()->toBlocks()->isEmpty() ? null : $child->blocks()->toBlocks()->map(fn($block) => block($block))->values()
    ];
  })->values(),
];

echo \Kirby\Data\Json::encode($data);
