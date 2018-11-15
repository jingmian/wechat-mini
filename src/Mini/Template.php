<?php
/**
 * +----------------------------------------------------------------------
 * | 模版消息
 * +----------------------------------------------------------------------
 * | Copyright (c) 2016 http://www.sunnyos.com All rights reserved.
 * +----------------------------------------------------------------------
 * | Date：2018-11-15 12:53:16
 * | Author: Sunny (admin@sunnyos.com) QQ：327388905
 * +----------------------------------------------------------------------
 */

namespace Sunny\WechatMini\Mini;


use Sunny\WechatMini\Library\Http;

class Template
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
     * @return Template
     */
    public function setAccessToken($access_token)
    {
        $this->access_token = $access_token;
        return $this;
    }

    /**
     * 执行网络请求
     * @param string $url 接口地址
     * @param array $data post数组
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
     * 组合模板并添加至帐号下的个人模板库
     * @param string $id 模板标题id，可通过接口获取，也可登录小程序后台查看获取
     * @param Array.<number> $keyword_id_list 开发者自行组合好的模板关键词列表，关键词顺序可以自由搭配（例如[3,5,4]或[4,5,3]），最多支持10个关键词组合
     * @return mixed
     */
    public function addTemplate($id, $keyword_id_list)
    {
        $data['id'] = $id;
        $data['keyword_id_list'] = $keyword_id_list;
        return $this->exec(ApiUrl::TEMPLATE_ADD, $data);
    }

    /**
     * 删除帐号下的某个模板
     * @param string $template_id 要删除的模版id
     * @return mixed
     */
    public function deleteTemplate($template_id)
    {
        $data['template_id'] = $template_id;
        return $this->exec(ApiUrl::TEMPLATE_DELETE, $data);
    }

    /**
     * 获取模板库某个模板标题下关键词库
     * @param string $id 模板标题id，可通过接口获取，也可登录小程序后台查看获取
     * @return mixed
     */
    public function getTemplateLibraryById($id)
    {
        $data['id'] = $id;
        return $this->exec(ApiUrl::TEMPLATE_LIBRARY_BY_ID, $data);
    }

    /**
     * 获取小程序模板库标题列表
     * @param int $offset offset和count用于分页，表示从offset开始，拉取count条记录，offset从0开始，count最大为20。
     * @param int $count offset和count用于分页，表示从offset开始，拉取count条记录，offset从0开始，count最大为20。
     * @return mixed
     */
    public function getTemplateLibraryList($offset, $count)
    {
        $data['offset'] = $offset;
        $data['count'] = $count;
        return $this->exec(ApiUrl::TEMPLATE_LIBRAY_BY_LIST, $data);
    }

    /**
     * 获取帐号下已存在的模板列表
     * @param int $offset offset和count用于分页，表示从offset开始，拉取count条记录，offset从0开始，count最大为20。
     * @param int $count offset和count用于分页，表示从offset开始，拉取count条记录，offset从0开始，count最大为20。
     * @return mixed
     */
    public function getTemplateList($offset, $count)
    {
        $data['offset'] = $offset;
        $data['count'] = $count;
        return $this->exec(ApiUrl::TEMPLDATE_LIST, $data);
    }

    /**
     * 发送模板消息
     * @param string $openid 接收者（用户）的 openid
     * @param string $template_id 所需下发的模板消息的id
     * @param string $form_id 表单提交场景下，为 submit 事件带上的 formId；支付场景下，为本次支付的 prepay_id
     * @param string $data 模板内容，不填则下发空模板
     * @param string $page 点击模板卡片后的跳转页面，仅限本小程序内的页面。支持带参数,（示例index?foo=bar）。该字段不填则模板无跳转。
     * @param string $emphasis_keyword 模板需要放大的关键词，不填则默认无放大
     * @return mixed
     */
    public function sendTemplateMessage($openid, $template_id, $form_id, $data = null, $page = null, $emphasis_keyword = null)
    {
        $data = array(
            'touser' => $openid,
            'template_id' => $template_id,
            'page' => $page,
            'form_id' => $form_id,
            'data' => $data,
            'emphasis_keyword' => $emphasis_keyword,
        );
        return $this->exec(ApiUrl::TEMPLATE_SEND, $data);
    }
}