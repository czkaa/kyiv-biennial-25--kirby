<?php
// site/plugins/text-block/index.php

Kirby::plugin('your-project/customtext', [
  // Register the block blueprint
  'blueprints' => [
    'blocks/customtext' => kirby()->root('blueprints') . '/blocks/customtext.yml'
  ],
  
  // Register the block snippet for frontend rendering
  'snippets' => [
    'blocks/customtext' => __DIR__ . '/snippets/blocks/customtext.php'
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