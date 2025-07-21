<?php
// config/config.php
return [
  'routes' => [
    [
      'pattern' => '(:any)/section/(:any)',
      'language' => '*', // Make route work with all languages
      'action' => function ($language, $firstPart, $sectionId) {
        // If first part matches a language code, it means we're targeting the home page
        // Otherwise, it's a page slug
        $page = site()->homePage();
        
        // Pass the section ID to the template and visit the page with correct language
        return site()->visit($page, $language->code())->render([
          'sectionId' => $sectionId
        ]);
      }
    ],
    [
      'pattern' => '(:any)/(:any)/section/(:any)',
      'language' => '*', // Make route work with all languages
      'action' => function ($language, $pageSlug, $secondPart, $sectionId) {
        // For deeper URLs like /en/about/section/team
        $page = page($pageSlug);
        
        if(!$page) {
          return site()->errorPage();
        }
        
        // Pass the section ID to the template and visit the page with correct language
        return site()->visit($page, $language->code())->render([
          'sectionId' => $sectionId
        ]);
      }
    ]
  ]
];