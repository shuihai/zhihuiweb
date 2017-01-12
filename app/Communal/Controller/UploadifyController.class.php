<?php
namespace Communal\Controller;
use Think\CommonController;
class UploadifyController extends CommonController{
    public function upload()
    {

        $targetFolder = STATIC_PATH.$_GET['folder'].'/'; // Relative to the root
        createFolders($targetFolder);
        //$verifyToken = md5('unique_salt' . $_POST['timestamp']);
        if (!empty($_FILES) ) {//&& $_POST['token'] == $verifyToken
            
            $targetPath = $_SERVER['DOCUMENT_ROOT'] . $targetFolder;
            // Validate the file type
            $fileTypes = array('jpg','jpeg','gif','png','doc','xlsx','pdf','txt','rar','zip'); // File extensions
            if(isset($_FILES['file'])){                                 //webuploader 插件使用
                $tempFile = $_FILES['file']['tmp_name'];
                $fileParts = pathinfo($_FILES['file']['name']);
            }else{                                                      //uploadify   插件使用
                $tempFile = $_FILES['Filedata']['tmp_name'];
                $fileParts = pathinfo($_FILES['Filedata']['name']);
            }
            //时间戳加随机数
            $filename=time().rand(10000,99999).'.'.$fileParts['extension'];
            $targetFile = $targetFolder. $filename;
            $basename=basename($tempFile);
            $exbasename=explode('.', $basename);
            if (in_array($fileParts['extension'],$fileTypes)) {
                if(move_uploaded_file($tempFile,$targetFile))
                {
                    $post=I('post.');
                    if(I('post.width')){
                        $test=$this->thumb($targetFile,$post['width'],$post['height'],'1','2',$post['x'],$post['y']);
                        echo json_encode(array(
                            'status'=>1,
                            'path'  =>$test,
                            'filename'=>$exbasename[0],
                            'originname'=>$_FILES['file']['name']
                        ));
                    }else{
                        echo json_encode(array(
                        'status'=>1,
                        'path'=>$targetFile,
                        'filename'=>$exbasename[0],
                        'originname'=>$_FILES['file']['name']
                        )); 
                    }
                }else{
                    echo 'move faild'.$tempFile;
                }
            } else {
                echo 'Invalid file type.';
            }

        }else{
            echo 'what!';
        }
    }
    /**
     * 图片裁剪函数，支持指定定点裁剪和方位裁剪两种裁剪模式
     * @param <string>  $src_file       原图片路径
     * @param <int>     $new_width      裁剪后图片宽度（当宽度超过原图片宽度时，去原图片宽度）
     * @param <int>     $new_height     裁剪后图片高度（当宽度超过原图片宽度时，去原图片高度）
     * @param <int>     $type           裁剪方式，1-方位模式裁剪；0-定点模式裁剪。
     * @param <int>     $pos            方位模式裁剪时的起始方位（当选定点模式裁剪时，此参数不起作用）
     *                                  1为顶端居左，2为顶端居中，3为顶端居右； 
     *                                  4为中部居左，5为中部居中，6为中部居右； 
     *                                  7为底端居左，8为底端居中，9为底端居右；
     * @param <int>     $start_x        起始位置X （当选定方位模式裁剪时，此参数不起作用）
     * @param <int>     $start_y        起始位置Y（当选定方位模式裁剪时，此参数不起作用）
     * @return <string>                 裁剪图片存储路径
     */
     function thumb($src_file, $new_width, $new_height, $type = 0, $pos = 0, $start_x = 0, $start_y = 0) {
        $start_x = round($start_x);
        $start_y = round($start_y);
        $pathinfo = pathinfo($src_file);
        $dst_file = $pathinfo['dirname'] . '/' . $pathinfo['filename'] .'_'. $new_width . 'x' . $new_height . '.' . $pathinfo['extension'];
        if (!file_exists($dst_file)) {
            if ($new_width < 1 || $new_height < 1) {
                echo "params width or height error !";
                exit();
            }
            if (!file_exists($src_file)) {
                echo $src_file . " is not exists !";
                exit();
            }
            // 图像类型
            $img_type = exif_imagetype($src_file);
            $support_type = array(IMAGETYPE_JPEG, IMAGETYPE_PNG, IMAGETYPE_GIF);
            if (!in_array($img_type, $support_type, true)) {
                echo "只支持jpg、png、gif格式图片裁剪";
                exit();
            }
            /* 载入图像 */
            switch ($img_type) {
                case IMAGETYPE_JPEG :
                    $src_img = imagecreatefromjpeg($src_file);
                    break;
                case IMAGETYPE_PNG :
                    $src_img = imagecreatefrompng($src_file);
                    break;
                case IMAGETYPE_GIF :
                    $src_img = imagecreatefromgif($src_file);
                    break;
                default:
                echo "载入图像错误!";
                exit();
            }
            /* 获取源图片的宽度和高度 */
            $src_width = imagesx($src_img);
            $src_height = imagesy($src_img);
            /* 计算剪切图片的宽度和高度 */
            $mid_width = ($src_width < $new_width) ? $src_width : $new_width;
            $mid_height = ($src_height < $new_height) ? $src_height : $new_height;
            /* 初始化源图片剪切裁剪的起始位置坐标 */
            // switch ($pos * $type) {
            //     case 1://1为顶端居左 
            //         $start_x = 0;
            //         $start_y = 0;
            //         break;
            //     case 2://2为顶端居中 
            //         $start_x = ($src_width - $mid_width) / 2;
            //         $start_y = 0;
            //         break;
            //     case 3://3为顶端居右 
            //         $start_x = $src_width - $mid_width;
            //         $start_y = 0;
            //         break;
            //     case 4://4为中部居左 
            //         $start_x = 0;
            //         $start_y = ($src_height - $mid_height) / 2;
            //         break;
            //     case 5://5为中部居中 
            //         $start_x = ($src_width - $mid_width) / 2;
            //         $start_y = ($src_height - $mid_height) / 2;
            //         break;
            //     case 6://6为中部居右 
            //         $start_x = $src_width - $mid_width;
            //         $start_y = ($src_height - $mid_height) / 2;
            //         break;
            //     case 7://7为底端居左 
            //         $start_x = 0;
            //         $start_y = $src_height - $mid_height;
            //         break;
            //     case 8://8为底端居中 
            //         $start_x = ($src_width - $mid_width) / 2;
            //         $start_y = $src_height - $mid_height;
            //         break;
            //     case 9://9为底端居右 
            //         $start_x = $src_width - $mid_width;
            //         $start_y = $src_height - $mid_height;
            //         break;
            //     default://随机 
            //         break;
            // }
            // 为剪切图像创建背景画板
            $mid_img = imagecreatetruecolor($mid_width, $mid_height);
            //拷贝剪切的图像数据到画板，生成剪切图像
            imagecopy($mid_img, $src_img, 0, 0, $start_x, $start_y, $mid_width, $mid_height);
            // 为裁剪图像创建背景画板
            $new_img = imagecreatetruecolor($new_width, $new_height);
            //拷贝剪切图像到背景画板，并按比例裁剪
            imagecopyresampled($new_img, $mid_img, 0, 0, 0, 0, $new_width, $new_height, $mid_width, $mid_height);
            /* 按格式保存为图片 */
            switch ($img_type) {
                case IMAGETYPE_JPEG :
                    imagejpeg($new_img, $dst_file, 100);
                    break;
                case IMAGETYPE_PNG :
                    imagepng($new_img, $dst_file, 9);
                    break;
                case IMAGETYPE_GIF :
                    imagegif($new_img, $dst_file, 100);
                    break;
                default:
                    break;
            }
        }
      
        return ltrim($dst_file, '.');
     }


}