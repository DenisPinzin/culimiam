/**
 * Bundled by jsDelivr using Rollup v2.79.2 and Terser v5.39.0.
 * Original file: /npm/micromark-factory-space@2.0.0/index.js
 *
 * Do NOT use SRI with dynamically generated files! More information: https://www.jsdelivr.com/using-sri-with-dynamic-files
 */
import{markdownSpace as r}from"micromark-util-character";function t(t,e,n,u){const o=u?u-1:Number.POSITIVE_INFINITY;let c=0;return function(u){if(r(u))return t.enter(n),i(u);return e(u)};function i(u){return r(u)&&c++<o?(t.consume(u),i):(t.exit(n),e(u))}}export{t as factorySpace};export default null;
