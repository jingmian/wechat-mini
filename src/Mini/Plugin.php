<?php
/**
 * +----------------------------------------------------------------------
 * | 插件管理
 * +----------------------------------------------------------------------
 * | Copyright (c) 2016 http://www.sunnyos.com All rights reserved.
 * +----------------------------------------------------------------------
 * | Date：2018-11-15 12:16:45
 * | Author: Sunny (admin@sunnyos.com) QQ：327388905
 * +----------------------------------------------------------------------
 */

namespace Sunny\WechatMini\Mini;


use Sunny\WechatMini\Library\Http;

class Plugin
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
     * @return Plugin
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
    private function exec($url, $data)
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

    /**
     * 向插件开发者发起使用插件的申请
     * @param string $plugin_appid 插件 appId
     * @param string $reason 申请使用理由，选填
     * @return mixed
     */
    public function applyPlugin($plugin_appid, $reason)
    {
        $data['action'] = 'apply';
        $data['plugin_appid'] = $plugin_appid;
        $data['reason'] = $reason;
        return $this->exec(ApiUrl::PLUGIN_ADD, $data);
    }

    /**
     * 获取当前所有插件使用方（供插件开发者调用）
     * @param int $page 要拉取第几页的数据
     * @param int $num 每页的记录数
     * @return mixed
     */
    public function getPluginDevApplyList($page, $num)
    {
        $data['action'] = 'dev_apply_list';
        $data['page'] = $page;
        $data['num'] = $num;
        return $this->exec(ApiUrl::PLUGIN_DEV_APPLY_LIST, $data);
    }

    /**
     * 查询已添加的插件
     * @return mixed
     */
    public function getPluginList()
    {
        $data['action'] = 'list';
        return $this->exec(ApiUrl::PLUGIN_LIST, $data);
    }

    /**
     * 修改插件使用申请的状态（供插件开发者调用）
     * @param string $action 修改操作
     * @param string $appid 使用者的 appid。可选，同意申请时填写。
     * @param string $reason 拒绝理由。可选，拒绝申请时填写。
     * @return mixed
     */
    public function setDevPluginApplyStatus($action, $appid = '', $reason = '')
    {
        $data['action'] = $action;
        if ($action == 'dev_agree') {
            $data['appid'] = $appid;
        }
        if ($action == 'dev_refuse') {
            $data['reason'] = $reason;
        }
        return $this->exec(ApiUrl::PLUGIN_APPLY_STATUS, $data);
    }

    /**
     * 删除已添加的插件
     * @param string $plugin_appid 插件 appId
     * @return mixed
     */
    public function unbindPlugin($plugin_appid){
        $data['action'] = 'unbind';
        $data['plugin_appid'] = $plugin_appid;
        return $this->exec(ApiUrl::PLUGIN_UNBIND,$data);
    }
}