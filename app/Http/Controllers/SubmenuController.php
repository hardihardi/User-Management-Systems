<?php

namespace App\Http\Controllers;

use App\Menu;
use App\Submenu;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SubmenuController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $submenu = Submenu::orderBy('menu_id', 'ASC')->paginate(5);
        return view('submenu.index')->with('submenu', $submenu);
    }

    public function create()
    {
        $menu = Menu::all();
        return view('submenu.create', compact('menu'));
    }

    public function store(Request $request)
    {
        $attr = $request->all();
        $attr['slug'] = Str::slug($request->judul);
        $attr['menu_id'] = $request->menu;
        $submenu = Submenu::create($attr);
        if ($submenu) {
            return redirect(route('submenu.index'))->with('success', 'Submenu berhasil dibuat.');
        } else {
            return redirect(route('submenu.index'))->with('success', 'Gagal menambahkan submenu.');
        }
    }

    public function edit(Submenu $submenu)
    {
        $menu = Menu::all();
        return view('submenu.edit')->with(['submenu' => $submenu, 'menu' => $menu]);
    }

    public function update(Request $request, Submenu $submenu)
    {
        $attr = $request->all();
        $attr['menu_id'] = $request->menu;
        if ($submenu->update($attr)) {
            return redirect(route('submenu.index'))->with('success', 'Submenu berhasil diubah.');
        } else {
            return redirect(route('submenu.index'))->with('success', 'Gagal mengubah submenu.');
        }
    }

    public function destroy(Submenu $submenu)
    {
        if ($submenu->delete()) {
            return redirect(route('submenu.index'))->with('success', 'Submenu berhasil dihapus.');
        } else {
            return redirect(route('submenu.index'))->with('error', 'Gagal menghapus data submenu.');
        }
    }
}
