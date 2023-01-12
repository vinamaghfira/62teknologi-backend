<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MtLocations extends Model
{
    protected $table       = 'mt_locations';
    protected $primaryKey  = 'id';
    protected $guarded     = ['id'];

    use HasFactory;
}
