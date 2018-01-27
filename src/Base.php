<?php
/**
 *
 *
 * @author 耐小心<i@naixiaoxin.com>
 * @copyright 2017-2018 耐小心
 */

namespace qiqizjl\coolq;

use Curl\Curl;

class Base
{

    protected $curl = null;

    protected $route    = "";
    protected $apiToken = "";
    protected $apiUrl   = "";

    /**
     * Base constructor.
     *
     * @param        $url
     * @param string $token
     * @throws \ErrorException
     */
    public function __construct($url, $token = "")
    {
        $this->apiToken = $token;
        $this->apiUrl   = $url;
        $this->curl     = new Curl();
    }


    /**
     * 发送数据
     *
     * @param array $data
     * @return array
     * @throws Exception
     */
    public function getData($data = [])
    {
        $url = $this->apiUrl . $this->route;
        $this->resetCurl();
        $this->curl->post($url, json_encode((object)$data));
        $this->checkRespError();
        $this->checkError();
        $data   = $this->curl->response;
        $result = json_decode($data, true);
        if (!$result) {
            throw new Exception("返回非JSON");
        }
        //解析返回数据
        if ($result["status"] == "failed") {
            throw new Exception("CoolQ Error:" . $result["retcode"]);
        }
        $this->curl->reset();
        return $result["data"];
    }

    /**
     * 重置curl
     */
    protected function resetCurl()
    {
        $this->curl->reset();
        if ($this->apiToken != "") {
            $this->curl->setHeader("Authorization", "Token " . $this->apiToken);
        }
        $this->curl->setHeader("Content-Type", "application/json");
    }

    /**
     * @throws Exception
     */
    private function checkError()
    {
        if ($this->curl->error) {
            throw new Exception("CurlError:" . $this->curl->error_code . "," . $this->curl->error_message);
        }
    }

    /**
     * @throws Exception
     */
    private function checkRespError()
    {
        if ($this->curl->http_error) {
            switch ($this->curl->http_status_code) {
                case 404:
                    throw new Exception("接口不存在");
                case 403:
                    throw new Exception("AccessToken错误");

                case 401:
                    throw new Exception("请提供AccessToken");

                default:
                    throw new Exception('CurlError:' . $this->curl->http_status_code . ":" . $this->curl->http_error_message);
            }
        }
    }

}