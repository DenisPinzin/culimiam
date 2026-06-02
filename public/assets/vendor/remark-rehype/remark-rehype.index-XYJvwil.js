/**
 * Bundled by jsDelivr using Rollup v2.79.2 and Terser v5.39.0.
 * Original file: /npm/remark-rehype@11.1.2/index.js
 *
 * Do NOT use SRI with dynamically generated files! More information: https://www.jsdelivr.com/using-sri-with-dynamic-files
 */
import{toHast as t}from"mdast-util-to-hast";export{defaultFootnoteBackContent,defaultFootnoteBackLabel,defaultHandlers}from"mdast-util-to-hast";function n(n,o){return n&&"run"in n?async function(e,a){const u=t(e,{file:a,...o});await n.run(u,a)}:function(e,a){return t(e,{file:a,...n||o})}}export{n as default};
