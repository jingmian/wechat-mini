<?php
/**
 * +----------------------------------------------------------------------
 * | 二维码
 * +----------------------------------------------------------------------
 * | Copyright (c) 2016 http://www.sunnyos.com All rights reserved.
 * +----------------------------------------------------------------------
 * | Date：2018-11-15 12:33:17
 * | Author: Sunny (admin@sunnyos.com) QQ：327388905
 * +----------------------------------------------------------------------
 */

namespace Sunny\WechatMini\Mini;


use Sunny\WechatMini\Traits\Common;

class Qrcode
{
    use Common;

    /**
     * 获取小程序二维码，适用于需要的码数量较少的业务场景。通过该接口生成的小程序码，永久有效，有数量限制。
     * @param string $path 扫码进入的小程序页面路径，最大长度 128 字节，不能为空
     * @param string $width 二维码的宽度，默认 430px，最小 280px，最大 1280px
     * @return mixed
     */
    public function createWXAQRCode($path, $width = '430px')
    {
        $data['path'] = $path;
        $data['width'] = $width;
        return $this->exec(ApiUrl::QRCODE_CREATE, $data);
    }

    /**
     * 获取小程序码，适用于需要的码数量较少的业务场景。通过该接口生成的小程序码，永久有效，有数量限制，详见获取二维码。
     * @param string $path 扫码进入的小程序页面路径，最大长度 128 字节，不能为空
     * @param string $width 二维码的宽度，默认为 430px，最小 280px，最大 1280px
     * @param array $line_color auto_color 为 false 时生效，使用 rgb 设置颜色 例如 {"r":"xxx","g":"xxx","b":"xxx"},十进制表示，默认全 0
     * @param bool $is_hyaline 是否需要透明底色，为 true 时，生成透明底色的小程序码，默认 false
     * @param bool $auto_color 自动配置线条颜色，如果颜色依然是黑色，则说明不建议配置主色调，默认 false
     * @return mixed
     */
    public function getWXACode($path, $width = '430px', $line_color = ['r'=>0,'g'=>0,'b'=>0], $is_hyaline = false, $auto_color = false)
    {
        $data['path'] = $path;
        $data['width'] = $width;
        $data['line_color'] = $line_color;
        $data['is_hyaline'] = $is_hyaline;
        $data['auto_color'] = $auto_color;
        return $this->exec(ApiUrl::QRCODE_GET,$data);
    }

    /**
     * 获取小程序码，适用于需要的码数量极多的业务场景。通过该接口生成的小程序码，永久有效，数量暂无限制。 更多用法详见 获取二维码。
     * @param string $scene 小程序界面参数
     * @param string $page 跳转界面
     * @param string $width 二维码的宽度，默认为 430px，最小 280px，最大 1280px
     * @param array $line_color auto_color 为 false 时生效，使用 rgb 设置颜色 例如 {"r":"xxx","g":"xxx","b":"xxx"},十进制表示，默认全 0
     * @param bool $is_hyaline 是否需要透明底色，为 true 时，生成透明底色的小程序码，默认 false
     * @param bool $auto_color 自动配置线条颜色，如果颜色依然是黑色，则说明不建议配置主色调，默认 false
     * @return mixed
     */
    public function getWXACodeUnlimit($scene,$page,$width = '430px',$line_color = ['r'=>0,'g'=>0,'b'=>0], $is_hyaline = false, $auto_color = false){
        $data['scene'] = $scene;
        $data['page'] = $page;
        $data['width'] = $width;
        $data['line_color'] = $line_color;
        $data['is_hyaline'] = $is_hyaline;
        $data['auto_color'] = $auto_color;
        return $this->exec(ApiUrl::QRCODE_UNLIMIT,$data);
    }
}