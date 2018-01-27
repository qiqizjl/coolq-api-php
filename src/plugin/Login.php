<?php
/**
 *
 *
 * @author 耐小心<i@naixiaoxin.com>
 * @copyright 2017-2018 耐小心
 */

namespace qiqizjl\coolq\plugin;

use qiqizjl\coolq\Base;

class Login extends Base{

    protected $route = "/get_login_info";

    public function getLoginInfo()
    {
        return $this->getData();
    }

    public function getLoginQQ()
    {
        return $this->getLoginInfo()["user_id"];
    }

    public function getLoginNickName()
    {
        return $this->getLoginInfo()["nickname"];
    }
}