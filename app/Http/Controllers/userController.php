<?php
namespace App\Http\Cotrollers;
use Illuminate\Http\Request;
class userController extends Controller {
    // function index(){
    // $tittle ="Đây là tiêu đề";
    // $decription ="đây là dong mô tả";
    // $coppyright = "Học web chuẩn";
    // return view("test")-> with(['title'=>  $tittle, 'decription '=> $decription, 'coppyright'=>   $coppyright]);
    // }
    function tinhtong (Request $request){
        $sum = $request -> number1 + $request -> number2;
        return view ('tong', compact('sum'));
    }
}
