/**
 * Bundled by jsDelivr using Rollup v2.79.2 and Terser v5.39.0.
 * Original file: /npm/unist-util-visit-parents@6.0.1/index.js
 *
 * Do NOT use SRI with dynamically generated files! More information: https://www.jsdelivr.com/using-sri-with-dynamic-files
 */
import{convert as t}from"unist-util-is";import{color as n}from"unist-util-visit-parents/do-not-use-color";const e=[],r=!0,i=!1,o="skip";function f(f,u,c,l){let p;"function"==typeof u&&"function"!=typeof c?(l=c,c=u):p=u;const s=t(p),m=l?-1:1;!function t(f,p,a){const d=f&&"object"==typeof f?f:{};if("string"==typeof d.type){const t="string"==typeof d.tagName?d.tagName:"string"==typeof d.name?d.name:void 0;Object.defineProperty(y,"name",{value:"node ("+n(f.type+(t?"<"+t+">":""))+")"})}return y;function y(){let n,d,y,h=e;if((!u||s(f,p,a[a.length-1]||void 0))&&(h=function(t){if(Array.isArray(t))return t;if("number"==typeof t)return[r,t];return null==t?e:[t]}(c(f,a)),h[0]===i))return h;if("children"in f&&f.children){const e=f;if(e.children&&h[0]!==o)for(d=(l?e.children.length:-1)+m,y=a.concat(e);d>-1&&d<e.children.length;){const r=e.children[d];if(n=t(r,d,y)(),n[0]===i)return n;d="number"==typeof n[1]?n[1]:d+m}}return h}}(f,void 0,[])()}export{r as CONTINUE,i as EXIT,o as SKIP,f as visitParents};export default null;
