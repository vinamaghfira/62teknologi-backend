<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\MtBusiness;
use App\Models\MtCoordinate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Validator;

class BusinessController extends Controller
{

    public function index(Request $request)
    {
        $where_price = strtoupper($request->input('price'));
        $where_categories = strtoupper($request->input('categories'));
        $array_categories = explode(',',$where_categories);
        $where_longitude = strtoupper($request->input('longitude'));
        $where_latitude = strtoupper($request->input('latitude'));
        $sort_by = $request->input('sort_by');

        $validator = Validator::make($request->all(),[
            'sort_by' => 'in:rating,review_count,distance',

        ]);
        
        if($validator->fails()){
            return response()->json($validator->errors());       
        }

        $data = MtBusiness::with('categories','coordinates')
        ->when($where_price, function ($query, $where_price) {
            return $query->whereRaw('price',$where_price);
        })
        ->when($where_categories, function($query) use($array_categories){
            return $query->whereHas('categories', function($query2) use ($array_categories){
                $query2->whereIn(DB::raw("UPPER (alias)"), $array_categories)->orWhereIn(DB::raw("UPPER (title)"), $array_categories);
            });
        })
        ->when($where_longitude, function($query,$where_longitude){
            return $query->whereHas('coordinates', function($query2) use($where_longitude){
                $query2->where("longitude",$where_longitude);
            });
        })
        ->when($where_latitude, function($query,$where_latitude){
            return $query->whereHas('coordinates', function($query2) use($where_latitude){
                $query2->where("latitude",$where_latitude);
            });
        })
        ->when($sort_by, function($query,$sort_by){
            return $query->orderBy($sort_by);
        })
        ->get();

        if($data){
        return response()->json([
            'message' => 'Successfully Get Data',
            'data'=> $data
        ]);
        }else{
            return response()->json([
                'message' => 'Failed Get Data',
                'data'=> $data
            ]);
        }
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
            return response()->json([
                'message' => 'Create Data Business Successfully',
                'data'=> $business
            ]);
            }else{
                return response()->json([
                    'message' => 'Create Data Business Failed',
                    'data'=> $business
                ]);
            }

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

         
        if($updBusiness){
            return response()->json([
                'message' => 'Update Data Business Successfully',
                'data'=> $updBusiness
            ]);
            }else{
                return response()->json([
                    'message' => 'Update Data Business Failed',
                    'data'=> $updBusiness
                ]);
            }

    }

       public function destoryBusiness($id)
    {
        $delBusiness = MtBusiness::findOrFail($id);
        $delBusiness->delete();

        if($delBusiness){
            return response()->json([
                'message' => 'Delete Data Business Successfully',
                'data'=> $delBusiness
            ]);
            }else{
                return response()->json([
                    'message' => 'Delete Data Business Failed',
                    'data'=> $delBusiness
                ]);
            }
    }


}
