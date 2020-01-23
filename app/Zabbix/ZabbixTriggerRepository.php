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
class ZabbixTriggerRepository
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


    public function disableTrigger($id)
    {
        $result = $this->zabbix->triggerUpdate([
            "triggerid" => $id,
            "status" => ZabbixTriggerStatus::disabled
        ]);

        return $result;
    }

    public function enableTrigger($id)
    {
        $result = $this->zabbix->triggerUpdate([
            "triggerid" => $id,
            "status" => ZabbixTriggerStatus::enabled
        ]);

        return $result;
    }


    public function findActiveTrigger($id)
    {
        $trigger = $this->zabbix->triggerGet([
            "output" => "extend",
            "triggerids" => $id,
            "active" => '1',
        ]);
        return $trigger;
    }

    public function findTrigger($id)
    {
        $trigger = $this->zabbix->triggerGet([
            "output" => "extend",
            "triggerids" => $id,
        ]);
        return $trigger;
    }



}
