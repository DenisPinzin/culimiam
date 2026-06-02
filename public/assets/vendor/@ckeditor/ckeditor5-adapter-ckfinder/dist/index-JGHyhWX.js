/**
 * Bundled by jsDelivr using Rollup v2.79.2 and Terser v5.39.0.
 * Original file: /npm/@ckeditor/ckeditor5-adapter-ckfinder@48.1.1/dist/index.js
 *
 * Do NOT use SRI with dynamically generated files! More information: https://www.jsdelivr.com/using-sri-with-dynamic-files
 */
import{Plugin as e}from"@ckeditor/ckeditor5-core/dist/index.js";import{FileRepository as t}from"@ckeditor/ckeditor5-upload/dist/index.js";
/**
 * @license Copyright (c) 2003-2026, CKSource Holding sp. z o.o. All rights reserved.
 * For licensing, see LICENSE.md or https://ckeditor.com/legal/ckeditor-licensing-options
 */
/**
 * @license Copyright (c) 2003-2026, CKSource Holding sp. z o.o. All rights reserved.
 * For licensing, see LICENSE.md or https://ckeditor.com/legal/ckeditor-licensing-options
 */const o="ckCsrfToken",n="abcdefghijklmnopqrstuvwxyz0123456789";function r(){let e=s(o);return e&&40==e.length||(e=function(e){let t="";const o=new Uint8Array(e);window.crypto.getRandomValues(o);for(let e=0;e<o.length;e++){const r=n.charAt(o[e]%36);t+=Math.random()>.5?r.toUpperCase():r}return t}(40),i(o,e)),e}function s(e){e=e.toLowerCase();const t=document.cookie.split(";");for(const o of t){const t=o.split("=");if(decodeURIComponent(t[0].trim().toLowerCase())===e)return decodeURIComponent(t[1])}return null}function i(e,t){document.cookie=encodeURIComponent(e)+"="+encodeURIComponent(t)+";path=/"}class d extends e{static get requires(){return[t]}static get pluginName(){return"CKFinderUploadAdapter"}static get isOfficialPlugin(){return!0}init(){const e=this.editor.config.get("ckfinder.uploadUrl");e&&(this.editor.plugins.get(t).createUploadAdapter=t=>new a(t,e,this.editor.t))}}class a{loader;url;t;xhr;constructor(e,t,o){this.loader=e,this.url=t,this.t=o}upload(){return this.loader.file.then((e=>new Promise(((t,o)=>{this._initRequest(),this._initListeners(t,o,e),this._sendRequest(e)}))))}abort(){this.xhr&&this.xhr.abort()}_initRequest(){const e=this.xhr=new XMLHttpRequest;e.open("POST",this.url,!0),e.responseType="json"}_initListeners(e,t,o){const n=this.xhr,r=this.loader,s=(0,this.t)("Cannot upload file:")+` ${o.name}.`;n.addEventListener("error",(()=>t(s))),n.addEventListener("abort",(()=>t())),n.addEventListener("load",(()=>{const o=n.response;if(!o||!o.uploaded)return t(o&&o.error&&o.error.message?o.error.message:s);e({default:o.url})})),
/* istanbul ignore else -- @preserve */n.upload&&n.upload.addEventListener("progress",(e=>{e.lengthComputable&&(r.uploadTotal=e.total,r.uploaded=e.loaded)}))}_sendRequest(e){const t=new FormData;t.append("upload",e),t.append("ckCsrfToken",r()),this.xhr.send(t)}}export{d as CKFinderUploadAdapter,s as _getCKFinderCookie,r as _getCKFinderCsrfToken,i as _setCKFinderCookie};export default null;
