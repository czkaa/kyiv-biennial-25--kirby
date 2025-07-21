module.exports = {
  content: ["./site/**/*.php", "./content/**/*.txt"],
  theme: {
    fontSize: {
      xs: ["0.7rem", { lineHeight: "1.35" }], // customized xs
      sm: ["0.85rem", { lineHeight: "1.25" }], // customized sm
      md: ["1.15rem", { lineHeight: "1.2" }], // customized base
      lg: ["3rem", { lineHeight: "0.9" }], // customized lg
      xl: ["4rem", { lineHeight: "0.8" }], // customized xl
    },
    screens: {
      lg: { min: "1280px" },
      md: { max: "900px" },
      sm: { max: "500px" },
      "hover-hover": { raw: "(hover: hover)" },
    },
    extend: {
      spacing: {
        xs: "0.25rem",
        sm: "0.5rem",
        md: "1rem",
        "indent-sm": "3rem",
        "indent-md": "6rem",
        "frame-h": "min(100vh, 100dvh)",
        "frame-w": "min(100vw, 100dvw)",
      },
      transitionDuration: {
        intro: "2s",
      },
    },
  },
  plugins: [],
};
