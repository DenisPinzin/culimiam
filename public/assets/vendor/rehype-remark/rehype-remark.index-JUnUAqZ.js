/**
 * Bundled by jsDelivr using Rollup v2.79.2 and Terser v5.39.0.
 * Original file: /npm/rehype-remark@10.0.1/index.js
 *
 * Do NOT use SRI with dynamically generated files! More information: https://www.jsdelivr.com/using-sri-with-dynamic-files
 */
import{toMdast as n}from"hast-util-to-mdast";const t={document:!0};function o(o,u){return o&&"run"in o?async function(r,a){const c=n(r,{...t,...u});await o.run(c,a)}:function(u){return n(u,{...t,...o})}}export{o as default};
