<?php
// Check if the caption variable exists and is not empty
if (isset($caption) && $caption): 
?>
<figcaption class="w-fit ml-auto bg-black text-white z-50 py-0.5 px-2"><?= $caption ?></figcaption>
<?php 
// No else needed - if there's no caption, nothing will be rendered
endif;
?>