/**
 * Bundled by jsDelivr using Rollup v2.79.2 and Terser v5.39.0.
 * Original file: /npm/rehype-dom-parse@5.0.2/index.js
 *
 * Do NOT use SRI with dynamically generated files! More information: https://www.jsdelivr.com/using-sri-with-dynamic-files
 */
import{fromDom as t}from"hast-util-from-dom";function n(n){const o={...this.data("settings"),...n};this.parser=function(n){const s=!1===o.fragment?e:r;return t(s(n))}}function e(t){return(new DOMParser).parseFromString(t,"text/html")}function r(t){const n=document.createElement("template");return n.innerHTML=t,n.content}export{n as default};
