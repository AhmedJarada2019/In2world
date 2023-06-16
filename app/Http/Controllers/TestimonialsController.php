<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\testimonials;
use Illuminate\Http\Request;

class TestimonialsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.testimonials.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('dashboard.testimonials.add-testimonial',[
            "products" => Product::get(['id','name']),
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
     * @param  \App\Models\testimonials  $testimonials
     * @return \Illuminate\Http\Response
     */
    public function show(testimonials $testimonials)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\testimonials  $testimonials
     * @return \Illuminate\Http\Response
     */
    public function edit(testimonials $testimonials)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\testimonials  $testimonials
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, testimonials $testimonials)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\testimonials  $testimonials
     * @return \Illuminate\Http\Response
     */
    public function destroy(testimonials $testimonials)
    {
        //
    }
}
