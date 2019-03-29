<?php

namespace App\Models;

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
class PostHistory extends Model
{
    use SoftDeletes;

    public $table = 'posts_history';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'title',
        'text',
        'date',
        'post_id'
    ];


}
