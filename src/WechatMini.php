<?php
/**
 * +----------------------------------------------------------------------
 * | 主类
 * +----------------------------------------------------------------------
 * | Copyright (c) 2016 http://www.sunnyos.com All rights reserved.
 * +----------------------------------------------------------------------
 * | Date：2018-11-14 17:48:00
 * | Author: Sunny (admin@sunnyos.com) QQ：327388905
 * +----------------------------------------------------------------------
 */

namespace Sunny\WechatMini;

use Sunny\WechatMini\Mini\Analy;
use Sunny\WechatMini\Mini\Customer;
use Sunny\WechatMini\Mini\Near;
use Sunny\WechatMini\Mini\Plugin;
use Sunny\WechatMini\Mini\Qrcode;
use Sunny\WechatMini\Mini\Template;
use Sunny\WechatMini\Mini\Token;

class WechatMini
{
    private $appId = '';
    private $appSecret = '';
    private $instance = [];

    public function __construct($appId, $appSecret)
    {
        $this->appId = $appId;
        $this->appSecret = $appSecret;
    }

    /**
     * 获取客服接口
     * @return Customer
     */
    public function getCustomer()
    {
        $key = Customer::class;
        if (!isset($this->instance[$key])) {
            $this->instance[$key] = new Customer();
        }
        return $this->instance[$key];
    }

    /**
     * 获取token接口
     * @return Token
     */
    public function getToken()
    {
        $key = Token::class;
        if (!isset($this->instance[$key])) {
            $this->instance[$key] = new Token($this->appId, $this->appSecret);
        }
        return $this->instance[$key];
    }

    /**
     * 获取数据分析接口
     * @return Analy
     */
    public function getAnaly()
    {
        $key = Analy::class;
        if (!isset($this->instance[$key])) {
            $this->instance[$key] = new Analy();
        }
        return $this->instance[$key];
    }

    /**
     * 获取附近的小程序接口
     * @return Near
     */
    public function getNear()
    {
        $key = Near::class;
        if (!isset($this->instance[$key])) {
            $this->instance[$key] = new Near();
        }
        return $this->instance[$key];
    }

    /**
     * 获取插件管理接口
     * @return Plugin
     */
    public function getPlugin()
    {
        $key = Plugin::class;
        if (!isset($this->instance[$key])) {
            $this->instance[$key] = new Plugin();
        }
        return $this->instance[$key];
    }

    /**
     * 获取二维码接口
     * @return Qrcode
     */
    public function getQrcode()
    {
        $key = Qrcode::class;
        if (!isset($this->instance[$key])) {
            $this->instance[$key] = new Qrcode();
        }
        return $this->instance[$key];
    }

    /**
     * 获取模版消息接口
     * @return Template
     */
    public function getTemplate()
    {
        $key = Template::class;
        if (!isset($this->instance[$key])) {
            $this->instance[$key] = new Template();
        }
        return $this->instance[$key];
    }

}