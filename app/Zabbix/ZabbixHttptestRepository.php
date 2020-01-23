<?php

namespace App\Entities\Zabbix;
use App\Enums\ZabbixTemplate;
//use Flash;

/**
 * Class ZabbixHostRepository.
 *
 * @package namespace App\Entities\Zabbix;
 */
class ZabbixHttptestRepository
{
    /**
     * The ZabbixApi instance.
     *
     * @var \Becker\Zabbix\ZabbixApi
     */
    protected $zabbix;

    public function __construct()
    {
        $this->zabbix = app('zabbix');
    }
    /**
     * Get All hosts
     */
    public function all()
    {

    }

    public function find($id)
    {
    }

    public function findByUrl($url)
    {
        $httptest = $this->zabbix->httptestGet([
            "filter" => [
                "name" => remove_http($url),
            ]
        ]);

        return $httptest;
    }

    public function createHttptestIfNotExists($url, $host_id, $app_id, $interval)
    {

        $httptest = $this->findByUrl($url);
//        dd($httptest);
        $httptest_id = null;
        if ($httptest !== []) {
            $httptest_id = $httptest[0]->httptestid;
        }

        if ($httptest_id === null) {

            $httptest_id = $this->httpstestCreate($url, $host_id, $app_id, $interval);

//            Flash::success(__('Web scenario for FirstPage is created.'));
        }
        return $httptest_id;
    }


    public function httpstestCreate($url, $host_id, $app_id, $interval)
    {
        $httptest = $this->zabbix->httptestCreate([
            "name" => remove_http($url),
            "hostid" => $host_id,
            "delay" => $interval,
            "applicationid" => $app_id,
            "steps" => [
                [
                    "name" => "FirstPage",
                    "url" => $url,
                    "status_codes" => "200",
                    "no" => 1
                ]
            ]
        ]);
        $httptest_id = $httptest->httptestids[0];

        return $httptest_id;
    }

}
