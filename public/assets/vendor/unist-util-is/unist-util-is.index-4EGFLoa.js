/**
 * Bundled by jsDelivr using Rollup v2.79.2 and Terser v5.39.0.
 * Original file: /npm/unist-util-is@6.0.0/index.js
 *
 * Do NOT use SRI with dynamically generated files! More information: https://www.jsdelivr.com/using-sri-with-dynamic-files
 */
const n=function(r,e,u,i,f){const c=t(e);if(null!=u&&("number"!=typeof u||u<0||u===Number.POSITIVE_INFINITY))throw new Error("Expected positive finite index");if(!(null==i||n(i)&&i.children))throw new Error("Expected parent node");if(null==i!=(null==u))throw new Error("Expected both parent and index");return!!o(r)&&c.call(f,r,u,i)},t=function(n){if(null==n)return e;if("function"==typeof n)return r(n);if("object"==typeof n)return Array.isArray(n)?function(n){const e=[];let o=-1;for(;++o<n.length;)e[o]=t(n[o]);return r(u);function u(...n){let t=-1;for(;++t<e.length;)if(e[t].apply(this,n))return!0;return!1}}(n):function(n){const t=n;return r(e);function e(r){const e=r;let o;for(o in n)if(e[o]!==t[o])return!1;return!0}}(n);if("string"==typeof n)return function(n){return r(t);function t(t){return t&&t.type===n}}(n);throw new Error("Expected function, string, or object as test")};function r(n){return function(t,r,e){return Boolean(o(t)&&n.call(this,t,"number"==typeof r?r:void 0,e||void 0))}}function e(){return!0}function o(n){return null!==n&&"object"==typeof n&&"type"in n}export{t as convert,n as is};export default null;
