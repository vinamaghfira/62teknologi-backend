<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\MtCoordinate;
use Illuminate\Http\Request;

class BusinessController extends Controller
{
    public function index()
    {
        return response()->json(['message' => 'Hello World']);
    }

}
