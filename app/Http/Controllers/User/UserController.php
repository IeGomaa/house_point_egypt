<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\CreateUserRequest;
use App\Http\Requests\User\CheckUserIdRequest;
use App\Http\Requests\User\UpdateUserRequest;
use App\Http\Traits\UserTrait;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    private $userModel;
    use UserTrait;
    public function __construct(User $user)
    {
        $this->userModel = $user;
    }

    public function index()
    {
        $users = $this->getUsers();
        return view('pages.user.index', compact('users'));
    }

    public function create()
    {
        return view('pages.user.create');
    }

    public function store(CreateUserRequest $request)
    {
        $this->userModel::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
        Alert::toast('User Was Created Successfully', 'success');
        return redirect(route('admin.user.index'));
    }

    public function delete(CheckUserIdRequest $request)
    {
        $user = $this->findUserById($request->id);
        if ($user == $this->userModel::where('email', 'admin@admin.com')->first()) {
            Alert::toast('User Can\'t Delete', 'error');
            return back();
        }
        $user->delete();
        Alert::toast('User Was Deleted Successfully', 'success');
        return back();
    }

    public function edit(CheckUserIdRequest $request)
    {
        $user = $this->findUserById($request->id);
        return view('pages.user.edit', compact('user'));
    }

    public function update(UpdateUserRequest $request)
    {
        $user = $this->findUserById($request->id);
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password ? Hash::make($request->password) : $user->password
        ]);
        Alert::toast('User Was Updated Successfully', 'success');
        return redirect(route('admin.user.index'));
    }
}
