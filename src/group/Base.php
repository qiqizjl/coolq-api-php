<?php
/**
 *
 *
 * @author 耐小心<i@naixiaoxin.com>
 * @copyright 2017-2018 耐小心
 */

namespace naixiaoxin\coolq\group;

use naixiaoxin\coolq\Base as CoolQBase;


class Base extends CoolQBase{
    protected $group_id = 0;

    public function __construct($url,$token = "",$group_id = 0)
    {
        parent::__construct($url,$token);
        $this->group_id = $group_id;
    }

    /**
     * @return int
     */
    public function getGroupId()
    {
        return $this->group_id;
    }

    /**
     * @param int $group_id
     */
    public function setGroupId($group_id)
    {
        $this->group_id = $group_id;
    }

    /**
     * 获得数据
     * @param array $data
     * @return array
     * @throws \naixiaoxin\coolq\Exception
     */
    public function getData($data = [])
    {
        $data["group_id"] = $this->group_id;
        return parent::getData($data);
    }
}