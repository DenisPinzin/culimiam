/**
 * Bundled by jsDelivr using Rollup v2.79.2 and Terser v5.39.0.
 * Original file: /npm/hast-util-from-dom@5.0.1/index.js
 *
 * Do NOT use SRI with dynamically generated files! More information: https://www.jsdelivr.com/using-sri-with-dynamic-files
 */
import{s as t,h as e}from"hastscript";import{webNamespaces as n}from"web-namespaces";function r(t,e){return o(t,e||{})||{type:"root",children:[]}}function o(r,o){const c=function(r,o){switch(r.nodeType){case 1:return function(r,o){const u=r.namespaceURI,c=u===n.svg?t:e,s=u===n.html?r.tagName.toLowerCase():r.tagName,m=u===n.html&&"template"===s?r.content:r,f=r.getAttributeNames(),i={};let l=-1;for(;++l<f.length;)i[f[l]]=r.getAttribute(f[l])||"";return c(s,i,a(m,o))}(r,o);case 3:return function(t){return{type:"text",value:t.nodeValue||""}}(r);case 8:return function(t){return{type:"comment",value:t.nodeValue||""}}(r);case 9:return u(r,o);case 10:return{type:"doctype"};case 11:return u(r,o);default:return}}(r,o);return c&&o.afterTransform&&o.afterTransform(r,c),c}function u(t,e){return{type:"root",children:a(t,e)}}function a(t,e){const n=t.childNodes,r=[];let u=-1;for(;++u<n.length;){const t=o(n[u],e);void 0!==t&&r.push(t)}return r}export{r as fromDom};export default null;
