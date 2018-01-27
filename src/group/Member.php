<?php
/**
 *
 *
 * @author 耐小心<i@naixiaoxin.com>
 * @copyright 2017-2018 耐小心
 */

namespace qiqizjl\coolq\group;


class Member extends Base{

    /**
     * 获得群成员
     * @return array
     * @throws \qiqizjl\coolq\Exception
     */
    public function getMemberList()
    {
        $this->route = "/get_group_member_list";
        return $this->getData([]);
    }


    /**
     * 获得群成员信息
     * @param      $user_id
     * @param bool $no_cache
     * @return array
     * @throws \qiqizjl\coolq\Exception
     */
    public function getMemberInfo($user_id,$no_cache = false)
    {
        $this->route = "/get_group_member_info";
        return $this->getData([
            "user_id"=>$user_id,
            "no_cache"=>$no_cache,
        ]);
    }

    /**
     * 设置某位成员禁言
     * @param     $user_id
     * @param int $time
     * @return array
     * @throws \qiqizjl\coolq\Exception
     */
    public function setMemberBan($user_id,$time = 0)
    {
        $this->route = "/set_group_ban";
        return $this->getData([
            "user_id"=>$user_id,
            "duration"=>$time
        ]);
    }

    /**
     * 全体禁言
     * @param $enable
     * @return array
     * @throws \qiqizjl\coolq\Exception
     */
    public function setAllBan($enable)
    {
        $this->route = "/set_group_whole_ban";
        return $this->getData([
            "enable"=>$enable
        ]);
    }

    /**
     * 设置管理员
     * @param      $user_id
     * @param bool $enable
     * @return array
     * @throws \qiqizjl\coolq\Exception
     */
    public function setAdmin($user_id,$enable = false)
    {
        $this->route = "/set_group_admin";
        return $this->getData([
            "user_id"=>$user_id,
            "enable"=>$enable
        ]);
    }

    /**
     * 是否允许匿名
     * @param $enable
     * @return array
     * @throws \qiqizjl\coolq\Exception
     */
    public function setAnonymous($enable)
    {
        $this->route = "/set_group_anonymous";
        return $this->getData([
            "enable"=>$enable
        ]);
    }


    /**
     * 设置群名片
     * @param        $user_id
     * @param string $card
     * @return array
     * @throws \qiqizjl\coolq\Exception
     */
    public function setMemberCard($user_id,$card = "")
    {
        $this->route = "/set_group_card";
        return $this->getData([
            "user_id"=>$user_id,
            "card"=>$card
        ]);
    }

    /**
     * T用户
     * @param      $user_id
     * @param bool $reject_add
     * @return array
     * @throws \qiqizjl\coolq\Exception
     */
    public function deleteMember($user_id,$reject_add = false)
    {
        $this->route = "/set_group_kick";
        return $this->getData([
            "user_id"=>$user_id,
            "reject_add_request"=>$reject_add
        ]);
    }

    /**
     * 离开群组
     * @param bool $is_dismiss
     * @return array
     * @throws \qiqizjl\coolq\Exception
     */
    public function leaveGroup($is_dismiss = false)
    {
        $this->route = "/set_group_leave";
        return $this->getData([
            "is_dismiss"=>$is_dismiss,
        ]);
    }
}