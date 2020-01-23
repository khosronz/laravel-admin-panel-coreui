<?php

namespace App\Http\Controllers\API;

use App\Entities\Zabbix\ZabbixApplicationRepository;
use App\Entities\Zabbix\ZabbixEventRepository;
use App\Entities\Zabbix\ZabbixHostGroupRepository;
use App\Entities\Zabbix\ZabbixHostRepository;
use App\Entities\Zabbix\ZabbixHttptestRepository;
use App\Entities\Zabbix\ZabbixItemRepository;
use App\Entities\Zabbix\ZabbixUserGroupRepository;
use App\Enums\ZabbixTemplate;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateZabbixDashboardRequest;
use App\Http\Resources\User;
use App\Http\Resources\ZabbixDashboards as ZabbixDashboardResource;
use App\Http\Resources\ZabbixDashboards;
use App\Repositories\UserRepository;
use Becker\Zabbix\ZabbixException;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
//use Laracasts\Flash\Flash;
use function MongoDB\BSON\fromJSON;
use function MongoDB\BSON\toJSON;

use Illuminate\Pagination\LengthAwarePaginator;

class ZabbixDashboardAPIController extends Controller
{
    private $zabbixHostRepository;
    private $zabbixHostGroupRepository;
    private $zabbixUserGroupRepository;
    private $zabbixApplicationRepository;
    private $zabbixHttptestRepository;
    private $zabbixItemRepository;
    private $zabbixEventRepository;
    /** @var  UserRepository */
    private $userRepository;

    public function __construct(
        ZabbixHostGroupRepository $zabbixHostGroupRepo,
        ZabbixUserGroupRepository $zabbixUserGroupRepo,
        ZabbixApplicationRepository $zabbixApplicationRepo,
        ZabbixHttptestRepository $zabbixHttptestRepo,
        ZabbixItemRepository $zabbixItemRepo,
        ZabbixHostRepository $zabbixHostRepo,
        ZabbixEventRepository $zabbixEventRepo,
        UserRepository $userRepo
    )
    {
        $this->userRepository = $userRepo;
        $this->zabbixHostRepository = $zabbixHostRepo;
        $this->zabbixHostGroupRepository = $zabbixHostGroupRepo;
        $this->zabbixApplicationRepository = $zabbixApplicationRepo;
        $this->zabbixUserGroupRepository = $zabbixUserGroupRepo;
        $this->zabbixHttptestRepository = $zabbixHttptestRepo;
        $this->zabbixItemRepository = $zabbixItemRepo;
        $this->zabbixEventRepository = $zabbixEventRepo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateZabbixDashboardRequest $request)
    {
        $validData = $this->validate($request, [
            'domain' => 'required',
            'api_token' => 'required'
        ]);

        $domain = $validData["domain"];
        $api_token = $validData["api_token"];
        $interval = '1m'; // Default Interval
        $user = \App\User::where('api_token',$api_token)->first();
        if ($user !== null){
            $user = $this->userRepository->find($user->id);
        } else {
            return [
                'message'=>__('You are not authorized in this system.'),
                'code'=>Response::HTTP_UNAUTHORIZED
            ];
        }

        try {
            $zabbixHostId = $this->checkOrAddUserInZabbix($user->id, $domain, $interval);
//            return dd($zabbixHostId);
            return $zabbixHostId;
        } catch (ZabbixException $e) {
//            Flash::error(__('Your agent has some error. please connect to support team.'));
            return null;
        }
    }

    /**
     * Create HostGroup, UserGroup, Host, User in zabbix for user
     *
     * @param $id
     * @param $input
     * @return array
     * @throws \Becker\Zabbix\ZabbixException
     */
    public function checkOrAddUserInZabbix($id, $domain, $interval = '1m')
    {
        DB::beginTransaction();
        $user = $this->userRepository->find($id);
        $hostGroupid = $this->zabbixHostGroupRepository->createHostGroupIfNotExists($user->email);
        $userGroupid = $this->zabbixUserGroupRepository->createUserGroupIfNotExists($user->email, $hostGroupid);
        $host_id = null;
//        return response($input->domain);
        $host_id = $this->zabbixHostRepository->createHostIfNotExists($domain, $hostGroupid);

        $application_id = $this->zabbixApplicationRepository->createApplicationIfNotExists("Web scenario", $host_id);
        $httpstest_id = $this->zabbixHttptestRepository->createHttptestIfNotExists($domain, $host_id, $application_id, $interval);

//        Flash::success(__('User saved successfully.'));

        DB::commit();

        return $host_id;
    }

    public function gethostsbyemail(Request $request)
    {
        $email = $request["email"];
        $hostGroupid = $this->zabbixHostGroupRepository->find($email);
        $hostGroupid = $hostGroupid[0]->groupid;
        $hostids = $this->zabbixHostRepository->findHostsByGroupId($hostGroupid);

        return $hostids;
    }

    public function geteventsbyhost(Request $request)
    {
        if ($request["current_page"]) {
            $current_page = $request["current_page"];
        } else {
            $current_page=1;
        }
        $host_id = $request["host_id"];
        $hostids = $this->zabbixEventRepository->findEventsByHostId($host_id);
        $hostspage=new Paginator($hostids,10,$current_page);
//        return response($hostspage);
        return $hostspage;
    }

    public function changeHostStatus(Request $request)
    {
        $hostid = $request["host_id"];
        $status = $request["status"];

        $host = $this->zabbixHostRepository->changeHostStatus($hostid, $status);

        return $host;
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
