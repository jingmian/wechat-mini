<?php
/**
 * +----------------------------------------------------------------------
 * | 网络请求
 * +----------------------------------------------------------------------
 * | Copyright (c) 2016 http://www.sunnyos.com All rights reserved.
 * +----------------------------------------------------------------------
 * | Date：2018-11-14 18:02:48
 * | Author: Sunny (admin@sunnyos.com) QQ：327388905
 * +----------------------------------------------------------------------
 */

namespace Sunny\WechatMini\Library;

use Sunny\WechatMini\Exception\WechatMiniException;

class Http
{
    private $url;
    private $method = 'GET';
    private $param = [];
    private $data = [];
    private $header = [];
    private $isJson = false;

    const POST = 'POST';
    const GET = 'GET';

    /**
     * 获取请求地址
     * @return mixed
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * 设置请求地址
     * @param mixed $url
     */
    public function setUrl($url)
    {
        $this->url = $url;
    }

    /**
     * 获取请求方式
     * @return string
     */
    public function getMethod()
    {
        return $this->method;
    }

    /**
     * 设置请求方式
     * @param string $method
     */
    public function setMethod($method)
    {
        $this->method = $method;
    }

    /**
     * 获取get参数
     * @return array
     */
    public function getParam()
    {
        return $this->param;
    }

    /**
     * 设置get参数
     * @param array $param
     */
    public function setParam($param)
    {
        $this->param = $param;
    }

    /**
     * 获取post参数
     * @return array
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * 设置post参数
     * @param array $data
     */
    public function setData($data)
    {
        $this->data = $data;
    }

    /**
     * 获取header信息
     * @return array
     */
    public function getHeader()
    {
        return $this->header;
    }

    /**
     * 设置header信息
     * @param array $header
     */
    public function setHeader($header)
    {
        $this->header = $header;
    }

    /**
     * 获取是否json请求
     * @return bool
     */
    public function isJson()
    {
        return $this->isJson;
    }

    /**
     * 设置json请求
     * @param bool $isJson
     */
    public function setIsJson($isJson)
    {
        $this->isJson = $isJson;
    }

    /**
     * 执行请求
     * @return mixed
     * @throws WechatMiniException
     */
    public function exec()
    {
        $opts = array(
            CURLOPT_TIMEOUT => 30,
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_SSL_VERIFYHOST => false,
            CURLOPT_SSL_VERIFYPEER => false,
        );
        // 根据get请求参数组织新的url地址
        $opts[CURLOPT_URL] = $this->url . '?' . http_build_query($this->param);

        // 进行post请求
        if ($this->method == self::POST) {
            $opts[CURLOPT_POST] = true;
            $opts[CURLOPT_POSTFIELDS] = $this->isJson() ? json_encode($this->data, JSON_UNESCAPED_UNICODE) : $this->data;
        }

        if (!empty($this->header)) {
            $opts[CURLOPT_HTTPHEADER] = $this->header;
        }
        // 执行curl请求
        $ch = curl_init();
        curl_setopt_array($ch, $opts);
        $data = curl_exec($ch);
        curl_close($ch);
        return $data;
    }

}