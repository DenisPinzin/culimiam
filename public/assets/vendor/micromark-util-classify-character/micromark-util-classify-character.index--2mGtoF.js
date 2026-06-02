/**
 * Bundled by jsDelivr using Rollup v2.79.2 and Terser v5.39.0.
 * Original file: /npm/micromark-util-classify-character@2.0.0/index.js
 *
 * Do NOT use SRI with dynamically generated files! More information: https://www.jsdelivr.com/using-sri-with-dynamic-files
 */
import{markdownLineEndingOrSpace as r,unicodeWhitespace as t,unicodePunctuation as o}from"micromark-util-character";function e(e){return null===e||r(e)||t(e)?1:o(e)?2:void 0}export{e as classifyCharacter};export default null;
