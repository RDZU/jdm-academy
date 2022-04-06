<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\Interfaces\HasMedia;
/**
 * Class Course
 *
 * @package App
 * @property string $title
 * @property string $slug
 * @property text $description
  *@property text $full_text
  *@property text $requirement
 * @property decimal $price
 * @property string $course_image
 * @property string $start_date
 * @property tinyInteger $published
*/
class Course extends Model
{
    use SoftDeletes,HasMediaTrait;

    protected $fillable = ['title', 'slug', 'description','full_text','requirement', 'price', 'course_image', 'start_date', 'published','subject','level','idiom'];
    

    /**
     * Set attribute to money format
     * @param $input
     */
    public function setPriceAttribute($input)
    {
        $this->attributes['price'] = $input ? $input : null;
    }

    /**
     * Set attribute to date format
     * @param $input
     */
    public function setStartDateAttribute($input)
    {
        if ($input != null && $input != '') {
            $this->attributes['start_date'] = Carbon::createFromFormat(config('app.date_format'), $input)->format('Y-m-d');
        } else {
            $this->attributes['start_date'] = null;
        }
    }

    /**
     * Get attribute from date format
     * @param $input
     *
     * @return string
     */
    public function getStartDateAttribute($input)
    {
        $zeroDate = str_replace(['Y', 'm', 'd'], ['0000', '00', '00'], config('app.date_format'));

        if ($input != $zeroDate && $input != null) {
            return Carbon::createFromFormat('Y-m-d', $input)->format(config('app.date_format'));
        } else {
            return '';
        }
    }
    
    public function teachers()
    {
        return $this->belongsToMany(User::class, 'course_user');
    }

    public function students()
    {
        return $this->belongsToMany(User::class, 'course_student')->withTimestamps()->withPivot(['rating','comment']);
    }

    public function lessons()
    {
        return $this->hasMany(Lesson::class)->orderBy('position');
    }
//
    public function publishedLessons()
    {
        return $this->hasMany(Lesson::class)->orderBy('position')->where('published', 1);
    }

    public function scopeOfTeacher($query)
    {
        if (!Auth::user()->isAdmin()) {
            return $query->whereHas('teachers', function($q) {
                $q->where('user_id', Auth::user()->id);
            });
        }
        return $query;
    }

    public function getRatingAttribute()
    {
        return number_format(\DB::table('course_student')->where('course_id', $this->attributes['id'])->average('rating'), 2);
    }

}
