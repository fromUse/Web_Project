/**
 * @license Copyright (c) 2003-2014, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.html or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	config.skin = 'moono';
	config.uiColor = '#d0d2d0';
	config.height=320;
	config.allowedContent=true;
	/*
	config.toolbar=[
		{ name: 'document',    items : [ 'Source','-','Save','NewPage','DocProps','Preview','Print','-','Templates' ] },
		{ name: 'clipboard',   items : [ 'Cut','Copy','Paste','PasteText','PasteFromWord','-','Undo','Redo' ] },
		{ name: 'editing',     items : [ 'Find','Replace','-','SelectAll','-','SpellChecker', 'Scayt' ] },
		{ name: 'forms',       items : [ 'Form', 'Checkbox', 'Radio', 'TextField', 'Textarea', 'Select', 'Button', 'ImageButton', 'HiddenField' ] },
		'/',
		{ name: 'basicstyles', items : [ 'Bold','Italic','Underline','Strike','Subscript','Superscript','-','RemoveFormat' ] },
		{ name: 'paragraph',   items : [ 'NumberedList','BulletedList','-','Outdent','Indent','-','Blockquote','CreateDiv','-','JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock','-','BidiLtr','BidiRtl' ] },
		{ name: 'links',       items : [ 'Link','Unlink','Anchor' ] },
		{ name: 'insert',      items : [ 'Image','Flash','Table','HorizontalRule','Smiley','SpecialChar','PageBreak' ] },
		'/',
		{ name: 'styles',      items : [ 'Styles','Format','Font','FontSize' ] },
		{ name: 'colors',      items : [ 'TextColor','BGColor' ] },
		{ name: 'tools',       items : [ 'Maximize', 'ShowBlocks','-','About' ] }
	];
	*/
	config.toolbar=[
		{ name: 'document',    items : [ 'Source','NewPage','Preview','Print'] },
		{ name: 'editing',     items : [ 'Find','Replace','-','SelectAll','-','SpellChecker', 'Scayt' ] },
		{ name: 'clipboard',   items : [ 'Cut','Copy','Paste','PasteText','PasteFromWord','-','Undo','Redo' ] },
		{ name: 'paragraph',   items : [ 'NumberedList','BulletedList','-','Outdent','Indent','-','HorizontalRule','CreateDiv' ] },
		{ name: 'tools',       items : [ 'Maximize', 'ShowBlocks' ] },
		'/',
		{ name: 'styles',      items : [ 'Font','FontSize' ] },
		{ name: 'basicstyles', items : [ 'Bold','Italic','Underline','Strike','Subscript','Superscript','TextColor','BGColor','-','RemoveFormat' ] },
		{ name: 'justify',     items : [ 'JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'] },
		{ name: 'links',       items : [ 'Link','Unlink','Anchor' ] },
		{ name: 'insert',      items : [ 'Image','Flash','Table' ] }		
	];
	config.font_defaultLabel = '宋体';
	config.font_names = '宋体;黑体;微软雅黑;楷体_GB2312;'+ config.font_names;
	config.filebrowserUploadUrl = '../fy_ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files';
	config.filebrowserImageUploadUrl = '../fy_ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images';
	//config.extraPlugins += (config.extraPlugins ? ',lineheight' : 'lineheight');
};