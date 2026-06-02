/**
 * Bundled by jsDelivr using Rollup v2.79.2 and Terser v5.39.0.
 * Original file: /npm/trim-trailing-lines@2.1.0/index.js
 *
 * Do NOT use SRI with dynamically generated files! More information: https://www.jsdelivr.com/using-sri-with-dynamic-files
 */
function t(t){const e=String(t);let n=e.length;for(;n>0;){const t=e.codePointAt(n-1);if(void 0===t||10!==t&&13!==t)break;n--}return e.slice(0,n)}export{t as trimTrailingLines};export default null;
