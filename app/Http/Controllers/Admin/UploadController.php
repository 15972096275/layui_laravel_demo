<?php

namespace App\Http\Controllers\Admin\Common;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function uploadImage(Request $request)
    {
        $file = $request->file('file');
        $size = $file->getSize();
        if ($size / 1048576 > 10) {
            return $this->responseError('上传文件过大，最大10M');
        }

        $extension = $file->getClientOriginalExtension();

        $fileType = ['jpg', 'jpeg', 'gif', 'png', 'JPG', 'JPEG', 'GIF', 'PNG', 'bmp', 'BMP'];

        if (!in_array($extension, $fileType)) {
            return $this->responseError('文件格式错误，只能是.jpg、.jpeg、.gif、.png、.bmp文件');
        }

        $fileMime = $file->getClientMimeType();
        $mime     = ['image/jpeg', 'image/gif', 'image/png', 'image/*', 'image/jpg'];


        if (!in_array($fileMime, $mime)) {
            return $this->responseError('不是图片文件，mime格式错误');
        }

        $fileName = pathinfo($file->getClientOriginalName());

        if (!isset($fileName['extension'])) {
            return $this->responseError('文件不存在');
        }

        $year  = date('Y', time());
        $month = date('m', time());
        $day   = date('d', time());

        $filename = date('His') . '_' . uniqid() . '.' . $fileName['extension'];

        $path = $file->storeAs(
            "/uploads/app/{$year}/{$month}/{$day}", $filename, 'public_image'
        );

        $url = \Storage::disk('public_image')->url($path);

        $data=[
            'code'=>0,
            "msg"=>"1313",
            "data"=>["src"=>$url],
        ];
        return response()->json($data);
        //return $this->responseSuccess(__('message.success'), ['image_path' => env('APP_URL') . '/' . $path]);
    }

    public function del_images($images,$type=1){
        $address=$_SERVER['DOCUMENT_ROOT'];
        if ($type==1){
            $path=str_replace(env('APP_URL'),"",$images);
            $del_image=$address.$path;
            if(file_exists($del_image))unlink($del_image);
        }else{
            foreach ($images as $v){
                $path=str_replace(env('APP_URL'),"",$v);
                $del_image=$address.$path;
                if(file_exists($del_image))unlink($del_image);
            }
        }
    }
}
