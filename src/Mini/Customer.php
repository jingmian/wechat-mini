<?php
/**
 * +----------------------------------------------------------------------
 * | 客服接口
 * +----------------------------------------------------------------------
 * | Copyright (c) 2016 http://www.sunnyos.com All rights reserved.
 * +----------------------------------------------------------------------
 * | Date：2018-11-14 20:10:12
 * | Author: Sunny (admin@sunnyos.com) QQ：327388905
 * +----------------------------------------------------------------------
 */

namespace Sunny\WechatMini\Mini;


use Sunny\WechatMini\Library\Http;
use Sunny\WechatMini\Traits\Common;

class Customer
{
    use Common;

    // 对用户下发"正在输入"状态
    const TYPING = 'Typing';
    // 取消对用户的"正在输入"状态
    const CANCEL = 'CancelTyping';

    /**
     * 下发状态
     * @param string $openid 用户openid
     * @param string $command 命令
     * @return mixed
     */
    public function typing($openid, $command)
    {
        $params['access_token'] = $this->getAccessToken();
        $data['touser'] = $openid;
        $data['command'] = $command;
        $http = new Http();
        $http->setUrl(ApiUrl::CUSTOMER_TYPING);
        $http->setMethod(Http::POST);
        $http->setIsJson(true);
        $http->setParam($params);
        $http->setData($data);
        return $http->exec();
    }

    /**
     * 获取客服消息内的临时素材
     * @param string $media_id 媒体文件 ID
     * @return mixed
     */
    public function media($media_id)
    {
        $params['access_token'] = $this->getAccessToken();
        $params['media_id'] = $media_id;
        $http = new Http();
        $http->setUrl(ApiUrl::CUSTOMER_MEDIA);
        $http->setMethod(Http::GET);
        return $http->exec();
    }

    /**
     * 上传素材文件
     * @param form-data $media 文件
     * @return mixed
     */
    public function uploadMedia($media){
        $params['access_token'] = $this->getAccessToken();
        $params['type'] = $this->access_token;
        $data['media'] = $media;
        $http = new Http();
        $http->setUrl(ApiUrl::CUSTOMER_TEMP_MEDIA);
        $http->setMethod(Http::POST);
        $http->setParam($params);
        $http->setIsJson(true);
        $http->setData($data);
        return $http->exec();
    }

    /**
     * 下发模版消息
     * @param string $openid 用户openid
     * @param string $msgtype 消息类型：text、image、link、miniprogrampage
     * @param array $msgData 消息参数：https://developers.weixin.qq.com/miniprogram/dev/api/open-api/customer-message/sendCustomerMessage.html
     * @return mixed
     */
    public function sendMessage($openid, $msgtype, $msgData)
    {
        $params['access_token'] = $this->getAccessToken();
        $data['touser'] = $openid;
        $data['msgtype'] = $msgtype;
        $data[$msgtype] = $msgData;
        $http = new Http();
        $http->setUrl(ApiUrl::CUSTOMER_SEND_MESSAGE);
        $http->setMethod(Http::POST);
        $http->setIsJson(true);
        $http->setParam($params);
        $http->setData($data);
        return $http->exec();
    }

}