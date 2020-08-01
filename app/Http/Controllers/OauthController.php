<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OauthController extends Controller
{
    /**
     * github登录回跳
     * @return [type] [description]
     */
    public function git()
    {
    	echo '<pre>';print_r($_GET);echo '</pre>';
    }
}
