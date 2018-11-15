<?php
/**
 * +----------------------------------------------------------------------
 * | 数据分析接口
 * +----------------------------------------------------------------------
 * | Copyright (c) 2016 http://www.sunnyos.com All rights reserved.
 * +----------------------------------------------------------------------
 * | Date：2018-11-15 00:25:55
 * | Author: Sunny (admin@sunnyos.com) QQ：327388905
 * +----------------------------------------------------------------------
 */

namespace Sunny\WechatMini\Mini;


use Sunny\WechatMini\Exception\WechatMiniException;
use Sunny\WechatMini\Library\Http;

class Analy
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
     * @return Analy
     */
    public function setAccessToken($access_token)
    {
        $this->access_token = $access_token;
        return $this;
    }

    /**
     * 执行网络请求
     * @param string $url 接口地址
     * @param string $begin_date $begin_date 开始日期。格式为 yyyymmdd
     * @param string $end_date $end_date 结束日期，限定查询1天数据，允许设置的最大值为昨日。格式为 yyyymmdd
     * @return mixed
     */
    private function exec($url, $begin_date = '', $end_date = '')
    {
        $params['access_token'] = $this->getAccessToken();
        $data['begin_date'] = $begin_date;
        $data['end_date'] = $end_date;
        $http = new Http();
        $http->setUrl($url);
        $http->setMethod(Http::POST);
        $http->setIsJson(true);
        $http->setParam($params);
        $http->setData($data);
        return $http->exec();
    }


    /**
     * 获取用户访问小程序日留存
     * @param string $begin_date 开始日期。格式为 yyyymmdd
     * @param string $end_date 结束日期，限定查询1天数据，允许设置的最大值为昨日。格式为 yyyymmdd
     * @return mixed
     */
    public function dailyRetain($begin_date = '', $end_date = '')
    {
        return $this->exec(ApiUrl::ANALYSIS_DAILY_RETAIN, $begin_date, $end_date);
    }

    /**
     * 获取用户访问小程序数据概况
     * @param string $begin_date 开始日期。格式为 yyyymmdd
     * @param string $end_date 结束日期，限定查询1天数据，允许设置的最大值为昨日。格式为 yyyymmdd
     * @return mixed
     */
    public function dailySummary($begin_date = '', $end_date = '')
    {
        return $this->exec(ApiUrl::ANALYSIS_DAILY_SUMMARY, $begin_date, $end_date);
    }

    /**
     * 获取用户访问小程序数据概况
     * @param string $begin_date 开始日期。格式为 yyyymmdd
     * @param string $end_date 结束日期，限定查询1天数据，允许设置的最大值为昨日。格式为 yyyymmdd
     * @return mixed
     */
    public function dailyVisitTrend($begin_date = '', $end_date = '')
    {
        return $this->exec(ApiUrl::ANALYSIS_DAILY_VISIT_TREND, $begin_date, $end_date);
    }

    /**
     * 获取用户访问小程序月留存
     * @param string $begin_date 开始日期。格式为 yyyymmdd
     * @param string $end_date 结束日期，限定查询1天数据，允许设置的最大值为昨日。格式为 yyyymmdd
     * @return mixed
     */
    public function monthlyRetain($begin_date = '', $end_date = '')
    {
        return $this->exec(ApiUrl::ANALYSIS_MONTHLY_RETAIN, $begin_date, $end_date);
    }

    /**
     * 获取用户访问小程序数据月趋势
     * @param string $begin_date 开始日期。格式为 yyyymmdd
     * @param string $end_date 结束日期，限定查询1天数据，允许设置的最大值为昨日。格式为 yyyymmdd
     * @return mixed
     */
    public function monthlyVisitTrend($begin_date = '', $end_date = '')
    {
        return $this->exec(ApiUrl::ANALYSIS_MONTHLY_VISIT_TREND, $begin_date, $end_date);
    }

    /**
     * 获取小程序新增或活跃用户的画像分布数据
     * @param string $begin_date 开始日期。格式为 yyyy-mm-dd
     * @param string $end_date 结束日期，限定查询1天数据，允许设置的最大值为昨日。格式为 yyyy-mm-dd
     * @return mixed
     */
    public function userPortrait($begin_date = '', $end_date = '')
    {
        return $this->exec(ApiUrl::ANALYSIS_USER_PORTRAIT, $begin_date, $end_date);
    }

    /**
     * 获取用户小程序访问分布数据
     * @param string $begin_date 开始日期。格式为 yyyymmdd
     * @param string $end_date 结束日期，限定查询1天数据，允许设置的最大值为昨日。格式为 yyyymmdd
     * @return mixed
     */
    public function visitDistribution($begin_date = '', $end_date = '')
    {
        return $this->exec(ApiUrl::ANALYSIS_VISIT_DISTRIBUTION, $begin_date, $end_date);
    }

    /**
     * 访问页面。目前只提供按 page_visit_pv 排序的 top200。
     * @param string $begin_date 开始日期。格式为 yyyymmdd
     * @param string $end_date 结束日期，限定查询1天数据，允许设置的最大值为昨日。格式为 yyyymmdd
     * @return mixed
     */
    public function visitPage($begin_date = '', $end_date = '')
    {
        return $this->exec(ApiUrl::ANALYSIS_VISIT_PAGE, $begin_date, $end_date);
    }

    /**
     * 获取用户访问小程序周留存
     * @param string $begin_date 开始日期。格式为 yyyymmdd
     * @param string $end_date 结束日期，限定查询1天数据，允许设置的最大值为昨日。格式为 yyyymmdd
     * @return mixed
     */
    public function weeklyRetain($begin_date = '', $end_date = '')
    {
        return $this->exec(ApiUrl::ANALYSIS_WEEK_RETAIN, $begin_date, $end_date);
    }

    /**
     * 获取用户访问小程序数据周趋势
     * @param string $begin_date 开始日期。格式为 yyyymmdd
     * @param string $end_date 结束日期，限定查询1天数据，允许设置的最大值为昨日。格式为 yyyymmdd
     * @return mixed
     */
    public function weeklyVisitTrend($begin_date = '', $end_date = '')
    {
        return $this->exec(ApiUrl::ANALYSIS_WEEKLY_VISIT_TREND, $begin_date, $end_date);
    }

}