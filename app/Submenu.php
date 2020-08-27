<?php

namespace App;

date_default_timezone_set('Asia/Jakarta');

use Illuminate\Database\Eloquent\Model;

class Submenu extends Model
{
    protected $table = 'submenu';

    protected $fillable = ['menu_id', 'judul', 'slug', 'url', 'icon', 'is_active'];

    public function menu()
    {
        return $this->belongsTo(Menu::class, 'menu_id');
    }
}
