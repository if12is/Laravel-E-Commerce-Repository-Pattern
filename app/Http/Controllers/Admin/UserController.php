<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{

    //  variable to bin CategoryService class
    protected $userService;

    //  constructor to bin CategoryService class
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }
    public function index()
    {
        $users = $this->userService->getUsers();
        return view('admin.users.index', compact('users'));
    }
    // get all users from database to datatable
    public function getAllUsers()
    {
        return $this->userService->getAllUsers();
    }
    public function edit($id)
    {
        $user = $this->userService->getUserById($id);
        return view('admin.users.edit', compact('user'));
    }
    public function update(Request $request, $id)
    {
        $this->userService->updateUser($request->validated(), $id);
        return redirect()->back()->with('success', 'User Updated Successfully');
    }
    public function destroy($id)
    {
        $this->userService->deleteUser($id);
        return redirect()->back()->with('success', 'User Deleted Successfully');
    }
}
