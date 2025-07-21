  <footer class="footer z-50 snap-end snap-always poiner-events-auto" id="dynamic-footer"
       x-data="{ 
         isVisible: false,
         initIntersectionObserver() {
           let observer = new IntersectionObserver((entries) => {
             entries.forEach(entry => {
               this.isVisible = entry.isIntersecting;
             });
           }, { threshold: 0.01 });
           observer.observe(this.$el);
         }
       }"
       x-init="initIntersectionObserver()"
      >
       <div 
        class="transition-all duration-300 ease-in-out flex justify-start items-end gap-2"
        :class="isVisible ? 'translate-y-0' : 'translate-y-full'"
        >          
        <?php foreach ($site->children()->template('footer') as $item): ?>
           <?php snippet('basics/navlink', ['path' => '/' . $item->slug(), 'title' => $item->title()]) ?>
       <?php endforeach ?>
       </div>
   </footer>