// site/plugins/text-block/index.js

panel.plugin("your-project/customheading", {
  blocks: {
    customheading: {
      computed: {
        style() {
          // Get the indent value from the block
          const indent = this.content.indent || "none";
          const size = this.content.size || "small";
          const isRight = this.content.isright;

          // Define padding based on indent value
          let padding = "1rem";
          if (indent === "small") {
            padding = "5rem";
          } else if (indent === "medium") {
            padding = "7rem";
          }

          let fontSize = "1rem";
          let fontFamily = "sans-serif";
          if (size === "small") {
          } else if (size === "medium") {
            fontSize = "2rem";
          } else if (size === "large") {
            fontSize = "3rem";
          }

          let textAlign = "left";
          if (isRight) {
            textAlign = "right";
          }

          return {
            paddingLeft: padding,
            fontSize: fontSize,
            fontFamily: fontFamily,
            textAlign: textAlign,
          };
        },
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
        <div class="k-block-text-container">
          <div class="k-block-text-preview" :style="style" v-html="formattedText">
          </div>
        </div>
      </div>
      `,
    },
  },
});
