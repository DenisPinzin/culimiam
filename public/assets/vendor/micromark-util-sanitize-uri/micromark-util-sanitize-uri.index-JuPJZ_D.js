/**
 * Bundled by jsDelivr using Rollup v2.79.2 and Terser v5.39.0.
 * Original file: /npm/micromark-util-sanitize-uri@2.0.0/index.js
 *
 * Do NOT use SRI with dynamically generated files! More information: https://www.jsdelivr.com/using-sri-with-dynamic-files
 */
import{asciiAlphanumeric as e}from"micromark-util-character";import{encode as r}from"micromark-util-encode";function t(e,t){const n=r(o(e||""));if(!t)return n;const i=n.indexOf(":"),c=n.indexOf("?"),f=n.indexOf("#"),m=n.indexOf("/");return i<0||m>-1&&i>m||c>-1&&i>c||f>-1&&i>f||t.test(n.slice(0,i))?n:""}function o(r){const t=[];let o=-1,n=0,i=0;for(;++o<r.length;){const c=r.charCodeAt(o);let f="";if(37===c&&e(r.charCodeAt(o+1))&&e(r.charCodeAt(o+2)))i=2;else if(c<128)/[!#$&-;=?-Z_a-z~]/.test(String.fromCharCode(c))||(f=String.fromCharCode(c));else if(c>55295&&c<57344){const e=r.charCodeAt(o+1);c<56320&&e>56319&&e<57344?(f=String.fromCharCode(c,e),i=1):f="�"}else f=String.fromCharCode(c);f&&(t.push(r.slice(n,o),encodeURIComponent(f)),n=o+i+1,f=""),i&&(o+=i,i=0)}return t.join("")+r.slice(n)}export{o as normalizeUri,t as sanitizeUri};export default null;
