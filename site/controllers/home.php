<?php
// site/controllers/home.php (for the homepage)
return function ($page, $sectionId = null) {
  // Make the section ID available to the template
  return [
    'sectionId' => $sectionId
  ];
};