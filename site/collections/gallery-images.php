<?php
// site/collections/gallery-images.php

ini_set('memory_limit', '512M');

function getGalleryImages() {
    $landscapeImages = [];
    $portraitImages = [];
    
    foreach (page('preistragende')->children()->listed() as $child) {
        if ($child->gallery()->isNotEmpty()) {
            foreach ($child->gallery()->toFiles() as $file) {
                $imageData = [
                    'url' => $file->url(),
                    'alt' => $file->alt()->or($file->caption())->or($child->title())->value(),
                    'caption' => $child->title()->html(),
                    'width' => $file->width(),
                    'height' => $file->height()
                ];
                
                if ($file->ratio() >= 1) {
                    $landscapeImages[] = $imageData;
                } else {
                    $portraitImages[] = $imageData;
                }
            }
        }
    }
    
    return [
        'landscape' => $landscapeImages,
        'portrait' => $portraitImages
    ];
}