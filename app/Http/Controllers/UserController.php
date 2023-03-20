<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\DeleteUserRequest;
use App\Http\Requests\User\CreateUserRequest;
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

    public function delete(DeleteUserRequest $request)
    {
        $this->findUserById($request->id)->delete();
        Alert::toast('User Was Deleted Successfully', 'success');
        return back();
    }
}
