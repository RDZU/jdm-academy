<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\Interfaces\HasMedia;

/**
 * Class Book
 *
 * @package App
 * @property string $titulo
 * @property string $slug
 * @property string $authors
 * @property string $description
 * @property text $full_text
 * @property string $subject
 * @property string $editorial
 * @property integer $edition
 * @property string $file
*/
class Book extends Model
{
    use SoftDeletes;

    protected $fillable = ['title', 'slug', 'authors', 'description', 'full_text', 'subject', 'editorial', 'edition', 'file','picture'];
    protected $hidden = [];
    
    

    /**
     * Set attribute to money format
     * @param $input
     */
    public function setEditionAttribute($input)
    {
        $this->attributes['edition'] = $input ? $input : null;
    }
    
}
