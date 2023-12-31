<?php

namespace App\Http\Controllers;

use App\Models\service;
use App\Models\ServiceFeature;
use Illuminate\Http\Request;

class ServiceFeatureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.services-feature.index',[
            "Features"=>ServiceFeature::paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // dd(service::all());
        return view('dashboard.services-feature.add-features',[
            "services"=>service::get(['id','title'])
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
     * @param  \App\Models\ServiceFeature  $serviceFeature
     * @return \Illuminate\Http\Response
     */
    public function show(ServiceFeature $serviceFeature)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ServiceFeature  $serviceFeature
     * @return \Illuminate\Http\Response
     */
    public function edit(ServiceFeature $serviceFeature)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ServiceFeature  $serviceFeature
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ServiceFeature $serviceFeature)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ServiceFeature  $serviceFeature
     * @return \Illuminate\Http\Response
     */
    public function destroy(ServiceFeature $serviceFeature)
    {
        //
    }
}
