<?php

namespace App\Http\Controllers;

use App\DataTables\UserDataTable;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class UserController extends Controller
{
    public $permission = 'user';

    public function __construct()
    {
        foreach (Permission::where('main',$this->permission)->get() as $perm) {
            $this->middleware('role_or_permission:developer|super-admin|'.$perm->name,['only' => json_decode($perm->method,true)]);
        }
    }
    /**
     * Display a listing of the resource.
     */
    public function index(UserDataTable $datatables)
    {
        breadcrumbs([
            ['name' => 'หน้าแรก','route' => route('home')],
            ['name' => 'ผู้ใช้งาน','route' => route('users.index')],
            ['name' => 'เพิ่มผู้ใช้งาน','route' => ''],
        ]);

        return $datatables->render('pages.users.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
