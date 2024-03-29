<?php

namespace App\Http\Controllers\Video;

use App\Model\VideoModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use OSS\OssClient;
use OSS\Core\OssException;

class VideoController extends Controller
{
    //
    protected $accessKeyId = "LTAIG4Y2lmqAtQ26";
    protected $accessKeySecret = "JvEGN9EM4DEeDIsZwNPJnulBuH4lD3";
    protected $bucket='1809ali';

    /**
     * @throws \OSS\Core\OssException
     * 图片上传测试
     */
    public function oss1()
    {
        $clint=new OssClient($this->accessKeyId,$this->accessKeySecret,env('ALI_OSS_ENDPOINT'));
//        $obj=mt_rand(100,10000).'jpg';
        $obj='1809a';
        $con='hello world';
        $a=$clint->putObject($this->bucket,$obj,$con);
        var_dump($a);
    }

    /**
     * @throws \OSS\Core\OssException
     * 文件上传测试
     */
    public function oss2()
    {
        $clint=new OssClient($this->accessKeyId,$this->accessKeySecret,env('ALI_OSS_ENDPOINT'));
        $obj=mt_rand(100,10000).'jpg';
        $file='qq.jpg';
        $a=$clint->uploadFile($this->bucket,$obj,$file);
        var_dump($a);
    }


    /**
     * 视频转移到oss
     */
    public function saveVideo(){
        $clint=new OssClient($this->accessKeyId,$this->accessKeySecret,env('ALI_OSS_ENDPOINT'));
        //获取目录中的文件
        $file_path=storage_path("app/public/files");
        echo '文件路径：'.$file_path;echo "<br>";
        $file_list=scandir($file_path);
        foreach ($file_list as $k =>$v){
            if($v=='.' || $v=='..'){
                continue;
            }
            //上传

            $file_name='files/'.$v;
            echo '文件名称：'.$file_name;echo "<br>";
            $local_file=$file_path.'/'.$v;
            echo $local_file;echo "<br>";
//            $clint->uploadFile($this->bucket,$file_name,$local_file);
            try{
                $clint->uploadFile($this->bucket,$file_name,$local_file);
            } catch(OssException $e) {
                printf(__FUNCTION__ . ": FAILED\n");
                printf($e->getMessage() . "\n");
                return;
            }

            //文件上传成功后  删除本地文件
            echo '上传成功';
            unlink($local_file);
        }
    }

    /**
     * 播放视频
     */
    public function index(){
        $vid=$_GET['vid'];
        $a=VideoModel::where('vid',$vid)->first();
        $data=[
            'a'=>$a
        ];

        return view('video.index',$data);
    }

    public function oss(){
        $json=file_get_contents("php://input");
        $str=date("Y-m-d H:i:s").'========='.$json."\n";
        file_put_contents("logs/oss.log",$str,FILE_APPEND);
    }
}
