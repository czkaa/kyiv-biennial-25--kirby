<?php
include_once(__DIR__ . "/_content.php");
/** @var \Kirby\Cms\App $kirby */
/** @var \Kirby\Cms\Site $site */
// https://stackoverflow.com/questions/4356289/php-random-string-generator
function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
};

function block ($block) {
  return [
    'key' => generateRandomString(6),
    'type' => $block->type(),
    'content' => content($block->type(), $block)
  ];
};

?>
