<?php

namespace App\Entities\Zabbix;
use App\Enums\ZabbixGuiAccess;
use App\Enums\ZabbixUserGroupPermission;

//use Flash;

/**
 * Class ZabbixUserRepository.
 *
 * @package namespace App\Entities\Zabbix;
 */
class ZabbixUserGroupRepository
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
        $userGroup=$this->zabbix->usergroupGet([
            "filter" => [
                "name" => [
                    $email
                ]
            ]
        ]);

        return $userGroup;
    }


    /**
     * Create UserGroup if not exists
     * @param $user_email
     * @return null
     * @throws \Becker\Zabbix\ZabbixException
     */
    public function createUserGroupIfNotExists($email, $id)
    {
        $userGroup = $this->find($email);
        $userGroup_id = null;
        if ($userGroup !== []) {
            $userGroup_id = $userGroup[0]->usrgrpid;
        }

        if ($userGroup_id === null) {
            $userGroup_id = $this->createUserGroup($email, $id);
        }
        return $userGroup_id;

    }


    public function createUserGroup($email,$id)
    {
        $userGroupCreated = $this->zabbix->usergroupCreate([
            'name' => $email,
            'gui_access' => ZabbixGuiAccess::disable,
            'rights' => [
                'permission' => ZabbixUserGroupPermission::ACCESS_READONLY,
                'id' => $id, // Create a user group, which Readonly access to host group $id ($hostGroupid).
            ]

        ]);
        $userGroup_id = $userGroupCreated->usrgrpids[0];

        return $userGroup_id;
    }

}
