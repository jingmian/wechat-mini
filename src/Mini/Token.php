<?php
/**
 * +----------------------------------------------------------------------
 * |
 * +----------------------------------------------------------------------
 * | Copyright (c) 2016 http://www.sunnyos.com All rights reserved.
 * +----------------------------------------------------------------------
 * | Date：2018-11-14 20:37:20
 * | Author: Sunny (admin@sunnyos.com) QQ：327388905
 * +----------------------------------------------------------------------
 */

namespace Sunny\WechatMini\Mini;


use Sunny\WechatMini\Library\Http;

class Token
{
    private $appid;
    private $secret;

    public function __construct($appid, $secret)
    {
        $this->appid = $appid;
        $this->secret = $secret;
    }

    /**
     * 获取AccessToken
     * @param string $grant_type
     * @return mixed
     */
    public function getAccessToken($grant_type = 'client_credential')
    {
        $params['grant_type'] = $grant_type;
        $params['appid'] = $this->appid;
        $params['secret'] = $this->secret;
        $http = new Http();
        $http->setUrl(ApiUrl::ACCESS_TOKEN);
        $http->setParam($params);
        return $http->exec();
    }

    /**
     * 登录凭证校验。通过 wx.login() 接口获得临时登录凭证 code 后传到开发者服务器调用此接口完成登录流程。更多使用方法详见 小程序登录。
     * @param string $code 登录时获取的 code
     * @return mixed
     */
    public function getSessionKey($code)
    {
        $params['appid'] = $this->appid;
        $params['secret'] = $this->secret;
        $params['js_code'] = $code;
        $params['grant_type'] = 'authorization_code';
        $http = new Http();
        $http->setUrl(ApiUrl::CODE_SESSION);
        $http->setParam($params);
        return $http->exec();
    }
}