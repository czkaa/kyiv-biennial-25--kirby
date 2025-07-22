// site/plugins/text-block/index.js

panel.plugin("your-project/customlist", {
  blocks: {
    customlist: {
      methods: {
        formatText(text) {
          // Handle basic Markdown formatting

          // Bold: **text** to <strong>text</strong>
          text = text.replace(/\*\*(.*?)\*\*/g, "<strong>$1</strong>");

          // H2: ## Heading to <h2>Heading</h2>
          text = text.replace(/##\s+(.*?)(\n|$)/g, "<h2>$1</h2>$2");

          // Links: (link: https://example.com text: Link Text)
          text = text.replace(
            /\(link:\s*(.*?)\s*text:\s*(.*?)\)/g,
            '<a href="$1">$2</a>'
          );
          // Convert line breaks to <br>
          text = text.replace(/\n/g, "<br>");

          return text;
        },
      },
      computed: {
        formattedText() {
          if (!this.content.text) return "";

          let text = this.content.text;

          // Handle basic Markdown formatting

          // Bold: **text** to <strong>text</strong>
          text = text.replace(/\*\*(.*?)\*\*/g, "<strong>$1</strong>");

          // H2: ## Heading to <h2>Heading</h2>
          text = text.replace(/##\s+(.*?)(\n|$)/g, "<h2>$1</h2>$2");

          // Links: (link: https://example.com text: Link Text)
          text = text.replace(
            /\(link:\s*(.*?)\s*text:\s*(.*?)\)/g,
            '<a href="$1">$2</a>'
          );

          //   // Simple URL: https://example.com
          //   text = text.replace(/(https?:\/\/[^\s<]+)/g, '<a href="$1">$1</a>');

          //   // Simple email: name@example.com
          //   text = text.replace(
          //     /([a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,})/g,
          //     '<a href="mailto:$1">$1</a>'
          //   );

          // Convert line breaks to <br>
          text = text.replace(/\n/g, "<br>");

          return text;
        },
      },
      template: `
      <div @click="open">
        <div v-for="item in content.list">
          <span class="number" v-html="formatText(item.year)"></span>
          <span v-html="formatText(item.text)"></span>
        </div>
      </div>
      `,
    },
  },
});
