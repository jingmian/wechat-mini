<?php
/**
 * +----------------------------------------------------------------------
 * | 附近的小程序接口
 * +----------------------------------------------------------------------
 * | Copyright (c) 2016 http://www.sunnyos.com All rights reserved.
 * +----------------------------------------------------------------------
 * | Date：2018-11-15 11:59:24
 * | Author: Sunny (admin@sunnyos.com) QQ：327388905
 * +----------------------------------------------------------------------
 */

namespace Sunny\WechatMini\Mini;


use Sunny\WechatMini\Library\Http;

class Near
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
     * @return Near
     */
    public function setAccessToken($access_token)
    {
        $this->access_token = $access_token;
        return $this;
    }

    /**
     * 执行网络请求
     * @param string $url 接口地址
     * @param $data
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
     * 添加附近小程序
     * @param array $data 小程序参数
     * @return mixed
     */
    public function addNearbyPoi($data)
    {
        return $this->exec(ApiUrl::NEARBY_ADDPOI, $data);
    }

    /**
     * 删除附近小程序
     * @param string $poi_id 附近地点ID
     * @return mixed
     */
    public function deleteNearbyPoi($poi_id)
    {
        $data['poi_id'] = $poi_id;
        return $this->exec(ApiUrl::NEARBY_DELETEPOI, $data);
    }

    /**
     * 查看地点列表
     * @param int $page 起始页id（从1开始计数）
     * @param int $page_rows 每页展示个数（最多1000个）
     * @return mixed
     */
    public function getNearbyPoiList($page, $page_rows)
    {
        $params['access_token'] = $this->getAccessToken();
        $params['page'] = $page;
        $params['page_rows'] = $page_rows;
        $http = new Http();
        $http->setUrl(ApiUrl::NEARBY_LISTPOI);
        $http->setParam($params);
        return $http->exec();
    }

    /**
     * 展示/取消展示附近小程序
     * @param string $poi_id 附近地点id
     * @param int $status 是否展示
     * @return mixed
     */
    public function setNearbyPoiShowStatus($poi_id, $status)
    {
        $data['poi_id'] = $poi_id;
        $data['status'] = $status;
        return $this->exec(ApiUrl::NEARBY_POI_SHOW_STATUS,$data);
    }
}