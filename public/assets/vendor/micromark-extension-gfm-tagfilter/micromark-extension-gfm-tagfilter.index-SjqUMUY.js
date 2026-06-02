/**
 * Bundled by jsDelivr using Rollup v2.79.2 and Terser v5.39.0.
 * Original file: /npm/micromark-extension-gfm-tagfilter@2.0.0/index.js
 *
 * Do NOT use SRI with dynamically generated files! More information: https://www.jsdelivr.com/using-sri-with-dynamic-files
 */
const t=/<(\/?)(iframe|noembed|noframes|plaintext|script|style|title|textarea|xmp)(?=[\t\n\f\r />])/gi,e=new RegExp("^"+t.source,"i");function l(){return{exit:{htmlFlowData(e){i.call(this,e,t)},htmlTextData(t){i.call(this,t,e)}}}}function i(t,e){let l=this.sliceSerialize(t);this.options.allowDangerousHtml&&(l=l.replace(e,"&lt;$1$2")),this.raw(this.encode(l))}export{l as gfmTagfilterHtml};export default null;
