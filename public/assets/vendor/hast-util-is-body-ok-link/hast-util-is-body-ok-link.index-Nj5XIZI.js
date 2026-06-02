/**
 * Bundled by jsDelivr using Rollup v2.79.2 and Terser v5.39.0.
 * Original file: /npm/hast-util-is-body-ok-link@3.0.0/index.js
 *
 * Do NOT use SRI with dynamically generated files! More information: https://www.jsdelivr.com/using-sri-with-dynamic-files
 */
const e=new Set(["pingback","prefetch","stylesheet"]);function r(r){if("element"!==r.type||"link"!==r.tagName)return!1;if(r.properties.itemProp)return!0;const t=r.properties.rel;let n=-1;if(!Array.isArray(t)||0===t.length)return!1;for(;++n<t.length;)if(!e.has(String(t[n])))return!1;return!0}export{r as isBodyOkLink};export default null;
