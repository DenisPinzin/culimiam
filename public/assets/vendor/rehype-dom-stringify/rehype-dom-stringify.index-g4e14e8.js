/**
 * Bundled by jsDelivr using Rollup v2.79.2 and Terser v5.39.0.
 * Original file: /npm/rehype-dom-stringify@4.0.2/index.js
 *
 * Do NOT use SRI with dynamically generated files! More information: https://www.jsdelivr.com/using-sri-with-dynamic-files
 */
import{toDom as t}from"hast-util-to-dom";function e(e){const o={...this.data("settings"),...e};!1!==o.fragment&&(o.fragment=!0),this.compiler=function(e){return n(t(e,o))}}function n(t){if("doctype"in t){return(t.doctype?n(t.doctype):"")+(t.documentElement?n(t.documentElement):"")}if("publicId"in t)return"<DOCTYPE html>";const e=document.createElement("template");return e.content.append(t),e.innerHTML}export{e as default};
