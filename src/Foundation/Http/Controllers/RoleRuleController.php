<?php

namespace Extended\RBAC\Foundation\Http\Controllers;

use Extended\RBAC\Models\Role;
use Extended\RBAC\Models\RoleRule;
use Illuminate\Http\Request;
use Illuminate\Foundation\Validation\ValidatesRequests;

class RoleRuleController
{
    use ValidatesRequests;

    public function index(Role $role)
    {
        return view('rbac::roles.rules.index', compact('role'));
    }

    public function create(Role $role)
    {
        return view('rbac::roles.rules.create', compact('role'));
    }

    public function store(Request $request, Role $role, RoleRule $rule)
    {
        $this->validate($request, [
            'resources' => 'required',
            'verbs' => 'required',
        ]);

        $role->rules()->create($request->all());

        return redirect()->route('rules.index', $role);
    }

    public function edit(Role $role, RoleRule $rule)
    {
        return view('rbac::roles.rules.edit', compact('role', 'rule'));
    }

    public function update(Request $request, Role $role, RoleRule $rule)
    {
        $this->validate($request, [
            'resources' => 'required',
            'verbs' => 'required',
        ]);

        $rule->update($request->all());

        return redirect()->route('rules.index', $role);
    }

    public function destroy(Role $role, RoleRule $rule)
    {
        $rule->delete();

        return redirect()->route('rules.index', $role);
    }
}
