<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;


class IndexController extends Controller
{
    public function index(Request $request){
        $info=Auth::guard('admin')->user();
        //dump($info);
        $name='云链总后台';
        return view("admin.index.index",['info'=>$info]);
    }

    public function home(Request $request){
        /*$day=7;$where[]=['status',1];
        //总后台数据
        $pick_orders_count=DB::table('pick_orders')->where('status',1)->count();
        $remind_ships_count=DB::table('remind_ships')->where('status',0)->count();
        $messages_count=DB::table('messages')->where('status',0)->count();

        //总后台数据
        $arr_user=$this->data_date($day,"users");
        $where3[]=['type',1];$where3[]=['status',1];
        $good_transaction_records=$this->data_date($day,"good_transaction_records", $where3,',sum(number) as sum');
        $goods=$this->data_date($day,"goods");
        $code=0;


        for ($x=$day-1;$x>=0; $x--){
            $days[]=date('Y-m-d',strtotime('-'.$x.'day'));
            }*/

        return view("admin.index.home");
    }
}
