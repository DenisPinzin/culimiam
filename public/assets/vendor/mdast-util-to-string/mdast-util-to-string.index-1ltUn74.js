/**
 * Bundled by jsDelivr using Rollup v2.79.2 and Terser v5.39.0.
 * Original file: /npm/mdast-util-to-string@4.0.0/index.js
 *
 * Do NOT use SRI with dynamically generated files! More information: https://www.jsdelivr.com/using-sri-with-dynamic-files
 */
const n={};function t(t,l){const r=l||n;return e(t,"boolean"!=typeof r.includeImageAlt||r.includeImageAlt,"boolean"!=typeof r.includeHtml||r.includeHtml)}function e(n,t,e){if(function(n){return Boolean(n&&"object"==typeof n)}(n)){if("value"in n)return"html"!==n.type||e?n.value:"";if(t&&"alt"in n&&n.alt)return n.alt;if("children"in n)return l(n.children,t,e)}return Array.isArray(n)?l(n,t,e):""}function l(n,t,l){const r=[];let o=-1;for(;++o<n.length;)r[o]=e(n[o],t,l);return r.join("")}export{t as toString};export default null;
