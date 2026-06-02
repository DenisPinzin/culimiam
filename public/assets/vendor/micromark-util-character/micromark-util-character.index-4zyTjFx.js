/**
 * Bundled by jsDelivr using Rollup v2.79.2 and Terser v5.39.0.
 * Original file: /npm/micromark-util-character@2.0.0/index.js
 *
 * Do NOT use SRI with dynamically generated files! More information: https://www.jsdelivr.com/using-sri-with-dynamic-files
 */
const n=s(/[A-Za-z]/),t=s(/[\dA-Za-z]/),u=s(/[#-'*+\--9=?A-Z^-~]/);function r(n){return null!==n&&(n<32||127===n)}const o=s(/\d/),e=s(/[\dA-Fa-f]/),l=s(/[!-/:-@[-`{-~]/);function c(n){return null!==n&&n<-2}function f(n){return null!==n&&(n<0||32===n)}function i(n){return-2===n||-1===n||32===n}const a=s(/\p{P}/u),d=s(/\s/);function s(n){return function(t){return null!==t&&t>-1&&n.test(String.fromCharCode(t))}}export{n as asciiAlpha,t as asciiAlphanumeric,u as asciiAtext,r as asciiControl,o as asciiDigit,e as asciiHexDigit,l as asciiPunctuation,c as markdownLineEnding,f as markdownLineEndingOrSpace,i as markdownSpace,a as unicodePunctuation,d as unicodeWhitespace};export default null;
