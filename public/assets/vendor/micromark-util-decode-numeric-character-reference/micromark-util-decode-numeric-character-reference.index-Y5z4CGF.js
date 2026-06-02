/**
 * Bundled by jsDelivr using Rollup v2.79.2 and Terser v5.39.0.
 * Original file: /npm/micromark-util-decode-numeric-character-reference@2.0.0/index.js
 *
 * Do NOT use SRI with dynamically generated files! More information: https://www.jsdelivr.com/using-sri-with-dynamic-files
 */
function r(r,t){const e=Number.parseInt(r,t);return e<9||11===e||e>13&&e<32||e>126&&e<160||e>55295&&e<57344||e>64975&&e<65008||!(65535&~e)||65534==(65535&e)||e>1114111?"�":String.fromCharCode(e)}export{r as decodeNumericCharacterReference};export default null;
