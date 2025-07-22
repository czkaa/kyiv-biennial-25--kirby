<?php
Kirby::plugin('karen/prevent-ordered-lists', [
    'hooks' => [
        'kirbytext:before' => function ($text) {
            // Check if text is empty and return null if it is
            if (empty($text)) {
                return null;
            }
            
            // This hook runs before any kirbytext/kt processing
            // Prevent number+period from becoming ordered lists by adding a zero-width space after the period
            return preg_replace('/^(\d+)\.\s/m', '$1\.&#8203; ', $text);
            
            // Alternative approach: escape the period with a backslash
            // return preg_replace('/^(\d+)\.\s/m', '$1\\\. ', $text);
        }
    ]
]);