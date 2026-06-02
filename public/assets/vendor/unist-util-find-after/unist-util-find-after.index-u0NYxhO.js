/**
 * Bundled by jsDelivr using Rollup v2.79.2 and Terser v5.39.0.
 * Original file: /npm/unist-util-find-after@5.0.0/index.js
 *
 * Do NOT use SRI with dynamically generated files! More information: https://www.jsdelivr.com/using-sri-with-dynamic-files
 */
import{convert as e}from"unist-util-is";const r=function(r,n,i){const t=e(i);if(!r||!r.type||!r.children)throw new Error("Expected parent node");if("number"==typeof n){if(n<0||n===Number.POSITIVE_INFINITY)throw new Error("Expected positive finite number as index")}else if((n=r.children.indexOf(n))<0)throw new Error("Expected child node or index");for(;++n<r.children.length;)if(t(r.children[n],n,r))return r.children[n]};export{r as findAfter};export default null;
