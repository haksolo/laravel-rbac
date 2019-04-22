<?php

namespace RBAC\Controllers;

use RBAC\Role;
// use Illuminate\Routing\Controller as BaseController;

class RoleController // extends BaseController
{
    public function index()
    {
        $roles = Role::all();

        return $roles;

        // $roles = $this->service->get();

        // return view('admin.role.index', compact('roles'));
    }

    public function show(Role $role)
    {
        // $resources = Role::all();

        // return view('admin.role.show', compact('role'));
    }

    public function create()
    {
        // return view('admin.role.create');
    }

    public function store()
    {
        //
    }

    public function edit(Role $role)
    {
        // return view('admin.role.create');
    }
}
