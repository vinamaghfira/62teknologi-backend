<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MtCoordinate extends Model
{

    
    protected $table       = 'mt_coordinates';
    protected $primaryKey  = 'id';
    protected $guarded     = ['id'];

    use HasFactory;
}
