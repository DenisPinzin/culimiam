/**
 * Bundled by jsDelivr using Rollup v2.79.2 and Terser v5.39.0.
 * Original file: /npm/micromark-factory-whitespace@2.0.0/index.js
 *
 * Do NOT use SRI with dynamically generated files! More information: https://www.jsdelivr.com/using-sri-with-dynamic-files
 */
import{factorySpace as r}from"micromark-factory-space";import{markdownLineEnding as e,markdownSpace as n}from"micromark-util-character";function i(i,t){let m;return function o(f){if(e(f))return i.enter("lineEnding"),i.consume(f),i.exit("lineEnding"),m=!0,o;if(n(f))return r(i,o,m?"linePrefix":"lineSuffix")(f);return t(f)}}export{i as factoryWhitespace};export default null;
