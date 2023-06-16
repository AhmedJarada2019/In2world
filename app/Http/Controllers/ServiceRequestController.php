<?php

namespace App\Http\Controllers;

use App\Models\ServiceRequest;
use Illuminate\Http\Request;

class ServiceRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.service-requests.index',[
            'requests'=>ServiceRequest::paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $serviceRequest = $request->validate([
            'name'                  =>'required|string|min:3',
            'email'                 =>'required|email|string|min:3|max:255',
            'country_code'          =>'required',
            'phone_number'          =>'required|regex:/^[0-9]+$/',
            'service_id'            =>'required',
            'project_description'   =>'required',
        ],[
            '*.required'          => 'هذا الحقل مطلوب',
            'phone_number.integer'=>'يجب ان يتكون من اعداد صحيحة',
            'email.email'         =>'يجب ان يكون ايميل صالح ',
            'service_id'          =>'الرجاء اختيار الخدمة المطلوبة '
        ]);
        $serviceRequest['ip_address'] =  $request->ip();

        $addServiceRequest = ServiceRequest::create($serviceRequest);
        if($addServiceRequest)
        return response()->json([
            'message'=>'شكرا للتواصل ...... تم اضافة طلبك بنجاح'
        ],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ServiceRequest  $serviceRequest
     * @return \Illuminate\Http\Response
     */
    public function show(ServiceRequest $serviceRequest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ServiceRequest  $serviceRequest
     * @return \Illuminate\Http\Response
     */
    public function edit(ServiceRequest $serviceRequest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ServiceRequest  $serviceRequest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ServiceRequest $serviceRequest)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ServiceRequest  $serviceRequest
     * @return \Illuminate\Http\Response
     */
    public function destroy(ServiceRequest $serviceRequest)
    {
        //
    }
}
