<?php
/**
 *
 *
 * @author 耐小心<i@naixiaoxin.com>
 * @copyright 2017-2018 耐小心
 */

namespace qiqizjl\coolq\plugin;

use qiqizjl\coolq\Base;

class Restart extends Base
{

    //protected $route = "/set_restart";

    /**
     * 重启酷Q
     *
     * @return bool
     * @throws \qiqizjl\coolq\Exception
     */
    public function restartCoolQ()
    {
        $this->route = "/set_restart";
        $this->getData();
        return true;
    }

    /**
     * 重启插件
     *
     * @return bool
     * @throws \qiqizjl\coolq\Exception
     */
    public function restartPlugin()
    {
        $this->route = "/set_restart_plugin";
        $this->getData();
        return true;
    }
}