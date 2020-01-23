<?php

namespace App\Entities\Zabbix;

use App\Enums\ZabbixTemplate;
//use App\Notifications\CreatedHostNotification;
use App\User;
//use Flash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

/**
 * Class ZabbixHostRepository.
 *
 * @package namespace App\Entities\Zabbix;
 */
class ZabbixHostRepository
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

    public function getByUserId($id)
    {

    }

    public function find($host_id)
    {
        $host = $this->zabbix->hostGet([
            "hostids" => [$host_id]
        ]);

        return $host;
    }

    public function findHostsByGroupId($hostgroupid)
    {
        $hosts = $this->zabbix->hostGet([
            'groupids' => [$hostgroupid]
        ]);

        return $hosts;
    }

    public function findByHostGroupAndDns($hostgroupid, $domain)
    {
        $host = $this->zabbix->hostGet([
            "filter" => [
                "name" => [
                    remove_http($domain)
                ],
                "groups" => [
                    ["groupid" => $hostgroupid]
                ],
            ]
        ]);

        return $host;
    }


    /**
     * Create Host if not exists
     *
     * @param $user_email
     * @return null
     * @throws \Becker\Zabbix\ZabbixException
     */
    public function createHostIfNotExists($domain, $hostgroupid)
    {
        $host = $this->findByHostGroupAndDns($hostgroupid, $domain);
        $host_id = null;
        if ($host !== []) {
            $host_id = $host[0]->hostid;
        }

        if ($host_id === null) {
            $host_id = $this->hostCreate($domain, $hostgroupid);
            $host = $this->findByHostGroupAndDns($hostgroupid, $domain);
//            Flash::success(__('Your Host is create successfully.'));

//            $details = [
//                'greeting' => 'سلام '.__(Auth::user()->name).' '.'عزیز'.'،',
//                'body' => 'شما در تحلیل یار هاست خود را ایجاد کردید. از این به بعد ما به جای شما به وبسایت شما سرکشی می کنیم. اگر اشکالی وجود داشتت از طریق ایمیل یا پیامک به شما اطلاع رسانی می کنیم.',
//                'thanks' => 'از این که تحلیل یار را به عنوان معتمد خود در امر مراقبت از سیستم خود انتخاب کردید سپاسگذاریم',
//                'actionText' => 'به سایت ما سر بزنید',
//                'actionURL' => url('/'),
//                'hostname' => 'شما مالک هاست '.$host[0]->name.' می باشید.'
//            ];
//            Notification::send(Auth::user(), new CreatedHostNotification($details));
        }
        return $host_id;
    }


    public function hostCreate($domain, $hostgroupid)
    {
        $host = $this->zabbix->hostCreate([
            "host" => remove_http($domain),
            "interfaces" => [
                "type" => 1,
                "main" => 1,
                "ip" => "",
                "dns" => remove_http($domain),
                "port" => "10050",
                "useip" => 0
            ],
            "status" => 0,
            "available" => 1,
            "groups" => [
                ["groupid" => $hostgroupid]
            ],
            "proxy_hostid" => null,
            "templates" => [
//                ZabbixTemplate::Template_App_FTP_Service,
                ZabbixTemplate::Template_App_HTTP_Service_Persian,
                ZabbixTemplate::Template_App_HTTPS_Service_Persian,
//                ZabbixTemplate::Template_App_IMAP_Service,
//                ZabbixTemplate::Template_App_NTP_Service,
//                ZabbixTemplate::Template_App_POP_Service,
//                ZabbixTemplate::Template_App_SMTP_Service,
//                ZabbixTemplate::Template_App_SSH_Service,
//                ZabbixTemplate::Template_App_Telnet_Service,
            ]
        ]);
        $host_id = $host->hostids[0];
        return $host_id;
    }


    public function changeHostStatus($hostid, $status)
    {
        $host = $this->zabbix->hostUpdate([
            "hostid" => $hostid,
            "status" => $status
        ]);
        $host = $this->find($host->hostids[0]);
        return $host;
    }

}
