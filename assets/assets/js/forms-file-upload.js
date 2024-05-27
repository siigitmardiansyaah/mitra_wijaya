"use strict";
!(function () {
	const e =
			'<div class="dz-preview dz-file-preview">\n<div class="dz-details">\n  <div class="dz-thumbnail">\n    <img data-dz-thumbnail>\n    <span class="dz-nopreview">No preview</span>\n    <div class="dz-success-mark"></div>\n    <div class="dz-error-mark"></div>\n    <div class="dz-error-message"><span data-dz-errormessage></span></div>\n    <div class="progress">\n      <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuemin="0" aria-valuemax="100" data-dz-uploadprogress></div>\n    </div>\n  </div>\n  <div class="dz-filename" data-dz-name></div>\n  <div class="dz-size" data-dz-size></div>\n</div>\n</div>',
		a = document.querySelector("#dropzone-basic");
	if (a) {
		new Dropzone(a, {
			previewTemplate: e,
			parallelUploads: 1,
			maxFilesize: 5,
			addRemoveLinks: !0,
			maxFiles: 1,
		});
	}
	const s = document.querySelector("#dropzone-multi");
	if (s) {
		new Dropzone(s, {
			previewTemplate: e,
			parallelUploads: 1,
			maxFilesize: 5,
			addRemoveLinks: !0,
		});
	}
    u = document.querySelector("#dropzone-basic1");
	if (a) {
		new Dropzone(a, {
			previewTemplate: e,
			parallelUploads: 1,
			maxFilesize: 5,
			addRemoveLinks: !0,
			maxFiles: 1,
		});
	}
})();
