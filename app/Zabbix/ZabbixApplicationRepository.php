<?php

namespace App\Entities\Zabbix;

use App\Enums\ZabbixTemplate;
//use Flash;

/**
 * Class ZabbixApplicationRepository.
 *
 * @package namespace App\Entities\Zabbix;
 */
class ZabbixApplicationRepository
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


    public function findByNameAndHostId($name, $host_id)
    {
        $application = $this->zabbix->applicationGet([
            "filter" => [
                "name" => $name,
                "hostid" => $host_id
            ]
        ]);
        return $application;
    }


    /**
     * Create Application if not exists
     *
     * @param $user_email
     * @return null
     * @throws \Becker\Zabbix\ZabbixException
     */
    public function createApplicationIfNotExists($name, $host_id)
    {
        $application = $this->findByNameAndHostId($name, $host_id);

        $application_id = null;
        if ($application !== []) {
            $application_id = $application[0]->applicationid;
        }

        if ($application_id === null) {
            $application_id = $this->applicationCreate($name, $host_id);
//            Flash::success(__('Your Web is create successfully.'));
        }
        return $application_id;

    }


    public function applicationCreate($name, $host_id)
    {
        $application = $this->zabbix->applicationCreate([
            "name" => $name,
            "hostid" => $host_id
        ]);
        $application_id = $application->applicationids[0];

        return $application_id;
    }

}
