<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MtTransactions extends Model
{
    
    protected $table       = 'mt_transactions';
    protected $primaryKey  = 'id';
    protected $guarded     = ['id'];

    use HasFactory;
}
