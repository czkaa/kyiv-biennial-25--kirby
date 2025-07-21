// // Simple script to enhance links with HTMX attributes
// document.addEventListener("DOMContentLoaded", function () {
//   // Get current language from URL
//   const getCurrentLang = () => {
//     const path = window.location.pathname.split("/");
//     if (path.length >= 2 && (path[1] === "en" || path[1] === "de")) {
//       return path[1];
//     }
//     return "en"; // Default language
//   };

//   // Function to add HTMX attributes to links
//   function enhanceLinks() {
//     // Current language
//     const currentLang = getCurrentLang();

//     // Process all links on the page
//     document.querySelectorAll("a").forEach((link) => {
//       const href = link.getAttribute("href");

//       // Skip if no href or already processed
//       if (!href || link.hasAttribute("data-enhanced")) return;

//       // Mark as processed
//       link.setAttribute("data-enhanced", "true");

//       // Case 1: Anchor links (like #about)
//       if (href.startsWith("#")) {
//         // Handle differently based on whether we're on home or subpage
//         if (isHomePage()) {
//           // On homepage: scroll to target
//           link.addEventListener("click", function (e) {
//             e.preventDefault();
//             const targetId = href.substring(1);
//             const target = document.getElementById(targetId);
//             if (target) {
//               target.scrollIntoView({ behavior: "smooth" });
//               history.pushState(null, "", href);
//             }
//           });
//         } else {
//           // On subpage: go to home with anchor
//           const targetId = href.substring(1);

//           // Don't use HTMX for this case as we need to properly change the URL
//           link.addEventListener("click", function (e) {
//             e.preventDefault();
//             // Navigate directly to home page with hash
//             window.location.href = `/${currentLang}/#${targetId}`;
//           });
//         }
//       }

//       // Case 2: Home link
//       else if (href === "/" || href === "/home" || href === "index.php") {
//         link.setAttribute("hx-get", `/${currentLang}/`);
//         link.setAttribute("hx-target", "main");
//         link.setAttribute("hx-swap", "innerHTML");
//         link.setAttribute("hx-push-url", "true");
//       }

//       // Case 3: Language switcher links
//       else if (href.includes("/de/") || href.includes("/en/")) {
//         // Get target language from link
//         let targetLang = href.includes("/de/") ? "de" : "en";

//         // Get current path and anchor
//         const currentPath = window.location.pathname.replace(
//           new RegExp(`^\\/${currentLang}`),
//           ""
//         );
//         const currentAnchor = window.location.hash;

//         // New URL with target language
//         const newUrl = `/${targetLang}${currentPath}${currentAnchor}`;

//         // Update link with HTMX attributes
//         link.setAttribute("hx-get", newUrl);
//         link.setAttribute("hx-target", "main");
//         link.setAttribute("hx-swap", "innerHTML");
//         link.setAttribute("hx-push-url", "true");
//       }

//       // Case 4: All other internal links (like /impressum)
//       else if (
//         !href.startsWith("http") &&
//         !href.startsWith("mailto:") &&
//         !href.startsWith("tel:")
//       ) {
//         // Ensure the path has language prefix
//         let path = href;
//         if (!path.startsWith("/")) {
//           path = "/" + path;
//         }

//         // Add language prefix if not present
//         if (!path.startsWith(`/${currentLang}`)) {
//           path = `/${currentLang}${path}`;
//         }

//         // Add HTMX attributes
//         link.setAttribute("hx-get", path);
//         link.setAttribute("hx-target", "main");
//         link.setAttribute("hx-swap", "innerHTML");
//         link.setAttribute("hx-push-url", "true");
//       }
//     });
//   }

//   // Check if we're on home page
//   function isHomePage() {
//     const path = window.location.pathname;
//     const currentLang = getCurrentLang();
//     return (
//       path === `/${currentLang}` || path === `/${currentLang}/` || path === "/"
//     );
//   }

//   // Run once on page load
//   enhanceLinks();

//   // Also set up a mutation observer to catch dynamically added links
//   const observer = new MutationObserver(function (mutations) {
//     let shouldReprocess = false;

//     mutations.forEach(function (mutation) {
//       if (mutation.type === "childList") {
//         for (let node of mutation.addedNodes) {
//           if (
//             node.nodeType === 1 &&
//             (node.tagName === "A" || node.querySelector("a"))
//           ) {
//             shouldReprocess = true;
//             break;
//           }
//         }
//       }
//     });

//     if (shouldReprocess) {
//       enhanceLinks();
//     }
//   });

//   observer.observe(document.body, {
//     childList: true,
//     subtree: true,
//   });

//   console.log("HTMX link enhancement complete");
// });
