<?php
/**
 * +----------------------------------------------------------------------
 * | 请求Api地址
 * +----------------------------------------------------------------------
 * | Copyright (c) 2016 http://www.sunnyos.com All rights reserved.
 * +----------------------------------------------------------------------
 * | Date：2018-11-14 18:13:52
 * | Author: Sunny (admin@sunnyos.com) QQ：327388905
 * +----------------------------------------------------------------------
 */

namespace Sunny\WechatMini\Mini;
class ApiUrl
{
    /********************token**********************/
    // 获取Access_token
    const ACCESS_TOKEN = 'https://api.weixin.qq.com/cgi-bin/token';
    // code2Session 登录凭证校验。通过 wx.login() 接口获得临时登录凭证 code 后传到开发者服务器调用此接口完成登录流程。更多使用方法详见 小程序登录。
    const CODE_SESSION = 'https://api.weixin.qq.com/sns/jscode2session';


    /********************客服接口**********************/
    // 下发客服当前输入状态给用户
    const CUSTOMER_TYPING = 'https://api.weixin.qq.com/cgi-bin/message/custom/typing';
    // 获取客服消息内的临时素材
    const CUSTOMER_MEDIA = 'https://api.weixin.qq.com/cgi-bin/media/get';
    // 发送客服消息给用户
    const CUSTOMER_SEND_MESSAGE = 'https://api.weixin.qq.com/cgi-bin/message/custom/send';
    // 把媒体文件上传到微信服务器
    const CUSTOMER_TEMP_MEDIA = 'https://api.weixin.qq.com/cgi-bin/media/upload';

    /********************数据分析**********************/
    // 获取用户访问小程序日留存
    const ANALYSIS_DAILY_RETAIN = 'https://api.weixin.qq.com/datacube/getweanalysisappiddailyretaininfo';
    // 获取用户访问小程序数据概况
    const ANALYSIS_DAILY_SUMMARY = 'https://api.weixin.qq.com/datacube/getweanalysisappiddailysummarytrend';
    // 获取用户访问小程序数据日趋势
    const ANALYSIS_DAILY_VISIT_TREND = 'https://api.weixin.qq.com/datacube/getweanalysisappiddailyvisittrend';
    // 获取用户访问小程序月留存
    const ANALYSIS_MONTHLY_RETAIN = 'https://api.weixin.qq.com/datacube/getweanalysisappidmonthlyretaininfo';
    // 获取用户访问小程序数据月趋势
    const ANALYSIS_MONTHLY_VISIT_TREND = 'https://api.weixin.qq.com/datacube/getweanalysisappidmonthlyvisittrend';
    // 获取小程序新增或活跃用户的画像分布数据
    const ANALYSIS_USER_PORTRAIT = 'https://api.weixin.qq.com/datacube/getweanalysisappiduserportrait';
    // 获取用户小程序访问分布数据
    const ANALYSIS_VISIT_DISTRIBUTION = 'https://api.weixin.qq.com/datacube/getweanalysisappidvisitdistribution';
    // 访问页面。目前只提供按 page_visit_pv 排序的 top200。
    const ANALYSIS_VISIT_PAGE = 'https://api.weixin.qq.com/datacube/getweanalysisappidvisitpage';
    // 获取用户访问小程序周留存
    const ANALYSIS_WEEK_RETAIN = 'https://api.weixin.qq.com/datacube/getweanalysisappidweeklyretaininfo';
    // 获取用户访问小程序数据周趋势
    const ANALYSIS_WEEKLY_VISIT_TREND = 'https://api.weixin.qq.com/datacube/getweanalysisappidweeklyvisittrend';

    /********************附近的小程序**********************/
    // 添加地点
    const NEARBY_ADDPOI = 'https://api.weixin.qq.com/wxa/addnearbypoi';
    // 删除地点
    const NEARBY_DELETEPOI = 'https://api.weixin.qq.com/wxa/delnearbypoi';
    // 查看地点列表
    const NEARBY_LISTPOI = 'https://api.weixin.qq.com/wxa/getnearbypoilist';
    // 展示/取消展示附近小程序
    const NEARBY_POI_SHOW_STATUS = 'https://api.weixin.qq.com/wxa/setnearbypoishowstatus';

    /********************插件管理**********************/
    // 向插件开发者发起使用插件的申请
    const PLUGIN_ADD = 'https://api.weixin.qq.com/wxa/plugin';
    // 获取当前所有插件使用方（供插件开发者调用）
    const PLUGIN_DEV_APPLY_LIST = 'https://api.weixin.qq.com/wxa/devplugin';
    // 查询已添加的插件
    const PLUGIN_LIST = 'https://api.weixin.qq.com/wxa/plugin';
    // 修改插件使用申请的状态（供插件开发者调用）
    const PLUGIN_APPLY_STATUS = 'https://api.weixin.qq.com/wxa/devplugin';
    // 删除已添加的插件
    const PLUGIN_UNBIND = 'https://api.weixin.qq.com/wxa/plugin';

    /********************二维码**********************/
    // 获取小程序二维码
    const QRCODE_CREATE = 'https://api.weixin.qq.com/cgi-bin/wxaapp/createwxaqrcode';
    // 获取小程序码
    const QRCODE_GET = 'https://api.weixin.qq.com/wxa/getwxacode';
    // 获取小程序码
    const QRCODE_UNLIMIT = 'https://api.weixin.qq.com/wxa/getwxacodeunlimit';

    /********************内容安全**********************/
    const SECCHECK_IMG = 'https://api.weixin.qq.com/wxa/img_sec_check';
    const SECCHECK_MSG = 'https://api.weixin.qq.com/wxa/msg_sec_check';

    /********************模版消息**********************/
    // 组合模板并添加至帐号下的个人模板库
    const TEMPLATE_ADD = 'https://api.weixin.qq.com/cgi-bin/wxopen/template/add';
    // 删除帐号下的某个模板
    const TEMPLATE_DELETE = 'https://api.weixin.qq.com/cgi-bin/wxopen/template/del';
    // 获取模板库某个模板标题下关键词库
    const TEMPLATE_LIBRARY_BY_ID = 'https://api.weixin.qq.com/cgi-bin/wxopen/template/library/get';
    // 获取小程序模板库标题列表
    const TEMPLATE_LIBRAY_BY_LIST = 'https://api.weixin.qq.com/cgi-bin/wxopen/template/library/list';
    // 获取帐号下已存在的模板列表
    const TEMPLDATE_LIST = 'https://api.weixin.qq.com/cgi-bin/wxopen/template/list';
    // 发送模板消息
    const TEMPLATE_SEND = 'https://api.weixin.qq.com/cgi-bin/message/wxopen/template/send';
    // 下发小程序和公众号统一的服务消息
    const TEMPLDATE_SEND_UNIFORM_MESSAGE = 'https://api.weixin.qq.com/cgi-bin/message/wxopen/template/uniform_send';

    /********************动态消息**********************/
    // 创建被分享动态消息的 activity_id
    const ACTIVITY_CREATE = 'https://api.weixin.qq.com/cgi-bin/message/wxopen/activityid/create';
    // 修改被分享的动态消息
    const ACTIVITY_UPDATE = 'https://api.weixin.qq.com/cgi-bin/message/wxopen/updatablemsg/send';


}