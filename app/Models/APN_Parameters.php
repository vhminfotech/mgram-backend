<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class APN_Parameters extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $table = 'apn_parameter';
    
}
