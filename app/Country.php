<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Country extends Model
{
    protected $table= 'countries';

    use SoftDeletes;

    protected $fillable = ['country_code','country_name'];

    //relacion uno a muchos
    public function options()
    {
        return $this->hasMany('App\User');
    }

}
