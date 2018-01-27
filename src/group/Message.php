<?php
/**
 *
 *
 * @author 耐小心<i@naixiaoxin.com>
 * @copyright 2017-2018 耐小心
 */

namespace qiqizjl\coolq\group;


class Message extends Base{

    /**
     * 发送群消息
     * @param      $message
     * @param  $autoEscape
     * @param bool $isAsync
     * @return array
     * @throws \qiqizjl\coolq\Exception
     */
    public function sendMessage($message,$autoEscape = false,$isAsync = false)
    {
        $this->route = $isAsync ? "/send_group_msg_async":"/send_group_msg";
        return $this->getData([
            "message"=>$message,
            'auto_escape'=>$autoEscape
        ]);
    }



}