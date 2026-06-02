/**
 * Bundled by jsDelivr using Rollup v2.79.2 and Terser v5.39.0.
 * Original file: /npm/mdast-util-gfm-strikethrough@2.0.0/index.js
 *
 * Do NOT use SRI with dynamically generated files! More information: https://www.jsdelivr.com/using-sri-with-dynamic-files
 */
const e=["autolink","destinationLiteral","destinationRaw","reference","titleQuote","titleApostrophe"];function t(){return{canContainEols:["delete"],enter:{strikethrough:r},exit:{strikethrough:o}}}function n(){return{unsafe:[{character:"~",inConstruct:"phrasing",notInConstruct:e}],handlers:{delete:i}}}function r(e){this.enter({type:"delete",children:[]},e)}function o(e){this.exit(e)}function i(e,t,n,r){const o=n.createTracker(r),i=n.enter("strikethrough");let u=o.move("~~");return u+=n.containerPhrasing(e,{...o.current(),before:u,after:"~"}),u+=o.move("~~"),i(),u}i.peek=function(){return"~"};export{t as gfmStrikethroughFromMarkdown,n as gfmStrikethroughToMarkdown};export default null;
