/**
 * Bundled by jsDelivr using Rollup v2.79.2 and Terser v5.39.0.
 * Original file: /npm/unist-util-stringify-position@4.0.0/index.js
 *
 * Do NOT use SRI with dynamically generated files! More information: https://www.jsdelivr.com/using-sri-with-dynamic-files
 */
function n(n){return n&&"object"==typeof n?"position"in n||"type"in n?e(n.position):"start"in n||"end"in n?e(n):"line"in n||"column"in n?t(n):"":""}function t(n){return i(n&&n.line)+":"+i(n&&n.column)}function e(n){return t(n&&n.start)+"-"+t(n&&n.end)}function i(n){return n&&"number"==typeof n?n:1}export{n as stringifyPosition};export default null;
