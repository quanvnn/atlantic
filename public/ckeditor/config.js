/**
 * @license Copyright (c) 2003-2015, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
    
	// Simplify the dialog windows.
	config.removeDialogTabs = 'image:advanced;link:advanced';
    config.filebrowserBrowseUrl = 'http://localhost/atlantic/ckfinder/ckfinder.html';
	config.filebrowserImageBrowseUrl = 'http://localhost/atlantic/ckfinder/ckfinder.html?type=Images';
	config.filebrowserFlashBrowseUrl = 'http://localhost/atlantic/ckfinder/ckfinder.html?type=Flash';
	config.filebrowserUploadUrl = 'http://localhost/atlantic/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files';
	config.filebrowserImageUploadUrl = 'http://localhost/atlantic/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images';
	config.filebrowserFlashUploadUrl = 'http://localhost/atlantic/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash';
};
