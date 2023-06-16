<?php

namespace App\Http\Controllers;

use App\Http\Resources\Businesses;
use App\Http\Resources\BusinessesOfCategory;
use App\Models\Business;
use App\Models\BusinessCategory;
use Illuminate\Http\Request;

class BusinessController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.businesses.index',[
            "businesses"=>Business::with('category')->paginate()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.businesses.add-business',[
            "categories" =>BusinessCategory::get(['id','name']),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Business  $business
     * @return \Illuminate\Http\Response
     */
    public function show(Business $business)
    {
        //
        $business = Business::with('category')->paginate(9);
        return    Businesses::collection($business);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Business  $business
     * @return \Illuminate\Http\Response
     */
    public function edit(Business $business)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Business  $business
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Business $business)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Business  $business
     * @return \Illuminate\Http\Response
     */
    public function destroy(Business $business)
    {
        //
    }
    public function view_business($id){
        $Business = Business::find($id);
        if($Business==null)
        return response()->json([
            'message' => 'Product Not Found'
                ],200);
        return new Businesses($Business);
    }

    public function businesses_of_category($id){
        $category =BusinessCategory::find($id);
        if($category == null){
            $Business = Business::get();
            return   BusinessesOfCategory::collection($Business);
        }
        $Business = Business::where('category_id',$id)->get();
        return  BusinessesOfCategory::collection($Business);
     }
}
