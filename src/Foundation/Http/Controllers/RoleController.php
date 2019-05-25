<?php

namespace Extended\RBAC\Foundation\Http\Controllers;

// use Extended\RBAC\Models\Role;
// use Illuminate\Http\Request;
// use Illuminate\Foundation\Validation\ValidatesRequests;
// use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
// use Illuminate\Routing\Controller as BaseController;

use Extended\RBAC\Foundation\Services\RoleService;
use Extended\Domain\Service\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Validation\ValidatesRequests;

class RoleController extends Controller // extends BaseController
{
    use ValidatesRequests;

    // use AuthorizesRequests, ValidatesRequests;

    public function __construct(RoleService $service)
    {
        $this->service = $service;

        // $this->authorizeResource(Role::class);
    }

    public function index()
    {
        $roles = $this->service->paginate(25)->load(['rules']);

        return view('rbac::roles.index', ['roles' => $roles]);
    }

    public function create()
    {
        return view('rbac::roles.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, ['namespace' => 'required', 'name' => 'required']);

        // Role::create($request->all());

        return redirect()->route('admin.roles.index');
    }

    public function show($name)
    {
        $role = $this->service->where('name', $name)->first();

        return view('rbac::roles.show', ['role' => $role]);
    }

    public function edit($name)
    {
        $role = $this->service->where('name', $name)->first();

        return view('rbac::roles.edit', ['role' => $role]);
    }

    public function update(Request $request, $name)
    {
        $this->validate($request, ['namespace' => 'required', 'name' => 'required']);

        $role = $this->service->where('name', $name)->first();

        // $role->update($request->all());

        return redirect()->route('admin.roles.index');
    }

    public function destroy($name)
    {
        // $role->delete();

        return redirect()->route('admin.roles.index');
    }
}
