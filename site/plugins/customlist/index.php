<?php
// site/plugins/text-block/index.php

Kirby::plugin('your-project/customlist', [
  // Register the block blueprint
  'blueprints' => [
    'blocks/customlist' => kirby()->root('blueprints') . '/blocks/customlist.yml'
  ],
  
  // Register the block snippet for frontend rendering
  'snippets' => [
    'blocks/customlist' => __DIR__ . '/snippets/blocks/customlist.php'
  ],
  
  // Register assets for the Panel
  'assets' => [
    'css' => [
      'index.css'
    ],
    'js' => [
      'index.js'
    ]
  ]
]);