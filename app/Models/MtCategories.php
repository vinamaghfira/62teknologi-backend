<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MtCategories extends Model
{
    protected $table       = 'mt_categories';
    protected $primaryKey  = 'id';
    protected $guarded     = ['id'];

    use HasFactory;
}
