document.addEventListener("alpine:init", () => {
  // Register the store with Alpine - put everything under 'site' namespace
  Alpine.store("site", {
    // Make these direct reactive properties instead of getters
    isGap: false,
    isGapTransition: false,
    isIntro: true,
    isIntroTransition: false,
    imageIndex: 0,
    currentUrl: window.location.pathname, // Add current URL tracking

    // Methods
    setIsGap(value) {
      if (this.isGap !== value) {
        setTimeout(() => (this.isGap = false), 500);

        this.isGapTransition = true;
        setTimeout(() => (this.isGapTransition = false), 1000);
      }
    },

    toggleIsGap() {
      this.isGap = !this.isGap;
      this.isGapTransition = true;
      console.log("yey");
      console.log(this.isGap);
      setTimeout(() => (this.isGapTransition = false), 1000);
    },

    setIsIntro(value) {
      if (this.isIntro !== value) {
        this.isIntro = value;
        this.isIntroTransition = true;
        setTimeout(() => (this.isIntroTransition = false), 1000);
      }
    },

    setImageIndex(index) {
      this.imageIndex = index;
    },

    updateCurrentUrl(path) {
      this.currentUrl = path;
    },
  });

  // Make methods globally available
  window.isGap = () => Alpine.store("site").isGap;
  window.isGapTransition = () => Alpine.store("site").isGapTransition;
  window.isIntro = () => Alpine.store("site").isIntro;
  window.isIntroTransition = () => Alpine.store("site").isIntroTransition;
  window.imageIndex = () => Alpine.store("site").imageIndex;
  window.setIsGap = (value) => Alpine.store("site").setIsGap(value);
  window.toggleIsGap = () => Alpine.store("site").toggleIsGap();
  window.setIsIntro = (value) => Alpine.store("site").setIsIntro(value);
  window.setImageIndex = (index) => Alpine.store("site").setImageIndex(index);
  window.updateCurrentUrl = (path) =>
    Alpine.store("site").updateCurrentUrl(path);
});

// Add event listener for HTMX afterSwap event to set isGap to true after content is loaded
document.addEventListener("htmx:afterSwap", function (event) {
  // Wait a small amount of time to ensure any animations complete
  setTimeout(() => {
    Alpine.store("site").setIsGap(true);
    console.log("Content swapped, isGap set to true");
  }, 100);

  // Also update the current URL
  Alpine.store("site").updateCurrentUrl(window.location.pathname);
});
