/**
 * Bundled by jsDelivr using Rollup v2.79.2 and Terser v5.39.0.
 * Original file: /npm/micromark-util-combine-extensions@2.0.0/index.js
 *
 * Do NOT use SRI with dynamically generated files! More information: https://www.jsdelivr.com/using-sri-with-dynamic-files
 */
import{splice as t}from"micromark-util-chunked";const n={}.hasOwnProperty;function o(t){const n={};let o=-1;for(;++o<t.length;)r(n,t[o]);return n}function r(t,o){let r;for(r in o){const e=(n.call(t,r)?t[r]:void 0)||(t[r]={}),c=o[r];let f;if(c)for(f in c){n.call(e,f)||(e[f]=[]);const t=c[f];l(e[f],Array.isArray(t)?t:t?[t]:[])}}}function l(n,o){let r=-1;const l=[];for(;++r<o.length;)("after"===o[r].add?n:l).push(o[r]);t(n,0,0,l)}function e(t){const n={};let o=-1;for(;++o<t.length;)c(n,t[o]);return n}function c(t,o){let r;for(r in o){const l=(n.call(t,r)?t[r]:void 0)||(t[r]={}),e=o[r];let c;if(e)for(c in e)l[c]=e[c]}}export{o as combineExtensions,e as combineHtmlExtensions};export default null;
