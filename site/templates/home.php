<?php
ob_start();
?>

home 

<script>
    document.addEventListener('DOMContentLoaded', function() {
      // Find the target section
      console.log('<?= $sectionId ?>', 'TARGET');
      
    
    });
  </script>
<?php

$slot = ob_get_clean();

include __DIR__ . '/../snippets/main.php';
?>
