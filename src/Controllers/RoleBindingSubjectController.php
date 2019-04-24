<?php

namespace RBAC\Controllers;

use RBAC\RoleBinding;
use RBAC\RoleBindingSubject;
use Illuminate\Http\Request;
use Illuminate\Foundation\Validation\ValidatesRequests;

class RoleBindingSubjectController
{
    use ValidatesRequests;

    public function index(RoleBinding $roleBinding)
    {
        return view('rbac::role-bindings.subjects.index', compact('roleBinding'));
    }

    public function create(RoleBinding $roleBinding)
    {
        $subjects = \App\User::get();

        return view('rbac::role-bindings.subjects.create', compact('roleBinding', 'subjects'));
    }

    public function store(Request $request, RoleBinding $roleBinding)
    {
        $this->validate($request, [
            'subject_kind' => 'required',
            'subject_id' => 'required',
        ]);

        $roleBinding->subjects()->create($request->all());

        return redirect()->route('subjects.index', $roleBinding);
    }

    public function edit(RoleBinding $roleBinding, RoleBindingSubject $subject)
    {
        $subjects = \App\User::get();

        return view('rbac::role-bindings.subjects.edit', compact('roleBinding', 'subject', 'subjects'));
    }

    public function update(Request $request, RoleBinding $roleBinding, RoleBindingSubject $subject)
    {
        $this->validate($request, [
            'subject_kind' => 'required',
            'subject_id' => 'required',
        ]);

        $subject->update($request->all());

        return redirect()->route('subjects.index', $roleBinding);
    }

    public function destroy(RoleBinding $roleBinding, RoleBindingSubject $subject)
    {
        $subject->delete();

        return redirect()->route('subjects.index', $roleBinding);
    }
}
