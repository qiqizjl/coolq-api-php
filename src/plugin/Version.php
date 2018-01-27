<?php
/**
 *
 *
 * @author 耐小心<i@naixiaoxin.com>
 * @copyright 2017-2018 耐小心
 */

namespace naixiaoxin\coolq\plugin;

use naixiaoxin\coolq\Base;

class Version extends Base
{
    
    protected $route = "/get_version_info";


    /**
     * 获得酷Q版本信息
     * @return array
     * @throws \naixiaoxin\coolq\Exception
     */
    public function getVersionInfo()
    {
        return $this->getData();
    }


    /**
     * 酷Q的根目录
     * @return mixed
     * @throws \naixiaoxin\coolq\Exception
     */
    public function getCoolQDirectory()
    {
        return $this->getVersionInfo()["coolq_directory"];
    }

    /**
     * 获得酷Q版本
     * @return mixed
     * @throws \naixiaoxin\coolq\Exception
     */
    public function getCoolQEdition()
    {
        return $this->getVersionInfo()["coolq_edition"];
    }

    /**
     * 获得插件版本
     * @return mixed
     * @throws \naixiaoxin\coolq\Exception
     */
    public function getPluginVersion()
    {
        return $this->getVersionInfo()["plugin_version"];
    }

    /**
     * 获得插件Build
     * @return mixed
     * @throws \naixiaoxin\coolq\Exception
     */
    public function getPluginBuild()
    {
        return $this->getVersionInfo()["plugin_build_number"];
    }

    /**
     * 获得插件环境 debug/release
     * @return mixed
     * @throws \naixiaoxin\coolq\Exception
     */
    public function getPluginConfiguration()
    {
        return $this->getVersionInfo()["plugin_build_configuration"];
    }

}