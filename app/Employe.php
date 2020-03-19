<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Employe extends Model
{
    protected $guarded=[];

    protected $dates = [
        'birth_date',
    ];

    protected $appends = [
        'left_days',
        'fr_birth_date'
    ];

    public function historiques(){
        return $this->hasMany(Historique::class);
    }

    public function scopeBirthday($query, Carbon $date = null)
    {
        if (is_null($date)) {
            $date = Carbon::today();
        }
        return $query
                    ->where('activer_envoi',true)
                    ->whereRaw('DATE_FORMAT(birth_date, "%m-%d") >= ?', [Carbon::today()->format('m-d')])
                    ->orderBy('birth_date','asc')
                    ->take(8);
    }

    public function scopeBirthdayToday($query)
    {
         return $query
                    ->where('activer_envoi',true)
                    ->whereRaw('DATE_FORMAT(birth_date, "%m-%d") = ?', [Carbon::today()->format('m-d')]);
    }


    public function getLeftDaysAttribute()
    {
        $inc_this=0;
        $inc_now=0;
        if ($this->is_bissextile($this->birth_date->format('Y'))){
           $inc_now++;
        }


        if ($this->is_bissextile(now()->format('Y'))){
            $inc_this++;
        }


        return ($this->birth_date->format('z')+1+$inc_this) -(now()->format('z')+1+$inc_now);
    }

    public function getFrBirthDateAttribute(){
        Carbon::setLocale('fr');
        $date = Carbon::parse($this->birth_date, 'UTC');

        return $date->isoFormat('Do MMMM');

    }

    private function is_bissextile($year)
    {
        return date("m-d", strtotime("$year-02-29")) == "02-29";
    }
}
