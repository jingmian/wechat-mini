<?php

use Sunny\WechatMini\WechatMini;

require_once '../vendor/autoload.php';
$token = '15_oOSxJXpjOt75egHm1MCnkSmCLK9ceByJF_s5Uj-98fgh0YM0V3KuHDbcwDm9gYxXc5zcsofArSZKtEouDuSyZFMwggX4GdgZkS2gFoU2MoJLuWeJry_8Kuni8qhyTlDYR_4ebfTGe4ccpcRSLXIdAJAAMX';
$appid = '';
$secret = '';
$wechat = new WechatMini($appid,$secret);

/************************token***********************/
// 获取access_token
//echo $wechat->getToken()->getAccessToken();
// code 获取openid
//$code = '023y3luM1ooOz41LfnsM1rH9uM1y3lub';
//echo $wechat->getToken()->getSessionKey($code);

/************************数据分析***********************/
// 获取用户访问小程序日留存
//echo $wechat->getAnaly()->setAccessToken($token)->dailyRetain('20170313','20170313');
// 获取用户访问小程序数据概况
//echo $wechat->getAnaly()->setAccessToken($token)->dailySummary('20170313','20170313');
// 获取用户访问小程序数据日趋势
//echo $wechat->getAnaly()->setAccessToken($token)->dailyVisitTrend('20170313','20170313');
// 获取用户访问小程序月留存
//echo $wechat->getAnaly()->setAccessToken($token)->monthlyRetain('20170201','20170228');
// 获取用户访问小程序月留存
//echo $wechat->getAnaly()->setAccessToken($token)->monthlyVisitTrend('20170301','20170331');
// 获取小程序新增或活跃用户的画像分布数据
//echo $wechat->getAnaly()->setAccessToken($token)->userPortrait('2017-06-11','2017-06-14');
// 获取用户小程序访问分布数据
//echo $wechat->getAnaly()->setAccessToken($token)->visitDistribution('20170313','20170313');
// 访问页面。目前只提供按 page_visit_pv 排序的 top200。
//echo $wechat->getAnaly()->setAccessToken($token)->visitPage('20170313','20170313');
// 获取用户访问小程序周留存
//echo $wechat->getAnaly()->setAccessToken($token)->weeklyRetain('20170306','20170312');
// 获取用户访问小程序数据周趋势
//echo $wechat->getAnaly()->setAccessToken($token)->weeklyVisitTrend('20170306','20170312');

/************************附近的小程序***********************/
// 添加附近小程序
/*
$data['related_name'] = 'XXX公司';
$data['related_credential'] = '12345678-0';
$data['related_address'] = '广州市新港中路397号TIT创意园';
$data['related_proof_material'] = '3LaLzqiTrQcD20DlX_o-OV1-nlYMu7sdVAL7SV2PrxVyjZFZZmB3O6LPGaYXlZWq';
echo $wechat->getNear()->setAccessToken($token)->addNearbyPoi($data);
*/
// 删除附近小程序
//echo $wechat->getNear()->setAccessToken($token)->deleteNearbyPoi('poi_id');
// 查看地点列表
//echo $wechat->getNear()->setAccessToken($token)->getNearbyPoiList(1,1000);
// 展示/取消展示附近小程序
//echo $wechat->getNear()->setAccessToken($token)->setNearbyPoiShowStatus($poi_id,1);

/************************插件管理***********************/
// 向插件开发者发起使用插件的申请
//echo $wechat->getPlugin()->setAccessToken($token)->applyPlugin('aaaa','hello');
// 获取当前所有插件使用方（供插件开发者调用）
//echo $wechat->getPlugin()->setAccessToken($token)->getPluginDevApplyList(1,100);
// 查询已添加的插件
//echo $wechat->getPlugin()->setAccessToken($token)->getPluginList();
// 修改插件使用申请的状态（供插件开发者调用）
//echo $wechat->getPlugin()->setAccessToken($token)->setDevPluginApplyStatus('dev_agree','aaa');
// 删除已添加的插件
//echo $wechat->getPlugin()->setAccessToken($token)->unbindPlugin('aaa');

/************************二维码***********************/
// 获取小程序二维码，适用于需要的码数量较少的业务场景。通过该接口生成的小程序码，永久有效，有数量限制，详见获取二维码。
//echo $wechat->getQrcode()->setAccessToken($token)->createWXAQRCode('index/index');
// 获取小程序码，适用于需要的码数量较少的业务场景。通过该接口生成的小程序码，永久有效，有数量限制，详见获取二维码。
//echo $wechat->getQrcode()->setAccessToken($token)->getWXACode('index/index');
// 获取小程序码，适用于需要的码数量极多的业务场景。通过该接口生成的小程序码，永久有效，数量暂无限制。 更多用法详见 获取二维码。
//echo $wechat->getQrcode()->setAccessToken($token)->getWXACodeUnlimit('aaa=sd','pages/index/index');

/************************模版消息***********************/
// 组合模板并添加至帐号下的个人模板库
//echo $wechat->getTemplate()->setAccessToken($token)->addTemplate('AT0002',[3,4,5]);
// 删除账号下的某个模版
//echo $wechat->getTemplate()->setAccessToken($token)->deleteTemplate('AdhLMJ9OXb3Wo5WTX35uoxcussybsQpLJ_AcUE9n2QQ');
// 获取模板库某个模板标题下关键词库
//echo $wechat->getTemplate()->setAccessToken($token)->getTemplateLibraryById('AT0002');
// 获取小程序模板库标题列表
//echo $wechat->getTemplate()->setAccessToken($token)->getTemplateLibraryList(0,20);
// 获取帐号下已存在的模板列表
//echo $wechat->getTemplate()->setAccessToken($token)->getTemplateList(0,20);
// 发送模板消息
/*$data = [
    'keyword1'=>[
        'value'=>'test'
    ],
    'keyword2'=>[
        'value'=>'测试',
    ]
];
$emphasis_keyword = 'keyword1.DATA';
echo $wechat->getTemplate()->setAccessToken($token)->sendTemplateMessage('openid','template_id','FORMID',$data,'index',$emphasis_keyword);*/