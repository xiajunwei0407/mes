<?php

namespace Bkqw\Mes;

/**
 * 联通短信群发类
 * Class MesAction
 * @package Bkqw\Mes
 * @author xiajunwei
 */
class MesAction
{
    // 序列号
    private $seqno;
    // 配置, 参考配置文件 /config/mes.php
    private $config = [];

    public function __construct()
    {
        $this->config = config('mes');
        $this->seqno  = md5(mt_rand(100000, 999999));
    }

    /**
     * 调用联通短信接口发送短信
     * @param array $mobile 手机号码，请自行检查手机号码的合法性
     * @param string $content 短信内容
     * @param string $method 'sendGWMsg' => 不带系统签名，需要再内容前面加【签名】, 'sendNormMsg' => 自带系统签名
     * @return false|string
     */
    public function send(array $mobile = [], $content = '', $method = 'sendGWMsg')
    {
        if(empty($mobile)){
            return Response::fail('至少传入一个手机号码');
        }
        if(!$content){
            return Response::fail('短信内容不能为空');
        }
        if($method !== 'sendGWMsg' && $method !== 'sendNormMsg'){
            return Response::fail('请求方法错误');
        }
        $params = [
            $this->config['username'],
            $this->config['pwd'],
            $this->config['proxy'],
            implode(',', $mobile),
            $content,
            $this->config['extno'],
            $this->seqno
        ];
        $requestParams = $this->createRequestParams($params);
        if(!$requestParams){
            return Response::fail('参数为空');
        }
        try{
            $client = new \SoapClient($this->config['url']);
            $res = $client->$method($requestParams);
            if($res->out{0} == '1'){
                return Response::success();
            }
            return Response::fail($res->out);
        }catch (\Exception $e){
            return Response::fail($e->getMessage());
        }
    }

    /**
     * 创建请求参数
     * @param array $arr
     * @return array
     */
    private function createRequestParams(array $arr = []):array
    {
        if(empty($arr)){
            return [];
        }
        $params = [];
        foreach ($arr as $key => $item) {
            $params['in' . $key] = $item;
        }
        return $params;
    }

}
