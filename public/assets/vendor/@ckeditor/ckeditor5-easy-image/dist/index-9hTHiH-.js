/**
 * Bundled by jsDelivr using Rollup v2.79.2 and Terser v5.39.0.
 * Original file: /npm/@ckeditor/ckeditor5-easy-image@48.1.1/dist/index.js
 *
 * Do NOT use SRI with dynamically generated files! More information: https://www.jsdelivr.com/using-sri-with-dynamic-files
 */
import{Plugin as e}from"@ckeditor/ckeditor5-core/dist/index.js";import{ImageUpload as t}from"@ckeditor/ckeditor5-image/dist/index.js";import{logWarning as i}from"@ckeditor/ckeditor5-utils/dist/index.js";import{FileRepository as a}from"@ckeditor/ckeditor5-upload/dist/index.js";import{CloudServices as r}from"@ckeditor/ckeditor5-cloud-services/dist/index.js";
/**
 * @license Copyright (c) 2003-2026, CKSource Holding sp. z o.o. All rights reserved.
 * For licensing, see LICENSE.md or https://ckeditor.com/legal/ckeditor-licensing-options
 */class s extends e{_uploadGateway;static get pluginName(){return"CloudServicesUploadAdapter"}static get isOfficialPlugin(){return!0}static get requires(){return[r,a]}init(){const e=this.editor,t=e.plugins.get(r),i=t.token,s=t.uploadUrl;if(!i)return;const d=e.plugins.get("CloudServicesCore");this._uploadGateway=d.createUploadGateway(i,s),e.plugins.get(a).createUploadAdapter=e=>new o(this._uploadGateway,e)}}class o{uploadGateway;loader;fileUploader;constructor(e,t){this.uploadGateway=e,this.loader=t}upload(){return this.loader.file.then((e=>(this.fileUploader=this.uploadGateway.upload(e),this.fileUploader.on("progress",((e,t)=>{this.loader.uploadTotal=t.total,this.loader.uploaded=t.uploaded})),this.fileUploader.send())))}abort(){this.fileUploader.abort()}}class d extends e{static get pluginName(){return"EasyImage"}static get isOfficialPlugin(){return!0}static get requires(){return[s,t]}init(){const e=this.editor;e.plugins.has("ImageBlockEditing")||e.plugins.has("ImageInlineEditing")||i("easy-image-image-feature-missing",e)}}export{s as CloudServicesUploadAdapter,d as EasyImage};export default null;
