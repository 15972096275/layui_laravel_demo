<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function responseSuccess ($message = null, $data = [], $code = 1, $status_code = 200)
    {
        if (!$message) {
            $message = '成功';
        }

        if (!$data) {
            return response()->json([
                'msg'  => $message,
                'code' => $code,
                'data' => (object)$data,
            ], $status_code, [], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES
            );
        }

        return response()->json([
            'msg'  => $message,
            'code' => $code,
            'data' => $data,
        ], $status_code, [], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES
        );
    }

    public function responseError ($message = null, $status_code = 200)
    {
        if (!$message) {
            $message = '失败';
        }

        return response()->json([
            'msg'  => $message,
            'code' => 0,
            'data' => (object)[]
        ], $status_code, [], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES
        );
    }

    public function encryptedSignature($data)
    {
        $str = '';
        foreach($data as $key=>$value) {
            $str .= "{$key}{$value}";
        }
        return strtoupper(md5($str . strtoupper(md5('jyky@ccmai.xin'))));
    }
}
