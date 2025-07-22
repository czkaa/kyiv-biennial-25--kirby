<?php
// site/plugins/text-block/index.php

Kirby::plugin('your-project/customgap', [
  // Register the block blueprint
  'blueprints' => [
    'blocks/customgap' => kirby()->root('blueprints') . '/blocks/customgap.yml'
  ],
  
  // Register the block snippet for frontend rendering
  'snippets' => [
    'blocks/customgap' => __DIR__ . '/snippets/blocks/customgap.php'
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