<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Zanr extends Model
{
    protected $table = 'zanrs';
    public function filmovi()
    {
        return $this->hasMany('App\Filmovi', 'id_zanr');
    }
}
