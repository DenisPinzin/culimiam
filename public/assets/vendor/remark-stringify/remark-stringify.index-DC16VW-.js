/**
 * Bundled by jsDelivr using Rollup v2.79.2 and Terser v5.39.0.
 * Original file: /npm/remark-stringify@11.0.0/index.js
 *
 * Do NOT use SRI with dynamically generated files! More information: https://www.jsdelivr.com/using-sri-with-dynamic-files
 */
import{toMarkdown as t}from"mdast-util-to-markdown";function n(n){const o=this;o.compiler=function(s){return t(s,{...o.data("settings"),...n,extensions:o.data("toMarkdownExtensions")||[]})}}export{n as default};
