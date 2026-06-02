/**
 * Bundled by jsDelivr using Rollup v2.79.2 and Terser v5.39.0.
 * Original file: /npm/mdast-util-gfm@3.1.0/index.js
 *
 * Do NOT use SRI with dynamically generated files! More information: https://www.jsdelivr.com/using-sri-with-dynamic-files
 */
import{gfmAutolinkLiteralFromMarkdown as t,gfmAutolinkLiteralToMarkdown as m}from"mdast-util-gfm-autolink-literal";import{gfmFootnoteFromMarkdown as o,gfmFootnoteToMarkdown as r}from"mdast-util-gfm-footnote";import{gfmStrikethroughFromMarkdown as i,gfmStrikethroughToMarkdown as e}from"mdast-util-gfm-strikethrough";import{gfmTableFromMarkdown as n,gfmTableToMarkdown as s}from"mdast-util-gfm-table";import{gfmTaskListItemFromMarkdown as f,gfmTaskListItemToMarkdown as l}from"mdast-util-gfm-task-list-item";function u(){return[t(),o(),i(),n(),f()]}function p(t){return{extensions:[m(),r(t),e(),s(t),l()]}}export{u as gfmFromMarkdown,p as gfmToMarkdown};export default null;
