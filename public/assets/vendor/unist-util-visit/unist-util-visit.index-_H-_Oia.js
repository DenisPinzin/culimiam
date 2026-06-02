/**
 * Bundled by jsDelivr using Rollup v2.79.2 and Terser v5.39.0.
 * Original file: /npm/unist-util-visit@5.0.0/index.js
 *
 * Do NOT use SRI with dynamically generated files! More information: https://www.jsdelivr.com/using-sri-with-dynamic-files
 */
import{visitParents as t}from"unist-util-visit-parents";export{CONTINUE,EXIT,SKIP}from"unist-util-visit-parents";function n(n,i,e,o){let r,u,f;"function"==typeof i&&"function"!=typeof e?(u=void 0,f=i,r=e):(u=i,f=e,r=o),t(n,u,(function(t,n){const i=n[n.length-1],e=i?i.children.indexOf(t):void 0;return f(t,e,i)}),r)}export{n as visit};export default null;
