<header class="fixed top-0 w-full h-frame-h pointer-events-none z-[200]" x-data>
  <div class="w-full h-full relative">
    <a 
      href="/"
      hx-get="/"
      hx-target="main" 
      hx-select="main"
      hx-swap="outerHTML"
      :hx-trigger="$store.site.isGap ? 'click delay:1000ms' : 'click'"
      hx-push-url="true"
      @click="$store.site.isGap && $store.site.setIsGap(false)"      
      class="absolute transition-all duration-intro linear z-[100] top-0 left-0 pointer-events-auto"
      >
        <img src="/assets/icons/logotype-tl.svg" class="h-[4.6rem]">
    </a>

    <div
      class="absolute transition-all duration-intro linear z-[100] bottom-0 right-0"
     >
        <img src="/assets/icons/logotype-br.svg" class="h-[4.6rem]">
    </div>
    
    <?php snippet('nav') ?>
  </div>
</header>

