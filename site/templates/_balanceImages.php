<?php
function balanceImages($images) {
    if (empty($images)) return [[], []];
  
    // Split the array into two halves
    $mid = ceil(count($images) / 2);
    $left = array_slice($images, 0, $mid);
    $right = array_slice($images, $mid);
  
    // Calculate initial ratio sums
    $leftSum = array_sum(array_column($left, 'ratio'));
    $rightSum = array_sum(array_column($right, 'ratio'));
  
    $diff = abs($leftSum - $rightSum);
  
    // Try moving one image from heavier to lighter side
    if ($leftSum < $rightSum && !empty($left)) {
      $img = array_pop($left);
      $right[] = $img;
  
     
    } elseif ($rightSum < $leftSum && !empty($right)) {
      $img = array_pop($right);
      $left[] = $img;
    }
  
   
  
    return [$left, $right];
  }
  