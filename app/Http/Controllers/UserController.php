<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('users.index');
    }

    public function update(Request $request, User $user)
    {
        $attr = $request->all();
        if (request()->hasFile('image')) {
            Storage::delete($user->image);
            $image = request()->file('image')->store('images', 'public');
        } else {
            $image = $user->image;
        }
        $attr['image'] = $image;
        $user->update($attr);
        return redirect(route('users.index'))->with('success', 'Profil berhasil diubah.');
    }
}
