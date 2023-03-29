<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Spatie\Permission\Models\Permission;

class ModelRoleController extends Controller
{
    public function index()
    {
        $users = User::whereHas('permissions')->paginate(1);
        return view('pages.role_model.index', compact('users'));
    }

    public function create()
    {
        $users = User::get(['name', 'id']);
        $permissions = Permission::all();
        return view('pages.role_model.create', compact('users', 'permissions'));
    }

    public function store(Request $request)
    {
        $user = User::find($request->user);
        $user->syncPermissions($request->permission);
        Alert::toast('Permission Was Created Successfully' , 'success');
        return redirect(route('admin.role-model.index'));
    }

    public function delete(Request $request): RedirectResponse
    {
        $user = User::find($request->user_id);
        if ($user->email == 'admin@admin.com') {
            Alert::toast('Can\'t Deleted Permission This is Admin' , 'error');
            return back();
        }
        $permission = Permission::findById($request->permission_id);
        $user->revokePermissionTo($permission);
        Alert::toast('Permission Was Deleted Successfully' , 'success');
        return back();
    }
}
