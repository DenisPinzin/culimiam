/**
 * Bundled by jsDelivr using Rollup v2.79.2 and Terser v5.39.0.
 * Original file: /npm/micromark-util-chunked@2.0.0/index.js
 *
 * Do NOT use SRI with dynamically generated files! More information: https://www.jsdelivr.com/using-sri-with-dynamic-files
 */
function e(e,t,l,n){const i=e.length;let f,r=0;if(t=t<0?-t>i?0:i+t:t>i?i:t,l=l>0?l:0,n.length<1e4)f=Array.from(n),f.unshift(t,l),e.splice(...f);else for(l&&e.splice(t,l);r<n.length;)f=n.slice(r,r+1e4),f.unshift(t,0),e.splice(...f),r+=1e4,t+=1e4}function t(t,l){return t.length>0?(e(t,t.length,0,l),t):l}export{t as push,e as splice};export default null;
