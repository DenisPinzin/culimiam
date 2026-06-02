/**
 * Bundled by jsDelivr using Rollup v2.79.2 and Terser v5.39.0.
 * Original file: /npm/micromark-util-encode@2.0.0/index.js
 *
 * Do NOT use SRI with dynamically generated files! More information: https://www.jsdelivr.com/using-sri-with-dynamic-files
 */
const t={'"':"quot","&":"amp","<":"lt",">":"gt"};function n(n){return n.replace(/["&<>]/g,(function(n){return"&"+t[n]+";"}))}export{n as encode};export default null;
