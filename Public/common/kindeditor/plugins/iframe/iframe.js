/*******************************************************************************
* KindEditor - WYSIWYG HTML Editor for Internet
* Copyright (C) 2015-2999 www.wenshuai.cn
*
* @author EZ <9476400@qq.com>
* @site http://www.www.wenshuai.cn
* @licence http://www.www.wenshuai.cn
*******************************************************************************/

KindEditor.plugin('iframe', function(K) {
	var self = this, name = 'iframe';
	self.plugin.iframe = {
		edit : function() {
			var lang = self.lang(name + '.'),
				html = '<div style="padding:20px;">' +
					//url
					'<div class="ke-dialog-row">' +
					'<label for="keUrl" style="width:60px;">' + lang.url + '</label>' +
					'<input class="ke-input-text" type="text" id="keIframe" name="iframe" value="" style="width:260px;" /></div>' +
					'<div class="ke-dialog-row">' +
					'<label for="keUrl" style="width:60px;">宽</label>' +
					'<input class="ke-input-text" type="text" id="keIframeWidth" name="width" value="" style="width:260px;" /></div>' +
					'<div class="ke-dialog-row">' +
					'<label for="keUrl" style="width:60px;">高</label>' +
					'<input class="ke-input-text" type="text" id="keIframeHeight" name="height" value="" style="width:260px;" /></div>' +
					'</div>',
				dialog = self.createDialog({
					name : name,
					width : 450,
					title : self.lang(name),
					body : html,
					yesBtn : {
						name : self.lang('yes'),
						click : function(e) {
							var url = K.trim(urlBox.val());
							var width = K.trim(widthBox.val());
							var height = K.trim(heightBox.val());
							self.exec('createiframe', url,width,height).hideDialog().focus();
						}
					}
				}),
				div = dialog.div,
				urlBox = K('input[name="iframe"]', div),
				widthBox = K('input[name="width"]', div),
				heightBox = K('input[name="height"]', div);

			urlBox.val('');
			self.cmd.selection();
		}
	};
	self.clickToolbar(name, self.plugin.iframe.edit);
});
