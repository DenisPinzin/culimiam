/**
 * Bundled by jsDelivr using Rollup v2.79.2 and Terser v5.39.0.
 * Original file: /npm/micromark-factory-title@2.0.0/index.js
 *
 * Do NOT use SRI with dynamically generated files! More information: https://www.jsdelivr.com/using-sri-with-dynamic-files
 */
import{factorySpace as n}from"micromark-factory-space";import{markdownLineEnding as e}from"micromark-util-character";function t(t,r,i,u,o,c){let m;return function(n){if(34===n||39===n||40===n)return t.enter(u),t.enter(o),t.consume(n),t.exit(o),m=40===n?41:n,f;return i(n)};function f(n){return n===m?(t.enter(o),t.consume(n),t.exit(o),t.exit(u),r):(t.enter(c),l(n))}function l(r){return r===m?(t.exit(c),f(m)):null===r?i(r):e(r)?(t.enter("lineEnding"),t.consume(r),t.exit("lineEnding"),n(t,l,"linePrefix")):(t.enter("chunkString",{contentType:"string"}),s(r))}function s(n){return n===m||null===n||e(n)?(t.exit("chunkString"),l(n)):(t.consume(n),92===n?x:s)}function x(n){return n===m||92===n?(t.consume(n),s):s(n)}}export{t as factoryTitle};export default null;
