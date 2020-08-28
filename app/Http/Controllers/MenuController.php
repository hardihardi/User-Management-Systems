<?php

namespace App\Http\Controllers;

use App\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class MenuController extends Controller
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
        $menu = Menu::orderBy('menu', 'ASC')->get();
        return view('menu.index')->with('menu', $menu);
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
        $attr['slug'] = Str::slug($request->menu);
        $menu = Menu::create($attr);
        if ($menu) {
            return redirect(route('menu.index'))->with('success', 'Menu berhasil ditambahkan.');
        } else {
            return redirect(route('menu.index'))->with('error', 'Gagal menambahkan menu.');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Menu $menu)
    {
        $attr = $request->all();
        if ($menu->update($attr)) {
            return redirect(route('menu.index'))->with('success', 'Menu berhasil diubah.');
        } else {
            return redirect(route('menu.index'))->with('success', 'Gagal mengubah menu.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menu)
    {
        if ($menu->delete()) {
            return redirect(route('menu.index'))->with('success', 'Menu berhasil dihapus.');
        } else {
            return redirect(route('menu.index'))->with('success', 'Gagal menghapus menu.');
        }
    }
}
