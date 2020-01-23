<?php

namespace App\Entities\Zabbix;

use App\Enums\ZabbixTemplate;
use App\Enums\ZabbixTriggerStatus;

//use Flash;

/**
 * Class ZabbixApplicationRepository.
 *
 * @package namespace App\Entities\Zabbix;
 */
class ZabbixEventRepository
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

    public function findEventByTriggerId($id)
    {
        $events = $this->zabbix->eventGet([
            "output" => "extend",
            "select_acknowledges" => "extend",
            "selectTags" => "extend",
            "selectSuppressionData" => "extend",
            "eventids" => $id
        ]);
        return $events;
    }

    public function findEventsByHostId($id)
    {
        $events = $this->zabbix->eventGet([
            "output" => "extend",
            "select_acknowledges" => "extend",
            "selectTags" => "extend",
            "selectSuppressionData" => "extend",
            "hostids" => $id,
            "sortfield" => ["clock"],
            "sortorder" => "DESC",
            "filter" => [
                "object" => "0"
            ]
        ]);

        return $events;
    }


}
