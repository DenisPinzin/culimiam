/**
 * Bundled by jsDelivr using Rollup v2.79.2 and Terser v5.39.0.
 * Original file: /npm/remark-parse@11.0.0/index.js
 *
 * Do NOT use SRI with dynamically generated files! More information: https://www.jsdelivr.com/using-sri-with-dynamic-files
 */
import{fromMarkdown as t}from"mdast-util-from-markdown";function n(n){const s=this;s.parser=function(o){return t(o,{...s.data("settings"),...n,extensions:s.data("micromarkExtensions")||[],mdastExtensions:s.data("fromMarkdownExtensions")||[]})}}export{n as default};
