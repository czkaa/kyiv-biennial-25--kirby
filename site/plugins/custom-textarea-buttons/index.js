panel.plugin("getkirby/custom-textarea-buttons", {
  textareaButtons: {
    highlight: {
      label: "Highlight",
      icon: "text",
      click: function () {
        this.command("toggle", "<span>", "</span>");
      },
      shortcut: "m",
    },
  },
});
