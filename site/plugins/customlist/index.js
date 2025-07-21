// site/plugins/text-block/index.js

panel.plugin("your-project/customlist", {
  blocks: {
    customlist: {
      template: `
      <div @click="open">
        <div v-for="item in content.list">
          <span>{{item.year}}</span>
          <span v-html="item.text"></span>
        </div>
      </div>
      `,
    },
  },
});
