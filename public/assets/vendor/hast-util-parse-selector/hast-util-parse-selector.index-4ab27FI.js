/**
 * Bundled by jsDelivr using Rollup v2.79.2 and Terser v5.39.0.
 * Original file: /npm/hast-util-parse-selector@4.0.0/index.js
 *
 * Do NOT use SRI with dynamically generated files! More information: https://www.jsdelivr.com/using-sri-with-dynamic-files
 */
const e=/[#.]/g;function t(t,l){const n=t||"",s={};let a,r,c=0;for(;c<n.length;){e.lastIndex=c;const t=e.exec(n),l=n.slice(c,t?t.index:n.length);l&&(a?"#"===a?s.id=l:Array.isArray(s.className)?s.className.push(l):s.className=[l]:r=l,c+=l.length),t&&(a=t[0],c++)}return{type:"element",tagName:r||l||"div",properties:s,children:[]}}export{t as parseSelector};export default null;
