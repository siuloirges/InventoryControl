<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CmsSettings extends Model
{
    protected $table = "cms_settings";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [

        'name',
        'content'

    ];


}
