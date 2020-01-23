<?php

namespace App\Entities\Zabbix;

use App\Enums\ZabbixTemplate;
use Carbon\Carbon;
//use Flash;

/**
 * Class ZabbixApplicationRepository.
 *
 * @package namespace App\Entities\Zabbix;
 */
class ZabbixItemRepository
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

    public function findHostId($host_id, $webitem = '1')
    {
        if ($webitem === '1') {
            $hostItems = $this->zabbix->itemGet([
                "output" => "extend",
                "hostids" => $host_id,
                "webitems" => $webitem,
                "sortfield" => "name",
            ]);
        } else {
            $hostItems = $this->zabbix->itemGet([
                "output" => "extend",
                "hostids" => $host_id,
                "sortfield" => "name",
            ]);
        }


        return $hostItems;
    }


    public function updateItemDelay($itemid, $delay)
    {
        $i = $this->zabbix->itemUpdate([
            "itemid" => $itemid,
            "delay" => $delay
        ]);

        return $i;
    }


    public function findItemsByHostId($host_id)
    {
        $items = $this->zabbix->itemGet([
            "hostids" => [$host_id],
        ]);

        return $items;
    }


    public function findItemsHistories($itemId)
    {
        $histories = $this->zabbix->historyGet([
            "itemids" => $itemId,
            "sortfield" => ["clock"],
            "sortorder" => 'DESC',
            "time_from" => Carbon::now()->subDay(),
            "limit"=>20,
        ]);
//            "time_till"=>Carbon::now(),

        return $histories;
    }


    public function findItemsTrends($itemId)
    {
        $trends = $this->zabbix->trendGet([
            "itemids" => [$itemId],
            "time_from" => Carbon::now()->subDay(),
            "limit" => 20,
            "output" => [
                "itemid",
                "clock",
                "num",
                "value_min",
                "value_avg",
                "value_max",
                ]
            ]);

        return $trends;
    }

    public function findItemsHistoriesFailed($itemId)
    {
        $histories = $this->zabbix->historyGet([
            "itemids" => $itemId,
            "sortfield" => ["clock"],
            "sortorder" => 'DESC',
//            "time_from" => Carbon::now()->subDay(),
            "limit"=>20,
        ]);
//            "time_till"=>Carbon::now(),

        return $histories;
    }


}
