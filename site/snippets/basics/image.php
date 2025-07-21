<?php
    // Ensure $image is provided and is a valid Kirby File object
    if(!isset($image) || !$image instanceof Kirby\Cms\File) {
        return;
    }
    
    // Create WebP version with 70% quality
    $webpImage = $image->thumb(['format' => 'webp', 'quality' => 70]);
    
    // Generate srcset with WebP format
    $srcset = $webpImage->srcset([
        '320w'  => ['width' => 320, 'format' => 'webp', 'quality' => 100],
        '640w'  => ['width' => 640, 'format' => 'webp', 'quality' => 100],
        '960w'  => ['width' => 960, 'format' => 'webp', 'quality' => 100],
        '1280w' => ['width' => 1280, 'format' => 'webp', 'quality' => 100],
        '1920w' => ['width' => 1920, 'format' => 'webp', 'quality' => 70]
    ]);
    
    $alt = $image->alt()->isNotEmpty() ? $image->alt()->html() : $image->filename();
    
    // Get aspect ratio
    $ratio = $image->ratio();
    
    // Generate unique ID for this image
    $imageId = 'img-' . $image->id();
?>
<div class="lazy-image-container w-full shrink-0" 
     data-image-id="<?= $imageId ?>"
     style="aspect-ratio: <?= $ratio ?>; background-color: #f5f5f5;"
     data-src="<?= $webpImage->url() ?>"
     data-srcset="<?= $srcset ?>"
     data-sizes="(max-width: 768px) 100vw, 80vw"
     data-alt="<?= $alt ?>">
    <noscript>
        <img src="<?= $webpImage->url() ?>" 
            srcset="<?= $srcset ?>" 
            sizes="(max-width: 768px) 100vw, 80vw"
            alt="<?= $alt ?>" 
            class="w-full object-cover object-center pointer-events-auto">
    </noscript>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const lazyImageContainers = document.querySelectorAll('.lazy-image-container');
        
        if ('IntersectionObserver' in window) {
            const imageObserver = new IntersectionObserver((entries, observer) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const container = entry.target;
                        
                        try {
                            // First try to use the noscript element
                            const noscript = container.querySelector('noscript');
                            
                            if (noscript && noscript.textContent) {
                                container.innerHTML = noscript.textContent;
                            } else {
                                // Fallback to data attributes if noscript not found
                                const img = document.createElement('img');
                                img.src = container.dataset.src || '';
                                img.srcset = container.dataset.srcset || '';
                                img.sizes = container.dataset.sizes || '';
                                img.alt = container.dataset.alt || '';
                                img.className = 'w-full h-full object-cover';
                                
                                // Clear container and append the new image
                                container.innerHTML = '';
                                container.appendChild(img);
                            }
                            
                            // Stop observing this container
                            observer.unobserve(container);
                        } catch (error) {
                            console.error('Error loading lazy image:', error);
                        }
                    }
                });
            }, {
                rootMargin: '100px 0px',
                threshold: 0.01
            });
            
            lazyImageContainers.forEach(container => {
                imageObserver.observe(container);
            });
        } else {
            // Fallback for browsers that don't support IntersectionObserver
            lazyImageContainers.forEach(container => {
                const noscript = container.querySelector('noscript');
                if (noscript && noscript.textContent) {
                    container.innerHTML = noscript.textContent;
                } else if (container.dataset.src) {
                    const img = document.createElement('img');
                    img.src = container.dataset.src;
                    img.srcset = container.dataset.srcset || '';
                    img.sizes = container.dataset.sizes || '';
                    img.alt = container.dataset.alt || '';
                    img.className = 'w-full h-full object-cover';
                    
                    container.innerHTML = '';
                    container.appendChild(img);
                }
            });
        }
    });
</script>