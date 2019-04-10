<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2019/4/9
 * Time: 15:27
 */

namespace App\Http\Controllers;


class IndexController extends BaseController
{
   public function index(){
       return view('index/index');
   }


}