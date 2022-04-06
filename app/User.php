<?php
namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Hash;

/**
 * Class User
 *
 * @package App
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string $remember_token
*/
class User extends Authenticatable
{
    use Notifiable;
    protected $fillable = ['name','slug','user_image','email', 'password','description','specialized','link_twitter','link_instagram','link_facebook','country_id','city','remember_token'];
    
    
    /**
     * Hash password
     * @param $input
     */
    public function setPasswordAttribute($input)
    {
        if ($input)
            $this->attributes['password'] = app('hash')->needsRehash($input) ? Hash::make($input) : $input;
    }
    
    
    public function role()
    {
        return $this->belongsToMany(Role::class, 'role_user');
    }


    public function isAdmin()
    {
        return $this->role()->where('role_id', 1)->first();
    }

    public function lessons()
    {
        return $this->belongsToMany('App\Lesson', 'lesson_student');
    }


    //parameters
    public function setCountryIdAttribute($input)
    {
        $this->attributes['country_id'] = $input ? $input : null;
    }
    
    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id')->withTrashed();
    }

}
