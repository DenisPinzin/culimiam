/**
 * Bundled by jsDelivr using Rollup v2.79.2 and Terser v5.39.0.
 * Original file: /npm/micromark-util-decode-string@2.0.0/index.js
 *
 * Do NOT use SRI with dynamically generated files! More information: https://www.jsdelivr.com/using-sri-with-dynamic-files
 */
import{decodeNamedCharacterReference as e}from"decode-named-character-reference";import{decodeNumericCharacterReference as r}from"micromark-util-decode-numeric-character-reference";const c=/\\([!-/:-@[-`{-~])|&(#(?:\d{1,7}|x[\da-f]{1,6})|[\da-z]{1,31});/gi;function t(e){return e.replace(c,n)}function n(c,t,n){if(t)return t;if(35===n.charCodeAt(0)){const e=n.charCodeAt(1),c=120===e||88===e;return r(n.slice(c?2:1),c?16:10)}return e(n)||c}export{t as decodeString};export default null;
