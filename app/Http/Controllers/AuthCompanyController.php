<?php

namespace App\Http\Controllers;

use App\Http\Resources\AuthComany;
use App\Models\AuthCompany;
use Illuminate\Http\Request;

class AuthCompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('dashboard.auth_company.index',[
            "companies" =>AuthCompany::paginate(10),
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
        return view('dashboard.auth_company.add-company');
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
     * @param  \App\Models\AuthCompany  $authCompany
     * @return \Illuminate\Http\Response
     */
    public function show(AuthCompany $authCompany)
    {
        //
        $AuthCompany = AuthCompany::get();
        return    AuthComany::collection($AuthCompany);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AuthCompany  $authCompany
     * @return \Illuminate\Http\Response
     */
    public function edit(AuthCompany $authCompany)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AuthCompany  $authCompany
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AuthCompany $authCompany)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AuthCompany  $authCompany
     * @return \Illuminate\Http\Response
     */
    public function destroy(AuthCompany $authCompany)
    {
        //
    }
}
