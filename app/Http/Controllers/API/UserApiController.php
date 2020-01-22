<?php

namespace App\Http\Controllers\API;

use App\Enums\UserType;
use App\Http\Controllers\AppBaseController;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

use \App\Http\Resources\User as UserResource;

class UserApiController extends AppBaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();

        return response(['data' => $users], 200)
            ->header('Content-Type', 'application/json');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::where('id', $id)->first();

        return response(['data' => $user], 200)
            ->header('Content-Type', 'application/json');
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


    public function login(Request $request)
    {
        // Validation Data
        $validData = $this->validate($request, [
            'name' => 'required|exists:users',
            'password' => 'required'
        ]);

        // Check Login User
        if (!auth()->attempt($validData) && auth()->user()->roles->first() != UserType::user) {
            return response([
                'data' => 'اطلاعات صحیح نیست',
                'status' => 'error'
            ], Response::HTTP_UNAUTHORIZED);
        }

        auth()->user()->update([
            'api_token' => Str::random(60)
        ]);

        // return response
        return new UserResource(auth()->user());
    }

    public function signup(Request $request)
    {
        // Validation Data
        $validData = $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
            'confirm' => 'required|string|min:6'
        ]);

        if ($validData['password'] != $validData['confirm']) {
            return response([
                'data' => 'تایید پسورد را درست وارد نکرده اید.',
                'status' => 'error'
            ], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $user = User::create([
            'name' => $validData['name'],
            'email' => $validData['email'],
            'password' => bcrypt($validData['password']),
            'api_token' => Str::random(60)
        ]);

        \Illuminate\Support\Facades\DB::table('role_user')->insertGetId([
            'role_id' => \App\Enums\UserType::user, 'user_id' => $user->id,
        ]);

        return new UserResource($user);
    }

    public function saveProfile(Request $request, $id)
    {
        $user = User::where('id', '=', $id)->first();

        // Validation Data
        $validData = $this->validate($request, [
//            'email' => 'required|string|email|max:255|unique:users',
            'fname' => 'required|string|max:255',
            'lname' => 'required|string|max:255',
            'address1' => 'required|string|max:65535',
            'address2' => 'max:65535',
            'country' => 'required|string|max:255',
            'province' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'pre_phone' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
        ]);

//        if (!auth()->attempt($validData)) {
//            return response([
//                'data' => 'تایید پسورد را درست وارد نکرده اید.',
//                'status' => 'error'
//            ], Response::HTTP_UNPROCESSABLE_ENTITY);
//        }

        $user->update($validData);

        return new UserResource($user);
    }
}
