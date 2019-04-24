<?php

namespace RBAC\Controllers;

use RBAC\Role;
use Illuminate\Http\Request;
use Illuminate\Foundation\Validation\ValidatesRequests;
// use Illuminate\Routing\Controller as BaseController;

class RoleController // extends BaseController
{
    use ValidatesRequests;

    public function index()
    {
        $roles = Role::with(['rules'])->get();

        return view('rbac::roles.index', compact('roles'));
    }

    public function create()
    {
        return view('rbac::roles.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'namespace' => 'required',
            'name' => 'required',
        ]);

        Role::create($request->all());

        return redirect()->route('roles.index');
    }

    public function show(Role $role)
    {
        return view('rbac::roles.show', compact('role'));
    }

    public function edit(Role $role)
    {
        return view('rbac::roles.edit', compact('role'));
    }

    public function update(Request $request, Role $role)
    {
        $this->validate($request, [
            'namespace' => 'required',
            'name' => 'required',
        ]);

        $role->update($request->all());

        return redirect()->route('roles.index');
    }

    public function destroy(Role $role)
    {
        $role->delete();

        return redirect()->route('roles.index');
    }
}
