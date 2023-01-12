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

        $data = MtBusiness::where('is_closed',true)->orderBy('alias')->get();

        return ($data);

        // if($data){
        //     return response()->success('successfully', $data);
        // }
        // else return response()->error('failed', 'NO DATA FOUND');
    }


    public function createBusiness(Request $request){

        $validator = Validator::make($request->all(),[
            'alias' => 'required|string',

        ]);

        if($validator->fails()){
            return response()->json($validator->errors());       
        }

        $business = MtBusiness::create([
            'alias'             => $request->alias,
            'categories_id'     => $request->categories_id,
            'coordinates_id'    => $request->coordinates_id,
            'display_phone'     => $request->display_phone,
            'distance'          => $request->distance,
            'image_url'         => $request->image_url,
            'name'              => $request->name,
            'phone'             => $request->phone,
            'price'             => $request->price,
            'rating'            => $request->rating,
            'review_count'      => $request->review_count,
            'transactions_id'   => $request->transactions_id,
            'url'               => $request->url,

        ]);

        if($business){
            return response()->success('successfully', $business);
         }  else return response()->error('failed', 'SOMETHING WRONG !');


    }


    public function updateBusiness(Request $request, $id){

        $updBusiness = MtBusiness::where('id',$id)->update([
            'alias'             => $request->alias,
            'categories_id'     => $request->categories_id,
            'coordinates_id'    => $request->coordinates_id,
            'display_phone'     => $request->display_phone,
            'distance'          => $request->distance,
            'image_url'         => $request->image_url,
            'name'              => $request->name,
            'phone'             => $request->phone,
            'price'             => $request->price,
            'rating'            => $request->rating,
            'review_count'      => $request->review_count,
            'transactions_id'   => $request->transactions_id,
            'url'               => $request->url,
         ]);
 
         return ($updBusiness);
        //  if($updBusiness){
        //      return response()->success('successfully', $updBusiness);
        //   }  else return response()->error('failed', 'SOMETHING WRONG !');

    }

       public function destoryBusiness($id)
    {
        $delBusiness = MtBusiness::findOrFail($id);
        $delBusiness->delete();
        return response()->json(null, 204);
    }


}
