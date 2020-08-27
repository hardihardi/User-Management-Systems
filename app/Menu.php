<?php

namespace App;

date_default_timezone_set('Asia/Jakarta');

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table = 'menu';

    protected $fillable = ['slug', 'menu'];

    public function submenu()
    {
        return $this->hasMany(Submenu::class);
    }
}
