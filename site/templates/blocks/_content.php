<?php
function content ($type, $block) {
  try {
    include(__DIR__ . "/$type.php");
  } catch (Exception $e) {
    return [
      'error' => 'Include Error',
      'message' => $e->getMessage()
    ];
  };
  return $content;
};
?>
