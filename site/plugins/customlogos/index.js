panel.plugin("your-project/customlogos", {
  blocks: {
    customlogos: `
      <div @click="open">
        <div class="logos">
          <img
          v-for="(img, index) in content.logos"
          :src="img.url"/>
        <div>
      </div>
    `,
  },
});
