/**
 * Bundled by jsDelivr using Rollup v2.79.2 and Terser v5.39.0.
 * Original file: /npm/unist-util-position@5.0.0/index.js
 *
 * Do NOT use SRI with dynamically generated files! More information: https://www.jsdelivr.com/using-sri-with-dynamic-files
 */
const n=o("end"),t=o("start");function o(n){return function(t){const o=t&&t.position&&t.position[n]||{};if("number"==typeof o.line&&o.line>0&&"number"==typeof o.column&&o.column>0)return{line:o.line,column:o.column,offset:"number"==typeof o.offset&&o.offset>-1?o.offset:void 0}}}function e(o){const e=t(o),f=n(o);if(e&&f)return{start:e,end:f}}export{n as pointEnd,t as pointStart,e as position};export default null;
