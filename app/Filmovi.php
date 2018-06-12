<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Filmovi extends Model
{
    protected $table = 'filmovis';
    
    public function zanr()
    {
        return $this->belongsTo('App\Zanr', 'id_zanr');
    } 
}
