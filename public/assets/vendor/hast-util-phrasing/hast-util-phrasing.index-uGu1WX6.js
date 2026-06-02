/**
 * Bundled by jsDelivr using Rollup v2.79.2 and Terser v5.39.0.
 * Original file: /npm/hast-util-phrasing@3.0.1/index.js
 *
 * Do NOT use SRI with dynamically generated files! More information: https://www.jsdelivr.com/using-sri-with-dynamic-files
 */
import{embedded as t}from"hast-util-embedded";import{hasProperty as e}from"hast-util-has-property";import{isBodyOkLink as r}from"hast-util-is-body-ok-link";import{convertElement as m}from"hast-util-is-element";const a=m(["a","abbr","area","b","bdi","bdo","br","button","cite","code","data","datalist","del","dfn","em","i","input","ins","kbd","keygen","label","map","mark","meter","noscript","output","progress","q","ruby","s","samp","script","select","small","span","strong","sub","sup","template","textarea","time","u","var","wbr"]),s=m("meta");function o(m){return Boolean("text"===m.type||a(m)||t(m)||r(m)||s(m)&&e(m,"itemProp"))}export{o as phrasing};export default null;
