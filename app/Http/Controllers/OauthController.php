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
    	//接收code
    	$code = $_GET['code'];
    	//换取access_token.
    	$this->getToken($code);
    	echo '<pre>';print_r($_GET);echo '</pre>';
    }
    /**
     * 根据code换取 token
     * 
     */
    protected function getToken($code)
    {
    	$url = 'http://github.com/login/oauth/access_token';

    	//post 接口 Guzzle or curl
    	
    	//拿到token 获取用户信息
    	$this->getGithubUserInfo($token);
    }

    protected function getGithubUserInfo($token)
    {
    	$url = 'https://api.github.com/user';
    }
}
