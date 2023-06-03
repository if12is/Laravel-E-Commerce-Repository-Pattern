<?php

namespace App\Services;

use App\Models\User;

class UserService
{
    //  get users from database
    public function getUsers()
    {
        return User::get();
    }
    //  get all users from database to datatable
    public function getAllUsers()
    {
        $data = User::latest()->get();
        return datatables()->of($data)
            ->addIndexColumn()
            ->addColumn('action', function ($item) {
                return '
        <a href="' . route('admin.users.edit', $item->id) . '" class="btn btn-sm btn-primary">
        <i class="fas fa-pencil-alt"></i>
        </a>
        <button type="button" class="btn btn-sm btn-danger waves-effect waves-light" data-bs-toggle="modal" data-name="' . $item->name . '" data-bs-target="#deleteModal" data-id="' . $item->id . '">
        <i class="fas fa-trash"></i>
        </button>
        ';
            })
            ->addColumn('image', function ($item) {
                return '<img src="' . asset($item->image) . '" width="20px" height="20px" alt="' . $item->name . '">';
            })
            ->addColumn('type', function () {
                return '<i class="ti ti-user ti-sm text-warning me-3"></i><span class="badge bg-label-success me-1">User</span>';
            })
            ->rawColumns(['action', 'image', 'type'])
            ->make(true);
    }

    //  get user by id
    public function getUserById($id)
    {
        return User::findOrFail($id);
    }
    //  store user
    public function storeUser($validated)
    {
        $user = new User();
        $user->name = $validated['name'];
        $user->email = $validated['email'];
        $user->phone = $validated['phone'];
        $user->address = $validated['address'];
        $user->password = bcrypt($validated['password']);
        $user->save();
    }
    //  update user
    public function updateUser($validated, $id)
    {
        $user = User::findOrFail($id);
        $user->name = $validated['name'];
        $user->email = $validated['email'];
        $user->phone = $validated['phone'];
        $user->address = $validated['address'];
        $user->save();
    }
    //  delete user
    public function deleteUser($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
    }
}
