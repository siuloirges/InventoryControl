<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Jenssegers\Mongodb\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\SoftDeletes;

/**
 * Class Opportunity
 * @package App\Models
 * @author Victor Barrera <vbarrera@outlook.com>
 */
class Opportunity extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * @var string
     */
    protected $connection = 'mongodb';

    /**
     * @var string
     */
    protected $collection = 'oportunidad';

    /**
     * @var array
     */
    protected $fillable =[
        'user_id',
        'client_id',
        'cedula',
        'cedula',
        'email',
        'list_product',
        'address',
        'municipality',
        'department',
        'description'
    ];


}
