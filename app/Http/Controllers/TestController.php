<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Str;

class TestController extends Controller
{
    /**
     * 对称加密
     * 向api发送加密数据
     * @return [type] [description]
     */
    public function aes1()
 	 {
 	 	$method = 'AES-256-CBC';
 	 	$key = '1911api';
 	 	$iv = 'aaaaaabbbbcccccc';
 	 	$option = OPENSSL_RAW_DATA;

    	$url = "http://api.1911.com/dec"; //api接口
    	$data = 'hello 李智敏';//代价密数据

    	$enc_data = openssl_encrypt($data,$method,$key,$option,$iv);
    	echo '密文: '.$enc_data;echo '</br>';
    	$b64_str = base64_encode($enc_data); //编码
    	//echo 'base64: '.$b64_str;echo '</br>';die;

    	$client = new Client();
    	$response = $client->request('POST',$url,[
    			'form_params' => [
    				'data'=>$b64_str
    			]
    		]);

    	echo $response->getBody();	//响应数据
    	

    }
   

    //非对称加密 公钥加
    public function aesdec()
    {
        $data = "长江长江我是黄河";

        $content = file_get_contents(storage_path('key/pub.key'));
        //echo $content;die;
        $pub_key = openssl_get_privatekey($content);
        openssl_public_encrypt($data, $enc_data,$pub_key);
        var_dump($enc_data);


    }


    //签名测试
    public function sing1()
    {
        $data = 'hello world';
        $key = '1911api';
        $sing_str = md5($data.$key);   //签名
        //发送数据 数据+签名
        $url = 'http://api.1911.com/test/sing1?data='.$data.'&sign='.$sing_str;
        $response = file_get_contents($url);
        echo $response;
    }
    /**
     * header传参
     * @return [type] [description]
     */
    public function header1()
    {
        $url = 'http://api.1911.com/test1';
        $uid = 123456;
        $token = Str::random(16);
        $headers = [
            'uid:'.$uid,
            //'token:'.$token,
        ];

        //curl 
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER,$headers);//header头传参
        curl_exec($ch);
        curl_close($ch);       
    }

    

}
