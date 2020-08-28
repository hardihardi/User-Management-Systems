<?php

namespace App\Http\Controllers;

use App\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class RoleController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::orderBy('name', 'ASC')->get();
        return view('roles.index', compact('roles'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $attr = $request->all();
        $attr['slug'] = Str::slug($request->name);
        $roles = Role::create($attr);
        if ($roles) {
            return redirect(route('roles.index'))->with('success', 'Data role berhasil dibuat.');
        } else {
            return redirect(route('roles.index'))->with('error', 'Gagal menambahkan data.');
        }
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        $attr = $request->all();
        $role->update($attr);
        return redirect(route('roles.index'))->with('success', 'Data role berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        if ($role->delete()) {
            return redirect(route('roles.index'))->with('success', 'Data role berhasil dihapus.');
        } else {
            return redirect(route('roles.index'))->with('error', 'Gagal menghapus role.');
        }
    }
}
