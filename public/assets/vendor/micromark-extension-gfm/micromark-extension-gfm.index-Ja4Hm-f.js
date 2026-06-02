/**
 * Bundled by jsDelivr using Rollup v2.79.2 and Terser v5.39.0.
 * Original file: /npm/micromark-extension-gfm@3.0.0/index.js
 *
 * Do NOT use SRI with dynamically generated files! More information: https://www.jsdelivr.com/using-sri-with-dynamic-files
 */
import{combineExtensions as m,combineHtmlExtensions as o}from"micromark-util-combine-extensions";import{gfmAutolinkLiteral as r,gfmAutolinkLiteralHtml as t}from"micromark-extension-gfm-autolink-literal";import{gfmFootnote as e,gfmFootnoteHtml as i}from"micromark-extension-gfm-footnote";import{gfmStrikethrough as n,gfmStrikethroughHtml as f}from"micromark-extension-gfm-strikethrough";import{gfmTable as s,gfmTableHtml as p}from"micromark-extension-gfm-table";import{gfmTagfilterHtml as a}from"micromark-extension-gfm-tagfilter";import{gfmTaskListItem as c,gfmTaskListItemHtml as k}from"micromark-extension-gfm-task-list-item";function l(o){return m([r(),e(),n(o),s(),c()])}function u(m){return o([t(),i(m),f(),p(),a(),k()])}export{l as gfm,u as gfmHtml};export default null;
