/*web Upload开始*/
	//初始化Web Uploader
    $list = $('#fileList');//图片裁剪框
    $btn=$('#ctlBtn');//开始上传按钮
    $thumb=$('#thumbImg');//缩略图,文件名
    var index;
    state = "unuploading";
    var lastfile;
    // 初始化Web Uploader
    var uploader = WebUploader.create({
	    // 自动上传。
	    auto: false,
	    // swf文件路径
	    swf:'__UPLOAD__/common/Uploader.swf',
	    // 文件接收服务端。
	    server: '?s=/Communal/Uploadify/upload&folder=info/'+timestamp,
	    // 选择文件的按钮。可选。
	    // 内部根据当前运行是创建，可能是input元素，也可能是flash.
	    pick:{
	    	id:'#filePicker',
	    	multiple:'false'
	    },
	    thumb:{
	    	width:1,
	    	height:1,
	    	allowMagnify: false
	    },
	    fileNumLimit:1,
	    // 只允许选择文件，可选。
	    accept: {
	        title: 'Images',
	        extensions: 'jpg,jpeg,png',
	        mimeTypes: 'image/*'
	    }
	});
 $btn.on('click', function() {
    if ( state === 'uploading' ) {
        uploader.stop();
    } else {
        uploader.upload();
    }
});
// 当文件添加进来之前
uploader.on( 'beforeFileQueued', function(file){
	if(lastfile != null){
		uploader.removeFile(lastfile);
	}
});
// 当有文件添加进来的时候
uploader.on( 'fileQueued', function( file ) {
	lastfile=file;
	$list.html("");//清空list
	$thumb.html("");//清空thumb
	$thumb.append("<h4 class='info'>"+file.name+"</h4>");

    var $li = $(
            '<div id="' + file.id + '" style="float:left">' +
                '<img id="images" style="max-width:500px;max-height:500px">' +
              // class="file-item thumbnail"  '<div class="info">' + file.name + '</div>' +
            '</div>'
            ),
    $img = $li.find('img');
    // $list为容器jQuery实例
	index=layer.open({
		type: 1,
		title:'图片裁剪',
		area: ['690px', '690px'],
		content:$('#fileList'),
	});
	$list.append($li);
	$list.append(
		"<div id='upload-group' class=\"btn-group\" data-toggle=\"buttons\">" +
		  "<div class=\"btn btn-primary active\" data-method=\"setAspectRatio\" data-option=\"1.654867256637168\" title=\"Set Aspect Ratio\" onclick=\"$('#images').cropper('setAspectRatio', 187 / 113)\">" +
			"<input class=\"sr-only\" id=\"aspestRatio1\" name=\"aspestRatio\" value=\"1.654867256637168\" type=\"radio\">" +
			"<span class=\"docs-tooltip\" data-toggle=\"tooltip\" >" +
			  "涉及领域" +
			"</span>" +
		  "</div>" +
		  "<div class=\"btn btn-primary\" data-method=\"setAspectRatio\" data-option=\"0.3592814371257485\" title=\"Set Aspect Ratio\" onclick=\"$('#images').cropper('setAspectRatio', 167 / 60)\">" +
			"<input class=\"sr-only\" id=\"aspestRatio2\" name=\"aspestRatio\" value=\"0.3592814371257485\" type=\"radio\">" +
			"<span class=\"docs-tooltip\" data-toggle=\"tooltip\" >" +
			  "合作伙伴" +
			"</span>" +
		  "</div>" +
		  "<div class=\"btn btn-primary\" data-method=\"setAspectRatio\" data-option=\"1\" title=\"Set Aspect Ratio\" onclick=\"$('#images').cropper('setAspectRatio', 1 / 1)\">" +
			"<input class=\"sr-only\" id=\"aspestRatio3\" name=\"aspestRatio\" value=\"1\" type=\"radio\">" +
			"<span class=\"docs-tooltip\" data-toggle=\"tooltip\" >" +
			  "我们的案例/应用案例" +
			"</span>" +
		  "</div>" +
		  "<div class=\"btn btn-primary\" data-method=\"setAspectRatio\" data-option=\"1.947368421052632\" title=\"Set Aspect Ratio\" onclick=\"$('#images').cropper('setAspectRatio', 111 / 57)\">" +
			"<input class=\"sr-only\" id=\"aspestRatio4\" name=\"aspestRatio\" value=\"1.947368421052632\" type=\"radio\">" +
			"<span class=\"docs-tooltip\" data-toggle=\"tooltip\" >" +
			  "产品服务" +
			"</span>" +
		  "</div>" +
		  "<div class=\"btn btn-primary\" data-method=\"setAspectRatio\" data-option=\"1.527777777777778\" title=\"Set Aspect Ratio\" onclick=\"$('#images').cropper('setAspectRatio', 55 / 36)\">" +
			"<input class=\"sr-only\" id=\"aspestRatio4\" name=\"aspestRatio\" value=\"1.527777777777778\" type=\"radio\">" +
			"<span class=\"docs-tooltip\" data-toggle=\"tooltip\" >" +
			  "新闻动态" +
			"</span>" +
		  "</div>" +
		  "<div class=\"btn btn-primary\" data-method=\"setAspectRatio\" data-option=\"NaN\" title=\"Set Aspect Ratio\"  onclick=\"$('#images').cropper('setAspectRatio', NaN)\">" +
			"<input class=\"sr-only\" id=\"aspestRatio5\" name=\"aspestRatio\" value=\"NaN\" type=\"radio\">" +
			"<span class=\"docs-tooltip\" data-toggle=\"tooltip\">" +
			  "自由设置" +
			"</span>" +
		  "</div>" +
		  "<div class=\"btn btn-primary\" data-method=\"setAspectRatio\" data-option=\"\" title=\"Set Aspect Ratio\"  onclick=\"javascript:getCallback($(this))\">" +
			"<input class=\"sr-only\" id=\"aspestRatio5\" name=\"aspestRatio\" value=\"确定\" type=\"radio\">" +
			"<span class=\"docs-tooltip\" data-toggle=\"tooltip\">" +
			  "确定" +
			"</span>" +
		  "</div>" +
		  "<div class=\"docs-preview clearfix\">" +
	          "<div class=\"img-preview preview-lg\"></div>" +
	          "<div class=\"img-preview preview-md\"></div>" +
	          "<div class=\"img-preview preview-sm\"></div>" +
	          "<div class=\"img-preview preview-xs\"></div>" +
	        "</div>"+
		"</div>");
    // 创建缩略图
    // 如果为非图片文件，可以不用调用此方法。
    uploader.makeThumb( file, function( error, src ) {
        if ( error ) {
            $img.replaceWith('<span>不能预览</span>');
            return;
        }
        $img.attr( 'src', src );
        $('#images').cropper({
        	aspestRatio:187 / 113,
        });
    });
});

