<?php

namespace App\Models;

use App\User;
use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Post
 * @package App\Models
 * @version March 29, 2019, 9:40 am UTC
 *
 * @property string title
 * @property string text
 * @property string date
 */
class Post extends Model
{
    use SoftDeletes;

    public $table = 'posts';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'title',
        'text',
        'date',
        'author_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'title' => 'string',
        'text' => 'string',
        'date' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'title' => 'required',
        'text' => 'required',
        'date' => 'required'
    ];

    public function history()
    {
        return $this->hasMany(PostHistory::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class);
    }


}
