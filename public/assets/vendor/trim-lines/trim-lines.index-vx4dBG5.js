/**
 * Bundled by jsDelivr using Rollup v2.79.2 and Terser v5.39.0.
 * Original file: /npm/trim-lines@3.0.1/index.js
 *
 * Do NOT use SRI with dynamically generated files! More information: https://www.jsdelivr.com/using-sri-with-dynamic-files
 */
function e(e){const n=String(e),o=/\r?\n|\r/g;let i=o.exec(n),c=0;const l=[];for(;i;)l.push(t(n.slice(c,i.index),c>0,!0),i[0]),c=i.index+i[0].length,i=o.exec(n);return l.push(t(n.slice(c),c>0,!1)),l.join("")}function t(e,t,n){let o=0,i=e.length;if(t){let t=e.codePointAt(o);for(;9===t||32===t;)o++,t=e.codePointAt(o)}if(n){let t=e.codePointAt(i-1);for(;9===t||32===t;)i--,t=e.codePointAt(i-1)}return i>o?e.slice(o,i):""}export{e as trimLines};export default null;
