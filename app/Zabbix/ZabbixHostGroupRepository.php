<?php

namespace App\Entities\Zabbix;

//use Flash;

/**
 * Class ZabbixHostRepository.
 *
 * @package namespace App\Entities\Zabbix;
 */
class ZabbixHostGroupRepository
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

    public function find($email)
    {
        $hostGroup=$this->zabbix->hostgroupGet([
            "filter" => [
                "name" => [
                    $email
                ]
            ]
        ]);

        return $hostGroup;
    }


    /**
     * Create HostGroup if not exists
     * @param $user_email
     * @return null
     * @throws \Becker\Zabbix\ZabbixException
     */
    public function createHostGroupIfNotExists($email)
    {
        $hostGroup = $this->find($email);

        $hostGroup_id = null;
        if ($hostGroup !== []) {
            $hostGroup_id = $hostGroup[0]->groupid;
        }

        if ($hostGroup_id === null) {

            $hostGroup_id = $this->createHostGroup($email);
        }
        return $hostGroup_id;
    }

    public function getHostGroup($email)
    {
        $hostGroup = $this->find($email);

        $hostGroup_id = null;
        if ($hostGroup !== []) {
            $hostGroup_id = $hostGroup[0]->groupid;
        }

        if ($hostGroup_id === null) {

            $hostGroup_id = $this->createHostGroup($email);
        }
        return $hostGroup_id;
    }


    public function createHostGroup($email)
    {
        $hostGroupCreated = $this->zabbix->hostgroupCreate([
            'name' => $email
        ]);

        return $hostGroupCreated->groupids[0];
    }

}
