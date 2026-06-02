/**
 * Bundled by jsDelivr using Rollup v2.79.2 and Terser v5.39.0.
 * Original file: /npm/trough@2.2.0/index.js
 *
 * Do NOT use SRI with dynamically generated files! More information: https://www.jsdelivr.com/using-sri-with-dynamic-files
 */
function n(){const n=[],e={run:function(...e){let o=-1;const u=e.pop();if("function"!=typeof u)throw new TypeError("Expected function as last argument, not "+u);!function r(f,...c){const l=n[++o];let i=-1;if(f)u(f);else{for(;++i<e.length;)null!==c[i]&&void 0!==c[i]||(c[i]=e[i]);e=c,l?t(l,r)(...c):u(null,...c)}}(null,...e)},use:function(t){if("function"!=typeof t)throw new TypeError("Expected `middelware` to be a function, not "+t);return n.push(t),e}};return e}function t(n,t){let e;return function(...t){const r=n.length>t.length;let f;r&&t.push(o);try{f=n.apply(this,t)}catch(n){if(r&&e)throw n;return o(n)}r||(f&&f.then&&"function"==typeof f.then?f.then(u,o):f instanceof Error?o(f):u(f))};function o(n,...o){e||(e=!0,t(n,...o))}function u(n){o(null,n)}}export{n as trough,t as wrap};export default null;
