/**
 * Bundled by jsDelivr using Rollup v2.79.2 and Terser v5.39.0.
 * Original file: /npm/micromark-factory-destination@2.0.0/index.js
 *
 * Do NOT use SRI with dynamically generated files! More information: https://www.jsdelivr.com/using-sri-with-dynamic-files
 */
import{asciiControl as n,markdownLineEnding as e,markdownLineEndingOrSpace as t}from"micromark-util-character";function r(r,u,i,c,o,m,l,s,x){const f=x||Number.POSITIVE_INFINITY;let g=0;return function(e){if(60===e)return r.enter(c),r.enter(o),r.enter(m),r.consume(e),r.exit(m),p;if(null===e||32===e||41===e||n(e))return i(e);return r.enter(c),r.enter(l),r.enter(s),r.enter("chunkString",{contentType:"string"}),I(e)};function p(n){return 62===n?(r.enter(m),r.consume(n),r.exit(m),r.exit(o),r.exit(c),u):(r.enter(s),r.enter("chunkString",{contentType:"string"}),h(n))}function h(n){return 62===n?(r.exit("chunkString"),r.exit(s),p(n)):null===n||60===n||e(n)?i(n):(r.consume(n),92===n?k:h)}function k(n){return 60===n||62===n||92===n?(r.consume(n),h):h(n)}function I(e){return g||null!==e&&41!==e&&!t(e)?g<f&&40===e?(r.consume(e),g++,I):41===e?(r.consume(e),g--,I):null===e||32===e||40===e||n(e)?i(e):(r.consume(e),92===e?S:I):(r.exit("chunkString"),r.exit(s),r.exit(l),r.exit(c),u(e))}function S(n){return 40===n||41===n||92===n?(r.consume(n),I):I(n)}}export{r as factoryDestination};export default null;