// 文件上传过程中创建进度条实时显示。
uploader.on( 'uploadProgress', function( file, percentage ) {
	state = "uploading";
});
// 文件上传成功，给item添加成功class, 用样式标记上传成功。
uploader.on( 'uploadSuccess', function( file,response) {
	var res = eval("("+response._raw+")");//linux服务器用
    $( '#'+file.id ).addClass('upload-state-done');
    state="unuploading";
    $thumb.html("<h4 class='info'>上传成功</h4><input type='hidden' name='img' value="+res.path+">");//返回图片路径 linux 为res.path windows 为response.path
    //console.log(response.path);
});

// 文件上传失败，显示上传出错。
uploader.on( 'uploadError', function( file ) {
    var $li = $( '#'+file.id ),
        $error = $li.find('div.error');
 	state="unuploading";
    // 避免重复创建
    if ( !$error.length ) {
        $error = $('<div class="error"></div>').appendTo( $li );
    }
    $error.text('上传失败');
});

// 完成上传完了，成功或者失败，先删除进度条。
// uploader.on( 'uploadComplete', function( file ) {
//     $( '#'+file.id ).find('.progress').remove();
// });
//测试获取剪切后图片信息
function getCallback(e){
	// getImageData
 	uploader.options.formData = $('#images').cropper('getData');
 	layer.close(index);
}
/*web Upload结束*/

