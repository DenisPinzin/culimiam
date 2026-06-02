/**
 * Bundled by jsDelivr using Rollup v2.79.2 and Terser v5.39.0.
 * Original file: /npm/remark-gfm@4.0.1/index.js
 *
 * Do NOT use SRI with dynamically generated files! More information: https://www.jsdelivr.com/using-sri-with-dynamic-files
 */
import{gfmFromMarkdown as o,gfmToMarkdown as n}from"mdast-util-gfm";import{gfm as s}from"micromark-extension-gfm";const t={};function m(m){const r=m||t,i=this.data(),a=i.micromarkExtensions||(i.micromarkExtensions=[]),e=i.fromMarkdownExtensions||(i.fromMarkdownExtensions=[]),f=i.toMarkdownExtensions||(i.toMarkdownExtensions=[]);a.push(s(r)),e.push(o()),f.push(n(r))}export{m as default};
