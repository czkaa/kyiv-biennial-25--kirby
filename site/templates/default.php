<?php
/* SITE DATA */
/** @var \Kirby\Cms\App $kirby */
/** @var \Kirby\Cms\Site $site */

$data = [
  'title' => $page->title()->value(),
  'template' =>  $page->intendedTemplate(),  
  'subtitle' => $site->subtitle()->value(),
  'logo' => $site->logo()->first()->toFile() ? [
    'url' => $site->logo()->first()->toFile()->url(),
    'alt' => $site->logo()->first()->toFile()->alt()->value(),
  ] : null,
  'logos' => $site->logos()->toFiles()->map(function ($image) {
    return [
        'url' => $image->url(),
          'alt' => $image->alt()->value(),   
        ];
    })->values(),
  'seoimage' => $site->shareimage()->first()->toFile() ? $site->shareimage()->first()->toFile()->url() : null,
  'seodescription' => $site->sharedescription()->value(),
  'social' => $site
      ->social()
      ->toStructure()
      ->map(fn($social) => [
          'type' => $social->type()->value(),
          'title' => $social->title()->value(),
          'link' => $social->type()->value() === 'link' ? $social->url()->value()
                                                          : $social->mail()->value(),
          'icon' => [
            'url' => $social->icon()->toFile()->url(),
            'uri' => $social->icon()->toFile()->uri()->value(),
            'alt' => $social->icon()->toFile()->alt()->value(),
          ]
      ])->values(),
  ];

echo \Kirby\Data\Json::encode($data);

