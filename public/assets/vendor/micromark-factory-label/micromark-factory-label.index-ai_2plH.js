/**
 * Bundled by jsDelivr using Rollup v2.79.2 and Terser v5.39.0.
 * Original file: /npm/micromark-factory-label@2.0.0/index.js
 *
 * Do NOT use SRI with dynamically generated files! More information: https://www.jsdelivr.com/using-sri-with-dynamic-files
 */
import{markdownLineEnding as n,markdownSpace as e}from"micromark-util-character";function t(t,r,i,u,o,c){const s=this;let l,m=0;return function(n){return t.enter(u),t.enter(o),t.consume(n),t.exit(o),t.enter(c),p};function p(e){return m>999||null===e||91===e||93===e&&!l||94===e&&!m&&"_hiddenFootnoteSupport"in s.parser.constructs?i(e):93===e?(t.exit(c),t.enter(o),t.consume(e),t.exit(o),t.exit(u),r):n(e)?(t.enter("lineEnding"),t.consume(e),t.exit("lineEnding"),p):(t.enter("chunkString",{contentType:"string"}),x(e))}function x(r){return null===r||91===r||93===r||n(r)||m++>999?(t.exit("chunkString"),p(r)):(t.consume(r),l||(l=!e(r)),92===r?f:x)}function f(n){return 91===n||92===n||93===n?(t.consume(n),m++,x):x(n)}}export{t as factoryLabel};export default null;
