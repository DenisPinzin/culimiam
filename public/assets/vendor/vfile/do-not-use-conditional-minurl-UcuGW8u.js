/**
 * Bundled by jsDelivr using Rollup v2.79.2 and Terser v5.39.0.
 * Original file: /npm/vfile@6.0.1/lib/minurl.browser.js
 *
 * Do NOT use SRI with dynamically generated files! More information: https://www.jsdelivr.com/using-sri-with-dynamic-files
 */
function o(o){return Boolean(null!==o&&"object"==typeof o&&"href"in o&&o.href&&"protocol"in o&&o.protocol&&void 0===o.auth)}function e(e){if("string"==typeof e)e=new URL(e);else if(!o(e)){const o=new TypeError('The "path" argument must be of type string or an instance of URL. Received `'+e+"`");throw o.code="ERR_INVALID_ARG_TYPE",o}if("file:"!==e.protocol){const o=new TypeError("The URL must be of scheme file");throw o.code="ERR_INVALID_URL_SCHEME",o}return function(o){if(""!==o.hostname){const o=new TypeError('File URL host must be "localhost" or empty on darwin');throw o.code="ERR_INVALID_FILE_URL_HOST",o}const e=o.pathname;let t=-1;for(;++t<e.length;)if(37===e.codePointAt(t)&&50===e.codePointAt(t+1)){const o=e.codePointAt(t+2);if(70===o||102===o){const o=new TypeError("File URL path must not include encoded / characters");throw o.code="ERR_INVALID_FILE_URL_PATH",o}}return decodeURIComponent(e)}(e)}export{o as isUrl,e as urlToPath};export default null;
