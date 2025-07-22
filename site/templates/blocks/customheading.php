<?php
  $content = [
    'text' => $block->text()->kt()->value(),
    'indent' =>  $block->indent()->value(),
    'level' =>  $block->level()->value(),
    'size' =>  $block->size()->value(),
    'isRight' =>  $block->isRight()->value() === 'true' ? true : false,
  ];
?>
