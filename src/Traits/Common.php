<?php
/**
 * +----------------------------------------------------------------------
 * | 公共的代码
 * +----------------------------------------------------------------------
 * | Copyright (c) 2016 http://www.sunnyos.com All rights reserved.
 * +----------------------------------------------------------------------
 * | Date：2018-11-15 13:40:10
 * | Author: Sunny (admin@sunnyos.com) QQ：327388905
 * +----------------------------------------------------------------------
 */
namespace Sunny\WechatMini\Traits;
use Sunny\WechatMini\Library\Http;

trait Common
{
    private $access_token;

    /**
     * 获取access_token
     * @return mixed
     */
    public function getAccessToken()
    {
        return $this->access_token;
    }

    /**
     * 设置access_token
     * @param mixed $access_token
     * @return $this
     */
    public function setAccessToken($access_token)
    {
        $this->access_token = $access_token;
        return $this;
    }

    /**
     * 执行网络请求
     * @param string $url 接口地址
     * @param array $data post参数
     * @return mixed
     */
    private function exec($url,$data)
    {
        $params['access_token'] = $this->getAccessToken();
        $http = new Http();
        $http->setUrl($url);
        $http->setMethod(Http::POST);
        $http->setIsJson(true);
        $http->setParam($params);
        $http->setData($data);
        return $http->exec();
    }
}