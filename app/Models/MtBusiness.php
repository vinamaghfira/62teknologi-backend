<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MtBusiness extends Model
{
    
    protected $table       = 'mt_business';
    protected $primaryKey  = 'id';
    protected $guarded     = ['id'];

    use HasFactory;
}
