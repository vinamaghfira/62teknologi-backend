<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\MtBusiness;
use App\Models\MtCoordinate;
use Illuminate\Http\Request;
use Validator;

class BusinessController extends Controller
{

    public function index()
    {
        return response()->json(['message' => 'Hello World']);
    }


    public function create(Request $request){
        $input = $request->all();
        // dd($input);

        $validator = Validator::make($input, [
            'id'                => 'required',
            'alias'             => 'required',
            'categories_id'     => 'required',
            'coordinates_id'    => 'required',
            'display_phone'     => 'required',
            'distance'          => 'required', 
            'image_url'         => 'required',
            'name'              => 'required',
            'phone'             => 'required',
            'price'             => 'required',
            'rating'            => 'required',
            'review_count'      => 'required',
            'transactions_id'   => 'required',
            'url'               => 'required',
             
        ]);

        // if($validator->fails()){
        //     return $this->sendError('Validation Error.', $validator->errors());       
        // }

        $business= MtBusiness::create($input);

        return (($business) .'Created Succesfully');

        // if($business->save()){
        //     return $this->sendResponse($business, ' Business Created successfully.');
        // }
        // return $this->sendError('Failed Create Business', 400);

    }

}
