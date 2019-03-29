<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Imprint
 * @package App\Models
 * @version March 29, 2019, 11:15 am UTC
 *
 * @property string text
 */
class Imprint extends Model
{
    use SoftDeletes;

    public $table = 'imprints';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'text'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'text' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'text' => 'required'
    ];

    
}
