<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->search;

        $users = User::when($keyword, function ($query) use ($keyword) {

            $query->where('nama_user', 'like', "%{$keyword}%")
                ->orWhere('email', 'like', "%{$keyword}%");

        })
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('users.index', compact('users'));
    }

    /**
     * Menampilkan detail user.
     */
    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }
}
