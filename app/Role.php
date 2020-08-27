<?php

namespace App;

date_default_timezone_set('Asia/Jakarta');

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = ['slug', 'name'];

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
