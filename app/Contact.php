<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    public $table = "Contacts";

    protected $fillable = ['name', 'lastname', 'email', 'message'];
}
