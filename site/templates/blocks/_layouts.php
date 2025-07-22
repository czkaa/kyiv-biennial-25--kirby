<?php
include_once(__DIR__ . "/_content.php");

// Random string generator for unique keys
function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

// Process regular blocks
function block($block) {
    return [
        'key' => generateRandomString(6),
        'type' => $block->type(),
        'content' => content($block->type(), $block)
    ];
}

// Process layouts
function layout($layout) {
    // Get blocks from the layout
    $blocks = $layout->layout()->toBlocks();
    
    $processedBlocks = $blocks->isEmpty() 
        ? [] 
        : $blocks->map(fn($block) => block($block))->values();
    
    return [
        'key' => generateRandomString(6),
        'type' => 'layout',
        'heading' => $layout->settings()->heading()->value(),
        'blocks' => $processedBlocks
    ];
}

// Process a collection of layouts
function processLayouts($field) {
    if ($field->toLayouts()->isEmpty()) {
        return null;
    }
    
    return $field->toLayouts()->map(fn($layout) => layout($layout))->values();
}
?>