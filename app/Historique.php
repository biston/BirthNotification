<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Historique extends Model
{
    protected $guarded=[];

    protected $dates = [
        'date_traitement',
    ];
    public function employe(){
        return $this->belongsTo(Employe::class);
    }

}