/***********************************************************************/
/*mobile Upload开始*/
//初始化Web Uploader
var mobileuploader;
var mobileindex;
$('#info_tab>li:eq(1)').on('click',function(){
	$mobilelist = $('#mobilefileList');//图片裁剪框
	$mobilebtn=$('#mobilectlBtn');//开始上传按钮
	$mobilethumb=$('#mobilethumbImg');//缩略图,文件名
	mobilestate = "unuploading";
	var mobilelastfile;
// 初始化Web Uploader
	    mobileuploader = WebUploader.create({
		// 自动上传。
		auto: false,
		// swf文件路径
		swf:'__UPLOAD__/common/Uploader.swf',
		// 文件接收服务端。
		server: '?s=/Communal/Uploadify/upload&folder=info/'+timestamp,
		// 选择文件的按钮。可选。
		// 内部根据当前运行是创建，可能是input元素，也可能是flash.
		pick:{
			id:'#mobilefilePicker',
			multiple:'false'
		},
		mobilethumb:{
			width:1,
			height:1,
			allowMagnify: false
		},
		fileNumLimit:1,
		// 只允许选择文件，可选。
		accept: {
			title: 'Images',
			extensions: 'jpg,jpeg,png',
			mimeTypes: 'image/*'
		}
	});
	$mobilebtn.on('click', function() {
		if ( mobilestate === 'uploading' ) {
			mobileuploader.stop();
		} else {
			mobileuploader.upload();
		}
	});
// 当文件添加进来之前
	mobileuploader.on( 'beforeFileQueued', function(file){
		if(mobilelastfile != null){
			mobileuploader.removeFile(mobilelastfile);
		}
	});
// 当有文件添加进来的时候
	mobileuploader.on( 'fileQueued', function( file ) {
		mobilelastfile=file;
		$mobilelist.html("");//清空list
		$mobilethumb.html("");//清空thumb
		$mobilethumb.append("<h4 class='info'>"+file.name+"</h4>");
		var $li = $(
				'<div id="mobile' + file.id + '" style="float:left">' +
				'<img id="mobileimages" style="max-width:500px;max-height:500px">' +
				'</div>'
			),
			$img = $li.find('img');
		// $list为容器jQuery实例
		mobileindex=layer.open({
			type: 1,
			title:'图片裁剪',
			area: ['690px', '690px'],
			content:$('#mobilefileList'),
		});
		$mobilelist.append($li);
		$mobilelist.append(
			"<div id='upload-group' class=\"btn-group\" data-toggle=\"buttons\">" +
			"<div class=\"btn btn-primary active\" data-method=\"setAspectRatio\" data-option=\"1.12676\" title=\"Set Aspect Ratio\" onclick=\"$('#mobileimages').cropper('setAspectRatio', 80 / 53)\">" +
			"<input class=\"sr-only\" id=\"aspestRatio1\" name=\"aspestRatio\" value=\"1.12676\" type=\"radio\">" +
			"<span class=\"docs-tooltip\" data-toggle=\"tooltip\" >" +
			"应用案例" +
			"</span>" +
			"</div>" +
			"<div class=\"btn btn-primary\" data-method=\"setAspectRatio\" data-option=\"1\" title=\"Set Aspect Ratio\" onclick=\"$('#mobileimages').cropper('setAspectRatio', 1 / 1)\">" +
			"<input class=\"sr-only\" id=\"aspestRatio3\" name=\"aspestRatio\" value=\"1\" type=\"radio\">" +
			"<span class=\"docs-tooltip\" data-toggle=\"tooltip\" >" +
			"新闻动态图" +
			"</span>" +
			"</div>" +
			"<div class=\"btn btn-primary\" data-method=\"setAspectRatio\" data-option=\"0.9457363\" title=\"Set Aspect Ratio\" onclick=\"$('#mobileimages').cropper('setAspectRatio', 112 / 128)\">" +
			"<input class=\"sr-only\" id=\"aspestRatio4\" name=\"aspestRatio\" value=\"0.9457363\" type=\"radio\">" +
			"<span class=\"docs-tooltip\" data-toggle=\"tooltip\" >" +
			"产品服务" +
			"</span>" +
			"</div>" +
			"<div class=\"btn btn-primary\" data-method=\"setAspectRatio\" data-option=\"NaN\" title=\"Set Aspect Ratio\"  onclick=\"$('#mobileimages').cropper('setAspectRatio', NaN)\">" +
			"<input class=\"sr-only\" id=\"aspestRatio5\" name=\"aspestRatio\" value=\"NaN\" type=\"radio\">" +
			"<span class=\"docs-tooltip\" data-toggle=\"tooltip\">" +
			"自由设置" +
			"</span>" +
			"</div>" +
			"<div class=\"btn btn-primary\" data-method=\"setAspectRatio\" data-option=\"\" title=\"Set Aspect Ratio\"  onclick=\"javascript:mobileGetCallback()\">" +
			"<input class=\"sr-only\" id=\"aspestRatio5\" name=\"aspestRatio\" value=\"确定\" type=\"radio\">" +
			"<span class=\"docs-tooltip\" data-toggle=\"tooltip\">" +
			"确定" +
			"</span>" +
			"</div>" +
			"<div class=\"docs-preview clearfix\">" +
			"<div class=\"img-preview preview-lg\"></div>" +
			"<div class=\"img-preview preview-md\"></div>" +
			"<div class=\"img-preview preview-sm\"></div>" +
			"<div class=\"img-preview preview-xs\"></div>" +
			"</div>"+
			"</div>");
		// 创建缩略图
		// 如果为非图片文件，可以不用调用此方法。
		mobileuploader.makeThumb( file, function( error, src ) {
			if ( error ) {
				$img.replaceWith('<span>不能预览</span>');
				return;
			}
			$img.attr( 'src', src );
			$('#mobileimages').cropper({
				aspestRatio:80 / 53,
			});
		});
	});

// 文件上传过程中创建进度条实时显示。
	mobileuploader.on( 'uploadProgress', function( file, percentage ) {
		mobilestate = "uploading";
	});
// 文件上传成功，给item添加成功class, 用样式标记上传成功。
	mobileuploader.on( 'uploadSuccess', function( file,response) {
		var res = eval("("+response._raw+")");//linux服务器用
		$( '#mobile'+file.id ).addClass('upload-state-done');
		mobilestate="unuploading";
		$mobilethumb.html("<h4 class='info'>上传成功</h4><input type='hidden' name='mobile_img' value="+res.path+">");//返回图片路径 linux 为res.path windows 为response.path
		//console.log(response.path);
	});

// 文件上传失败，显示上传出错。
	mobileuploader.on( 'uploadError', function( file ) {
		var $li = $( '#mobile'+file.id ),
			$error = $li.find('div.error');
		mobilestate="unuploading";
		// 避免重复创建
		if ( !$error.length ) {
			$error = $('<div class="error"></div>').appendTo( $li );
		}
		$error.text('上传失败');
	});
	//测试获取剪切后图片信息
});
function mobileGetCallback(){
	// getImageData
	mobileuploader.options.formData = $('#mobileimages').cropper('getData');
	layer.close(mobileindex);
}
/*mobile Upload结束*/